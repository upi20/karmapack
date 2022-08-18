<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Summernote;
use App\Http\Controllers\Controller;
use App\Models\KataAlumni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;

class KataAlumniController extends Controller
{
    private $validate_model = [
        'sebagai' => ['required', 'string', 'max:255'],
        'deskripsi' => ['required', 'string'],
        'profesi' => ['required', 'string', 'max:255'],
        'status' => ['required', 'int'],
        'user_id' => ['required', 'int'],
    ];

    private $query = [];

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable($request);
        }
        $page_attr = [
            'title' => 'Kata Alumni',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ]
        ];
        return view('admin.kata_alumni', compact('page_attr'));
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
        return KataAlumni::select([
            DB::raw("$table.*"),
            DB::raw("concat($t_user.angkatan,' | ',$t_user.name) as user")
        ])->join("$t_user", "$t_user.id", "=", "$table.user_id")
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

    public function datatable(Request $request): mixed
    {
        // list table
        $t_user = User::tableName;
        $table = KataAlumni::tableName;

        // cusotm query
        // ========================================================================================================
        // creted at and updated at
        $date_format_fun = function (string $select, string $format, string $alias) use ($table): array {
            $str = <<<SQL
                (DATE_FORMAT($table.$select, '$format'))
            SQL;
            return [$alias => $str, ($alias . '_alias') => $alias];
        };

        $c_created = 'created';
        $c_created_str = 'created_str';
        $c_updated = 'updated';
        $c_updated_str = 'updated_str';
        $this->query = array_merge($this->query, $date_format_fun('created_at', '%d-%b-%Y', $c_created));
        $this->query = array_merge($this->query, $date_format_fun('created_at', '%W, %d %M %Y %H:%i:%s', $c_created_str));
        $this->query = array_merge($this->query, $date_format_fun('updated_at', '%d-%b-%Y', $c_updated));
        $this->query = array_merge($this->query, $date_format_fun('updated_at', '%W, %d %M %Y %H:%i:%s', $c_updated_str));


        // status
        $c_status_str = 'status_str';
        $this->query[$c_status_str] = <<<SQL
                (if($table.status = 0, 'Disimpan', if($table.status = 2, 'Ditutup', 'Di Pusbish')))
        SQL;

        $this->query["{$c_status_str}_alias"] = $c_status_str;

        // user
        $c_user = 'user';
        $this->query[$c_user] = "$t_user.name";
        $this->query["{$c_user}_alias"] = $c_user;
        // ========================================================================================================


        // ========================================================================================================
        // select raw as alias
        $sraa = function (string $col): string {
            return $this->query[$col] . ' as ' . $this->query[$col . '_alias'];
        };
        $model_filter = [
            $c_created,
            $c_created_str,
            $c_updated,
            $c_updated_str,
            $c_status_str,
            $c_user
        ];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = KataAlumni::select(array_merge([
            DB::raw("$table.*"),
        ], $to_db_raw))
            ->leftJoin($t_user, "$t_user.id", '=', "$table.user_id");

        // Filter =====================================================================================================
        // filter check
        $f_c = function (string $param) use ($request): mixed {
            $filter = $request->filter;
            return isset($filter[$param]) ? $filter[$param] : false;
        };

        // filter custom
        $filters = ['status'];
        foreach ($filters as  $f) {
            if ($f_c($f) !== false) {
                $model->whereRaw("$table.$f='{$f_c($f)}'");
            }
        }
        // ========================================================================================================


        // ========================================================================================================
        $datatable = Datatables::of($model)->addIndexColumn();
        foreach ($model_filter as $v) {
            // custom pencarian
            $datatable->filterColumn($this->query["{$v}_alias"], function ($query, $keyword) use ($v) {
                $query->whereRaw("({$this->query[$v]} like '%$keyword%')");
            });
        }

        // create datatable
        return $datatable->make(true);
    }

    public function member_select2(Request $request)
    {
        try {
            $model = User::select(['id', DB::raw("concat(angkatan,' | ',name) as text")])
                ->whereRaw("(
                    `name` like '%$request->search%' or
                    `angkatan` like '%$request->search%' or
                    `email` like '%$request->search%' or
                    `id` like '%$request->search%'
                    )")
                ->limit(10);

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

        $result = KataAlumni::select(["$table.*", DB::raw("concat($t_user.angkatan,' | ',$t_user.name) as user")])
            ->where("$table.status", '=', '1')->join($t_user, "$t_user.id", '=', "$table.user_id")->orderBy("$table.sequence")->get();
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
        return response()->json();
    }
}
