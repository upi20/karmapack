<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Models\Profile\KontakTipe;
use Illuminate\Support\Facades\DB;

class KontakTipeController extends Controller
{
    private $query = [];
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $a = KontakTipe::tableName;
            // extend query
            $this->query['kontak'] = <<<SQL
                        (select count(*) from pengurus_profile_kontak
                            where pengurus_profile_kontak.kontak_tipe_id = $a.id)
                    SQL;
            $this->query['kontak_alias'] = 'kontak';
            $model = KontakTipe::select(['id', 'nama', 'keterangan', 'status', 'icon'])
                ->selectRaw("IF(status = 1, 'Dipakai', 'Tidak Dipakai') as status_str")
                ->selectRaw("{$this->query['kontak']} as {$this->query['kontak_alias']}");

            // filter
            if (isset($request->filter)) {
                $filter = $request->filter;
                if ($filter['status'] != '') {
                    $model->where('status', '=', $filter['status']);
                }
            }

            return Datatables::of($model)
                ->addIndexColumn()
                ->filterColumn($this->query['kontak_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['kontak']} like '%$keyword%'");
                })
                ->make(true);
        }
        $page_attr = [
            'title' => 'Manage List Tipe Kontak',
            'breadcrumbs' => [
                ['name' => 'Profile Addon'],
            ]
        ];
        return view('admin.profile.addon.kontak_tipe', compact('page_attr'));
    }

    public function insert(Request $request)
    {
        try {
            $request->validate([
                'icon' => ['required', 'string', 'max:255'],
                'nama' => ['required', 'string', 'max:255'],
                'keterangan' => ['required', 'string', 'max:255'],
                'status' => ['required', 'int'],
            ]);

            KontakTipe::create([
                'icon' => $request->icon,
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'status' => $request->status,
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
            $model = KontakTipe::find($request->id);
            $request->validate([
                'icon' => ['required', 'string', 'max:255'],
                'nama' => ['required', 'string', 'max:255'],
                'keterangan' => ['required', 'string', 'max:255'],
                'status' => ['required', 'int'],
            ]);

            $model->icon = $request->icon;
            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->status = $request->status;
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

    public function delete(KontakTipe $model)
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
            $model = KontakTipe::select(['id', DB::raw('nama as text')])
                ->whereRaw("(`nama` like '%$request->search%' or `id` like '%$request->search%')")
                ->limit(10);

            $result = $model->get()->toArray();
            if ($request->with_empty && $request->search) {
                $result = array_merge([['id' => $request->search, 'text' => $request->search . ' (Buat Tipe Kontak Baru)']], $result);
            }

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
