<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Pendaftaran::datatable($request);
        }
        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.pendaftaran');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function delete(Pendaftaran $model): mixed
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

    public function set_status(Pendaftaran $model, Request $request): mixed
    {
        try {
            $model->status = strtoupper($request->status ?? '');
            $model->save();
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
        $get = Pendaftaran::findOrFail($request->id);
        $get->tanggal_lahir = $get->dateFormat();
        $get->tanggal = $get->dateFormat(attr: 'created_at', format: 'd F Y H:i:s');
        $get->updated = $get->dateFormat(attr: 'updated_at', format: 'd F Y H:i:s');
        return $get;
    }

    public function select2(Request $request)
    {
        try {
            $model = Pendaftaran::distinct()->select('status')
                ->whereRaw("( `status` like '%$request->search%')")
                ->orderBy('status')
                ->limit(10);
            $result = $model->get();

            $results = [];
            if ($request->all) {
                $results[] = ['id' => '', 'text' => 'Semua'];
            }

            foreach ($result ?? [] as $r) {
                if ($r->status != null) {
                    $results[] = ['id' => $r->status, 'text' => $r->status];
                }
            }

            if ($request->new && $request->search !== null) {
                // hapus lagi yang di result sebelumnya
                $results2 = [];
                foreach ($results as $r) {
                    if (strtoupper($r['id']) != strtoupper($request->search)) {
                        $results2[] = $r;
                    }
                }

                $results2[] = ['id' => $request->search, 'text' => $request->search];
                $results = $results2;
            }

            return response()->json(['results' => $results]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
