<?php

namespace App\Http\Controllers\Admin\Artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel\Artikel;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Helpers\Summernote;

class ArtikelController extends Controller
{
    private $image_folder = 'artikel';
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $model = Artikel::select(['id', 'nama', 'slug', 'excerpt', 'status', 'created_at'])
                ->selectRaw('IF(status = 1, "Dipublish", "Disimpan") as status_str');

            // filter
            if (isset($request->filter)) {
                $filter = $request->filter;
                if ($filter['status'] != '') {
                    $model->where('status', '=', $filter['status']);
                }
            }

            return Datatables::of($model)
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

    public function edit(Artikel $artikel)
    {
        $navigation = 'admin.artikel.data';
        $page_attr = [
            'title' => 'Edit Artikel',
            'breadcrumbs' => [
                ['name' => 'Artikel'],
                ['name' => 'Manage List Artikel', 'url' => $navigation],
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
            $detail = Summernote::insert($request->detail, $this->image_folder, substr($request->slug, 0, 10));

            Artikel::create([
                'nama' => $request->nama,
                'slug' => $request->slug,
                'excerpt' => $request->excerpt,
                'status' => $request->status,
                'detail' => $detail->html,
                'foto' => $detail->first_img,
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

            $model = Artikel::find($request->id);
            $detail = Summernote::update($request->detail, $this->image_folder, $model->foto, substr($request->slug, 0, 10));

            $model->detail = $detail->html;
            $model->foto = $detail->first_img;
            $model->nama = $request->nama;
            $model->excerpt = $request->excerpt;
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

    public function delete(Artikel $artikel)
    {
        try {
            Summernote::delete($artikel->detail);
            $artikel->delete();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
}
