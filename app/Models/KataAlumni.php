<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KataAlumni extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sebagai',
        'deskripsi',
        'sequence',
        'profesi',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'kata_alumnis';
    const tableName = 'kata_alumnis';
    const image_folder = '/assets/kata_alumnis';

    public static function getHome(?int $limit = 6): mixed
    {
        DB::statement("SET SQL_MODE=''");
        $table = self::tableName;
        $t_user = User::tableName;

        $result = self::select([
            "$table.*",
            DB::raw("$t_user.name as user"),
            DB::raw("$t_user.foto as user_foto"),
            DB::raw("$t_user.username as user_username"),
            DB::raw("$t_user.id as user_id"),
        ])
            ->where("$table.status", '=', '1')
            ->join($t_user, "$t_user.id", '=', "$table.user_id")
            ->orderBy("$table.sequence")
            ->limit($limit)
            ->get();
        $result->map(function ($item) {
            $image_folder = User::image_folder;
            $item->user_foto = $item->user_foto ? url("$image_folder/$item->user_foto") : asset('assets/image/anggota_default.png');
            return $item;
        });
        return $result;
    }
}
