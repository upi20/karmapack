<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class KataAlumni extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'user_id',
        'sebagai',
        'deskripsi',
        'sequence',
        'profesi',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'kata_alumnis';
    const tableName = 'kata_alumnis';
    const image_folder = '/assets/kata_alumnis';
    const homeCacheKey = 'homeKataAlumni';

    public static function getHome(?int $limit = 6): mixed
    {
        DB::statement("SET SQL_MODE=''");
        $table = self::tableName;
        $t_user = User::tableName;

        $result = self::select([
            "$table.*",
            DB::raw("$t_user.name as user"),
            DB::raw("$t_user.foto as user_foto"),
            DB::raw("$t_user.username as user_username"),
            DB::raw("$t_user.id as user_id"),
        ])
            ->where("$table.status", '=', '1')
            ->join($t_user, "$t_user.id", '=', "$table.user_id")
            ->orderBy("$table.sequence")
            ->limit($limit)
            ->get();
        $result->map(function ($item) {
            $image_folder = User::image_folder;
            $item->user_foto = $item->user_foto ? url("$image_folder/$item->user_foto") : asset('assets/image/anggota_default.png');
            return $item;
        });
        return $result;
    }

    public static function datatable(Request $request): mixed
    {
        $query = [];
        // list table
        $table = static::tableName;
        $t_user = User::tableName;

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

        // status
        $c_status_str = 'status_str';
        $query[$c_status_str] = <<<SQL
            (if($table.status = 0, 'Disimpan', if($table.status = 2, 'Ditutup', 'Di Pusbish')))
        SQL;

        $query["{$c_status_str}_alias"] = $c_status_str;

        // user
        $c_user = 'user';
        $query[$c_user] = "$t_user.name";
        $query["{$c_user}_alias"] = $c_user;
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
            $c_status_str,
            $c_user
        ];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = static::select(array_merge([
            DB::raw("$table.*"),
        ], $to_db_raw))
            ->leftJoin($t_user, "$t_user.id", '=', "$table.user_id");

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
        $filters = ['status'];
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

    public static function getHomeViewData()
    {
        return Cache::rememberForever(static::homeCacheKey, function () {
            $kata_alumni_limit = settings()->get('setting.home.kata_alumni.limit', 6);
            $get = static::getHome($kata_alumni_limit);
            return $get ? $get : [];
        });
    }

    public static function clearCache()
    {
        $cacheKey = [
            static::homeCacheKey
        ];

        foreach ($cacheKey as $key) Cache::pull($key);
    }
}
