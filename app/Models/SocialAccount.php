<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class SocialAccount extends Model
{
    use HasFactory, Loggable;
    protected $table = 'social_accounts';
    const tableName = 'social_accounts';
    protected $fillable = [
        'user_id',
        'provider_id',
        'provider_name',
        'provider_data',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getProviderData()
    {
        $data = $this->attributes['provider_data'];
        try {
            return is_null($data) ? null : json_decode($data);
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function getTanggal()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->format("Y-m-d\TH:i:s.000+07:00");
    }
}
