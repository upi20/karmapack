<?php

namespace App\Http\Controllers\Frontend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    public function index(Request $request)
    {
        $paginate = is_numeric($request->limit) ? $request->limit : 10;
        $page_attr = [
            'title' => 'Sejarah',
            'navigation' => 'tentang.sejarah',
        ];
        return view('pages.frontend.tentang.sejarah', compact('page_attr'));
    }
}
