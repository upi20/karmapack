<?php

namespace App\Models\Pendaftaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensus extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'pend_sensus';
    const tableName = 'pend_sensus';
}
