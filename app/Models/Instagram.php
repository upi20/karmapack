<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Instagram extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'id',
        'nama',
        'tanggal',
        'keterangan',
        'status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'instagram';
    const tableName = 'instagram';

    public static function datatable(Request $request)
    {
        $model = static::select(['id', 'nama', 'keterangan', 'tanggal', 'status'])
            ->selectRaw("IF(status = 1, 'Tampilkan', 'Tidak Tampilkan') as status_str")
            ->selectRaw("date_format(tanggal, '%d-%b-%Y') as tanggal_str");

        // filter
        if (isset($request->filter)) {
            $filter = $request->filter;
            if ($filter['status'] != '') {
                $model->where('status', '=', $filter['status']);
            }
        }

        return Datatables::of($model)
            ->addIndexColumn()
            ->make(true);
    }
}
