<?php

namespace App\Models\Artikel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'artikel_tag';
    const tableName = 'artikel_tag';

    public static function getList(?int $limit = 6)
    {
        $a = self::tableName;
        $a = TagArtikel::tableName;
        $artikel = <<<SQL
            (select count(*) from $a
            where $a.tag_id = artikel_tag.id)
        SQL;
        $artikel_alias = 'artikel';

        $model = self::select([
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
