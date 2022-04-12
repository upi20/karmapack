<?php

namespace App\Http\Controllers\Admin\Address;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address\Province;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use League\Config\Exception\ValidationException;


class ProvinceController extends Controller
{
    private $query = [];
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $this->query['regencie'] = <<<SQL
                (select count(*) from address_regencies where province_id = address_provinces.id)
            SQL;
            $this->query['regencie_alias'] = 'regencie';

            $this->query['district'] = <<<SQL
                (select count(*) from address_districts
                    join address_regencies
                    on address_districts.regency_id = address_regencies.id
                    where address_regencies.province_id = address_provinces.id)
            SQL;
            $this->query['district_alias'] = 'district';

            $this->query['village'] = <<<SQL
                (select count(*) from address_villages
                    join address_districts
                    on address_villages.district_id = address_districts.id
                    join address_regencies
                    on address_districts.regency_id = address_regencies.id
                    where address_regencies.province_id = address_provinces.id)
            SQL;
            $this->query['village_alias'] = 'village';

            $model = Province::select([
                'id', 'name',
                DB::raw("{$this->query['regencie']} as {$this->query['regencie_alias']}"),
                DB::raw("{$this->query['district']} as {$this->query['district_alias']}"),
                DB::raw("{$this->query['village']} as {$this->query['village_alias']}"),
            ]);
            return Datatables::of($model)
                ->addIndexColumn()
                ->filterColumn($this->query['regencie_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['regencie']} like '%$keyword%'");
                })
                ->filterColumn($this->query['district_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['district']} like '%$keyword%'");
                })
                ->filterColumn($this->query['village_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['village']} like '%$keyword%'");
                })
                ->make(true);
        }

        $page_attr = [
            'title' => 'Manage Address Provinces',
            'breadcrumbs' => [
                ['name' => 'Address'],
            ]
        ];
        return view('admin.address.province', compact('page_attr'));
    }

    public function store(Request $request)
    {

        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'id' => ['required', 'int', 'max:99', 'unique:address_provinces'],
            ]);

            Province::create([
                'name' => $request->name,
                'id' => $request->id,
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
            $address = Province::find($request->id);
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);

            $address->name = $request->name;
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
            $address = Province::find($address->id);
            $address->delete();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    // for API
    public function get(Request $request)
    {
        try {
            if ($request->id) {
                $result = Province::find($request->id);
                if ($result) {
                    return ResponseFormatter::success($result);
                } else {
                    return ResponseFormatter::error(null, "Data not found", 404);
                }
            } elseif ($request->search) {
                $result = Province::where('name', 'like', "%$request->search%")
                    ->orWhere('id', 'like', "%$request->search%")
                    ->get();
                if ($result) {
                    return ResponseFormatter::success($result);
                } else {
                    return ResponseFormatter::error(null, "Data not found", 404);
                }
            } else {
                $result = Province::all();
                if ($result) {
                    return ResponseFormatter::success($result);
                } else {
                    return ResponseFormatter::error(null, "Data not found", 404);
                }
            }
        } catch (\Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'Authentication Failed', 500);
        }
    }

    public function select2(Request $request)
    {
        try {
            $result = Province::where('name', 'like', "%$request->search%")
                ->select(['id', DB::raw('name as text')])
                ->orWhere('id', 'like', "%$request->search%")
                ->limit(10)->get();
            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
