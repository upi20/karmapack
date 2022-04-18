<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    private $validate_model = [
        'nama' => ['required', 'string', 'max:255'],
        'icon' => ['required', 'string', 'max:255'],
        'url' => ['required', 'string', 'max:255'],
        'keterangan' => ['required', 'string', 'max:255'],
        'status' => ['required', 'int'],
        'order' => ['required', 'int'],
    ];
    public function index(Request $request)
    {
        if (request()->ajax()) {
            // get key from validate
            $select = [];
            foreach ($this->validate_model as $k => $val) $select[] = $k;

            // get data from model
            $model = Contact::select(array_merge(['id'], $select))
                ->selectRaw("IF(status = 1, 'Dipakai', 'Tidak Dipakai') as status_str");

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
        $page_attr = [
            'title' => 'Manage List Contact',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ]
        ];
        return view('admin.contact', compact('page_attr'));
    }

    public function insert(Request $request)
    {
        try {
            $request->validate($this->validate_model);

            $model = new Contact();
            $model->url = $request->url;
            $model->icon = $request->icon;
            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->status = $request->status;
            $model->order = $request->order;
            // $model->created_by = auth()->user()->id;
            $model->save();
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
            $model = Contact::find($request->id);
            $request->validate(array_merge(['id' => ['required', 'int']], $this->validate_model));

            $model->url = $request->url;
            $model->icon = $request->icon;
            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->status = $request->status;
            $model->order = $request->order;
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

    public function delete(Contact $model)
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
            $model = Contact::select(['id', DB::raw('nama as text')])
                ->whereRaw("(`nama` like '%$request->search%' or `id` like '%$request->search%')")
                ->limit(10);

            $result = $model->get()->toArray();
            if ($request->with_empty && $request->search) {
                $result = array_merge([['id' => $request->search, 'text' => $request->search . ' (Buat Contact Baru)']], $result);
            }

            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
