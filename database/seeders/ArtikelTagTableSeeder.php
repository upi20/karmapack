<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArtikelTagTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('artikel_tag')->delete();
        
        \DB::table('artikel_tag')->insert(array (
            0 => 
            array (
                'id' => '2',
                'nama' => 'Kabinet Masagi',
                'slug' => 'kabinet-masagi',
                'status' => '1',
                'created_at' => '2022-04-13 19:53:46',
                'updated_at' => '2022-04-13 19:53:46',
            ),
            1 => 
            array (
                'id' => '3',
                'nama' => 'Bidang Keperempuanan',
                'slug' => 'bidang-keperempuanan',
                'status' => '1',
                'created_at' => '2022-04-17 14:46:50',
                'updated_at' => '2022-04-17 14:46:50',
            ),
            2 => 
            array (
                'id' => '4',
                'nama' => 'G30S PKI',
                'slug' => 'g30s-pki',
                'status' => '1',
                'created_at' => '2022-04-17 15:13:33',
                'updated_at' => '2022-04-17 15:13:33',
            ),
            3 => 
            array (
                'id' => '5',
                'nama' => 'Alumni',
                'slug' => 'alumni',
                'status' => '1',
                'created_at' => '2022-09-06 13:06:02',
                'updated_at' => '2022-09-06 13:06:02',
            ),
            4 => 
            array (
                'id' => '6',
                'nama' => 'Pelantikan',
                'slug' => 'pelantikan',
                'status' => '1',
                'created_at' => '2022-09-06 13:22:24',
                'updated_at' => '2022-09-06 13:22:24',
            ),
            5 => 
            array (
                'id' => '7',
                'nama' => 'Tag Baru',
                'slug' => 'tag-baru',
                'status' => '1',
                'created_at' => '2023-02-19 21:54:24',
                'updated_at' => '2023-02-19 21:54:24',
            ),
            6 => 
            array (
                'id' => '8',
                'nama' => 'Kabinet',
                'slug' => 'kabinet',
                'status' => '1',
                'created_at' => '2023-02-19 22:14:06',
                'updated_at' => '2023-02-19 22:14:06',
            ),
            7 => 
            array (
                'id' => '9',
                'nama' => 'Harlah',
                'slug' => 'harlah',
                'status' => '1',
                'created_at' => '2023-03-16 17:06:57',
                'updated_at' => '2023-03-16 17:06:57',
            ),
            8 => 
            array (
                'id' => '10',
                'nama' => 'Diskusi',
                'slug' => 'diskusi',
                'status' => '1',
                'created_at' => '2023-09-12 10:50:07',
                'updated_at' => '2023-09-12 10:50:07',
            ),
            9 => 
            array (
                'id' => '11',
                'nama' => 'Tentang',
                'slug' => 'tentang',
                'status' => '1',
                'created_at' => '2023-09-12 11:03:20',
                'updated_at' => '2023-09-12 11:03:20',
            ),
            10 => 
            array (
                'id' => '12',
                'nama' => 'Berproses',
                'slug' => 'berproses',
                'status' => '1',
                'created_at' => '2023-09-12 11:03:20',
                'updated_at' => '2023-09-12 11:03:20',
            ),
            11 => 
            array (
                'id' => '13',
                'nama' => 'kominfohariini',
                'slug' => 'kominfohariini',
                'status' => '1',
                'created_at' => '2023-09-12 11:11:23',
                'updated_at' => '2023-09-12 11:11:23',
            ),
        ));
        
        
    }
}