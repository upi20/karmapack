<?php

namespace App\Models\Pendaftaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GForm extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'g_forms';
    const tableName = 'g_forms';
    const image_folder = '/assets/pendaftarans/gfrom';
}
