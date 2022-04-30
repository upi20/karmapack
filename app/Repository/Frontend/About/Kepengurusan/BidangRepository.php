<?php

namespace App\Repository\Frontend\About\Kepengurusan;

use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\JabatanMember;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BidangRepository
{
    public static function member_list($jabatan_id)
    {
        $turunan = self::getChildJabatan($jabatan_id);
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

        return (object)$turunan_result;
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
