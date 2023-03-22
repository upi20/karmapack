<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class FooterInstagram extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'nama',
        'url',
        'foto',
        'order',
        'keterangan',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'footer_instagrams';
    const tableName = 'footer_instagrams';
    const image_folder = '/assets/footer_instagram';
}
