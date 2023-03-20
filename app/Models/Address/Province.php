<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'address_provinces';
    const tableName = 'address_provinces';
}
