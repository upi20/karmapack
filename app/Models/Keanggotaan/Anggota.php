<?php

namespace App\Models\Keanggotaan;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_anggota',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'angkatan',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'alamat_lengkap',
        'bio',
        'profesi',
        'foto',
        'telepon',
        'whatsapp',
        'status',
        'user_id',
    ];

    protected $primaryKey = 'id';
    protected $table = 'anggotas';
    const tableName = 'anggotas';
    const image_default = 'assets/anggota/anggota_default.png';
    const image_folder = '/assets/anggota';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function hobis()
    {
        return $this->hasMany(Hobi::class, 'anggota_id', 'id');
    }

    public function kontaks()
    {
        return $this->hasMany(Kontak::class, 'anggota_id', 'id');
    }

    public function pendidikans()
    {
        return $this->hasMany(Pendidikan::class, 'anggota_id', 'id');
    }

    public function pengalamanLains()
    {
        return $this->hasMany(PengalamanLain::class, 'anggota_id', 'id');
    }

    public function pengalamanOrganisasis()
    {
        return $this->hasMany(PengalamanOrganisasi::class, 'anggota_id', 'id');
    }

    public function fotoUrl()
    {
        $foto = $this->attributes['foto'];
        return $foto ? url(self::image_folder . '/' . $foto) : asset(self::image_default);
    }
}
