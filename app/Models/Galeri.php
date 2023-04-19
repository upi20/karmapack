<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

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
            $get = static::orderBy('tanggal', 'desc')->limit(4)->get();
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
}
