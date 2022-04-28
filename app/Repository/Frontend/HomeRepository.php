<?php

namespace App\Repository\Frontend;

use App\Helpers\Pagination;
use App\Models\Artikel\Artikel;
use App\Models\Artikel\Kategori;
use App\Models\Artikel\KategoriArtikel;
use App\Models\Artikel\Tag;
use App\Models\Artikel\TagArtikel;
use App\Models\Pengurus\PeriodeMember;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeRepository
{
    public static function getPengurusList($periode_id)
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

    public static function getTagsList(?int $limit = 6): ?Collection
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

    public static function getKategoriList(?int $limit = 6): ?Collection
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

    public static function getParams(Request $request): string
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

    public static function getArtikel(Request $request, int $paginate = 6, ?string $params = null): object
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

    public static function topArticle(int $limit = 6): ?Collection
    {
        $model = Artikel::select(['slug', 'foto', 'date', 'detail', 'nama'])
            ->where('status', '=', 1)
            ->orderBy('counter', 'desc')
            ->limit($limit)
            ->get();

        return $model;
    }

    public static function artikelTagKeyword(?int $artikel_id): ?string
    {
        $a = TagArtikel::tableName;
        $b = Tag::tableName;
        $result = TagArtikel::selectRaw("GROUP_CONCAT($b.nama) as text")
            ->where("$a.artikel_id", '=', $artikel_id)->join($b, "$b.id", '=', "$a.tag_id")
            ->first();
        return $result ? $result->text : '';
    }

    public static function artikelKategoriKeyword(?int $artikel_id): ?string
    {
        $a = KategoriArtikel::tableName;
        $b = Kategori::tableName;
        $result = KategoriArtikel::selectRaw("GROUP_CONCAT($b.nama) as text")
            ->where("$a.artikel_id", '=', $artikel_id)->join($b, "$b.id", '=', "$a.kategori_id")
            ->first();
        return $result ? $result->text : '';
    }

    public static function artikelTag(?int $artikel_id): mixed
    {
        $a = TagArtikel::tableName;
        $b = Tag::tableName;
        $result = TagArtikel::selectRaw("$b.nama, $b.slug")
            ->where("$a.artikel_id", '=', $artikel_id)->join($b, "$b.id", '=', "$a.tag_id")
            ->get();
        return $result;
    }

    public static function artikelKategori(?int $artikel_id): mixed
    {
        $a = KategoriArtikel::tableName;
        $b = Kategori::tableName;
        $result = KategoriArtikel::selectRaw("$b.nama, $b.slug")
            ->where("$a.artikel_id", '=', $artikel_id)->join($b, "$b.id", '=', "$a.kategori_id")
            ->get();
        return $result;
    }

    public static function checkActiveArtikelOrTag($model, string $slug): bool
    {
        if ($model) {
            foreach ($model as $v) {
                if ($v->slug == $slug) return true;
            }
            return false;
        } else return false;
    }
}
