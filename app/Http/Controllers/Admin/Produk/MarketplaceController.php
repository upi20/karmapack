<?php

namespace App\Http\Controllers\Admin\Produk;

use App\Http\Controllers\Controller;
use App\Models\Produk\MarketPlaceJenis;
use App\Models\Produk\Produk;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class MarketplaceController extends Controller
{
    private $validate_model = [
        'foto_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'foto_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'nama' => ['required', 'string'],
        'keterangan' => ['nullable', 'string'],
        'link' => ['nullable', 'string'],
        'link_produk' => ['nullable', 'string'],
    ];

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return MarketPlaceJenis::datatable($request);
        };
        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.produk.marketplace');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new MarketPlaceJenis();
            $foto_icon = '';
            if ($image = $request->file('foto_icon')) {
                $foto_icon = date('YmdHis') . "icon." . $image->getClientOriginalExtension();
                $image->move(public_path(MarketPlaceJenis::image_folder), $foto_icon);
            }
            $foto_cover = '';
            if ($image = $request->file('foto_cover')) {
                $foto_cover = date('YmdHis') . "cover." . $image->getClientOriginalExtension();
                $image->move(public_path(MarketPlaceJenis::image_folder), $foto_cover);
            }

            $model->foto_icon = $foto_icon;
            $model->foto_cover = $foto_cover;
            $model->nama = $request->nama;
            $model->link = $request->link;
            $model->link_produk = $request->link_produk;
            $model->keterangan = $request->keterangan;
            $model->save();
            Produk::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function update(Request $request): mixed
    {
        try {
            $model = MarketPlaceJenis::findOrFail($request->id);
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));

            // foto_icon handle
            $foto_icon = '';
            if ($image = $request->file('foto_icon')) {
                $foto_icon = date('YmdHis') . "icon." . $image->getClientOriginalExtension();
                $image->move(public_path(MarketPlaceJenis::image_folder), $foto_icon);

                // delete foto_icon
                if ($model->foto_icon) {
                    $path = public_path(MarketPlaceJenis::image_folder . "/$model->foto_icon");
                    delete_file($path);
                }
                // save foto_icon
                $model->foto_icon = $foto_icon;
            }

            // foto_cover handle
            $foto_cover = '';
            if ($image = $request->file('foto_cover')) {
                $foto_cover = date('YmdHis') . "cover." . $image->getClientOriginalExtension();
                $image->move(public_path(MarketPlaceJenis::image_folder), $foto_cover);

                // delete foto_cover
                if ($model->foto_cover) {
                    $path = public_path(MarketPlaceJenis::image_folder . "/$model->foto_cover");
                    delete_file($path);
                }
                // save foto_cover
                $model->foto_cover = $foto_cover;
            }

            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->link = $request->link;
            $model->link_produk = $request->link_produk;
            $model->save();
            Produk::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(MarketPlaceJenis $model): mixed
    {
        try {
            $model->delete();
            // delete foto_icon
            if ($model->foto_icon) {
                $path = public_path(MarketPlaceJenis::image_folder . "/$model->foto_icon");
                delete_file($path);
            }
            // delete foto_cover
            if ($model->foto_cover) {
                $path = public_path(MarketPlaceJenis::image_folder . "/$model->foto_cover");
                delete_file($path);
            }
            Produk::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function find(Request $request)
    {
        $produk = MarketPlaceJenis::findOrFail($request->id);
        $produk->foto_cover_link = url(MarketPlaceJenis::image_folder . "/$produk->foto_cover");
        $produk->foto_icon_link = url(MarketPlaceJenis::image_folder . "/$produk->foto_icon");
        return $produk;
    }
}
