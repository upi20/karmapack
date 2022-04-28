<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel\Artikel;
use App\Models\Artikel\Kategori;
use App\Models\Artikel\Tag;
use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\Periode;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repository\Frontend\HomeRepository;

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
            'loader' => false,
            'periode_id' => $model->id,
            'navigation' => 'home',
        ];

        $periode = $model;
        $anggota = HomeRepository::getPengurusList($model->id);

        // frontend
        $fe = new \App\Helpers\Frontend\Template\Master($model->id);
        $list_sosmed = $fe->getSosmed();


        // Popular Posts ==========================================================================
        // buat column baru di artikel view counter
        // query by view counter
        // sementara buat dari post teratas terlebih dahulu wkwk
        // ========================================================================================

        // tag and kategori
        $tags = HomeRepository::getTagsList();
        $categories = HomeRepository::getKategoriList();

        // artikel
        $params = HomeRepository::getParams($request);
        $getArtikel = HomeRepository::getArtikel($request, 6, $params);
        $articles = $getArtikel->model->data;
        $pagination = $getArtikel->pagination;

        // artikel popular
        $top_article = HomeRepository::topArticle(3);

        // selected
        $tag_selected = $request->tag ?
            Tag::select(['nama', 'slug'])->where('slug', '=', $request->tag)->first() : null;
        $kategori_selected = $request->kategori ?
            Kategori::select(['nama', 'slug'])->where('slug', '=', $request->kategori)->first() : null;

        $image_folder_user = User::image_folder;
        $image_default_user = User::image_default;

        return view('frontend.home', compact(
            'page_attr',
            'periode',
            'anggota',
            'list_sosmed',
            'tags',
            'categories',
            'articles',
            'pagination',
            'top_article',
            'tag_selected',
            'kategori_selected',
            'image_folder_user',
            'image_default_user',
        ));
    }

    // artikel render
    public function artikel(Artikel $model)
    {
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
        // $periode = Periode::find($model->periode_id)->first();
        // if (!$periode) abort(404);
        // $anggota = $this->getPengurusList($model->periode_id);

        // return view('frontend.home', compact('page_attr', 'periode', 'anggota'));
    }
}
