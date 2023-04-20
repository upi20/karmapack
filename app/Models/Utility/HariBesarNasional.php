<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class HariBesarNasional extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'type',
        'hari',
        'bulan',
        'tahun',
        'nama',
        'keterangan',
    ];
    protected $primaryKey = 'id';
    protected $table = 'hari_besar_nasionals';
    const tableName = 'hari_besar_nasionals';
    const image_folder = '/assets/hari_besar_nasionals';

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
        $query = array_merge($query, $date_format_fun('created_at', '%d-%b-%Y %H:%i:%s', $c_created));
        $query = array_merge($query, $date_format_fun('created_at', '%W, %d %M %Y %H:%i:%s', $c_created_str));
        $query = array_merge($query, $date_format_fun('updated_at', '%d-%b-%Y', $c_updated));
        $query = array_merge($query, $date_format_fun('updated_at', '%W, %d %M %Y %H:%i:%s', $c_updated_str));

        // tanggal
        $c_tanggal = 'tanggal';
        $query[$c_tanggal] = <<<SQL
            date( concat( (if($table.`type` = 1, year(now()), $table.tahun)), '-',
                    $table.bulan,'-',
                    $table.hari ) )
        SQL;
        $query["{$c_tanggal}_alias"] = $c_tanggal;

        // countdown
        $c_countdown = 'countdown';
        $query[$c_countdown] = <<<SQL
            ( ifnull(if(DATEDIFF($query[$c_tanggal], CURDATE()) < 0,
                DATEDIFF(ADDDATE($query[$c_tanggal], INTERVAL 1 YEAR), CURDATE()),
                DATEDIFF($query[$c_tanggal], CURDATE())
            ), 999) )
        SQL;
        $query["{$c_countdown}_alias"] = $c_countdown;

        // tanggal_str
        $c_tanggal_str = 'tanggal_str';
        $query[$c_tanggal_str] = <<<SQL
            (DATE_FORMAT(
                $query[$c_tanggal],
                concat('%d %M', (if($table.`type` = 0, ' %Y', '')))
            ) )
        SQL;
        $query["{$c_tanggal_str}_alias"] = $c_tanggal_str;

        // type_str
        $c_type_str = 'type_str';
        $query[$c_type_str] = <<<SQL
            (if($table.`type` = 1, 'Tetap', if($table.`type` = 0, 'Tidak Tetap', 'Tidak Diketahui')))
        SQL;
        $query["{$c_type_str}_alias"] = $c_type_str;
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
            $c_tanggal_str,
            $c_tanggal,
            $c_type_str,
            $c_countdown
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

        // filter ini menurut data model filter
        $f = [];
        // loop filter
        foreach ($f as $v) {
            if ($f_c($v) !== false) {
                $model->whereRaw("{$query[$v]}='{$f_c($v)}'");
            }
        }

        // filter custom
        $filters = ['type'];
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
