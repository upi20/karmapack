<?php

namespace App\Http\Controllers\Admin\SPK\AHP;

use App\Http\Controllers\Controller;
use App\Models\SPK\AHP\Alternatif\Alternatif;
use App\Models\SPK\AHP\Kriteria\Kriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{

    public function index(Request $request)
    {
        $page_attr = adminBreadcumb(h_prefix());
        $alternatif_title = adminBreadcumb(h_prefix('alternatif', 1));
        $kriterias = Kriteria::with('jenis')->orderBy('kode')->get();

        $view = path_view('pages.admin.SPK.AHP.perhitungan');
        $data = compact('page_attr', 'view', 'alternatif_title', 'kriterias');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public static function hasil()
    {
        $hasil = Alternatif::hasil();
        return response()->json($hasil);
    }
}
