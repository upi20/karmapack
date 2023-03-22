<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Village extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'id',
        'district_id',
        'name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'address_villages';
    const tableName = 'address_villages';
}
