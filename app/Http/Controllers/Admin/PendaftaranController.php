<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Repository\PendaftaranRepository;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    private $repository;
    private $image_folder = Pendaftaran::image_folder;
    public function __construct()
    {
        $this->repository = new PendaftaranRepository();
    }

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->repository->datatable($request);
        }

        $page_attr = [
            'title' => 'Manage List Pendaftaran',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ]
        ];
        $image_folder = $this->image_folder;
        return view('admin.pendaftaran', compact('page_attr', 'image_folder'));
    }

    public function insert(Request $request)
    {
        return $this->repository->insert($request);
    }

    public function update(Request $request)
    {
        return $this->repository->update($request);
    }

    public function delete(Pendaftaran $model)
    {
        return $this->repository->delete($model);
    }

    public function getOne(Pendaftaran $model)
    {
        return response()->json($model);
    }
}
