<?php

namespace App\Http\Controllers\Frontend\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Keanggotaan\Anggota;
use App\Models\Pendaftaran\Sensus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use League\Config\Exception\ValidationException;

class SensusController extends Controller
{
    public function index(Request $request)
    {
        $page_attr = [
            'navigation' => 'pendaftaran',
            'title' => 'Sensus data anggota',
            'description' => 'Untuk pemutakhiran databse anggota',
            'image' => asset('assets/pendaftarans/20220502202741.png'),
        ];
        return view('pages.frontend.pendaftaran.sensus', compact('page_attr'));
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
            $jadikan_pengguna =  settings()->get('setting.sensus.jadikan_pengguna', false);
            $sebagai =  settings()->get('setting.sensus.sebagai', '');

            DB::beginTransaction();
            $model = new Sensus();
            $model->nama = $request->nama;
            $model->angkatan = $request->angkatan;
            $model->email = $request->email;
            $model->whatsapp = $request->whatsapp;
            $model->telepon = $request->telepon;

            if ($jadikan_pengguna) {
                // cek email
                $cek_email = User::where('email', $model->email)->count();
                if ($cek_email > 0) {
                    $model->status = 3;
                    $model->keterangan = 'Email sudah digunakan';
                } else {
                    $password = '12345678';
                    $username = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->nama)) . date('YmdHis');
                    $user = new User();
                    $user->name = $request->nama;
                    $user->email = $request->email;
                    $user->username = $username;
                    $user->active = 1;
                    $user->password = Hash::make($password);
                    $user->save();

                    // simpan role
                    $user->assignRole($sebagai);

                    // simpan ke data anggota
                    $anggota = new Anggota();
                    $anggota->nama = $request->nama;
                    $anggota->angkatan = $request->angkatan;
                    $anggota->telepon = $request->telepon;
                    $anggota->whatsapp = $request->whatsapp;
                    $anggota->user_id = $user->id;
                    $anggota->save();

                    $model->status = 2;
                    $model->keterangan = "Sudah dijadikan pengguna dengan email: $request->email dan password: $password";
                }
            }
            $model->save();

            DB::commit();
            return response()->json($model->save());
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
}
