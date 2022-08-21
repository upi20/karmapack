<?php

use App\Models\Menu\Admin as MenuAdmin;
use App\Models\Menu\Frontend as MenuFrontend;
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

if (!function_exists('menu_parse_frontend')) {
    /**
     * Helpers for build menu.
     *
     * @return array
     */
    function menu_parse_frontend($items, $navigation = '')
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
        $menu = MenuAdmin::menuHasRole($user_id);
        return menu_parse($menu);
    }
}

if (!function_exists('menu_frontend')) {
    /**
     * Helpers for build menu_frontend.
     *
     * @return array
     */
    function menu_frontend()
    {
        $menu = MenuFrontend::all_view();
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
        $user_id = auth_has_role(config('app.super_admin_role')) ? null : auth()->user()->id;
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

if (!function_exists('navbar_menu_front')) {
    function navbar_menu_front($navigation = '')
    {
        // route builder
        $route_build = function (string $route) {
            if (Route::has($route)) {
                return route($route);
            } else {
                if ($route == '' || $route == '#') {
                    return '#';
                } else {
                    return str_parse($route);
                }
            }
        };

        // get menu list
        $menus = menu_parse(MenuFrontend::all_view());
        $menu_body = '';
        foreach ($menus as $m) {
            $menu = (object)$m;

            // 1 check separator
            $separator = $menu->type == 0;

            // menu_url
            $menu->url = $route_build($menu->route);
            // active
            $menu->active = $menu->active || ($menu->route === $navigation) || $menu->url == current_url();
            $active_class = $menu->active ? 'active' : '';

            if ($separator) {
                // separator
                // $menu_body .= "<li class=\"sub-category\"><h3>{$menu->title}</h3></li> ";
            } elseif ($menu->children) {
                $child_menu = '';
                $child_active = false;
                foreach ($menu->children as $c) {
                    $child = (object)$c;
                    $child->url = $route_build($child->route);
                    $child->active = $child->active || ($child->route === $navigation) || $child->url == current_url();;

                    // child
                    $active_class1 = $child->active ? ' openmenu ' : '';
                    $active_class = $child->active ? ' text-primary' : '';
                    $child_menu .= "<li><a class=\"$active_class1 $active_class\" href=\"$child->url\">$child->title</a></li>";

                    if ($child->active) $child_active = $child->active;
                }
                $active = $menu->active || $child_active;
                $active_1 = $active ? ' class="openmenu active"' : '';
                $active_2 = $active ? '<i class="icon-arrow-down switch"></i>' : '';
                $active_3 = $active ? ' style="display: block;"' : '';
                $menu_body .= "<li $active_1>
                                    <a href=\"#\">$menu->title</a>
                                    $active_2
                                    <ul class=\"submenu\" $active_3>
                                        $child_menu
                                    </ul>
                                </li>";
            } else {
                $menu_body .= " <li class=\"$active_class\"> <a href=\"$menu->url\">$menu->title</a> </li>";
            }
        }


        // head element
        $menu_head = '<ul class="vertical-menu">';

        // Menu Extra =================================================================================
        $dashboard = route('dashboard');
        $dashboard = "<li><a href=\"$dashboard\">Dashboard</a></li>";
        $login = route('login');
        $login = "<li><a href=\"$login\">Login</a></li>";
        $menu_extra = auth()->user() ? $dashboard : $login;
        // Menu Extra =================================================================================

        $menu_footer = $menu_extra . '</ul>';
        return $menu_head . $menu_body . $menu_footer;
    }
}

if (!function_exists('navbar_menu_front_topbar')) {
    function navbar_menu_front_topbar($navigation = '')
    {
        // route builder
        $route_build = function (string $route) {
            if (Route::has($route)) {
                return route($route);
            } else {
                if ($route == '' || $route == '#') {
                    return '#';
                } else {
                    return str_parse($route);
                }
            }
        };

        // get menu list
        $menus = menu_parse(MenuFrontend::all_view());
        $menu_body = '';
        foreach ($menus as $m) {
            $menu = (object)$m;

            // 1 check separator
            $separator = $menu->type == 0;

            // menu_url
            $menu->url = $route_build($menu->route);
            // active
            $menu->active = $menu->active || ($menu->route === $navigation) || $menu->url == current_url();
            $active_class = $menu->active ? 'active' : '';

            if ($separator) {
                // separator
                // $menu_body .= "<li class=\"sub-category\"><h3>{$menu->title}</h3></li> ";
            } elseif ($menu->children) {
                $child_menu = '';
                $child_active = false;
                foreach ($menu->children as $c) {
                    $child = (object)$c;
                    $child->url = $route_build($child->route);
                    $child->active = $child->active || ($child->route === $navigation) || $child->url == current_url();;

                    // child
                    $active_class = $child->active ? ' text-primary' : '';
                    $child_menu .= "<li><a class=\"dropdown-item $active_class\" href=\"$child->url\">$child->title</a></li>";

                    if ($child->active) $child_active = $child->active;
                }
                $active_2 = ($menu->active || $child_active) ? 'active' : '';

                $menu_body .= "<li class=\"nav-item dropdown $active_2\">
                                <a class=\"nav-link dropdown-toggle\" href=\"#\">$menu->title</a>
                                <ul class=\"dropdown-menu\">
                                    $child_menu
                                </ul>
                            </li>";
            } else {
                $menu_body .= "
                <li class=\"nav-item  $active_class\">
                    <a class=\"nav-link\" href=\"$menu->url\">$menu->title</a>
                </li>";
            }
        }


        // head element
        $menu_head = '<ul class="navbar-nav">';

        // Menu Extra =================================================================================
        $dashboard = route('dashboard');
        $dashboard = "<li class=\"nav-item \">
                        <a class=\"nav-link\" href=\"$dashboard\">Dashboard</a>
                    </li>";
        $login = route('login');
        $login = "<li class=\"nav-item \">
                        <a class=\"nav-link\" href=\"$login\">Login</a>
                    </li>";
        $menu_extra = auth()->user() ? $dashboard : $login;
        // Menu Extra =================================================================================
        $menu_footer = $menu_extra . '</ul>';
        return $menu_head . $menu_body . $menu_footer;
    }
}

if (!function_exists('navbar_menu_front2')) {
    function navbar_menu_front2($navigation = '')
    {
        // route builder
        $route_build = function (string $route) {
            if (Route::has($route)) {
                return route($route);
            } else {
                if ($route == '' || $route == '#') {
                    return '#';
                } else {
                    return str_parse($route);
                }
            }
        };

        // get menu list
        $menus = menu_parse(MenuFrontend::all_view());
        $menu_body = '';

        // active class
        $active_class_src = 'class="text-white bg-dark-1 -rounded px-20 mx-2" style="border-radius: 24px; border:1px solid #140342"';
        foreach ($menus as $m) {
            $menu = (object)$m;

            // 1 check separator
            $separator = $menu->type == 0;

            // menu_url
            $menu->url = $route_build($menu->route);
            // active
            $menu->active = $menu->active || ($menu->route === $navigation) || $menu->url == current_url();
            $active_class = $menu->active ? $active_class_src : '';
            if ($separator) {
                // separator
                // $menu_body .= "<li class=\"sub-category\"><h3>{$menu->title}</h3></li> ";
            } elseif ($menu->children) {
                $child_menu = '';
                $child_active = false;
                foreach ($menu->children as $c) {
                    $child = (object)$c;
                    $child->url = $route_build($child->route);
                    $child->active = $child->active || ($child->route === $navigation) || $child->url == current_url();;
                    $menu_active = $child->active ? $active_class_src : '';
                    $child_menu .= "<li><a data-barba=\"\" href=\"$child->url\" $menu_active>$child->title</a></li>";
                    if ($child->active) $child_active = $child->active;
                }

                $menu_active = ($menu->active || $child_active) ? $active_class_src : '';
                $menu_body .= <<<HTML
                    <li class="menu-item-has-children">
                        <a data-barba href="#" $menu_active>
                            $menu->title <i class="icon-chevron-right text-13 ml-10"> </i>
                        </a>

                        <ul class="list-style-none subnav">
                            <li class="menu__backButton js-nav-list-back">
                                <a href="#">
                                    <i class="icon-chevron-left text-13 mr-10"></i> $menu->title
                                </a>
                            </li>
                            $child_menu
                        </ul>
                    </li>
                HTML;
            } else {
                $menu_body .= "<li><a data-barba=\"\" href=\"$menu->url\" $active_class>$menu->title</a></li>";
            }
        }
        return $menu_body;
    }
}
