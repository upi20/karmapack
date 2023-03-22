<?php

namespace App\Models\Kepengurusan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Spatie\Permission\Models\Role;

class Jabatan extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'no_urut',
        'nama',
        'slug',
        'foto',
        'singkatan',
        'visi',
        'misi',
        'slogan',
        'status',
        'role_id',
        'periode_id',
        'parent_id',
    ];

    protected $primaryKey = 'id';
    protected $table = 'pengurus_jabatans';
    const tableName = 'pengurus_jabatans';
    const image_folder = '/assets/pengurus/jabatan';
    const image_default = 'assets/image/logo_default.png';

    public function parent()
    {
        return $this->belongsTo($this::class, 'parent_id', 'id');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function anggotas()
    {
        return $this->hasMany(Anggota::class, 'jabatan_id', 'id');
    }

    public function childern()
    {
        $jabatan_id = $this->attributes['id'];
        return self::where('parent_id', $jabatan_id)->orderBy('no_urut')->get();
    }

    public function fotoUrl()
    {
        $foto = $this->attributes['foto'];
        return $foto ? url(self::image_folder . '/' . $foto) : asset('assets/image/logo_default.png');
    }

    public function fotoUrlDefault()
    {
        return url(self::image_default);
    }

    public function pengurus()
    {
        $turunan = $this->childern();
        $turunan_result = [];
        foreach ($turunan as $child) {
            $pejabat = $child->anggotas()->with('anggota.user')->get();
            if ($pejabat->count() > 0) {
                $pejabat_res = $pejabat->count() > 1 ? $pejabat : $pejabat[0];
                $turunan_result[] = (object)[
                    'jabatan' => $child,
                    'pejabat' => $pejabat_res,
                    'list' => $pejabat->count() > 1
                ];
            }
        }
        return $turunan_result;
    }
}
