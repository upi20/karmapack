<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{

    private $key = 'setting.home.visi_misi';
    private $folder_image = '/assets/setting/home';

    public function index(Request $request)
    {
        $page_attr = adminBreadcumb(h_prefix());
        $setting = (object)[
            'visible' => setting_get("$this->key.visible"),
            'title' => setting_get("$this->key.title"),
            'sub_title' => setting_get("$this->key.sub_title"),

            'visi_title' => setting_get("$this->key.visi_title"),
            'visi_image' => setting_get("$this->key.visi_image"),
            'visi' => setting_get("$this->key.visi"),

            'misi_title' => setting_get("$this->key.misi_title"),
            'misi_image' => setting_get("$this->key.misi_image"),
            'misi' => setting_get("$this->key.misi"),

        ];

        $view = path_view('pages.admin.setting.visi_misi');
        $data = compact('page_attr', 'setting', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function update(Request $request)
    {
        setting_set("$this->key.visible", $request->visible != null);
        setting_set("$this->key.title", $request->title);
        setting_set("$this->key.sub_title", $request->sub_title);
        setting_set("$this->key.visi", $request->visi);
        setting_set("$this->key.visi_title", $request->visi_title);
        setting_set("$this->key.misi", $request->misi);
        setting_set("$this->key.misi_title", $request->misi_title);

        // image
        $key = 'visi_image';
        $current = setting_get("$this->key.$key");
        $visi_image = $current;
        if ($image = $request->file($key)) {
            // delete foto
            $folder = $this->folder_image;
            if ($current) {
                $path = public_path("$folder/$current");
                delete_file($path);
            }

            $foto = "$folder/$key." . $image->getClientOriginalExtension();
            $image->move(public_path($folder), $foto);
            $visi_image = $foto;
            // save foto
            setting_set("$this->key.$key", $foto);
        }

        $key = 'misi_image';
        $current = setting_get("$this->key.$key");
        $misi_image = $current;
        if ($image = $request->file($key)) {
            // delete foto
            $folder = $this->folder_image;
            if ($current) {
                $path = public_path("$folder/$current");
                delete_file($path);
            }

            $foto = "$folder/$key." . $image->getClientOriginalExtension();
            $image->move(public_path($folder), $foto);
            $misi_image = $foto;
            // save foto
            setting_set("$this->key.$key", $foto);
        }

        return response()->json(compact('misi_image', 'visi_image'));
    }
}
