<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Keanggotaan\Anggota;
use App\Models\User;
use App\Models\WhatsApp;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class WhatsappBrodcastController extends Controller
{
    private $validate_model = [
        'nama' => ['required', 'string', 'max:255'],
        'template' => ['required', 'string'],
    ];

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return WhatsApp::datatable($request);
        }
        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.setting.wa');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new WhatsApp();
            $model->nama = $request->nama;
            $model->template = $request->template;
            $model->save();

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
            $model = WhatsApp::findOrFail($request->id);
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));

            $model->nama = $request->nama;
            $model->template = $request->template;
            $model->save();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(WhatsApp $model): mixed
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

    public function delete_bulk(Request $request): mixed
    {
        try {
            foreach ($request->ids as $id) {
                $return = $this->delete(WhatsApp::find($id));
                if ($return->getStatusCode() != 200) {
                    return response()->json($return->original, $return->getStatusCode());
                }
            }
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
        $model = WhatsApp::findOrFail($request->id);
        return response()->json($model);
    }

    public function send(User $anggota, Request $request)
    {
        $ln = urlencode("\\n");

        $page_attr = adminBreadcumb(h_prefix(min: 2), isChild: true, title: 'Kirim Whtasapp');
        $page_attr['navigation'] = h_prefix(min: 2);

        $view = path_view('pages.admin.setting.wa_send');
        $templates = WhatsApp::orderBy('nama')->get();
        $anggota->user;
        $data = compact('page_attr', 'view', 'templates', 'anggota');
        $data['compact'] = $data;
        return view($view, $data);
    }
}
