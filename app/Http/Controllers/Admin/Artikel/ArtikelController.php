<?php

namespace App\Http\Controllers\Admin\Artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel\Artikel;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Helpers\Summernote;
use App\Models\Artikel\Kategori;
use App\Models\Artikel\Tag;
use App\Models\Artikel\TagArtikel;
use App\Models\Artikel\KategoriArtikel;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    private $image_folder = Artikel::image_folder;
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $model = Artikel::select(['id', 'nama', 'slug', 'excerpt', 'status', 'created_at', 'date'])
                ->selectRaw('IF(status = 1, "Dipublish", "Disimpan") as status_str');

            // filter
            if (isset($request->filter)) {
                $filter = $request->filter;
                if ($filter['status'] != '') {
                    $model->where('status', '=', $filter['status']);
                }
            }

            return Datatables::of($model)
                ->addIndexColumn()
                ->make(true);
        }
        $page_attr = adminBreadcumb(h_prefix());
        $view = path_view('pages.admin.artikel.data.list');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function add(Request $request)
    {
        $page_attr = adminBreadcumb(h_prefix(min: 1), isChild: true);
        $page_attr = [
            'title' => 'Tambah Artikel',
            'breadcrumbs' => $page_attr['breadcrumbs'],
            'navigation' => h_prefix(min: 1)
        ];

        Artikel::clearCache();

        $users = User::all();
        $view = path_view('pages.admin.artikel.data.add');
        $data = compact('page_attr', 'users', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function edit(Artikel $artikel)
    {
        $page_attr = adminBreadcumb(h_prefix(min: 2), isChild: true);
        $page_attr = [
            'title' => 'Ubah Artikel',
            'breadcrumbs' => $page_attr['breadcrumbs'],
            'navigation' => h_prefix(min: 2)
        ];
        $edit = true;
        $tbl = KategoriArtikel::tableName;
        $kategori = KategoriArtikel::select([
            'artikel_kategori.nama as text',
            'artikel_kategori.id'
        ])
            ->join('artikel_kategori', "$tbl.kategori_id", '=', "artikel_kategori.id")
            ->where("$tbl.artikel_id", "=", $artikel->id)
            ->get();

        $tbl = TagArtikel::tableName;
        $tag = TagArtikel::select([
            'artikel_tag.nama as text',
            'artikel_tag.id'
        ])
            ->join('artikel_tag', "$tbl.tag_id", '=', "artikel_tag.id")
            ->where("$tbl.artikel_id", "=", $artikel->id)
            ->get();
        $users = User::all();

        $view = path_view('pages.admin.artikel.data.add');
        $data = compact('page_attr', 'edit', 'artikel', 'kategori', 'tag', 'users', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:artikel'],
                'detail' => ['required'],
                'date' => ['required'],
                'excerpt' => ['required'],
                'status' => ['required', 'int'],
            ]);
            $detail = Summernote::insert($request->detail, $this->image_folder, substr($request->slug, 0, 10));

            $model = Artikel::create([
                'nama' => $request->nama,
                'slug' => $request->slug,
                'excerpt' => $request->excerpt,
                'date' => $request->date,
                'status' => $request->status,
                'detail' => $detail->html,
                'foto' => $detail->first_img,
                'user_id' => $request->user_id,
                // 'created_by' => auth()->user()->id,
            ]);
            $this->kategori_store($request->kategori, $model->id);
            $this->tag_store($request->tag, $model->id);
            DB::commit();

            Artikel::clearCache();

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
            $request->validate([
                'id' => ['required', 'int'],
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:artikel,slug,' . $request->id],
                'detail' => ['required'],
                'date' => ['required'],
                'excerpt' => ['required'],
                'status' => ['required', 'int'],
            ]);
            DB::beginTransaction();
            $model = Artikel::find($request->id);
            $detail = Summernote::update($request->detail, $this->image_folder, $model->foto ?? '', substr($request->slug, 0, 10));

            $model->detail = $detail->html;
            $model->foto = $detail->first_img;
            $model->nama = $request->nama;
            $model->excerpt = $request->excerpt;
            $model->date = $request->date;
            $model->status = $request->status;
            $model->slug = $request->slug;
            $model->user_id = $request->user_id;
            // $model->updated_by = auth()->user()->id;

            $this->kategori_store($request->kategori, $model->id);
            $this->tag_store($request->tag, $model->id);
            $model->save();
            DB::commit();

            Artikel::clearCache();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Artikel $artikel)
    {
        try {
            Summernote::delete($artikel->detail);
            $artikel->delete();

            Artikel::clearCache();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    private function kategori_store($kategori, int $artikel_id): bool
    {
        // jika tidak ada kategori
        if (!$kategori) return false;

        // delete all kategori item where artikel_id
        KategoriArtikel::where('artikel_id', '=', $artikel_id)->delete();

        // insert all kategori item where artikel_id
        $kategories = [];
        foreach ($kategori as  $k) {
            // cek kategori apakah kategori baru
            $id = ((int)$k) ? $k : $this->insert_kategori($k);
            $kategories[] = [
                'artikel_id' => $artikel_id,
                'kategori_id' => $id,
            ];
        }
        KategoriArtikel::insert($kategories);
        return true;
    }

    private function insert_kategori(string $nama): int
    {
        $kategori = new Kategori();
        $kategori->nama = $nama;
        $kategori->status = 1;
        $kategori->save();
        return $kategori->id;
    }

    private function tag_store($tag, int $artikel_id): bool
    {
        // jika tidak ada tag
        if (!$tag) return false;

        // delete all tag item where artikel_id
        TagArtikel::where('artikel_id', '=', $artikel_id)->delete();

        // insert all tag item where artikel_id
        $tages = [];
        foreach ($tag as  $k) {
            // cek tag apakah tag baru
            $id = ((int)$k) ? $k : $this->insert_tag($k);
            $tages[] = [
                'artikel_id' => $artikel_id,
                'tag_id' => $id,
            ];
        }
        TagArtikel::insert($tages);
        return true;
    }

    private function insert_tag(string $nama): int
    {
        $tag = new Tag();
        $tag->nama = $nama;
        $tag->status = 1;
        $tag->save();

        return $tag->id;
    }
}
