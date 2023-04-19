<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PortfolioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('portfolio')->delete();

        \DB::table('portfolio')->insert(array(
            0 =>
            array(
                'id' => 13,
                'kategori_id' => 16,
                'nama' => 'Warung Kopi Gunung Roastery',
                'slug' => 'warung-kopi-gunung-roastery',
                'foto' => '20230414025039.png',
                'keterangan' => 'MAnsdansld',
                'is_insert' => 1,
                'created_by' => 1,
                'created_at' => '2023-04-14 02:47:11',
                'updated_at' => '2023-04-14 02:50:39',
            ),
            1 =>
            array(
                'id' => 14,
                'kategori_id' => NULL,
                'nama' => NULL,
                'slug' => NULL,
                'foto' => NULL,
                'keterangan' => NULL,
                'is_insert' => 0,
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
