<?php

namespace App\Http\Controllers\Admin\SPK\AHP;

use App\Http\Controllers\Controller;
use App\Models\SPK\AHP\Kriteria\Kriteria;
use App\Models\SPK\AHP\Kriteria\Perbandingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;

class KriteriaController extends Controller
{
    private $validate_model = [
        'kode' => ['required', 'string', 'unique:' . Kriteria::tableName],
        'nama' => ['required', 'string'],
    ];

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Kriteria::datatable($request);
        }

        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.SPK.AHP.kriteria');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);
            DB::beginTransaction();
            // insert kriteria
            $model = new Kriteria();
            $model->nama = $request->nama;
            $model->kode = $request->kode;
            $model->save();

            // insert kriteria perbandingan
            $kriteras = Kriteria::all();
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
            Kriteria::setNomralisasi();

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
            $model = Kriteria::findOrFail($request->id);
            $this->validate_model['kode'] = ['required', 'string', 'unique:' . Kriteria::tableName . ',kode,' . $request->id];
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));

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

    public function delete(Kriteria $model): mixed
    {
        try {
            $model->delete();
            Kriteria::setNomralisasi();
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
        return Kriteria::findOrFail($request->id);
    }

    public function bobot_all(Request $request)
    {
        return Kriteria::orderBy('kode')->get();
    }

    public function bobot_matrix(Request $request)
    {
        return Kriteria::getPerbandingan();
    }

    public function bobot_update(Request $request): mixed
    {
        try {
            if ($request->kriteria_x == $request->kriteria_y && $request->nilai != 1) {
                return response()->json(['message' => 'Kriteria yang sama harus bernilai 1'], 400);
            }

            // save
            DB::beginTransaction();
            $perbandingan = Perbandingan::where('kriteria_x_id', $request->kriteria_x)->where('kriteria_y_id', $request->kriteria_y)->first();
            $perbandingan->nilai = $request->nilai;
            $perbandingan->save();

            $perbandingan = Perbandingan::where('kriteria_x_id', $request->kriteria_y)->where('kriteria_y_id', $request->kriteria_x)->first();
            $perbandingan->nilai = 1 / $request->nilai;
            $perbandingan->save();

            Kriteria::setNomralisasi();
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
        return Kriteria::normalisasi();
    }
}
