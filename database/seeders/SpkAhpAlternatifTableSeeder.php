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
                'id' => '5',
                'anggota_id' => '5',
                'created_at' => '2023-05-09 17:29:46',
                'updated_at' => '2023-05-10 12:50:52',
            ),
            1 => 
            array (
                'id' => '6',
                'anggota_id' => '2',
                'created_at' => '2023-05-09 17:30:20',
                'updated_at' => '2023-05-09 17:30:20',
            ),
            2 => 
            array (
                'id' => '7',
                'anggota_id' => '3',
                'created_at' => '2023-05-09 17:30:25',
                'updated_at' => '2023-05-09 17:30:25',
            ),
            3 => 
            array (
                'id' => '8',
                'anggota_id' => '4',
                'created_at' => '2023-05-09 17:30:39',
                'updated_at' => '2023-05-09 17:30:39',
            ),
            4 => 
            array (
                'id' => '10',
                'anggota_id' => '9',
                'created_at' => '2023-05-09 18:16:39',
                'updated_at' => '2023-05-09 18:16:39',
            ),
            5 => 
            array (
                'id' => '11',
                'anggota_id' => '10',
                'created_at' => '2023-05-09 18:21:07',
                'updated_at' => '2023-05-09 18:21:07',
            ),
            6 => 
            array (
                'id' => '12',
                'anggota_id' => '38',
                'created_at' => '2023-05-09 19:26:34',
                'updated_at' => '2023-05-09 19:26:34',
            ),
            7 => 
            array (
                'id' => '13',
                'anggota_id' => '183',
                'created_at' => '2023-05-09 19:27:13',
                'updated_at' => '2023-05-09 19:27:13',
            ),
        ));
        
        
    }
}