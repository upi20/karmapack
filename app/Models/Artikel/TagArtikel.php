<?php

namespace App\Models\Artikel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class TagArtikel extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'artikel_id',
        'tag_id',
    ];

    protected $primaryKey = 'id';
    protected $table = 'artikel_tag_item';
    const tableName = 'artikel_tag_item';

    public function artikel()
    {
        return $this->hasOne(Artikel::class, 'id', 'artikel_id');
    }

    public function tag()
    {
        return $this->hasOne(Kategori::class, 'id', 'tag_id');
    }
}
