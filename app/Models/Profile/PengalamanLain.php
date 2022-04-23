<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanLain extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'pengurus_profile_pengalaman_lain';
    const tableName = 'pengurus_profile_pengalaman_lain';
}
