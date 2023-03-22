<?php

namespace App\Models\Artikel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [
        'nama',
        'slug',
        'status',
    ];

    protected $primaryKey = 'id';
    protected $table = 'artikel_tag';
    const tableName = 'artikel_tag';

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
            table: TagArtikel::tableName,
            foreignPivotKey: 'tag_id',
            relatedPivotKey: 'artikel_id',
        );
    }

    // static funtion
    public static function getTopList(?int $limit = 6)
    {
        $a = TagArtikel::tableName;
        $b = self::tableName;
        $artikel = <<<SQL
            (select count(*) from $a
            where $a.tag_id = $b.id)
        SQL;
        $artikel_alias = 'artikel';

        $model = self::select([
            'id',
            DB::raw("concat('#',nama) as nama"),
            'slug',
            DB::raw("$artikel as $artikel_alias"),
        ])->where('status', '=', 1)
            ->orderBy($artikel_alias, 'desc')
            ->limit($limit)
            ->get();
        return $model;
    }
}
