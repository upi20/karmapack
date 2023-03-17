<?php

namespace App\Http\Controllers\Admin\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran\Sensus;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use App\Repository\Admin\Pendaftaran\SensusRepository;

class SensusController extends Controller
{
    private $repository;
    public function __construct(SensusRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->repository->datatable($request);
        }

        $page_attr = [
            'title' => 'List Data Sensus',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ]
        ];
        $user_role = Role::all();
        $setting = (object)[
            'jadikan_pengguna' => settings()->get('setting.sensus.jadikan_pengguna', false),
            'sebagai' => settings()->get('setting.sensus.sebagai', ''),
        ];

        return view('admin.pendaftaran.sensus', compact('page_attr', 'setting', 'user_role'));
    }

    public function excel(Request $request)
    {
        return $this->repository->excel($request);
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
}
