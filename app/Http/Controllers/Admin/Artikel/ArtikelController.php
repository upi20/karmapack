<?php

namespace App\Http\Controllers\Admin\Artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel\Artikel;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $user = Artikel::select(['id', 'nama', 'slug', 'excerpt', 'status', 'created_at'])
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
            'title' => 'Manage List Artikel',
            'breadcrumbs' => [
                ['name' => 'Artikel'],
            ]
        ];
        return view('admin.artikel.data.list', compact('page_attr'));
    }

    public function add(Request $request)
    {
        $navigation = 'admin.artikel.data';
        $page_attr = [
            'title' => 'Tambah Artikel',
            'breadcrumbs' => [
                ['name' => 'Artikel'],
                ['name' => 'Manage List Artikel', 'url' => $navigation],
            ],
            'navigation' => $navigation
        ];

        return view('admin.artikel.data.add', compact('page_attr'));
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
            Artikel::create([
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
}
