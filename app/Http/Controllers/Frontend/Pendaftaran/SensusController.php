<?php

namespace App\Http\Controllers\Frontend\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Pendaftaran\Sensus;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class SensusController extends Controller
{
    public function index(Request $request)
    {
        $id_sensus = 3;
        $pendaftaran = Pendaftaran::find($id_sensus);

        if (!$pendaftaran) return abort(404);

        $page_attr = [
            'navigation' => 'pendaftaran',
            'title' => $pendaftaran->nama,
            'description' => $pendaftaran->deskripsi,
            'image' => asset(Pendaftaran::image_folder . '/' . $pendaftaran->foto),
        ];
        return view('frontend.pendaftaran.sensus', compact('page_attr'));
    }

    public function insert(Request $request)
    {
        try {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'angkatan' => ['required', 'int'],
                'email' => ['required', 'string', 'email'],
                'whatsapp' => ['required', 'string', 'max:255'],
                'telepon' => ['nullable', 'string', 'max:255'],
            ]);

            $model = new Sensus();
            $model->nama = $request->nama;
            $model->angkatan = $request->angkatan;
            $model->email = $request->email;
            $model->whatsapp = $request->whatsapp;
            $model->telepon = $request->telepon;

            return response()->json($model->save());
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
}
