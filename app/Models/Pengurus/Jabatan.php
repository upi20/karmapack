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

    public static function toMenu()
    {
        $tes = self::all();
        return $tes;
    }
}
