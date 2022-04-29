<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Address\Regencie;
use App\Models\Address\Village;
use App\Models\Profile\Hobby;
use App\Models\Profile\KontakTipe;
use App\Models\Profile\PendidikanJenis;
use App\Models\User;
use App\Repository\Frontend\MemberRepository;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private $image_folder = User::image_folder;
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
        // address
        $province = $model->province_id ? Province::select(['id', 'name'])->where('id', '=', $model->province_id)->first() : null;
        $regencie = $model->regency_id ? Regencie::select(['id', 'name'])->where('id', '=', $model->regency_id)->first() : null;
        $district = $model->district_id ? District::select(['id', 'name'])->where('id', '=', $model->district_id)->first() : null;
        $village = $model->village_id ? Village::select(['id', 'name'])->where('id', '=', $model->village_id)->first() : null;

        $profile_folder = User::image_folder;
        $image = $model->foto ? asset("$profile_folder/$model->foto") : null;
        $description = $model->alamat_lengkap
            . ($village ? (', ' . $village->name) : '')
            . ($district ? (', ' . $district->name) : '')
            . ($regencie ? (', ' . $regencie->name) : '')
            . ($province ? (', ' . $province->name) : '');

        $page_attr = [
            'title' => $model->name,
            'navigation' => 'anggota',
            'description' => $description,
            'image' => $image,
        ];
        $image_folder = $this->image_folder;

        // side information
        $contacts = MemberRepository::getListKontak($model->id);
        $kepengurusan = MemberRepository::getRiwayatKepengurusanFE($model->id);
        $pendidikan = MemberRepository::getListPendidikan($model->id);
        $pengalaman_organisasi = MemberRepository::getListPengalamanOrganisasi($model->id);
        $pengalaman_lain = MemberRepository::getListPengalamanLain($model->id);
        $hobbies = Hobby::where('user_id', '=', $model->id)->select(['name'])->get();

        return view('frontend.member.detail', compact(
            'page_attr',
            'model',
            'image_folder',
            'province',
            'regencie',
            'district',
            'village',

            'contacts',
            'kepengurusan',
            'pendidikan',
            'pengalaman_organisasi',
            'pengalaman_lain',
            'hobbies',
        ));
    }
}
