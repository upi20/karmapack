<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
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
