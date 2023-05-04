<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\KataAlumni;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class KataAlumniController extends Controller
{
    public function index(Request $request)
    {
        $get = KataAlumni::where('user_id', '=', auth()->user()->id)->first();
        $data['sebagai'] = is_null($get) ? '' : $get->sebagai;
        $data['profesi'] = is_null($get) ? '' : $get->profesi;
        $data['deskripsi'] = is_null($get) ? '' : $get->deskripsi;
        $data['status'] = is_null($get) ? null : $get->status;
        $data['status_str'] = is_null($get) ? 'Belum Dibuat' : ($get->status == 0 ? "Disimpan" : ($get->status == 1 ? "Di Publish" : "Tidak Diketahui"));
        $data['status_bg'] = is_null($get) ? 'warning' : ($get->status == 0 ? "primary" : ($get->status == 1 ? "success" : "danger"));
        $data = (object)$data;
        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.member.kata_alumni');
        $data = compact('page_attr', 'data', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function save(Request $request): mixed
    {
        try {
            $model = KataAlumni::where('user_id', '=', auth()->user()->id)->first();
            if (is_null($model)) {
                $model = new KataAlumni();
                $status = 0;
            } else {
                $status = $model->status;
            }
            $model->sebagai = $request->sebagai;
            $model->deskripsi = $request->deskripsi;
            $model->profesi = $request->profesi;
            $model->status = $status;
            $model->user_id = auth()->user()->id;
            $model->save();
            $data = $model->toArray();
            $data['status_str'] = is_null($model) ? 'Belum Dibuat' : ($model->status == 0 ? "Disimpan" : ($model->status == 1 ? "Di Publish" : "Tidak Diketahui"));
            $data['status_bg'] = is_null($model) ? 'warning' : ($model->status == 0 ? "primary" : ($model->status == 1 ? "success" : "danger"));

            KataAlumni::clearCache();
            return response()->json($data);
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function reset(Request $request): mixed
    {
        try {
            $model = KataAlumni::where('user_id', '=', auth()->user()->id)->first();
            $model->delete();
            KataAlumni::clearCache();
            return response()->json(['status' => null, 'status_str' => 'Belum Dibuat', 'status_bg' => 'warning']);
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
}
