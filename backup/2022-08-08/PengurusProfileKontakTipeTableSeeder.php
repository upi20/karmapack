<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengurusProfileKontakTipeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pengurus_profile_kontak_tipe')->delete();
        
        \DB::table('pengurus_profile_kontak_tipe')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Facebook',
                'icon' => 'fab fa-facebook-f',
                'keterangan' => 'Sosial Media',
                'status' => 1,
                'created_at' => '2022-04-18 04:04:06',
                'updated_at' => '2022-04-29 08:06:36',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Twitter',
                'icon' => 'fab fa-twitter',
                'keterangan' => 'Sosial Media',
                'status' => 1,
                'created_at' => '2022-04-18 04:05:42',
                'updated_at' => '2022-04-29 08:07:13',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Whatsapp',
                'icon' => 'fab fa-whatsapp',
                'keterangan' => 'Nomor Whatsapp Lain',
                'status' => 1,
                'created_at' => '2022-04-21 15:01:21',
                'updated_at' => '2022-04-29 08:06:54',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Youtube',
                'icon' => 'fab fa-youtube',
                'keterangan' => 'Youtube',
                'status' => 1,
                'created_at' => '2022-04-21 15:02:17',
                'updated_at' => '2022-04-29 08:07:03',
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'Instagram',
                'icon' => 'fab fa-instagram',
                'keterangan' => 'Sosial Media',
                'status' => 1,
                'created_at' => '2022-04-21 15:10:33',
                'updated_at' => '2022-04-29 08:07:21',
            ),
        ));
        
        
    }
}