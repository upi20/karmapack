<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\HomeSlider;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class HomeSliderController extends Controller
{
    private $validate_model = [
        'nama' => ['required', 'string', 'max:255'],
        'judul' => ['nullable', 'string'],
        'keterangan' => ['nullable', 'string'],
        'tombol_judul' => ['nullable', 'string'],
        'tombol_link' => ['nullable', 'string'],
        'tombol_video_judul' => ['nullable', 'string'],
        'tombol_video_link' => ['nullable', 'string'],
        'urutan' => ['nullable', 'integer'],
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'tampilkan' => ['required', 'string'],
    ];

    private $image_folder = HomeSlider::image_folder;

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return HomeSlider::datatable($request);
        }
        $image_folder = $this->image_folder;
        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.setting.home_slider');
        $data = compact('page_attr', 'image_folder', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new HomeSlider();
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);
            }

            $model->urutan = $request->urutan ?? ((HomeSlider::max('urutan') ?? 0) + 1);
            $model->foto = $foto;

            $model->nama = $request->nama;
            $model->judul = $request->judul;
            $model->keterangan = $request->keterangan;
            $model->tombol_judul = $request->tombol_judul;
            $model->tombol_link = $request->tombol_link;
            $model->tombol_video_judul = $request->tombol_video_judul;
            $model->tombol_video_link = $request->tombol_video_link;
            $model->tampilkan = $request->tampilkan;
            $model->save();

            HomeSlider::feClearCache();
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
            $model = HomeSlider::findOrFail($request->id);
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

            $model->urutan = $request->urutan ?? ((HomeSlider::max('urutan') ?? 0) + 1);

            $model->nama = $request->nama;
            $model->judul = $request->judul;
            $model->keterangan = $request->keterangan;
            $model->tombol_judul = $request->tombol_judul;
            $model->tombol_link = $request->tombol_link;
            $model->tombol_video_judul = $request->tombol_video_judul;
            $model->tombol_video_link = $request->tombol_video_link;
            $model->tampilkan = $request->tampilkan;
            $model->save();

            HomeSlider::feClearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(HomeSlider $model): mixed
    {
        try {
            $model->delete();
            // delete foto
            if ($model->foto) {
                $path = public_path("$this->image_folder/$model->foto");
                delete_file($path);
            }

            HomeSlider::feClearCache();
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
        $model = HomeSlider::findOrFail($request->id);
        $model->foto_url = $model->fotoUrl();
        return $model;
    }
}
