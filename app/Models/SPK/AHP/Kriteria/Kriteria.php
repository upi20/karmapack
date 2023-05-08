<?php

namespace App\Models\SPK\AHP\Kriteria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class Kriteria extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'id',
        'kode',
        'nama',
        'ci',
        'ri',
        'cr',
        'prioritas',
    ];

    protected $primaryKey = 'id';
    protected $table = 'spk_ahp_kriteria';
    const tableName = 'spk_ahp_kriteria';

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

        $header = ['Kode'];
        $body = [];
        foreach ($results as $x) {
            $header[] = $x->kode;
            $body_item = [];

            $body_item[] = $x->kode;
            foreach ($results as $y) {
                $body_item[] = $findPerbandingan($x->id, $y->id);
            }
            $body[] = $body_item;
        }

        return array_merge([$header], $body);
    }
}
