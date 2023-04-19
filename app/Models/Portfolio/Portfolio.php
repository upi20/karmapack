<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Support\Facades\Cache;

class Portfolio extends Model
{
    use HasFactory, Sluggable, Loggable;
    protected $fillable = [
        'nama',
        'slug',
        'foto',
        'keterangan',
        'is_insert',
        'kategori_id',
        'created_by',
    ];
    protected $primaryKey = 'id';
    protected $table = 'portfolio';
    const tableName = 'portfolio';
    const image_folder = '/assets/portfolio';
    const feCacheKey = 'fePortfolioHome';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function fotoUrl()
    {
        $folder = static::image_folder;
        $foto = $this->attributes['foto'];
        return asset("$folder/$foto");
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'portfolio_id', 'id');
    }

    // static function
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
        $query = [];
        // list table
        $table = static::tableName;
        $t_kategori = Kategori::tableName;
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

        // foto
        $c_foto_link = 'foto_link';
        $query[$c_foto_link] = <<<SQL
                (concat('$base_url_image_folder',$table.foto))
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
            $c_foto_link,
            $c_created,
            $c_created_str,
            $c_updated,
            $c_updated_str,
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
        $filters = ['kategori_id'];
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


    public static function getFeHomeData()
    {
        return Cache::rememberForever(static::feCacheKey, function () {
            $result =  Kategori::with(['protfolios' => function ($query) {
                $query->orderBy('nama');
            }])->orderBy('urutan')->get();

            return $result->filter(function ($query) {
                return $query->protfolios->count() > 0;
            });
        });
    }

    public static function clearCache()
    {
        return Cache::pull(static::feCacheKey);
    }
}
