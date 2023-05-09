<?php

namespace App\Http\Controllers\Admin\SPK\AHP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{

    public function index(Request $request)
    {
        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.SPK.AHP.perhitungan');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }
}
