<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class SocialMedia extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'nama',
        'icon',
        'url',
        'order',
        'keterangan',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'social_media';
    const tableName = 'social_media';
    const feCacheKey = 'feSocialMedia';

    public static function getFeViewData()
    {
        return Cache::rememberForever(static::feCacheKey, function () {
            $get = static::where('status', '=', 1)
                ->orderBy('order')
                ->get();
            return $get ? $get->toArray() : [];
        });
    }

    public static function feClearCache()
    {
        return Cache::pull(static::feCacheKey);
    }
}
