<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class ListContact extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'nama',
        'icon',
        'url',
        'order',
        'keterangan',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'contact_list';
    const tableName = 'contact_list';
}
