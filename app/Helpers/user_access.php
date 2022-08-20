<?php
if (!function_exists('auth_has_role')) {
    function auth_has_role($param)
    {
        return auth()->user()->hasRole($param);
    }
}

if (!function_exists('auth_can')) {
    function auth_can(string $route)
    {
        return auth()->user()->can($route);
    }
}


if (!function_exists('is_admin')) {
    function is_admin()
    {
        return auth_has_role(config('app.super_admin_role'));
    }
}
