<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class HariBesarNasional extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'type',
        'hari',
        'bulan',
        'tahun',
        'nama',
        'keterangan',
    ];
    protected $primaryKey = 'id';
    protected $table = 'hari_besar_nasionals';
    const tableName = 'hari_besar_nasionals';
    const image_folder = '/assets/hari_besar_nasionals';
}
