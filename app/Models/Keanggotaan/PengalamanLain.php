<?php

namespace App\Models\Keanggotaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class PengalamanLain extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'pengalaman',
        'keterangan',
        'anggota_id',
    ];

    protected $primaryKey = 'id';
    protected $table = 'anggota_pengalaman_lains';
    const tableName = 'anggota_pengalaman_lains';

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id', 'id');
    }
}
