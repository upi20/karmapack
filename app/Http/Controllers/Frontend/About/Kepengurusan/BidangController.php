<?php

namespace App\Http\Controllers\Frontend\About\Kepengurusan;

use App\Http\Controllers\Controller;
use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\Periode;
use App\Repository\Frontend\About\Kepengurusan\BidangRepository;

class BidangController extends Controller
{
    public function index(Jabatan $model)
    {
        $image_folder = Jabatan::image_folder;
        $member_list = BidangRepository::member_list($model->id);
        $page_attr = [
            'title' => $model->nama,
            'navigation' => ['about.kepengurusan.bidang', $model->slug],
        ];

        $periode = Periode::find($model->periode_id);
        return view('frontend.about.kepengurusan.bidang', compact('page_attr', 'model', 'member_list', 'periode'));
    }
}
