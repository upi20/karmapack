<?php

namespace App\Http\Controllers\Admin\Address;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address\Province;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use League\Config\Exception\ValidationException;
use App\Models\Address\Village;

class VillageController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            // model
            $model = Village::select([
                // village
                'address_villages.name',
                'address_villages.id',
                // district
                'address_districts.name as district',
                'address_districts.id as district_id',
                // regencie
                'address_regencies.name as regencie',
                'address_regencies.id as regency_id',
                // province
                'address_provinces.name as province',
                'address_provinces.id as province_id',
            ])
                ->leftJoin('address_districts', 'address_districts.id', '=', 'address_villages.district_id')
                ->leftJoin('address_regencies', 'address_regencies.id', '=', 'address_districts.regency_id')
                ->leftJoin('address_provinces', 'address_provinces.id', '=', 'address_regencies.province_id');

            // filter
            if (isset($request->filter)) {
                $filter = $request->filter;
                if ($filter['province'] && !$filter['regencie'] && !$filter['district']) {
                    $model->where('address_regencies.province_id', '=', $filter['province']);
                }

                if ($filter['regencie'] && !$filter['district']) {
                    $model->where('address_districts.regency_id', '=', $filter['regencie']);
                }

                if ($filter['district']) {
                    $model->where('address_villages.district_id', '=', $filter['district']);
                }
            }

            return Datatables::of($model)
                ->addIndexColumn()
                ->filterColumn('district', function ($query, $keyword) {
                    $query->whereRaw("address_districts.name like '%$keyword%'");
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
            'title' => 'Manage Address Villages',
            'breadcrumbs' => [
                ['name' => 'Address'],
            ]
        ];
        $provinces = Province::all();
        return view('admin.address.village', compact('page_attr', 'provinces'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'id' => ['required', 'int', 'max:9999999999', 'unique:address_villages'],
                'district_id' => ['required', 'int', 'max:9999999'],
            ]);

            Village::create([
                'name' => $request->name,
                'id' => $request->id,
                'district_id' => $request->district_id,
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
            $address = Village::find($request->id);
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'district_id' => ['required', 'int', 'max:9999999'],
            ]);

            $address->name = $request->name;
            $address->district_id = $request->district_id;
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
            $address = Village::find($address->id);
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
            $model = Village::select(['id', DB::raw('name as text')])
                ->whereRaw("(`name` like '%$request->search%' or `id` like '%$request->search%')")
                ->limit(10);

            if ($request->district_id) {
                $model->where('district_id', '=', $request->district_id);
            }

            $result = $model->get()->toArray();
            if ($request->with_empty) {
                $result = array_merge([['id' => '', 'text' => 'All Village']], $result);
            }

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
