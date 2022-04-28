<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Pagination;
use App\Http\Controllers\Controller;
use App\Models\Artikel\Artikel;
use App\Models\Artikel\Kategori;
use App\Models\Artikel\KategoriArtikel;
use App\Models\Artikel\Tag;
use App\Models\Artikel\TagArtikel;
use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\Periode;
use App\Models\Pengurus\PeriodeMember;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
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

    // home render
    public function periode(Periode $model, Request $request = null)
    {
        $request = $request ? $request : request();
        $page_attr = [
            'loader' => false,
            'periode_id' => $model->id,
            'navigation' => 'home',
        ];

        $periode = $model;
        $anggota = $this->getPengurusList($model->id);

        // frontend
        $fe = new \App\Helpers\Frontend\Template\Master($model->id);
        $list_sosmed = $fe->getSosmed();


        // Popular Posts ==========================================================================
        // buat column baru di artikel view counter
        // query by view counter
        // sementara buat dari post teratas terlebih dahulu wkwk
        // ========================================================================================

        // tag and kategori
        $tags = $this->getTagsList();
        $categories = $this->getKategoriList();

        // artikel
        $params = $this->getParams($request);
        $getArtikel = $this->getArtikel($request, 6, $params);
        $articles = $getArtikel->model->data;
        $pagination = $getArtikel->pagination;

        // artikel popular
        $top_article = $this->topArticle(3);

        // selected
        $tag_selected = $request->tag ?
            Tag::select(['nama', 'slug'])->where('slug', '=', $request->tag)->first() : null;
        $kategori_selected = $request->kategori ?
            Kategori::select(['nama', 'slug'])->where('slug', '=', $request->kategori)->first() : null;

        $image_folder_user = User::image_folder;
        $image_default_user = User::image_default;

        return view('frontend.home', compact(
            'page_attr',
            'periode',
            'anggota',
            'list_sosmed',
            'tags',
            'categories',
            'articles',
            'pagination',
            'top_article',
            'tag_selected',
            'kategori_selected',
            'image_folder_user',
            'image_default_user',
        ));
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

    private function getTagsList(?int $limit = 6): ?Collection
    {
        $a = Tag::tableName;
        $a = TagArtikel::tableName;
        $artikel = <<<SQL
            (select count(*) from $a
            where $a.tag_id = artikel_tag.id)
        SQL;
        $artikel_alias = 'artikel';

        $model = Tag::select([
            DB::raw("concat('#',nama) as nama"),
            'slug',
            DB::raw("$artikel as $artikel_alias"),
        ])->where('status', '=', 1)
            ->orderBy($artikel_alias, 'desc')
            ->limit($limit)
            ->get();
        return $model;
    }

    private function getKategoriList(?int $limit = 6): ?Collection
    {
        $a = Kategori::tableName;
        $a = KategoriArtikel::tableName;
        $artikel = <<<SQL
            (select count(*) from $a
            where $a.kategori_id = artikel_kategori.id)
        SQL;
        $artikel_alias = 'artikel';

        $model = Kategori::select([
            'nama',
            'slug',
            DB::raw("$artikel as $artikel_alias"),
        ])->where('status', '=', 1)
            ->orderBy($artikel_alias, 'desc')
            ->limit($limit)
            ->get();
        return $model;
    }

    private function getParams(Request $request): string
    {
        $filters = (object)[
            'search' => $request->search,
            'tag' => $request->tag,
            'kategori' => $request->kategori,
        ];

        // filter to url
        $params = "";
        foreach ($filters as $key => $filter) {
            $params .= $params ? ($filter ? "&" : '') : '';
            $params .= $filter ? "$key=$filter" : '';
        }

        return $params;
    }

    private function getArtikel(Request $request, int $paginate = 6, ?string $params = null): object
    {
        $a = Artikel::tableName;
        $b = User::tableName;

        // filter table
        $c = Kategori::tableName;
        $d = KategoriArtikel::tableName;
        $e = Tag::tableName;
        $f = TagArtikel::tableName;

        // query
        $search_kategori = $request->kategori ? "and $c.slug = '$request->kategori'" : '';
        $kategori = <<<SQL
            (
                select $c.nama from $c join $d on $d.kategori_id = $c.id where $d.artikel_id = $a.id $search_kategori order by $d.id limit 1
            ) as kategori
        SQL;

        $kategori_slug = <<<SQL
            (
                select $c.slug from $c join $d on $d.kategori_id = $c.id where $d.artikel_id = $a.id $search_kategori order by $d.id limit 1
            ) as kategori_slug
        SQL;

        $search_tag = $request->tag ? "and $e.slug = '$request->tag'" : '';
        $tag = <<<SQL
            (
                select $e.nama from $e join $f on $f.tag_id = $e.id where $f.artikel_id = $a.id $search_tag order by $f.id limit 1
            ) as tag
        SQL;

        $tag_slug = <<<SQL
            (
                select $e.slug from $e join $f on $f.tag_id = $e.id where $f.artikel_id = $a.id $search_tag order by $f.id limit 1
            ) as tag_slug
        SQL;

        $model = Artikel::select([
            "$a.slug",
            "$a.excerpt",
            "$a.nama",
            "$a.foto",
            "$a.detail",
            "$a.date",
            "$a.user_id",

            // user
            DB::raw("$b.name as user"),
            DB::raw("$b.username as user_username"),
            DB::raw("$b.foto as user_foto"),

            // slug and categori
            DB::raw($kategori),
            DB::raw($kategori_slug),
            DB::raw($tag),
            DB::raw($tag_slug),
        ])
            ->leftJoin($b, "$b.id", '=', "$a.user_id")
            ->orderBy('date', 'desc');

        // filter
        $kategori = '';
        if ($request->kategori) {
            $kategori = <<<SQL
                and  (
                    select count(*) from $c join $d on $d.kategori_id = $c.id where $d.artikel_id = $a.id and $c.slug = '$request->kategori'
                ) > 0
            SQL;
        }

        $tag = '';
        if ($request->tag) {
            $tag = <<<SQL
                and (
                    select count(*) from $e join $f on $f.tag_id = $e.id where $f.artikel_id = $a.id and $e.slug = '$request->tag'
                ) > 0
            SQL;
        }

        // less than date now
        $date_now = date('Y-m-d');
        $date_less_than = <<<SQL
                and (
                    $a.date <= '$date_now'
                )
            SQL;
        $where = <<<SQL
            (
                ($a.status = 1)
                $date_less_than
                $kategori
                $tag
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

    private function topArticle(int $limit = 6): ?Collection
    {
        $model = Artikel::select(['slug', 'foto', 'date', 'detail', 'nama'])
            ->where('status', '=', 1)
            ->orderBy('counter', 'desc')
            ->limit($limit)
            ->get();

        return $model;
    }
}
