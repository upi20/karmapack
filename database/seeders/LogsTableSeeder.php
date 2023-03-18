<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('logs')->delete();
        
        \DB::table('logs')->insert(array (
            0 => 
            array (
                'id' => '1',
                'user_id' => '286',
                'log_date' => '2023-03-18 05:21:45',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.13","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            1 => 
            array (
                'id' => '2',
                'user_id' => '1',
                'log_date' => '2023-03-18 05:26:26',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.13","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            2 => 
            array (
                'id' => '3',
                'user_id' => '1',
                'log_date' => '2023-03-18 08:24:31',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.13","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.41"}',
            ),
            3 => 
            array (
                'id' => '4',
                'user_id' => '1',
                'log_date' => '2023-03-18 10:05:13',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.130.37","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            4 => 
            array (
                'id' => '5',
                'user_id' => '1',
                'log_date' => '2023-03-18 13:41:15',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.130.37","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.41"}',
            ),
            5 => 
            array (
                'id' => '6',
                'user_id' => '1',
                'log_date' => '2023-03-18 16:37:33',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.242.96","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            6 => 
            array (
                'id' => '7',
                'user_id' => '1',
                'log_date' => '2023-03-18 16:42:50',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.242.96","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            7 => 
            array (
                'id' => '8',
                'user_id' => '57',
                'log_date' => '2023-03-18 16:44:55',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.208.39","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX2180) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/108.0.0.0 Mobile Safari\\/537.36"}',
            ),
            8 => 
            array (
                'id' => '9',
                'user_id' => '57',
                'log_date' => '2023-03-18 16:46:48',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.208.39","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX2180) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/108.0.0.0 Mobile Safari\\/537.36"}',
            ),
            9 => 
            array (
                'id' => '10',
                'user_id' => '185',
                'log_date' => '2023-03-18 18:53:18',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.75.56","user_agent":"Mozilla\\/5.0 (Linux; Android 11; V2026) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/106.0.0.0 Mobile Safari\\/537.36"}',
            ),
            10 => 
            array (
                'id' => '11',
                'user_id' => '185',
                'log_date' => '2023-03-18 18:58:58',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.75.56","user_agent":"Mozilla\\/5.0 (Linux; Android 11; V2026) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/106.0.0.0 Mobile Safari\\/537.36"}',
            ),
            11 => 
            array (
                'id' => '12',
                'user_id' => '205',
                'log_date' => '2023-03-18 19:24:29',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.217.144","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX3263) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/99.0.4844.88 Mobile Safari\\/537.36"}',
            ),
            12 => 
            array (
                'id' => '13',
                'user_id' => '58',
                'log_date' => '2023-03-18 19:26:05',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.217.144","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX3263) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/99.0.4844.88 Mobile Safari\\/537.36"}',
            ),
            13 => 
            array (
                'id' => '14',
                'user_id' => '26',
                'log_date' => '2023-03-18 19:54:39',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.10.68.202","user_agent":"Mozilla\\/5.0 (Linux; Android 10; V2027) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/109.0.0.0 Mobile Safari\\/537.36"}',
            ),
            14 => 
            array (
                'id' => '15',
                'user_id' => '26',
                'log_date' => '2023-03-18 19:58:42',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.10.68.202","user_agent":"Mozilla\\/5.0 (Linux; Android 10; V2027) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/109.0.0.0 Mobile Safari\\/537.36"}',
            ),
            15 => 
            array (
                'id' => '16',
                'user_id' => '79',
                'log_date' => '2023-03-18 20:30:33',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.215.114","user_agent":"Mozilla\\/5.0 (Linux; Android 13; SM-A127F) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/104.0.0.0 Mobile Safari\\/537.36"}',
            ),
            16 => 
            array (
                'id' => '17',
                'user_id' => '79',
                'log_date' => '2023-03-18 20:35:29',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.215.114","user_agent":"Mozilla\\/5.0 (Linux; Android 13; SM-A127F) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/104.0.0.0 Mobile Safari\\/537.36"}',
            ),
            17 => 
            array (
                'id' => '18',
                'user_id' => '110',
                'log_date' => '2023-03-18 20:42:53',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.216.17","user_agent":"Mozilla\\/5.0 (Linux; Android 13; V2110) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/105.0.0.0 Mobile Safari\\/537.36"}',
            ),
            18 => 
            array (
                'id' => '19',
                'user_id' => '110',
                'log_date' => '2023-03-18 20:45:10',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.216.17","user_agent":"Mozilla\\/5.0 (Linux; Android 13; V2110) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/105.0.0.0 Mobile Safari\\/537.36"}',
            ),
            19 => 
            array (
                'id' => '20',
                'user_id' => '110',
                'log_date' => '2023-03-18 21:00:58',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.216.17","user_agent":"Mozilla\\/5.0 (Linux; Android 13; V2110) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/105.0.0.0 Mobile Safari\\/537.36"}',
            ),
            20 => 
            array (
                'id' => '21',
                'user_id' => '287',
                'log_date' => '2023-03-18 23:07:41',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"140.213.41.116","user_agent":"Mozilla\\/5.0 (Linux; Android 11; SM-A035F) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            21 => 
            array (
                'id' => '22',
                'user_id' => '113',
                'log_date' => '2023-03-18 23:09:25',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.212.129","user_agent":"Mozilla\\/5.0 (Linux; Android 11; SM-A207F) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/110.0.0.0 Mobile Safari\\/537.36"}',
            ),
            22 => 
            array (
                'id' => '23',
                'user_id' => '110',
                'log_date' => '2023-03-18 23:14:03',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.216.17","user_agent":"Mozilla\\/5.0 (Linux; Android 13; V2110) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/105.0.0.0 Mobile Safari\\/537.36"}',
            ),
            23 => 
            array (
                'id' => '24',
                'user_id' => '57',
                'log_date' => '2023-03-19 00:50:45',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.210.0","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX2180) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/108.0.0.0 Mobile Safari\\/537.36"}',
            ),
            24 => 
            array (
                'id' => '25',
                'user_id' => '1',
                'log_date' => '2023-03-19 00:55:24',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.242.82","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
        ));
        
        
    }
}