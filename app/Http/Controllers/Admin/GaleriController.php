<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Models\Galeri;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $this->query['artikel_alias'] = 'artikel';
            $model = Galeri::select(['id', 'nama', 'slug', 'status', 'id_gdrive', 'foto_id_gdrive', 'keterangan'])
                ->selectRaw("IF(status = 1, 'Tampilkan', 'Tidak Tampilkan') as status_str");

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
        $page_attr = [
            'title' => 'Manage List Galeri',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ]
        ];
        return view('admin.galeri', compact('page_attr'));
    }

    public function insert(Request $request)
    {
        try {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:galeri'],
                'status' => ['required', 'int'],
                // 'foto' => ['nullable', 'string', 'max:255'],
                'foto_id_gdrive' => ['required', 'string', 'max:255'],
                'id_gdrive' => ['required', 'string', 'max:255'],
                'keterangan' => ['string'],
            ]);

            Galeri::create([
                'nama' => $request->nama,
                'slug' => $request->slug,
                'status' => $request->status,
                // 'foto' => $request->foto,
                'foto_id_gdrive' => $request->foto_id_gdrive,
                'id_gdrive' => $request->id_gdrive,
                'keterangan' => $request->keterangan,
                // 'created_by' => auth()->user()->id,
            ]);
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
            $model = Galeri::find($request->id);
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:galeri,slug,' . $request->id],
                'status' => ['required', 'int'],
                // 'foto' => ['nullable', 'string', 'max:255'],
                'foto_id_gdrive' => ['required', 'string', 'max:255'],
                'id_gdrive' => ['required', 'string', 'max:255'],
                'keterangan' => ['string'],
            ]);

            $model->nama = $request->nama;
            $model->slug = $request->slug;
            $model->status = $request->status;
            // $model->foto = $request->foto;
            $model->foto_id_gdrive = $request->foto_id_gdrive;
            $model->id_gdrive = $request->id_gdrive;
            $model->keterangan = $request->keterangan;
            // $model->updated_by = auth()->user()->id;
            $model->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Galeri $model)
    {
        try {
            $model->delete();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function select2(Request $request)
    {
        try {
            $model = Galeri::select(['id', DB::raw('name as text')])
                ->whereRaw("(`name` like '%$request->search%' or `id` like '%$request->search%')")
                ->limit(10);

            $result = $model->get()->toArray();
            if ($request->with_empty) {
                $result = array_merge([['id' => '', 'text' => 'All Galeri']], $result);
            }

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
