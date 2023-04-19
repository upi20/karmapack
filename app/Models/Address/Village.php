<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class Village extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'id',
        'district_id',
        'name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'address_villages';
    const tableName = 'address_villages';

    public static function datatable(Request $request)
    {
        $t_village = static::tableName;
        $t_district = District::tableName;
        $t_province = Province::tableName;
        $t_regencie = Regencie::tableName;

        // model
        $model = static::select([
            // village
            "$t_village.name",
            "$t_village.id",
            // district
            "$t_district.name as district",
            "$t_district.id as district_id",
            // regencie
            "$t_regencie.name as regencie",
            "$t_regencie.id as regency_id",
            // province
            "$t_province.name as province",
            "$t_province.id as province_id",
        ])
            ->leftJoin("$t_district", "$t_district.id", "=", "$t_village.district_id")
            ->leftJoin("$t_regencie", "$t_regencie.id", "=", "$t_district.regency_id")
            ->leftJoin("$t_province", "$t_province.id", "=", "$t_regencie.province_id");

        // filter
        if (isset($request->filter)) {
            $filter = $request->filter;
            if ($filter["province"] && !$filter["regencie"] && !$filter["district"]) {
                $model->where("$t_regencie.province_id", "=", $filter["province"]);
            }

            if ($filter["regencie"] && !$filter["district"]) {
                $model->where("$t_district.regency_id", "=", $filter["regencie"]);
            }

            if ($filter["district"]) {
                $model->where("$t_village.district_id", "=", $filter["district"]);
            }
        }

        return Datatables::of($model)
            ->addIndexColumn()
            ->filterColumn("district", function ($query, $keyword) use ($t_district) {
                $query->whereRaw("$t_district.name like '%$keyword%'");
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
