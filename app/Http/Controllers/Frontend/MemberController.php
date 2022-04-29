<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\Frontend\MemberRepository;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // rencana ====================================================================================
    // search yang lebih advance
    // pagination di perbaiki
    // jabatan terakhir
    // menurut periode
    // menurut jabatan
    // rencana ====================================================================================
    public function index(Request $request)
    {

        $page_attr = [
            'title' => 'List Anggota'
        ];

        // filter attribut
        $image = (object)[
            'folder' => User::image_folder,
            'default' => User::image_default
        ];

        // artikel
        $filters = (object)[
            'search' => $request->search,
            'prov' => $request->prov,
            'kab' => $request->kab,
            'kec' => $request->kec,
            'des' => $request->des,
            'pendidikan' => $request->pendidikan,
        ];

        // filter to url
        $params = "";
        foreach ($filters as $key => $filter) {
            $params .= $params ? ($filter ? "&" : '') : '';
            $params .= $filter ? "$key=$filter" : '';
        }

        $getArtikel = MemberRepository::getList($request, 6, $params);
        $users = $getArtikel->model;
        $pagination = $getArtikel->pagination;
        return view('frontend.member.list', compact('page_attr', 'users', 'image', 'params', 'filters', 'pagination'));
    }

    public function member(User $model)
    {
        dd($model);
    }
}
