<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SpkAhpKriteriaJenisPerbandinganTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('spk_ahp_kriteria_jenis_perbandingan')->delete();
        
        \DB::table('spk_ahp_kriteria_jenis_perbandingan')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nilai' => '1',
                'kriteria_x_id' => '1',
                'kriteria_y_id' => '1',
                'created_at' => '2023-05-09 11:07:04',
                'updated_at' => '2023-05-09 11:07:04',
            ),
            1 => 
            array (
                'id' => '2',
                'nilai' => '2',
                'kriteria_x_id' => '2',
                'kriteria_y_id' => '1',
                'created_at' => '2023-05-09 11:07:21',
                'updated_at' => '2023-05-09 11:41:44',
            ),
            2 => 
            array (
                'id' => '3',
                'nilai' => '1',
                'kriteria_x_id' => '2',
                'kriteria_y_id' => '2',
                'created_at' => '2023-05-09 11:07:21',
                'updated_at' => '2023-05-09 11:07:21',
            ),
            3 => 
            array (
                'id' => '4',
                'nilai' => '0.5',
                'kriteria_x_id' => '1',
                'kriteria_y_id' => '2',
                'created_at' => '2023-05-09 11:07:21',
                'updated_at' => '2023-05-09 11:41:44',
            ),
            4 => 
            array (
                'id' => '5',
                'nilai' => '3',
                'kriteria_x_id' => '3',
                'kriteria_y_id' => '1',
                'created_at' => '2023-05-09 11:07:30',
                'updated_at' => '2023-05-09 11:41:49',
            ),
            5 => 
            array (
                'id' => '6',
                'nilai' => '2',
                'kriteria_x_id' => '3',
                'kriteria_y_id' => '2',
                'created_at' => '2023-05-09 11:07:30',
                'updated_at' => '2023-05-09 11:42:02',
            ),
            6 => 
            array (
                'id' => '7',
                'nilai' => '1',
                'kriteria_x_id' => '3',
                'kriteria_y_id' => '3',
                'created_at' => '2023-05-09 11:07:30',
                'updated_at' => '2023-05-09 11:07:30',
            ),
            7 => 
            array (
                'id' => '8',
                'nilai' => '0.33333333333333',
                'kriteria_x_id' => '1',
                'kriteria_y_id' => '3',
                'created_at' => '2023-05-09 11:07:30',
                'updated_at' => '2023-05-09 11:41:49',
            ),
            8 => 
            array (
                'id' => '9',
                'nilai' => '0.5',
                'kriteria_x_id' => '2',
                'kriteria_y_id' => '3',
                'created_at' => '2023-05-09 11:07:30',
                'updated_at' => '2023-05-09 11:42:02',
            ),
            9 => 
            array (
                'id' => '10',
                'nilai' => '1',
                'kriteria_x_id' => '4',
                'kriteria_y_id' => '4',
                'created_at' => '2023-05-09 11:09:37',
                'updated_at' => '2023-05-09 11:09:37',
            ),
            10 => 
            array (
                'id' => '11',
                'nilai' => '2',
                'kriteria_x_id' => '5',
                'kriteria_y_id' => '4',
                'created_at' => '2023-05-09 11:09:48',
                'updated_at' => '2023-05-09 11:42:26',
            ),
            11 => 
            array (
                'id' => '12',
                'nilai' => '1',
                'kriteria_x_id' => '5',
                'kriteria_y_id' => '5',
                'created_at' => '2023-05-09 11:09:48',
                'updated_at' => '2023-05-09 11:09:48',
            ),
            12 => 
            array (
                'id' => '13',
                'nilai' => '0.5',
                'kriteria_x_id' => '4',
                'kriteria_y_id' => '5',
                'created_at' => '2023-05-09 11:09:48',
                'updated_at' => '2023-05-09 11:42:26',
            ),
            13 => 
            array (
                'id' => '14',
                'nilai' => '3',
                'kriteria_x_id' => '6',
                'kriteria_y_id' => '4',
                'created_at' => '2023-05-09 11:09:57',
                'updated_at' => '2023-05-09 11:42:33',
            ),
            14 => 
            array (
                'id' => '15',
                'nilai' => '2',
                'kriteria_x_id' => '6',
                'kriteria_y_id' => '5',
                'created_at' => '2023-05-09 11:09:57',
                'updated_at' => '2023-05-09 11:42:51',
            ),
            15 => 
            array (
                'id' => '16',
                'nilai' => '1',
                'kriteria_x_id' => '6',
                'kriteria_y_id' => '6',
                'created_at' => '2023-05-09 11:09:57',
                'updated_at' => '2023-05-09 11:09:57',
            ),
            16 => 
            array (
                'id' => '17',
                'nilai' => '0.33333333333333',
                'kriteria_x_id' => '4',
                'kriteria_y_id' => '6',
                'created_at' => '2023-05-09 11:09:57',
                'updated_at' => '2023-05-09 11:42:33',
            ),
            17 => 
            array (
                'id' => '18',
                'nilai' => '0.5',
                'kriteria_x_id' => '5',
                'kriteria_y_id' => '6',
                'created_at' => '2023-05-09 11:09:57',
                'updated_at' => '2023-05-09 11:42:51',
            ),
            18 => 
            array (
                'id' => '33',
                'nilai' => '1',
                'kriteria_x_id' => '9',
                'kriteria_y_id' => '9',
                'created_at' => '2023-05-09 11:43:28',
                'updated_at' => '2023-05-09 11:43:28',
            ),
            19 => 
            array (
                'id' => '34',
                'nilai' => '2',
                'kriteria_x_id' => '10',
                'kriteria_y_id' => '9',
                'created_at' => '2023-05-09 11:43:40',
                'updated_at' => '2023-05-09 11:45:24',
            ),
            20 => 
            array (
                'id' => '35',
                'nilai' => '1',
                'kriteria_x_id' => '10',
                'kriteria_y_id' => '10',
                'created_at' => '2023-05-09 11:43:40',
                'updated_at' => '2023-05-09 11:43:40',
            ),
            21 => 
            array (
                'id' => '36',
                'nilai' => '0.5',
                'kriteria_x_id' => '9',
                'kriteria_y_id' => '10',
                'created_at' => '2023-05-09 11:43:40',
                'updated_at' => '2023-05-09 11:45:24',
            ),
            22 => 
            array (
                'id' => '37',
                'nilai' => '3',
                'kriteria_x_id' => '11',
                'kriteria_y_id' => '9',
                'created_at' => '2023-05-09 11:44:02',
                'updated_at' => '2023-05-09 11:45:32',
            ),
            23 => 
            array (
                'id' => '38',
                'nilai' => '2',
                'kriteria_x_id' => '11',
                'kriteria_y_id' => '10',
                'created_at' => '2023-05-09 11:44:02',
                'updated_at' => '2023-05-09 11:46:06',
            ),
            24 => 
            array (
                'id' => '39',
                'nilai' => '1',
                'kriteria_x_id' => '11',
                'kriteria_y_id' => '11',
                'created_at' => '2023-05-09 11:44:02',
                'updated_at' => '2023-05-09 11:44:02',
            ),
            25 => 
            array (
                'id' => '40',
                'nilai' => '0.33333333333333',
                'kriteria_x_id' => '9',
                'kriteria_y_id' => '11',
                'created_at' => '2023-05-09 11:44:02',
                'updated_at' => '2023-05-09 11:45:32',
            ),
            26 => 
            array (
                'id' => '41',
                'nilai' => '0.5',
                'kriteria_x_id' => '10',
                'kriteria_y_id' => '11',
                'created_at' => '2023-05-09 11:44:02',
                'updated_at' => '2023-05-09 11:46:06',
            ),
            27 => 
            array (
                'id' => '42',
                'nilai' => '4',
                'kriteria_x_id' => '12',
                'kriteria_y_id' => '9',
                'created_at' => '2023-05-09 11:44:25',
                'updated_at' => '2023-05-09 11:45:38',
            ),
            28 => 
            array (
                'id' => '43',
                'nilai' => '3',
                'kriteria_x_id' => '12',
                'kriteria_y_id' => '10',
                'created_at' => '2023-05-09 11:44:25',
                'updated_at' => '2023-05-09 11:46:17',
            ),
            29 => 
            array (
                'id' => '44',
                'nilai' => '2',
                'kriteria_x_id' => '12',
                'kriteria_y_id' => '11',
                'created_at' => '2023-05-09 11:44:25',
                'updated_at' => '2023-05-09 11:46:36',
            ),
            30 => 
            array (
                'id' => '45',
                'nilai' => '1',
                'kriteria_x_id' => '12',
                'kriteria_y_id' => '12',
                'created_at' => '2023-05-09 11:44:25',
                'updated_at' => '2023-05-09 11:44:25',
            ),
            31 => 
            array (
                'id' => '46',
                'nilai' => '0.25',
                'kriteria_x_id' => '9',
                'kriteria_y_id' => '12',
                'created_at' => '2023-05-09 11:44:25',
                'updated_at' => '2023-05-09 11:45:38',
            ),
            32 => 
            array (
                'id' => '47',
                'nilai' => '0.33333333333333',
                'kriteria_x_id' => '10',
                'kriteria_y_id' => '12',
                'created_at' => '2023-05-09 11:44:25',
                'updated_at' => '2023-05-09 11:46:17',
            ),
            33 => 
            array (
                'id' => '48',
                'nilai' => '0.5',
                'kriteria_x_id' => '11',
                'kriteria_y_id' => '12',
                'created_at' => '2023-05-09 11:44:25',
                'updated_at' => '2023-05-09 11:46:36',
            ),
            34 => 
            array (
                'id' => '49',
                'nilai' => '5',
                'kriteria_x_id' => '13',
                'kriteria_y_id' => '9',
                'created_at' => '2023-05-09 11:44:36',
                'updated_at' => '2023-05-09 11:45:44',
            ),
            35 => 
            array (
                'id' => '50',
                'nilai' => '4',
                'kriteria_x_id' => '13',
                'kriteria_y_id' => '10',
                'created_at' => '2023-05-09 11:44:36',
                'updated_at' => '2023-05-09 11:46:22',
            ),
            36 => 
            array (
                'id' => '51',
                'nilai' => '3',
                'kriteria_x_id' => '13',
                'kriteria_y_id' => '11',
                'created_at' => '2023-05-09 11:44:36',
                'updated_at' => '2023-05-09 11:46:43',
            ),
            37 => 
            array (
                'id' => '52',
                'nilai' => '2',
                'kriteria_x_id' => '13',
                'kriteria_y_id' => '12',
                'created_at' => '2023-05-09 11:44:36',
                'updated_at' => '2023-05-09 11:47:04',
            ),
            38 => 
            array (
                'id' => '53',
                'nilai' => '1',
                'kriteria_x_id' => '13',
                'kriteria_y_id' => '13',
                'created_at' => '2023-05-09 11:44:36',
                'updated_at' => '2023-05-09 11:44:36',
            ),
            39 => 
            array (
                'id' => '54',
                'nilai' => '0.2',
                'kriteria_x_id' => '9',
                'kriteria_y_id' => '13',
                'created_at' => '2023-05-09 11:44:36',
                'updated_at' => '2023-05-09 11:45:44',
            ),
            40 => 
            array (
                'id' => '55',
                'nilai' => '0.25',
                'kriteria_x_id' => '10',
                'kriteria_y_id' => '13',
                'created_at' => '2023-05-09 11:44:37',
                'updated_at' => '2023-05-09 11:46:22',
            ),
            41 => 
            array (
                'id' => '56',
                'nilai' => '0.33333333333333',
                'kriteria_x_id' => '11',
                'kriteria_y_id' => '13',
                'created_at' => '2023-05-09 11:44:37',
                'updated_at' => '2023-05-09 11:46:43',
            ),
            42 => 
            array (
                'id' => '57',
                'nilai' => '0.5',
                'kriteria_x_id' => '12',
                'kriteria_y_id' => '13',
                'created_at' => '2023-05-09 11:44:37',
                'updated_at' => '2023-05-09 11:47:04',
            ),
            43 => 
            array (
                'id' => '58',
                'nilai' => '6',
                'kriteria_x_id' => '14',
                'kriteria_y_id' => '9',
                'created_at' => '2023-05-09 11:44:55',
                'updated_at' => '2023-05-09 11:45:51',
            ),
            44 => 
            array (
                'id' => '59',
                'nilai' => '5',
                'kriteria_x_id' => '14',
                'kriteria_y_id' => '10',
                'created_at' => '2023-05-09 11:44:55',
                'updated_at' => '2023-05-09 11:46:27',
            ),
            45 => 
            array (
                'id' => '60',
                'nilai' => '4',
                'kriteria_x_id' => '14',
                'kriteria_y_id' => '11',
                'created_at' => '2023-05-09 11:44:55',
                'updated_at' => '2023-05-09 11:46:49',
            ),
            46 => 
            array (
                'id' => '61',
                'nilai' => '3',
                'kriteria_x_id' => '14',
                'kriteria_y_id' => '12',
                'created_at' => '2023-05-09 11:44:55',
                'updated_at' => '2023-05-09 11:47:14',
            ),
            47 => 
            array (
                'id' => '62',
                'nilai' => '2',
                'kriteria_x_id' => '14',
                'kriteria_y_id' => '13',
                'created_at' => '2023-05-09 11:44:55',
                'updated_at' => '2023-05-09 11:47:23',
            ),
            48 => 
            array (
                'id' => '63',
                'nilai' => '1',
                'kriteria_x_id' => '14',
                'kriteria_y_id' => '14',
                'created_at' => '2023-05-09 11:44:55',
                'updated_at' => '2023-05-09 11:44:55',
            ),
            49 => 
            array (
                'id' => '64',
                'nilai' => '0.16666666666667',
                'kriteria_x_id' => '9',
                'kriteria_y_id' => '14',
                'created_at' => '2023-05-09 11:44:55',
                'updated_at' => '2023-05-09 11:45:51',
            ),
            50 => 
            array (
                'id' => '65',
                'nilai' => '0.2',
                'kriteria_x_id' => '10',
                'kriteria_y_id' => '14',
                'created_at' => '2023-05-09 11:44:55',
                'updated_at' => '2023-05-09 11:46:27',
            ),
            51 => 
            array (
                'id' => '66',
                'nilai' => '0.25',
                'kriteria_x_id' => '11',
                'kriteria_y_id' => '14',
                'created_at' => '2023-05-09 11:44:55',
                'updated_at' => '2023-05-09 11:46:49',
            ),
            52 => 
            array (
                'id' => '67',
                'nilai' => '0.33333333333333',
                'kriteria_x_id' => '12',
                'kriteria_y_id' => '14',
                'created_at' => '2023-05-09 11:44:55',
                'updated_at' => '2023-05-09 11:47:14',
            ),
            53 => 
            array (
                'id' => '68',
                'nilai' => '0.5',
                'kriteria_x_id' => '13',
                'kriteria_y_id' => '14',
                'created_at' => '2023-05-09 11:44:55',
                'updated_at' => '2023-05-09 11:47:23',
            ),
            54 => 
            array (
                'id' => '70',
                'nilai' => '1',
                'kriteria_x_id' => '16',
                'kriteria_y_id' => '16',
                'created_at' => '2023-05-09 11:48:11',
                'updated_at' => '2023-05-09 11:48:11',
            ),
            55 => 
            array (
                'id' => '71',
                'nilai' => '0.5',
                'kriteria_x_id' => '17',
                'kriteria_y_id' => '16',
                'created_at' => '2023-05-09 11:48:19',
                'updated_at' => '2023-05-09 11:48:53',
            ),
            56 => 
            array (
                'id' => '72',
                'nilai' => '1',
                'kriteria_x_id' => '17',
                'kriteria_y_id' => '17',
                'created_at' => '2023-05-09 11:48:19',
                'updated_at' => '2023-05-09 11:48:19',
            ),
            57 => 
            array (
                'id' => '73',
                'nilai' => '2',
                'kriteria_x_id' => '16',
                'kriteria_y_id' => '17',
                'created_at' => '2023-05-09 11:48:19',
                'updated_at' => '2023-05-09 11:48:53',
            ),
            58 => 
            array (
                'id' => '74',
                'nilai' => '0.33333333333333',
                'kriteria_x_id' => '18',
                'kriteria_y_id' => '16',
                'created_at' => '2023-05-09 11:48:30',
                'updated_at' => '2023-05-09 11:49:01',
            ),
            59 => 
            array (
                'id' => '75',
                'nilai' => '0.5',
                'kriteria_x_id' => '18',
                'kriteria_y_id' => '17',
                'created_at' => '2023-05-09 11:48:30',
                'updated_at' => '2023-05-09 11:49:07',
            ),
            60 => 
            array (
                'id' => '76',
                'nilai' => '1',
                'kriteria_x_id' => '18',
                'kriteria_y_id' => '18',
                'created_at' => '2023-05-09 11:48:30',
                'updated_at' => '2023-05-09 11:48:30',
            ),
            61 => 
            array (
                'id' => '77',
                'nilai' => '3',
                'kriteria_x_id' => '16',
                'kriteria_y_id' => '18',
                'created_at' => '2023-05-09 11:48:30',
                'updated_at' => '2023-05-09 11:49:01',
            ),
            62 => 
            array (
                'id' => '78',
                'nilai' => '2',
                'kriteria_x_id' => '17',
                'kriteria_y_id' => '18',
                'created_at' => '2023-05-09 11:48:30',
                'updated_at' => '2023-05-09 11:49:07',
            ),
            63 => 
            array (
                'id' => '79',
                'nilai' => '1',
                'kriteria_x_id' => '19',
                'kriteria_y_id' => '19',
                'created_at' => '2023-05-09 11:49:48',
                'updated_at' => '2023-05-09 11:49:48',
            ),
            64 => 
            array (
                'id' => '80',
                'nilai' => '2',
                'kriteria_x_id' => '20',
                'kriteria_y_id' => '19',
                'created_at' => '2023-05-09 11:49:57',
                'updated_at' => '2023-05-09 11:50:15',
            ),
            65 => 
            array (
                'id' => '81',
                'nilai' => '1',
                'kriteria_x_id' => '20',
                'kriteria_y_id' => '20',
                'created_at' => '2023-05-09 11:49:57',
                'updated_at' => '2023-05-09 11:49:57',
            ),
            66 => 
            array (
                'id' => '82',
                'nilai' => '0.5',
                'kriteria_x_id' => '19',
                'kriteria_y_id' => '20',
                'created_at' => '2023-05-09 11:49:57',
                'updated_at' => '2023-05-09 11:50:15',
            ),
            67 => 
            array (
                'id' => '83',
                'nilai' => '3',
                'kriteria_x_id' => '21',
                'kriteria_y_id' => '19',
                'created_at' => '2023-05-09 11:50:04',
                'updated_at' => '2023-05-09 11:50:20',
            ),
            68 => 
            array (
                'id' => '84',
                'nilai' => '2',
                'kriteria_x_id' => '21',
                'kriteria_y_id' => '20',
                'created_at' => '2023-05-09 11:50:04',
                'updated_at' => '2023-05-09 11:50:40',
            ),
            69 => 
            array (
                'id' => '85',
                'nilai' => '1',
                'kriteria_x_id' => '21',
                'kriteria_y_id' => '21',
                'created_at' => '2023-05-09 11:50:04',
                'updated_at' => '2023-05-09 11:50:04',
            ),
            70 => 
            array (
                'id' => '86',
                'nilai' => '0.33333333333333',
                'kriteria_x_id' => '19',
                'kriteria_y_id' => '21',
                'created_at' => '2023-05-09 11:50:04',
                'updated_at' => '2023-05-09 11:50:20',
            ),
            71 => 
            array (
                'id' => '87',
                'nilai' => '0.5',
                'kriteria_x_id' => '20',
                'kriteria_y_id' => '21',
                'created_at' => '2023-05-09 11:50:04',
                'updated_at' => '2023-05-09 11:50:40',
            ),
        ));
        
        
    }
}