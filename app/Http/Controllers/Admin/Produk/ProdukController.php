<?php

namespace App\Http\Controllers\Admin\Produk;

use App\Helpers\Summernote;
use App\Http\Controllers\Controller;
use App\Models\Produk\Foto;
use App\Models\Produk\Produk;
use App\Models\Produk\Kategori as ProdukKategori;
use App\Models\Produk\MarketPlace;
use App\Models\Produk\MarketPlaceJenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;

class ProdukController extends Controller
{
    private $validate_model = [
        'isEdit' => ['required', 'int'],
        'tampilkan_harga' => ['required', 'int'],
        'kategori_id' => ['required', 'int'],
        'nama' => ['required', 'string'],
        'sku' => ['nullable', 'string'],
        'kilasan' => ['required', 'string'],
        'informasi_lain' => ['nullable', 'string'],
        'harga' => ['required', 'int'],
        'harga_diskon' => ['nullable', 'int'],
        'status_stok' => ['required', 'int'],
        'rating' => ['nullable', 'int'],
        'rating_nama' => ['nullable', 'string'],
        'tampilkan_di_halaman_utama' => ['required', 'string'],
    ];

    private $validate_model_foto = [
        'produk_id' => ['required', 'int'],
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'nama' => ['required', 'string'],
        'urutan' => ['required', 'int'],
    ];

    private $validate_model_marketplace = [
        'produk_id' => ['required', 'int'],
        'jenis_id' => ['required', 'int'],
        'link' => ['nullable', 'string'],
    ];

    // page function ==============================================================================
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Produk::datatable($request);
        }
        $kategoris = ProdukKategori::orderBy('nama')->get();
        $page_attr = adminBreadcumb(h_prefix());


        $view = path_view('pages.admin.produk.produk');
        $data = compact('page_attr', 'kategoris', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        $produk = Produk::getInsert();
        $kategoris = ProdukKategori::orderBy('nama')->get();
        $isEdit = false;
        $marketplaceJenis = MarketPlaceJenis::orderBy('nama')->get();

        $page_attr = adminBreadcumb(h_prefix(min: 1), 'Tambah');
        $page_attr = [
            'title' => $page_attr['title'],
            'navigation' => h_prefix(min: 1),
            'breadcrumbs' => $page_attr['breadcrumbs']
        ];

        $route_save = route(h_prefix('save', 1), $produk->id);

        $view = path_view('pages.admin.produk.produk_editor');
        $data = compact('page_attr', 'produk', 'kategoris', 'isEdit', 'route_save', 'marketplaceJenis', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function update(Produk $produk): mixed
    {
        $kategoris = ProdukKategori::orderBy('nama')->get();
        $isEdit = true;
        $marketplaceJenis = MarketPlaceJenis::orderBy('nama')->get();

        $page_attr = adminBreadcumb(h_prefix(min: 2), 'Tambah');

        $page_attr = [
            'title' => $page_attr['title'],
            'navigation' => h_prefix(min: 2),
            'breadcrumbs' => $page_attr['breadcrumbs']
        ];
        $route_save = route(h_prefix('save', 2), $produk->id);

        $view = path_view('pages.admin.produk.produk_editor');
        $data = compact('page_attr', 'produk', 'kategoris', 'isEdit', 'route_save', 'marketplaceJenis', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }
    // page function ==============================================================================



    // crud produk ================================================================================
    public function save(Produk $produk, Request $request): mixed
    {
        try {
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));
            $produk->kategori_id = $request->kategori_id;
            $produk->nama = $request->nama;
            $produk->sku = $request->sku;
            $produk->kilasan = $request->kilasan;
            $produk->tampilkan_harga = $request->tampilkan_harga;

            if ($request->isEdit == 1) {
                $informasi_lain = Summernote::update($request->informasi_lain, Produk::image_folder, '');
                $produk->informasi_lain = $informasi_lain->html;
            } else {
                $informasi_lain = Summernote::insert($request->informasi_lain, Produk::image_folder);
                $produk->informasi_lain = $informasi_lain->html;
                $produk->created_at = date('Y-m-d H:i:s');
            }

            $produk->harga = $request->harga;
            $produk->harga_diskon = $request->harga_diskon;
            $produk->status_stok = $request->status_stok;
            $produk->rating = $request->rating;
            $produk->rating_nama = $request->rating_nama;
            $produk->tampilkan_di_halaman_utama = $request->tampilkan_di_halaman_utama;
            $produk->is_insert = 1;

            $produk->save();
            Produk::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Produk $model): mixed
    {
        try {
            DB::beginTransaction();
            // foto
            foreach ($model->fotos ?? [] as $foto) {
                $foto->delete();
                // delete foto
                if ($foto->foto) {
                    $path = public_path(Foto::image_folder . "/$foto->foto");
                    delete_file($path);
                }
            }

            // marketplace
            foreach ($model->marketplaces ?? [] as $marketplace) {
                $marketplace->delete();
            }
            Summernote::delete($model->informasi_lain);
            $model->delete();
            DB::commit();
            Produk::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
    // crud produk ================================================================================

    // foto produk ================================================================================
    public function foto_insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model_foto);
            $produk = Produk::findOrFail($request->produk_id);
            $model = new Foto();
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto =  $produk->slug . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path(Foto::image_folder), $foto);
            }

            $model->foto = $foto;
            $model->produk_id = $request->produk_id;
            $model->nama = $request->nama;
            $urutan = $request->urutan ?? ((Foto::where('produk_id', $request->produk_id)->max('urutan') ?? 0) + 1);
            $model->urutan = $urutan;
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

    public function foto_update(Request $request): mixed
    {
        try {
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model_foto));
            $produk = Produk::findOrFail($request->produk_id);
            $model = Foto::findOrFail($request->id);
            // foto handle
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto =  $produk->slug . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path(Foto::image_folder), $foto);

                // delete foto
                if ($model->foto) {
                    $path = public_path(Foto::image_folder . "/$model->foto");
                    delete_file($path);
                }
                // save foto
                $model->foto = $foto;
            }
            $model->produk_id = $request->produk_id;
            $model->nama = $request->nama;
            $urutan = $request->urutan ?? ((Foto::where('produk_id', $request->produk_id)->max('urutan') ?? 0) + 1);
            $model->urutan = $urutan;
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

    public function foto_delete(Foto $model): mixed
    {
        try {
            $model->delete();
            // delete foto
            if ($model->foto) {
                $path = public_path(Foto::image_folder . "/$model->foto");
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

    public function foto_find(Request $request)
    {
        $foto = Foto::findOrFail($request->id);
        $foto->foto_link = url(Foto::image_folder . "/$foto->foto");
        return $foto;
    }

    public function foto_datatable(Request $request)
    {
        return Foto::datatable($request);
    }
    // foto produk ================================================================================


    // marketplace produk =========================================================================
    public function marketplace_insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model_marketplace);
            $model = new MarketPlace();

            $model->produk_id = $request->produk_id;
            $model->jenis_id = $request->jenis_id;
            $model->link = $request->link;
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

    public function marketplace_update(Request $request): mixed
    {
        try {
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model_marketplace));
            $model = MarketPlace::findOrFail($request->id);
            $model->produk_id = $request->produk_id;
            $model->jenis_id = $request->jenis_id;
            $model->link = $request->link;
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

    public function marketplace_delete(MarketPlace $model): mixed
    {
        try {
            $model->delete();
            Produk::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function marketplace_find(Request $request)
    {
        return MarketPlace::findOrFail($request->id);
    }

    public function marketplace_datatable(Request $request)
    {
        return MarketPlace::datatable($request);
    }
    // marketplace produk =========================================================================
}
