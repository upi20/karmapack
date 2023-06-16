<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SpkAhpKriteriaPerbandinganTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('spk_ahp_kriteria_perbandingan')->delete();
        
        \DB::table('spk_ahp_kriteria_perbandingan')->insert(array (
            0 => 
            array (
                'id' => '38',
                'nilai' => '1',
                'kriteria_x_id' => '10',
                'kriteria_y_id' => '10',
                'created_at' => '2023-05-08 20:04:45',
                'updated_at' => '2023-05-08 23:36:47',
            ),
            1 => 
            array (
                'id' => '39',
                'nilai' => '0.5',
                'kriteria_x_id' => '11',
                'kriteria_y_id' => '10',
                'created_at' => '2023-05-08 20:05:18',
                'updated_at' => '2023-05-08 23:35:57',
            ),
            2 => 
            array (
                'id' => '40',
                'nilai' => '1',
                'kriteria_x_id' => '11',
                'kriteria_y_id' => '11',
                'created_at' => '2023-05-08 20:05:18',
                'updated_at' => '2023-05-08 20:05:18',
            ),
            3 => 
            array (
                'id' => '41',
                'nilai' => '2',
                'kriteria_x_id' => '10',
                'kriteria_y_id' => '11',
                'created_at' => '2023-05-08 20:05:18',
                'updated_at' => '2023-05-08 23:35:57',
            ),
            4 => 
            array (
                'id' => '42',
                'nilai' => '4',
                'kriteria_x_id' => '12',
                'kriteria_y_id' => '10',
                'created_at' => '2023-05-08 20:06:22',
                'updated_at' => '2023-05-09 23:34:57',
            ),
            5 => 
            array (
                'id' => '43',
                'nilai' => '2',
                'kriteria_x_id' => '12',
                'kriteria_y_id' => '11',
                'created_at' => '2023-05-08 20:06:22',
                'updated_at' => '2023-05-08 22:23:36',
            ),
            6 => 
            array (
                'id' => '44',
                'nilai' => '1',
                'kriteria_x_id' => '12',
                'kriteria_y_id' => '12',
                'created_at' => '2023-05-08 20:06:22',
                'updated_at' => '2023-05-08 20:06:22',
            ),
            7 => 
            array (
                'id' => '45',
                'nilai' => '0.25',
                'kriteria_x_id' => '10',
                'kriteria_y_id' => '12',
                'created_at' => '2023-05-08 20:06:22',
                'updated_at' => '2023-05-09 23:34:57',
            ),
            8 => 
            array (
                'id' => '46',
                'nilai' => '0.5',
                'kriteria_x_id' => '11',
                'kriteria_y_id' => '12',
                'created_at' => '2023-05-08 20:06:22',
                'updated_at' => '2023-05-08 22:23:36',
            ),
            9 => 
            array (
                'id' => '47',
                'nilai' => '1',
                'kriteria_x_id' => '13',
                'kriteria_y_id' => '10',
                'created_at' => '2023-05-08 20:06:38',
                'updated_at' => '2023-05-08 20:06:38',
            ),
            10 => 
            array (
                'id' => '48',
                'nilai' => '2',
                'kriteria_x_id' => '13',
                'kriteria_y_id' => '11',
                'created_at' => '2023-05-08 20:06:38',
                'updated_at' => '2023-05-09 01:33:54',
            ),
            11 => 
            array (
                'id' => '49',
                'nilai' => '1',
                'kriteria_x_id' => '13',
                'kriteria_y_id' => '12',
                'created_at' => '2023-05-08 20:06:38',
                'updated_at' => '2023-05-08 20:06:38',
            ),
            12 => 
            array (
                'id' => '50',
                'nilai' => '1',
                'kriteria_x_id' => '13',
                'kriteria_y_id' => '13',
                'created_at' => '2023-05-08 20:06:38',
                'updated_at' => '2023-05-08 20:06:38',
            ),
            13 => 
            array (
                'id' => '51',
                'nilai' => '1',
                'kriteria_x_id' => '10',
                'kriteria_y_id' => '13',
                'created_at' => '2023-05-08 20:06:38',
                'updated_at' => '2023-05-08 23:37:18',
            ),
            14 => 
            array (
                'id' => '52',
                'nilai' => '0.5',
                'kriteria_x_id' => '11',
                'kriteria_y_id' => '13',
                'created_at' => '2023-05-08 20:06:38',
                'updated_at' => '2023-05-09 01:33:54',
            ),
            15 => 
            array (
                'id' => '53',
                'nilai' => '1',
                'kriteria_x_id' => '12',
                'kriteria_y_id' => '13',
                'created_at' => '2023-05-08 20:06:38',
                'updated_at' => '2023-05-08 20:06:38',
            ),
            16 => 
            array (
                'id' => '54',
                'nilai' => '1',
                'kriteria_x_id' => '14',
                'kriteria_y_id' => '10',
                'created_at' => '2023-05-08 20:06:50',
                'updated_at' => '2023-05-08 20:06:50',
            ),
            17 => 
            array (
                'id' => '55',
                'nilai' => '1',
                'kriteria_x_id' => '14',
                'kriteria_y_id' => '11',
                'created_at' => '2023-05-08 20:06:50',
                'updated_at' => '2023-05-08 20:06:50',
            ),
            18 => 
            array (
                'id' => '56',
                'nilai' => '1',
                'kriteria_x_id' => '14',
                'kriteria_y_id' => '12',
                'created_at' => '2023-05-08 20:06:50',
                'updated_at' => '2023-05-08 20:06:50',
            ),
            19 => 
            array (
                'id' => '57',
                'nilai' => '1',
                'kriteria_x_id' => '14',
                'kriteria_y_id' => '13',
                'created_at' => '2023-05-08 20:06:50',
                'updated_at' => '2023-05-08 20:06:50',
            ),
            20 => 
            array (
                'id' => '58',
                'nilai' => '1',
                'kriteria_x_id' => '14',
                'kriteria_y_id' => '14',
                'created_at' => '2023-05-08 20:06:50',
                'updated_at' => '2023-05-08 20:06:50',
            ),
            21 => 
            array (
                'id' => '59',
                'nilai' => '1',
                'kriteria_x_id' => '10',
                'kriteria_y_id' => '14',
                'created_at' => '2023-05-08 20:06:50',
                'updated_at' => '2023-05-08 20:06:50',
            ),
            22 => 
            array (
                'id' => '60',
                'nilai' => '1',
                'kriteria_x_id' => '11',
                'kriteria_y_id' => '14',
                'created_at' => '2023-05-08 20:06:50',
                'updated_at' => '2023-05-08 20:06:50',
            ),
            23 => 
            array (
                'id' => '61',
                'nilai' => '1',
                'kriteria_x_id' => '12',
                'kriteria_y_id' => '14',
                'created_at' => '2023-05-08 20:06:50',
                'updated_at' => '2023-05-08 20:06:50',
            ),
            24 => 
            array (
                'id' => '62',
                'nilai' => '1',
                'kriteria_x_id' => '13',
                'kriteria_y_id' => '14',
                'created_at' => '2023-05-08 20:06:50',
                'updated_at' => '2023-05-08 20:06:50',
            ),
        ));
        
        
    }
}