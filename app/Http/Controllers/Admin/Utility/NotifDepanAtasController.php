<?php

namespace App\Http\Controllers\Admin\Utility;

use League\Config\Exception\ValidationException;
use App\Models\Utility\NotifDepanAtas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotifDepanAtasController extends Controller
{
    private $validate_model = [
        'nama' => ['required', 'string', 'max:255'],
        'link' => ['nullable', 'string', 'max:255'],
        'link_nama' => ['nullable', 'string', 'max:255'],
        'deskripsi' => ['required', 'string'],
        'dari' => ['required', 'date'],
        'sampai' => ['nullable', 'date'],
    ];

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return NotifDepanAtas::datatable($request);
        }
        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.utility.notif_depan_atas');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new NotifDepanAtas();
            $model->nama = $request->nama;
            $model->deskripsi = $request->deskripsi;
            $model->dari = $request->dari;
            $model->sampai = $request->sampai;
            $model->link = $request->link;
            $model->link_nama = $request->link_nama;
            $model->save();

            NotifDepanAtas::feClearCache();

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
            $model = NotifDepanAtas::findOrFail($request->id);
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));

            $model->nama = $request->nama;
            $model->deskripsi = $request->deskripsi;
            $model->dari = $request->dari;
            $model->sampai = $request->sampai;
            $model->link = $request->link;
            $model->link_nama = $request->link_nama;
            $model->save();

            NotifDepanAtas::feClearCache();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(NotifDepanAtas $model): mixed
    {
        try {
            $model->delete();

            NotifDepanAtas::feClearCache();

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
        return NotifDepanAtas::findOrFail($request->id);
    }
}
