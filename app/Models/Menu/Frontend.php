<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Frontend extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'p_menu_frontends';
    const tableName = 'p_menu_frontends';

    public static function getAll()
    {
        $table = self::tableName;
        DB::statement("SET SQL_MODE=''");
        $menu = DB::table($table)->select([
            "$table.id",
            "$table.parent_id",
            "$table.title",
            "$table.icon",
            "$table.route",
            "$table.sequence",
            DB::raw("b.title as parent"),
            DB::raw("$table.active as status"),
            "$table.type",
        ]);
        $menu->leftJoin("$table as b", "b.id", "=", "$table.parent_id");
        $menu->groupBy("$table.id");
        $menu->orderBy("$table.sequence", 'asc');

        return $menu->get();
    }

    public static function all_view()
    {
        $table = self::tableName;
        DB::statement("SET SQL_MODE=''");
        $menu = DB::table($table)->select([
            "$table.id",
            "$table.parent_id",
            "$table.title",
            "$table.icon",
            "$table.route",
            "$table.sequence",
            DB::raw("b.title as parent"),
            DB::raw("$table.active as status"),
            "$table.type",
        ])
            ->leftJoin("$table as b", "b.id", "=", "$table.parent_id")
            ->groupBy("$table.id")
            ->where("$table.active", '=', 1)
            ->orderBy("$table.sequence", 'asc');

        return $menu->get();
    }
}
