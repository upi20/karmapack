<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Repository\Frontend\GaleriRepository;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {

        $params = GaleriRepository::getParams($request);
        $galeries = GaleriRepository::get($request, 6, $params);
        $filters = (object)[
            'search' => $request->search
        ];

        $foto = $galeries->count() > 0 ? "https://drive.google.com/uc?export=view&id={$galeries[0]->foto_id_gdrive}" : false;
        $page_attr = [
            'loader' => false,
            'title' => 'Galeri Kegiatan',
            'description' => 'List Galeri Kegiatan Karmapack',
            'url' => route('galeri'),
            'keywords' =>  'Galeri Kegiatan, Galeri, Kegiatan, Karmapack',
            // 'image' => $foto,
        ];

        return view('frontend.galeri.list', compact(
            'galeries',
            'filters',
            'page_attr',
        ));
    }

    public function detail(Galeri $model)
    {
        $page_attr = [
            'navigation' => 'galeri',
            'loader' => false,
            'title' => $model->nama,
            'description' => $model->keterangan,
            'url' => route('galeri.detail', $model->slug),
            'keywords' =>  'Galeri Kegiatan, Galeri, Kegiatan, Karmapack, ' . $model->nama,
            // 'image' => "https://drive.google.com/uc?export=view&id={$model->foto_id_gdrive}",
        ];

        return view('frontend.galeri.detail', compact('page_attr', 'model'));
    }
}
