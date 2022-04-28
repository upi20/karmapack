<?php

namespace App\Repository\Frontend;

use App\Helpers\Pagination;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriRepository
{
    public static function get(Request $request, int $paginate = 6, ?string $params = null): object
    {
        $model = Galeri::where('status', '=', '1');

        if ($request->search) {
            $model->whereRaw("(
                nama like '%$request->search%' or
                foto like '%$request->search%' or
                slug like '%$request->search%' or
                keterangan like '%$request->search%'
            )");
        }

        // model->item get access
        $model = $model->paginate($paginate);
        $model = json_encode($model);
        $model = json_Decode($model);

        // pagination
        $pagination = Pagination::generate($model, $params);

        // return
        return (object)[
            'model' => $model,
            'pagination' => $pagination,
        ];
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
