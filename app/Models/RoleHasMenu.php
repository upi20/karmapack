<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class RoleHasMenu extends Model
{
    use HasFactory, Loggable;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'p_role_has_menu';
    const tableName = 'p_role_has_menu';
}
