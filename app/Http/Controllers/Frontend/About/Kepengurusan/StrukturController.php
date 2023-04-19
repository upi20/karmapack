<?php

namespace App\Http\Controllers\Frontend\About\Kepengurusan;

use App\Http\Controllers\Controller;
use App\Models\Kepengurusan\Periode;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function index(Request $request)
    {
        $periode = Periode::where('status', '=', '1')
            ->first();
        if (!$periode) abort(404);
        return $this->periode($periode, $request);
    }

    public function periode(Periode $periode, Request $request = null)
    {
        $page_attr = [
            'title' => $periode->nama,
            'description' => "STRUKTUR KEPENGURUSAN KELUARGA MAHASISWA DAN PELAJAR CIANJUR KIDUL PERIODE $periode->dari - $periode->sampai $periode->nama",
            'periode_id' => $periode->id,
            'image' => $periode->fotoUrl(),
            'navigation' => 'tentang.kepengurusan.struktur',
        ];

        return view('pages.frontend.tentang.kepengurusan.struktur', compact('page_attr', 'periode'));
    }
}
