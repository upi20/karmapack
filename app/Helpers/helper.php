<?php

use App\Models\Menu;
use Illuminate\Support\Facades\Route;

if (!function_exists('menu_parse')) {
    /**
     * Helpers for build menu.
     *
     * @return array
     */
    function menu_parse($items, $navigation = '')
    {
        $active = function ($route, $navigation) {
            if (in_array($route, ['', null])) return false;
            return request()->routeIs($route) || $navigation == $route;
        };

        $parent = [];
        foreach ($items as $v) {
            if (is_null($v->parent_id)) $parent[] = (array)$v;
        }
        $menus = [];
        foreach ($parent as $p) {
            $children = [];
            $parent_active = $active($p['route'], $navigation);
            $child_active = false;
            foreach ($items as $v) {
                if ($v->parent_id == $p['id']) {
                    $c = (array)$v;
                    $c['active'] = $active($c['route'], $navigation);
                    $c['url'] = Route::has($c['route']) ? route($c['route']) : '#';
                    $children[] = $c;
                    if ($c['active']) $child_active = $c['active'];
                }
            }
            $p['active'] = $parent_active || $child_active;
            $p['url'] = Route::has($p['route']) ? route($p['route']) : '#';
            $menus[] = array_merge($p, ['children' => $children]);
        }
        return $menus;
    }
}

if (!function_exists('menu')) {
    /**
     * Helpers for build menu.
     *
     * @return array
     */
    function menu(?int $user_id = null)
    {
        $menu = Menu::menuHasRole($user_id);
        return menu_parse($menu);
    }
}
