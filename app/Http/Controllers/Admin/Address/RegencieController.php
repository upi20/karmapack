<?php

namespace App\Http\Controllers\Admin\Address;

use App\Http\Controllers\Controller;
use App\Models\Address\Province;
use Illuminate\Http\Request;
use App\Models\Address\Regencie;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use League\Config\Exception\ValidationException;

class RegencieController extends Controller
{
    private $query = [];
    public function index(Request $request)
    {
        if (request()->ajax()) {
            // extend query
            $this->query['district'] = <<<SQL
                (select count(*) from address_districts where address_districts.regency_id = address_regencies.id)
            SQL;
            $this->query['district_alias'] = 'district';

            $this->query['village'] = <<<SQL
                (select count(*) from address_villages
                    join address_districts
                    on address_villages.district_id = address_districts.id
                    where address_districts.regency_id = address_regencies.id)
            SQL;
            $this->query['village_alias'] = 'village';

            // model
            $model = Regencie::select([
                'address_regencies.id', 'address_regencies.name',
                'address_provinces.name as province',
                'address_provinces.id as province_id',
                DB::raw("{$this->query['district']} as {$this->query['district_alias']}"),
                DB::raw("{$this->query['village']} as {$this->query['village_alias']}"),
            ])->leftJoin('address_provinces', 'address_provinces.id', '=', 'address_regencies.province_id');

            // filter
            // filter
            if (isset($request->filter)) {
                $filter = $request->filter;
                if ($filter['province'] != '') {
                    $model->where('address_regencies.province_id', '=', $filter['province']);
                }
            }

            return Datatables::of($model)
                ->addIndexColumn()
                ->filterColumn($this->query['district_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['district']} like '%$keyword%'");
                })
                ->filterColumn($this->query['village_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['village']} like '%$keyword%'");
                })
                ->filterColumn('province', function ($query, $keyword) {
                    $query->whereRaw("address_provinces.name like '%$keyword%'");
                })
                ->make(true);
        }

        $page_attr = [
            'title' => 'Manage Address Regencies',
            'breadcrumbs' => [
                ['name' => 'Address'],
            ]
        ];
        $provinces = Province::all();
        return view('admin.address.regencie', compact('page_attr', 'provinces'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'id' => ['required', 'int', 'max:9999', 'unique:address_regencies'],
                'province_id' => ['required', 'int', 'max:99'],
            ]);

            Regencie::create([
                'name' => $request->name,
                'id' => $request->id,
                'province_id' => $request->province_id,
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
            $address = Regencie::find($request->id);
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'province_id' => ['required', 'int', 'max:99'],
            ]);

            $address->name = $request->name;
            $address->province_id = $request->province_id;
            $address->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Request $address)
    {
        try {
            $address = Regencie::find($address->id);
            $address->delete();
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
            $model = Regencie::select(['id', DB::raw('name as text')])
                ->whereRaw("(`name` like '%$request->search%' or `id` like '%$request->search%')")
                ->limit(10);
            if ($request->province_id) {
                $model->where('province_id', '=', $request->province_id);
            }

            $result = $model->get()->toArray();
            if ($request->with_empty) {
                $result = array_merge([['id' => '', 'text' => 'All Regencie']], $result);
            }

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
