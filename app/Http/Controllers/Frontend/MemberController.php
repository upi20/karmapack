<?php

namespace App\Http\Controllers\Frontend;

use App\Repository\Frontend\MemberRepository;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Address\Regencie;
use App\Models\Address\Village;
use App\Models\Pengurus\Jabatan;
use App\Models\Profile\Hobby;
use App\Models\Profile\KontakTipe;
use App\Models\Profile\PendidikanJenis;
use App\Models\User;
use App\Models\Pengurus\JabatanMember;
use App\Models\Pengurus\Periode;
use App\Models\Pengurus\PeriodeMember;
use App\Models\Profile\Pendidikan;
use Illuminate\Support\Facades\DB;
use App\Models\Profile\Kontak;
use App\Models\Profile\PengalamanLain;
use App\Models\Profile\PengalamanOrganisasi;

class MemberController extends Controller
{
    private $image_folder = User::image_folder;
    public function index(Request $request)
    {

        $page_attr = [
            'title' => 'List Anggota'
        ];

        // filter attribut
        $image = (object)[
            'folder' => User::image_folder,
            'default' => User::image_default
        ];

        // artikel
        $filters = (object)[
            'search' => $request->search,
            'prov' => $request->prov,
            'kab' => $request->kab,
            'kec' => $request->kec,
            'des' => $request->des,
            'pendidikan' => $request->pendidikan,
        ];

        // filter to url
        $params = "";
        foreach ($filters as $key => $filter) {
            $params .= $params ? ($filter ? "&" : '') : '';
            $params .= $filter ? "$key=$filter" : '';
        }

        $users = $this->getList($request);
        $attr = json_decode(json_encode($users));
        return view('frontend.member.list', compact('page_attr', 'users', 'image', 'params', 'filters', 'attr'));
    }

    public function member(User $model)
    {
        // address
        $province = $model->province_id ? Province::select(['id', 'name'])->where('id', '=', $model->province_id)->first() : null;
        $regencie = $model->regency_id ? Regencie::select(['id', 'name'])->where('id', '=', $model->regency_id)->first() : null;
        $district = $model->district_id ? District::select(['id', 'name'])->where('id', '=', $model->district_id)->first() : null;
        $village = $model->village_id ? Village::select(['id', 'name'])->where('id', '=', $model->village_id)->first() : null;

        $profile_folder = User::image_folder;
        $image = $model->foto ? asset("$profile_folder/$model->foto") : null;
        $description = $model->alamat_lengkap
            . ($village ? (', ' . $village->name) : '')
            . ($district ? (', ' . $district->name) : '')
            . ($regencie ? (', ' . $regencie->name) : '')
            . ($province ? (', ' . $province->name) : '');

        $page_attr = [
            'title' => $model->name,
            'navigation' => 'anggota',
            'description' => $description,
            'image' => $image,
        ];
        $image_folder = $this->image_folder;

        // side information
        $contacts = MemberRepository::getListKontak($model->id);
        $kepengurusan = MemberRepository::getRiwayatKepengurusanFE($model->id);
        $pendidikan = MemberRepository::getListPendidikan($model->id);
        $pengalaman_organisasi = MemberRepository::getListPengalamanOrganisasi($model->id);
        $pengalaman_lain = MemberRepository::getListPengalamanLain($model->id);
        $hobbies = Hobby::where('user_id', '=', $model->id)->select(['name'])->get();

        return view('frontend.member.detail', compact(
            'page_attr',
            'model',
            'image_folder',
            'province',
            'regencie',
            'district',
            'village',

            'contacts',
            'kepengurusan',
            'pendidikan',
            'pengalaman_organisasi',
            'pengalaman_lain',
            'hobbies',
        ));
    }


    private function getList(Request $request)
    {
        $model = [];
        $paginate = 12;

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
        return $model->paginate($paginate)
            ->appends(request()->query());
    }
}
