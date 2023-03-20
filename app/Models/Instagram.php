<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    use HasFactory;
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
