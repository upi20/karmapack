<?php

namespace App\Http\Controllers\Admin\Address;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address\Province;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;
use App\Models\Address\District;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return District::datatable($request);
        }

        $page_attr = adminBreadcumb(h_prefix());

        $provinces = Province::all();

        $view = path_view('pages.admin.address.district');
        $data = compact('page_attr', 'provinces', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request)
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
                ->orderBy('name')
                ->limit(10);
            if ($request->regency_id) {
                $model->where('regency_id', '=', $request->regency_id);
            }

            $result = $model->get()->toArray();
            if ($request->with_empty) {
                $result = array_merge([['id' => '', 'text' => 'Semua Kel/Kec']], $result);
            }

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
