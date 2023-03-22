<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class District extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'id',
        'regency_id',
        'name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'address_districts';
    const tableName = 'address_districts';
}
