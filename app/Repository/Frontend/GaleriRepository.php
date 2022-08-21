<?php

namespace App\Repository\Frontend;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriRepository
{
    public static function get(Request $request, int $paginate = 6, ?string $params = null): object
    {
        $model = Galeri::where('status', '=', 1)->select([DB::raw('*'), DB::raw("date_format(tanggal, '%d %M %Y') as tanggal_str")])
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
}
