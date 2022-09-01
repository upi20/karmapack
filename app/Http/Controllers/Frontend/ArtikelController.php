<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel\Artikel;
use App\Models\Artikel\Kategori;
use App\Models\Artikel\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repository\Frontend\HomeRepository;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $page_attr = [
            'title' => 'List Artikel',
        ];
        $articles = Artikel::getList($request);

        // tag and kategori
        $tags = Tag::getList(6);
        $categories = Kategori::getList(6);

        // selected
        $tag_selected = $request->tag ?
            Tag::select(['nama', 'slug'])->where('slug', '=', $request->tag)->first() : null;
        $kategori_selected = $request->kategori ?
            Kategori::select(['nama', 'slug'])->where('slug', '=', $request->kategori)->first() : null;

        $image_folder_user = User::image_folder;
        $image_default_user = User::image_default;

        $data = compact(
            'page_attr',
            'articles',
            'tags',
            'categories',
            'tag_selected',
            'kategori_selected',
            'image_folder_user',
            'image_default_user',
        );
        $data['compact'] = $data;
        return view('frontend.artikel.list', $data);
    }

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
            'navigation' => 'artikel',
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
