<?php

namespace App\Models\SPK\AHP\Alternatif;

use App\Models\SPK\AHP\Kriteria\Kriteria as KriteriaKriteria;
use App\Models\SPK\AHP\Kriteria\Jenis\Jenis as KriteriaJenis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Kriteria extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'id',
        'alternatif_id',
        'kriteria_id',
        'kriteria_jenis_id',
    ];

    protected $primaryKey = 'id';
    protected $table = 'spk_ahp_alternatif_kriteria';
    const tableName = 'spk_ahp_alternatif_kriteria';

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id', 'id');
    }

    public function kriteria()
    {
        return $this->belongsTo(KriteriaKriteria::class, 'kriteria_id', 'id');
    }

    public function kriteria_jenis()
    {
        return $this->belongsTo(KriteriaJenis::class, 'kriteria_jenis_id', 'id');
    }
}
