<?php

namespace App\Models\SPK\AHP\Alternatif;

use App\Models\Keanggotaan\Anggota;
use App\Models\SPK\AHP\Alternatif\Kriteria as AlternatifKriteria;
use App\Models\SPK\AHP\Kriteria\Jenis\Jenis;
use App\Models\SPK\AHP\Kriteria\Kriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Alternatif extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'id',
        'anggota_id'
    ];

    protected $primaryKey = 'id';
    protected $table = 'spk_ahp_alternatif';
    const tableName = 'spk_ahp_alternatif';

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id', 'id');
    }

    public function kriterias()
    {
        return $this->hasMany(Kriteria::class, 'alternatif_id', 'id');
    }

    public static function table()
    {
        $kriterias = Kriteria::all();

        $alternatifs = static::with('anggota')->get();

        $results = [];
        foreach ($alternatifs as $alternatif) {
            $result = [];
            // x ke 0 nama
            $result[] = $alternatif->anggota->nama;

            // cari alternatif kriteria -> kriteria jenis -> name
            foreach ($kriterias as $kriteria) {
                $ak = AlternatifKriteria::with('kriteria_jenis')->where('alternatif_id', $alternatif->id)
                    ->where('kriteria_id', $kriteria->id)->first();
                $result[] = is_null($ak) ? '' : $ak->kriteria_jenis->nama;
            }

            $results[] = $result;
        }

        $headers = [];
        foreach ($kriterias as $kriteria) {
            $headers[] = $kriteria->nama;
        }

        return [
            "header" => $headers,
            "body" => $results,
        ];
    }
}
