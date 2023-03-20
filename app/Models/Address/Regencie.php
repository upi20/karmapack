<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regencie extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'province_id',
        'name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'address_regencies';
    const tableName = 'address_regencies';
}
