<?php

namespace App\Http\Controllers\Admin\Address;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address\Province;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use League\Config\Exception\ValidationException;
use App\Models\Address\District;

class DistrictController extends Controller
{
    private $query = [];
    public function index(Request $request)
    {
        if (request()->ajax()) {
            // extend query
            $this->query['village'] = <<<SQL
                (select count(*) from address_villages
                    where address_villages.district_id = address_districts.id)
            SQL;
            $this->query['village_alias'] = 'village';

            // model
            $model = District::select([
                'address_districts.id',
                'address_districts.name',
                // regencie
                'address_regencies.name as regencie',
                'address_regencies.id as regency_id',
                // province
                'address_provinces.name as province',
                'address_provinces.id as province_id',
                DB::raw("{$this->query['village']} as {$this->query['village_alias']}"),
            ])
                ->leftJoin('address_regencies', 'address_regencies.id', '=', 'address_districts.regency_id')
                ->leftJoin('address_provinces', 'address_provinces.id', '=', 'address_regencies.province_id');

            // filter
            if (isset($request->filter)) {
                $filter = $request->filter;
                if ($filter['province'] && !$filter['regencie']) {
                    $model->where('address_regencies.province_id', '=', $filter['province']);
                }

                if ($filter['regencie']) {
                    $model->where('address_districts.regency_id', '=', $filter['regencie']);
                }
            }

            return Datatables::of($model)
                ->addIndexColumn()
                ->filterColumn($this->query['village_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['village']} like '%$keyword%'");
                })
                ->filterColumn('regencie', function ($query, $keyword) {
                    $query->whereRaw("address_regencies.name like '%$keyword%'");
                })
                ->filterColumn('province', function ($query, $keyword) {
                    $query->whereRaw("address_provinces.name like '%$keyword%'");
                })
                ->make(true);
        }

        $page_attr = [
            'title' => 'Manage Address Districts',
            'breadcrumbs' => [
                ['name' => 'Address'],
            ]
        ];
        $provinces = Province::all();
        return view('admin.address.district', compact('page_attr', 'provinces'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'id' => ['required', 'int', 'max:9999999', 'unique:address_districts'],
                'regency_id' => ['required', 'int', 'max:9999'],
            ]);

            District::create([
                'name' => $request->name,
                'id' => $request->id,
                'regency_id' => $request->regency_id,
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
            $address = District::find($request->id);
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'regency_id' => ['required', 'int', 'max:9999'],
            ]);

            $address->name = $request->name;
            $address->regency_id = $request->regency_id;
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
            $address = District::find($address->id);
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
            $model = District::select(['id', DB::raw('name as text')])
                ->whereRaw("(`name` like '%$request->search%' or `id` like '%$request->search%')")
                ->limit(10);
            if ($request->regency_id) {
                $model->where('regency_id', '=', $request->regency_id);
            }

            $result = $model->get()->toArray();
            if ($request->with_empty) {
                $result = array_merge([['id' => '', 'text' => 'All District']], $result);
            }

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
