<?php

namespace App\Models\Keanggotaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_id',
        'anggota_id',
        'nilai',
    ];

    protected $primaryKey = 'id';
    protected $table = 'anggota_kontaks';
    const tableName = 'anggota_kontaks';

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id', 'id');
    }

    public function jenis()
    {
        return $this->belongsTo(KontakJenis::class, 'jenis_id', 'id');
    }
}
