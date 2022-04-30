<?php

namespace App\Models\Pengurus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'pengurus_periode_jabatan';
    const tableName = 'pengurus_periode_jabatan';
    const image_folder = '/assets/pengurus/jabatan';
    public function fotoUrl()
    {
        $foto = $this->attributes['foto'];
        return $foto ? url(self::image_folder . '/' . $foto) : asset('assets/templates/frontend/images/logo/300x300.png');
    }
}
