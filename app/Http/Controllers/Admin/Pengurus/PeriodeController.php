<?php

namespace App\Http\Controllers\Admin\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengurus\Periode;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Helpers\Summernote;
use App\Models\Pengurus\PeriodeMember;
use Illuminate\Support\Facades\DB;

class PeriodeController extends Controller
{
    private $image_folder = Periode::image_folder;
    public function index(Request $request) // page
    {
        // Rencana =============================================================================
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

        $image_folder = $this->image_folder;
        return view('admin.pengurus.periode.list', compact('page_attr', 'image_folder'));
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
        $image_folder = $this->image_folder;
        return view('admin.pengurus.periode.add', compact('page_attr', 'edit', 'model', 'image_folder'));
    }

    public function insert(Request $request)
    {
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
                $image->move(public_path($this->image_folder), $foto);

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

            // delete foto
            if ($model->foto) {
                $path = public_path("$this->image_folder/$model->foto");
                Summernote::deleteFile($path);
            }

            // delete data
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

    public function detail(Periode $model)
    {
        return response()->json(['results' => $model]);
    }

    public function member(Request $request)
    {
        if (!$request->periode_id) abort(404);
        $periode_id = $request->periode_id;
        $jabatan = <<<SQL
                ( select concat(nama, (if(ppj.parent_id is null, '', concat(' -> ',(select nama from pengurus_periode_jabatan ppj1 where id = ppj.parent_id))))) from pengurus_periode_jabatan ppj
                join pengurus_periode_jabatan_member ppjm
                    on ppj.id = ppjm.jabatan_id
                where ppj.periode_id = $periode_id and ppjm.user_id = a.user_id
                limit 1 )
        SQL;

        $order_parent = <<<SQL
            ( select if(ppj_2.no_urut is null, 0, (
                    select no_urut from pengurus_periode_jabatan ppj_2_1 where ppj_2_1.id = ppj_2.parent_id
                )) from pengurus_periode_jabatan ppj_2
                join pengurus_periode_jabatan_member ppjm_2
                    on ppj_2.id = ppjm_2.jabatan_id
                where ppj_2.periode_id = $periode_id and ppjm_2.user_id = a.user_id
                limit 1 )
        SQL;

        $order_child = <<<SQL
            (select no_urut from pengurus_periode_jabatan ppj_1
                join pengurus_periode_jabatan_member ppjm_1
                    on ppj_1.id = ppjm_1.jabatan_id
                where ppj_1.periode_id = $periode_id and ppjm_1.user_id = a.user_id
                limit 1  )
        SQL;

        $table = PeriodeMember::tableName;
        $query = DB::table("$table as a")
            ->select([
                'b.id', 'b.name', 'b.angkatan',
                DB::raw("$jabatan as jabatan")
            ])
            ->join("users as b", 'a.user_id', '=', 'b.id')
            ->where('a.periode_id', '=', $periode_id)
            ->orderByRaw($order_parent)
            ->orderByRaw($order_child)
            ->get();

        return response()->json(['results' => $query]);
    }

    private function getCountActive()
    {
        return Periode::where('status', '=', 1)->count();
    }
}
