<?php

namespace App\Models\Produk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Top extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'produk_id',
        'urutan',
    ];

    protected $primaryKey = 'id';
    protected $table = 'produk_top';
    const tableName = 'produk_top';

    public function produk()
    {
        return $this->hasOne(Produk::class, 'produk_id', 'id');
    }
}
