<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterInstagram extends Model
{
    use HasFactory;
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
