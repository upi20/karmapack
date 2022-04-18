<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FooterInstagramsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('footer_instagrams')->delete();
        
        \DB::table('footer_instagrams')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Hari Ayah Nasional',
                'url' => 'https://www.facebook.com/karmapack.id',
                'foto' => '20220418080654.jpg',
                'order' => 1,
                'keterangan' => '1',
                'status' => 1,
                'created_at' => '2022-04-18 08:06:54',
                'updated_at' => '2022-04-18 08:06:54',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Pengaturan',
                'url' => 'https://www.facebook.com/karmapack.id',
                'foto' => '20220418080718.jpg',
                'order' => 2,
                'keterangan' => '2',
                'status' => 1,
                'created_at' => '2022-04-18 08:07:18',
                'updated_at' => '2022-04-18 08:07:18',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Ndak TAu',
                'url' => NULL,
                'foto' => '20220418081613.jpg',
                'order' => 3,
                'keterangan' => NULL,
                'status' => 1,
                'created_at' => '2022-04-18 08:16:13',
                'updated_at' => '2022-04-18 08:16:13',
            ),
        ));
        
        
    }
}