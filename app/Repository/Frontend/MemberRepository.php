<?php

namespace App\Repository\Frontend;

use App\Helpers\Pagination;
use App\Http\Controllers\Controller;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Address\Regencie;
use App\Models\Address\Village;
use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\JabatanMember;
use App\Models\Pengurus\Periode;
use App\Models\Pengurus\PeriodeMember;
use App\Models\Profile\Pendidikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;
use App\Helpers\Summernote;
use App\Models\Profile\Hobby;
use App\Models\Profile\Kontak;
use App\Models\Profile\KontakTipe;
use App\Models\Profile\PendidikanJenis;
use App\Models\Profile\PengalamanLain;
use App\Models\Profile\PengalamanOrganisasi;

class MemberRepository
{
    // rencana ====================================================================================
    // search by hoby belum bisa
    // search yang lebih advance
    // pagination di perbaiki
    // jabatan terakhir
    // menurut periode
    // menurut jabatan
    // rencana ====================================================================================
    public static function getList(Request $request, int $paginate = 6, ?string $params = null): object
    {   // paginate setup
        $model = [];
        $paginate = 10;

        // table
        $a = User::tableName;
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

        // if search
        $pendidikan_search = '';
        if ($request->search) $pendidikan_search = " and ($f.instansi like '%$request->search%')";
        if ($request->pendidikan) $pendidikan_search = " and ($f.instansi like '%$request->pendidikan%')";

        // select
        $pendidikan_query_search = <<<SQL
            (select instansi from $f where $f.user_id = $a.id $pendidikan_search order by dari desc limit 1)
        SQL;

        $pendidikan_query = <<<SQL
            (select instansi from $f where $f.user_id = $a.id order by dari desc limit 1)
        SQL;

        $pendidikan_nama = <<<SQL
            if($pendidikan_query_search is null, $pendidikan_query, $pendidikan_query_search)
        SQL;

        // get jabatan
        $periode_id = <<<SQL
            (select $g.periode_id from $g join $h on $g.periode_id = $h.id where $g.user_id = $a.id order by $h.dari desc limit 1)
        SQL;

        // periode slug
        $periode_slug = <<<SQL
            (select $h.slug from $g join $h on $g.periode_id = $h.id where $g.user_id = $a.id order by $h.dari desc limit 1)
        SQL;

        // periode nama
        $periode_nama = <<<SQL
            (select concat( $h.dari, '-', $h.sampai, ' | ', $h.nama) from $g join $h on $g.periode_id = $h.id where $g.user_id = $a.id order by $h.dari desc limit 1)
        SQL;

        $jabatan_member_id = <<<SQL
            (select $i.jabatan_id from $i join $j on $i.jabatan_id = $j.id where $i.user_id = $a.id and $j.periode_id = $periode_id limit 1)
        SQL;

        // jabatan
        $jabatan_nama = <<<SQL
            (select concat(z.nama, if(z.parent_id is null, '',
            concat(' -> ',( select y.nama from $j as y where y.id = z.parent_id limit 1 ))
            )) from $j as z where z.id=$jabatan_member_id limit 1)
        SQL;

        $jabatan_slug = <<<SQL
            (select if(x.parent_id is null, x.slug, (
                ( select w.slug from $j as w where w.id = x.parent_id limit 1 )
            ) ) from $j as x where x.id=$jabatan_member_id limit 1)
        SQL;
        // end get jabatan

        $model = User::where('active', '=', 1)
            ->select([
                // basic
                "$a.id",
                "$a.angkatan",
                "$a.name",
                "$a.username",
                "$a.province_id",
                "$a.foto",
                "$a.whatsapp",
                "$a.telepon",

                // address
                DB::raw("$b.name as province"),
                "$a.regency_id",
                DB::raw("$c.name as regencie"),
                "$a.district_id",
                DB::raw("$d.name as district"),
                "$a.village_id",
                DB::raw("$e.name as village"),
                "$a.alamat_lengkap",

                // pendidikan
                DB::raw("$pendidikan_nama as pendidikan"),

                // periode
                DB::raw("$jabatan_nama as jabatan_nama"),
                DB::raw("$jabatan_slug as jabatan_slug"),
                DB::raw("$periode_slug as periode_slug"),
                DB::raw("$periode_nama as periode_nama"),
            ])
            ->leftJoin($b, "$b.id", '=', "$a.province_id")
            ->leftJoin($c, "$c.id", '=', "$a.regency_id")
            ->leftJoin($d, "$d.id", '=', "$a.district_id")
            ->leftJoin($e, "$e.id", '=', "$a.village_id")
            ->orderBy("$a.angkatan", 'desc')
            ->orderBy("$a.name");

        // search
        $search = '';
        if ($request->search) {
            $search = <<<SQL
            and (
                $a.name like '%$request->search%' or
                $a.alamat_lengkap like '%$request->search%' or
                $a.angkatan like '%$request->search%' or
                $a.email like '%$request->search%' or
                $a.angkatan like '%$request->search%' or
                $a.whatsapp like '%$request->search%' or
                $a.telepon like '%$request->search%' or
                $a.gender like '%$request->search%' or

                $a.province_id like '%$request->search%' or
                $a.regency_id like '%$request->search%' or
                $a.district_id like '%$request->search%' or
                $a.village_id like '%$request->search%' or

                $jabatan_nama like '%$request->search%' or
                $periode_nama like '%$request->search%' or

                $b.name like '%$request->search%' or
                $c.name like '%$request->search%' or
                $d.name like '%$request->search%' or
                $e.name like '%$request->search%' or
                ((select instansi from $f where ($f.user_id = $a.id) and ($f.instansi like '%$request->search%') limit 1) like '%$request->search%')
            )
            SQL;
        }

        $pendidikan = '';
        if ($request->pendidikan) {
            $pendidikan = <<<SQL
            and (
                (select count(*) from $f where ($f.user_id = $a.id) and ($f.instansi like '%$request->pendidikan%')) > 0
            )
            SQL;
        }

        $where = <<<SQL
            ( (active = 1)
            $search
            $pendidikan
            )
            SQL;


        $model->whereRaw($where);

        // model->item get access
        $model = $model->paginate($paginate);
        $model = json_encode($model);
        $model = json_Decode($model);

        // pagination
        $pagination = Pagination::generate($model, $params);

        // return
        return (object)[
            'model' => $model,
            'pagination' => $pagination,
        ];
    }

    // anggota detail =================================================================================================
    public static function getRiwayatKepengurusan(int $user_id): array
    {
        $a = JabatanMember::tableName;
        $b = Jabatan::tableName;
        $c = Periode::tableName;
        $dari = <<<SQL
            select dari from $c where $c.id = $b.periode_id limit 1
        SQL;

        $sampai = <<<SQL
            select sampai from $c where $c.id = $b.periode_id limit 1
        SQL;

        $sub_bdang = <<<SQL
            if($b.parent_id is null, '', concat(' -> ',(
                select nama from $b as z where $b.parent_id = z.id limit 1
            )))
        SQL;

        $user = JabatanMember::select([
            DB::raw("concat(($dari), '-', ($sampai), ' | ',$b.nama, $sub_bdang) as jabatan")
        ])->where('user_id', '=', $user_id)
            ->join($b, "$a.jabatan_id", '=', "$b.id")
            ->orderBy('jabatan', 'desc')
            ->get();
        return $user->toArray() ?? [];
    }

    public static function getRiwayatKepengurusanFE(int $user_id): mixed
    {
        $a = JabatanMember::tableName;
        $b = Jabatan::tableName;
        $c = Periode::tableName;
        $periode_nama = <<<SQL
            select nama from $c where $c.id = $b.periode_id limit 1
        SQL;

        $periode_slug = <<<SQL
            select slug from $c where $c.id = $b.periode_id limit 1
        SQL;

        $dari = <<<SQL
            select dari from $c where $c.id = $b.periode_id limit 1
        SQL;

        $sampai = <<<SQL
            select sampai from $c where $c.id = $b.periode_id limit 1
        SQL;

        $sub_bdang = <<<SQL
            if($b.parent_id is null, '', (
                select nama from $b as z where $b.parent_id = z.id limit 1
            ))
        SQL;

        $slug_bdang = <<<SQL
            if($b.parent_id is null, '', (
                select slug from $b as z where $b.parent_id = z.id limit 1
            ))
        SQL;

        $user = JabatanMember::select([
            DB::raw("($periode_nama) as periode"),
            DB::raw("($periode_slug) as periode_slug"),
            DB::raw("($dari) as dari"),
            DB::raw("($sampai) as sampai"),
            DB::raw("$b.nama as jabatan"),
            DB::raw("($sub_bdang) as bidang"),
            DB::raw("($slug_bdang) as slug_bidang"),
        ])->where('user_id', '=', $user_id)
            ->join($b, "$a.jabatan_id", '=', "$b.id")
            ->orderBy('dari', 'desc')
            ->get();
        return $user;
    }

    public static function getUser(int $id): mixed
    {
        $a = User::tableName;
        $b = Province::tableName;
        $c = Regencie::tableName;
        $d = District::tableName;
        $e = Village::tableName;

        return User::selectRaw("$a.*,
        $b.name as province,
        $c.name as regencie,
        $d.name as district,
        $e.name as village
        ")
            ->leftJoin($b, "$b.id", '=', "$a.province_id")
            ->leftJoin($c, "$c.id", '=', "$a.regency_id")
            ->leftJoin($d, "$d.id", '=', "$a.district_id")
            ->leftJoin($e, "$e.id", '=', "$a.village_id")
            ->where("$a.id", '=', $id)->first();
    }

    public static function getListKontak(?int $user_id): mixed
    {
        if (!$user_id) return [];
        $a = Kontak::tableName;
        $b = KontakTipe::tableName;
        $kontak = Kontak::select([
            DB::raw("$a.id"),
            DB::raw("$a.value"),
            DB::raw("$b.id as kontak_id"),
            DB::raw("$b.nama as kontak"),
            DB::raw("$b.icon as icon"),
        ])
            ->where("$a.user_id", '=', $user_id)
            ->join($b, "$a.kontak_tipe_id", '=', "$b.id")
            ->get();

        return $kontak;
    }

    public static function getListPendidikan(?int $user_id): mixed
    {
        if (!$user_id) return [];
        $a = Pendidikan::tableName;
        $b = PendidikanJenis::tableName;
        $kontak = Pendidikan::select([
            DB::raw("$a.id"),
            DB::raw("$a.instansi"),
            DB::raw("$a.dari"),
            DB::raw("$a.sampai"),
            DB::raw("$a.jurusan"),
            DB::raw("$a.keterangan"),

            DB::raw("$b.id as pendidikan_id"),
            DB::raw("$b.nama as pendidikan"),
        ])
            ->where("$a.user_id", '=', $user_id)
            ->join($b, "$a.pendidikan_jenis_id", '=', "$b.id")
            ->orderBy("$a.dari", 'desc')
            ->get();

        return $kontak;
    }

    public static function getListPengalamanOrganisasi(?int $user_id): mixed
    {
        if (!$user_id) return [];
        $kontak = PengalamanOrganisasi::select([
            'id',
            'nama',
            'dari',
            'sampai',
            'jabatan',
            'keterangan',
        ])
            ->where("user_id", '=', $user_id)
            ->orderBy("dari", 'desc')
            ->get();

        return $kontak;
    }

    public static function getListPengalamanLain(?int $user_id): mixed
    {
        if (!$user_id) return [];
        $kontak = PengalamanLain::select([
            'id',
            'pengalaman',
            'keterangan',
        ])
            ->where("user_id", '=', $user_id)
            ->orderBy("created_at", 'desc')
            ->get();

        return $kontak;
    }
}
