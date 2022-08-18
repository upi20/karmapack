<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Utility\HariBesarNasional;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private $query = [];
    public function index(Request $request)
    {
        $total_anggota = User::count();
        $page_attr = ['title' => 'Dashboard'];

        $data = compact(
            'total_anggota',
            'page_attr',
        );
        $data['compact'] = $data;

        return view('admin.dashboard', $data);
    }

    public function ulang_tahun(Request $request)
    {
        $limit_hari = $request->limit ?? 7;

        $year = (int)date('Y');
        $year_add_one = $year + 1;
        $this->query['countdown'] = <<<SQL
            ( if( DATEDIFF(date(concat('{$year}-', month(date_of_birth), '-', day(date_of_birth))), CURDATE()) < 0,
                DATEDIFF(date(concat('{$year_add_one}-', month(date_of_birth), '-', day(date_of_birth))), CURDATE()) ,
                DATEDIFF(date(concat('{$year}-', month(date_of_birth), '-', day(date_of_birth))), CURDATE()) )
            )
        SQL;
        $this->query['countdown_alias'] = 'countdown';

        $c_tanggal_str = 'tanggal_str';
        $this->q_build($c_tanggal_str, <<<SQL
            (DATE_FORMAT(
                date_of_birth,
                concat('%d %M')
                )
            )
        SQL);

        $result = User::select([
            'id', 'name',
            DB::raw("{$this->query['countdown']} as {$this->query['countdown_alias']}"),
            DB::raw("{$this->query['tanggal_str']} as {$this->query['tanggal_str_alias']}")
        ])
            ->whereRaw("({$this->query['countdown']} <= $limit_hari)")
            ->orderBy($this->query['countdown_alias'])
            ->get();

        return $result;
    }

    public function hbn(Request $request)
    {
        $limit_hari = $request->limit ?? 7;

        // list table
        $table = HariBesarNasional::tableName;
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

        $result = HariBesarNasional::select([
            DB::raw('nama as name'), 'id',
            DB::raw("{$this->query['countdown']} as {$this->query['countdown_alias']}"),
            DB::raw("{$this->query['tanggal_str']} as {$this->query['tanggal_str_alias']}")
        ])
            ->whereRaw("({$this->query['countdown']} <= $limit_hari)")
            ->orderBy($this->query['countdown_alias'])
            ->get();
        return $result;
    }

    // query_builder
    private function q_build($alias, $query)
    {
        $this->query[$alias] = $query;
        $this->query["{$alias}_alias"] = $alias;
        return 1;
    }
}
