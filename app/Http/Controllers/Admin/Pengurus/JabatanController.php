<?php

namespace App\Http\Controllers\Admin\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\Periode;
use App\Helpers\Summernote;
use Illuminate\Support\Facades\DB;

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
            // extend_query
            $get_parent_no_urut = "(select z.no_urut from pengurus_periode_jabatan as z where pengurus_periode_jabatan.parent_id = z.id)";


            $this->query['parent'] = <<<SQL
                ( if(isnull(pengurus_periode_jabatan.parent_id),'', (select z.nama from pengurus_periode_jabatan as z where pengurus_periode_jabatan.parent_id = z.id)) )
            SQL;
            $this->query['parent_alias'] = 'parent';

            $this->query['kode'] = <<<SQL
                concat( if(isnull(pengurus_periode_jabatan.parent_id),'',
                        concat($get_parent_no_urut, '.')
                    ), pengurus_periode_jabatan.no_urut
                )
            SQL;
            $this->query['kode_alias'] = 'kode';

            $this->query['parent_no_urut'] = <<<SQL
                (if(isnull(pengurus_periode_jabatan.parent_id), pengurus_periode_jabatan.no_urut,
                    $get_parent_no_urut)
                )
            SQL;
            $this->query['parent_no_urut_alias'] = 'parent_no_urut';

            $this->query['child_no_urut'] = <<<SQL
                (if(isnull(pengurus_periode_jabatan.parent_id), 0, pengurus_periode_jabatan.no_urut))
            SQL;
            $this->query['child_no_urut_alias'] = 'child_no_urut';

            $model = Jabatan::select([
                'pengurus_periode_jabatan.id',
                'pengurus_periode_jabatan.parent_id',
                'pengurus_periode_jabatan.nama',
                'pengurus_periode_jabatan.slug',
                'pengurus_periode_jabatan.status',
                'pengurus_periode_jabatan.no_urut',
                'pengurus_periode_jabatan.visi',
                'pengurus_periode_jabatan.misi',
                'pengurus_periode_jabatan.foto',
                'pengurus_periode_jabatan.slogan',
                'pengurus_periode_jabatan.singkatan',
                DB::raw("{$this->query['parent']} as {$this->query['parent_alias']}"),
                DB::raw("{$this->query['kode']} as {$this->query['kode_alias']}"),
                DB::raw("{$this->query['parent_no_urut']} as {$this->query['parent_no_urut_alias']}"),
                DB::raw("{$this->query['child_no_urut']} as {$this->query['child_no_urut_alias']}"),
            ])
                ->selectRaw("IF(status = 1, 'Dipakai', 'Tidak Dipakai') as status_str")
                ->where('periode_id', '=', $periode->id)
                ->orderBy('parent_no_urut')
                ->orderBy('child_no_urut');

            // filter
            if (isset($request->filter)) {
                $filter = $request->filter;
                if ($filter['status'] != '') {
                    $model->where('status', '=', $filter['status']);
                }
            }

            return Datatables::of($model)
                ->addIndexColumn()
                ->filterColumn($this->query['parent_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['parent']} like '%$keyword%'");
                })
                ->filterColumn($this->query['kode_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['kode']} like '%$keyword%'");
                })
                ->filterColumn($this->query['parent_no_urut_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['parent_no_urut']} like '%$keyword%'");
                })
                ->filterColumn($this->query['child_no_urut_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['child_no_urut']} like '%$keyword%'");
                })
                ->make(true);
        }
        $navigation = 'admin.pengurus.periode';
        $page_attr = [
            'title' => "Bidang Periode " . $periode->nama,
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'url' => 'admin.dashboard'],
                ['name' => 'Kepengurusan'],
                ['name' => 'Periode', 'url' => $navigation],
            ],
            'navigation' => $navigation,
        ];
        $image_folder = $this->image_folder;
        return view('admin.pengurus.jabatan.list', compact('page_attr', 'periode', 'image_folder'));
    }

    public function insert(Request $request)
    {
        try {
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
            Jabatan::create([
                'parent_id' => $request->parent_id,
                'nama' => $request->nama,
                'slug' => $request->slug,
                'status' => $request->status,
                'no_urut' => $request->no_urut,
                'visi' => (trim($visi->html) == '<p><br></p>') ? null : $visi->html,
                'misi' => (trim($misi->html) == '<p><br></p>') ? null : $misi->html,
                'slogan' => $request->slogan,
                'singkatan' => $request->singkatan ?? null,
                'foto' => $foto,
                'periode_id' => $request->periode_id,
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
            $model->singkatan = $request->singkatan ?? null;
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

    public function delete(Jabatan $model)
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
}
