<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class WhatsApp extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nama',
        'template',
    ];

    protected $primaryKey = 'id';
    protected $table = 'whatsapp_brodcast';
    const tableName = 'whatsapp_brodcast';

    public function templateLink(User $user)
    {
        $no_wa = $user->anggota->whatsapp;
        if (is_null($no_wa)) return '#';
        if ($no_wa[0] == 8) $no_wa = "62$no_wa";
        if ($no_wa[0] == 0) $no_wa = ("62" . substr($no_wa, 1));

        $text = $this->templateTemplateText($user);
        $ln = urlencode("\\n");
        $text = urlencode($text);

        $text = str_parse($text, [
            ['search' => $ln, 'replace' => "%0a"]
        ]);
        return "https://wa.me/$no_wa?text=$text";
    }

    public function templateTemplateText(User $user, $ln = false)
    {
        $template = $this->attributes['template'];
        $array_parser = [
            ['search' => '__nama_anggota__', 'replace' => $user->name],
            ['search' => '__email_anggota__', 'replace' => $user->email],
        ];

        if ($user->str_parse) {
            $array_parser = array_merge($array_parser, $user->str_parse);
        }

        $text = str_parse($template, $array_parser);
        if ($ln) {
            $text = str_parse($text, [
                ['search' => '\\n', 'replace' => '<br>'],
            ]);
        }

        return $text;
    }

    public static function datatable(Request $request): mixed
    {
        $query = [];
        // list table
        $table = static::tableName;

        // cusotm query
        // ========================================================================================================
        // creted at and updated at
        $date_format_fun = function (string $select, string $format, string $alias) use ($table): array {
            $str = <<<SQL
                (DATE_FORMAT($table.$select, '$format'))
            SQL;
            return [$alias => $str, ($alias . '_alias') => $alias];
        };

        $c_created = 'created';
        $c_created_str = 'created_str';
        $c_updated = 'updated';
        $c_updated_str = 'updated_str';
        $query = array_merge($query, $date_format_fun('created_at', '%d-%b-%Y', $c_created));
        $query = array_merge($query, $date_format_fun('created_at', '%W, %d %M %Y %H:%i:%s', $c_created_str));
        $query = array_merge($query, $date_format_fun('updated_at', '%d-%b-%Y', $c_updated));
        $query = array_merge($query, $date_format_fun('updated_at', '%W, %d %M %Y %H:%i:%s', $c_updated_str));
        // ========================================================================================================


        // ========================================================================================================
        // select raw as alias
        $sraa = function (string $col) use ($query): string {
            return $query[$col] . ' as ' . $query[$col . '_alias'];
        };
        $model_filter = [
            $c_created,
            $c_created_str,
            $c_updated,
            $c_updated_str,
        ];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = static::select(array_merge([
            DB::raw("$table.*"),
        ], $to_db_raw));

        // Filter =====================================================================================================
        // filter check
        $f_c = function (string $param) use ($request): mixed {
            $filter = $request->filter;
            return isset($filter[$param]) ? $filter[$param] : false;
        };

        // filter custom
        $filters = ['dibuka'];
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
}
