<?php
// menu bidang
function menu_bidang()
{
    function menu_bidang_get()
    {
        // get periode aktif
        $periode = \App\Models\Pengurus\Periode::where('status', '=', '1')
            ->select(['id'])
            ->first();
        if ($periode) {
            // get menu where sum menu count > 0
            $a = \App\Models\Pengurus\Jabatan::tableName;
            $where = " (
                ((select count(*) from $a as z where z.parent_id = $a.id) > 0) and
                (`status` = 1)
            )";

            $periode_jabatan = \App\Models\Pengurus\Jabatan::select(['id', 'nama', 'slug'])
                ->whereRaw($where)
                ->orderBy('no_urut')
                ->get();
            return $periode_jabatan->toArray();
        } else {
            return [];
        }
    }

    $menus_temp = [];
    foreach (menu_bidang_get() as $m) {
        $menus_temp[] = [
            'title' => $m['nama'],
            'route' => 'bidang/' . $m['slug'],
            'route_type' => 'url',
        ];
    }

    return [['name' => 'bidang', 'title' => 'Bidang', 'children' => $menus_temp]];
}

// main function
function sidebarMenu(array $menus, $navigation, $extend = []): string
{
    // dd($navigation);
    function checkActive($route, $navigation): bool
    {
        return request()->routeIs($route) || $navigation == $route;
    }

    function generate_route($route, $param = null, $metod = 'route')
    {
        if ($metod == 'route') {
            return $param ? route($route, $param) : route($route);
        } elseif ($metod == 'url') {
            return $param ? url("$route/$param") : url($route);
        } else {
            return $param ? route($route, $param) : route($route);
        }
    }

    // main function
    function filterMenu($menu, $navigation): object
    {
        $title = isset($menu['title']) ? $menu['title'] : '';
        $icon = isset($menu['icon']) ? $menu['icon'] : '';
        $route = isset($menu['route']) ? $menu['route'] : '#';
        $metod = isset($menu['route_type']) ? $menu['route_type'] : 'route';
        $param = isset($menu['param']) ? $menu['param'] : null;
        $active = checkActive($route, $navigation);
        $active_class = $active ? 'active' : '';
        $route = $route == '#' ? '#' : generate_route($route, $param, $metod);
        return (object) [
            'title' => $title,
            'route' => $route,
            'icon' => $icon,
            'active' => $active,
            'active_class' => $active_class,
        ];
    }

    // get by name
    function getExtend(string $name, array $extend): array
    {
        $result = [];
        foreach ($extend as $e) {
            $name_e = isset($e['name']) ? $e['name'] : '';
            if ($name_e == $name) {
                $result = $e;
            }
        }
        return $result;
    }

    $menu_body = '';
    foreach ($menus as $menu) {
        // 3 check name
        $name = isset($menu['name']) ? $menu['name'] : false;
        $menu = $name ? getExtend($name, $extend) : $menu;

        // 1 check separator
        $separator = isset($menu['separator']) ? $menu['separator'] : false;

        // 2 check children
        $children = isset($menu['children']) ? $menu['children'] : false;

        if ($separator) {
            $menu_body .= "<li class=\"sub-category\"><h3>{$menu['title']}</h3></li> ";
        } elseif (is_array($children)) {
            $child_menu = '';
            $active = false;
            foreach ($children as $child) {
                $child_filter = filterMenu($child, $navigation);
                $child_menu .= "<li><a href=\"$child_filter->route\" class=\"slide-item $child_filter->active_class\">$child_filter->title</a></li>";

                if ($child_filter->active) {
                    $active = $child_filter->active;
                }
            }

            $menu = filterMenu($menu, $navigation);
            $active_1 = $active ? 'is-expanded' : '';
            $active_2 = $active ? 'active' : '';
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
            $menu = filterMenu($menu, $navigation);
            $menu_body .= "<li class=\"slide\">
                                <a class=\"side-menu__item $menu->active_class\" data-bs-toggle=\"slide\" href=\"$menu->route\">
                                    <i class=\"side-menu__icon $menu->icon\"></i>
                                    <span class=\"side-menu__label\">$menu->title</span>
                                </a>
                            </li>";
        }
    }

    // head element
    $menu_head = '<ul class="side-menu">';

    // Dashboard
    $dashboard = route('dashboard');

    $dashboard = "<li class=\"slide\">
                        <a class=\"side-menu__item\" data-bs-toggle=\"slide\" href=\"$dashboard\">
                            <i class=\"\"></i>
                            <span class=\"side-menu__label\">Dashboard</span>
                        </a>
                    </li>";

    $login = route('login');

    $login = "<li class=\"slide\">
                        <a class=\"side-menu__item\" data-bs-toggle=\"slide\" href=\"$login\">
                            <i class=\"\"></i>
                            <span class=\"side-menu__label\">Log In</span>
                        </a>
                    </li>";
    $menu_footer = (auth()->user() ? $dashboard : $login) . '</ul>';
    return $menu_head . $menu_body . $menu_footer;
}
?>


<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ url('/') }}">
                <img src="{{ asset('assets/templates/admin/images/brand/logo.png') }}"
                    class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('assets/templates/admin/images/brand/logo-1.png') }}"
                    class="header-brand-img toggle-logo" alt="logo">
                <img src="{{ asset('assets/templates/admin/images/brand/logo-2.png') }}"
                    class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('assets/templates/admin/images/brand/logo-3.png') }}"
                    class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            {!! sidebarMenu(app('config')->get('menu_list')['frontend'], $page_attr_navigation, menu_bidang()) !!}
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>
<!--/APP-SIDEBAR-->
