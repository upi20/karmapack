<?php

namespace App\Models\Artikel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class KategoriArtikel extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'artikel_id',
        'kategori_id',
    ];

    protected $primaryKey = 'id';
    protected $table = 'artikel_kategori_item';
    const tableName = 'artikel_kategori_item';

    public function artikel()
    {
        return $this->hasOne(Artikel::class, 'id', 'artikel_id');
    }

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id', 'kategori_id');
    }
}
