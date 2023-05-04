<?php

namespace App\Http\Controllers\Admin\Address;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address\Province;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;
use App\Models\Address\Village;

class VillageController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Village::datatable($request);
        }

        $page_attr = adminBreadcumb(h_prefix());

        $provinces = Province::all();

        $view = path_view('pages.admin.address.village');
        $data = compact('page_attr', 'provinces', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request)
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
                ->orderBy('name')
                ->limit(10);

            if ($request->district_id) {
                $model->where('district_id', '=', $request->district_id);
            }

            $result = $model->get()->toArray();
            if ($request->with_empty) {
                $result = array_merge([['id' => '', 'text' => 'Semua Kel/Des']], $result);
            }

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
