<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifAdminAtas extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'notif_admin_atas';
    const tableName = 'notif_admin_atas';
    const image_folder = '/assets/utility/notif_admin_atas';
}
