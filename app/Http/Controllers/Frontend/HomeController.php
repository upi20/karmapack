<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pengurus\Jabatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $page_attr = ['loader' => false];
        return view('templates.frontend.master', compact('page_attr'));
    }

    public function bidang(Jabatan $model)
    {
        $page_attr = ['loader' => false, 'navigation' => "bidang/$model->slug"];
        return view('templates.frontend.master', compact('page_attr'));
    }
}
