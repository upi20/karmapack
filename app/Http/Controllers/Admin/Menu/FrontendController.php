<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\Frontend as MenuFrontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;

class FrontendController extends Controller
{
    private $validation_rule = [
        'title' => ['required', 'string', 'max:255'],
        'active' => ['required', 'integer', 'max:9'],
        'icon' => ['nullable', 'string', 'max:255'],
        'sequence' => ['required', 'integer'],
    ];

    public function index()
    {
        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.menu.frontend');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }


    public function list()
    {
        $lists = MenuFrontend::getAll();
        $result = menu_parse_frontend($lists);
        return response()->json(['data' => $result]);
    }

    public function parent_list(Request $request)
    {
        $result = MenuFrontend::select([DB::raw("concat(title, if((route is null or route = ''), '', concat(' | ', route))) as text"), DB::raw('id')])
            ->where('parent_id', '=', null)
            ->where('type', '=', 1)
            ->where('title', 'LIKE', '%' . $request->search . '%')
            ->limit(10)->get()->toArray();
        $result = array_merge([['id' => '0', 'text' => 'ROOT']], $result);
        return response()->json(['results' => $result]);
    }

    public function find(Request $request)
    {
        $result = MenuFrontend::findOrFail($request->id);
        return response()->json(['data' => $result]);
    }

    public function save(Request $request)
    {
        DB::beginTransaction();
        $sequence = 1;
        foreach ($request->data ?? [] as $v) {
            $menu = MenuFrontend::find($v['id']);
            $menu->parent_id = isset($v['parent_id']) ? $v['parent_id'] : null;
            $menu->sequence = $sequence;
            $menu->save();
            $sequence++;
        }
        DB::commit();

        MenuFrontend::feClearCache();

        return response()->json();
    }

    public function insert(Request $request)
    {
        try {
            $request->validate($this->validation_rule);
            $model = new MenuFrontend();
            $model->sequence = $request->sequence;
            $model->parent_id = $request->parent_id == 0 ? null : $request->parent_id;
            $model->active = $request->active;
            $model->title = $request->title;
            $model->icon = $request->icon;
            $model->route = $request->route;
            $model->type = $request->type;
            $model->save();

            MenuFrontend::feClearCache();

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
            $request->validate(array_merge(
                ['id' => ['required', 'integer']],
                $this->validation_rule
            ));
            $model = MenuFrontend::find($request->id);
            $model->parent_id = $request->parent_id == 0 ? null : $request->parent_id;
            $model->active = $request->active;
            $model->title = $request->title;
            $model->icon = $request->icon;
            $model->route = $request->route;
            $model->type = $request->type;
            $model->save();

            MenuFrontend::feClearCache();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(MenuFrontend $model)
    {
        DB::beginTransaction();
        // set null child parent_id
        MenuFrontend::where('parent_id', '=', $model->id)->update(['parent_id' => null]);
        $model->delete();
        DB::commit();

        MenuFrontend::feClearCache();

        return response()->json();
    }
}
