<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class FAQ extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'nama',
        'link',
        'jawaban',
        'type',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'faq';
    const tableName = 'faq';
}
