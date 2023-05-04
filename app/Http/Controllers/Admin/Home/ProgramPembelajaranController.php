<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\ProgramPembelajaran;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class ProgramPembelajaranController extends Controller
{
    private $validate_model = [
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'urutan' => ['nullable', 'integer'],
        'nama' => ['required', 'string'],
        'keterangan' => ['required', 'string'],
    ];

    private $image_folder = ProgramPembelajaran::image_folder;

    private $key = 'setting.home.program_pembelajaran';

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return ProgramPembelajaran::datatable($request);
        }
        $image_folder = $this->image_folder;
        $page_attr = adminBreadcumb(h_prefix());

        $setting = (object)[
            'visible' => setting_get("$this->key.visible"),
            'title' => setting_get("$this->key.title"),
            'sub_title' => setting_get("$this->key.sub_title"),
            'number' => setting_get("$this->key.number")
        ];
        $view = path_view('pages.admin.home.program_pembelajaran');
        $data = compact('page_attr', 'image_folder', 'setting', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new ProgramPembelajaran();
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);
            }

            $model->foto = $foto;
            $urutan = $request->urutan ?? ((ProgramPembelajaran::max('urutan') ?? 0) + 1);
            $model->urutan = $urutan;
            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->save();

            ProgramPembelajaran::feClearCache();

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
            $model = ProgramPembelajaran::findOrFail($request->id);
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));

            // foto handle
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);

                // delete foto
                if ($model->foto) {
                    $path = public_path("$this->image_folder/$model->foto");
                    delete_file($path);
                }
                // save foto
                $model->foto = $foto;
            }

            $urutan = $request->urutan ?? ((ProgramPembelajaran::max('urutan') ?? 0) + 1);
            $model->urutan = $urutan;
            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->save();

            ProgramPembelajaran::feClearCache();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(ProgramPembelajaran $model): mixed
    {
        try {
            $model->delete();
            // delete foto
            if ($model->foto) {
                $path = public_path("$this->image_folder/$model->foto");
                delete_file($path);
            }

            ProgramPembelajaran::feClearCache();

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
        return ProgramPembelajaran::findOrFail($request->id);
    }

    public function setting(Request $request)
    {
        setting_set("$this->key.visible", $request->visible != null);
        return response()->json();
    }
}
