<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use League\Config\Exception\ValidationException;
use App\Helpers\Summernote;

class PendaftaranController extends Controller
{
    private $validate_model = [
        'nama' => ['required', 'string', 'max:255'],
        'deskripsi' => ['required', 'string'],
        'pengumuman' => ['required', 'string'],
        'no_urut' => ['required', 'int'],
        'dari' => ['required'],
        'sampai' => ['required'],
        'route' => ['required', 'string'],
        'status' => ['required', 'int'],
    ];

    private $image_folder = Pendaftaran::image_folder;

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable($request);
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
        try {
            $request->validate(array_merge([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ], $this->validate_model));

            $model = new Pendaftaran();
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);
            }

            $model->foto = $foto;
            $model->nama = $request->nama;
            $model->deskripsi = $request->deskripsi;
            $model->pengumuman = $request->pengumuman;
            $model->no_urut = $request->no_urut;
            $model->dari = $request->dari;
            $model->sampai = $request->sampai;
            $model->route = $request->route;
            $model->status = $request->status;
            $model->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $model = Pendaftaran::find($request->id);
            $request->validate(array_merge(['id' => ['required', 'int']], $this->validate_model));

            // foto handle
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);

                // delete foto
                if ($model->foto) {
                    $path = public_path("$this->image_folder/$model->foto");
                    Summernote::deleteFile($path);
                }

                // save foto
                $model->foto = $foto;
            }

            $model->nama = $request->nama;
            $model->deskripsi = $request->deskripsi;
            $model->pengumuman = $request->pengumuman;
            $model->no_urut = $request->no_urut;
            $model->dari = $request->dari;
            $model->sampai = $request->sampai;
            $model->route = $request->route;
            $model->status = $request->status;
            $model->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Pendaftaran $model)
    {
        try {
            $model->delete();
            // delete foto
            if ($model->foto) {
                $path = public_path("$this->image_folder/$model->foto");
                Summernote::deleteFile($path);
            }
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function getOne(Pendaftaran $model)
    {
        return response()->json($model);
    }

    public function datatable(Request $request): mixed
    {
        // get key from validate
        $select = [];
        foreach ($this->validate_model as $k => $val) $select[] = $k;

        // get data from model
        $model = Pendaftaran::select(array_merge(['id', 'foto'], $select))
            ->selectRaw("IF(status = 0, 'Tidak Aktif', IF(status = 1, 'Aktif', IF(status = 2, 'Ditutup', 'Tidak Diketahui'))) as status_str");

        // filter
        if (isset($request->filter)) {
            $filter = $request->filter;
            if ($filter['status'] != '') {
                $model->where('status', '=', $filter['status']);
            }
        }

        return Datatables::of($model)
            ->addIndexColumn()
            ->make(true);
    }
}
