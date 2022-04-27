<?php

namespace App\Helpers\Frontend\Template;

class SidebarMenu
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
                    $active_1 = $child_filter->active ? ' text-primary' : '';
                    $child_menu .= "<li><a class=\"$child_filter->active_class $active_1\" href=\"$child_filter->route\">$child_filter->title</a></li>";

                    if ($child_filter->active) {
                        $active = $child_filter->active;
                    }
                }

                $menu = $this->filterMenu($menu);
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
                $menu = $this->filterMenu($menu);
                $menu_body .= " <li class=\"$menu->active_class\"> <a href=\"$menu->route\">$menu->title</a> </li>";
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

    private function checkActive($route): bool
    {
        return request()->routeIs($route) || $this->navigation == $route;
    }

    private function generate_route($route, $param = null, $metod = 'route'): string
    {
        if ($metod == 'route') {
            return $param ? route($route, $param) : route($route);
        } elseif ($metod == 'url') {
            return $param ? url("$route/$param") : url($route);
        } else {
            return $param ? route($route, $param) : route($route);
        }
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
        $active = $this->checkActive($route);
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
