<?php

namespace App\Models\Kepengurusan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Jabatan extends Model
{
    use HasFactory;
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
}
