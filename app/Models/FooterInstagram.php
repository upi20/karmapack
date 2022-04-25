<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterInstagram extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'footer_instagrams';
    const tableName = 'footer_instagrams';
    const image_folder = '/assets/footer_instagram';
}
