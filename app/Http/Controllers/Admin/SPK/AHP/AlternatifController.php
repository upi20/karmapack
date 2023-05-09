<?php

namespace App\Http\Controllers\Admin\SPK\AHP;

use App\Http\Controllers\Controller;
use App\Models\SPK\AHP\Kriteria\Kriteria;
use App\Models\SPK\AHP\Kriteria\Perbandingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;
use App\Models\Keanggotaan\Anggota;
use App\Models\SPK\AHP\Alternatif\Alternatif;
use App\Models\SPK\AHP\Alternatif\Kriteria as AlternatifKriteria;
use App\Models\SPK\AHP\Kriteria\Jenis\Jenis;

class AlternatifController extends Controller
{
    private $validate_model = [
        'anggota_id' => ['required', 'integer'],
    ];

    public function index(Request $request)
    {
        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.SPK.AHP.alternatif');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);
            // check apakah anggota sudah ada
            $check = Alternatif::where('anggota_id', $request->anggota_id)->count();
            if ($check > 0) {
                return response()->json(['message' => 'Pengurus sudah ada'], 400);
            }

            // insert
            DB::beginTransaction();
            // simpan alternatif
            $alternatif = new Alternatif();
            $alternatif->anggota_id = $request->anggota_id;
            $alternatif->save();

            // simpan alternatif kriteria
            foreach ($request->jenis as $jenis) {
                $jenis_get = Jenis::findOrFail($jenis);

                // alternatif_kriteria
                $ak = new AlternatifKriteria();
                $ak->alternatif_id = $alternatif->id;
                $ak->kriteria_id = $jenis_get->kriteria_id;
                $ak->kriteria_jenis_id = $jenis_get->id;
                $ak->save();
            }

            DB::commit();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function update(Request $request): mixed
    {
        try {
            DB::beginTransaction();
            $alternatif = Alternatif::findOrFail($request->id);
            $request->validate($this->validate_model);

            // check apakah anggota sudah ada
            $check = Alternatif::where('anggota_id', $request->anggota_id)
                ->where('id', '<>', $request->id)
                ->count();
            if ($check > 0) {
                return response()->json(['message' => 'Pengurus sudah ada'], 400);
            }

            // simpan alternatif
            $alternatif->anggota_id = $request->anggota_id;
            $alternatif->save();

            // hapus semua kriteria yang ada
            AlternatifKriteria::where('alternatif_id', $alternatif->id)->delete();

            // simpan alternatif kriteria
            foreach ($request->jenis as $jenis) {
                $jenis_get = Jenis::findOrFail($jenis);

                // alternatif_kriteria
                $ak = new AlternatifKriteria();
                $ak->alternatif_id = $alternatif->id;
                $ak->kriteria_id = $jenis_get->kriteria_id;
                $ak->kriteria_jenis_id = $jenis_get->id;
                $ak->save();
            }

            DB::commit();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Alternatif $model): mixed
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

    public function table()
    {
        try {
            $alternatif = Alternatif::table();
            return response()->json($alternatif);
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function option()
    {
        try {
            $get = Kriteria::with(['jenis' => function ($query) {
                $query->orderBy('kode');
            }])->get();

            return response()->json($get);
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

    public function find(Request $request)
    {
        try {
            $get = Alternatif::getEdit($request->id);
            return response()->json($get);
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
}
