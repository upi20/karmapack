<?php

namespace App\Models\Keanggotaan;

use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Address\Regencie;
use App\Models\Address\Village;
use App\Models\Kepengurusan\Anggota as KepengurusanAnggota;
use App\Models\Kepengurusan\Jabatan;
use App\Models\Kepengurusan\Periode;
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

    public function fotoFolder()
    {
        return self::image_folder;
    }

    public function anggotaKepengurusans()
    {
        return $this->hasMany(KepengurusanAnggota::class, 'anggota_id', 'id');
    }

    public function profileKepengurusans()
    {
        // Output:
        // 2022-2023 | Anggota -> Komunikasi dan Informasi
        // 2021-2022 | Anggota -> Komunikasi dan Informasi

        $table = KepengurusanAnggota::tableName;
        $t_jabatan = Jabatan::tableName;
        $t_periode = Periode::tableName;
        $id = $this->attributes['id'];

        $ifHaveParent = "if($t_jabatan.parent_id is null, '', concat(' -> ', (select j2.nama from $t_jabatan j2 where j2.id = $t_jabatan.parent_id limit 1)))";
        $selectRaw = "concat($t_periode.dari, '-',$t_periode.sampai, ' | ', $t_jabatan.nama, $ifHaveParent) as text";
        $gets = KepengurusanAnggota::selectRaw($selectRaw)
            ->join($t_jabatan, "$t_jabatan.id", "=", "$table.jabatan_id")
            ->join($t_periode, "$t_periode.id", "=", "$t_jabatan.periode_id")
            ->where("$table.anggota_id", $id)->orderBy("$t_periode.dari")
            ->get();

        $results = [];
        foreach ($gets ?? [] as $get) {
            $results[] = $get->text;
        }

        return $results;
    }

    // address
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function regencie()
    {
        return $this->belongsTo(Regencie::class, 'regency_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }
}
