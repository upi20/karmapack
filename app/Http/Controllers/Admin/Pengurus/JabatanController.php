<?php

namespace App\Http\Controllers\Admin\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\Periode;
use Illuminate\Support\Facades\DB;

class JabatanController extends Controller
{
    private $query = [];
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
            $get_parrent_no_urut = "(select z.no_urut from pengurus_periode_jabatan as z where a.parrent_id = z.id)";


            $this->query['parrent'] = <<<SQL
                ( if(isnull(a.parrent_id),'', (select z.nama from pengurus_periode_jabatan as z where a.parrent_id = z.id)) )
            SQL;
            $this->query['parrent_alias'] = 'parrent';

            $this->query['kode'] = <<<SQL
                concat( if(isnull(a.parrent_id),'',
                        concat($get_parrent_no_urut, '.')
                    ), a.no_urut
                )
            SQL;
            $this->query['kode_alias'] = 'kode';

            $this->query['parrent_no_urut'] = <<<SQL
                (if(isnull(a.parrent_id), a.no_urut,
                    $get_parrent_no_urut)
                )
            SQL;
            $this->query['parrent_no_urut_alias'] = 'parrent_no_urut';

            $this->query['child_no_urut'] = <<<SQL
                (if(isnull(a.parrent_id), 0, a.no_urut))
            SQL;
            $this->query['child_no_urut_alias'] = 'child_no_urut';

            $model = DB::table('pengurus_periode_jabatan as a')->select([
                'a.id', 'a.nama', 'a.slug', 'a.status',
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
                // ->filterColumn($this->query['parrent_no_urut_alias'], function ($query, $keyword) {
                //     $query->whereRaw("{$this->query['parrent_no_urut']} like '%$keyword%'");
                // })
                // ->filterColumn($this->query['child_no_urut_alias'], function ($query, $keyword) {
                //     $query->whereRaw("{$this->query['child_no_urut']} like '%$keyword%'");
                // })
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
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:artikel_kategori'],
                'status' => ['required', 'int'],
            ]);

            Jabatan::create([
                'nama' => $request->nama,
                'slug' => $request->slug,
                'status' => $request->status,
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
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:artikel_kategori,slug,' . $request->id],
                'status' => ['required', 'int'],
            ]);

            $model->nama = $request->nama;
            $model->slug = $request->slug;
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

    public function delete(Jabatan $model)
    {
        try {
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
