<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Instagram extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'id',
        'nama',
        'tanggal',
        'keterangan',
        'status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'instagram';
    const tableName = 'instagram';
}
