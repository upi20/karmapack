<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SpkAhpAlternatifTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('spk_ahp_alternatif')->delete();
        
        \DB::table('spk_ahp_alternatif')->insert(array (
            0 => 
            array (
                'id' => 5,
                'anggota_id' => 1,
                'created_at' => '2023-05-09 17:29:46',
                'updated_at' => '2023-05-09 17:29:46',
            ),
            1 => 
            array (
                'id' => 6,
                'anggota_id' => 2,
                'created_at' => '2023-05-09 17:30:20',
                'updated_at' => '2023-05-09 17:30:20',
            ),
            2 => 
            array (
                'id' => 7,
                'anggota_id' => 3,
                'created_at' => '2023-05-09 17:30:25',
                'updated_at' => '2023-05-09 17:30:25',
            ),
            3 => 
            array (
                'id' => 8,
                'anggota_id' => 4,
                'created_at' => '2023-05-09 17:30:39',
                'updated_at' => '2023-05-09 17:30:39',
            ),
            4 => 
            array (
                'id' => 9,
                'anggota_id' => 6,
                'created_at' => '2023-05-09 18:16:12',
                'updated_at' => '2023-05-09 18:16:12',
            ),
            5 => 
            array (
                'id' => 10,
                'anggota_id' => 9,
                'created_at' => '2023-05-09 18:16:39',
                'updated_at' => '2023-05-09 18:16:39',
            ),
            6 => 
            array (
                'id' => 11,
                'anggota_id' => 10,
                'created_at' => '2023-05-09 18:21:07',
                'updated_at' => '2023-05-09 18:21:07',
            ),
        ));
        
        
    }
}