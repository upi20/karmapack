<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $folder_image = '/assets/setting/home';
    private $setting_prefix = 'setting.home';
    private $pre = '';

    public function index()
    {
        $page_attr = [
            'title' => 'Home Page Setting',
            'breadcrumbs' => [
                ['name' => 'Setting'],
            ]
        ];
        $pre = $this->setting_prefix;
        $s = function (string $str) use ($pre): string {
            return "$pre.$str";
        };
        $data = compact(
            'page_attr',
            's'
        );
        return view('admin.setting.home',  array_merge($data, ['compact' => $data]));
    }

    public function hero(Request $request)
    {
        $this->pre = 'hero';
        settings()->set($this->s('visible'), $request->visible != null)->save();
        settings()->set($this->s('title'), $request->title)->save();
        settings()->set($this->s('sub_title'), $request->sub_title)->save();

        // image
        $key = 'image';
        $current = settings()->get($this->s($key));
        $foto = $current;
        if ($image = $request->file($key)) {
            // delete foto
            $folder = $this->folder_image;
            if ($current) {
                $path = public_path("$folder/$current");
                delete_file($path);
            }

            $foto = "$folder/$this->pre." . $image->getClientOriginalExtension();
            $image->move(public_path($folder), $foto);

            // save foto
            settings()->set($this->s($key), $foto)->save();
        }

        return response()->json(['foto' => $foto]);
    }

    public function poesaka(Request $request)
    {
        $this->pre = 'poesaka';
        settings()->set($this->s('visible'), $request->visible != null)->save();
        settings()->set($this->s('title'), $request->title)->save();
        settings()->set($this->s('button_text'), $request->button_text)->save();
        settings()->set($this->s('button_link'), $request->button_link)->save();
        return response()->json();
    }

    public function visi_misi(Request $request)
    {
        $this->pre = 'visi_misi';
        settings()->set($this->s('visible'), $request->visible != null)->save();
        settings()->set($this->s('title'), $request->title)->save();
        settings()->set($this->s('sub_title'), $request->sub_title)->save();
        settings()->set($this->s('visi'), $request->visi)->save();
        settings()->set($this->s('misi'), $request->misi)->save();
        settings()->set($this->s('semboyan'), $request->semboyan)->save();
        settings()->set($this->s('button_text'), $request->button_text)->save();
        return response()->json();
    }

    public function struktur_anggota(Request $request)
    {
        $this->pre = 'struktur_anggota';
        settings()->set($this->s('visible'), $request->visible != null)->save();
        settings()->set($this->s('title'), $request->title)->save();
        settings()->set($this->s('sub_title'), $request->sub_title)->save();
        settings()->set($this->s('button_text'), $request->button_text)->save();
        return response()->json();
    }

    public function kata_alumni(Request $request)
    {
        $this->pre = 'kata_alumni';
        settings()->set($this->s('visible'), $request->visible != null)->save();
        settings()->set($this->s('title'), $request->title)->save();
        settings()->set($this->s('sub_title'), $request->sub_title)->save();
        settings()->set($this->s('limit'), $request->limit)->save();
        return response()->json();
    }

    public function galeri_kegiatan(Request $request)
    {
        $this->pre = 'galeri_kegiatan';
        settings()->set($this->s('visible'), $request->visible != null)->save();
        settings()->set($this->s('title'), $request->title)->save();
        settings()->set($this->s('sub_title'), $request->sub_title)->save();
        settings()->set($this->s('button_text'), $request->button_text)->save();
        settings()->set($this->s('limit'), $request->limit)->save();
        return response()->json();
    }

    public function artikel(Request $request)
    {
        $this->pre = 'artikel';
        settings()->set($this->s('visible'), $request->visible != null)->save();
        settings()->set($this->s('title'), $request->title)->save();
        settings()->set($this->s('sub_title'), $request->sub_title)->save();
        settings()->set($this->s('button_text'), $request->button_text)->save();
        return response()->json();
    }

    public function sensus(Request $request)
    {
        $this->pre = 'sensus';
        settings()->set($this->s('visible'), $request->visible != null)->save();
        settings()->set($this->s('title'), $request->title)->save();
        settings()->set($this->s('sub_title'), $request->sub_title)->save();
        settings()->set($this->s('button_text'), $request->button_text)->save();

        // image
        $key = 'image';
        $current = settings()->get($this->s($key));
        if ($image = $request->file($key)) {
            // delete foto
            $folder = $this->folder_image;
            if ($current) {
                $path = public_path("$folder/$current");
                delete_file($path);
            }

            $foto = "$folder/$this->pre." . $image->getClientOriginalExtension();
            $image->move(public_path($folder), $foto);

            // save foto
            settings()->set($this->s($key), $foto)->save();
        }

        return response()->json();
    }

    // dsave prefix
    private function s(string $str): string
    {
        return "$this->setting_prefix.$this->pre.$str";
    }
}
