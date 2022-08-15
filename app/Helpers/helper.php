<?php

use App\Models\Menu;
use App\Models\Utility\NotifDepanAtas;
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

if (!function_exists('sidebar_menu_admin')) {
    /**
     * Helpers for build menu admin sidebar admin.
     *
     * @return array
     */
    function sidebar_menu_admin($navigation = null)
    {
        $user_id = auth()->user()->hasRole(config('app.super_admin_role')) ? null : auth()->user()->id;
        $menus = menu($user_id);
        $menu_body = '';
        foreach ($menus as $m) {
            $menu = (object)$m;

            // 1 check separator
            $separator = $menu->type == 0;

            // active
            $menu->active = $menu->active || ($menu->route === $navigation);
            $active_class = $menu->active ? 'active' : '';

            if ($separator) {
                // separator
                $menu_body .= "<li class=\"sub-category\"><h3>{$menu->title}</h3></li> ";
            } elseif ($menu->children) {
                $child_menu = '';
                $child_active = false;
                foreach ($menu->children as $c) {
                    $child = (object)$c;
                    $child->active = $child->active || ($child->route === $navigation);
                    $active = $child->active ? 'active' : '';
                    $child_menu .= "<li><a href=\"$child->url\" class=\"slide-item $active\">$child->title</a></li>";
                    if ($child->active) $child_active = $child->active;
                }

                $active_1 = ($menu->active || $child_active) ? 'is-expanded' : '';
                $active_2 = ($menu->active || $child_active) ? 'active' : '';
                $menu_body .= " <li class=\"slide $active_1\">
                                    <a class=\"side-menu__item $active_1 $active_2\" data-bs-toggle=\"slide\" href=\"javascript:void(0)\">
                                        <i class=\"side-menu__icon $menu->icon\"></i>
                                        <span class=\"side-menu__label\">$menu->title</span>
                                        <i class=\"angle fe fe-chevron-right\"></i>
                                    </a>
                                    <ul class=\"slide-menu\">
                                        $child_menu
                                    </ul>
                                </li> ";
            } else {
                $menu_body .= "<li class=\"slide\">
                        <a class=\"side-menu__item $active_class\" data-bs-toggle=\"slide\" href=\"$menu->url\">
                            <i class=\"side-menu__icon $menu->icon\"></i>
                            <span class=\"side-menu__label\">$menu->title</span>
                        </a>
                    </li>";
            }
        }

        // head element
        $menu_head = '<ul class="side-menu">';
        $menu_footer = '</ul>';
        return $menu_head . $menu_body . $menu_footer;
    }
}

if (!function_exists('auth_can')) {
    function auth_can(string $route)
    {
        return auth()->user()->can($route);
    }
}

if (!function_exists('auth_has_role')) {
    function auth_has_role($param)
    {
        return auth()->user()->hasRole($param);
    }
}

if (!function_exists('h_prefix_uri')) {
    function h_prefix_uri(?string $param = null, int $min = 0)
    {
        $prefix_uri = explode('/', trim(explode('?', $_SERVER['REQUEST_URI'])[0], '/'));
        for ($i = 0; $i < $min; $i++) unset($prefix_uri[count($prefix_uri) - 1]);
        $prefix_uri = implode('/', $prefix_uri);
        return $param ? "$prefix_uri/$param" : $prefix_uri;
    }
}

if (!function_exists('h_prefix')) {
    function h_prefix(?string $param = null, int $min = 0)
    {
        $prefix_uri = h_prefix_uri($param, $min);
        return str_replace('/', '.', $prefix_uri);
    }
}

if (!function_exists('is_admin')) {
    function is_admin()
    {
        return auth()->user()->hasRole(config('app.super_admin_role'));
    }
}
if (!function_exists('notif_depan_atas')) {
    function notif_depan_atas()
    {
        $now = date('Y-m-d');
        return NotifDepanAtas::whereRaw("(dari <= '$now') and (sampai >= '$now' or sampai is null )")->get();
    }
}

if (!function_exists('set_admin')) {
    // settings prefix
    function set_admin(string $param = ''): string
    {
        $pre = 'setting.admin';
        return $pre . ($param == '' ? '' : ".$param");
    }
}

if (!function_exists('str_parse')) {
    // settings prefix
    function str_parse(?string $text = ''): string
    {
        $replace = [
            ['search' => '__base_url__', 'replace' => url('')]
        ];
        $result = $text;

        foreach ($replace as $r) {
            $result = str_replace($r['search'], $r['replace'], $result);
        }
        return $result;
    }
}

if (!function_exists('delete_file')) {
    // delete file
    function delete_file(string $file): bool
    {
        $res_foto = true;
        if ($file != null && $file != '') {
            if (file_exists($file)) {
                $res_foto = unlink($file);
            }
        }
        return $res_foto;
    }
}

if (!function_exists('set_front')) {
    // settings prefix
    function set_front(string $param = ''): string
    {
        $pre = 'setting.front';
        return $pre . ($param == '' ? '' : ".$param");
    }
}
