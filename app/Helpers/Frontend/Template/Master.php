<?php

namespace App\Helpers\Frontend\Template;

class Master
{
    private $periode_id;
    public function __construct($periode_id = false)
    {
        $this->periode_id = $periode_id;
    }

    public function getSosmed()
    {
        $get = \App\Models\SocialMedia::where('status', '=', 1)
            ->orderBy('order')
            ->get();
        return $get ? $get->toArray() : [];
    }

    private function menu_bidang_get()
    {
        if ($this->periode_id) {
            $periode_q = (object) ['id' => $this->periode_id];
        } else {
            // get periode aktif
            $periode_q = \App\Models\Pengurus\Periode::where('status', '=', '1')
                ->select(['id'])
                ->first();
        }

        if ($periode_q) {
            // get menu where sum menu count > 0
            $a = \App\Models\Pengurus\Jabatan::tableName;
            $where = " (
                ((select count(*) from $a as z where z.parent_id = $a.id) > 0) and
                (`status` = 1) and ($a.periode_id = $periode_q->id)
            )";

            $periode_jabatan = \App\Models\Pengurus\Jabatan::select(['id', 'nama', 'slug'])
                ->whereRaw($where)
                ->orderBy('no_urut')
                ->get();
            return $periode_jabatan->toArray();
        } else {
            return [];
        }
    }

    public function menuBidang()
    {
        $menus_temp = [];
        foreach ($this->menu_bidang_get() as $m) {
            $menus_temp[] = [
                'title' => $m['nama'],
                'route' => 'bidang/' . $m['slug'],
                'route_type' => 'url',
            ];
        }

        return [['name' => 'bidang', 'title' => 'Bidang', 'children' => $menus_temp]];
    }

    public function footerInstagram()
    {
        $result = \App\Models\FooterInstagram::where('status', '=', 1)
            ->orderBy('order')
            ->get();
        $result->map(function ($item) {
            $image_folder = \App\Models\FooterInstagram::image_folder;
            $item['foto'] = url("$image_folder/$item->foto");
            return $item;
        });

        return $result->toArray();
    }
}