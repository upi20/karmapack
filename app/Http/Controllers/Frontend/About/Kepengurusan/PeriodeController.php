<?php

namespace App\Http\Controllers\Frontend\About\Kepengurusan;

use App\Http\Controllers\Controller;
use App\Models\Kepengurusan\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function index(Request $request)
    {
        $paginate = is_numeric($request->limit) ? $request->limit : 10;
        $page_attr = [
            'title' => 'Periode Kepengurusan',
            'navigation' => 'tentang.kepengurusan.periode',
        ];
        $periodes = Periode::orderBy('dari', 'desc')->paginate($paginate)
            ->appends($request->query());
        return view('pages.frontend.tentang.kepengurusan.periode', compact('page_attr', 'periodes'));
    }
}
