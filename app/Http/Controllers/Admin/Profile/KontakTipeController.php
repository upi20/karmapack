<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Models\Keanggotaan\KontakJenis;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class KontakTipeController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return KontakJenis::datatable($request);
        }

        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.profile.kontak_tipe');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }


    public function insert(Request $request)
    {
        try {
            $request->validate([
                'icon' => ['required', 'string', 'max:255'],
                'nama' => ['required', 'string', 'max:255'],
                'keterangan' => ['required', 'string', 'max:255'],
                'status' => ['required', 'int'],
            ]);

            $model = new KontakJenis();
            $model->nama = $request->nama;
            $model->icon = $request->icon;
            $model->keterangan = $request->keterangan;
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
            $request->validate([
                'icon' => ['required', 'string', 'max:255'],
                'nama' => ['required', 'string', 'max:255'],
                'keterangan' => ['required', 'string', 'max:255'],
                'status' => ['required', 'int'],
            ]);

            $model = KontakJenis::find($request->id);
            $model->nama = $request->nama;
            $model->icon = $request->icon;
            $model->keterangan = $request->keterangan;
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

    public function delete(KontakJenis $model)
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
}
