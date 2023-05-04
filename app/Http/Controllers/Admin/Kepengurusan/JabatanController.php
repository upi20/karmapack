<?php

namespace App\Http\Controllers\Admin\Kepengurusan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use App\Helpers\Summernote;
use App\Models\Kepengurusan\Jabatan;
use App\Models\Kepengurusan\Periode;
use Error;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class JabatanController extends Controller
{

    private $image_folder = Jabatan::image_folder;
    public function index(Periode $periode, Request $request)
    {

        // Rencana =============================================================================
        // modal detail
        // modal image /icon
        // tombol lihat yang di arahkan ke frontend
        // upload foto
        // Rencana =============================================================================
        if (request()->ajax()) {
            return $periode->jabatanDatatable($request);
        }
        $roles = Role::all();

        $page_attr = adminBreadcumb(h_prefix('periode', 2), isChild: true);
        $page_attr = [
            'title' => "Bidang Periode " . $periode->nama,
            'breadcrumbs' => $page_attr['breadcrumbs'],
            'navigation' => h_prefix('periode', 2),
        ];

        $view = path_view('pages.admin.kepengurusan.jabatan.list');
        $data = compact('page_attr', 'periode', 'roles', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request)
    {
        try {
            // check
            if (!auth_has_role(config('app.super_admin_role'))) {
                $periode = Periode::where('id', '=', $request->periode_id)->first();
                if ($periode->status == 0) {
                    throw new Error("Anda tidak mempunyai izin untuk mengubah data di periode ini. (Status periode ini tidak aktif Silahkan hubungi administrator)");
                }
            }

            DB::beginTransaction();
            $request->validate([
                'parent_id' => ['nullable'],
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:' . Jabatan::tableName],
                'status' => ['required', 'int'],
                'no_urut' => ['required', 'int'],
                'visi' => ['nullable', 'string'],
                'misi' => ['nullable', 'string'],
                'slogan' => ['nullable', 'string'],
                'singkatan' => ['nullable', 'string'],
                'periode_id' => ['required', 'int'],
            ]);
            $visi = Summernote::insert($request->visi ?? '<p></p>', $this->image_folder, 'visi' . substr($request->slug, 0, 20));
            $misi = Summernote::insert($request->misi ?? '<p></p>', $this->image_folder, 'misi' . substr($request->slug, 0, 20));
            // foto handle
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = 'icon' . substr($request->slug, 10, 40) . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);
            }
            $model = new Jabatan();
            $model->parent_id = $request->parent_id;
            $model->nama = $request->nama;
            $model->slug = $request->slug;
            $model->status = $request->status;
            $model->no_urut = $request->no_urut;
            $model->visi = (trim($visi->html) == '<p><br></p>') ? null : $visi->html;
            $model->misi = (trim($misi->html) == '<p><br></p>') ? null : $misi->html;
            $model->slogan = $request->slogan;
            $model->singkatan = $request->singkatan ?? null;
            $model->foto = $foto;
            $model->periode_id = $request->periode_id;
            $model->role_id = $request->role_id;
            $model->save();
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

    public function update(Request $request)
    {
        try {
            // check
            if (!auth_has_role(config('app.super_admin_role'))) {
                $periode = Periode::where('id', '=', $request->periode_id)->first();
                if ($periode->status == 0) {
                    throw new Error("Anda tidak mempunyai izin untuk mengubah data di periode ini. (Status periode ini tidak aktif Silahkan hubungi administrator)");
                }
            }

            $model = Jabatan::find($request->id);
            $request->validate([
                'id' => ['required', 'int'],
                'parent_id' => ['nullable'],
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:' . Jabatan::tableName . ',slug,' . $request->id],
                'status' => ['required', 'int'],
                'no_urut' => ['required', 'int'],
                'visi' => ['nullable', 'string'],
                'misi' => ['nullable', 'string'],
                'slogan' => ['nullable', 'string'],
                'singkatan' => ['nullable', 'string'],
            ]);
            $visi = Summernote::update($request->visi, $this->image_folder, '', 'visi' . substr($request->slug, 0, 20));
            $misi = Summernote::update($request->misi, $this->image_folder, '', 'misi' . substr($request->slug, 0, 20));

            // foto handle
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = 'icon' . substr($request->slug, 10, 40) . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);

                // delete foto
                if ($model->foto) {
                    $path = public_path("$this->image_folder/$model->foto");
                    Summernote::deleteFile($path);
                }

                // save foto
                $model->foto = $foto;
            }

            $model->parent_id = $request->parent_id;
            $model->nama = $request->nama;
            $model->slug = $request->slug;
            $model->status = $request->status;
            $model->no_urut = $request->no_urut;
            $model->visi = (trim($visi->html) == '<p><br></p>') ? null : $visi->html;
            $model->misi = (trim($misi->html) == '<p><br></p>') ? null : $misi->html;
            $model->slogan = $request->slogan;
            $model->role_id = $request->role_id;
            $model->singkatan = $request->singkatan ?? null;
            $model->save();
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

    public function delete(Jabatan $jabatan)
    {
        try {
            DB::beginTransaction();

            // check
            if (!auth_has_role(config('app.super_admin_role'))) {
                $periode = Periode::where('id', '=', $jabatan->periode_id)->first();
                if ($periode->status == 0) {
                    throw new Error("Anda tidak mempunyai izin untuk mengubah data di periode ini. (Status periode ini tidak aktif Silahkan hubungi administrator)");
                }
            }

            // cek folder
            Summernote::delete($jabatan->visi);
            Summernote::delete($jabatan->misi);

            // delete foto
            if ($jabatan->foto) {
                $path = public_path("$this->image_folder/$jabatan->foto");
                Summernote::deleteFile($path);
            }

            // delete data
            $jabatan->delete();

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

    public function parent(Request $request)
    {
        if (!$request->periode_id) return abort(404);
        try {
            $model = Jabatan::select(['id', DB::raw('nama as text')])
                ->where('periode_id', '=', $request->periode_id)
                ->where('parent_id', '=', null);
            $result = $model->get()->toArray();
            $result = array_merge([['id' => '', 'text' => 'Pilih Bidang']], $result);

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
