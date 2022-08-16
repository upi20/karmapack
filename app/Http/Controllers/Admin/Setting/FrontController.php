<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    private $folder_logo = '/assets/setting/front/logo';
    private $folder_meta_logo = '/assets/setting/front/meta';

    public function index(Request $request)
    {
        $page_attr = [
            'title' => 'Front Setting',
            'breadcrumbs' => [
                ['name' => 'Setting'],
            ]
        ];
        $data = compact(
            'page_attr',
        );
        return view('admin.setting.front',  array_merge($data, ['compact' => $data]));
    }

    public function save_app(Request $request)
    {
        $result = [];
        settings()->set(set_front('app.title'), $request->title)->save();
        settings()->set(set_front('app.copyright'), $request->copyright)->save();
        settings()->set(set_front('app.preloader'), !is_null($request->preloader))->save();

        // logo
        // dark mode
        $foto = '';
        $key = 'foto_dark_landscape_mode';
        $current = settings()->get(set_front("app.$key"));
        $result[] = [$key => $current];
        if ($image = $request->file($key)) {
            // delete foto
            if ($current) {
                $path = public_path("$this->folder_logo/$current");
                delete_file($path);
            }

            $foto = $this->folder_logo . '/' . $key . "." . $image->getClientOriginalExtension();
            $image->move(public_path($this->folder_logo), $foto);

            // save foto
            settings()->set(set_front("app.$key"), $foto)->save();
            $result[count($result) - 1] = [$key => $foto];
        }

        // light mode
        $foto = '';
        $key = 'foto_light_landscape_mode';
        $current = settings()->get(set_front("app.$key"));
        $result[] = [$key => $current];
        if ($image = $request->file($key)) {
            // delete foto
            if ($current) {
                $path = public_path("$this->folder_logo/$current");
                delete_file($path);
            }

            $foto = $this->folder_logo . '/' . $key . "." . $image->getClientOriginalExtension();
            $image->move(public_path($this->folder_logo), $foto);

            // save foto
            settings()->set(set_front("app.$key"), $foto)->save();
            $result[count($result) - 1] = [$key => $foto];
        }

        // logo
        // dark mode
        $foto = '';
        $key = 'foto_dark_mode';
        $current = settings()->get(set_front("app.$key"));
        $result[] = [$key => $current];
        if ($image = $request->file($key)) {
            // delete foto
            if ($current) {
                $path = public_path("$this->folder_logo/$current");
                delete_file($path);
            }

            $foto = $this->folder_logo . '/' . $key . "." . $image->getClientOriginalExtension();
            $image->move(public_path($this->folder_logo), $foto);

            // save foto
            settings()->set(set_front("app.$key"), $foto)->save();
            $result[count($result) - 1] = [$key => $foto];
        }

        // light mode
        $foto = '';
        $key = 'foto_light_mode';
        $current = settings()->get(set_front("app.$key"));
        $result[] = [$key => $current];
        if ($image = $request->file($key)) {
            // delete foto
            if ($current) {
                $path = public_path("$this->folder_logo/$current");
                delete_file($path);
            }

            $foto = $this->folder_logo . '/' . $key . "." . $image->getClientOriginalExtension();
            $image->move(public_path($this->folder_logo), $foto);

            // save foto
            settings()->set(set_front("app.$key"), $foto)->save();
            $result[count($result) - 1] = [$key => $foto];
        }
        return response()->json($result);
    }

    public function save_meta(Request $request)
    {
        $result = [];
        settings()->set(set_front('meta.author'), $request->author)->save();
        settings()->set(set_front('meta.keyword'), $request->keyword)->save();
        settings()->set(set_front('meta.description'), $request->description)->save();

        // logo
        $key = 'image';
        $current = settings()->get(set_front("meta.$key"));
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
            settings()->set(set_front("meta.$key"), $foto)->save();
            $result[count($result) - 1] = [$key => $foto];
        }

        return response()->json($result);
    }

    private function meta_list_get()
    {

        $list = settings()->get(set_front("meta_list"), null);
        return is_null($list) ? [] : json_decode($list);
    }

    private function meta_list_set($list)
    {
        $list = json_encode($list);
        settings()->set(set_front("meta_list"), $list)->save();

        return $this->meta_list_get();
    }

    public function meta_list(Request $request)
    {
        return $this->meta_list_get();
    }

    public function meta_insert(Request $request)
    {
        $list = $this->meta_list_get();
        array_push($list, ['name' => $request->name, 'value' => $request->value]);
        return $this->meta_list_set($list);
    }

    public function meta_update(Request $request)
    {
        $id = $request->id;
        $list = $this->meta_list_get();
        $result = [];
        foreach ($list as $k => $v) {
            if ($k == $id) {
                $result[] = ['name' => $request->name, 'value' => $request->value];
            } else {
                $result[] = $v;
            }
        }
        return $this->meta_list_set($result);
    }

    public function meta_delete(Request $request)
    {
        $id = $request->id;
        $list = $this->meta_list_get();
        $result = [];
        foreach ($list as $k => $v) {
            if ($k != $id) {
                $result[] = $v;
            }
        }
        return $this->meta_list_set($result);
    }
}
