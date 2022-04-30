<?php

namespace App\Models\Pengurus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'pengurus_periode';
    const tableName = 'pengurus_periode';
    const image_folder = '/assets/pengurus/periode';

    public function fotoUrl()
    {
        $foto = $this->attributes['foto'];
        return $foto ? url(self::image_folder . '/' . $foto) : asset('assets/templates/frontend/images/logo/300x300.png');
    }
}
