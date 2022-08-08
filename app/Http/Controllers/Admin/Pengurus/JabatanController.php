<?php

namespace App\Http\Controllers\Admin\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\Periode;
use App\Helpers\Summernote;
use Error;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class JabatanController extends Controller
{
    private $query = [];
    private $image_folder = Jabatan::image_folder;
    public function index(Request $request)
    {
        // Rencana =============================================================================
        // modal detail
        // modal image /icon
        // tombol lihat yang di arahkan ke frontend
        // upload foto
        // Rencana =============================================================================
        $periode = Periode::find($request->periode_id);
        if (request()->ajax()) {
            $tableNames = config('permission.table_names');
            $table = Jabatan::tableName;
            $t_role = $tableNames['roles'];
            // extend_query

            // cusotm query
            // ========================================================================================================
            $get_parent_no_urut = "(select z.no_urut from pengurus_periode_jabatan as z where pengurus_periode_jabatan.parent_id = z.id)";
            $c_parent = 'parent';
            $this->query[$c_parent] = <<<SQL
                    ( if(isnull(pengurus_periode_jabatan.parent_id),'', (select z.nama from pengurus_periode_jabatan as z where pengurus_periode_jabatan.parent_id = z.id)) )
            SQL;
            $this->query["{$c_parent}_alias"] = $c_parent;

            $c_kode = 'kode';
            $this->query[$c_kode] = <<<SQL
                concat( if(isnull(pengurus_periode_jabatan.parent_id),'',concat($get_parent_no_urut, '.') ), pengurus_periode_jabatan.no_urut )
            SQL;
            $this->query["{$c_kode}_alias"] = $c_kode;

            $c_parent_no_urut = 'parent_no_urut';
            $this->query['parent_no_urut'] = <<<SQL
                (if(isnull(pengurus_periode_jabatan.parent_id), pengurus_periode_jabatan.no_urut, $get_parent_no_urut))
            SQL;
            $this->query["{$c_parent_no_urut}_alias"] = $c_parent_no_urut;

            $c_child_no_urut = 'child_no_urut';
            $this->query['child_no_urut'] = <<<SQL
                (if(isnull(pengurus_periode_jabatan.parent_id), 0, pengurus_periode_jabatan.no_urut))
            SQL;
            $this->query["{$c_child_no_urut}_alias"] = $c_child_no_urut;
            // ========================================================================================================


            // ========================================================================================================
            // select raw as alias
            $sraa = function (string $col): string {
                return $this->query[$col] . ' as ' . $this->query[$col . '_alias'];
            };

            $model_filter = [
                $c_parent,
                $c_kode,
                $c_parent_no_urut,
                $c_child_no_urut,
            ];
            // ========================================================================================================


            $to_db_raw = array_map(function ($a) use ($sraa) {
                return DB::raw($sraa($a));
            }, $model_filter);

            $model = Jabatan::select(array_merge([
                DB::raw("$table.*"),
                DB::raw("$t_role.name as role"),
            ], $to_db_raw))
                ->selectRaw("IF(status = 1, 'Dipakai', 'Tidak Dipakai') as status_str")
                ->leftJoin($t_role, "$t_role.id", '=', "$table.role_id")
                ->where("$table.periode_id", '=', $periode->id)
                ->orderBy('parent_no_urut')
                ->orderBy('child_no_urut');


            // Filter =====================================================================================================
            // filter check
            $f_c = function (string $param) use ($request): mixed {
                $filter = $request->filter;
                return isset($filter[$param]) ? $filter[$param] : false;
            };

            // filter custom
            $filters = ['status', 'role_id'];
            foreach ($filters as  $f) {
                if ($f_c($f) !== false) {
                    $model->whereRaw("$table.$f='{$f_c($f)}'");
                }
            }

            // ========================================================================================================
            $datatable = Datatables::of($model)->addIndexColumn();
            foreach ($model_filter as $v) {
                // custom pencarian
                $datatable->filterColumn($this->query["{$v}_alias"], function ($query, $keyword) use ($v) {
                    $query->whereRaw("({$this->query[$v]} like '%$keyword%')");
                });
            }

            // create datatable
            return $datatable->make(true);
        }
        $roles = Role::all();
        $navigation = h_prefix('periode', 2);
        $page_attr = [
            'title' => "Bidang Periode " . $periode->nama,
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'url' => 'dashboard'],
                ['name' => 'Kepengurusan'],
                ['name' => 'Periode', 'url' => $navigation],
            ],
            'navigation' => $navigation,
        ];
        $image_folder = $this->image_folder;
        return view('admin.pengurus.jabatan.list', compact('page_attr', 'periode', 'image_folder', 'roles'));
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
                'slug' => ['required', 'string', 'max:255', 'unique:pengurus_periode_jabatan'],
                'status' => ['required', 'int'],
                'no_urut' => ['required', 'int'],
                'visi' => ['nullable', 'string'],
                'misi' => ['nullable', 'string'],
                'slogan' => ['nullable', 'string'],
                'singkatan' => ['nullable', 'string'],
                'periode_id' => ['required', 'int'],
            ]);
            $visi = Summernote::insert($request->visi, $this->image_folder, 'visi' . substr($request->slug, 0, 20));
            $misi = Summernote::insert($request->misi, $this->image_folder, 'misi' . substr($request->slug, 0, 20));
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
                'slug' => ['required', 'string', 'max:255', 'unique:pengurus_periode_jabatan,slug,' . $request->id],
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
            // $model->updated_by = auth()->user()->id;
            $model->save();

            DB::commit();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Jabatan $model)
    {
        try {
            DB::beginTransaction();

            // check
            if (!auth_has_role(config('app.super_admin_role'))) {
                $periode = Periode::where('id', '=', $model->periode_id)->first();
                if ($periode->status == 0) {
                    throw new Error("Anda tidak mempunyai izin untuk mengubah data di periode ini. (Status periode ini tidak aktif Silahkan hubungi administrator)");
                }
            }

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

            DB::commit();
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
            $model = Jabatan::select(['id', DB::raw('name as text')])
                ->whereRaw("(`name` like '%$request->search%' or `id` like '%$request->search%')")
                ->limit(10);

            $result = $model->get()->toArray();
            if ($request->with_empty) {
                $result = array_merge([['id' => '', 'text' => 'All Jabatan']], $result);
            }

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
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

    public function role_select2(Request $request)
    {

        try {
            $result = Role::select([DB::raw('name as id'), DB::raw('name as text')])
                ->where('name', 'like', "%$request->search%")
                ->orWhere('id', 'like', "%$request->search%")
                ->limit(10)->get();
            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
