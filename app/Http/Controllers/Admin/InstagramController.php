<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Models\Instagram;
use Illuminate\Support\Facades\DB;

class InstagramController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $model = Instagram::select(['id', 'nama', 'keterangan', 'tanggal', 'status'])
                ->selectRaw("IF(status = 1, 'Tampilkan', 'Tidak Tampilkan') as status_str")
                ->selectRaw("date_format(tanggal, '%d-%b-%Y') as tanggal_str");

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
            'title' => 'Instagram',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ]
        ];
        return view('admin.instagram', compact('page_attr'));
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
