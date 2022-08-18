<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Utility\HariBesarNasional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;
use Yajra\Datatables\Datatables;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Address\Regencie;
use App\Models\Address\Village;
use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\JabatanMember;
use App\Models\Pengurus\Periode;
use App\Models\Pengurus\PeriodeMember;
use App\Models\Profile\Pendidikan;

class AnggotaController extends Controller
{
    private $query = [];

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable($request)['data_table'];
        }

        $page_attr = [
            'title' => 'Anggota',
            'breadcrumbs' => [
                ['name' => 'Laporan'],
            ]
        ];

        $data = compact('page_attr');
        $data['compact'] = $data;
        return view('admin.laporan.anggota', $data);
    }



    public function datatable(Request $request): mixed
    {
        // table
        $table = User::tableName;
        $f = Pendidikan::tableName;
        $g = PeriodeMember::tableName;
        $h = Periode::tableName;
        $i = JabatanMember::tableName;
        $j = Jabatan::tableName;

        // join
        $b = Province::tableName;
        $c = Regencie::tableName;
        $d = District::tableName;
        $e = Village::tableName;


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


        // if search
        $pendidikan_search = '';
        $search = isset($request->search['value']) ? $request->search['value'] : '';
        $pendidikan = $request->pendidikan ?? '';

        if ($request->search) $pendidikan_search = " and ($f.instansi like '%$search%')";
        if ($request->pendidikan) $pendidikan_search = " and ($f.instansi like '%$pendidikan%')";

        // select
        $pendidikan_query_search = <<<SQL
            (select instansi from $f where $f.user_id = $table.id $pendidikan_search order by dari desc limit 1)
        SQL;

        $pendidikan_query = <<<SQL
            (select instansi from $f where $f.user_id = $table.id order by dari desc limit 1)
        SQL;

        $c_pendidikan_nama = 'pendidikan_nama';
        $this->q_build($c_pendidikan_nama, <<<SQL
            (if($pendidikan_query_search is null, $pendidikan_query, $pendidikan_query_search))
        SQL);

        // get jabatan
        $periode_id = <<<SQL
                (select $g.periode_id from $g join $h on $g.periode_id = $h.id where $g.user_id = $table.id order by $h.dari desc limit 1)
        SQL;

        $jabatan_member_id = <<<SQL
            (select $i.jabatan_id from $i join $j on $i.jabatan_id = $j.id where $i.user_id = $table.id and $j.periode_id = $periode_id limit 1)
        SQL;

        // jabatan
        $c_jabatan_nama = 'jabatan_nama';
        $this->q_build($c_jabatan_nama, <<<SQL
            (select concat(z.nama, if(z.parent_id is null, '',
            concat(' ',( select y.nama from $j as y where y.id = z.parent_id limit 1 ))
            )) from $j as z where z.id=$jabatan_member_id limit 1)
        SQL);

        $c_jabatan_slug = 'jabatan_slug';
        $this->q_build($c_jabatan_slug, <<<SQL
            (select if(x.parent_id is null, x.slug, (
                ( select w.slug from $j as w where w.id = x.parent_id limit 1 )
            ) ) from $j as x where x.id=$jabatan_member_id limit 1)
        SQL);

        $c_periode_nama = 'periode_nama';
        $this->q_build($c_periode_nama, <<<SQL
            (select concat( $h.dari, '-', $h.sampai, ' | ', $h.nama) from $g join $h on $g.periode_id = $h.id where $g.user_id = $table.id order by $h.dari desc limit 1)
        SQL);
        // ========================================================================================================


        // ========================================================================================================
        // select raw as alias
        $sraa = function (string $col): string {
            return $this->query[$col] . ' as ' . $this->query[$col . '_alias'];
        };
        $model_filter = [
            $c_jabatan_nama,
            $c_jabatan_slug,
            $c_periode_nama,
            $c_pendidikan_nama
        ];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = User::select(array_merge([
            DB::raw("$table.*"),
            // address
            DB::raw("$b.name as province"),
            DB::raw("$c.name as regencie"),
            DB::raw("$d.name as district"),
            DB::raw("$e.name as village"),
        ], $to_db_raw))
            ->leftJoin($b, "$b.id", '=', "$table.province_id")
            ->leftJoin($c, "$c.id", '=', "$table.regency_id")
            ->leftJoin($d, "$d.id", '=', "$table.district_id")
            ->leftJoin($e, "$e.id", '=', "$table.village_id");

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
        return ['data_table' => $datatable->make(true), 'model' => $model];
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
