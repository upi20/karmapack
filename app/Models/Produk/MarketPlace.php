<?php

namespace App\Models\Produk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class MarketPlace extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'produk_id',
        'jenis_id',
        'link',
    ];
    protected $primaryKey = 'id';
    protected $table = 'produk_market_place';
    const tableName = 'produk_market_place';

    public function produk()
    {
        return $this->hasOne(Produk::class, 'produk_id', 'id');
    }

    public function jenis()
    {
        return $this->hasOne(MarketPlaceJenis::class, 'id', 'jenis_id');
    }

    public static function datatable(Request $request): mixed
    {
        // list table
        $query = [];
        $table = static::tableName;
        $t_jenis = MarketPlaceJenis::tableName;

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

        // jenis
        $c_jenis_nama = 'jenis_nama';
        $query[$c_jenis_nama] = "$t_jenis.nama";
        $query["{$c_jenis_nama}_alias"] = $c_jenis_nama;

        $c_jenis_link = 'jenis_link';
        $query[$c_jenis_link] = "$t_jenis.link";
        $query["{$c_jenis_link}_alias"] = $c_jenis_link;

        $c_jenis_link_produk = 'jenis_link_produk';
        $query[$c_jenis_link_produk] = "$t_jenis.link_produk";
        $query["{$c_jenis_link_produk}_alias"] = $c_jenis_link_produk;

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
            $c_jenis_nama,
            $c_jenis_link,
            $c_jenis_link_produk,
        ];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = static::select(array_merge([
            DB::raw("$table.*"),
        ], $to_db_raw))
            ->leftJoin($t_jenis, "$t_jenis.id", '=', "$table.jenis_id");

        // Filter =====================================================================================================
        // filter check
        $f_c = function (string $param) use ($request): mixed {
            $filter = $request->filter;
            return isset($filter[$param]) ? $filter[$param] : false;
        };

        // filter custom
        $filters = ['produk_id'];
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
