<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact\ListContact;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class ListContactController extends Controller
{

    private $validate_model = [
        'nama' => ['required', 'string', 'max:255'],
        'icon' => ['required', 'string', 'max:255'],
        'url' => ['nullable', 'string', 'max:255'],
        'order' => ['nullable', 'int'],
        'keterangan' => ['nullable', 'string'],
        'status' => ['required', 'int'],
    ];

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return ListContact::datatable($request);
        }
        $page_attr = adminBreadcumb(h_prefix());

        $setting = (object)[
            'title' => setting_get('setting.contact.list.title'),
            'sub_title' => setting_get('setting.contact.list.sub_title'),
        ];

        $view = path_view('pages.admin.kontak.list');
        $data = compact('page_attr', 'setting', 'view');
        $data['compact'] = $data;

        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new ListContact();
            $model->nama = $request->nama;
            $model->icon = $request->icon;
            $model->url = $request->url;
            $model->order = $request->order;
            $model->keterangan = $request->keterangan;
            $model->status = $request->status;
            $model->save();

            ListContact::feClearCache();

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
            $model = ListContact::findOrFail($request->id);
            $model->nama = $request->nama;
            $model->icon = $request->icon;
            $model->url = $request->url;
            $model->order = $request->order;
            $model->keterangan = $request->keterangan;
            $model->status = $request->status;
            $model->save();

            ListContact::feClearCache();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(ListContact $model): mixed
    {
        try {
            $model->delete();

            ListContact::feClearCache();

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
        return ListContact::findOrFail($request->id);
    }

    public function setting(Request $request)
    {
        setting_set('setting.contact.list.title', $request->title);
        setting_set('setting.contact.list.sub_title', $request->sub_title);
        return response()->json();
    }
}
