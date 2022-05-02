<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Blade;
use MatthiasMullie\Minify\JS;

class Loader
{
    public static function render_js(string $path, array $data = []): string
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
