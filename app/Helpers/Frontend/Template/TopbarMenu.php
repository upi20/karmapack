<?php

namespace App\Helpers\Frontend\Template;

use Illuminate\Support\Facades\Route;

class TopbarMenu
{
    private $navigation = '';
    private $menus = [];
    private $extend = [];

    public function __construct(array $menus, $navigation = '', $extend = [])
    {
        $this->menus = $menus;
        $this->navigation = $navigation;
        $this->extend = $extend;
    }

    public function generate(): string
    {
        $menu_body = '';
        foreach ($this->menus as $menu) {
            // 3 check name
            $name = isset($menu['name']) ? $menu['name'] : false;
            $menu = $name ? $this->getExtend($name) : $menu;

            // 1 check separator
            $separator = isset($menu['separator']) ? $menu['separator'] : false;

            // 2 check children
            $children = isset($menu['children']) ? $menu['children'] : false;

            if ($separator) {
                // not use separator
                // $menu_body .= "<li class=\"sub-category\"><h3>{$menu['title']}</h3></li> ";
            } elseif (is_array($children)) {
                $child_menu = '';
                $active = false;
                foreach ($children as $child) {
                    $child_filter = $this->filterMenu($child);
                    $active_class = $child_filter->active ? ' text-primary' : '';
                    $child_menu .= "<li><a class=\"dropdown-item $active_class\" href=\"$child_filter->route\">$child_filter->title</a></li>";

                    if ($child_filter->active) {
                        $active = $child_filter->active;
                    }
                }

                $menu = $this->filterMenu($menu);
                $active_2 = $active ? 'active' : '';
                $menu_body .= "<li class=\"nav-item dropdown $active_2\">
                                <a class=\"nav-link dropdown-toggle\" href=\"#\">$menu->title</a>
                                <ul class=\"dropdown-menu\">
                                    $child_menu
                                </ul>
                            </li>";
            } else {
                $menu = $this->filterMenu($menu);
                $menu_body .= "
                <li class=\"nav-item  $menu->active_class\">
                    <a class=\"nav-link\" href=\"$menu->route\">$menu->title</a>
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

    private function checkActive($route, $param): bool
    {
        // mempunyai parameter
        if (is_array($this->navigation) && count($this->navigation) == 2) {
            $route_nav = $this->navigation[0];
            $param_nav = $this->navigation[1];
            return request()->routeIs($route_nav) && $param ==  $param_nav;
        } else {
            return request()->routeIs($route) || $this->navigation == $route;
        }
    }

    private function generate_route($route, $param = null, $metod = 'route'): string
    {
        if ($metod == 'route') {
            return $param ? $this->route_build($route, $param) : $this->route_build($route);
        } elseif ($metod == 'url') {
            return $param ? url("$route/$param") : url($route);
        } else {
            return $param ? $this->route_build($route, $param) : $this->route_build($route);
        }
    }

    private function route_build(string $route, $params = null)
    {
        if (Route::has($route)) {
            if ($params) return route($route, $params);
            else return route($route);
        } else return url('');
    }

    private function getExtend(string $name): array
    {
        $result = [];
        foreach ($this->extend as $e) {
            $name_e = isset($e['name']) ? $e['name'] : '';
            if ($name_e == $name) {
                $result = $e;
            }
        }
        return $result;
    }

    private function filterMenu($menu): object
    {
        $title = isset($menu['title']) ? $menu['title'] : '';
        $icon = isset($menu['icon']) ? $menu['icon'] : '';
        $route = isset($menu['route']) ? $menu['route'] : '#';
        $metod = isset($menu['route_type']) ? $menu['route_type'] : 'route';
        $param = isset($menu['param']) ? $menu['param'] : null;
        $active = $this->checkActive($route, $param, $metod);
        $active_class = $active ? 'active' : '';
        $route = $route == '#' ? '#' : $this->generate_route($route, $param, $metod);
        return (object) [
            'title' => $title,
            'route' => $route,
            'icon' => $icon,
            'active' => $active,
            'active_class' => $active_class,
        ];
    }
}
