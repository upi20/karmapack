<?php

namespace App\Models\Kepengurusan;

use App\Models\Keanggotaan\Anggota as KeanggotaanAnggota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class Periode extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'nama',
        'foto',
        'dari',
        'sampai',
        'slug',
        'slogan',
        'visi',
        'misi',
        'filosofi_logo',
        'status',
    ];

    protected $primaryKey = 'id';
    protected $table = 'pengurus_periodes';
    const tableName = 'pengurus_periodes';
    const image_default = 'assets/image/logo_default.png';
    const image_folder = '/assets/periode';
    const homeCacheKey = 'homePengurus';

    public function jabatans()
    {
        return $this->hasMany(Jabatan::class, 'periode_id', 'id');
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

    public function pengurus()
    {
        $periode_id = $this->attributes['id'];
        $t_jabatan = Jabatan::tableName;

        // hitung child nya untuk menentukan apakah jabatan tersebut utama atau mempunyai bidang lain
        $count_child = <<<SQL
            (select count(*) from $t_jabatan as z where z.parent_id = $t_jabatan.id)
        SQL;
        $parents = Jabatan::select([
            DB::raw("$t_jabatan.*"),
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
                $turunan = $parent->childern();
                $turunan_result = [];
                foreach ($turunan as $child) {
                    $pejabat = $child->anggotas()->with('anggota.user')->get();
                    if ($pejabat->count() > 0) {
                        $pejabat_res = $pejabat->count() > 1 ? $pejabat : $pejabat[0];
                        $turunan_result[] = (object)[
                            'jabatan' => $child,
                            'pejabat' => $pejabat_res,
                            'list' => $pejabat->count() > 1
                        ];
                    }
                }
                $results['bidang'][] = (object)[
                    'header' => $parent,
                    'body' => $turunan_result
                ];
            }
            // pengurus inti
            else {
                $pejabat = $parent->anggotas()->with('anggota.user')->first();
                if ($pejabat) {
                    $pejabat = $pejabat->anggota;
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


    public static function datatable(Request $request): mixed
    {
        $query = [];
        // import
        $table = self::tableName;
        // ========================================================================================================
        // select raw as alias
        $sraa = function (string $col): string {
            global $query;
            return $query[$col] . ' as ' . $query[$col . '_alias'];
        };
        $model_filter = [];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = self::select(array_merge([
            DB::raw("$table.*"),
        ], $to_db_raw));

        // Filter =====================================================================================================
        // filter check
        $f_c = function (string $param) use ($request): mixed {
            $filter = $request->filter;
            return isset($filter[$param]) ? $filter[$param] : false;
        };

        // filter ini menurut data model filter
        $f = [];
        // loop filter
        foreach ($f as $v) {
            if ($f_c($v) !== false) {
                $model->whereRaw("{$query[$v]}='{$f_c($v)}'");
            }
        }

        // filter custom
        $filters = ['status'];
        foreach ($filters as  $f) {
            if ($f_c($f) !== false) {
                $model->whereRaw("$table.$f='{$f_c($f)}'");
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
            $search_add = [
                'nama',
                'foto',
                'dari',
                'sampai',
                'slug',
                'slogan',
                'visi',
                'misi',
                'filosofi_logo',
                'status',
            ];
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

    public function detailPengurus()
    {
        $t_peng_anggota = Anggota::tableName;
        $t_anggota = KeanggotaanAnggota::tableName;
        $t_jabatan = Jabatan::tableName;
        $periode_id = $this->attributes['id'];
        $t_periode = self::tableName;

        $results = Anggota::select([
            DB::raw("$t_anggota.id"),
            DB::raw("$t_anggota.angkatan"),
            DB::raw("$t_anggota.nama"),
            DB::raw("if( $t_jabatan.parent_id is null, $t_jabatan.nama,
            concat( $t_jabatan.nama, ' -> ', (select pp2.nama from $t_jabatan pp2 where pp2.id = $t_jabatan.parent_id))
            ) as jabatan"),
        ])
            ->join($t_jabatan, "$t_jabatan.id", "=", "$t_peng_anggota.jabatan_id")
            ->join($t_periode, "$t_periode.id", "=", "$t_jabatan.periode_id")
            ->join($t_anggota, "$t_anggota.id", "=", "$t_peng_anggota.anggota_id")
            ->where("$t_periode.id", $periode_id)
            ->orderByRaw("(select pj2.no_urut from $t_jabatan pj2 where pj2.id = $t_jabatan.parent_id), $t_jabatan.no_urut")
            ->get();

        return $results;
    }

    public function homePengurus()
    {
        return Cache::rememberForever(static::homeCacheKey, function () {
            $t_peng_anggota = Anggota::tableName;
            $t_jabatan = Jabatan::tableName;
            $periode_id = $this->attributes['id'];
            $t_periode = self::tableName;

            $results = Anggota::select([
                DB::raw("$t_peng_anggota.id"),
                DB::raw("$t_peng_anggota.anggota_id"),
                DB::raw("$t_peng_anggota.jabatan_id"),
            ])
                ->join($t_jabatan, "$t_jabatan.id", "=", "$t_peng_anggota.jabatan_id")
                ->join($t_periode, "$t_periode.id", "=", "$t_jabatan.periode_id")
                ->leftJoin("$t_jabatan as j2", "j2.id", "=", "$t_jabatan.parent_id")
                ->where("$t_periode.id", $periode_id)
                ->orderByRaw("(select pj2.no_urut from $t_jabatan pj2 where pj2.id = $t_jabatan.parent_id), $t_jabatan.no_urut")
                ->with(['anggota.user', 'jabatan.parent'])
                ->get();

            return $results;
        });
    }

    public function jabatanDatatable(Request $request): mixed
    {
        $query = [];
        $tableNames = config('permission.table_names');
        $t_role = $tableNames['roles'];
        // import
        $foto_folder = asset(Jabatan::image_folder);
        $foto_default = Jabatan::image_folder;
        $table = Jabatan::tableName;
        $periode_id = $this->attributes['id'];
        // ========================================================================================================
        // select raw as alias
        $c_urutan = 'urutan';
        $query[$c_urutan] = <<<SQL
            if( $table.parent_id is null, $table.no_urut,
                concat((select pp2.no_urut from $table pp2 where pp2.id = $table.parent_id), '.', $table.no_urut)
                )
        SQL;
        $query["{$c_urutan}_alias"] = $c_urutan;

        $c_foto = 'foto_url';
        $query[$c_foto] = <<<SQL
            if( $table.foto is null, concat('$foto_default'),
                concat( '$foto_folder', '/', $table.foto)
                )
        SQL;
        $query["{$c_foto}_alias"] = $c_foto;

        $c_role = 'role';
        $query[$c_role] = "$t_role.name";
        $query["{$c_role}_alias"] = $c_role;


        $sraa = function (string $col) use ($query): string {
            return $query[$col] . ' as ' . $query[$col . '_alias'];
        };
        $model_filter = [$c_urutan, $c_foto, $c_role];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = Jabatan::select(array_merge([
            DB::raw("$table.*"),
            DB::raw("parent.nama as parent"),
        ], $to_db_raw))
            ->leftJoin($t_role, "$t_role.id", '=', "$table.role_id")
            ->leftJoin("$table as parent", "parent.id", '=', "$table.parent_id");

        // Filter =====================================================================================================
        // filter check
        $f_c = function (string $param) use ($request): mixed {
            $filter = $request->filter;
            return isset($filter[$param]) ? $filter[$param] : false;
        };

        // filter ini menurut data model filter
        $f = [$c_role];
        // loop filter
        foreach ($f as $v) {
            if ($f_c($v) !== false) {
                $model->whereRaw("{$query[$v]}='{$f_c($v)}'");
            }
        }

        // filter custom
        $filters = ['status'];
        foreach ($filters as  $f) {
            if ($f_c($f) !== false) {
                $model->whereRaw("$table.$f='{$f_c($f)}'");
            }
        }

        // sort pertama jika tidak ada parent_id maka pake no urut sendiri
        // sort kedua jika parent nya tidak ada maka 0 jika ada maka pake parent

        $model->orderByRaw("
        if($table.parent_id is null, $table.no_urut, (select pj2.no_urut from $table pj2 where pj2.id = $table.parent_id)),
        if($table.parent_id is null, 0, (select pj2.no_urut from $table pj2 where pj2.id = $table.parent_id))");

        $model->where("$table.periode_id", $periode_id);
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
            $search_add = [
                'no_urut',
                'nama',
                'slug',
                'foto',
                'singkatan',
                'visi',
                'misi',
                'slogan',
                'status',
                'role_id',
                'periode_id',
                'parent_id',
            ];
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

    public static function clearCache()
    {
        $cacheKey = [
            static::homeCacheKey
        ];

        foreach ($cacheKey as $key) Cache::pull($key);
    }
}
