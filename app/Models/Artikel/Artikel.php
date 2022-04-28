<?php

namespace App\Models\Artikel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'artikel';
    const tableName = 'artikel';
    const image_folder = '/assets/artikel';
}
