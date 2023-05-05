<?php

namespace App\Models\Keanggotaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Address\Regencie;
use App\Models\Address\Village;
use App\Models\Kepengurusan\Anggota as KepengurusanAnggota;
use App\Models\Kepengurusan\Jabatan;
use App\Models\Kepengurusan\Periode;
use Yajra\Datatables\Datatables;

class Anggota extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'nomor_anggota',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'angkatan',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'alamat_lengkap',
        'bio',
        'profesi',
        'foto',
        'telepon',
        'whatsapp',
        'status',
        'user_id',
    ];

    protected $primaryKey = 'id';
    protected $table = 'anggotas';
    const tableName = 'anggotas';
    const image_default = 'assets/anggota/anggota_default.png';
    const image_folder = '/assets/anggota';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function hobis()
    {
        return $this->hasMany(Hobi::class, 'anggota_id', 'id');
    }

    public function kontaks()
    {
        return $this->hasMany(Kontak::class, 'anggota_id', 'id');
    }

    public function pendidikans()
    {
        return $this->hasMany(Pendidikan::class, 'anggota_id', 'id');
    }

    public function pengalamanLains()
    {
        return $this->hasMany(PengalamanLain::class, 'anggota_id', 'id');
    }

    public function pengalamanOrganisasis()
    {
        return $this->hasMany(PengalamanOrganisasi::class, 'anggota_id', 'id');
    }

    public function fotoUrl()
    {
        $foto = $this->attributes['foto'];
        return $foto ? url(self::image_folder . '/' . $foto) : asset(self::image_default);
    }

    public function fotoUrlDefault()
    {
        return url(self::image_default);
    }

    public function fotoFolder()
    {
        return self::image_folder;
    }

    public function anggotaKepengurusans()
    {
        return $this->hasMany(KepengurusanAnggota::class, 'anggota_id', 'id');
    }

    public function profileKepengurusans()
    {
        // Output:
        // 2022-2023 | Anggota -> Komunikasi dan Informasi
        // 2021-2022 | Anggota -> Komunikasi dan Informasi

        $table = KepengurusanAnggota::tableName;
        $t_jabatan = Jabatan::tableName;
        $t_periode = Periode::tableName;
        $id = $this->attributes['id'];

        $ifHaveParent = "if($t_jabatan.parent_id is null, '', concat(' -> ', (select j2.nama from $t_jabatan j2 where j2.id = $t_jabatan.parent_id limit 1)))";
        $selectRaw = "concat($t_periode.dari, '-',$t_periode.sampai, ' | ', $t_jabatan.nama, $ifHaveParent) as text";
        $gets = KepengurusanAnggota::selectRaw($selectRaw)
            ->join($t_jabatan, "$t_jabatan.id", "=", "$table.jabatan_id")
            ->join($t_periode, "$t_periode.id", "=", "$t_jabatan.periode_id")
            ->where("$table.anggota_id", $id)->orderBy("$t_periode.dari", 'desc')
            ->get();

        $results = [];
        foreach ($gets ?? [] as $get) {
            $results[] = $get->text;
        }

        return $results;
    }

    public function frontendDetailKepengurusans()
    {
        // Output:
        // 2023 - 2022 | Anggota -> Komunikasi dan Informasi | Kabinet Sabilulungan
        // 2022 - 2021 | Anggota -> Komunikasi dan Informasi | Kabinet Masagi

        $table = KepengurusanAnggota::tableName;
        $t_jabatan = Jabatan::tableName;
        $t_periode = Periode::tableName;
        $id = $this->attributes['id'];

        $ifHaveParent = "if($t_jabatan.parent_id is null, '', (select j2.nama from $t_jabatan j2 where j2.id = $t_jabatan.parent_id limit 1))";
        $ifHaveParentSlug = "if($t_jabatan.parent_id is null, $t_jabatan.slug, (select j3.slug from $t_jabatan j3 where j3.id = $t_jabatan.parent_id limit 1))";
        // $selectRaw = "concat($t_periode.dari, '-',$t_periode.sampai, ' | ', $t_jabatan.nama, $ifHaveParent) as text";
        $selectRaw = "$t_periode.dari, $t_periode.sampai, $ifHaveParentSlug as slug_bidang,
        $t_jabatan.nama as jabatan, $ifHaveParent as bidang, $t_periode.slug as periode_slug,
        $t_periode.nama as periode ";
        $gets = KepengurusanAnggota::selectRaw($selectRaw)
            ->join($t_jabatan, "$t_jabatan.id", "=", "$table.jabatan_id")
            ->join($t_periode, "$t_periode.id", "=", "$t_jabatan.periode_id")
            ->where("$table.anggota_id", $id)->orderBy("$t_periode.dari", 'desc')
            ->get();

        return $gets;
    }

    // address
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function regencie()
    {
        return $this->belongsTo(Regencie::class, 'regency_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }

    public static function frontendListAnggota(Request $request)
    {
        $paginate = is_numeric($request->limit) ? $request->limit : 12;

        $table = self::tableName;
        $t_user = User::tableName;
        $t_prov = Province::tableName;
        $t_kab = Regencie::tableName;
        $t_kec = District::tableName;
        $t_desa = Village::tableName;
        $t_pendidikan = Pendidikan::tableName;
        $t_jabatan = Jabatan::tableName;
        $t_periode = Periode::tableName;
        $t_jab_per = KepengurusanAnggota::tableName;

        // Select custome ===============================================================
        // pendidikan //
        $pendidikan_query_search = <<<SQL
            (select $t_pendidikan.instansi from $t_pendidikan where $t_pendidikan.anggota_id = $table.id and ($t_pendidikan.instansi like '%$request->search%') order by $t_pendidikan.dari desc limit 1)
        SQL;

        $pendidikan_query = <<<SQL
            (select $t_pendidikan.instansi from $t_pendidikan where $t_pendidikan.anggota_id = $table.id order by $t_pendidikan.dari desc limit 1)
        SQL;

        $pendidikan_nama = <<<SQL
            if($pendidikan_query_search is null, $pendidikan_query, $pendidikan_query_search)
        SQL;
        // pendidikan //


        // periode //
        $periode_nama = <<<SQL
            (select concat($t_periode.dari, '-',$t_periode.sampai, ' | ',$t_periode.nama)
            from $t_jabatan
            join $t_jab_per on $t_jab_per.jabatan_id = $t_jabatan.id
            join $t_periode on $t_jabatan.periode_id = $t_periode.id
            where $t_jab_per.anggota_id = $table.id
            order by $t_periode.dari desc
            limit 1)
        SQL;

        $periode_slug = <<<SQL
            (select $t_periode.slug from $t_jabatan
            join $t_jab_per on $t_jab_per.jabatan_id = $t_jabatan.id
            join $t_periode on $t_jabatan.periode_id = $t_periode.id
            where $t_jab_per.anggota_id = $table.id
            order by $t_periode.dari desc
            limit 1)
        SQL;

        $periode_id = <<<SQL
            (select $t_periode.id from $t_jabatan
            join $t_jab_per on $t_jab_per.jabatan_id = $t_jabatan.id
            join $t_periode on $t_jabatan.periode_id = $t_periode.id
            where $t_jab_per.anggota_id = $table.id
            order by $t_periode.dari desc
            limit 1)
        SQL;

        // periode //

        // jabatan //
        $jabatan_nama = <<<SQL
            (select if(j2.parent_id is null, j2.nama, concat(j2.nama, ' -> ',(
                select j3.nama from $t_jabatan j3 where j3.id = j2.parent_id limit 1
            ))) from $t_jabatan as j2
            join $t_jab_per on $t_jab_per.jabatan_id = j2.id
            join $t_periode on j2.periode_id = $t_periode.id
            where $t_jab_per.anggota_id = $table.id and j2.periode_id = $periode_id
            limit 1)
        SQL;

        $jabatan_slug = <<<SQL
            (select if(j2.parent_id is null, '', (
                select j3.slug from $t_jabatan j3 where j3.id = j2.parent_id limit 1
            )) from $t_jabatan as j2
            join $t_jab_per on $t_jab_per.jabatan_id = j2.id
            join $t_periode on j2.periode_id = $t_periode.id
            where $t_jab_per.anggota_id = $table.id and j2.periode_id = $periode_id
            limit 1)
        SQL;

        // jabatan //

        // foto //
        $foto_default = url(self::image_default);
        $base_url = url(self::image_folder);
        $foto = <<<SQL
            if($table.foto is null, '$foto_default', concat('$base_url/',$table.foto))
        SQL;
        // foto //


        // Select custome ===============================================================
        // catatan:
        // foto belum diatur

        $anggota = self::select([
            // basic
            "$table.id",
            "$table.angkatan",
            "$table.nama",
            "$table.whatsapp",
            "$table.telepon",
            "$t_user.username",
            "$table.alamat_lengkap",

            // lain
            DB::raw("$foto as foto"),
            DB::raw("$pendidikan_nama as pendidikan"),
            DB::raw("$periode_nama as periode_nama"),
            DB::raw("$periode_slug as periode_slug"),
            DB::raw("$periode_id as periode_id"),
            DB::raw("$jabatan_nama as jabatan_nama"),
            DB::raw("$jabatan_slug as jabatan_slug"),

            // address
            DB::raw("$t_prov.name as province"),
            DB::raw("$t_kab.name as regencie"),
            DB::raw("$t_kec.name as district"),
            DB::raw("$t_desa.name as village"),
        ])
            ->join($t_user, "$t_user.id", "=", "$table.user_id")
            ->leftJoin($t_prov, "$t_prov.id", '=', "$table.province_id")
            ->leftJoin($t_kab, "$t_kab.id", '=', "$table.regency_id")
            ->leftJoin($t_kec, "$t_kec.id", '=', "$table.district_id")
            ->leftJoin($t_desa, "$t_desa.id", '=', "$table.village_id")
            ->orderBy("$table.nama");

        $search = '';
        if ($request->search) {
            $search = <<<SQL
                and (
                    $table.angkatan like '%$request->search%' or
                    $table.nama like '%$request->search%' or
                    $table.whatsapp like '%$request->search%' or
                    $table.telepon like '%$request->search%' or
                    $t_user.username like '%$request->search%' or
                    $table.alamat_lengkap like '%$request->search%' or

                    $t_prov.name like '%$request->search%' or
                    $t_kab.name like '%$request->search%' or
                    $t_kec.name like '%$request->search%' or
                    $t_desa.name like '%$request->search%' or

                    $pendidikan_nama like '%$request->search%' or
                    $periode_nama like '%$request->search%' or
                    $periode_slug like '%$request->search%' or
                    $periode_id like '%$request->search%' or
                    $jabatan_nama like '%$request->search%' or
                    $jabatan_slug like '%$request->search%'
                )
                SQL;
        }

        $where = <<<SQL
            (($t_user.active = 1)
            $search
            )
            SQL;
        $anggota->whereRaw($where);
        return $anggota->paginate($paginate)
            ->appends(request()->query());
    }

    public static function datatable(Request $request): mixed
    {
        // import
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');

        // tables name
        $query = [];
        $c_roles = 'roles';
        $t_has_roles = $tableNames['model_has_roles'];
        $t_roles = $tableNames['roles'];
        $t_user = User::tableName;
        $table = static::tableName;

        $base_url_image_folder = url(str_replace('./', '', static::image_folder)) . '/';
        $image_default = asset(self::image_default);

        // cusotm query
        // ========================================================================================================
        // creted at and updated at
        $date_format_fun = function (string $select, string $format, string $alias) use ($table): array {
            $str = <<<SQL
                (DATE_FORMAT($table.$select, '$format'))
            SQL;
            return [$alias => $str, ($alias . '_alias') => $alias];
        };

        $c_created = 'created';
        $c_created_str = 'created_str';
        $c_updated = 'updated';
        $c_updated_str = 'updated_str';
        $query = array_merge($query, $date_format_fun('created_at', '%d-%b-%Y', $c_created));
        $query = array_merge($query, $date_format_fun('created_at', '%W, %d %M %Y %H:%i:%s', $c_created_str));
        $query = array_merge($query, $date_format_fun('updated_at', '%d-%b-%Y', $c_updated));
        $query = array_merge($query, $date_format_fun('updated_at', '%W, %d %M %Y %H:%i:%s', $c_updated_str));

        $year = (int)date('Y');
        $year_add_one = $year + 1;
        $c_ulang_tahun = 'ulang_tahun';
        $query[$c_ulang_tahun] = <<<SQL
            ifnull((if(DATEDIFF(date(concat('{$year}-', month($table.tanggal_lahir), '-', day($table.tanggal_lahir))), CURDATE()) < 0,
                DATEDIFF(date(concat('{$year_add_one}-', month($table.tanggal_lahir), '-', day($table.tanggal_lahir))), CURDATE()) ,
                DATEDIFF(date(concat('{$year}-', month($table.tanggal_lahir), '-', day($table.tanggal_lahir))), CURDATE()) )
            ), 999)
        SQL;
        $query["{$c_ulang_tahun}_alias"] = $c_ulang_tahun;

        // roles
        $c_model_id = $columnNames['model_morph_key'];
        $c_roles = 'roles';
        $query[$c_roles] = <<<SQL
            (SELECT GROUP_CONCAT($t_roles.`name` SEPARATOR ', ') FROM $t_has_roles
            join $t_roles on $t_has_roles.role_id = $t_roles.id
            where $t_has_roles.$c_model_id = $t_user.id)
        SQL;
        $query["{$c_roles}_alias"] = $c_roles;

        // email
        $c_email = 'email';
        $query[$c_email] = "$t_user.email";
        $query["{$c_email}_alias"] = $c_email;

        $c_active = 'active';
        $query[$c_active] = "$t_user.active";
        $query["{$c_active}_alias"] = $c_active;

        // foto_icon
        $c_foto_link = 'foto_link';
        $query[$c_foto_link] = <<<SQL
                (ifnull(concat('$base_url_image_folder',$table.foto),'$image_default'))
        SQL;
        $query["{$c_foto_link}_alias"] = $c_foto_link;

        // ========================================================================================================


        // ========================================================================================================
        // select raw as alias
        $sraa = function (string $col) use ($query): string {
            return $query[$col] . ' as ' . $query[$col . '_alias'];
        };
        $model_filter = [
            $c_created,
            $c_created_str,
            $c_updated,
            $c_updated_str,
            $c_ulang_tahun,
            $c_roles,
            $c_email,
            $c_active,
            $c_foto_link
        ];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = static::select(array_merge([
            DB::raw("$table.*"),
        ], $to_db_raw))
            ->leftJoin($t_user, "$t_user.id", '=', "$table.user_id");

        // Filter =====================================================================================================
        // filter check
        $f_c = function (string $param) use ($request): mixed {
            $filter = $request->filter;
            return isset($filter[$param]) ? $filter[$param] : false;
        };

        // filter ini menurut data model filter
        $f = [$c_active];
        // loop filter
        foreach ($f as $v) {
            if ($f_c($v) !== false) {
                $model->whereRaw("{$query[$v]}='{$f_c($v)}'");
            }
        }

        // filter custom
        $filters = ['angkatan'];
        foreach ($filters as  $f) {
            if ($f_c($f) !== false) {
                $model->whereRaw("$table.$f='{$f_c($f)}'");
            }
        }

        if (isset($request->filter)) {
            $filter = $request->filter;
            if ($filter['role'] != '') {
                $f = $filter['role'];
                $where = <<<SQL
                    ((SELECT count(*) FROM $t_has_roles
                    join $t_roles on $t_has_roles.role_id = $t_roles.id
                    where $t_has_roles.$c_model_id = $t_user.id and $t_roles.`name` = '$f') > 0)
                SQL;
                $model->whereRaw($where);
            }
        }
        // ========================================================================================================


        // ========================================================================================================
        $datatable = Datatables::of($model)->addIndexColumn();

        // search
        // ========================================================================================================
        $query_filter = $query;
        $datatable->filter(function ($query) use ($model_filter, $query_filter, $table) {
            $search = request('search');
            $search = isset($search['value']) ? $search['value'] : null;
            if ((is_null($search) || $search == '') && count($model_filter) > 0) return false;

            // tambah pencarian
            $static = new static();
            $search_add = $static->fillable;
            $search_add = array_map(function ($v) use ($table) {
                return "$table.$v";
            }, $search_add);
            $search_arr = array_merge($model_filter, $search_add);

            // pake or where
            $search_str = "(";
            foreach ($search_arr as $k => $v) {
                $or = (($k + 1) < count($search_arr)) ? 'or' : '';
                $column = isset($query_filter[$v]) ? $query_filter[$v] : $v;
                $search_str .= "$column like '%$search%' $or ";
            }

            $search_str .= ")";
            $query->whereRaw($search_str);
        });

        // create datatable
        return $datatable->make(true);
    }
}
