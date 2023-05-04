<?php

namespace App\Http\Controllers\Admin\Kepengurusan;

use App\Http\Controllers\Controller;
use App\Models\Keanggotaan\Anggota;
use App\Models\Kepengurusan\Anggota as KepengurusanAnggota;
use App\Models\Kepengurusan\Jabatan as KepengurusanJabatan;
use App\Models\Kepengurusan\Periode as KepengurusanPeriode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;
use Error;

class JabatanMemberController extends Controller
{
    public function index(KepengurusanJabatan $jabatan, Request $request)
    {

        $anggotas = $jabatan->anggotas()->with('anggota')->get();
        $page_attr = adminBreadcumb(
            h_prefix('periode', 3),
            addbreadcrumbs: [['name' => 'Bidang', 'url' => ['admin.kepengurusan.jabatan', $jabatan->periode_id]]],
            isChild: true
        );
        $page_attr = [
            'title' => "Anggota Bidang " . $jabatan->nama,
            'breadcrumbs' => $page_attr['breadcrumbs'],
            'navigation' => h_prefix('periode', 3),
        ];

        $view = path_view('pages.admin.kepengurusan.jabatan.member');
        $data = compact('page_attr', 'jabatan', 'anggotas', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function select2(Request $request)
    {
        try {
            $model = Anggota::select(['id', DB::raw("concat(angkatan,' | ',nama) as text")])
                ->whereRaw("(
                    `nama` like '%$request->search%' or
                    `alamat_lengkap` like '%$request->search%' or
                    `angkatan` like '%$request->search%'
                    )")
                ->limit(10);

            $result = $model->get()->toArray();
            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function save(Request $request)
    {
        try {
            $request->validate([
                'anggotas' => ['required'],
                'periode_id' => ['required', 'int'],
                'jabatan_id' => ['required', 'int'],
            ]);
            $t_jabatan = KepengurusanJabatan::tableName;
            $t_anggota = KepengurusanAnggota::tableName;

            DB::beginTransaction();

            // check
            if (!auth_has_role(config('app.super_admin_role'))) {
                $periode = KepengurusanPeriode::where('id', '=', $request->periode_id)->first();
                if ($periode->status == 0) {
                    throw new Error("Anda tidak mempunyai izin untuk mengubah data di periode ini. (Status periode ini tidak aktif Silahkan hubungi administrator)");
                }
            }


            // delete anggota jabatan terlebih dahulu
            $current = KepengurusanAnggota::where('jabatan_id', $request->jabatan_id)->get();
            foreach ($current as $c) {
                $c->delete();
            }

            // masukan ke jabatan
            foreach ($request->anggotas as $anggota) {
                // cek terlebih dahulu apakah anggota ini sudah ada jabatan di periode ini ?
                $cek = KepengurusanAnggota::join($t_jabatan, "$t_jabatan.id", '=', "$t_anggota.jabatan_id")
                    ->where("$t_jabatan.periode_id", $request->periode_id)
                    ->where("$t_anggota.anggota_id", $anggota)
                    ->first();

                if ($cek != null) {
                    $jabatan_text = $cek->jabatan->nama;
                    if ($cek->jabatan->parent) {
                        $jabatan_text .= (" -> " . $cek->jabatan->parent->nama);
                    }
                    throw new Error($cek->anggota->nama . " Sudah terdaftar sebagai $jabatan_text");
                }

                // jika sudah aman maka masukan ke database
                $new_anggota = new KepengurusanAnggota();
                $new_anggota->anggota_id = $anggota;
                $new_anggota->jabatan_id = $request->jabatan_id;
                $new_anggota->save();
            }
            DB::commit();

            KepengurusanPeriode::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
}
