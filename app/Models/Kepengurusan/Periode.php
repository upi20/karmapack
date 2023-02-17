<?php

namespace App\Models\Kepengurusan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Periode extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'foto',
        'dari',
        'sampai',
        'slug',
        'slogan',
        'visi',
        'misi',
        'filosofi_logo',
        'status',
    ];

    protected $primaryKey = 'id';
    protected $table = 'pengurus_periodes';
    const tableName = 'pengurus_periodes';
    const image_default = 'assets/image/logo_default.png';
    const image_folder = '/assets/periode';

    public function jabatans()
    {
        return $this->hasMany(Jabatan::class, 'periode_id', 'id');
    }

    public function fotoUrl()
    {
        $foto = $this->attributes['foto'];
        return $foto ? url(self::image_folder . '/' . $foto) : asset(self::image_default);
    }

    public function fotoUrlDefault()
    {
        return url(self::image_default);
    }

    public function pengurus()
    {
        $periode_id = $this->attributes['id'];
        $t_jabatan = Jabatan::tableName;

        // hitung child nya untuk menentukan apakah jabatan tersebut utama atau mempunyai bidang lain
        $count_child = <<<SQL
            (select count(*) from $t_jabatan as z where z.parent_id = $t_jabatan.id)
        SQL;
        $parents = Jabatan::select([
            DB::raw("$t_jabatan.*"),
            DB::raw("$count_child as child"),
        ])->where('periode_id', '=', $periode_id)
            ->where('parent_id', '=', null)
            ->orderBy('no_urut')
            ->get();


        // pisahkan menjadi dua yaitu utama untuk perseorangan dan bidang
        $results = [
            'utama' => [],
            'bidang' => [],
        ];

        foreach ($parents as $parent) {
            if ($parent->child > 0) {
                $turunan = $parent->childern();
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
                $results['bidang'][] = (object)[
                    'header' => $parent,
                    'body' => $turunan_result
                ];
            }
            // pengurus inti
            else {
                $pejabat = $parent->anggotas()->with('anggota.user')->first()->anggota;
                if ($pejabat) {
                    $results['utama'][] = (object)[
                        'jabatan' => $parent,
                        'pejabat' => $pejabat,
                        'list' => false
                    ];
                }
            }
        }

        return (object)$results;
    }
}
