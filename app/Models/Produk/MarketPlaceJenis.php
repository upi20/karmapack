<?php

namespace App\Models\Produk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Cviebrock\EloquentSluggable\Sluggable;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class MarketPlaceJenis extends Model
{
    use HasFactory, Sluggable, Loggable;
    protected $fillable = [
        'nama',
        'link',
        'slug',
        'foto_icon',
        'foto_cover',
        'keterangan',
        'link_produk',
    ];
    protected $primaryKey = 'id';
    protected $table = 'produk_market_place_jenis';
    const tableName = 'produk_market_place_jenis';
    const image_folder = '/assets/produk/marketplace';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public static function datatable(Request $request): mixed
    {
        // list table
        $query = [];
        $table = static::tableName;
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
        $query = array_merge($query, $date_format_fun('created_at', '%d-%b-%Y', $c_created));
        $query = array_merge($query, $date_format_fun('created_at', '%W, %d %M %Y %H:%i:%s', $c_created_str));
        $query = array_merge($query, $date_format_fun('updated_at', '%d-%b-%Y', $c_updated));
        $query = array_merge($query, $date_format_fun('updated_at', '%W, %d %M %Y %H:%i:%s', $c_updated_str));

        // foto_icon
        $c_foto_icon_link = 'foto_icon_link';
        $query[$c_foto_icon_link] = <<<SQL
                (concat('$base_url_image_folder',$table.foto_icon))
        SQL;
        $query["{$c_foto_icon_link}_alias"] = $c_foto_icon_link;

        // foto_cover
        $c_foto_cover_link = 'foto_cover_link';
        $query[$c_foto_cover_link] = <<<SQL
                (concat('$base_url_image_folder',$table.foto_cover))
        SQL;
        $query["{$c_foto_cover_link}_alias"] = $c_foto_cover_link;
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
            $c_foto_icon_link,
            $c_foto_cover_link,
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
        $filters = [];
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

    // static funtion
    public static function getTopList(?int $limit = 6)
    {
        $a = MarketPlace::tableName;
        $b = static::tableName;
        $produk = <<<SQL
                (select count(*) from $a
                where $a.jenis_id = $b.id)
            SQL;
        $produk_alias = 'produk';

        $model = static::select([
            'id',
            'slug',
            'nama',
            DB::raw("$produk as $produk_alias"),
        ])->whereRaw("$produk>0")
            ->orderBy($produk_alias, 'desc');

        if (is_null($limit)) {
            $model->limit($limit);
        }

        return $model->get();
    }

    public function fotoUrl($attr)
    {
        $folder = static::image_folder;
        $foto = $this->attributes[$attr];
        return asset("$folder/$foto");
    }
}
