<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Models\FooterInstagram;
use Illuminate\Support\Facades\DB;
use App\Helpers\Summernote;

class FooterInstagramController extends Controller
{
    private $validate_model = [
        'nama' => ['required', 'string', 'max:255'],
        'url' => ['nullable'],
        'keterangan' => ['nullable'],
        'status' => ['required', 'int'],
        'order' => ['required', 'int'],
    ];
    private $image_folder = FooterInstagram::image_folder;

    public function index(Request $request)
    {
        if (request()->ajax()) {
            // get key from validate
            $select = [];
            foreach ($this->validate_model as $k => $val) $select[] = $k;

            // get data from model
            $model = FooterInstagram::select(array_merge(['id', 'foto'], $select))
                ->selectRaw("IF(status = 1, 'Dipakai', 'Tidak Dipakai') as status_str");

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
            'title' => 'Manage List FooterInstagram',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ]
        ];
        $image_folder = $this->image_folder;
        return view('admin.footer_instagram', compact('page_attr', 'image_folder'));
    }

    public function insert(Request $request)
    {
        try {
            $request->validate(array_merge([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ], $this->validate_model));

            $model = new FooterInstagram();
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($this->image_folder, $foto);
            }
            $model->url = $request->url;
            $model->foto = $foto;
            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->status = $request->status;
            $model->order = $request->order;
            // $model->created_by = auth()->user()->id;
            $model->save();
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
            $model = FooterInstagram::find($request->id);
            $request->validate(array_merge(['id' => ['required', 'int']], $this->validate_model));

            // foto handle
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($this->image_folder, $foto);

                // delete foto
                if ($model->foto) {
                    $path = public_path("$this->image_folder/$model->foto");
                    Summernote::deleteFile($path);
                }

                // save foto
                $model->foto = $foto;
            }

            $model->url = $request->url;
            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->status = $request->status;
            $model->order = $request->order;
            // $model->updated_by = auth()->user()->id;
            $model->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(FooterInstagram $model)
    {
        try {
            $model->delete();
            // delete foto
            if ($model->foto) {
                $path = public_path("$this->image_folder/$model->foto");
                Summernote::deleteFile($path);
            }
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function select2(Request $request)
    {
        try {
            $model = FooterInstagram::select(['id', DB::raw('nama as text')])
                ->whereRaw("(`nama` like '%$request->search%' or `id` like '%$request->search%')")
                ->limit(10);

            $result = $model->get()->toArray();
            if ($request->with_empty && $request->search) {
                $result = array_merge([['id' => $request->search, 'text' => $request->search . ' (Buat Footer Instagram Baru)']], $result);
            }

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
