<?php

namespace App\Http\Controllers\Admin\Address;

use App\Http\Controllers\Controller;
use App\Models\Address\Province;
use Illuminate\Http\Request;
use App\Models\Address\Regencie;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;

class RegencieController extends Controller
{

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Regencie::datatable($request);
        }

        $page_attr = adminBreadcumb(h_prefix());

        $provinces = Province::all();

        $view = path_view('pages.admin.address.regencie');
        $data = compact('page_attr', 'provinces', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request)
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
                ->orderBy('name')
                ->limit(10);
            if ($request->province_id) {
                $model->where('province_id', '=', $request->province_id);
            }

            $result = $model->get()->toArray();
            if ($request->with_empty) {
                $result = array_merge([['id' => '', 'text' => 'Semua Kab/Kota']], $result);
            }

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
