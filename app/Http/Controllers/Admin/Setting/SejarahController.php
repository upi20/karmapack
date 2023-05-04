<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Helpers\Summernote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    public function index()
    {
        $page_attr = adminBreadcumb(h_prefix());

        $data = compact(
            'page_attr'
        );

        $view = path_view('pages.admin.setting.sejarah');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function save(Request $request)
    {
        $detail = Summernote::update($request->sejarah, '/assets/sejarah', '');
        settings()->set('sejarah.html', $detail->html)->save();
        settings()->set('sejarah.judul', $request->judul)->save();
        settings()->set('sejarah.sub_judul', $request->sub_judul)->save();
        return response()->json();
    }
}
