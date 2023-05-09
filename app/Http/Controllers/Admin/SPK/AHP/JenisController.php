<?php

namespace App\Http\Controllers\Admin\SPK\AHP;

use App\Http\Controllers\Controller;
use App\Models\SPK\AHP\Kriteria\Jenis\Jenis;
use App\Models\SPK\AHP\Kriteria\Jenis\Perbandingan;
use App\Models\SPK\AHP\Kriteria\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;

class JenisController extends Controller
{
    private $validate_model = [
        'kode' => ['required', 'string'],
        'nama' => ['required', 'string'],
        'kriteria_id' => ['required', 'integer'],
    ];

    public function index(Request $request, Kriteria $kriteria)
    {
        if (request()->ajax()) {
            return Jenis::datatable($request);
        }

        $page_attr = adminBreadcumb(h_prefix(min: 2), isChild: true);
        $page_attr = [
            'title' => 'Jenis ' . $kriteria->nama,
            'breadcrumbs' => $page_attr['breadcrumbs'],
            'navigation' => h_prefix(min: 2)
        ];

        $view = path_view('pages.admin.SPK.AHP.jenis');
        $data = compact('page_attr', 'view', 'kriteria');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);
            // cek kode
            $cek = Jenis::where('kode', $request->kode)->where('kriteria_id', $request->kriteria_id)->first();
            if ($cek != null) {
                return response()->json(['message' => 'Kode sudah digunakan'], 400);
            }

            DB::beginTransaction();
            // insert kriteria
            $model = new Jenis();
            $model->kriteria_id = $request->kriteria_id;
            $model->nama = $request->nama;
            $model->kode = $request->kode;
            $model->save();

            // insert kriteria perbandingan
            $kriteras = Jenis::where('kriteria_id', $request->kriteria_id)->get();
            foreach ($kriteras as $kriteria) {
                $perbandingan = new Perbandingan();
                $perbandingan->kriteria_x_id = $model->id;
                $perbandingan->kriteria_y_id = $kriteria->id;
                $perbandingan->nilai = 1;
                $perbandingan->save();
            }

            foreach ($kriteras as $kriteria) {
                if ($kriteria->id == $model->id) continue;
                $perbandingan = new Perbandingan();
                $perbandingan->kriteria_x_id = $kriteria->id;
                $perbandingan->kriteria_y_id = $model->id;
                $perbandingan->nilai = 1;
                $perbandingan->save();
            }
            Jenis::setNomralisasi($request->kriteria_id);

            DB::commit();
            return response()->json(Perbandingan::all());
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
            $model = Jenis::findOrFail($request->id);

            $cek = Jenis::where('kode', $request->kode)
                ->where('kriteria_id', $request->kriteria_id)
                ->where('id', '<>', $request->id)
                ->first();
            if ($cek != null) {
                return response()->json(['message' => 'Kode sudah digunakan'], 400);
            }

            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));

            $model->kriteria_id = $request->kriteria_id;
            $model->nama = $request->nama;
            $model->kode = $request->kode;
            $model->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Jenis $model): mixed
    {
        try {
            Jenis::setNomralisasi($model->kriteria_id);
            $model->delete();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function find(Request $request)
    {
        return Jenis::findOrFail($request->id);
    }

    public function bobot_all(Request $request)
    {
        $kriteria_id = $request->kriteria_id;
        return Jenis::orderBy('kode')->where('kriteria_id', $kriteria_id)->get();
    }

    public function bobot_matrix(Request $request)
    {
        $kriteria_id = $request->kriteria_id;
        return Jenis::getPerbandingan($kriteria_id);
    }

    public function bobot_update(Request $request): mixed
    {
        try {
            if ($request->kriteria_x == $request->kriteria_y && $request->nilai != 1) {
                return response()->json(['message' => 'Jenis yang sama harus bernilai 1'], 400);
            }

            // save
            DB::beginTransaction();
            $perbandingan = Perbandingan::where('kriteria_x_id', $request->kriteria_x)->where('kriteria_y_id', $request->kriteria_y)->first();
            $perbandingan->nilai = $request->nilai;
            $perbandingan->save();

            $perbandingan = Perbandingan::where('kriteria_x_id', $request->kriteria_y)->where('kriteria_y_id', $request->kriteria_x)->first();
            $perbandingan->nilai = 1 / $request->nilai;
            $perbandingan->save();

            Jenis::setNomralisasi($request->kriteria_id);
            DB::commit();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function bobot_normalisasi(Request $request)
    {
        $kriteria_id = $request->kriteria_id;
        return Jenis::normalisasi($kriteria_id);
    }
}
