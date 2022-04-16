<?php

namespace App\Http\Controllers\Admin\Artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Models\Artikel\Tag;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    private $query = [];
    public function index(Request $request)
    {
        if (request()->ajax()) {
            // extend query
            $this->query['artikel'] = <<<SQL
                        (select count(*) from artikel_tag_item
                            where artikel_tag_item.tag_id = artikel_tag.id)
                    SQL;
            $this->query['artikel_alias'] = 'artikel';
            $model = Tag::select(['id', 'nama', 'slug', 'status'])
                ->selectRaw("IF(status = 1, 'Dipakai', 'Tidak Dipakai') as status_str")
                ->selectRaw("{$this->query['artikel']} as {$this->query['artikel_alias']}");

            // filter
            if (isset($request->filter)) {
                $filter = $request->filter;
                if ($filter['status'] != '') {
                    $model->where('status', '=', $filter['status']);
                }
            }

            return Datatables::of($model)
                ->addIndexColumn()
                ->filterColumn($this->query['artikel_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['artikel']} like '%$keyword%'");
                })
                ->make(true);
        }
        $page_attr = [
            'title' => 'Manage List Tag',
            'breadcrumbs' => [
                ['name' => 'Tag'],
            ]
        ];
        return view('admin.artikel.tag', compact('page_attr'));
    }

    public function insert(Request $request)
    {
        try {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:artikel_tag'],
                'status' => ['required', 'int'],
            ]);

            Tag::create([
                'nama' => $request->nama,
                'slug' => $request->slug,
                'status' => $request->status,
                // 'created_by' => auth()->user()->id,
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
            $model = Tag::find($request->id);
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:artikel_tag,slug,' . $request->id],
                'status' => ['required', 'int'],
            ]);

            $model->nama = $request->nama;
            $model->slug = $request->slug;
            $model->status = $request->status;
            // $model->updated_by = auth()->user()->id;
            $model->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Tag $model)
    {
        try {
            $model->delete();
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
            $model = Tag::select(['id', DB::raw('nama as text')])
                ->whereRaw("(`nama` like '%$request->search%' or `id` like '%$request->search%')")
                ->limit(10);

            $result = $model->get()->toArray();
            if ($request->with_empty && $request->search) {
                $result = array_merge([['id' => $request->search, 'text' => $request->search . ' (Buat Tag Baru)']], $result);
            }

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
