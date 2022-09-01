<?php

namespace App\Models\Artikel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Artikel\Kategori;
use App\Models\Artikel\KategoriArtikel;
use App\Models\Artikel\Tag;
use App\Models\Artikel\TagArtikel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Artikel extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'artikel';
    const tableName = 'artikel';
    const image_folder = '/assets/artikel';

    public static function topArticle(int $limit = 6)
    {
        $model = self::select(['slug', 'foto', 'date', 'detail', 'nama'])
            ->where('status', '=', 1)
            ->orderBy('counter', 'desc')
            ->limit($limit)
            ->get();

        return $model;
    }

    public static function getList(Request $request): object
    {
        $paginate = is_numeric($request->limit) ? $request->limit : 9;
        $a = self::tableName;
        $b = User::tableName;

        // filter table
        $c = Kategori::tableName;
        $d = KategoriArtikel::tableName;
        $e = Tag::tableName;
        $f = TagArtikel::tableName;

        // query
        $search_kategori = $request->kategori ? "and $c.slug = '$request->kategori'" : '';
        $kategori = <<<SQL
            ( select $c.nama from $c join $d on $d.kategori_id = $c.id where $d.artikel_id = $a.id $search_kategori order by $d.id limit 1 ) as kategori
        SQL;

        $kategori_slug = <<<SQL
            (select $c.slug from $c join $d on $d.kategori_id = $c.id where $d.artikel_id = $a.id $search_kategori order by $d.id limit 1) as kategori_slug
        SQL;

        $search_tag = $request->tag ? "and $e.slug = '$request->tag'" : '';
        $tag = <<<SQL
            (select $e.nama from $e join $f on $f.tag_id = $e.id where $f.artikel_id = $a.id $search_tag order by $f.id limit 1) as tag
        SQL;

        $tag_slug = <<<SQL
            (select $e.slug from $e join $f on $f.tag_id = $e.id where $f.artikel_id = $a.id $search_tag order by $f.id limit 1) as tag_slug
        SQL;

        $date_full = <<<SQL
            date_format($a.date , '%d %M %Y') as date_full
        SQL;

        $day = <<<SQL
            date_format($a.date , '%W') as `day`
        SQL;

        $date_str = <<<SQL
            date_format($a.date , '%d') as date_str
        SQL;

        $month_str = <<<SQL
            date_format($a.date , '%M') as month_str
        SQL;

        $month = <<<SQL
            date_format($a.date , '%m') as `month`
        SQL;

        $year = <<<SQL
            date_format($a.date , '%Y') as `year`
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
            DB::raw($date_full),
            DB::raw($day),
            DB::raw($date_str),
            DB::raw($month_str),
            DB::raw($month),
            DB::raw($year),
        ])
            ->leftJoin($b, "$b.id", '=', "$a.user_id")
            ->orderBy('date', 'desc');

        // filter
        $kategori = '';
        if ($request->kategori) {
            $kategori = <<<SQL
                and  ( select count(*) from $c join $d on $d.kategori_id = $c.id where $d.artikel_id = $a.id and $c.slug = '$request->kategori' ) > 0
            SQL;
        }

        $tag = '';
        if ($request->tag) {
            $tag = <<<SQL
                and ( select count(*) from $e join $f on $f.tag_id = $e.id where $f.artikel_id = $a.id and $e.slug = '$request->tag' ) > 0
            SQL;
        }

        // less than date now
        $date_now = date('Y-m-d');
        $date_less_than = <<<SQL
                and ( $a.date <= '$date_now' )
            SQL;
        $where = <<<SQL
            ( ($a.status = 1)
                $date_less_than
                $kategori
                $tag )
        SQL;

        $model->whereRaw($where);

        // model->item get access
        return $model->paginate($paginate)
            ->appends(request()->query());
    }
}
