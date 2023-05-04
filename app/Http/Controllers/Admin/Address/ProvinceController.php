<?php

namespace App\Http\Controllers\Admin\Address;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address\Province;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;


class ProvinceController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Province::datatable($request);
        }

        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.address.province');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request)
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
                ->orderBy('name')
                ->limit(10)->get();
            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
