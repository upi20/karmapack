<?php

namespace App\Models\Artikel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;

class Kategori extends Model
{
    use HasFactory, Sluggable;
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
        $b = self::tableName;
        $a = KategoriArtikel::tableName;
        $artikel = <<<SQL
            (select count(*) from $a
            where $a.kategori_id = $b.id)
        SQL;
        $artikel_alias = 'artikel';

        $model = self::select([
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
}
