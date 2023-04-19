<?php

namespace App\Http\Controllers;

use App\Models\Keanggotaan\Anggota;
use App\Models\Menu\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{
    public function index(Request $request)
    {
        // menu front
        $frontMenu = Frontend::all();
        $frontMenu->map(function ($item) {
            $item->route = $this->routeBuild($item->route);
            return $item;
        });

        $sitemap = Sitemap::create();
        $sitemap->add(
            Url::create(url(''))
                ->setPriority(1)
                ->addImage(asset(setting_get("setting.home.hero.image")), "Karmapack")
        );

        foreach ($frontMenu as $menu) {
            if ($menu->route != url('')) {
                $sitemap->add(Url::create($menu->route)->setLastModificationDate($menu->updated_at));
            }
        }

        // Anggota
        $anggotas = Anggota::with('user')->get();
        $anggotas->map(function ($anggota) {
            $anggota->route = is_null($anggota->user->username) ? "anggota/$anggota->id" : $anggota->user->username;
            return $anggota;
        });

        foreach ($anggotas as $anggota) {
            $sitemap->add(
                Url::create('/' . $anggota->route)
                    ->setLastModificationDate($anggota->updated_at)
                    ->addImage($anggota->fotoUrl(), $anggota->nama)
                    ->setPriority(0.9)
            );
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
        return response(file_get_contents(public_path('sitemap.xml')), 200, [
            'Content-Type' => 'application/xml'
        ]);
    }

    private function routeBuild(?string $route): ?string
    {
        if (Route::has($route)) {
            return route($route);
        } else {
            if ($route == '' || $route == '#') {
                return url('');
            } else {
                return str_parse($route);
            }
        }
    }
}
