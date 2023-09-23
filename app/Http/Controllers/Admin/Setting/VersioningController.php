<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Versioning;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class VersioningController extends Controller
{
    private $validate_model = [
        'nama' => ['required', 'string'],
        'waktu' => ['required', 'string'],
        'deskripsi' => ['required', 'string'],
        'major' => ['required', 'integer'],
        'minor' => ['required', 'integer'],
        'patch' => ['required', 'integer'],
        'oprional' => ['nullable', 'string'],
    ];

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Versioning::datatable($request);
        }
        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.setting.versioning');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new Versioning();
            $model->nama = $request->nama;
            $model->waktu = $request->waktu;
            $model->deskripsi = $request->deskripsi;
            $model->major = $request->major;
            $model->minor = $request->minor;
            $model->patch = $request->patch;
            $model->oprional = $request->oprional;
            $model->kode = "v$request->major.$request->minor.$request->patch" . ($request->oprional ? "-$request->oprional" : '');
            $model->save();

            Versioning::clearCache();
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
            $model = Versioning::findOrFail($request->id);
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));

            $model->nama = $request->nama;
            $model->waktu = $request->waktu;
            $model->deskripsi = $request->deskripsi;
            $model->major = $request->major;
            $model->minor = $request->minor;
            $model->patch = $request->patch;
            $model->oprional = $request->oprional;
            $model->kode = "v$request->major.$request->minor.$request->patch" . ($request->oprional ? "-$request->oprional" : '');
            $model->save();

            Versioning::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Versioning $model): mixed
    {
        try {
            $model->delete();

            Versioning::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete_bulk(Request $request): mixed
    {
        try {
            foreach ($request->ids as $id) {
                $return = $this->delete(Versioning::find($id));
                if ($return->getStatusCode() != 200) {
                    return response()->json($return->original, $return->getStatusCode());
                }
            }
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
        $model = Versioning::findOrFail($request->id);
        return response()->json($model);
    }
}
