<?php

namespace App\Models\Artikel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class Kategori extends Model
{
    use HasFactory, Sluggable, Loggable;
    protected $fillable = [
        'nama',
        'slug',
        'foto',
        'status',
    ];

    protected $primaryKey = 'id';
    protected $table = 'artikel_kategori';
    const tableName = 'artikel_kategori';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    // eloquent
    public function articles()
    {
        return $this->belongsToMany(
            related: Artikel::class,
            table: KategoriArtikel::tableName,
            foreignPivotKey: 'kategori_id',
            relatedPivotKey: 'artikel_id',
        );
    }

    // static function
    public static function getTopList(?int $limit = 6)
    {
        $b = static::tableName;
        $a = KategoriArtikel::tableName;
        $artikel = <<<SQL
            (select count(*) from $a
            where $a.kategori_id = $b.id)
        SQL;
        $artikel_alias = 'artikel';

        $model = static::select([
            'id',
            'nama',
            'slug',
            DB::raw("$artikel as $artikel_alias"),
        ])->where('status', '=', 1)
            ->orderBy($artikel_alias, 'desc')
            ->limit($limit)
            ->get();
        return $model;
    }

    public static function datatable(Request $request): mixed
    {
        $query = [];
        $query['artikel'] = <<<SQL
            (select count(*) from artikel_kategori_item
                where artikel_kategori_item.kategori_id = artikel_kategori.id)
        SQL;
        $query['artikel_alias'] = 'artikel';
        $model = Kategori::select(['id', 'nama', 'slug', 'status'])
            ->selectRaw("IF(status = 1, 'Dipakai', 'Tidak Dipakai') as status_str")
            ->selectRaw("{$query['artikel']} as {$query['artikel_alias']}");

        // filter
        if (isset($request->filter)) {
            $filter = $request->filter;
            if ($filter['status'] != '') {
                $model->where('status', '=', $filter['status']);
            }
        }

        return DataTables::of($model)
            ->addIndexColumn()
            ->filterColumn($query['artikel_alias'], function ($query, $keyword) {
                $query->whereRaw("{$query['artikel']} like '%$keyword%'");
            })
            ->make(true);
    }
}
