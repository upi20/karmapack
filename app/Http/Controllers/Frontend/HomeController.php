<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel\Artikel;
use App\Models\Galeri;
use App\Models\Instagram;
use App\Models\KataAlumni;
use App\Models\Kepengurusan\Periode as KepengurusanPeriode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $periode = KepengurusanPeriode::where('status', '=', '1')
            ->first();
        if (!$periode) abort(404);
        return $this->periode($periode, $request);
    }

    // home render
    public function periode(KepengurusanPeriode $periode, Request $request)
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

        // frontend
        $list_sosmed = get_sosmed();


        // artikel
        if ($this->checkVisible('artikel')) {
            $request->limit = 6;
            $articles = Artikel::getList($request);
        } else {
            $articles = [];
        }


        if ($this->checkVisible('galeri_kegiatan')) {
            $galeri_limit = settings()->get('setting.home.galeri_kegiatan.limit', 6);
            $galeri_list = Galeri::where('status', '=', 1)->select([DB::raw('*'), DB::raw("date_format(tanggal, '%d %M %Y') as tanggal_str")])
                ->orderBy('tanggal', 'desc')->limit($galeri_limit)->get();
        } else {
            $galeri_list = [];
        }


        if ($this->checkVisible('kata_alumni')) {
            $kata_alumni_limit = settings()->get('setting.home.kata_alumni.limit', 6);
            $kata_alumni_list = KataAlumni::getHome($kata_alumni_limit);
        } else {
            $kata_alumni_list = [];
        }

        // instagrams
        if ($this->checkVisible('instagram')) {
            $instagrams_limit = settings()->get('setting.home.instagram.jml_konten', 6);
            $instagrams = Instagram::limit($instagrams_limit)->where('status', 1)->orderBy('tanggal', 'desc')->get();
        } else {
            $instagrams = [];
        }

        $data = compact(
            'page_attr',
            'periode',
            'list_sosmed',
            'articles',
            'galeri_list',
            'kata_alumni_list',
            'instagrams',
            'pengurus'
        );
        $data['compact'] = $data;
        return view('frontend.home2', $data);
    }

    public function fronted2(Request $request)
    {
        $page_attr = [];
        $data = compact('page_attr');
        $data['compact'] = $data;
        return view('frontend.home2', $data);
    }

    private function checkVisible(string $item): ?bool
    {
        return settings()->get("setting.home.$item.visible", false);
    }
}
