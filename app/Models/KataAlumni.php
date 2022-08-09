<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KataAlumni extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'kata_alumnis';
    const tableName = 'kata_alumnis';
    const image_folder = '/assets/kata_alumnis';
}
