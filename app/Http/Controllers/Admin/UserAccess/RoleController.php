<?php

namespace App\Http\Controllers\Admin\UserAccess;

use App\Http\Controllers\Controller;
use App\Models\Menu\Admin as MenuAdmin;
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

        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.user_access.role.list');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function create()
    {
        $model = (object)['id' => '', 'name' => '', 'guard_name' => 'web'];
        $roles = [];

        //get permission all
        $tableNames = config('permission.table_names');
        $t_permission = $tableNames['permissions'];
        $t_menu = MenuAdmin::tableName;
        $is_page = <<<SQL
            (if(( select count(*) from $t_menu where $t_menu.`route` = $t_permission.`name`) > 0,1,0))
        SQL;
        $permissions = Permission::select([DB::raw("$t_permission.name"), DB::raw("$is_page as page")])->orderBy('name', 'asc')->get();

        $reload = true;

        $page_attr = adminBreadcumb(h_prefix(min: 1), isChild: true);
        $page_attr = [
            'title' => 'Create Role',
            'breadcrumbs' => $page_attr['breadcrumbs'],
            'navigation' => h_prefix(null, 1),
        ];

        $route_min = 1;
        $view = $this->get_editor();
        $data = compact('page_attr', 'permissions', 'model', 'roles', 'reload', 'route_min', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function edit(Role $model)
    {
        $id = $model->id;

        //get permission all
        $tableNames = config('permission.table_names');
        $t_permission = $tableNames['permissions'];
        $t_menu = MenuAdmin::tableName;
        $is_page = <<<SQL
            (if(( select count(*) from $t_menu where $t_menu.`route` = $t_permission.`name`) > 0,1,0))
        SQL;
        $permissions = Permission::select([DB::raw("$t_permission.name"), DB::raw("$is_page as page")])->orderBy('name', 'asc')->get();

        $reload = (request('r') == "1") ? false : true;
        // role
        $role = Role::with('permissions')->findOrFail($id);
        $roles = $role->permissions->map(function ($v) {
            return $v->name;
        })->toArray();

        $page_attr = adminBreadcumb(h_prefix(min: 2), isChild: true);
        $page_attr = [
            'title' => 'Edit Role',
            'breadcrumbs' => $page_attr['breadcrumbs'],
            'navigation' => h_prefix(null, 2),
        ];

        $route_min = 2;

        $view = $this->get_editor();
        $data = compact('page_attr', 'permissions', 'model', 'roles', 'reload', 'route_min', 'view');
        $data['compact'] = $data;
        return view($view, $data);
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

    // get editor view for handphone or desktop
    private function get_editor()
    {
        $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
        $ui = is_numeric(strpos($ua, "mobile"));

        // user interface
        // $ui = true;

        if (request('v')) {
            $ui = request('v') == 1;
        }

        return $ui ? 'pages.admin.user_access.role.editor' : 'pages.admin.user_access.role.editor2';
    }
}
