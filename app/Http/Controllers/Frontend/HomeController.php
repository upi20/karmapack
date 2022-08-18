<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel\Artikel;
use App\Models\Galeri;
use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\Periode;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repository\Frontend\HomeRepository;
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

    // home render
    public function periode(Periode $model, Request $request = null)
    {
        $request = $request ? $request : request();
        $page_attr = [
            'periode_id' => $model->id,
            'navigation' => 'home',
        ];

        $periode = $model;

        if ($this->checkVisible('struktur_anggota')) {
            $anggota = HomeRepository::getPengurusList($model->id);
        } else {
            $anggota = collect([]);
        }


        // frontend
        $fe = new \App\Helpers\Frontend\Template\Master($model->id);
        $list_sosmed = $fe->getSosmed();


        // artikel
        if ($this->checkVisible('artikel')) {
            $params = HomeRepository::getParams($request);
            $getArtikel = HomeRepository::getArtikel($request, 6, $params);
            $articles = $getArtikel->model->data;
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
            $kata_alumni_list = HomeRepository::kataAlumni($kata_alumni_limit);
        } else {
            $kata_alumni_list = [];
        }

        $data = compact(
            'page_attr',
            'periode',
            'anggota',
            'list_sosmed',
            'articles',
            'galeri_list',
            'kata_alumni_list',
        );
        $data['compact'] = $data;

        return view('frontend.home2', $data);
    }

    // artikel render
    public function artikel(Artikel $model)
    {
        if (request('preview') != 1) {
            if ($model->status == 0) return abort(404);
        }
        // tambah pengunjung
        $model->counter = $model->counter + 1;
        $model->save();

        $user = User::find($model->user_id);
        $get_id_yt = \App\Helpers\Frontend\Template\Master::checkImageYoutube($model->detail);
        $foto = $model->foto ? asset($model->foto) : 'https://i.ytimg.com/vi/' . $get_id_yt . '/sddefault.jpg';

        $keyword = HomeRepository::artikelTagKeyword($model->id);
        $keyword = ($keyword == '') ? HomeRepository::artikelKategoriKeyword($model->id) : $keyword;

        $artikel_tag = HomeRepository::artikelTag($model->id);
        $artikel_kategori = HomeRepository::artikelKategori($model->id);
        $page_attr = [
            'title' => $model->nama,
            'url' => route('artikel', $model->slug),
            'type' => 'article',
            'description' => $model->excerpt,
            'keywords' =>  $keyword,
            'author' => $user->name,
            'navigation' => 'home',
            'image' => $foto,
        ];

        // side
        $top_article = HomeRepository::topArticle(3);

        $image_folder_user = User::image_folder;
        $image_default_user = User::image_default;

        // sidebar
        // artikel popular
        $top_article = HomeRepository::topArticle(3);

        // kategori and tag
        $tags = HomeRepository::getTagsList();
        $categories = HomeRepository::getKategoriList();


        // return
        return view('frontend.artikel', compact(
            'page_attr',
            'model',
            'user',
            'image_folder_user',
            'image_default_user',
            'artikel_tag',
            'artikel_kategori',

            // sidebar
            'top_article',
            'tags',
            'categories',
        ));
    }

    // harus di pindah beda url
    public function bidang(Jabatan $model)
    {
        $page_attr = [
            'loader' => false, 'navigation' => "bidang/$model->slug",
            'periode_id' => $model->periode_id,
        ];
        $periode = Periode::find($model->periode_id)->first();
        if (!$periode) abort(404);
        $anggota = $this->getPengurusList($model->periode_id);

        return view('frontend.home', compact('page_attr', 'periode', 'anggota'));
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
