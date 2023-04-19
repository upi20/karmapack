<?php

namespace App\Http\Controllers\Frontend\About\Kepengurusan;

use App\Http\Controllers\Controller;
use App\Models\Kepengurusan\Jabatan;

class BidangController extends Controller
{
    public function index(Jabatan $jabatan)
    {
        $page_attr = [
            'title' => $jabatan->nama,
            // 'navigation' => ['tentang.kepengurusan.bidang', $jabatan->slug],
            'navigation' => 'tentang.kepengurusan.struktur',
            'description' => "Struktur Kepengurusan Bidang $jabatan->nama | Keluarga Mahasiswa Dan Pelajar Cianjur Kidul Periode $jabatan->dari - $jabatan->sampai $jabatan->nama",
            'image' => $jabatan->fotoUrl(),
        ];

        return view('pages.frontend.tentang.kepengurusan.bidang', compact('page_attr', 'jabatan'));
    }
}
