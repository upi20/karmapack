<?php

namespace App\Models\Pendaftaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class GForm extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'user_id',
        'nama',
        'slug',
        'deskripsi',
        'no_urut',
        'dari',
        'sampai',
        'link',
        'foto',
        'tampilkan',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'g_forms';
    const tableName = 'g_forms';
    const image_folder = '/assets/pendaftarans/gfrom';
    const image_default = '/assets/pendaftarans/20220502202741.png';

    public function fotoUrl()
    {
        $foto = $this->attributes['foto'];
        return $foto ? url(self::image_folder . '/' . $foto) : asset(self::image_default);
    }

    public function fotoUrlDefault()
    {
        return asset(self::image_default);
    }
}
