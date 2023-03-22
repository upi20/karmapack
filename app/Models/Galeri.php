<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Galeri extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'id',
        'nama',
        'foto',
        'foto_id_gdrive',
        'id_gdrive',
        'slug',
        'tanggal',
        'lokasi',
        'keterangan',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'galeri';
    const tableName = 'galeri';
}
