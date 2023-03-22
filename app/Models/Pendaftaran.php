<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Pendaftaran extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'nama',
        'deskripsi',
        'pengumuman',
        'no_urut',
        'dari',
        'sampai',
        'route',
        'foto',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'pendaftarans';
    const tableName = 'pendaftarans';
    const image_folder = '/assets/pendaftarans';
    const image_default = 'assets/image/anggota_default.png';
}
