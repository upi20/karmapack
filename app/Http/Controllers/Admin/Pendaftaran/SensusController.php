<?php

namespace App\Http\Controllers\Admin\Pendaftaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Pendaftaran\Sensus;

class SensusController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Datatables::of(Sensus::query())
                ->addIndexColumn()
                ->make(true);
        }

        $page_attr = [
            'title' => 'List Data Sensus',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ]
        ];
        return view('admin.pendaftaran.sensus', compact('page_attr'));
    }
}
