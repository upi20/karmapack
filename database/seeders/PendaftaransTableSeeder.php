<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PendaftaransTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pendaftarans')->delete();
        
        \DB::table('pendaftarans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Komunikasi dan Informasi',
                'deskripsi' => 'des',
                'pengumuman' => 'peng',
                'no_urut' => 1,
                'dari' => '2022-05-01',
                'sampai' => '2022-05-21',
                'route' => 'admin',
                'foto' => '20220501195849.png',
                'status' => 1,
                'created_at' => '2022-05-01 19:55:43',
                'updated_at' => '2022-05-01 20:00:43',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Komunikasi dan Informasi',
                'deskripsi' => 'a',
                'pengumuman' => 'a',
                'no_urut' => 1,
                'dari' => '2022-05-12',
                'sampai' => '2022-06-10',
                'route' => 'admin',
                'foto' => '20220501195930.webp',
                'status' => 2,
                'created_at' => '2022-05-01 19:59:30',
                'updated_at' => '2022-05-01 20:00:49',
            ),
        ));
        
        
    }
}