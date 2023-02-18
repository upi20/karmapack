<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Models\Keanggotaan\PendidikanJenis;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class PendidikanJenisController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return PendidikanJenis::datatable($request);
        }
        $page_attr = [
            'title' => 'Jenis Pendidikan Profil',
            'breadcrumbs' => [
                ['name' => 'Data Tambahan Profil'],
            ]
        ];
        return view('admin.profile.pendidikan_jenis', compact('page_attr'));
    }

    public function insert(Request $request)
    {
        try {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'keterangan' => ['required', 'string', 'max:255'],
                'status' => ['required', 'int'],
            ]);

            $model = new PendidikanJenis();
            $model->nama = $request->nama;
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
                'nama' => ['required', 'string', 'max:255'],
                'keterangan' => ['required', 'string', 'max:255'],
                'status' => ['required', 'int'],
            ]);

            $model = PendidikanJenis::find($request->id);
            $model->nama = $request->nama;
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

    public function delete(PendidikanJenis $model)
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
