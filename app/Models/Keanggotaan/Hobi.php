<?php

namespace App\Models\Keanggotaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'anggota_id'
    ];

    protected $primaryKey = 'id';
    protected $table = 'anggota_hobis';
    const tableName = 'anggota_hobis';

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id', 'id');
    }
}
