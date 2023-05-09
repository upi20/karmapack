<?php

namespace App\Http\Controllers\Admin\SPK\AHP;

use App\Http\Controllers\Controller;
use App\Models\SPK\AHP\Alternatif\Alternatif;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{

    public function index(Request $request)
    {
        $page_attr = adminBreadcumb(h_prefix());
        $alternatif_title = adminBreadcumb(h_prefix('alternatif', 1));

        $view = path_view('pages.admin.SPK.AHP.perhitungan');
        $data = compact('page_attr', 'view', 'alternatif_title');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public static function hasil()
    {
        $hasil = Alternatif::hasil();
        return response()->json($hasil);
    }
}
