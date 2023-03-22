<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class SocialMedia extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'nama',
        'icon',
        'url',
        'order',
        'keterangan',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'social_media';
    const tableName = 'social_media';
}
