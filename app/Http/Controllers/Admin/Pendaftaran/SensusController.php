<?php

namespace App\Http\Controllers\Admin\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran\Sensus;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SensusController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Sensus::datatable($request);
        }

        $page_attr = adminBreadcumb(h_prefix());

        $user_role = Role::all();
        $setting = (object)[
            'jadikan_pengguna' => settings()->get('setting.sensus.jadikan_pengguna', false),
            'sebagai' => settings()->get('setting.sensus.sebagai', ''),
        ];

        $view = path_view('pages.admin.pendaftaran.sensus');
        $data = compact('page_attr', 'setting', 'user_role', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function status(Request $request)
    {
        $model = Sensus::find($request->id);
        if ($model) {
            if ($request->status != null) {
                $model->status = $request->status;
            }
            $model->keterangan = $request->keterangan;
        }
        $model->save();
        return response()->json($model);
    }

    public function setting(Request $request)
    {
        settings()->set('setting.sensus.jadikan_pengguna', $request->jadikan_pengguna)->save();
        settings()->set('setting.sensus.sebagai', $request->sebagai)->save();
        return response()->json();
    }

    public function excel(Request $request)
    {
        return Sensus::excel($request);
    }
}
