<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel\Artikel;
use App\Models\Galeri;
use App\Models\Instagram;
use App\Models\KataAlumni;
use App\Models\Kepengurusan\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $periode = Periode::where('status', '=', '1')
            ->first();
        if (!$periode) abort(404);
        return $this->periode($periode, $request);
    }

    public function periode(Periode $periode, Request $request)
    {

        $request = $request ? $request : request(); // intelephense nya error
        $page_attr = [
            'periode_id' => $periode->id,
            'navigation' => 'home',
        ];

        if ($this->checkVisible('struktur_anggota')) {
            $pengurus = $periode->homePengurus();
        } else {
            $pengurus = collect([]);
        }

        if ($this->checkVisible('artikel')) {
            $articles = Artikel::getHomeViewData();
        } else {
            $articles = [];
        }

        if ($this->checkVisible('galeri_kegiatan')) {
            $galeri_list = Galeri::getHomeViewData();
        } else {
            $galeri_list = [];
        }

        if ($this->checkVisible('kata_alumni')) {
            $kata_alumni_list = KataAlumni::getHomeViewData();
        } else {
            $kata_alumni_list = [];
        }

        if ($this->checkVisible('instagram')) {
            $instagrams_limit = settings()->get('setting.home.instagram.jml_konten', 6);
            $instagrams = Instagram::limit($instagrams_limit)->where('status', 1)->orderBy('tanggal', 'desc')->get();
        } else {
            $instagrams = [];
        }

        $view = path_view('pages.frontend.home');
        $data = compact('page_attr', 'periode', 'articles', 'galeri_list', 'kata_alumni_list', 'instagrams', 'pengurus', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    private function checkVisible(string $item): ?bool
    {
        return settings()->get("setting.home.$item.visible", false);
    }
}
