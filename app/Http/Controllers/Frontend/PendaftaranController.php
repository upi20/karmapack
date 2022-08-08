<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Pendaftaran\GForm;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {

        $page_attr = [
            'title' => 'Pendaftaran'
        ];

        $image_default = Pendaftaran::image_default;
        $list_p = array_map(function ($v) {
            $folder = Pendaftaran::image_folder;
            $v['data_type'] = 1;
            $v['foto'] = asset("$folder/$v[foto]");
            return (object)$v;
        }, Pendaftaran::orderBy('no_urut')->get()->toArray());

        $list_g_form = array_map(function ($v) {
            $folder = GForm::image_folder;
            $v['foto'] = asset("$folder/$v[foto]");
            $v['data_type'] = 2;
            return (object)$v;
        }, GForm::where('status', '<>', 0)
            ->where('tampilkan', '=', 1)->get()->toArray());

        $pendaftaran = collect(array_merge($list_p, $list_g_form));

        return view('frontend.pendaftaran.list', compact(
            'pendaftaran',
            'image_default',
            'page_attr',
        ));
    }
}
