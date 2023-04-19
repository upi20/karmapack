<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Message extends Model
{
    use HasFactory, Loggable;
    protected $guarded = [
        'nama',
        'email',
        'message',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'contact_messages';
    const tableName = 'contact_messages';

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

        // // type
        // $c_type_str = 'type_str';
        // $this->query[$c_type_str] = <<<SQL
        //         (if($table.type = 1, 'Teks', if($table.type = 2, 'Link', 'Tidak Diketahui')))
        // SQL;
        // $this->query["{$c_type_str}_alias"] = $c_type_str;

        // // status
        // $c_status_str = 'status_str';
        // $this->query[$c_status_str] = <<<SQL
        //         (if($table.status = 0, 'Tidak Digunakan', if($table.status = 1, 'Digunakan', 'Tidak Diketahui')))
        // SQL;
        // $this->query["{$c_status_str}_alias"] = $c_status_str;
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
            // $c_status_str,
            // $c_type_str,
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
        // $f = [$c_user];
        // // loop filter
        // foreach ($f as $v) {
        //     if ($f_c($v)) {
        //         $model->whereRaw("{$this->query[$v]}='{$f_c($v)}'");
        //     }
        // }

        // filter custom
        $filters = ['status'];
        foreach ($filters as  $f) {
            if ($f_c($f) !== false) {
                $model->whereRaw("$table.$f='{$f_c($f)}'");
            }
        }
        // ========================================================================================================


        // ========================================================================================================
        $datatable = Datatables::of($model)->addIndexColumn();
        foreach ($model_filter as $v) {
            // custom pencarian
            $queryOut = $query;
            $datatable->filterColumn($query["{$v}_alias"], function ($query, $keyword) use ($v, $queryOut) {
                $query->whereRaw("({$queryOut[$v]} like '%$keyword%')");
            });
        }
        // create datatable
        return $datatable->make(true);
    }
}
