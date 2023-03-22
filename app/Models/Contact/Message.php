<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Message extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'nama',
        'email',
        'message',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'contact_messages';
    const tableName = 'contact_messages';
}
