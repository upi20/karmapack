<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class Galeri extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'id',
        'nama',
        'foto',
        'foto_id_gdrive',
        'id_gdrive',
        'slug',
        'tanggal',
        'lokasi',
        'keterangan',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'galeri';
    const tableName = 'galeri';
    const homeCacheKey = 'homeGaleri';

    public static function get(Request $request, int $paginate = 6, ?string $params = null): object
    {
        $model = static::where('status', '=', 1)->select([DB::raw('*'), DB::raw("date_format(tanggal, '%d %M %Y') as tanggal_str")])
            ->orderBy('tanggal', 'desc');

        if ($request->search) {
            $model->whereRaw("(
                nama like '%$request->search%' or
                foto like '%$request->search%' or
                slug like '%$request->search%' or
                keterangan like '%$request->search%'
            )");
        }

        // model->item get access
        $model = $model->paginate($paginate)
            ->appends(request()->query());
        return $model;
    }

    public static function getParams(Request $request): string
    {
        $filters = (object)[
            'search' => $request->search,
        ];

        // filter to url
        $params = "";
        foreach ($filters as $key => $filter) {
            $params .= $params ? ($filter ? "&" : '') : '';
            $params .= $filter ? "$key=$filter" : '';
        }

        return $params;
    }

    public static function getHomeViewData()
    {
        return Cache::rememberForever(static::homeCacheKey, function () {
            $galeri_limit = settings()->get('setting.home.galeri_kegiatan.limit', 6);
            $get = static::where('status', '=', 1)->select([DB::raw('*'), DB::raw("date_format(tanggal, '%d %M %Y') as tanggal_str")])
                ->orderBy('tanggal', 'desc')->limit($galeri_limit)->get();
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

    public function dateFormat($format = 'd F Y')
    {
        return date_format(date_create($this->attributes['tanggal']), $format);
    }

    public function fotoUrl()
    {
        $foto = $this->attributes['foto_id_gdrive'];
        return "https://drive.google.com/uc?export=view&id={$foto}";
    }

    public static function datatable(Request $request): mixed
    {
        $model = static::select(['id', 'nama', 'slug', 'status', 'id_gdrive', 'foto_id_gdrive', 'keterangan', 'tanggal', 'lokasi'])
            ->selectRaw("IF(status = 1, 'Tampilkan', 'Tidak Tampilkan') as status_str");

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
