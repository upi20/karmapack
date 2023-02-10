<?php

namespace App\Models\Kepengurusan;

use App\Models\Keanggotaan\Anggota as KeanggotaanAnggota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $fillable = [
        'jabatan_id',
        'anggota_id',
    ];

    protected $primaryKey = 'id';
    protected $table = 'pengurus_anggotas';
    const tableName = 'pengurus_anggotas';

    public function anggota()
    {
        return $this->belongsTo(KeanggotaanAnggota::class, 'anggota_id', 'id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }
}
