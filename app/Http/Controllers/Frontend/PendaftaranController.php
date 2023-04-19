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
        $gforms = GForm::where('status', '<>', 0)->where('tampilkan', '=', 1)->orderBy('dari', 'desc')->get();
        return view('pages.frontend.pendaftaran.list', compact(
            'gforms',
            'page_attr',
        ));
    }
}
