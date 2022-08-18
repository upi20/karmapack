<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HariBesarNasional extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'hari_besar_nasionals';
    const tableName = 'hari_besar_nasionals';
    const image_folder = '/assets/hari_besar_nasionals';
}
