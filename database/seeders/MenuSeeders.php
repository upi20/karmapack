<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\RoleHasMenu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = config('menu_list.admin');
        $sequence = 1;
        DB::table(Menu::tableName)->delete();
        DB::table(RoleHasMenu::tableName)->delete();
        foreach ($menus as $menu) {
            $type = isset($menu['separator']) ? 0 : 1;
            $title = isset($menu['title']) ? $menu['title'] : '';
            $icon = isset($menu['icon']) ? $menu['icon'] : '';
            $route = isset($menu['route']) ? $menu['route'] : '';
            $children = isset($menu['children']) ? $menu['children'] : [];

            $menu = Menu::create([
                'sequence' => $sequence,
                'type' => $type,
                'title' => $title,
                'icon' => $icon,
                'route' => $route,
                'active' => 1,
            ]);

            // insert role has menu
            RoleHasMenu::create([
                'role_id' => 1,
                'menu_id' => $menu->id,
            ]);

            foreach ($children as $c) {
                $sequence++;
                $title = isset($c['title']) ? $c['title'] : '';
                $icon = isset($c['icon']) ? $c['icon'] : '';
                $route = isset($c['route']) ? $c['route'] : '';
                $child = Menu::create([
                    'parent_id' => $menu->id,
                    'sequence' => $sequence,
                    'title' => $title,
                    'route' => $route,
                    'active' => 1,
                ]);

                // insert role has menu
                RoleHasMenu::create([
                    'role_id' => 1,
                    'menu_id' => $child->id,
                ]);
            }
            $sequence++;
        }
    }
}
