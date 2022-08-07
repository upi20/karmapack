<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\RoleHasMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use League\Config\Exception\ValidationException;
use Spatie\Permission\Models\Role;

class MenuController extends Controller
{
    private $validation_rule = [
        'title' => ['required', 'string', 'max:255'],
        'active' => ['required', 'integer', 'max:9'],
        'icon' => ['nullable', 'string', 'max:255'],
        'title' => ['required', 'string', 'max:255'],
        'roles' => ['required'],
        'sequence' => ['required', 'integer'],
    ];

    public function index()
    {
        $route = Route::getRoutes()->get();
        $routes = collect(Route::getRoutes())->map(function ($route) {
            return $route->getName();
        });

        $roles = Role::all();

        $page_attr = [
            'title' => 'Menu Management',
            'breadcrumbs' => [
                ['name' => 'User Access'],
            ]
        ];

        $can_insert = auth_can(h_prefix('insert'));
        $can_update = auth_can(h_prefix('update'));
        $can_delete = auth_can(h_prefix('delete'));
        $can_save = auth_can(h_prefix('save'));
        $data = compact(
            'page_attr',
            'routes',
            'roles',
            'can_insert',
            'can_update',
            'can_delete',
            'can_save',
        );
        return view('admin.menu.menu',  array_merge($data, ['compact' => $data]));
    }


    public function list()
    {
        return response()->json(['data' => menu()]);
    }

    public function parent_list(Request $request)
    {
        $result = Menu::select([DB::raw("concat(title, if((route is null or route = ''), '', concat(' | ', route))) as text"), DB::raw('id')])
            ->where('parent_id', '=', null)
            ->where('type', '=', 1)
            ->where('title', 'LIKE', '%' . $request->search . '%')
            ->limit(10)->get()->toArray();
        $result = array_merge([['id' => '0', 'text' => 'ROOT']], $result);
        return response()->json(['results' => $result]);
    }

    public function find(Request $request)
    {
        $result = Menu::findEdit($request->id);

        return response()->json(['data' => $result]);
    }

    public function save(Request $request)
    {
        DB::beginTransaction();
        $sequence = 1;
        foreach ($request->data ?? [] as $v) {
            $menu = Menu::find($v['id']);
            $menu->parent_id = isset($v['parent_id']) ? $v['parent_id'] : null;
            $menu->sequence = $sequence;
            $menu->save();
            $sequence++;
        }

        DB::commit();
        return response()->json();
    }

    public function insert(Request $request)
    {

        try {
            $request->validate($this->validation_rule);
            DB::beginTransaction();
            // insert menu
            $model = new Menu();
            $model->sequence = $request->sequence;
            $model->parent_id = $request->parent_id == 0 ? null : $request->parent_id;
            $model->active = $request->active;
            $model->title = $request->title;
            $model->icon = $request->icon;
            $model->route = $request->route;
            $model->type = $request->type;
            $model->save();

            // insert role
            foreach ($request->roles as $role) {
                $role = Role::findByParam(['name' => $role]);
                RoleHasMenu::create([
                    'role_id' => $role->id,
                    'menu_id' => $model->id,
                ]);
            }

            DB::commit();
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
            $request->validate(array_merge(
                ['id' => ['required', 'integer']],
                $this->validation_rule
            ));
            DB::beginTransaction();
            // update menu
            $model = Menu::find($request->id);
            $model->parent_id = $request->parent_id == 0 ? null : $request->parent_id;
            $model->active = $request->active;
            $model->title = $request->title;
            $model->icon = $request->icon;
            $model->route = $request->route;
            $model->type = $request->type;
            $model->save();

            // delete role
            RoleHasMenu::where('menu_id', '=', $model->id)->delete();

            // insert role
            foreach ($request->roles as $role) {
                $role = Role::findByParam(['name' => $role]);
                RoleHasMenu::create([
                    'role_id' => $role->id,
                    'menu_id' => $model->id,
                ]);
            }

            DB::commit();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Menu $model)
    {
        DB::beginTransaction();
        // set null child parent_id
        Menu::where('parent_id', '=', $model->id)->update(['parent_id' => null]);
        $model->delete();
        DB::commit();
        return response()->json();
    }
}
