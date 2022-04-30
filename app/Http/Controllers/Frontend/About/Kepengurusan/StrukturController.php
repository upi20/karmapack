<?php

namespace App\Http\Controllers\Frontend\About\Kepengurusan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengurus\Periode;
use App\Repository\Frontend\About\Kepengurusan\StrukturRepository;

class StrukturController extends Controller
{
    public function index(Request $request)
    {
        $periode = Periode::where('status', '=', '1')
            ->first();
        if (!$periode) abort(404);
        return $this->periode($periode, $request);
    }

    public function periode(Periode $model, Request $request = null)
    {
        $page_attr = [
            // 'loader' => false,
            'title' => $model->nama,
            'description' => "STRUKTUR KEPENGURUSAN KELUARGA MAHASISWA DAN PELAJAR CIANJUR KIDUL PERIODE $model->dari - $model->sampai $model->nama",
            'periode_id' => $model->id,
            'image' => $model->fotoUrl(),
            'navigation' => 'about.kepengurusan.struktur',
        ];
        $member = StrukturRepository::member_list($model->id);
        $periode = $model;
        // dd($member);
        return view('frontend.about.kepengurusan.struktur', compact('page_attr', 'periode', 'member'));
    }
}
