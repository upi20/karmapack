<?php

namespace App\Helpers;

use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\Periode;

class MenuNavigation
{
    public function bidang()
    {
        $menus_temp = [];
        foreach ($this->bidang_get() as $m) {
            $menus_temp[] = [
                'title' => $m['nama'],
                'route' => 'about.kepengurusan.bidang',
                'param' => $m['slug'],
            ];
        }

        return [['name' => 'bidang', 'title' => 'Bidang', 'children' => $menus_temp]];
    }

    private function bidang_get()
    {
        // get periode aktif
        $periode = Periode::where('status', '=', '1')
            ->select(['id'])
            ->first();
        if ($periode) {
            // get menu where sum menu count > 0
            $a = Jabatan::tableName;
            $where = " (
            ((select count(*) from $a as z where z.parent_id = $a.id) > 0) and
            (`status` = 1)
        )";

            $periode_jabatan = Jabatan::select(['id', 'nama', 'slug'])
                ->whereRaw($where)
                ->orderBy('no_urut')
                ->get();
            return $periode_jabatan->toArray();
        } else {
            return [];
        }
    }
}
