<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Helpers\Summernote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.setting.about');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function update(Request $request)
    {
        $detail = Summernote::update($request->about, '/assets/about', '');
        setting_set('about.html', $detail->html);
        setting_set('about.judul', $request->judul);
        return response()->json();
    }
}
