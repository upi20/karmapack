<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Support\Facades\Cache;

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
    const homeCacheKey = 'homeInstagram';

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

    public static function getHomeViewData()
    {
        return Cache::rememberForever(static::homeCacheKey, function () {
            $instagrams_limit = settings()->get('setting.home.instagram.jml_konten', 6);
            $get = static::limit($instagrams_limit)->where('status', 1)->orderBy('tanggal', 'desc')->get();
            return $get ? $get : [];
        });
    }

    public static function clearCache()
    {
        $cacheKey = [
            static::homeCacheKey
        ];

        foreach ($cacheKey as $key) Cache::pull($key);
    }
}
