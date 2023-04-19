<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class TrackerIPDetail extends Model
{
    use HasFactory, Loggable;
    protected $table = 'visitors_ip_detail';
    protected $fillable = [
        'ip',
        'city',
        'region',
        'country',
        'country_code',
        'loc',
        'timezone',
        'visitors_id',
    ];

    const tableName = 'visitors_ip_detail';

    public function tracker()
    {
        return $this->belongsTo(Tracker::class, 'visitors_id', 'id');
    }
}
