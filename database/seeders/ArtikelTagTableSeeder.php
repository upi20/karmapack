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
        ));
        
        
    }
}