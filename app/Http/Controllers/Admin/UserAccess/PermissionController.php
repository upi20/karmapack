<?php

namespace App\Http\Controllers\Admin\UserAccess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use League\Config\Exception\ValidationException;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $model = Permission::query();
            return Datatables::of($model)
                ->addIndexColumn()
                ->make(true);
        }

        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.user_access.permission');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function store(Request $request)
    {
        $tableNames = config('permission.table_names');
        try {
            $request->validate([
                'guard_name' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255', ('unique:' . $tableNames['permissions'] . ',name')],
            ]);

            Permission::create([
                'name' => $request->name,
                'guard_name' => $request->guard_name,
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

            $tableNames = config('permission.table_names');
            $model = Permission::find($request->id);
            $request->validate([
                'guard_name' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255', ('unique:' . $tableNames['permissions'] . ',name,' . $request->id)],
            ]);

            $model->name = $request->name;
            $model->guard_name = $request->guard_name;
            $model->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Request $model)
    {
        $tableNames = config('permission.table_names');
        try {
            DB::beginTransaction();
            // delete relationship
            DB::table($tableNames['role_has_permissions'])->where('permission_id', '=', $model->id)->delete();
            DB::table($tableNames['model_has_permissions'])->where('permission_id', '=', $model->id)->delete();

            // delete permission
            $model = Permission::find($model->id);
            $model->delete();
            DB::commit();
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
            $result = Permission::where('name', 'like', "%$request->search%")
                ->select(['id', DB::raw('name as text')])
                ->orWhere('id', 'like', "%$request->search%")
                ->limit(10)->get();
            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
