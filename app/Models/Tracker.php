<?php

namespace App\Models;

use donatj\UserAgent\UserAgentParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class Tracker extends Model
{
    use HasFactory, Loggable;
    public $excludeLogging = true;
    protected $table = 'visitors';
    protected $fillable = [
        'ip',
        'date',
        'time',
        'platform',
        'browser',
        'browser_version',
        'user_agent',
        'hits',
        'has_detail',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
    const tableName = 'visitors';

    public static function hit(bool $script = false): string
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $ua = $_SERVER['HTTP_USER_AGENT'];

        // ignore vistor
        // example: 127.0.0.1 localhost
        $ignore = config('app.vistor_tracker_ip_ignore', []);
        if (in_array($ip, $ignore)) {
            return false;
        }

        $date = date('Y-m-d');
        $time = date('H:i:s');
        $hit = static::where([
            'ip'   => $ip,
            'date' => $date,
            'user_agent' => $ua,
        ])->first();

        if (is_null($hit)) {
            $hit = new static();
            $hit->ip = $ip;
            $hit->date = $date;
            $hit->user_agent = $ua;
            $hit->hits = 0;

            $parser = new UserAgentParser();
            $user = $parser($ua);
            $hit->platform = $user->platform();
            $hit->browser = $user->browser();
            $hit->browser_version = $user->browserVersion();
        }
        $hit->time = $time;
        $hit->hits++;
        $hit->save();
        if ($script && $hit->hits == 1) {
            $route = route('lab.ip_detail');
            return <<<HTML
                <script>
                    $(document).ready(function() {
                        $.ajax({
                            type: "GET",
                            url: '$route',
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            data: { vistor: '$hit->id' },
                            success: console.log,
                            error: console.log,
                        });
                    });
                </script>
            HTML;
        } else return '';
    }

    public function ipDetail()
    {
        return $this->hasOne(TrackerIPDetail::class, 'visitors_id', 'id');
    }

    public function createIPDetail()
    {
        try {
            DB::beginTransaction();
            // delete current
            $this->ipDetail()->delete();

            // insert new
            $id = $this->attributes['id'];
            $ip = $this->attributes['ip'];

            $detail = new TrackerIPDetail();
            $detail->ip = $ip;
            $detail->visitors_id = $id;

            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
            $check = isset($details->bogon) ? $details->bogon : false;
            if (!$check) {
                $detail->city = $details->city;
                $detail->region = $details->region;
                $detail->country_code = $details->country;
                $detail->country = $this->code_to_country($details->country);
                $detail->loc = $details->loc;
                $detail->timezone = $details->timezone;
            }
            $detail->save();

            $this->setAttribute('has_detail', 1);
            $this->save();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function datatable(Request $request): mixed
    {
        $query = [];
        // list table
        $table = static::tableName;
        $t_detail = TrackerIPDetail::tableName;

        // cusotm query
        // ========================================================================================================
        // creted at and time at
        $date_format_fun = function (string $select, string $format, string $alias) use ($table): array {
            $str = <<<SQL
                (DATE_FORMAT($table.$select, '$format'))
            SQL;
            return [$alias => $str, ($alias . '_alias') => $alias];
        };

        $c_date_str = 'date_str';
        $query = array_merge($query, $date_format_fun('date', '%d-%b-%Y', $c_date_str));
        $c_time_str = 'time_str';
        $query = array_merge($query, $date_format_fun('time', '%H:%i:%s', $c_time_str));

        // date_time
        $c_date_time = 'date_time';
        $query[$c_date_time] = <<<SQL
            CONVERT(concat($table.date,' ', $table.time),datetime)
        SQL;
        $query["{$c_date_time}_alias"] = $c_date_time;

        // country
        $c_country = 'country';
        $query[$c_country] = "$t_detail.country";
        $query["{$c_country}_alias"] = $c_country;
        // ========================================================================================================


        // ========================================================================================================
        // select raw as alias
        $sraa = function (string $col) use ($query): string {
            return $query[$col] . ' as ' . $query[$col . '_alias'];
        };
        $model_filter = [
            $c_date_str,
            $c_time_str,
            $c_date_time,
            $c_country
        ];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = static::select(array_merge([
            DB::raw("$table.*"),
        ], $to_db_raw))
            ->leftJoin($t_detail, "$t_detail.visitors_id", '=', "$table.id");

        // Filter =====================================================================================================
        // filter check
        $f_c = function (string $param) use ($request): mixed {
            $filter = $request->filter;
            return isset($filter[$param]) ? $filter[$param] : false;
        };

        // filter ini menurut data model filter
        $f = [$c_country];
        // loop filter
        foreach ($f as $v) {
            if ($f_c($v)) {
                $model->whereRaw("{$query[$v]}='{$f_c($v)}'");
            }
        }

        // filter custom
        $filters = ['has_detail', 'platform', 'browser'];
        foreach ($filters as  $f) {
            if ($f_c($f) !== false) {
                $model->whereRaw("$table.$f='{$f_c($f)}'");
            }
        }
        // ========================================================================================================


        // ========================================================================================================
        $datatable = Datatables::of($model)->addIndexColumn();

        // search
        // ========================================================================================================
        $query_filter = $query;
        $datatable->filter(function ($query) use ($model_filter, $query_filter, $table) {
            $search = request('search');
            $search = isset($search['value']) ? $search['value'] : null;
            if ((is_null($search) || $search == '') && count($model_filter) > 0) return false;

            // tambah pencarian
            $static = new static();
            $search_add = $static->fillable;
            $search_add = array_map(function ($v) use ($table) {
                return "$table.$v";
            }, $search_add);
            $search_arr = array_merge($model_filter, $search_add);

            // pake or where
            $search_str = "(";
            foreach ($search_arr as $k => $v) {
                $or = (($k + 1) < count($search_arr)) ? 'or' : '';
                $column = isset($query_filter[$v]) ? $query_filter[$v] : $v;
                $search_str .= "$column like '%$search%' $or ";
            }

            $search_str .= ")";
            $query->whereRaw($search_str);
        });

        // create datatable
        return $datatable->make(true);
    }

    private function code_to_country($code)
    {

        $code = strtoupper($code);
        $countryList = array(
            'AF' => 'Afghanistan',
            'AX' => 'Aland Islands',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua and Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahamas the',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia and Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island (Bouvetoya)',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory (Chagos Archipelago)',
            'VG' => 'British Virgin Islands',
            'BN' => 'Brunei Darussalam',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cape Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros the',
            'CD' => 'Congo',
            'CG' => 'Congo the',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'CI' => 'Cote d\'Ivoire',
            'HR' => 'Croatia',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FO' => 'Faroe Islands',
            'FK' => 'Falkland Islands (Malvinas)',
            'FJ' => 'Fiji the Fiji Islands',
            'FI' => 'Finland',
            'FR' => 'France, French Republic',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia the',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GG' => 'Guernsey',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard Island and McDonald Islands',
            'VA' => 'Holy See (Vatican City State)',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IM' => 'Isle of Man',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JE' => 'Jersey',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KP' => 'Korea',
            'KR' => 'Korea',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyz Republic',
            'LA' => 'Lao',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libyan Arab Jamahiriya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macao',
            'MK' => 'Macedonia',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia',
            'MD' => 'Moldova',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'AN' => 'Netherlands Antilles',
            'NL' => 'Netherlands the',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PS' => 'Palestinian Territory',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn Islands',
            'PL' => 'Poland',
            'PT' => 'Portugal, Portuguese Republic',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Reunion',
            'RO' => 'Romania',
            'RU' => 'Russian Federation',
            'RW' => 'Rwanda',
            'BL' => 'Saint Barthelemy',
            'SH' => 'Saint Helena',
            'KN' => 'Saint Kitts and Nevis',
            'LC' => 'Saint Lucia',
            'MF' => 'Saint Martin',
            'PM' => 'Saint Pierre and Miquelon',
            'VC' => 'Saint Vincent and the Grenadines',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome and Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'RS' => 'Serbia',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SK' => 'Slovakia (Slovak Republic)',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia, Somali Republic',
            'ZA' => 'South Africa',
            'GS' => 'South Georgia and the South Sandwich Islands',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SD' => 'Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard & Jan Mayen Islands',
            'SZ' => 'Swaziland',
            'SE' => 'Sweden',
            'CH' => 'Switzerland, Swiss Confederation',
            'SY' => 'Syrian Arab Republic',
            'TW' => 'Taiwan',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania',
            'TH' => 'Thailand',
            'TL' => 'Timor-Leste',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad and Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks and Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States of America',
            'UM' => 'United States Minor Outlying Islands',
            'VI' => 'United States Virgin Islands',
            'UY' => 'Uruguay, Eastern Republic of',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VE' => 'Venezuela',
            'VN' => 'Vietnam',
            'WF' => 'Wallis and Futuna',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe'
        );

        if (!$countryList[$code]) return $code;
        else return $countryList[$code];
    }
}
