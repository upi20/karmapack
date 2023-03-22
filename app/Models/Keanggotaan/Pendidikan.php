<?php

namespace App\Models\Keanggotaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Pendidikan extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'jenis_id',
        'anggota_id',
        'dari',
        'sampai',
        'instansi',
        'jurusan',
        'keterangan',
    ];

    protected $primaryKey = 'id';
    protected $table = 'anggota_pendidikans';
    const tableName = 'anggota_pendidikans';

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id', 'id');
    }

    public function jenis()
    {
        return $this->belongsTo(PendidikanJenis::class, 'jenis_id', 'id');
    }
}
