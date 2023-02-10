<?php

namespace App\Models\Keanggotaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanOrganisasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'dari',
        'sampai',
        'jabatan',
        'keterangan',
        'anggota_id',
    ];

    protected $primaryKey = 'id';
    protected $table = 'anggota_pengalaman_organisasis';
    const tableName = 'anggota_pengalaman_organisasis';

    public function anggota()
    {
        $this->belongsTo(Anggota::class, 'anggota_id', 'id');
    }
}
