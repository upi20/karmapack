<?php

use App\Models\Utility\NotifAdminAtas;
use App\Models\Utility\NotifDepanAtas;
use Illuminate\Support\Facades\Blade;
use MatthiasMullie\Minify\JS;

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

if (!function_exists('notif_depan_atas')) {
    function notif_depan_atas()
    {
        $now = date('Y-m-d');
        return NotifDepanAtas::whereRaw("(dari <= '$now') and (sampai >= '$now' or sampai is null )")->get();
    }
}

if (!function_exists('notif_admin_atas')) {
    function notif_admin_atas()
    {
        $now = date('Y-m-d');
        return NotifAdminAtas::whereRaw("(dari <= '$now') and (sampai >= '$now' or sampai is null )")->get();
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
            ['search' => '__base_url__', 'replace' => url('')]
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
        $matches = '';
        preg_match(
            "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/",
            $data[1],
            $matches
        );
        return isset($matches[1]) ? $matches[1] : null;
    }
}

if (!function_exists('footer_instagram')) {
    function footer_instagram()
    {
        $result = \App\Models\FooterInstagram::where('status', '=', 1)
            ->orderBy('order')
            ->get();
        $result->map(function ($item) {
            $image_folder = \App\Models\FooterInstagram::image_folder;
            $item['foto'] = url("$image_folder/$item->foto");
            return $item;
        });

        return $result->toArray();
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
