<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class SettingActivity extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'key',
        'value',
    ];
    protected $primaryKey = 'id';
    protected $table = 'setting_activities';
    const tableName = 'setting_activities';
}
