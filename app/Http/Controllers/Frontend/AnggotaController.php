<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Keanggotaan\Anggota;
use App\Models\User;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {

        $page_attr = [
            'title' => 'Daftar Anggota'
        ];

        // filter attribut
        $image = (object)[
            'folder' => User::image_folder,
            'default' => User::image_default
        ];

        $anggotas = Anggota::frontendListAnggota($request);
        $attr = json_decode(json_encode($anggotas));
        return view('pages.frontend.anggota.list', compact('page_attr', 'image', 'attr', 'anggotas'));
    }

    public function user(User $user)
    {
        $anggota = $user->anggota;
        $profile_folder = User::image_folder;
        $image = $anggota->foto ? $anggota->fotoUrl() : $anggota->fotoUrlDefault();
        $description = $anggota->alamat_lengkap
            . ($anggota->village ? (', ' . $anggota->village->name) : '')
            . ($anggota->district ? (', ' . $anggota->district->name) : '')
            . ($anggota->regencie ? (', ' . $anggota->regencie->name) : '')
            . ($anggota->province ? (', ' . $anggota->province->name) : '');

        $page_attr = [
            'title' => $user->name,
            'navigation' => 'anggota',
            'description' => $description,
            'image' => $image,
        ];

        return view('pages.frontend.anggota.detail', compact(
            'page_attr',
            'anggota',
            'user',
        ));
    }

    public function anggota(Anggota $anggota)
    {
        if (is_null($anggota->user)) {
            return abort(404);
        }
        return $this->user($anggota->user);
    }
}
