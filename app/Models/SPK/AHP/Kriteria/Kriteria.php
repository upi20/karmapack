<?php

namespace App\Models\SPK\AHP\Kriteria;

use App\Models\SPK\AHP\Kriteria\Jenis\Jenis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Cviebrock\EloquentSluggable\Sluggable;

class Kriteria extends Model
{
    use HasFactory, Loggable, Sluggable;

    protected $fillable = [
        'id',
        'kode',
        'nama',
        'slug',
        'ci',
        'ri',
        'cr',
        'prioritas',
        'total',
        'eign_value',
    ];

    protected $primaryKey = 'id';
    protected $table = 'spk_ahp_kriteria';
    const tableName = 'spk_ahp_kriteria';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function jenis()
    {
        return $this->hasMany(Jenis::class, 'kriteria_id', 'id');
    }

    public function perbandingan_x()
    {
        return $this->hasMany(Perbandingan::class, 'kriteria_x_id', 'id');
    }

    public function perbandingan_y()
    {
        return $this->hasMany(Perbandingan::class, 'kriteria_y_id', 'id');
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

    public static function getPerbandingan()
    {
        $results = static::with(['perbandingan_x', 'perbandingan_y'])->orderBy('kode')->get();
        $findPerbandingan = function ($x_id, $y_id) use ($results) {
            foreach ($results as $obj) {
                foreach ($obj->perbandingan_x as $x) {
                    if ($x->kriteria_x_id == $x_id && $x->kriteria_y_id == $y_id) {
                        return $x->nilai;
                    }
                }

                foreach ($obj->perbandingan_y as $y) {
                    if ($y->kriteria_x_id == $x_id && $y->kriteria_y_id == $y_id) {
                        return $y->nilai;
                    }
                }
            }

            return 0;
        };
        $ids = ["id"];

        $header = ['Kode'];

        $body = [];
        foreach ($results as $x) {
            $header[] = [
                'nama' => $x->nama,
                'kode' => $x->kode,
            ];
            $body_item = [];

            $body_item[] = [
                'nama' => $x->nama,
                'kode' => $x->kode,
            ];
            foreach ($results as $y) {
                $res = $findPerbandingan($x->id, $y->id);;
                $body_item[] = $res;
            }
            $body[] = $body_item;
            $ids[] = $x->id;
        }

        // jumlahkan total
        $sums = [];
        foreach ($body as $row) {
            foreach ($row as $col => $item) {
                if ($col == 0) {
                    continue;
                }

                if (!isset($sums[$col])) {
                    $sums[$col] = 0;
                }
                $sums[$col] += $item;
            }
        }

        $total = [];
        for ($y = 0; $y <= count($body); $y++) {
            if ($y == 0) {
                $total[] = 'Total';
            } else {
                $total[] = $sums[$y];
            }
        }
        $body_header = array_merge([$header], $body);

        return [
            'body' => $body_header,
            'total' => $total,
            'id' => $ids,
        ];
    }

    public static function normalisasi()
    {
        $table = static::getPerbandingan();
        $result = [];
        $body = $table['body'];
        $total = $table['total'];

        for ($y = 0; $y < count($body); $y++) {
            for ($x = 0; $x < count($body[$y]); $x++) {
                if ($x == 0 || $y == 0) {
                    $result[$y][$x] = $body[$y][$x];
                } else {
                    $result[$y][$x] = $body[$y][$x] / $total[$x];
                }
            }
        }

        // jumlah
        for ($y = 0; $y < count($result); $y++) {
            if ($y == 0) {
                $result[$y][] = "Jumlah";
                continue;
            }

            $total = 0;
            for ($x = 0; $x < count($result[$y]); $x++) {
                if ($x == 0) continue;
                $total += $result[$y][$x];
            }

            $result[$y][] = $total;
        }

        // prioritas
        $prioritas = [];
        $jml_data = count($result) - 1; // -1 header
        for ($y = 0; $y < count($result); $y++) {
            if ($y == 0) {
                $result[$y][] = "Prioritas";
                $prioritas[] = 0;
                continue;
            }
            $res = $result[$y][$jml_data + 1] / $jml_data;;
            $prioritas[] = $res;
            $result[$y][] = $res;
        }

        // eigen value
        $jml_data = count($result) + 1; // prioritas
        $total = $table['total'];
        $total_ev = 0;
        $ev = [];
        for ($y = 0; $y < count($result); $y++) {
            if ($y == 0) {
                $result[$y][] = "Eign Value";
                $ev[] = 0;
                continue;
            }
            $res = $result[$y][$jml_data] * $total[$y];
            $result[$y][] = $res;
            $total_ev += $res;
            $ev[] = $res;
        }

        // Consistency Index
        $jml_data = count($result) - 1; // -1 header
        $jumlah_data_kurang_dari_dua = ($jml_data - 1) == 0;
        $ci = $jumlah_data_kurang_dari_dua ? 0 : (($total_ev - $jml_data) / ($jml_data - 1));

        // random consistency index
        $data_tidak_ada = $jml_data == 0;
        $ri = $data_tidak_ada ? 0 : config('ahp.rci')[$jml_data];

        // Consistency Ratio
        $cr = $ri == 0 ? 0 : ($ci / $ri);

        $total_normalisasi = [];
        $result_item_length = isset($result[0]) ? count($result[0]) : 0;
        for ($x = 0; $x < $result_item_length; $x++) {
            for ($y = 0; $y < count($result); $y++) {
                if (!isset($total_normalisasi[$x])) {
                    $total_normalisasi[$x] = 0;
                }
                $total_normalisasi[$x] += is_numeric($result[$y][$x]) ? $result[$y][$x] : 0;
            }
        }
        $total_normalisasi[0] = 'Total';

        return [
            'jml_data' => $jml_data,
            'ci' => $ci,
            'ri' => $ri,
            'cr' => $cr,
            'eign_value' => $ev,
            'normalisasi' => $result,
            'prioritas' => $prioritas,
            'total' => $table['total'],
            'total_normalisasi' => $total_normalisasi,
            'id' => $table['id'],
        ];
    }

    public static function setNomralisasi()
    {
        $nm = static::normalisasi();
        DB::beginTransaction();
        for ($y = 1; $y < count($nm['id']); $y++) {
            $id = $nm['id'][$y];
            $k = static::find($id);
            $k->prioritas = $nm['prioritas'][$y];
            $k->total = $nm['total'][$y];
            $k->eign_value = $nm['eign_value'][$y];
            $k->save();
        }
        DB::commit();
        return static::all();
    }
}
