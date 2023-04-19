<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel\Artikel;
use App\Models\Artikel\Kategori;
use App\Models\Artikel\Tag;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $page_attr = [
            'title' => 'List Artikel',
        ];
        $articles = Artikel::getList($request);

        // tag and kategori
        $tags = Tag::getTopList(6);
        $categories = Kategori::getTopList(6);

        // selected
        $tag_selected = $request->tag ?
            Tag::select(['nama', 'slug'])->where('slug', '=', $request->tag)->first() : null;
        $kategori_selected = $request->kategori ?
            Kategori::select(['nama', 'slug'])->where('slug', '=', $request->kategori)->first() : null;

        $data = compact(
            'page_attr',
            'articles',
            'tags',
            'categories',
            'tag_selected',
            'kategori_selected',
            'request',
        );
        $data['compact'] = $data;
        return view('pages.frontend.artikel.list', $data);
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

        //// Meta tag
        $keyword = $model->tagKeyword();
        $keyword = ($keyword == '') ? $model->kategoriKeyword() : ($keyword . "," . $model->kategoriKeyword());
        $page_attr = [
            'title' => $model->nama,
            'url' => route('artikel', $model->slug),
            'type' => 'article',
            'description' => $model->excerpt,
            'keywords' =>  $keyword,
            'author' => is_null($model->user) ? '' : $model->user->name,
            'navigation' => 'artikel',
            'image' => $model->fotoUrl(),
        ];

        // bawah
        $top_article = Artikel::getTopList(4);

        // return
        return view('pages.frontend.artikel.detail', compact(
            'page_attr',
            'model',
            'top_article',
        ));
    }
}
