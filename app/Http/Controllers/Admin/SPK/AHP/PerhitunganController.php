<?php

namespace App\Http\Controllers\Admin\SPK\AHP;

use App\Http\Controllers\Controller;
use App\Models\SPK\AHP\Alternatif\Alternatif;
use App\Models\SPK\AHP\Kriteria\Kriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    private $key = 'setting.spk.ahp';

    public function index(Request $request)
    {
        $page_attr = adminBreadcumb(h_prefix());
        $alternatif_title = adminBreadcumb(h_prefix('alternatif', 1));
        $kriterias = Kriteria::with('jenis')->orderBy('kode')->get();

        $setting = (object)[
            'umumkan' => setting_get("$this->key.umumkan"),
            'jml_seleksi' => setting_get("$this->key.jml_seleksi"),
        ];

        $view = path_view('pages.admin.SPK.AHP.perhitungan');
        $data = compact('page_attr', 'view', 'alternatif_title', 'kriterias', 'setting');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public static function hasil()
    {
        $hasil = Alternatif::hasil();
        return response()->json($hasil);
    }

    public function setting(Request $request)
    {
        setting_set("$this->key.umumkan", $request->umumkan != null);
        setting_set("$this->key.jml_seleksi", $request->jml_seleksi);
        return response()->json();
    }
}
