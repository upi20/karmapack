<?php

namespace App\Http\Controllers\Admin;

use League\Config\Exception\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public $query = [];
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Galeri::datatable($request);
        }

        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.galeri');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
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
                'tanggal' => ['required', 'date'],
                'lokasi' => ['required', 'string', 'max:255'],
                'keterangan' => ['string'],
            ]);

            Galeri::create([
                'nama' => $request->nama,
                'slug' => $request->slug,
                'status' => $request->status,
                'tanggal' => $request->tanggal,
                'lokasi' => $request->lokasi,
                // 'foto' => $request->foto,
                'foto_id_gdrive' => $request->foto_id_gdrive,
                'id_gdrive' => $request->id_gdrive,
                'keterangan' => $request->keterangan,
                // 'created_by' => auth()->user()->id,
            ]);

            Galeri::clearCache();
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
            $model->tanggal = $request->tanggal;
            $model->lokasi = $request->lokasi;
            // $model->foto = $request->foto;
            $model->foto_id_gdrive = $request->foto_id_gdrive;
            $model->id_gdrive = $request->id_gdrive;
            $model->keterangan = $request->keterangan;
            // $model->updated_by = auth()->user()->id;
            $model->save();

            Galeri::clearCache();
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

            Galeri::clearCache();
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
