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
}
