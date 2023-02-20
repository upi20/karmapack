<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Address\District;
use App\Models\Address\Village;
use App\Models\Profile\Pendidikan;
use App\Models\Profile\PendidikanJenis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $anggota_by_angkatan = $this->anggota_by_angkatan();
        $anggota_by_address = $this->anggota_by_address();
        $anggota_by_jk = $this->anggota_by_jk();
        $anggota_by_riwayat_pendidikan = $this->anggota_by_riwayat_pendidikan();

        $total_anggota = User::count();
        $page_attr = ['title' => 'Dashboard'];
        return view('member.dashborard', compact(
            'total_anggota',
            'page_attr',
            'anggota_by_angkatan',
            'anggota_by_address',
            'anggota_by_jk',
            'anggota_by_riwayat_pendidikan',
        ));
    }

    private function anggota_by_angkatan()
    {
        $table = User::tableName;
        $value = "SELECT count(*) from $table as u2 where u2.angkatan = $table.angkatan";
        return User::select([DB::raw("($value) as value"), DB::raw("angkatan as title")])
            ->orderBy('title')
            ->groupBy("$table.angkatan")->get()->map(function ($v) {
                return (object)['title' => $v['title'], 'value' => $v['value']];
            })->toArray();
    }

    private function anggota_by_address()
    {
        DB::statement("SET SQL_MODE=''");
        $table = User::tableName;
        $t_kec = District::tableName;
        $t_des = Village::tableName;
        $value = "SELECT count(*) from $table as u2 where u2.district_id = $table.district_id";
        $kecamatan = User::select([DB::raw("($value) as value"), DB::raw("$t_kec.name as title")])
            ->join("$t_kec", "$t_kec.id", '=', "$table.district_id")
            ->orderBy('title')
            ->groupBy("$table.district_id")->orderBy("$t_kec.name")->get()->map(function ($v) {
                return (object)['title' => $v['title'], 'value' => $v['value']];
            })->toArray();

        $value = "SELECT count(*) from $table as u2 where u2.village_id = $table.village_id";
        $desa = User::select([DB::raw("($value) as value"), DB::raw("$t_des.name as title")])
            ->join("$t_des", "$t_des.id", '=', "$table.village_id")
            ->orderBy('value', 'desc')
            ->groupBy("$table.village_id")->orderBy("$t_des.name")->get()->map(function ($v) {
                return (object)['title' => $v['title'], 'value' => $v['value']];
            })->toArray();

        return (object) [
            'kecamatan' => array_merge($kecamatan ?? [], $this->user_column_null('district_id', 'Belum Tercatat')),
            'desa' => array_merge($desa ?? [], $this->user_column_null('village_id', 'Belum Tercatat')),
        ];
    }

    private function anggota_by_jk()
    {
        $table = User::tableName;
        $value = "SELECT count(*) from $table as u2 where u2.gender = $table.gender";
        $jk = User::select([DB::raw("($value) as value"), DB::raw("gender as title")])
            ->where('gender', '<>', null)
            ->orderBy('value', 'desc')
            ->groupBy("$table.gender")->get()->map(function ($v) {
                return (object)['title' => $v['title'], 'value' => ucfirst($v['value'])];
            })->toArray();

        return array_merge($jk ?? [], $this->user_column_null('gender', 'Belum Tercatat'));
    }

    private function user_column_null($column, $as)
    {
        return User::select([DB::raw("count(*) as value"), DB::raw("'$as' as title")])
            ->where($column, '=', null)
            ->orderBy('value', 'desc')
            ->get()->map(function ($v) {
                return (object)['title' => $v['title'], 'value' => ucfirst($v['value'])];
            })->toArray() ?? [];
    }


    private function anggota_by_riwayat_pendidikan()
    {
        $jenis = PendidikanJenis::select(['id', 'nama'])->where('status', '=', '1')->get();
        $pend = [];
        foreach ($jenis as $v) {
            $table = Pendidikan::tableName;
            $value = "SELECT count(*) from $table as f2 where f2.instansi = $table.instansi and f2.pendidikan_jenis_id";

            $data = Pendidikan::select([DB::raw("($value) as value"), DB::raw("instansi as title")])
                ->where("$table.pendidikan_jenis_id", '=', $v->id)
                ->orderBy('value', 'desc')
                ->groupBy("$table.instansi")->get()->map(function ($v) {
                    return (object)['title' => $v['title'], 'value' => $v['value']];
                })->toArray();

            $pend[] = [
                'nama' => $v->nama,
                'data' => $data
            ];
        }

        return $pend;
    }
}
