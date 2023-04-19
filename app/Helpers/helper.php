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

if (!function_exists('render_js')) {
    // render_js
    function render_js(string $path, array $data = []): string
    {
        $full_path = resource_path("js/views/$path");
        if (file_exists($full_path)) {
            $minifier = new JS($full_path);
            $result = Blade::render($minifier->minify(), $data);
            // $text = (string)file_get_contents($full_path);
            // $result = Blade::render($text, $data);
            return $result;
        } else {
            return "console.log('javascript {$path} not found')";
        }
    }
}

if (!function_exists('pagination_generate')) {
    // pagination for frontend
    function pagination_generate(object $datas, ?string $params = null): ?string
    {
        if (count($datas->data) < 1) return null;
        // generate pagination
        // active
        $active = isset($datas->links[$datas->current_page])  ? ($datas->links[$datas->current_page]->url ? '<li class="page-item active" title="Go to page ' . $datas->links[$datas->current_page]->label . '" aria-current="page">
            <a href="#" class="page-link">' . $datas->links[$datas->current_page]->label . '</a>
        </li>' : '') : '';

        $active_set = isset($datas->links[$datas->current_page]) ? ($datas->links[$datas->current_page]->url ? $datas->current_page : null) : null;

        // previous
        $previous = $datas->current_page != 1 ? '
            <li class="page-item" title="Go to page ' . $datas->links[0]->label . '" aria-current="page">
                <a href="' . $datas->links[0]->url . ($params ? '&' . $params : '') . '" class="page-link">&laquo;</a>
            </li>
        ' : '';

        // next
        $next = !($datas->current_page >= $datas->last_page) ? '
            <li class="page-item" title="Go to page ' . $datas->links[$datas->last_page + 1]->label . '" aria-current="page">
                <a href="' . $datas->links[$datas->last_page + 1]->url . ($params ? '&' . $params : '') . '" class="page-link">' . $datas->links[$datas->last_page + 1]->label . '</a>
            </li>
        ' : '';

        // first
        $first = !$datas->links[1]->active ? '
            <li class="page-item" title="Go to page ' . $datas->links[1]->label . '" aria-current="page">
                <a href="' . $datas->links[1]->url . ($params ? '&' . $params : '') . '" class="page-link">' . $datas->links[1]->label . '</a>
            </li>
        ' : '';

        $last = !$datas->links[$datas->last_page]->active ? '
            <li class="page-item" title="Go to page ' . $datas->links[$datas->last_page]->label . '" aria-current="page">
                <a href="' . $datas->links[$datas->last_page]->url . ($params ? '&' . $params : '') . '" class="page-link">' . $datas->links[$datas->last_page]->label . '</a>
            </li>
        ' : '';

        // $side_active = 4;
        // $active_before = '';
        // $active_before_count = 1;
        // $active_before_max = 2;

        $active_after = '';
        $active_after_count = 1;
        $active_after_max = 3;

        if ($active_set >= 1) {
            foreach ($datas->links as $k => $link) {
                if (
                    // lebih dari nomor aktif
                    ($k > $active_set) &&
                    // kurang dari dua angka di untuk next dan angka terakhir
                    ($k <= $datas->last_page - 1) &&
                    // kurang dari max
                    ($active_after_count <= $active_after_max)
                ) {
                    $active_after .= '<li class="page-item" title="Go to page ' . $link->label . '" aria-current="page">
                        <a href="' . $link->url . ($params ? '&' . $params : '') . '" class="page-link">' . $link->label . '</a>
                    </li>';
                    $active_after_count++;
                }
            }
        }

        return $previous . $first . $active . $active_after .  $last . $next;
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

if (!function_exists('get_sosmed')) {
    function get_sosmed()
    {
        $get = \App\Models\SocialMedia::where('status', '=', 1)
            ->orderBy('order')
            ->get();
        return $get ? $get->toArray() : [];
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

if (!function_exists('feKontakList')) {
    function feKontakList()
    {
        return ListContact::getFeViewData();
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

if (!function_exists('adminTitle')) {
    function adminTitle($route, $dashboardTitle = 'Dashboard', $addbreadcrumbs = [], $isChild = false)
    {
        $breadcrumbs = [];
        $routeData = MenuAdmin::with(['parent'])->select(['title', 'parent_id'])->where('route', $route)->first();
        $menuTitle = is_null($routeData) ? null : $routeData->title;
        $breadcrumbs[] = ['name' => $dashboardTitle, 'url' => 'admin.dashboard'];
        if (($routeData != null) ? ($routeData->parent != null) : false) {
            $breadcrumbs[] =  [
                'name' => $routeData->parent->title,
                'url' => $routeData->parent->route
            ];
        }

        if ($isChild) {
            $breadcrumbs[] =  [
                'name' => $routeData->title,
                'url' => $routeData->route
            ];
        }

        return [
            'title' => $menuTitle,
            'breadcrumbs' => array_merge($breadcrumbs, $addbreadcrumbs),
        ];
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

if (!function_exists('asset_admin')) {
    function asset_admin($asset, $name = null, $number = null)
    {
        $number = $number ?? config('app.admin_assets_number');
        $name = $name ?? config('app.admin_assets_default');
        $base_url = config("app.admin_assets_list");
        if (isset($base_url[$name][$number])) {
            return $base_url[$name][$number] . $asset;
        } else {
            return '';
        }
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
