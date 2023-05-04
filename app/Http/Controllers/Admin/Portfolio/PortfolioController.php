<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Portfolio\Item;
use App\Models\Portfolio\Portfolio;
use App\Models\Portfolio\SubKategori as PortfolioSubKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;

class PortfolioController extends Controller
{
    private $image_folder = Portfolio::image_folder;

    private $validate_model = [
        // 'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'nama' => ['required', 'string'],
        'keterangan' => ['nullable', 'string'],
        'kategori_id' => ['required', 'int'],
        'isEdit' => ['required', 'int'],
    ];

    private $validate_model_item = [
        'nama' => ['required', 'string'],
        'portfolio_id' => ['required', 'integer'],
        'urutan' => ['nullable', 'integer'],
        'keterangan' => ['nullable', 'string'],
    ];

    private $key = 'setting.home.portfolio';

    // page function ==============================================================================
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Portfolio::datatable($request);
        }
        $kategoris = PortfolioSubKategori::orderBy('nama')->get();
        $page_attr = adminBreadcumb(h_prefix());

        $setting = (object)[
            'visible' => setting_get("$this->key.visible"),
            'title' => setting_get("$this->key.title"),
            'sub_title' => setting_get("$this->key.sub_title"),
        ];

        $view = path_view('pages.admin.portfolio.portfolio');
        $data = compact('page_attr', 'kategoris', 'view', 'setting');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        $portfolio = Portfolio::getInsert();
        $kategoris = PortfolioSubKategori::orderBy('nama')->get();
        $isEdit = false;
        $page_attr = adminBreadcumb(h_prefix(min: 1), 'Tambah', isChild: true);

        $page_attr = [
            'title' => $page_attr['title'],
            'navigation' => h_prefix(min: 1),
            'breadcrumbs' => $page_attr['breadcrumbs']
        ];

        $route_save = route(h_prefix('save', 1), $portfolio->id);

        $view = path_view('pages.admin.portfolio.portfolio_editor');
        $data = compact('page_attr', 'portfolio', 'kategoris', 'isEdit', 'route_save', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function update(Portfolio $portfolio): mixed
    {
        $kategoris = PortfolioSubKategori::orderBy('nama')->get();
        $isEdit = true;
        $page_attr = adminBreadcumb(h_prefix(min: 2), 'Ubah', isChild: true);

        $page_attr = [
            'title' => $page_attr['title'],
            'navigation' => h_prefix(min: 2),
            'breadcrumbs' => $page_attr['breadcrumbs']
        ];
        $route_save = route(h_prefix('save', 2), $portfolio->id);

        $view = path_view('pages.admin.portfolio.portfolio_editor');
        $data = compact('page_attr', 'portfolio', 'kategoris', 'isEdit', 'route_save', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }
    // page function ==============================================================================

    // crud portfolio ================================================================================
    public function save(Portfolio $portfolio, Request $request): mixed
    {
        try {
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));
            $portfolio->kategori_id = $request->kategori_id;
            $portfolio->nama = $request->nama;
            $portfolio->keterangan = $request->keterangan;

            // update
            if ($request->isEdit == 1) {
                $foto = '';
                if ($image = $request->file('foto')) {
                    $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move(public_path($this->image_folder), $foto);

                    // delete foto
                    if ($portfolio->foto) {
                        $path = public_path("$this->image_folder/$portfolio->foto");
                        delete_file($path);
                    }
                    // save foto
                    $portfolio->foto = $foto;
                }
            }
            // insert
            else {
                $foto = '';
                if ($image = $request->file('foto')) {
                    $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move(public_path($this->image_folder), $foto);
                }
                $portfolio->foto = $foto;
                $portfolio->created_at = date('Y-m-d H:i:s');
            }

            $portfolio->is_insert = 1;
            $portfolio->save();
            Portfolio::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Portfolio $model): mixed
    {
        try {
            DB::beginTransaction();
            // delete foto
            if ($model->foto) {
                $path = public_path("$this->image_folder/$model->foto");
                delete_file($path);
            }

            // item
            foreach ($model->items ?? [] as $item) {
                $item->delete();
            }

            $model->delete();
            DB::commit();
            Portfolio::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
    // crud portfolio ================================================================================

    // item portfolio =========================================================================
    public function item_insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model_item);
            $model = new Item();

            $model->portfolio_id = $request->portfolio_id;
            $urutan = $request->urutan ?? ((Item::where('portfolio_id', $request->portfolio_id)->max('urutan') ?? 0) + 1);
            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->urutan =  $urutan;
            $model->save();
            Portfolio::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function item_update(Request $request): mixed
    {
        try {
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model_item));
            $model = Item::findOrFail($request->id);
            $model->portfolio_id = $request->portfolio_id;
            $urutan = $request->urutan ?? ((Item::where('portfolio_id', $request->portfolio_id)->max('urutan') ?? 0) + 1);
            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->urutan =  $urutan;
            $model->save();
            Portfolio::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function item_delete(Item $model): mixed
    {
        try {
            $model->delete();
            Portfolio::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function item_find(Request $request)
    {
        return Item::findOrFail($request->id);
    }

    public function item_datatable(Request $request)
    {
        return Item::datatable($request);
    }
    // item portfolio =========================================================================

    public function setting(Request $request)
    {
        setting_set("$this->key.visible", $request->visible !== null);
        setting_set("$this->key.title", $request->title);
        setting_set("$this->key.sub_title", $request->sub_title);
        return response()->json();
    }
}
