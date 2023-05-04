<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tracker;
use App\Models\TrackerIPDetail;
use Illuminate\Http\Request;

class VistorController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Tracker::datatable($request);
        }

        $page_attr = adminBreadcumb(h_prefix());

        $platforms = Tracker::distinct('platform')->select(['platform'])->where('platform', '<>', null)->get();
        $browsers = Tracker::distinct('browser')->select(['browser'])->where('browser', '<>', null)->get();
        $countries = TrackerIPDetail::distinct('country')->select(['country'])->where('country', '<>', null)->get();
        $count_has_detail = Tracker::where('has_detail', 0)->count();

        $view = path_view('pages.admin.vistor');
        $data = compact('page_attr', 'platforms', 'browsers', 'countries', 'count_has_detail', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function find(Request $request)
    {
        $tracker = Tracker::findOrFail($request->id);

        if ($tracker->has_detail == 0) {
            $tracker->createIPDetail();
        }

        $tracker->ipDetail;
        return $tracker;
    }

    public function refresh_detail_ip(Request $request)
    {
        $trackers = Tracker::where('has_detail', 0)
            ->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->limit(100)->get();
        foreach ($trackers as  $tracker) {
            $tracker->createIPDetail();
        }

        $count = Tracker::where('has_detail', 0)->count();
        return $count;
    }
}
