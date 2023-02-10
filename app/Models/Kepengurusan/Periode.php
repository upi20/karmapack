<?php

namespace App\Models\Kepengurusan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'foto',
        'dari',
        'sampai',
        'slug',
        'slogan',
        'visi',
        'misi',
        'filosofi_logo',
        'status',
    ];

    protected $primaryKey = 'id';
    protected $table = 'pengurus_periodes';
    const tableName = 'pengurus_periodes';
    const image_default = 'assets/image/logo_default.png';
    const image_folder = '/assets/periode';

    public function jabatans()
    {
        return $this->hasMany(Jabatan::class, 'periode_id', 'id');
    }

    public function fotoUrl()
    {
        $foto = $this->attributes['foto'];
        return $foto ? url(self::image_folder . '/' . $foto) : asset(self::image_default);
    }
}
