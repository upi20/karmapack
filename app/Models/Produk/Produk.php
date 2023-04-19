<?php

namespace App\Models\Produk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Produk extends Model
{
    use HasFactory, Sluggable, Loggable;
    protected $fillable = [
        'kategori_id',
        'nama',
        'slug',
        'sku',
        'kilasan',
        'informasi_lain',
        'harga',
        'harga_diskon',
        'status_stok',
        'rating',
        'rating_nama',
        'jml_dilihat',
        'tampilkan_di_halaman_utama',
        'is_insert',
        'created_by',
    ];
    protected $primaryKey = 'id';
    protected $table = 'produk';
    const tableName = 'produk';
    const image_folder = '/assets/produk';
    const feCacheKey = 'feProodukHome';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'produk_id', 'id');
    }

    public function marketplaces()
    {
        return $this->hasMany(MarketPlace::class, 'produk_id', 'id');
    }

    public static function getInsert()
    {
        $user_id = auth()->user()->id;
        $where = ['is_insert' => 0, 'created_by' => $user_id];
        $get = static::where($where)->first();

        if (is_null($get)) {
            static::insert($where);
            return static::where($where)->first();
        }
        return $get;
    }

    public static function datatable(Request $request): mixed
    {
        // list table
        $query = [];
        $table = static::tableName;
        $t_kategori = Kategori::tableName;
        $t_foto = Foto::tableName;
        $base_url_image_folder = url(str_replace('./', '', Foto::image_folder)) . '/';

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

        // foto
        $c_foto_link = 'foto_link';
        $query[$c_foto_link] = <<<SQL
                concat('$base_url_image_folder',(select $t_foto.foto from $t_foto where $t_foto.produk_id = $table.id order by $t_foto.urutan asc limit 1))
        SQL;
        $query["{$c_foto_link}_alias"] = $c_foto_link;

        // kategori
        $c_kategori_nama = 'kategori_nama';
        $query[$c_kategori_nama] = "$t_kategori.nama";
        $query["{$c_kategori_nama}_alias"] = $c_kategori_nama;

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
            $c_foto_link,
            $c_kategori_nama,
        ];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = static::select(array_merge([
            DB::raw("$table.*"),
        ], $to_db_raw))
            ->leftJoin($t_kategori, "$t_kategori.id", '=', "$table.kategori_id")
            ->where('is_insert', true);

        // Filter =====================================================================================================
        // filter check
        $f_c = function (string $param) use ($request): mixed {
            $filter = $request->filter;
            return isset($filter[$param]) ? $filter[$param] : false;
        };

        // filter custom
        $filters = ['kategori_id', 'tampilkan_di_halaman_utama'];
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

    public static function getList(Request $request): object
    {
        $paginate = is_numeric($request->limit) ? $request->limit : 15;
        $a = static::tableName;

        $kat = Kategori::tableName;
        $mp = MarketPlaceJenis::tableName;
        $mp_item = MarketPlace::tableName;


        $model = static::selectRaw("$a.*")->with(['fotos' => function ($query) {
            $query->orderBy('urutan');
        }]);
        if ($request->order_by == 'asc') $model->orderBy("$a.nama", 'asc');
        else if ($request->order_by == 'desc') $model->orderBy("$a.nama", 'desc');
        else if ($request->order_by == 'longest') $model->orderBy("$a.created_at", 'asc');
        else $model->orderBy("$a.created_at", 'desc');

        if ($request->kategori) {
            $model->join($kat, "$a.kategori_id", '=', "$kat.id")
                ->where("$kat.slug", $request->kategori);
        }

        if ($request->marketplace) {
            $model->join($mp_item, "$mp_item.produk_id", '=', "$a.id")
                ->join($mp, "$mp_item.jenis_id", '=', "$mp.id")
                ->where("$mp.slug", $request->marketplace);
        }

        if ($request->search) {
            $search = $request->search;
            $model->whereRaw("(
                $a.nama like '%$search%' or
                $a.slug like '%$search%' or
                $a.sku like '%$search%' or
                $a.kilasan like '%$search%' or
                $a.informasi_lain like '%$search%' or
                $a.harga like '%$search%'
            )");
        }
        return $model->paginate($paginate)
            ->appends(request()->query());
    }

    public static function getByCategory(int|array $kategori_id, int $limit = 6, $except_id = null)
    {
        $a = static::tableName;

        $result = static::selectRaw("$a.*")
            ->orderBy("$a.created_at", 'desc')
            ->limit($limit);

        if ($except_id !== null) {
            $result->whereNot("$a.id", $except_id);
        }
        if (is_array($kategori_id)) {
            $result->whereIn("$a.kategori_id", $kategori_id);
        } else {
            $result->where("$a.kategori_id", $kategori_id);
        }

        return $result->get();
    }

    public static function getFeHomeData()
    {
        return Cache::rememberForever(static::feCacheKey, function () {
            return static::with(['kategori', 'fotos', 'marketplaces.jenis'])
                ->where('tampilkan_di_halaman_utama', 1)->orderBy('created_at', 'desc')->get();
        });
    }

    public static function clearCache()
    {
        return Cache::pull(static::feCacheKey);
    }
}
