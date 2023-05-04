<?php

namespace App\Http\Controllers\Admin\Artikel;

use League\Config\Exception\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Artikel\Artikel;
use Illuminate\Support\Facades\DB;
use App\Models\Artikel\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Kategori::datatable($request);
        }
        $page_attr = adminBreadcumb(h_prefix());
        $view = path_view('pages.admin.artikel.kategori');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request)
    {
        try {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:artikel_kategori'],
                'status' => ['required', 'int'],
            ]);

            Kategori::create([
                'nama' => $request->nama,
                'slug' => $request->slug,
                'status' => $request->status,
                // 'created_by' => auth()->user()->id,
            ]);

            Artikel::clearCache();
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
            $model = Kategori::find($request->id);
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:artikel_kategori,slug,' . $request->id],
                'status' => ['required', 'int'],
            ]);

            $model->nama = $request->nama;
            $model->slug = $request->slug;
            $model->status = $request->status;
            // $model->updated_by = auth()->user()->id;
            $model->save();
            Artikel::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Kategori $model)
    {
        try {
            $model->delete();
            Artikel::clearCache();
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
            $model = Kategori::select(['id', DB::raw('nama as text')])
                ->whereRaw("(`nama` like '%$request->search%' or `id` like '%$request->search%')")
                ->limit(10);

            $result = $model->get()->toArray();
            if ($request->with_empty && $request->search) {
                $result = array_merge([['id' => $request->search, 'text' => $request->search . ' (Buat Kategori Baru)']], $result);
            }
            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
