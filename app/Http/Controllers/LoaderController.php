<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use MatthiasMullie\Minify\JS;
use MatthiasMullie\Minify\CSS;

class LoaderController extends Controller
{
    public function js($path)
    {
        $csrf_token = Session::token();
        $key = request('k');
        $check_token = $csrf_token == $key;
        $full_path = resource_path("js/views/$path.js");
        if (file_exists($full_path) && $check_token) {
            $minifier = new JS($full_path);
            $data = request()->query();
            $result = Blade::render($minifier->minify(), $data);
            return response($result)->header('Content-Type', 'application/javascript');
        } else return $this->js_err($path, 'not found');
    }

    private function js_err(string $file, string $message)
    {
        return response("console.log('javascript {$file} {$message}')")
            ->header('Content-Type', 'application/javascript');
    }

    public function css($path)
    {
        $csrf_token = Session::token();
        $key = request('k');
        $check_token = $csrf_token == $key;
        $full_path = resource_path("css/views/$path.css");
        if (file_exists($full_path) && $check_token) {
            $minifier = new CSS($full_path);
            $data = request()->query();
            $result = Blade::render($minifier->minify(), $data);
            return response($result)->header('Content-Type', 'text/css');
        } else return response(" /* {$path} not found */ ")->header('Content-Type', 'text/css');
    }
}
