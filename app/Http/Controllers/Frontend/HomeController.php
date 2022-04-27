<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\Periode;
use App\Models\Pengurus\PeriodeMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $periode = Periode::where('status', '=', '1')
            ->first();
        if (!$periode) abort(404);
        return $this->periode($periode, $request);
    }

    public function periode(Periode $model, Request $request = null)
    {
        $page_attr = [
            'loader' => false,
            'periode_id' => $model->id,
            'navigation' => 'home',
        ];

        $periode = $model;
        $anggota = $this->getPengurusList($model->id);

        // frontend
        $fe = new \App\Helpers\Frontend\Template\Master($model->id);
        $sosmed = $fe->getSosmed();

        return view('frontend.home', compact('page_attr', 'periode', 'anggota', 'sosmed'));
    }

    public function bidang(Jabatan $model)
    {
        $page_attr = [
            'loader' => false, 'navigation' => "bidang/$model->slug",
            'periode_id' => $model->periode_id,
        ];
        // $periode = Periode::find($model->periode_id)->first();
        // if (!$periode) abort(404);
        // $anggota = $this->getPengurusList($model->periode_id);

        // return view('frontend.home', compact('page_attr', 'periode', 'anggota'));
    }

    private function getPengurusList($periode_id)
    {
        if (!$periode_id) return [];
        // cek apakah pengurus utama
        $pengurus_utama =  <<<SQL
            (if(( select parent_id from pengurus_periode_jabatan ppj
                join pengurus_periode_jabatan_member ppjm
                    on ppj.id = ppjm.jabatan_id
                where ppj.periode_id = $periode_id and ppjm.user_id = a.user_id
                limit 1 )is null, 1, 0))
        SQL;

        $singkatan =  <<<SQL
                ( select (select singkatan from pengurus_periode_jabatan ppj1 where id = ppj.parent_id) from pengurus_periode_jabatan ppj
                join pengurus_periode_jabatan_member ppjm
                    on ppj.id = ppjm.jabatan_id
                where ppj.periode_id = $periode_id and ppjm.user_id = a.user_id
                limit 1 )
        SQL;

        $parent =  <<<SQL
                ( select (select nama from pengurus_periode_jabatan ppj1 where id = ppj.parent_id) from pengurus_periode_jabatan ppj
                join pengurus_periode_jabatan_member ppjm
                    on ppj.id = ppjm.jabatan_id
                where ppj.periode_id = $periode_id and ppjm.user_id = a.user_id
                limit 1 )
        SQL;

        $parent_slug =  <<<SQL
                ( select (select slug from pengurus_periode_jabatan ppj1 where id = ppj.parent_id) from pengurus_periode_jabatan ppj
                join pengurus_periode_jabatan_member ppjm
                    on ppj.id = ppjm.jabatan_id
                where ppj.periode_id = $periode_id and ppjm.user_id = a.user_id
                limit 1 )
        SQL;

        $jabatan = <<<SQL
                ( select nama from pengurus_periode_jabatan ppj
                join pengurus_periode_jabatan_member ppjm
                    on ppj.id = ppjm.jabatan_id
                where ppj.periode_id = $periode_id and ppjm.user_id = a.user_id
                limit 1 )
        SQL;

        $order_parent = <<<SQL
            ( select if(ppj_2.no_urut is null, 0, (
                    select no_urut from pengurus_periode_jabatan ppj_2_1 where ppj_2_1.id = ppj_2.parent_id
                )) from pengurus_periode_jabatan ppj_2
                join pengurus_periode_jabatan_member ppjm_2
                    on ppj_2.id = ppjm_2.jabatan_id
                where ppj_2.periode_id = $periode_id and ppjm_2.user_id = a.user_id
                limit 1 )
        SQL;

        $order_child = <<<SQL
            (select no_urut from pengurus_periode_jabatan ppj_1
                join pengurus_periode_jabatan_member ppjm_1
                    on ppj_1.id = ppjm_1.jabatan_id
                where ppj_1.periode_id = $periode_id and ppjm_1.user_id = a.user_id
                limit 1  )
        SQL;

        $table = PeriodeMember::tableName;
        $query = DB::table("$table as a")
            ->select([
                'b.id', 'b.name', 'b.username', 'b.foto', 'b.angkatan',
                DB::raw("$jabatan as jabatan"),
                DB::raw("$pengurus_utama as utama"),
                DB::raw("$singkatan as singkatan"),
                DB::raw("$parent as parent"),
                DB::raw("$parent_slug as parent_slug"),
            ])
            ->join("users as b", 'a.user_id', '=', 'b.id')
            ->where('a.periode_id', '=', $periode_id)
            ->orderByRaw($order_parent)
            ->orderByRaw($order_child)
            ->get();

        $query->map(function ($item) {
            $image_folder = User::image_folder;
            $item->foto = $item->foto ? url("$image_folder/$item->foto") : asset('assets/image/anggota_default.png');
            return $item;
        });

        return $query;
    }
}
