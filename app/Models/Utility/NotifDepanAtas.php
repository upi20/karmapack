<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class NotifDepanAtas extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'nama',
        'deskripsi',
        'dari',
        'sampai',
        'link',
        'link_nama',
    ];

    protected $primaryKey = 'id';
    protected $table = 'notif_depan_atas';
    const tableName = 'notif_depan_atas';
    const image_folder = '/assets/utility/notif_depan_atas';
    const feCacheKey = 'feNotifDepanAtas';

    public static function getFeViewData()
    {
        return Cache::rememberForever(static::feCacheKey, function () {
            $now = date('Y-m-d');
            return static::whereRaw("(dari <= '$now') and (sampai >= '$now' or sampai is null )")->get();
        });
    }

    public static function feClearCache()
    {
        return Cache::pull(static::feCacheKey);
    }
}
