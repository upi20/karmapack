<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact\ListContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;

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

    private $query = [];
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable($request);
        }
        $page_attr = [
            'title' => 'List Kontak',
            'breadcrumbs' => [
                ['name' => 'Kontak'],
            ]
        ];
        $setting = (object)[
            'title' => settings()->get('setting.contact.list.title'),
            'sub_title' => settings()->get('setting.contact.list.sub_title'),
        ];

        $data = compact('page_attr', 'setting');
        $data['compact'] = $data;
        return view('admin.kontak.list', $data);
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

    public function datatable(Request $request): mixed
    {
        // list table
        $table = ListContact::tableName;

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
                (if($table.status = 0, 'Tidak Digunakan', if($table.status = 1, 'Digunakan', 'Tidak Diketahui')))
        SQL;
        $this->query["{$c_status_str}_alias"] = $c_status_str;
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
        ];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = ListContact::select(array_merge([
            DB::raw("$table.*"),
        ], $to_db_raw));

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
    public function setting(Request $request)
    {
        settings()->set('setting.contact.list.title', $request->title)->save();
        settings()->set('setting.contact.list.sub_title', $request->sub_title)->save();
        return response()->json();
    }
}
