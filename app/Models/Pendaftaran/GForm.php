<?php

namespace App\Models\Pendaftaran;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class GForm extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'user_id',
        'nama',
        'slug',
        'deskripsi',
        'no_urut',
        'dari',
        'sampai',
        'link',
        'foto',
        'tampilkan',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'g_forms';
    const tableName = 'g_forms';
    const image_folder = '/assets/pendaftarans/gfrom';
    const image_default = '/assets/pendaftarans/20220502202741.png';

    public function fotoUrl()
    {
        $foto = $this->attributes['foto'];
        return $foto ? url(static::image_folder . '/' . $foto) : asset(static::image_default);
    }

    public function fotoUrlDefault()
    {
        return asset(static::image_default);
    }

    public static function datatable(Request $request): mixed
    {
        $query = [];
        // list table
        $table = static::tableName;
        $t_user = User::tableName;
        $base_url_image_folder = url(str_replace('./', '', static::image_folder)) . '/';

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

        // foto
        $c_foto_link = 'foto_link';
        $query[$c_foto_link] = <<<SQL
                (concat('$base_url_image_folder',$table.foto))
        SQL;
        $query["{$c_foto_link}_alias"] = $c_foto_link;

        // status
        $c_status_str = 'status_str';
        $query[$c_status_str] = <<<SQL
                (if($table.status = 0, 'Tidak Aktif', if($table.status = 1, 'Aktif', if($table.status = 2, 'Ditutup', 'Tidak Diketahui'))))
        SQL;
        $query["{$c_status_str}_alias"] = $c_status_str;

        // tampilkan
        $c_tampilkan_str = 'tampilkan_str';
        $query[$c_tampilkan_str] = <<<SQL
                (if($table.tampilkan = 0, 'Tidak', if($table.tampilkan = 1, 'Iya', 'Tidak Diketahui')))
        SQL;
        $query["{$c_tampilkan_str}_alias"] = $c_tampilkan_str;

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
            $c_foto_link,
            $c_created,
            $c_created_str,
            $c_updated,
            $c_updated_str,
            $c_status_str,
            $c_tampilkan_str,
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
        $filters = ['user_id', 'status', 'tampilkan'];
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
