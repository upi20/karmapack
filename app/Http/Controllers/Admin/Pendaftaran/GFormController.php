<?php

namespace App\Http\Controllers\Admin\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Pendaftaran\GForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;

class GFormController extends Controller
{
    private $validate_model = [
        'nama' => ['required', 'string', 'max:255'],
        'link' => ['required', 'string', 'max:255'],
        'deskripsi' => ['required', 'string'],
        'no_urut' => ['required', 'int'],
        'dari' => ['required'],
        'sampai' => ['required'],
        'status' => ['required', 'int'],
        'tampilkan' => ['required', 'int'],
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    private $image_folder = GForm::image_folder;

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return GForm::datatable($request);
        }
        $image_folder = $this->image_folder;

        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.pendaftaran.gform');
        $data = compact('page_attr', 'image_folder', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate(array_merge([
                'slug' => ['required', 'string', 'max:255', ('unique:' . GForm::tableName . ',slug')],
            ], $this->validate_model));

            $model = new GForm();
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);
            }

            $model->foto = $foto;
            $model->user_id = auth()->user()->id;
            $model->nama = $request->nama;
            $model->slug = $request->slug;
            $model->deskripsi = $request->deskripsi;
            $model->no_urut = $request->no_urut;
            $model->dari = $request->dari;
            $model->sampai = $request->sampai;
            $model->link = $request->link;
            $model->tampilkan = $request->tampilkan;
            $model->status = $request->status;
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
            $model = GForm::findOrFail($request->id);
            if (!$this->savePermission($model)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);
            $request->validate(array_merge(['id' => [
                'required', 'int',
                'slug' => ['required', 'string', 'max:255', ('unique:' . GForm::tableName . ',slug,' . $request->id)],
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

            $model->nama = $request->nama;
            $model->slug = $request->slug;
            $model->deskripsi = $request->deskripsi;
            $model->no_urut = $request->no_urut;
            $model->dari = $request->dari;
            $model->sampai = $request->sampai;
            $model->link = $request->link;
            $model->tampilkan = $request->tampilkan;
            $model->status = $request->status;
            $model->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(GForm $model): mixed
    {
        try {
            if (!$this->savePermission($model)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);
            $model->delete();
            // delete foto
            if ($model->foto) {
                $path = public_path("$this->image_folder/$model->foto");
                delete_file($path);
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
        return GForm::findOrFail($request->id);
    }

    private function savePermission(GForm $model): bool
    {
        // periksa role
        $user = auth()->user();

        if (is_admin()) {
            return true;
        } else {
            if ($user->id == $model->user_id) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function member_select2(Request $request)
    {
        try {
            $model = User::select(['id', DB::raw("name as text")])
                ->whereRaw("(
                    `name` like '%$request->search%' or
                    `email` like '%$request->search%' or
                    `id` like '%$request->search%'
                    )")
                ->limit(10);

            $result = $model->get()->toArray();
            return response()->json(['results' => array_merge([['id' => '', 'text' => 'Semua']], $result)]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function frontend_detail(GForm $model)
    {
        if ($model->status == 0) return abort(404);
        $folder = GForm::image_folder;
        $user = User::find($model->user_id);

        $image = is_null($model->foto) ? '' : url("$folder/$model->foto");
        $page_attr = [
            'title' => $model->nama,
            'url' => url(h_prefix_uri()),
            'description' => $model->deskripsi,
            'author' => $user->name,
            'image' => $image,
        ];

        if ($model->tampilkan == 1) {
            $page_attr['navigation'] = 'pendaftaran';
        }

        $link = str_contains($model->link, '?') ? ($model->link . '&') : ($model->link . '?');
        $link = $link . 'embedded=true';
        return view('pages.frontend.pendaftaran.gform', compact('page_attr', 'model', 'link'));
    }
}
