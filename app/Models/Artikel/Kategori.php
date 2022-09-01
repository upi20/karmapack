<?php

namespace App\Models\Artikel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'artikel_kategori';
    const tableName = 'artikel_kategori';

    public static function getList(?int $limit = 6)
    {
        $a = self::tableName;
        $a = KategoriArtikel::tableName;
        $artikel = <<<SQL
            (select count(*) from $a
            where $a.kategori_id = artikel_kategori.id)
        SQL;
        $artikel_alias = 'artikel';

        $model = self::select([
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
