<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class NotifAdminAtas extends Model
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
    protected $table = 'notif_admin_atas';
    const tableName = 'notif_admin_atas';
    const image_folder = '/assets/utility/notif_admin_atas';
}
