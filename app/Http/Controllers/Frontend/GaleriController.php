<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    public function index(Request $request)
    {

        $params = $this->getParams($request);
        $galeries = $this->get($request, 6, $params);
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

        return view('pages.frontend.galeri.list', compact(
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

        return view('pages.frontend.galeri.detail', compact('page_attr', 'model'));
    }

    public function getParams(Request $request): string
    {
        $filters = (object)[
            'search' => $request->search,
        ];

        // filter to url
        $params = "";
        foreach ($filters as $key => $filter) {
            $params .= $params ? ($filter ? "&" : '') : '';
            $params .= $filter ? "$key=$filter" : '';
        }

        return $params;
    }

    public function get(Request $request, int $paginate = 6, ?string $params = null): object
    {
        $model = Galeri::where('status', '=', 1)->select([DB::raw('*'), DB::raw("date_format(tanggal, '%d %M %Y') as tanggal_str")])
            ->orderBy('tanggal', 'desc');

        if ($request->search) {
            $model->whereRaw("(
                nama like '%$request->search%' or
                foto like '%$request->search%' or
                slug like '%$request->search%' or
                keterangan like '%$request->search%'
            )");
        }

        // model->item get access
        $model = $model->paginate($paginate)
            ->appends(request()->query());
        return $model;
    }
}
