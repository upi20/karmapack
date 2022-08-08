<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifDepanAtas extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'notif_depan_atas';
    const tableName = 'notif_depan_atas';
    const image_folder = '/assets/utility/notif_depan_atas';
}
