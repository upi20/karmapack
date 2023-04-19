<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class District extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'id',
        'regency_id',
        'name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'address_districts';
    const tableName = 'address_districts';

    public static function datatable(Request $request)
    {
        $queryArr = [];

        $t_village = Village::tableName;
        $t_district = static::tableName;
        $t_province = Province::tableName;
        $t_regencie = Regencie::tableName;

        // extend query
        $queryArr['village'] = <<<SQL
                (select count(*) from $t_village where $t_village.district_id = $t_district.id)
            SQL;
        $queryArr['village_alias'] = 'village';

        // model
        $model = static::select([
            "$t_district.id",
            "$t_district.name",
            // regencie
            "$t_regencie.name as regencie",
            "$t_regencie.id as regency_id",
            // province
            "$t_province.name as province",
            "$t_province.id as province_id",
            DB::raw("{$queryArr["village"]} as {$queryArr["village_alias"]}"),
        ])
            ->leftJoin("$t_regencie", "$t_regencie.id", "=", "$t_district.regency_id")
            ->leftJoin("$t_province", "$t_province.id", "=", "$t_regencie.province_id");

        // filter
        if (isset($request->filter)) {
            $filter = $request->filter;
            if ($filter["province"] && !$filter["regencie"]) {
                $model->where("$t_regencie.province_id", "=", $filter["province"]);
            }

            if ($filter["regencie"]) {
                $model->where("$t_district.regency_id", "=", $filter["regencie"]);
            }
        }

        return Datatables::of($model)
            ->addIndexColumn()
            ->filterColumn($queryArr["village_alias"], function ($query, $keyword) use ($queryArr) {
                $query->whereRaw("{$queryArr["village"]} like '%$keyword%'");
            })
            ->filterColumn("regencie", function ($query, $keyword) use ($t_regencie) {
                $query->whereRaw("$t_regencie.name like '%$keyword%'");
            })
            ->filterColumn("province", function ($query, $keyword) use ($t_province) {
                $query->whereRaw("$t_province.name like '%$keyword%'");
            })
            ->make(true);
    }
}
