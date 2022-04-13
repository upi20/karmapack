<?php

namespace App\Http\Controllers\Admin\Artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Models\Artikel\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $user = Kategori::select(['id', 'nama', 'slug', 'excerpt', 'status', 'created_at'])
                ->selectRaw('IF(status = 1, "Dipublish", "Disimpan") as status_str');

            // filter
            if (isset($request->filter)) {
                $filter = $request->filter;
                if ($filter['status'] != '') {
                    $user->where('status', '=', $filter['status']);
                }
            }

            return Datatables::of($user)
                ->addIndexColumn()
                ->make(true);
        }
        $page_attr = [
            'title' => 'Manage List Kategori',
            'breadcrumbs' => [
                ['name' => 'Kategori'],
            ]
        ];
        return view('admin.artikel.data.list', compact('page_attr'));
    }

    public function add(Request $request)
    {
        $navigation = 'admin.artikel.data';
        $page_attr = [
            'title' => 'Tambah Kategori',
            'breadcrumbs' => [
                ['name' => 'Kategori'],
                ['name' => 'Manage List Kategori', 'url' => $navigation],
            ],
            'navigation' => $navigation
        ];

        return view('admin.artikel.data.add', compact('page_attr'));
    }

    public function edit(Kategori $artikel)
    {
        $navigation = 'admin.artikel.data';
        $page_attr = [
            'title' => 'Edit Kategori',
            'breadcrumbs' => [
                ['name' => 'Kategori'],
                ['name' => 'Manage List Kategori', 'url' => $navigation],
            ],
            'navigation' => $navigation
        ];
        $edit = true;
        return view('admin.artikel.data.add', compact('page_attr', 'edit', 'artikel'));
    }

    public function insert(Request $request)
    {
        try {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:artikel'],
                'detail' => ['required'],
                'excerpt' => ['required'],
                'status' => ['required', 'int'],
            ]);

            $detail = $request->detail;
            $dom = new \DomDocument();
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');

            // nama folder diambil dari 10 karakter slug
            $folder = substr($request->slug, 0, 10) . time();

            $path_image_src = "/assets/artikel/$folder";
            $path_folder = public_path() . $path_image_src;
            if (!file_exists($path_folder)) {
                mkdir($path_folder, 777);
            }

            // foto / icon artikel diambil dari foto pertama dalam artikel
            $image_icon_status = true;
            $image_icon = null;
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);

                $image_name = '/' . time() . $k . '.png';
                $path = $path_folder . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $path_image_src . $image_name);

                // set foto icon
                if ($image_icon_status) {
                    $image_icon_status = false;
                    $image_icon = $path_image_src . $image_name;
                }
            }

            $detail = $dom->saveHTML();
            Kategori::create([
                'nama' => $request->nama,
                'slug' => $request->slug,
                'detail' => $detail,
                'excerpt' => $request->excerpt,
                'status' => $request->status,
                'foto_folder' => $folder,
                'foto' => $image_icon,
                'user_id' => auth()->user()->id
            ]);
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'id' => ['required', 'int'],
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:artikel,slug,' . $request->id],
                'detail' => ['required'],
                'excerpt' => ['required'],
                'status' => ['required', 'int'],
            ]);
            $artikel = Kategori::find($request->id);
            $detail = $request->detail;
            $dom = new \DomDocument();
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');

            // nama folder diambil dari 10 karakter slug
            $folder = $artikel->foto_folder;

            $path_image_src = "/assets/artikel/$folder";
            $path_folder = public_path() . $path_image_src;
            if (!file_exists($path_folder)) {
                mkdir($path_folder, 777);
            }

            // foto / icon artikel diambil dari foto pertama dalam artikel
            $image_icon_status = true;
            $image_icon = $artikel->foto;

            // foto yang dipakai
            $foto_used = [];
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');

                // cek apakah foto dari insert summernote
                if (str_contains($data, 'data:image')) {
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);

                    $image_name = '/' . time() . $k . '.png';
                    $path = $path_folder . $image_name;
                    file_put_contents($path, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $path_image_src . $image_name);
                    $foto_used[] = $path_image_src . $image_name;

                    // set foto icon
                    if ($image_icon_status) {
                        $image_icon_status = false;
                        $image_icon = $path_image_src . $image_name;
                    }
                }

                // simpan untuk icon
                if (!str_contains($data, 'data:image')) {
                    if ($image_icon_status) {
                        $image_icon_status = false;
                        $image_icon = $data;
                    }
                    $foto_used[] = $data;
                }
            }

            $detail = $dom->saveHTML();
            $artikel->foto = $image_icon_status ? null : $image_icon;
            $artikel->nama = $request->nama;
            $artikel->slug = $request->slug;
            $artikel->detail = $detail;
            $artikel->excerpt = $request->excerpt;
            $artikel->status = $request->status;
            $artikel->save();

            // delete foto yang tidak dipakai
            // $files = scandir($path_folder);
            // $not_used = array_diff($files, $foto_used);
            // dd($not_used, $files, $foto_used);
            // foreach ($files as $file) {
            //     // cek isi folder
            //     if ($file != '.' && $file != '..') {
            //         // delete file
            //         // $this->deleteFile("$path_folder/$file");
            //     }
            // }



            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Kategori $artikel)
    {
        try {
            // cek folder
            if ($artikel->foto_folder) {
                // getfolder
                $path_folder = public_path() . "/assets/artikel/$artikel->foto_folder";
                $files = scandir($path_folder);
                foreach ($files as $file) {
                    // cek isi folder
                    if ($file != '.' && $file != '..') {
                        // delete file
                        $this->deleteFile("$path_folder/$file");
                    }
                }
                // delete folder
                rmdir($path_folder);
            }
            $artikel->delete();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    private function deleteFile($file)
    {
        $res_foto = true;
        if ($file != null && $file != '') {
            if (file_exists($file)) {
                $res_foto = unlink($file);
            }
        }
        return $res_foto;
    }
}
