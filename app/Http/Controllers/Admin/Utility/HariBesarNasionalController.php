<?php

namespace App\Http\Controllers\Admin\Utility;

use App\Http\Controllers\Controller;
use App\Models\Utility\HariBesarNasional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;

class HariBesarNasionalController extends Controller
{
    private $validate_model = [
        'nama' => ['required', 'string', 'max:255'],
        'keterangan' => ['nullable', 'string'],
        'tahun' => ['nullable', 'int'],
        'hari' => ['required', 'int', 'max:31'],
        'bulan' => ['required', 'int', 'max:12'],
        'type' => ['required', 'int', 'max:9'],
    ];

    private $query = [];

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable($request);
        }

        $page_attr = [
            'title' => 'Hari Besar Nasional',
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'url' => 'admin.dashboard'],
                ['name' => 'Peralatan'],
            ]
        ];
        $view = path_view('pages.admin.utility.hari_besar_nasional');
        $data = compact('page_attr', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new HariBesarNasional();
            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->tahun = $request->tahun;
            $model->hari = $request->hari;
            $model->bulan = $request->bulan;
            $model->type = $request->type;

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
            $model = HariBesarNasional::findOrFail($request->id);
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));

            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->tahun = $request->tahun;
            $model->hari = $request->hari;
            $model->bulan = $request->bulan;
            $model->type = $request->type;
            $model->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(HariBesarNasional $model): mixed
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
        return HariBesarNasional::findOrFail($request->id);
    }

    public function datatable(Request $request): mixed
    {
        // list table
        $table = HariBesarNasional::tableName;

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

        // tanggal
        $tanggal = <<<SQL
                date( concat( (if($table.`type` = 1, year(now()), $table.tahun)), '-',
                        $table.bulan,'-',
                        $table.hari ) )
        SQL;
        $c_tanggal = 'tanggal';
        $this->q_build($c_tanggal, $tanggal);

        // countdown
        $c_countdown = 'countdown';
        $this->q_build($c_countdown, <<<SQL
            (
                ifnull(if(DATEDIFF($tanggal, CURDATE()) < 0,
                    DATEDIFF(ADDDATE($tanggal, INTERVAL 1 YEAR), CURDATE()),
                    DATEDIFF($tanggal, CURDATE())
                ), 999)
            )
        SQL);

        $c_tanggal_str = 'tanggal_str';
        $this->q_build($c_tanggal_str, <<<SQL
            (DATE_FORMAT(
                $tanggal,
                concat('%d %M', (if($table.`type` = 0, ' %Y', '')))
                )
            )
        SQL);

        $c_type_str = 'type_str';
        $this->q_build($c_type_str, <<<SQL
            (if($table.`type` = 1, 'Tetap', if($table.`type` = 0, 'Tidak Tetap', 'Tidak Diketahui')))
        SQL);
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
            $c_tanggal_str,
            $c_tanggal,
            $c_type_str,
            $c_countdown
        ];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = HariBesarNasional::select(array_merge([
            DB::raw("$table.*"),
        ], $to_db_raw));
        // Filter =====================================================================================================
        // filter check
        $f_c = function (string $param) use ($request): mixed {
            $filter = $request->filter;
            return isset($filter[$param]) ? $filter[$param] : false;
        };

        // filter custom
        $filters = ['type'];
        foreach ($filters as  $f) {
            if ($f_c($f) !== false) {
                $model->whereRaw("$table.$f='{$f_c($f)}'");
            }
        }

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

    public function list_error(Request $request): mixed
    {
        $list = HariBesarNasional::select([DB::raw("id,nama")])->whereRaw("(type = 0) and (tahun <> year(now()) or tahun is null)")->get();
        return response()->json($list);
    }

    // query_builder
    private function q_build($alias, $query)
    {
        $this->query[$alias] = $query;
        $this->query["{$alias}_alias"] = $alias;
        return 1;
    }
}
