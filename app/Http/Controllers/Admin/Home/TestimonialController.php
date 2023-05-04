<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\Testimonial;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class TestimonialController extends Controller
{
    private $validate_model = [
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'urutan' => ['nullable', 'integer'],
        'nama' => ['required', 'string'],
        'sebagai' => ['required', 'string'],
        'tampilkan' => ['required', 'string'],
        'testimoni' => ['required', 'string'],
    ];

    private $image_folder = Testimonial::image_folder;

    private $key = 'setting.home.testimonial';
    private $folder_image = '/assets/setting/home';

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Testimonial::datatable($request);
        }
        $image_folder = $this->image_folder;
        $page_attr = adminBreadcumb(h_prefix());

        $setting = (object)[
            'visible' => setting_get("$this->key.visible"),
            'title' => setting_get("$this->key.title"),
        ];

        $folder_image = $this->folder_image;
        $view = path_view('pages.admin.home.testimonial');
        $data = compact('page_attr', 'image_folder', 'setting', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new Testimonial();
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);
            }
            $model->foto = $foto;

            $urutan = $request->urutan ?? ((Testimonial::max('urutan') ?? 0) + 1);
            $model->urutan = $urutan;
            $model->nama = $request->nama;
            $model->sebagai = $request->sebagai;
            $model->tampilkan = $request->tampilkan;
            $model->testimoni = $request->testimoni;
            $model->save();

            Testimonial::feClearCache();

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
            $model = Testimonial::findOrFail($request->id);
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

            $urutan = $request->urutan ?? ((Testimonial::max('urutan') ?? 0) + 1);
            $model->urutan = $urutan;

            $model->nama = $request->nama;
            $model->sebagai = $request->sebagai;
            $model->tampilkan = $request->tampilkan;
            $model->testimoni = $request->testimoni;
            $model->save();

            Testimonial::feClearCache();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Testimonial $model): mixed
    {
        try {
            $model->delete();
            // delete foto
            if ($model->foto) {
                $path = public_path("$this->image_folder/$model->foto");
                delete_file($path);
            }

            Testimonial::feClearCache();

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
        return Testimonial::findOrFail($request->id);
    }

    public function setting(Request $request)
    {
        setting_set("$this->key.visible", $request->visible != null);
        setting_set("$this->key.title", $request->title);
        return response()->json([]);
    }
}
