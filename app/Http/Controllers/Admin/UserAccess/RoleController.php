<?php

namespace App\Http\Controllers\Admin\UserAccess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use League\Config\Exception\ValidationException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $model = Role::query();
            return Datatables::of($model)
                ->addIndexColumn()
                ->make(true);
        }

        $prefix_uri = trim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
        $prefix = str_replace('/', '.', $prefix_uri);

        $page_attr = [
            'title' => 'Role',
            'breadcrumbs' => [
                ['name' => 'User Access'],
            ]
        ];

        $data = compact('page_attr', 'prefix', 'prefix_uri');
        return view('admin.user_access.role.list',  array_merge($data, ['compact' => $data]));
    }

    public function create()
    {
        $model = (object)['id' => '', 'name' => '', 'guard_name' => 'web'];
        $roles = [];
        $prefix_uri = trim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
        $prefix = str_replace('/', '.', $prefix_uri);

        $parrent = str_replace('/create', '', $_SERVER['REQUEST_URI']);
        $prefix_uri_parent = trim(explode('?', $parrent)[0], '/');
        $prefix_parent = str_replace('/', '.', $prefix_uri_parent);

        //get permission all
        $permissions = Permission::orderBy('name', 'asc')->get();

        $reload = true;

        $page_attr = [
            'title' => 'Create Role',
            'breadcrumbs' => [
                ['name' => 'User Access'],
                ['name' => 'Role', 'url' => $prefix_parent],
            ],
            'navigation' => $prefix_parent,
        ];

        $data = compact('page_attr', 'prefix', 'prefix_uri', 'prefix_parent', 'prefix_uri_parent', 'permissions', 'model', 'roles', 'reload');
        return view($this->get_editor(),  array_merge($data, ['compact' => $data]));
    }

    public function edit(Role $model)
    {
        $id = $model->id;

        $trim = str_replace("/$id", '', $_SERVER['REQUEST_URI']);
        $prefix_uri = trim(explode('?', $trim)[0], '/');
        $prefix = str_replace('/', '.', $prefix_uri);

        $trim = str_replace("/edit/$id", '', $_SERVER['REQUEST_URI']);
        $prefix_uri_parent = trim(explode('?', $trim)[0], '/');
        $prefix_parent = str_replace('/', '.', $prefix_uri_parent);

        //get permission all
        $permissions = Permission::orderBy('name', 'asc')->get();

        $reload = (request('r') == "1") ? false : true;
        // role
        $role = Role::with('permissions')->findOrFail($id);
        $roles = $role->permissions->map(function ($v) {
            return $v->name;
        })->toArray();

        $page_attr = [
            'title' => 'Edit Role',
            'breadcrumbs' => [
                ['name' => 'User Access'],
                ['name' => 'Role', 'url' => $prefix_parent],
            ],
            'navigation' => $prefix_parent,
        ];

        $data = compact('page_attr', 'prefix', 'prefix_uri', 'prefix_parent', 'prefix_uri_parent', 'permissions', 'model', 'roles', 'reload');

        return view($this->get_editor(),  array_merge($data, ['compact' => $data]));
    }

    public function store(Request $request)
    {
        $tableNames = config('permission.table_names');
        try {
            DB::beginTransaction();
            $request->validate([
                'guard_name' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255', ('unique:' . $tableNames['roles'] . ',name')],
                'permissions'   => 'required',
            ]);

            $role = Role::create([
                'name' => $request->name,
                'guard_name' => $request->guard_name,
            ]);
            $role->givePermissionTo($request->permissions);
            DB::commit();
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
            $model = Role::find($request->id);
            $request->validate([
                'guard_name' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255', ('unique:' . $tableNames['roles'] . ',name,' . $request->id)],
                'permissions'   => 'required',
            ]);

            $model->name = $request->name;
            $model->guard_name = $request->guard_name;
            $model->save();

            //sync permissions
            $model->syncPermissions($request->permissions);

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
            DB::table($tableNames['model_has_roles'])->where('role_id', '=', $model->id)->delete();

            // delete permission
            $model = Role::find($model->id);
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
            $result = Role::where('name', 'like', "%$request->search%")
                ->select(['id', DB::raw('name as text')])
                ->orWhere('id', 'like', "%$request->search%")
                ->limit(10)->get();
            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }

    private function get_editor()
    {
        return request('v') == 1 ? 'admin.user_access.role.editor' : 'admin.user_access.role.editor2';
    }
}
