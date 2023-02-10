<?php

namespace App\Models;

use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Address\Regencie;
use App\Models\Address\Village;
use App\Models\Keanggotaan\Anggota;
use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\JabatanMember;
use App\Models\Pengurus\Periode;
use App\Models\Pengurus\PeriodeMember;
use App\Models\Profile\Pendidikan;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable, HasRoles;

    const tableName = 'users';
    const image_default = 'assets/image/anggota_default.png';
    const image_folder = '/assets/pengurus/profile';
    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [
        'id',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function fotoUrl()
    {
        $foto = $this->attributes['foto'];
        return $foto ? url(self::image_folder . '/' . $foto) : asset('assets/image/anggota_default.png');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function regencie()
    {
        return $this->belongsTo(Regencie::class, 'regency_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class, 'user_id', 'id');
    }


    // list anggota
    public static function getListAnggota(Request $request)
    {
        $model = [];
        $paginate = is_numeric($request->limit) ? $request->limit : 12;

        // table
        $a = self::tableName;
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
        if ($request->category == 'pendidikan') $pendidikan_search = " and ($f.instansi like '%$request->search%')";

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

        $model = self::where('active', '=', 1)
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
