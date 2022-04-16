<?php

namespace App\Http\Controllers\Admin\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengurus\Periode;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Helpers\Summernote;
use Illuminate\Support\Facades\DB;

class PeriodeController extends Controller
{
    private $image_folder = 'pengurus/periode';
    public function index(Request $request) // page
    {
        // Rencana =============================================================================
        // jumlah bidang yang mempunyai child
        // jumlah pengurus / Member
        // modal detail
        // modal image /icon
        // lihat
        // tombol atifkan di status
        // tombol lihat yang di arahkan ke frontend
        // Rencana =============================================================================

        if (request()->ajax()) {
            $model = Periode::select(['id', 'nama', 'foto', 'dari', 'sampai', 'slug', 'status'])
                ->selectRaw('IF(status = 1, "Aktif", "Tidak Aktif") as status_str');

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
            'title' => 'Manage List Periode',
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'url' => 'admin.dashboard'],
                ['name' => 'Kepengurusan'],
            ]
        ];
        return view('admin.pengurus.periode.list', compact('page_attr'));
    }

    public function add(Request $request) // page
    {
        $navigation = 'admin.pengurus.periode';
        $page_attr = [
            'title' => 'Tambah Periode',
            'breadcrumbs' => [
                ['name' => 'Periode'],
                ['name' => 'Manage List Periode', 'url' => $navigation],
            ],
            'navigation' => $navigation
        ];

        return view('admin.pengurus.periode.add', compact('page_attr'));
    }

    public function edit(Periode $model) // page
    {
        $navigation = 'admin.pengurus.periode';
        $page_attr = [
            'title' => 'Edit Periode',
            'breadcrumbs' => [
                ['name' => 'Periode'],
                ['name' => 'Manage List Periode', 'url' => $navigation],
            ],
            'navigation' => $navigation
        ];
        $edit = true;
        $foto_folder = $this->image_folder;
        return view('admin.pengurus.periode.add', compact('page_attr', 'edit', 'model', 'foto_folder'));
    }

    public function insert(Request $request)
    {
        // Rencana =============================================================================
        // insert foto belum wkwk
        // Rencana =============================================================================
        try {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:pengurus_periode'],
                'dari' => ['required', 'int'],
                'sampai' => ['required', 'int'],
                'slogan' => ['required', 'string'],
                'visi' => ['required', 'string'],
                'misi' => ['required', 'string'],
                // 'status' => ['required', 'int'],
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // foto handle
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = 'icon' . substr($request->slug, 0, 10) . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($this->image_folder, $foto);
            }
            $visi = Summernote::insert($request->visi, $this->image_folder, 'visi');
            $misi = Summernote::insert($request->misi, $this->image_folder, 'misi');
            $status = $this->getCountActive() <= 0 ? 1 : 0;
            Periode::create([
                'nama' => $request->nama,
                'slug' => $request->slug,
                'dari' => $request->dari,
                'sampai' => $request->sampai,
                'slogan' => $request->slogan,
                'status' => $status,
                'visi' => $visi->html,
                'misi' => $misi->html,
                'foto' => $foto,
                // 'created_by' => auth()->user()->id,
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
        // Rencana =============================================================================
        // delete foto yang tidak dipakai
        // Foto icon belum wkwk
        // Rencana =============================================================================

        try {
            $request->validate([
                'id' => ['required', 'int'],
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:pengurus_periode,slug,' . $request->id],
                'dari' => ['required', 'int'],
                'sampai' => ['required', 'int'],
                'slogan' => ['required', 'string'],
                'visi' => ['required', 'string'],
                'misi' => ['required', 'string'],
            ]);
            $model = Periode::find($request->id);
            $visi = Summernote::update($request->visi, $this->image_folder, '', 'visi');
            $misi = Summernote::update($request->misi, $this->image_folder, '', 'misi');

            // foto handle
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = 'icon' . substr($request->slug, 0, 10) . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($this->image_folder, $foto);

                // delete foto
                if ($model->foto) {
                    $path = public_path("$this->image_folder/$model->foto");
                    Summernote::deleteFile($path);
                }

                // save foto
                $model->foto = $foto;
            }

            // save
            $model->nama = $request->nama;
            $model->slug = $request->slug;
            $model->dari = $request->dari;
            $model->sampai = $request->sampai;
            $model->slogan = $request->slogan;
            // $model->status = $request->status;
            $model->visi = $visi->html;
            $model->misi = $misi->html;
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

    public function delete(Periode $model)
    {
        try {
            // cek folder
            Summernote::delete($model->visi);
            Summernote::delete($model->misi);
            $model->delete();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function setActive(Periode $model)
    {
        try {
            DB::beginTransaction();
            // set active
            $model->status = 1;
            $model->save();

            // set other nonactive
            Periode::where('id', '<>', $model->id)->update(['status' => '0']);
            DB::commit();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    private function getCountActive()
    {
        return Periode::where('status', '=', 1)->count();
    }
}
