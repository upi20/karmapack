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
        $periode = Periode::find($model->periode_id);

        $page_attr = [
            'title' => $model->nama,
            'navigation' => ['about.kepengurusan.bidang', $model->slug],
            'description' => "Struktur Kepengurusan Bidang $model->nama | Keluarga Mahasiswa Dan Pelajar Cianjur Kidul Periode $model->dari - $model->sampai $model->nama",
            'image' => $model->fotoUrl(),
        ];

        return view('frontend.about.kepengurusan.bidang', compact('page_attr', 'model', 'member_list', 'periode'));
    }
}
