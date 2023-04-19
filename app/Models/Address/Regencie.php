<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class Regencie extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'id',
        'province_id',
        'name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'address_regencies';
    const tableName = 'address_regencies';

    public static function datatable(Request $request)
    {
        $t_village = Village::tableName;
        $t_district = District::tableName;
        $t_province = Province::tableName;
        $t_regencie = static::tableName;

        $queryArr = [];
        // extend query
        $queryArr['district'] = <<<SQL
                (select count(*) from $t_district where $t_district.regency_id = $t_regencie.id)
            SQL;
        $queryArr['district_alias'] = 'district';

        $queryArr['village'] = <<<SQL
                (select count(*) from $t_village join $t_district on $t_village.district_id = $t_district.id where $t_district.regency_id = $t_regencie.id)
            SQL;
        $queryArr['village_alias'] = 'village';

        // model
        $model = static::select([
            "$t_regencie.id", "$t_regencie.name",
            "$t_province.name as province",
            "$t_province.id as province_id",
            DB::raw("{$queryArr['district']} as {$queryArr['district_alias']}"),
            DB::raw("{$queryArr['village']} as {$queryArr['village_alias']}"),
        ])->leftJoin("$t_province", "$t_province.id", '=', "$t_regencie.province_id");

        // filter
        if (isset($request->filter)) {
            $filter = $request->filter;
            if ($filter['province'] != '') {
                $model->where("$t_regencie.province_id", '=', $filter['province']);
            }
        }

        return Datatables::of($model)
            ->addIndexColumn()
            ->filterColumn($queryArr['district_alias'], function ($query, $keyword) use ($queryArr) {
                $query->whereRaw("{$queryArr['district']} like '%$keyword%'");
            })
            ->filterColumn($queryArr['village_alias'], function ($query, $keyword) use ($queryArr) {
                $query->whereRaw("{$queryArr['village']} like '%$keyword%'");
            })
            ->filterColumn("province", function ($query, $keyword) use ($t_province) {
                $query->whereRaw("$t_province.name like '%$keyword%'");
            })
            ->make(true);
    }
}
