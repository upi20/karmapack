<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class UsernameValidation extends Model
{
    use HasFactory, Loggable;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'username_validations';
    const tableName = 'username_validations';
}
