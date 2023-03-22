<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Province extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'id',
        'name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'address_provinces';
    const tableName = 'address_provinces';
}
