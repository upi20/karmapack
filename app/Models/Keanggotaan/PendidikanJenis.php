<?php

namespace App\Models\Keanggotaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanJenis extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'keterangan',
        'status',
    ];

    protected $primaryKey = 'id';
    protected $table = 'anggota_pendidikan_jenis';
    const tableName = 'anggota_pendidikan_jenis';

    public function pendidikans()
    {
        return $this->hasMany(Pendidikan::class, 'jenis_id', 'id');
    }
}
