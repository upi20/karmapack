<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Blade;
use MatthiasMullie\Minify\JS;

class LoaderController extends Controller
{
    public function javascript($file)
    {
        $a = explode('.js', $file);
        // check javascript extension
        if (isset($a[1])) {
            // check javascript extension
            if ($a[1] == '') {
                $b = str_replace('.', '/', $a[0]);
                $full_path = resource_path("js/views/$b.js");
                // check file exists
                if (file_exists($full_path)) {
                    $minifier = new JS($full_path);
                    $result = Blade::render($minifier->minify());
                    return response($result)->header('Content-Type', 'application/javascript');
                } else return $this->js_nf($a[0]);
            } else return $this->js_nf($a[0]);
        } else return $this->js_nf($a[0]);
    }

    private function js_nf($file)
    {
        return response("console.log('javascript {$file} not found')")
            ->header('Content-Type', 'application/javascript');
    }
}
