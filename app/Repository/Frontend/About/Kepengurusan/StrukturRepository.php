<?php

namespace App\Repository\Frontend\About\Kepengurusan;


use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\JabatanMember;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StrukturRepository
{
    public static function member_list($periode_id)
    {
        // get periode yang tidak mempunyai child
        // table periode
        $a = Jabatan::tableName;

        // hitung child nya untuk menentukan apakah jabatan tersebut utama atau mempunyai bidang lain
        $count_child = <<<SQL
            (select count(*) from $a as z where z.parent_id = $a.id)
        SQL;

        $parents = Jabatan::select([
            DB::raw("$a.*"),
            DB::raw("$count_child as child"),
        ])->where('periode_id', '=', $periode_id)
            ->where('parent_id', '=', null)
            ->orderBy('no_urut')
            ->get();

        // pisahkan menjadi dua yaitu utama untuk perseorangan dan bidang
        $results = [
            'utama' => [],
            'bidang' => [],
        ];
        foreach ($parents as $parent) {
            if ($parent->child > 0) {
                $turunan = self::getChildJabatan($parent->id);
                $turunan_result = [];
                foreach ($turunan as $value) {
                    if (((int)$value->jml_pengurus) > 1) {
                        $pejabat = self::getAnggotaFromJabatanPeriode($value->id)->get();
                        if ($pejabat) {
                            $turunan_result[] = (object)[
                                'jabatan' => $value,
                                'pejabat' => $pejabat,
                                'list' => true
                            ];
                        }
                    } else {
                        $pejabat = self::getAnggotaFromJabatanPeriode($value->id)->first();
                        if ($pejabat) {
                            $turunan_result[] = (object)[
                                'jabatan' => $value,
                                'pejabat' => $pejabat,
                                'list' => false
                            ];
                        }
                    }
                }
                $results['bidang'][] = (object)[
                    'header' => $parent,
                    'body' => $turunan_result
                ];
            }
            // pengurus inti
            else {
                $pejabat = self::getAnggotaFromJabatanPeriode($parent->id)->first();
                if ($pejabat) {
                    $results['utama'][] = (object)[
                        'jabatan' => $parent,
                        'pejabat' => $pejabat,
                        'list' => false
                    ];
                }
            }
        }

        return (object)$results;
    }

    public static function getChildJabatan($jabatan_id)
    {
        // table
        $a = Jabatan::tableName;
        $b = JabatanMember::tableName;

        $jml_user = <<<SQL
            (select count(*) from $b as z where z.jabatan_id = $a.id)
        SQL;


        // query
        $result = Jabatan::select([
            DB::raw("$a.*"),
            DB::raw("$jml_user as jml_pengurus"),
        ])
            ->where("$a.parent_id", '=', $jabatan_id)
            ->orderBy("$a.no_urut")
            ->get();
        return $result;
    }

    public static function getAnggotaFromJabatanPeriode($jabatan_id)
    {
        // table
        $a = User::tableName;
        $b = JabatanMember::tableName;

        // query
        $result = User::select([
            DB::raw("$a.*")
        ])
            ->join($b, "$b.user_id", '=', "$a.id")
            ->where("$b.jabatan_id", '=', $jabatan_id);

        return $result;
    }
}
