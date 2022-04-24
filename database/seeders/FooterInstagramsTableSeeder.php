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
                'id' => 5,
                'nama' => 'Hari Buku Sedunia',
                'url' => 'https://www.instagram.com/p/Ccqt4LBvMjT/',
                'foto' => '20220424143257.jpg',
                'order' => 1,
                'keterangan' => NULL,
                'status' => 1,
                'created_at' => '2022-04-24 14:32:57',
                'updated_at' => '2022-04-24 14:32:57',
            ),
            1 => 
            array (
                'id' => 6,
                'nama' => 'SELAMAT HARI BUMI INTERNASIONAL',
                'url' => 'https://www.instagram.com/p/CcoNaxZPbRd/',
                'foto' => '20220424143436.webp',
                'order' => 2,
                'keterangan' => NULL,
                'status' => 1,
                'created_at' => '2022-04-24 14:34:36',
                'updated_at' => '2022-04-24 14:34:36',
            ),
            2 => 
            array (
                'id' => 7,
                'nama' => 'Hari Hemofilia Sedunia',
                'url' => 'https://www.instagram.com/p/CcbV5CJvC26/',
                'foto' => '20220424143613.webp',
                'order' => 3,
                'keterangan' => NULL,
                'status' => 1,
                'created_at' => '2022-04-24 14:36:13',
                'updated_at' => '2022-04-24 14:36:13',
            ),
            3 => 
            array (
                'id' => 8,
                'nama' => 'Hari Air Sedunia',
                'url' => 'https://www.instagram.com/p/CbY46OvPFDT/',
                'foto' => '20220424143742.webp',
                'order' => 4,
                'keterangan' => NULL,
                'status' => 1,
                'created_at' => '2022-04-24 14:37:42',
                'updated_at' => '2022-04-24 14:37:42',
            ),
            4 => 
            array (
                'id' => 9,
                'nama' => 'Hari Hutan Internasional',
                'url' => 'https://www.instagram.com/p/CbWfvU3Pg0j/',
                'foto' => '20220424143833.webp',
                'order' => 5,
                'keterangan' => NULL,
                'status' => 1,
                'created_at' => '2022-04-24 14:38:33',
                'updated_at' => '2022-04-24 14:43:08',
            ),
            5 => 
            array (
                'id' => 10,
                'nama' => 'Hari Dongeng Sedunia',
                'url' => 'https://www.instagram.com/p/CbTpIYdvZzr/',
                'foto' => '20220424143930.webp',
                'order' => 6,
                'keterangan' => NULL,
                'status' => 1,
                'created_at' => '2022-04-24 14:39:30',
                'updated_at' => '2022-04-24 14:39:30',
            ),
        ));
        
        
    }
}