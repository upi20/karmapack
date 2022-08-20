<?php

namespace App\Http\Controllers\Admin\Pendaftaran;

use App\Helpers\Summernote;
use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Pendaftaran\GForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;
use PhpParser\Node\Expr\AssignOp\Mod;
use Yajra\Datatables\Datatables;

class GFormController extends Controller
{
    private $validate_model = [
        'nama' => ['required', 'string', 'max:255'],
        'link' => ['required', 'string', 'max:255'],
        'deskripsi' => ['required', 'string'],
        'no_urut' => ['required', 'int'],
        'dari' => ['required'],
        'sampai' => ['required'],
        'status' => ['required', 'int'],
        'tampilkan' => ['required', 'int'],
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    private $image_folder = GForm::image_folder;

    private $query = [];

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable($request);
        }
        $image_folder = $this->image_folder;
        $page_attr = [
            'title' => 'Google Form',
            'breadcrumbs' => [
                ['name' => 'Pendaftaran'],
            ]
        ];
        return view('admin.pendaftaran.gform', compact('page_attr', 'image_folder'));
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate(array_merge([
                'slug' => ['required', 'string', 'max:255', ('unique:' . GForm::tableName . ',slug')],
            ], $this->validate_model));

            $model = new GForm();
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);
            }

            $model->foto = $foto;
            $model->user_id = auth()->user()->id;
            $model->nama = $request->nama;
            $model->slug = $request->slug;
            $model->deskripsi = $request->deskripsi;
            $model->no_urut = $request->no_urut;
            $model->dari = $request->dari;
            $model->sampai = $request->sampai;
            $model->link = $request->link;
            $model->tampilkan = $request->tampilkan;
            $model->status = $request->status;
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
            $model = GForm::findOrFail($request->id);
            if (!$this->savePermission($model)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);
            $request->validate(array_merge(['id' => [
                'required', 'int',
                'slug' => ['required', 'string', 'max:255', ('unique:' . GForm::tableName . ',slug,' . $request->id)],
            ]], $this->validate_model));

            // foto handle
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);

                // delete foto
                if ($model->foto) {
                    $path = public_path("$this->image_folder/$model->foto");
                    Summernote::deleteFile($path);
                }
                // save foto
                $model->foto = $foto;
            }

            $model->nama = $request->nama;
            $model->slug = $request->slug;
            $model->deskripsi = $request->deskripsi;
            $model->no_urut = $request->no_urut;
            $model->dari = $request->dari;
            $model->sampai = $request->sampai;
            $model->link = $request->link;
            $model->tampilkan = $request->tampilkan;
            $model->status = $request->status;
            $model->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(GForm $model): mixed
    {
        try {
            if (!$this->savePermission($model)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);
            $model->delete();
            // delete foto
            if ($model->foto) {
                $path = public_path("$this->image_folder/$model->foto");
                Summernote::deleteFile($path);
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
        return GForm::findOrFail($request->id);
    }

    private function savePermission(GForm $model): bool
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
        $table = GForm::tableName;
        $base_url_image_folder = url(str_replace('./', '', $this->image_folder)) . '/';

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

        // foto
        $c_foto_link = 'foto_link';
        $this->query[$c_foto_link] = <<<SQL
                (concat('$base_url_image_folder',$table.foto))
        SQL;
        $this->query["{$c_foto_link}_alias"] = $c_foto_link;

        // status
        $c_status_str = 'status_str';
        $this->query[$c_status_str] = <<<SQL
                (if($table.status = 0, 'Tidak Aktif', if($table.status = 1, 'Aktif', if($table.status = 2, 'Ditutup', 'Tidak Diketahui'))))
        SQL;
        $this->query["{$c_status_str}_alias"] = $c_status_str;

        // tampilkan
        $c_tampilkan_str = 'tampilkan_str';
        $this->query[$c_tampilkan_str] = <<<SQL
                (if($table.tampilkan = 0, 'Tidak', if($table.tampilkan = 1, 'Iya', 'Tidak Diketahui')))
        SQL;
        $this->query["{$c_tampilkan_str}_alias"] = $c_tampilkan_str;

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
            $c_foto_link,
            $c_created,
            $c_created_str,
            $c_updated,
            $c_updated_str,
            $c_status_str,
            $c_tampilkan_str,
            $c_user
        ];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = GForm::select(array_merge([
            DB::raw("$table.*"),
        ], $to_db_raw))
            ->leftJoin($t_user, "$t_user.id", '=', "$table.user_id");

        // Filter =====================================================================================================
        // filter check
        $f_c = function (string $param) use ($request): mixed {
            $filter = $request->filter;
            return isset($filter[$param]) ? $filter[$param] : false;
        };


        // filter ini menurut data model filter
        // $f = [$c_user];
        // // loop filter
        // foreach ($f as $v) {
        //     if ($f_c($v)) {
        //         $model->whereRaw("{$this->query[$v]}='{$f_c($v)}'");
        //     }
        // }

        // filter custom
        $filters = ['user_id', 'status', 'tampilkan'];
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
            return response()->json(['results' => array_merge([['id' => '', 'text' => 'Semua']], $result)]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function frontend_detail(GForm $model)
    {
        if ($model->status == 0) return abort(404);
        $folder = GForm::image_folder;
        $user = User::find($model->user_id);

        $image = is_null($model->foto) ? Pendaftaran::image_default : url("$folder/$model->foto");
        $page_attr = [
            'title' => $model->nama,
            'url' => url(h_prefix_uri()),
            'description' => $model->deskripsi,
            'author' => $user->name,
            'image' => $image,
        ];

        if ($model->tampilkan == 1) {
            $page_attr['navigation'] = 'pendaftaran';
        }

        $link = str_contains($model->link, '?') ? ($model->link . '&') : ($model->link . '?');
        $link = $link . 'embedded=true';
        return view('frontend.pendaftaran.gform', compact('page_attr', 'model', 'link'));
    }
}
