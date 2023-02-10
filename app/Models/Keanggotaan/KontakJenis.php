<?php

namespace App\Models\Keanggotaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakJenis extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'icon',
        'keterangan',
        'status',
    ];

    protected $primaryKey = 'id';
    protected $table = 'anggota_kontak_jenis';
    const tableName = 'anggota_kontak_jenis';

    public function kontaks()
    {
        return $this->hasMany(Kontak::class, 'jenis_id', 'id');
    }
}
