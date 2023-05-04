<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use App\Models\Instagram;
use Illuminate\Support\Facades\DB;

class InstagramController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Instagram::datatable($request);
        }
        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.instagram');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request)
    {
        try {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'tanggal' => ['required', 'date'],
                'keterangan' => ['string'],
            ]);

            Instagram::create([
                'nama' => $request->nama,
                'tanggal' => $request->tanggal,
                'status' => $request->status,
                'keterangan' => $request->keterangan,
            ]);

            Instagram::clearCache();
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
            $model = Instagram::find($request->id);
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'tanggal' => ['required', 'date'],
                'keterangan' => ['string'],
            ]);

            $model->nama = $request->nama;
            $model->tanggal = $request->tanggal;
            $model->status = $request->status;
            $model->keterangan = $request->keterangan;
            $model->save();

            Instagram::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Instagram $model)
    {
        try {
            $model->delete();

            Instagram::clearCache();
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
            $model = Instagram::select(['id', DB::raw('name as text')])
                ->whereRaw("(`name` like '%$request->search%' or `id` like '%$request->search%')")
                ->limit(10);

            $result = $model->get()->toArray();
            if ($request->with_empty) {
                $result = array_merge([['id' => '', 'text' => 'All Instagram']], $result);
            }

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function find(Request $request)
    {
        return Instagram::findOrFail($request->id);
    }
}
