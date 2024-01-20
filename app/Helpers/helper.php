<?php

use App\Models\Contact\ListContact;
use App\Models\SocialMedia;
use App\Models\Utility\NotifAdminAtas;
use App\Models\Utility\NotifDepanAtas;
use Illuminate\Support\Facades\Blade;
use MatthiasMullie\Minify\JS;
use MatthiasMullie\Minify\CSS;
use App\Models\Menu\Admin as MenuAdmin;
use App\Models\SettingActivity;
use App\Models\Versioning;
use Illuminate\Support\Facades\Route;

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

if (!function_exists('feTopNotification')) {
    function feTopNotification()
    {
        return NotifDepanAtas::getFeViewData();
    }
}

if (!function_exists('beTopNotification')) {
    function beTopNotification()
    {
        return NotifAdminAtas::getFeViewData();
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

if (!function_exists('set_front')) {
    // settings prefix
    function set_front(string $param = ''): string
    {
        $pre = 'setting.front';
        return $pre . ($param == '' ? '' : ".$param");
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

if (!function_exists('str_parse')) {
    // settings prefix
    function str_parse(?string $text = '', array $addon = []): string
    {
        $replace = [
            ['search' => '__base_url__', 'replace' => url('')],
            ['search' => '__file_shared__', 'replace' => url('shared/files/shares')],
        ];
        $replace = array_merge($replace, $addon);
        $result = $text;

        foreach ($replace as $r) {
            $result = str_replace($r['search'], $r['replace'], $result);
        }
        return $result;
    }
}

if (!function_exists('current_url')) {
    // current url
    function current_url()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')  $url = "https://";
        else $url = "http://";
        // Append the host(domain name, ip) to the URL.
        $url .= $_SERVER['HTTP_HOST'];

        // Append the requested resource location to the URL
        $url .= $_SERVER['REQUEST_URI'];
        return trim($url, '/');
    }
}

if (!function_exists('check_image_youtube')) {
    function check_image_youtube(string $src): ?string
    {
        $data = explode('src="', $src);
        if (!isset($data[1])) {
            return null;
        }
        return get_youtube_id($data[1]);
    }
}

if (!function_exists('get_youtube_id')) {
    function get_youtube_id(string $data): ?string
    {
        $matches = null;
        preg_match(
            "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/",
            $data,
            $matches
        );
        return isset($matches[1]) ? $matches[1] : null;
    }
}

if (!function_exists('unsetByKey')) {
    function unsetByKey($array, $key)
    {
        if (is_array($key)) {
            foreach ($key as $k) {
                if (isset($array[$k])) {
                    unset($array[$k]);
                }
            }
        } else {
            if (isset($array[$key])) {
                unset($array[$key]);
            }
        }
        return $array;
    }
}

if (!function_exists('feSocialMedia')) {
    function feSocialMedia()
    {
        return SocialMedia::getFeViewData();
    }
}

if (!function_exists('get_file_attr_attribute')) {
    function get_file_attr_attribute(string $file)
    {
        $results = [
            'height' => null,
            'width' => null,
            'mime' => null,
            'bits' => null,
            'channels' => null,
        ];

        $cek = file_exists($file);


        if ($cek) {
            $result = getimagesize($file);
            $results['width'] = $result[0];
            $results['height'] = $result[1];
            $results['bits'] = $result['bits'];
            $results['channels'] = $result['channels'];
            $results['mime'] = $result['mime'];
            return (object)$results;
        } else {
            return (object)$results;
        }
    }
}

if (!function_exists('adminBreadcumb')) {
    // kasus
    // custom title
    // $page_attr = adminBreadcumb(h_prefix(min: 2), 'Ubah');

    // $page_attr = [
    //     'title' => $page_attr['title'],
    //     'navigation' => h_prefix(min: 2),
    //     'breadcrumbs' => $page_attr['breadcrumbs']
    // ];

    function adminBreadcumb($route, $title = null,  $addbreadcrumbs = [], $addDashboard = true, $isChild = false)
    {
        // deklarasi variable
        $dashboardTitle = env('ADMIN_BREADCRUMB_DEFAULT_TITLE');
        $dashboardRoute = env('ADMIN_BREADCRUMB_DEFAULT_ROUTE');
        $breadcrumbs = [];

        // get menu
        $routeData = MenuAdmin::with(['parent'])->select(['title', 'parent_id', 'route'])->where('route', $route)->first();
        $menuTitle = is_null($routeData) ? null : $routeData->title;

        // jika menu ingin ada dashboard
        if ($addDashboard) {
            $breadcrumbs[] = ['name' => $dashboardTitle, 'url' => $dashboardRoute];
        }

        if (($routeData != null) ? ($routeData->parent != null) : false) {
            $breadcrumbs[] =  [
                'name' => $routeData->parent->title,
                'url' => Route::has($routeData->parent->route) ? $routeData->parent->route : null
            ];
        }

        // digunakan jika ingin custom title makan menu utama nya di masukin ke breadcumb
        if ($isChild) {
            if (isset($routeData->route)) {
                $url = Route::has($routeData->route) ? $routeData->route : null;
            } else {
                $url = null;
            }
            $breadcrumbs[] =  [
                'name' => isset($routeData->title) ? $routeData->title : null,
                'url' => $url
            ];
        }

        if ($title !== null) {
            // dan title dari parameter title
            $menuTitle = $title;
        }

        return [
            'title' => $menuTitle,
            'breadcrumbs' => array_merge($breadcrumbs, $addbreadcrumbs),
        ];
    }
}

if (!function_exists('format_rupiah')) {
    function format_rupiah($angka)
    {
        if ($angka !== null) {
            $rupiah = number_format($angka, 0, ',', '.');
            return "Rp " . $rupiah;
        }

        return '';
    }
}

if (!function_exists('text_cutter')) {
    function text_cutter($text, $end = 200)
    {
        return (strlen($text) > $end) ? substr($text, 0, $end) . '...' : $text;
    }
}

if (!function_exists('url_params_generator')) {
    function url_params_generator(array $params = []): string
    {
        $results = "?";
        foreach ($params as $key => $value) {
            $results .= ($results == "?" ? '' : "&");
            $results .= "$key=$value";
        }
        return $results == "?" ? '' : $results;
    }
}

if (!function_exists('resource_loader')) {
    // $render output render langsung javascript output bukan url
    function resource_loader(?string $resource = null, ?string $blade_path = null, ?array $params = [], ?string $type = 'js', bool $render = false): string
    {
        if (is_null($resource) && $blade_path !== null) {
            $resource = str_replace('.', '/', $blade_path);
        }

        $params = array_merge([
            'k' => csrf_token(),
            'hpu' => h_prefix_uri(),
        ], $params);

        if ($render && $type == 'js') {
            return resource_loader_render_js($resource, $params);
        }

        if ($render && $type == 'css') {
            return resource_loader_render_css($resource, $params);
        }

        if (is_null($resource)) return '';
        $resource = str_parse($resource, [
            ['search' => '.js', 'replace' => ''],
            ['search' => '.css', 'replace' => ''],
        ]);

        $generate_params = url_params_generator($params);

        return url("loader/{$type}/{$resource}{$generate_params}");
    }
}

if (!function_exists('resource_loader_render_js')) {
    function resource_loader_render_js(string $resource, array $params = []): string
    {
        $full_path = resource_path("js/views/$resource.js");
        $minifier = new JS($full_path);
        $result = Blade::render($minifier->minify(), $params);

        if ($result == $full_path) {
            $result = "console.log('javascript {$resource} not found')";
        }

        return <<<HTML
            <script>
                $result
            </script>
        HTML;
    }
}

if (!function_exists('resource_loader_render_css')) {
    function resource_loader_render_css(string $resource, array $params = []): string
    {
        $full_path = resource_path("css/views/$resource.css");
        $minifier = new CSS($full_path);
        $result = Blade::render($minifier->minify(), $params);

        if ($result == $full_path) {
            $result = "/* {$resource} not found */ ";
        }

        return <<<HTML
            <style>
                {$result}
            </style>
        HTML;
    }
}

if (!function_exists('path_view')) {
    function path_view(string $view): string
    {
        return $view;
    }
}

if (!function_exists('l_prefix_uri')) {
    // loader prefix uri
    function l_prefix_uri(string $prefix, ?string $param = null, int $min = 0)
    {
        $prefix_uri = explode('/', $prefix);
        for ($i = 0; $i < $min; $i++) unset($prefix_uri[count($prefix_uri) - 1]);
        $prefix_uri = implode('/', $prefix_uri);
        return $param ? "$prefix_uri/$param" : $prefix_uri;
    }
}

if (!function_exists('l_prefix')) {
    // loader prefix uri
    function l_prefix(string $prefix, ?string $param = null, int $min = 0)
    {
        $prefix_uri = l_prefix_uri($prefix, $param, $min);
        return str_replace('/', '.', $prefix_uri);
    }
}

// setting activity
if (!function_exists('setting_get')) {
    function setting_get($key, $default = null)
    {
        return settings()->get($key, $default);
    }
}

if (!function_exists('setting_set')) {
    function setting_set($key, $value)
    {
        if (is_array($value) || is_object($value)) {
            $value = json_encode($value);
        } else if (is_bool($value)) {
            $value = $value ? 1 : 0;
        }
        // tracking
        $setting = SettingActivity::where('key', $key)->first();
        if (is_null($setting)) {
            $setting = new SettingActivity();
            $setting->key = $key;
            $setting->value = $value;
        } else {
            // parse to string
            $setting->value = $value;
        }
        $setting->save();

        return settings()->set($key, $value)->save();
    }
}

if (!function_exists('notif_depan_atas')) {
    function notif_depan_atas()
    {
        $now = date('Y-m-d');
        return NotifDepanAtas::whereRaw("(dari <= '$now') and (sampai >= '$now' or sampai is null )")->get();
    }
}

if (!function_exists('get_version')) {
    function get_version()
    {
        return Versioning::current();
    }
}
