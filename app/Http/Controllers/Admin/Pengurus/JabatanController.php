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
    private $image_folder = 'periode/jabatan';
    public function index(Request $request)
    {
        // Rencana =============================================================================
        // modal detail
        // modal image /icon
        // lihat
        // tombol atifkan di status
        // tombol lihat yang di arahkan ke frontend
        // upload foto
        // Rencana =============================================================================
        $periode = Periode::find($request->periode_id);
        if (request()->ajax()) {
            // extend_query
            $get_parrent_no_urut = "(select z.no_urut from pengurus_periode_jabatan as z where pengurus_periode_jabatan.parrent_id = z.id)";


            $this->query['parrent'] = <<<SQL
                ( if(isnull(pengurus_periode_jabatan.parrent_id),'', (select z.nama from pengurus_periode_jabatan as z where pengurus_periode_jabatan.parrent_id = z.id)) )
            SQL;
            $this->query['parrent_alias'] = 'parrent';

            $this->query['kode'] = <<<SQL
                concat( if(isnull(pengurus_periode_jabatan.parrent_id),'',
                        concat($get_parrent_no_urut, '.')
                    ), pengurus_periode_jabatan.no_urut
                )
            SQL;
            $this->query['kode_alias'] = 'kode';

            $this->query['parrent_no_urut'] = <<<SQL
                (if(isnull(pengurus_periode_jabatan.parrent_id), pengurus_periode_jabatan.no_urut,
                    $get_parrent_no_urut)
                )
            SQL;
            $this->query['parrent_no_urut_alias'] = 'parrent_no_urut';

            $this->query['child_no_urut'] = <<<SQL
                (if(isnull(pengurus_periode_jabatan.parrent_id), 0, pengurus_periode_jabatan.no_urut))
            SQL;
            $this->query['child_no_urut_alias'] = 'child_no_urut';

            $model = Jabatan::select([
                'pengurus_periode_jabatan.id',
                'pengurus_periode_jabatan.parrent_id',
                'pengurus_periode_jabatan.nama',
                'pengurus_periode_jabatan.slug',
                'pengurus_periode_jabatan.status',
                'pengurus_periode_jabatan.no_urut',
                'pengurus_periode_jabatan.visi',
                'pengurus_periode_jabatan.misi',
                'pengurus_periode_jabatan.slogan',
                DB::raw("{$this->query['parrent']} as {$this->query['parrent_alias']}"),
                DB::raw("{$this->query['kode']} as {$this->query['kode_alias']}"),
                DB::raw("{$this->query['parrent_no_urut']} as {$this->query['parrent_no_urut_alias']}"),
                DB::raw("{$this->query['child_no_urut']} as {$this->query['child_no_urut_alias']}"),
            ])
                ->selectRaw("IF(status = 1, 'Dipakai', 'Tidak Dipakai') as status_str")
                ->where('periode_id', '=', $periode->id)
                ->orderBy('parrent_no_urut')
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
                ->filterColumn($this->query['parrent_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['parrent']} like '%$keyword%'");
                })
                ->filterColumn($this->query['kode_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['kode']} like '%$keyword%'");
                })
                ->filterColumn($this->query['parrent_no_urut_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['parrent_no_urut']} like '%$keyword%'");
                })
                ->filterColumn($this->query['child_no_urut_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['child_no_urut']} like '%$keyword%'");
                })
                ->make(true);
        }
        $page_attr = [
            'title' => "Manage List Bidang",
            'breadcrumbs' => [
                ['name' => 'Bidang'],
            ]
        ];
        return view('admin.pengurus.jabatan.list', compact('page_attr', 'periode'));
    }

    public function insert(Request $request)
    {
        try {
            $request->validate([
                'parrent_id' => ['nullable'],
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:pengurus_periode_jabatan'],
                'status' => ['required', 'int'],
                'no_urut' => ['required', 'int'],
                'visi' => ['required', 'string'],
                'misi' => ['required', 'string'],
                'slogan' => ['required', 'string'],
                'periode_id' => ['required', 'int'],
            ]);
            $visi = Summernote::insert($request->visi, $this->image_folder, 'visi' . substr($request->slug, 0, 20));
            $misi = Summernote::insert($request->misi, $this->image_folder, 'misi' . substr($request->slug, 0, 20));
            Jabatan::create([
                'parrent_id' => $request->parrent_id,
                'nama' => $request->nama,
                'slug' => $request->slug,
                'status' => $request->status,
                'no_urut' => $request->no_urut,
                'visi' => $visi->html,
                'misi' => $misi->html,
                'slogan' => $request->slogan,
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
                'parrent_id' => ['int'],
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:pengurus_periode_jabatan,slug,' . $request->id],
                'status' => ['required', 'int'],
                'no_urut' => ['required', 'int'],
                'visi' => ['required', 'string'],
                'misi' => ['required', 'string'],
                'slogan' => ['required', 'string'],
            ]);
            $visi = Summernote::update($request->visi, $this->image_folder, '', 'visi' . substr($request->slug, 0, 20));
            $misi = Summernote::update($request->misi, $this->image_folder, '', 'misi' . substr($request->slug, 0, 20));

            $model->parrent_id = $request->parrent_id;
            $model->nama = $request->nama;
            $model->slug = $request->slug;
            $model->status = $request->status;
            $model->no_urut = $request->no_urut;
            $model->visi = $visi->html;
            $model->misi = $misi->html;
            $model->slogan = $request->slogan;
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

    public function parrent(Request $request)
    {
        if (!$request->periode_id) return abort(404);
        try {
            $model = Jabatan::select(['id', DB::raw('nama as text')])
                ->where('periode_id', '=', $request->periode_id)
                ->where('parrent_id', '=', null);
            $result = $model->get()->toArray();
            $result = array_merge([['id' => '', 'text' => 'Pilih Bidang']], $result);

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
