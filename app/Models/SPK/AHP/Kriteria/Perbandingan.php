<?php

namespace App\Models\SPK\AHP\Kriteria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Perbandingan extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'id',
        'kriteria_x_id',
        'kriteria_y_id',
        'nilai',
    ];

    protected $primaryKey = 'id';
    protected $table = 'spk_ahp_kriteria_perbandingan';
    const tableName = 'spk_ahp_kriteria_perbandingan';
}
