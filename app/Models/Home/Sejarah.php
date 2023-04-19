<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Sejarah extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'nama',
        'keterangan',
        'tahun',
    ];
    protected $primaryKey = 'id';
    protected $table = 'home_sejarah';
    const tableName = 'home_sejarah';
}
