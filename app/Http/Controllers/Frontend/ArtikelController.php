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

class ArtikelController extends Controller
{
    // artikel render
    public function detail(Artikel $model)
    {
        if (request('preview') != 1) {
            if ($model->status == 0) return abort(404);
        }
        // tambah pengunjung
        $model->counter = $model->counter + 1;
        $model->save();

        $user = User::find($model->user_id);
        $get_id_yt = check_image_youtube($model->detail);
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
        return view('frontend.artikel.detail', compact(
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
}
