<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class Province extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'id',
        'name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'address_provinces';
    const tableName = 'address_provinces';

    public static function datatable(Request $request)
    {
        $t_village = Village::tableName;
        $t_district = District::tableName;
        $t_province = static::tableName;
        $t_regencie = Regencie::tableName;

        $queryArr = [];
        $queryArr['regencie'] = <<<SQL
                (select count(*) from $t_regencie where province_id = $t_province.id)
            SQL;
        $queryArr['regencie_alias'] = 'regencie';

        $queryArr['district'] = <<<SQL
                (select count(*) from $t_district join $t_regencie on $t_district.regency_id = $t_regencie.id where $t_regencie.province_id = $t_province.id)
            SQL;
        $queryArr['district_alias'] = 'district';

        $queryArr['village'] = <<<SQL
                (select count(*) from $t_village join $t_district on $t_village.district_id = $t_district.id join $t_regencie on $t_district.regency_id = $t_regencie.id where $t_regencie.province_id = $t_province.id)
            SQL;
        $queryArr['village_alias'] = 'village';

        $model = static::select([
            'id', 'name',
            DB::raw("{$queryArr['regencie']} as {$queryArr['regencie_alias']}"),
            DB::raw("{$queryArr['district']} as {$queryArr['district_alias']}"),
            DB::raw("{$queryArr['village']} as {$queryArr['village_alias']}"),
        ]);
        return Datatables::of($model)
            ->addIndexColumn()
            ->filterColumn($queryArr['regencie_alias'], function ($query, $keyword) use ($queryArr) {
                $query->whereRaw("{$queryArr['regencie']} like '%$keyword%'");
            })
            ->filterColumn($queryArr['district_alias'], function ($query, $keyword)  use ($queryArr) {
                $query->whereRaw("{$queryArr['district']} like '%$keyword%'");
            })
            ->filterColumn($queryArr['village_alias'], function ($query, $keyword) use ($queryArr) {
                $query->whereRaw("{$queryArr['village']} like '%$keyword%'");
            })
            ->make(true);
    }
}
