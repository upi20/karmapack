<?php

namespace App\Http\Controllers\Admin\Kepengurusan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use App\Helpers\Summernote;
use App\Models\Kepengurusan\Anggota;
use App\Models\Kepengurusan\Jabatan;
use App\Models\Kepengurusan\Periode;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class PeriodeController extends Controller
{
    private $image_folder = Periode::image_folder;
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Periode::datatable($request);
        }

        $page_attr = adminBreadcumb(h_prefix());

        $roles = Role::all();
        $image_folder = $this->image_folder;

        $view = path_view('pages.admin.kepengurusan.periode.list');
        $data = compact('page_attr', 'image_folder', 'roles', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function add(Request $request)
    {
        $page_attr = adminBreadcumb(h_prefix(null, 1), isChild: true);
        $page_attr = [
            'title' => "Tambah",
            'breadcrumbs' => $page_attr['breadcrumbs'],
            'navigation' => h_prefix(null, 1),
        ];

        $view = path_view('pages.admin.kepengurusan.periode.add');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function edit(Periode $model)
    {
        $page_attr = adminBreadcumb(h_prefix(null, 2), isChild: true);
        $page_attr = [
            'title' => "Ubah",
            'breadcrumbs' => $page_attr['breadcrumbs'],
            'navigation' => h_prefix(null, 2),
        ];
        $edit = true;
        $image_folder = $this->image_folder;

        $view = path_view('pages.admin.kepengurusan.periode.add');
        $data = compact('page_attr', 'edit', 'model', 'image_folder', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request)
    {
        $t_periode = Periode::tableName;
        try {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', "unique:$t_periode"],
                'dari' => ['required', 'int'],
                'sampai' => ['required', 'int'],
                'slogan' => ['required', 'string'],
                'visi' => ['nullable', 'string'],
                'misi' => ['nullable', 'string'],
                'filosofi_logo' => ['nullable', 'string'],
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // foto handle
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = 'icon' . substr($request->slug, 0, 10) . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);
            }

            $visi = Summernote::insert($request->visi, $this->image_folder, 'visi');
            $misi = Summernote::insert($request->misi, $this->image_folder, 'misi');
            $filosofi_logo = Summernote::insert($request->filosofi_logo, $this->image_folder, 'filosofi_logo');

            $status = (Periode::where('status', '=', 1)->count() <= 0) ? 1 : 0;
            $periode  = new Periode();
            $periode->nama = $request->nama;
            $periode->slug = $request->slug;
            $periode->dari = $request->dari;
            $periode->sampai = $request->sampai;
            $periode->slogan = $request->slogan;
            $periode->status = $status;
            $periode->visi = $visi->html;
            $periode->misi = $misi->html;
            $periode->filosofi_logo = $filosofi_logo->html;
            $periode->foto = $foto;
            $periode->save();

            Periode::clearCache();
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
            $t_periode = Periode::tableName;
            $request->validate([
                'id' => ['required', 'int'],
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', "unique:$t_periode,slug," . $request->id],
                'dari' => ['required', 'int'],
                'sampai' => ['required', 'int'],
                'slogan' => ['required', 'string'],
                'visi' => ['nullable', 'string'],
                'misi' => ['nullable', 'string'],
                'filosofi_logo' => ['nullable', 'string'],
            ]);
            $model = Periode::find($request->id);
            $visi = Summernote::update($request->visi, $this->image_folder, '', 'visi');
            $misi = Summernote::update($request->misi, $this->image_folder, '', 'misi');
            $filosofi_logo = Summernote::update($request->filosofi_logo, $this->image_folder, '', 'filosofi_logo');

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
            $model->visi = $visi->html;
            $model->misi = $misi->html;
            $model->filosofi_logo = $filosofi_logo->html;
            $model->save();

            Periode::clearCache();
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
            Summernote::delete($model->filosofi_logo);

            // delete foto
            if ($model->foto) {
                $path = public_path("$this->image_folder/$model->foto");
                Summernote::deleteFile($path);
            }

            // delete data
            $model->delete();

            Periode::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function detail(Periode $periode)
    {
        $periode->foto = $periode->fotoUrl();
        $result = [
            'detail' => $periode,
            'pengurus' => $periode->detailPengurus(),
        ];
        return response()->json($result);
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

            Periode::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function set_pengurus_role(Request $request)
    {
        DB::beginTransaction();
        $periode = $request->periode_id;
        $t_jabatan = Jabatan::tableName;
        $t_anggota = Anggota::tableName;
        $lists = Anggota::join($t_jabatan, "$t_jabatan.id", "=", "$t_anggota.jabatan_id")
            ->where("$t_jabatan.periode_id", $periode)
            ->get();

        foreach ($lists as $v) {
            $user = $v->anggota->user;
            if ($user->hasRole(config('app.super_admin_role'))) continue;
            $get = Role::find($v->role_id);
            $role_by_jabatan = is_null($get) ? null : Role::find($v->role_id)->name;
            $role = $request->role_name ?? $role_by_jabatan;
            if ($role) {
                $user->syncRoles([$role]);
            }
        }

        DB::commit();

        Periode::clearCache();
        return response()->json();
    }
}
