<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {

        $page_attr = [
            'title' => 'Pendaftaran'
        ];

        $image = (object)[
            'folder' => Pendaftaran::image_folder,
            'default' => Pendaftaran::image_default
        ];
        $pendaftaran = Pendaftaran::orderBy('no_urut')->get();
        return view('frontend.pendaftaran.list', compact(
            'pendaftaran',
            'image',
            'page_attr',
        ));
    }
}
