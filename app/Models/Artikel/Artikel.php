<?php

namespace App\Models\Artikel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artikel\KategoriArtikel;
use Illuminate\Support\Facades\Cache;
use App\Models\Artikel\TagArtikel;
use Yajra\Datatables\Datatables;
use App\Models\Artikel\Kategori;
use Illuminate\Http\Request;
use App\Models\Artikel\Tag;
use App\Models\User;

class Artikel extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'nama',
        'slug',
        'foto',
        'detail',
        'excerpt',
        'counter',
        'date',
        'status',
        'user_id',
    ];

    protected $primaryKey = 'id';
    protected $table = 'artikel';
    const tableName = 'artikel';
    const image_folder = '/assets/artikel';
    const homeCacheKey = 'homeArtikel';
    const footerCacheKey = 'footerArtikel';

    // eloquent
    public function tags()
    {
        return $this->belongsToMany(
            related: Tag::class,
            table: TagArtikel::tableName,
            foreignPivotKey: 'artikel_id',
            relatedPivotKey: 'tag_id',
        );
    }

    public function categories()
    {
        return $this->belongsToMany(
            related: Kategori::class,
            table: KategoriArtikel::tableName,
            foreignPivotKey: 'artikel_id',
            relatedPivotKey: 'kategori_id',
        );
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    // inner function
    public function fotoUrl()
    {
        $foto = $this->attributes['foto'];
        $detail = $this->attributes['detail'];
        $get_id_yt = check_image_youtube($detail);
        $foto = $foto ? asset($foto) : 'https://i.ytimg.com/vi/' . $get_id_yt . '/sddefault.jpg';

        return $foto;
    }

    public function dateFormat($format = 'd F Y')
    {
        return date_format(date_create($this->attributes['date']), $format);
    }

    public function tagKeyword()
    {
        $artikel_id = $this->attributes['id'];
        $a = TagArtikel::tableName;
        $b = Tag::tableName;
        $result = TagArtikel::selectRaw("GROUP_CONCAT($b.nama) as text")
            ->where("$a.artikel_id", '=', $artikel_id)->join($b, "$b.id", '=', "$a.tag_id")
            ->first();
        return $result ? $result->text : '';
    }

    public function kategoriKeyword()
    {
        $artikel_id = $this->attributes['id'];
        $a = KategoriArtikel::tableName;
        $b = Kategori::tableName;
        $result = KategoriArtikel::selectRaw("GROUP_CONCAT($b.nama) as text")
            ->where("$a.artikel_id", '=', $artikel_id)->join($b, "$b.id", '=', "$a.kategori_id")
            ->first();
        return $result ? $result->text : '';
    }

    public function getArticleByCategory($categories)
    {
        if (is_null($categories) || count($categories) < 1) {
            return [];
        }

        $list_category = $this->parseId($categories);

        $artikel_id = $this->attributes['id'];
        return static::getByCategory(kategori_id: $list_category, except_id: $artikel_id);
    }

    public function parseId($collect)
    {
        if (is_null($collect) || count($collect) < 1) {
            return [];
        }

        return $collect->map(function ($d) {
            return $d->id;
        })->toArray();
    }

    // static function
    public static function getTopList(int $limit = 6)
    {
        $model = static::select(['slug', 'foto', 'date', 'detail', 'nama'])
            ->where('status', '=', 1)
            ->orderBy('counter', 'desc')
            ->limit($limit)
            ->get();

        return $model;
    }

    public static function getList(Request $request): object
    {
        $paginate = is_numeric($request->limit) ? $request->limit : 9;
        $a = static::tableName;

        $kat = Kategori::tableName;
        $kat_item = KategoriArtikel::tableName;
        $tag = Tag::tableName;
        $tag_item = TagArtikel::tableName;

        $model = static::selectRaw("$a.*")->where("$a.status", '=', 1)
            ->orderBy("$a.date", 'desc')
            ->orderBy("$a.id", 'desc');

        if ($request->kategori) {
            $model->join($kat_item, "$kat_item.artikel_id", '=', "$a.id")
                ->join($kat, "$kat_item.kategori_id", '=', "$kat.id")
                ->where("$kat.slug", $request->kategori);
        }

        if ($request->tag) {
            $model->join($tag_item, "$tag_item.artikel_id", '=', "$a.id")
                ->join($tag, "$tag_item.tag_id", '=', "$tag.id")
                ->where("$tag.slug", $request->tag);
        }

        if ($request->search) {
            $search = $request->search;
            $model->whereRaw("(
                $a.nama like '%$search%' or
                $a.slug like '%$search%' or
                $a.foto like '%$search%' or
                $a.detail like '%$search%' or
                $a.excerpt like '%$search%' or
                $a.counter like '%$search%' or
                $a.date like '%$search%' or
                $a.status like '%$search%'
            )");
        }
        return $model->paginate($paginate)
            ->appends(request()->query());
    }

    public static function getByCategory(int|array $kategori_id, int $limit = 6, $except_id = null)
    {
        $a = static::tableName;
        $b = KategoriArtikel::tableName;

        $result = static::selectRaw("$a.*")
            ->join($b, "$b.artikel_id", '=', "$a.id")
            ->orderBy("$a.date", 'desc')
            ->limit($limit);

        if ($except_id !== null) {
            $result->whereNot("$a.id", $except_id);
        }
        if (is_array($kategori_id)) {
            $result->whereIn("$b.kategori_id", $kategori_id);
        } else {
            $result->where("$b.kategori_id", $kategori_id);
        }

        return $result->get();
    }

    public static function getHomeViewData()
    {
        return Cache::rememberForever(static::homeCacheKey, function () {
            $get = static::with('categories')->where('status', '=', 1)
                ->orderBy('date', 'desc')
                ->orderBy('id', 'desc')
                ->limit(6)->get();
            return $get ? $get : [];
        });
    }

    public static function clearCache()
    {
        $cacheKey = [
            static::footerCacheKey,
            static::homeCacheKey
        ];

        foreach ($cacheKey as $key) Cache::pull($key);
    }

    public static function datatable(Request $request): mixed
    {
        $model = Artikel::select(['id', 'nama', 'slug', 'excerpt', 'status', 'created_at', 'date'])
            ->selectRaw('IF(status = 1, "Dipublish", "Disimpan") as status_str');

        // filter
        if (isset($request->filter)) {
            $filter = $request->filter;
            if ($filter['status'] != '') {
                $model->where('status', '=', $filter['status']);
            }
        }

        return Datatables::of($model)
            ->addIndexColumn()
            ->make(true);
    }
}
