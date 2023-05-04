<?php

namespace App\Http\Controllers\Admin\Utility;

use League\Config\Exception\ValidationException;
use App\Models\Utility\HariBesarNasional;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HariBesarNasionalController extends Controller
{
    private $validate_model = [
        'nama' => ['required', 'string', 'max:255'],
        'keterangan' => ['nullable', 'string'],
        'tahun' => ['nullable', 'int'],
        'hari' => ['required', 'int', 'max:31'],
        'bulan' => ['required', 'int', 'max:12'],
        'type' => ['required', 'int', 'max:9'],
    ];

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return HariBesarNasional::datatable($request);
        }
        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.utility.hari_besar_nasional');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new HariBesarNasional();
            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->tahun = $request->tahun;
            $model->hari = $request->hari;
            $model->bulan = $request->bulan;
            $model->type = $request->type;

            $model->save();
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
            $model = HariBesarNasional::findOrFail($request->id);
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));

            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->tahun = $request->tahun;
            $model->hari = $request->hari;
            $model->bulan = $request->bulan;
            $model->type = $request->type;
            $model->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(HariBesarNasional $model): mixed
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

    public function find(Request $request)
    {
        return HariBesarNasional::findOrFail($request->id);
    }

    public function list_error(Request $request): mixed
    {
        $list = HariBesarNasional::select([DB::raw("id,nama")])->whereRaw("(type = 0) and (tahun <> year(now()) or tahun is null)")->get();
        return response()->json($list);
    }
}
