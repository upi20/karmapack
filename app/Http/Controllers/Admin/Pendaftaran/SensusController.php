<?php

namespace App\Http\Controllers\Admin\Pendaftaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('admin.pendaftaran.sensus', compact('page_attr'));
    }

    public function excel(Request $request)
    {
        return $this->repository->excel($request);
    }
}
