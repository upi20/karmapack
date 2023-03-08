<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    use HasFactory;
    protected $table = 'social_accounts';
    protected $fillable = [
        'user_id',
        'provider_id',
        'provider_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
