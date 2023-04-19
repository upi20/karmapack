<?php

namespace App\Models\Produk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class VarianWarna extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'produk_id',
        'nama',
        'kode',
    ];
    protected $primaryKey = 'id';
    protected $table = 'produk_varian_warna';
    const tableName = 'produk_varian_warna';

    public function produk()
    {
        return $this->hasOne(Produk::class, 'produk_id', 'id');
    }
}
