<?php

namespace App\Http\Controllers\Admin;

use League\Config\Exception\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Keanggotaan\Anggota;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\KataAlumni;
use App\Models\User;

class KataAlumniController extends Controller
{
    private $validate_model = [
        'sebagai' => ['required', 'string', 'max:255'],
        'deskripsi' => ['required', 'string'],
        'profesi' => ['required', 'string', 'max:255'],
        'status' => ['required', 'int'],
        'user_id' => ['required', 'int'],
    ];

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return KataAlumni::datatable($request);
        }
        $page_attr = adminBreadcumb(h_prefix());

        $view = path_view('pages.admin.kata_alumni');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);
            $model = new KataAlumni();

            $model->sebagai = $request->sebagai;
            $model->deskripsi = $request->deskripsi;
            $model->profesi = $request->profesi;
            $model->status = $request->status;
            $model->user_id = $request->user_id;

            $model->save();

            KataAlumni::clearCache();
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
            $model = KataAlumni::findOrFail($request->id);
            if (!$this->savePermission($model)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));

            $model->sebagai = $request->sebagai;
            $model->deskripsi = $request->deskripsi;
            $model->profesi = $request->profesi;
            $model->status = $request->status;
            $model->user_id = $request->user_id;
            $model->save();

            KataAlumni::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(KataAlumni $model): mixed
    {
        try {
            if (!$this->savePermission($model)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);
            $model->delete();

            KataAlumni::clearCache();
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
        $table = KataAlumni::tableName;
        $t_user = User::tableName;
        $t_anggota = Anggota::tableName;
        return KataAlumni::select([
            DB::raw("$table.*"),
            DB::raw("concat($t_anggota.angkatan,' | ',$t_user.name) as user")
        ])
            ->join("$t_user", "$t_user.id", "=", "$table.user_id")
            ->join("$t_anggota", "$t_user.id", "=", "$t_anggota.user_id")
            ->where("$table.id", '=', $request->id)->first();
    }

    private function savePermission(KataAlumni $model): bool
    {
        // periksa role
        $user = auth()->user();

        if (is_admin()) {
            return true;
        } else {
            if ($user->id == $model->user_id) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function member_select2(Request $request)
    {
        try {
            $model = Anggota::select([DB::raw("user_id as id"), DB::raw("concat(angkatan,' | ',nama) as text")])
                ->whereRaw("(
                    `nama` like '%$request->search%' or
                    `angkatan` like '%$request->search%' or
                    `alamat_lengkap` like '%$request->search%' or
                    `user_id` like '%$request->search%'
                    )")
                ->orderBy('nama')
                ->limit(50);

            $result = $model->get()->toArray();
            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function list(Request $request)
    {
        DB::statement("SET SQL_MODE=''");
        $table = KataAlumni::tableName;
        $t_user = User::tableName;
        $t_anggota = Anggota::tableName;

        $result = KataAlumni::select(["$table.*", DB::raw("concat($t_anggota.angkatan,' | ',$t_user.name) as user")])
            ->where("$table.status", '=', '1')
            ->join($t_user, "$t_user.id", '=', "$table.user_id")
            ->join("$t_anggota", "$t_user.id", "=", "$t_anggota.user_id")
            ->orderBy("$table.sequence")->get();
        return response()->json(['data' => $result]);
    }

    public function list_save(Request $request)
    {
        DB::beginTransaction();
        $sequence = 1;
        foreach ($request->data ?? [] as $v) {
            $menu = KataAlumni::find($v['id']);
            $menu->sequence = $sequence;
            $menu->save();
            $sequence++;
        }
        DB::commit();

        KataAlumni::clearCache();
        return response()->json();
    }
}
