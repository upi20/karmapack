<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $folder_admin_logo = '/assets/setting/admin/logo';
    private $folder_meta_logo = '/assets/setting/meta';
    public function admin()
    {
        $page_attr = [
            'title' => 'Admin Setting',
            'breadcrumbs' => [
                ['name' => 'Setting'],
            ]
        ];
        $data = compact(
            'page_attr',
        );
        return view('admin.setting.admin',  array_merge($data, ['compact' => $data]));
    }

    public function admin_save_app(Request $request)
    {
        $result = [];
        settings()->set(set_admin('app.title'), $request->title)->save();
        settings()->set(set_admin('app.copyright'), $request->copyright)->save();
        settings()->set(set_admin('app.preloader'), !is_null($request->preloader))->save();

        // logo
        // dark mode
        $foto = '';
        $key = 'foto_dark_landscape_mode';
        $current = settings()->get(set_admin("app.$key"));
        $result[] = [$key => $current];
        if ($image = $request->file($key)) {
            // delete foto
            if ($current) {
                $path = public_path("$this->folder_admin_logo/$current");
                delete_file($path);
            }

            $foto = $this->folder_admin_logo . '/' . $key . "." . $image->getClientOriginalExtension();
            $image->move(public_path($this->folder_admin_logo), $foto);

            // save foto
            settings()->set(set_admin("app.$key"), $foto)->save();
            $result[count($result) - 1] = [$key => $foto];
        }

        // light mode
        $foto = '';
        $key = 'foto_light_landscape_mode';
        $current = settings()->get(set_admin("app.$key"));
        $result[] = [$key => $current];
        if ($image = $request->file($key)) {
            // delete foto
            if ($current) {
                $path = public_path("$this->folder_admin_logo/$current");
                delete_file($path);
            }

            $foto = $this->folder_admin_logo . '/' . $key . "." . $image->getClientOriginalExtension();
            $image->move(public_path($this->folder_admin_logo), $foto);

            // save foto
            settings()->set(set_admin("app.$key"), $foto)->save();
            $result[count($result) - 1] = [$key => $foto];
        }

        // logo
        // dark mode
        $foto = '';
        $key = 'foto_dark_mode';
        $current = settings()->get(set_admin("app.$key"));
        $result[] = [$key => $current];
        if ($image = $request->file($key)) {
            // delete foto
            if ($current) {
                $path = public_path("$this->folder_admin_logo/$current");
                delete_file($path);
            }

            $foto = $this->folder_admin_logo . '/' . $key . "." . $image->getClientOriginalExtension();
            $image->move(public_path($this->folder_admin_logo), $foto);

            // save foto
            settings()->set(set_admin("app.$key"), $foto)->save();
            $result[count($result) - 1] = [$key => $foto];
        }

        // light mode
        $foto = '';
        $key = 'foto_light_mode';
        $current = settings()->get(set_admin("app.$key"));
        $result[] = [$key => $current];
        if ($image = $request->file($key)) {
            // delete foto
            if ($current) {
                $path = public_path("$this->folder_admin_logo/$current");
                delete_file($path);
            }

            $foto = $this->folder_admin_logo . '/' . $key . "." . $image->getClientOriginalExtension();
            $image->move(public_path($this->folder_admin_logo), $foto);

            // save foto
            settings()->set(set_admin("app.$key"), $foto)->save();
            $result[count($result) - 1] = [$key => $foto];
        }
        return response()->json($result);
    }

    public function admin_save_meta(Request $request)
    {
        $result = [];
        settings()->set(set_admin('meta.author'), $request->author)->save();
        settings()->set(set_admin('meta.keyword'), $request->keyword)->save();
        settings()->set(set_admin('meta.description'), $request->description)->save();

        // logo
        $key = 'image';
        $current = settings()->get(set_admin("meta.$key"));
        $result[] = [$key => $current];
        if ($image = $request->file($key)) {
            // delete foto
            $folder = $this->folder_meta_logo;
            if ($current) {
                $path = public_path("$folder/$current");
                delete_file($path);
            }

            $foto = $folder . '/' . $key . "." . $image->getClientOriginalExtension();
            $image->move(public_path($folder), $foto);

            // save foto
            settings()->set(set_admin("meta.$key"), $foto)->save();
            $result[count($result) - 1] = [$key => $foto];
        }

        return response()->json($result);
    }

    private function admin_meta_list_get()
    {

        $list = settings()->get(set_admin("meta_list"), null);
        return is_null($list) ? [] : json_decode($list);
    }

    private function admin_meta_list_set($list)
    {
        $list = json_encode($list);
        settings()->set(set_admin("meta_list"), $list)->save();

        return $this->admin_meta_list_get();
    }

    public function admin_meta_list(Request $request)
    {
        return $this->admin_meta_list_get();
    }

    public function admin_meta_insert(Request $request)
    {
        $list = $this->admin_meta_list_get();
        array_push($list, ['name' => $request->name, 'value' => $request->value]);
        return $this->admin_meta_list_set($list);
    }

    public function admin_meta_update(Request $request)
    {
        $id = $request->id;
        $list = $this->admin_meta_list_get();
        $result = [];
        foreach ($list as $k => $v) {
            if ($k == $id) {
                $result[] = ['name' => $request->name, 'value' => $request->value];
            } else {
                $result[] = $v;
            }
        }
        return $this->admin_meta_list_set($result);
    }

    public function admin_meta_delete(Request $request)
    {
        $id = $request->id;
        $list = $this->admin_meta_list_get();
        $result = [];
        foreach ($list as $k => $v) {
            if ($k != $id) {
                $result[] = $v;
            }
        }
        return $this->admin_meta_list_set($result);
    }
}
