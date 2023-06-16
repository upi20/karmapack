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
                'id' => '5',
                'user_id' => '1',
                'log_date' => '2023-03-18 13:41:15',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.130.37","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.41"}',
            ),
            1 => 
            array (
                'id' => '6',
                'user_id' => '1',
                'log_date' => '2023-03-18 16:37:33',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.242.96","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            2 => 
            array (
                'id' => '7',
                'user_id' => '1',
                'log_date' => '2023-03-18 16:42:50',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.242.96","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            3 => 
            array (
                'id' => '8',
                'user_id' => '57',
                'log_date' => '2023-03-18 16:44:55',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.208.39","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX2180) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/108.0.0.0 Mobile Safari\\/537.36"}',
            ),
            4 => 
            array (
                'id' => '9',
                'user_id' => '57',
                'log_date' => '2023-03-18 16:46:48',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.208.39","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX2180) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/108.0.0.0 Mobile Safari\\/537.36"}',
            ),
            5 => 
            array (
                'id' => '10',
                'user_id' => '185',
                'log_date' => '2023-03-18 18:53:18',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.75.56","user_agent":"Mozilla\\/5.0 (Linux; Android 11; V2026) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/106.0.0.0 Mobile Safari\\/537.36"}',
            ),
            6 => 
            array (
                'id' => '11',
                'user_id' => '185',
                'log_date' => '2023-03-18 18:58:58',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.75.56","user_agent":"Mozilla\\/5.0 (Linux; Android 11; V2026) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/106.0.0.0 Mobile Safari\\/537.36"}',
            ),
            7 => 
            array (
                'id' => '12',
                'user_id' => '205',
                'log_date' => '2023-03-18 19:24:29',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.217.144","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX3263) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/99.0.4844.88 Mobile Safari\\/537.36"}',
            ),
            8 => 
            array (
                'id' => '13',
                'user_id' => '58',
                'log_date' => '2023-03-18 19:26:05',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.217.144","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX3263) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/99.0.4844.88 Mobile Safari\\/537.36"}',
            ),
            9 => 
            array (
                'id' => '14',
                'user_id' => '26',
                'log_date' => '2023-03-18 19:54:39',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.10.68.202","user_agent":"Mozilla\\/5.0 (Linux; Android 10; V2027) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/109.0.0.0 Mobile Safari\\/537.36"}',
            ),
            10 => 
            array (
                'id' => '15',
                'user_id' => '26',
                'log_date' => '2023-03-18 19:58:42',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.10.68.202","user_agent":"Mozilla\\/5.0 (Linux; Android 10; V2027) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/109.0.0.0 Mobile Safari\\/537.36"}',
            ),
            11 => 
            array (
                'id' => '16',
                'user_id' => '79',
                'log_date' => '2023-03-18 20:30:33',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.215.114","user_agent":"Mozilla\\/5.0 (Linux; Android 13; SM-A127F) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/104.0.0.0 Mobile Safari\\/537.36"}',
            ),
            12 => 
            array (
                'id' => '17',
                'user_id' => '79',
                'log_date' => '2023-03-18 20:35:29',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.215.114","user_agent":"Mozilla\\/5.0 (Linux; Android 13; SM-A127F) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/104.0.0.0 Mobile Safari\\/537.36"}',
            ),
            13 => 
            array (
                'id' => '18',
                'user_id' => '110',
                'log_date' => '2023-03-18 20:42:53',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.216.17","user_agent":"Mozilla\\/5.0 (Linux; Android 13; V2110) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/105.0.0.0 Mobile Safari\\/537.36"}',
            ),
            14 => 
            array (
                'id' => '19',
                'user_id' => '110',
                'log_date' => '2023-03-18 20:45:10',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.216.17","user_agent":"Mozilla\\/5.0 (Linux; Android 13; V2110) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/105.0.0.0 Mobile Safari\\/537.36"}',
            ),
            15 => 
            array (
                'id' => '20',
                'user_id' => '110',
                'log_date' => '2023-03-18 21:00:58',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.216.17","user_agent":"Mozilla\\/5.0 (Linux; Android 13; V2110) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/105.0.0.0 Mobile Safari\\/537.36"}',
            ),
            16 => 
            array (
                'id' => '21',
                'user_id' => '287',
                'log_date' => '2023-03-18 23:07:41',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"140.213.41.116","user_agent":"Mozilla\\/5.0 (Linux; Android 11; SM-A035F) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            17 => 
            array (
                'id' => '22',
                'user_id' => '113',
                'log_date' => '2023-03-18 23:09:25',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.212.129","user_agent":"Mozilla\\/5.0 (Linux; Android 11; SM-A207F) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/110.0.0.0 Mobile Safari\\/537.36"}',
            ),
            18 => 
            array (
                'id' => '23',
                'user_id' => '110',
                'log_date' => '2023-03-18 23:14:03',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.216.17","user_agent":"Mozilla\\/5.0 (Linux; Android 13; V2110) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/105.0.0.0 Mobile Safari\\/537.36"}',
            ),
            19 => 
            array (
                'id' => '24',
                'user_id' => '57',
                'log_date' => '2023-03-19 00:50:45',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.210.0","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX2180) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/108.0.0.0 Mobile Safari\\/537.36"}',
            ),
            20 => 
            array (
                'id' => '25',
                'user_id' => '1',
                'log_date' => '2023-03-19 00:55:24',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.242.82","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            21 => 
            array (
                'id' => '26',
                'user_id' => '185',
                'log_date' => '2023-03-19 06:25:01',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.74.168","user_agent":"Mozilla\\/5.0 (Linux; Android 11; V2026) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/106.0.0.0 Mobile Safari\\/537.36"}',
            ),
            22 => 
            array (
                'id' => '27',
                'user_id' => '114',
                'log_date' => '2023-03-19 08:24:28',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.13","user_agent":"Mozilla\\/5.0 (Linux; U; Android 10; id-id; Redmi 9C Build\\/QP1A.190711.020) AppleWebKit\\/537.36 (KHTML, like Gecko) Version\\/4.0 Chrome\\/100.0.4896.127 Mobile Safari\\/537.36 XiaoMi\\/MiuiBrowser\\/13.22.1-gn"}',
            ),
            23 => 
            array (
                'id' => '28',
                'user_id' => '1',
                'log_date' => '2023-03-19 10:40:35',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.243.98","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            24 => 
            array (
                'id' => '29',
                'user_id' => '93',
                'log_date' => '2023-03-19 10:41:32',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.248.18","user_agent":"Mozilla\\/5.0 (Linux; U; Android 12; id-id; Redmi Note 11 Build\\/SKQ1.211103.001) AppleWebKit\\/537.36 (KHTML, like Gecko) Version\\/4.0 Chrome\\/89.0.4389.116 Mobile Safari\\/537.36 XiaoMi\\/MiuiBrowser\\/13.6.0-gn"}',
            ),
            25 => 
            array (
                'id' => '30',
                'user_id' => '93',
                'log_date' => '2023-03-19 10:42:30',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.248.18","user_agent":"Mozilla\\/5.0 (Linux; U; Android 12; id-id; Redmi Note 11 Build\\/SKQ1.211103.001) AppleWebKit\\/537.36 (KHTML, like Gecko) Version\\/4.0 Chrome\\/89.0.4389.116 Mobile Safari\\/537.36 XiaoMi\\/MiuiBrowser\\/13.6.0-gn"}',
            ),
            26 => 
            array (
                'id' => '31',
                'user_id' => '93',
                'log_date' => '2023-03-19 10:45:11',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.248.18","user_agent":"Mozilla\\/5.0 (Linux; U; Android 12; id-id; Redmi Note 11 Build\\/SKQ1.211103.001) AppleWebKit\\/537.36 (KHTML, like Gecko) Version\\/4.0 Chrome\\/89.0.4389.116 Mobile Safari\\/537.36 XiaoMi\\/MiuiBrowser\\/13.6.0-gn"}',
            ),
            27 => 
            array (
                'id' => '32',
                'user_id' => '93',
                'log_date' => '2023-03-19 10:45:13',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.248.18","user_agent":"Mozilla\\/5.0 (Linux; U; Android 12; id-id; Redmi Note 11 Build\\/SKQ1.211103.001) AppleWebKit\\/537.36 (KHTML, like Gecko) Version\\/4.0 Chrome\\/89.0.4389.116 Mobile Safari\\/537.36 XiaoMi\\/MiuiBrowser\\/13.6.0-gn"}',
            ),
            28 => 
            array (
                'id' => '33',
                'user_id' => '1',
                'log_date' => '2023-03-20 10:09:06',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.13","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.44"}',
            ),
            29 => 
            array (
                'id' => '34',
                'user_id' => '1',
                'log_date' => '2023-03-20 10:21:51',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.13","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            30 => 
            array (
                'id' => '35',
                'user_id' => '1',
                'log_date' => '2023-03-20 20:03:39',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.13","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.44"}',
            ),
            31 => 
            array (
                'id' => '36',
                'user_id' => '1',
                'log_date' => '2023-03-20 22:34:54',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.13","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.44"}',
            ),
            32 => 
            array (
                'id' => '37',
                'user_id' => '1',
                'log_date' => '2023-03-21 11:17:18',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.243.15","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            33 => 
            array (
                'id' => '38',
                'user_id' => '110',
                'log_date' => '2023-03-21 11:35:25',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.214.40","user_agent":"Mozilla\\/5.0 (Linux; Android 13; V2110) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/105.0.0.0 Mobile Safari\\/537.36"}',
            ),
            34 => 
            array (
                'id' => '39',
                'user_id' => '57',
                'log_date' => '2023-03-21 12:09:11',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.216.190","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX2180) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/108.0.0.0 Mobile Safari\\/537.36"}',
            ),
            35 => 
            array (
                'id' => '40',
                'user_id' => '114',
                'log_date' => '2023-03-21 14:20:50',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"112.215.208.53","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/107.0.0.0 Safari\\/537.36"}',
            ),
            36 => 
            array (
                'id' => '41',
                'user_id' => '1',
                'log_date' => '2023-03-21 19:06:38',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.207.50","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            37 => 
            array (
                'id' => '42',
                'user_id' => '1',
                'log_date' => '2023-03-21 22:17:59',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.207.179","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.44"}',
            ),
            38 => 
            array (
                'id' => '43',
                'user_id' => '1',
                'log_date' => '2023-03-23 00:57:05',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.214.64","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.44"}',
            ),
            39 => 
            array (
                'id' => '44',
                'user_id' => '1',
                'log_date' => '2023-03-23 20:19:54',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.106.98","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            40 => 
            array (
                'id' => '45',
                'user_id' => '1',
                'log_date' => '2023-03-24 03:53:37',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.106.98","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.44"}',
            ),
            41 => 
            array (
                'id' => '46',
                'user_id' => '1',
                'log_date' => '2023-03-24 03:54:30',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.106.98","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.44"}',
            ),
            42 => 
            array (
                'id' => '47',
                'user_id' => '1',
                'log_date' => '2023-03-24 04:05:50',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.106.98","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.44"}',
            ),
            43 => 
            array (
                'id' => '48',
                'user_id' => '1',
                'log_date' => '2023-03-24 05:43:16',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.106.98","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.44"}',
            ),
            44 => 
            array (
                'id' => '49',
                'user_id' => '1',
                'log_date' => '2023-03-24 05:44:10',
                'table_name' => 'users',
                'log_type' => 'create',
                'data' => '{"name":"Isep lutpi nur testing","email":"iseplutpinur8@gmail.com","username":"isep-lutpi-nur-testing20230324054410","active":1,"updated_at":"2023-03-23T22:44:10.000000Z","created_at":"2023-03-23T22:44:10.000000Z","id":288,"profile_photo_url":"https:\\/\\/ui-avatars.com\\/api\\/?name=I+l+n+t&color=7F9CF5&background=EBF4FF"}',
            ),
            45 => 
            array (
                'id' => '50',
                'user_id' => '1',
                'log_date' => '2023-03-24 05:44:10',
                'table_name' => 'anggotas',
                'log_type' => 'create',
                'data' => '{"nama":"Isep lutpi nur testing","angkatan":"2022","telepon":"+6285798132505","whatsapp":"85798132055","user_id":288,"updated_at":"2023-03-23T22:44:10.000000Z","created_at":"2023-03-23T22:44:10.000000Z","id":263}',
            ),
            46 => 
            array (
                'id' => '51',
                'user_id' => '1',
                'log_date' => '2023-03-24 05:44:10',
                'table_name' => 'pend_sensus',
                'log_type' => 'create',
                'data' => '{"nama":"Isep lutpi nur testing","angkatan":"2022","email":"iseplutpinur8@gmail.com","whatsapp":"85798132055","telepon":"+6285798132505","status":2,"keterangan":"Sudah dijadikan pengguna dengan email: iseplutpinur8@gmail.com dan password: 12345678","updated_at":"2023-03-23T22:44:10.000000Z","created_at":"2023-03-23T22:44:10.000000Z","id":14}',
            ),
            47 => 
            array (
                'id' => '52',
                'user_id' => '1',
                'log_date' => '2023-03-24 05:44:28',
                'table_name' => 'anggotas',
                'log_type' => 'delete',
                'data' => '{"id":"263","nomor_anggota":null,"nama":"Isep lutpi nur testing","tanggal_lahir":null,"jenis_kelamin":null,"angkatan":"2022","province_id":null,"regency_id":null,"district_id":null,"village_id":null,"alamat_lengkap":null,"bio":null,"profesi":null,"foto":null,"telepon":"+6285798132505","whatsapp":"85798132055","status":null,"user_id":"288","created_at":"2023-03-24 05:44:10","updated_at":"2023-03-24 05:44:10"}',
            ),
            48 => 
            array (
                'id' => '53',
                'user_id' => '1',
                'log_date' => '2023-03-24 05:44:28',
                'table_name' => 'users',
                'log_type' => 'delete',
                'data' => '{"id":"288","name":"Isep lutpi nur testing","email":"iseplutpinur8@gmail.com","foto":null,"username":"isep-lutpi-nur-testing20230324054410","email_verified_at":null,"password":"$2y$10$f4ZCyN7chIIKv51gaCmPyuq\\/magODOIUY30EtUXPYoK6QhSjR59ei","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":"2023-03-24 05:44:10","updated_at":"2023-03-24 05:44:10"}',
            ),
            49 => 
            array (
                'id' => '54',
                'user_id' => '1',
                'log_date' => '2023-03-24 05:45:52',
                'table_name' => 'notif_depan_atas',
                'log_type' => 'create',
                'data' => '{"nama":"Sensus Anggota","deskripsi":"Sensus anggota sedang dilakukan, untuk semua anggota maupun alumni karmapack yang belum tercatat pada Aplikasi Sistem Informasi Anggota. diharapkan untuk mengisi sensus","dari":"2023-03-23","sampai":null,"link":"https:\\/\\/karmapack.id\\/pendaftaran\\/sensus","link_nama":"Klik disini","updated_at":"2023-03-23T22:45:52.000000Z","created_at":"2023-03-23T22:45:52.000000Z","id":3}',
            ),
            50 => 
            array (
                'id' => '55',
                'user_id' => '1',
                'log_date' => '2023-03-24 05:46:05',
                'table_name' => 'notif_depan_atas',
                'log_type' => 'edit',
                'data' => '{"id":"1","nama":"Hi i\'m Astro","deskripsi":"Hi i\'m Astro","dari":"2022-08-02","sampai":"2022-10-01","link":"https:\\/\\/breached.to\\/User-mr-astroboy","link_nama":"Klik disini","created_at":"2022-08-08 22:37:14","updated_at":"2022-10-22 06:57:26"}',
            ),
            51 => 
            array (
                'id' => '56',
                'user_id' => '1',
                'log_date' => '2023-03-24 05:48:00',
                'table_name' => 'notif_depan_atas',
                'log_type' => 'edit',
                'data' => '{"id":"3","nama":"Sensus Anggota","deskripsi":"Sensus anggota sedang dilakukan, untuk semua anggota maupun alumni karmapack yang belum tercatat pada Aplikasi Sistem Informasi Anggota. diharapkan untuk mengisi sensus","dari":"2023-03-23","sampai":null,"link":"https:\\/\\/karmapack.id\\/pendaftaran\\/sensus","link_nama":"Klik disini","created_at":"2023-03-24 05:45:52","updated_at":"2023-03-24 05:45:52"}',
            ),
            52 => 
            array (
                'id' => '57',
                'user_id' => '1',
                'log_date' => '2023-03-24 06:11:19',
                'table_name' => 'artikel',
                'log_type' => 'edit',
            'data' => '{"id":"30","nama":"Peringatan Hari Hutan Internasional","slug":"peringatan-hari-hutan-internasional2022","foto":"\\/assets\\/artikel\\/peringatan16508596430.png","detail":"<p class=\\"MsoNormal\\" style=\\"text-align: center; margin-bottom: 0cm; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\n\\"Times New Roman\\";color:#222222;mso-fareast-language:IN\'><br><\\/span><img style=\\"width: 367.4px; height: 441.22px;\\" data-bs-filename=\\"276121008_719900469175542_1271108511653924704_n.webp\\" src=\\"\\/assets\\/artikel\\/peringatan16508596430.png\\"><p class=\\"MsoNormal\\" style=\\"text-align: center; margin-bottom: 0cm; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><img style=\\"width: 800px;\\" data-bs-filename=\\"Peringatan-Hari-Hutan-Internasional.gif\\" src=\\"\\/assets\\/artikel\\/peringatan16508596431.png\\"><br><\\/p><p class=\\"MsoNormal\\" style=\\"text-align: center; margin-bottom: 0cm; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\n\\"Times New Roman\\";color:#222222;mso-fareast-language:IN\'>Peringatan Hari Hutan\\nInternasional<\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 0cm; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\n\\"Times New Roman\\";color:#222222;mso-fareast-language:IN\'><p><br><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 0cm; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\n\\"Times New Roman\\";color:#222222;mso-fareast-language:IN\'><p><br><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>Sejak tahun 2012, Majelis Umum PBB telah menetapkan tanggal 21 Maret\\nsebagai peringatan Hari Hutan Internasional. Tahun 2022 bertema: &acirc;&#128;&#156;<i>Forests\\nand sustainable production and consumption<\\/i>&acirc;&#128;&#157;.<a name=\\"_ednref1\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_edn1\\"><span style=\\"color:#56C696\\">[i]<\\/span><\\/a>&nbsp;Tema\\ntersebut berarti seluruh pihak harus mengakhiri berbagai bentuk pola konsumsi\\ndan produksi yang tidak berkelanjutan sehingga berdampak negatif terhadap\\nkelestarian ekosistem hutan. Sudah saatnya, seluruh stakeholders turut\\nmemberikan dukungan yang nyata dan kredibel atas setiap upaya pengelolaan hutan\\nberkelanjutan yang telah dilaksanakan oleh negara dan masyarakat.<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>Peringatan Hari Hutan Internasional meningkatkan kesadaran akan pentingnya\\nekosistem hutan. Menurut laporan PBB berjudul &acirc;&#128;&#156;<a href=\\"https:\\/\\/www.un.org\\/esa\\/forests\\/wp-content\\/uploads\\/2021\\/04\\/Global-Forest-Goals-Report-2021.pdf\\"><span style=\\"color:#56C696\\">the Global Forest Goals Report 2021<\\/span><\\/a>&acirc;&#128;&#157;\\nditerbitkan oleh Departemen Ekonomi dan Urusan Sosial PBB (the UN Department of\\nEconomic and Social Affairs\\/ UN DESA), melalui Sekretariat Forum PBB tentang\\nHutan (United Nations Forum on Forests Secretariat\\/ UNFFS), luasan hutan di\\npermukaan daratan bumi saat ini, mencapai 4 miliar hektar, atau setara 31% dari\\nluas daratan di dunia.<a name=\\"_ednref2\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_edn2\\"><span style=\\"color:#56C696\\">[ii]<\\/span><\\/a>&nbsp;Seluruh\\nnegara di dunia didorong untuk melakukan upaya secara lokal, nasional dan\\ninternasional untuk melaksanakan kegiatan terkait upaya pelestarian ekosistem\\nhutan. Mengingat berbagai manfaat yang telah diberikan oleh ekosistem hutan,\\nantara lain yaitu:<a name=\\"_ednref3\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_edn3\\"><span style=\\"color:#56C696\\">[iii]<\\/span><\\/a><p><\\/p><\\/span><\\/p><ul type=\\"disc\\">\\n<li class=\\"MsoNormal\\" style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'>Sektor\\nkehutanan menciptakan lapangan kerja bagi sedikitnya 33 juta orang dan\\nhasil hutan digunakan oleh miliaran orang. Diperkirakan lebih dari\\nsetengah produksi ekonomi dunia (seperti PDB) bergantung pada jasa\\nekosistem, termasuk yang disediakan oleh hutan. Lebih dari setengah total\\npenduduk dunia diperkirakan menggunakan hasil hutan bukan kayu adalah\\npenunjang kesejahteraan dan sumber mata pencaharian masyarakat.<p><\\/p><\\/span><\\/li>\\n<li class=\\"MsoNormal\\" style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'>Hutan\\nsangat penting untuk kesehatan planet dan kesejahteraan manusia. Hutan\\nmenutupi hampir sepertiga dari permukaan tanah bumi dan menyediakan\\nbarang-barang seperti kayu, bahan bakar, makanan dan pakan ternak,\\nmembantu memerangi perubahan iklim, melindungi keanekaragaman hayati,\\ntanah, sungai dan waduk, dan berfungsi sebagai area di mana orang bisa\\ndekat dengan alam.<p><\\/p><\\/span><\\/li>\\n<li class=\\"MsoNormal\\" style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'>Menggunakan\\nhutan secara berkelanjutan akan membantu kita beralih ke ekonomi yang\\ndidasarkan atas bahan baku yang terbarukan, dapat digunakan kembali, dan\\ndapat didaur ulang. Kayu dapat digunakan untuk berbagai tujuan, dengan\\ndampak lingkungan yang lebih rendah daripada banyak bahan alternatif. Kayu\\nyang digunakan sekali dapat digunakan kembali dan didaur ulang, sehingga\\nmemperpanjang umurnya dan semakin mengurangi jejak materialnya.<p><\\/p><\\/span><\\/li>\\n<li class=\\"MsoNormal\\" style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'>Memperluas\\npenggunaan hasil hutan berkontribusi pada netralitas karbon. Ilmu pengetahuan\\ndan inovasi menghasilkan produk baru yang menarik dari kayu dan pohon,\\ntermasuk tekstil, makanan, bahan bangunan, kosmetik, biokimia, bioplastik,\\ndan obat-obatan. Mengganti bahan yang kurang berkelanjutan dengan kayu\\nterbarukan dan produk berbasis pohon dapat mengurangi jejak karbon.<p><\\/p><\\/span><\\/li>\\n<li class=\\"MsoNormal\\" style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'>Kayu\\nyang lestari adalah bahan penting untuk menghijaukan kota. Sektor bangunan\\ndan konstruksi bertanggung jawab atas hampir 40 persen emisi gas rumah\\nkaca terkait energi secara global. Inovasi memungkinkan penggunaan lebih\\nbanyak kayu di gedung-gedung tinggi dan infrastruktur lainnya, membantu\\n&acirc;&#128;&#156;menghijaukan&acirc;&#128;&#157; kota, karena kayu menyimpan karbon, membutuhkan lebih\\nsedikit energi untuk diproduksi daripada banyak bahan konstruksi lainnya,\\ndan menyediakan insulasi yang baik.<p><\\/p><\\/span><\\/li>\\n<li class=\\"MsoNormal\\" style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'>Hutan\\nsangat penting untuk menunjang produksi pangan. Jasa ekosistem hutan,\\nseperti habitat keanekaragaman hayati, pengaturan iklim, kualitas air dan\\ntanah, dan penyerbukan sangatlah penting untuk sistem pangan pertanian\\nberkelanjutan dan memberi makan populasi global yang terus bertambah.\\nSelain itu, lebih dari tiga perempat rumah tangga pedesaan di seluruh\\ndunia diperkirakan memanen makanan liar dari hutan dan lingkungan lainnya.<p><\\/p><\\/span><\\/li>\\n<li class=\\"MsoNormal\\" style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'>Diperlukan\\nlebih banyak tindakan untuk menghentikan deforestasi dan degradasi hutan.\\nSejak tahun 1990, dunia telah kehilangan 420 juta hektar hutan (lebih\\nbesar dari luas negara India), dan masih terjadi deforestasi seluas 10\\njuta hektar per\\/ tahun, terutama karena ekspansi lahan pertanian.\\nPengelolaan hutan secara lestari dapat mengurangi deforestasi dan\\ndegradasi, memulihkan lanskap yang terdegradasi, dan menyediakan lapangan\\nkerja dan material terbarukan bagi masyarakat.<p><\\/p><\\/span><\\/li>\\n<li class=\\"MsoNormal\\" style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'>Pilih\\nproduk kayu dari sumber yang legal dan berkelanjutan. Konsumen dapat\\nberkontribusi pada pemanfaatan hutan yang berkelanjutan dengan memilih\\nproduk kayu dengan label atau sertifikasi yang menegaskan bahwa produk\\ntersebut berasal dari sumber yang legal dan berkelanjutan.<p><\\/p><\\/span><\\/li>\\n<\\/ul><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>&nbsp;<\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"text-align: center; margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><img style=\\"width: 709.247px; height: 319.388px;\\" data-bs-filename=\\"Peringatan-Hari-Hutan-Internasional-2.jpg\\" src=\\"\\/assets\\/artikel\\/peringatan16508596432.png\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'><br><\\/span><\\/p><p class=\\"MsoNormal\\" align=\\"center\\" style=\\"margin-bottom: 11.25pt; text-align: center; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><b><span style=\'font-size:10.5pt;\\nfont-family:\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";\\ncolor:#222222;mso-fareast-language:IN\'>Foto: sertifikasi ramah lingkungan untuk\\nproduk kehutanan, yang menjadi salah satu indikator bagi konsumen untuk\\nmenentukan hasil produksi hutan yang lestari.<\\/span><\\/b><span style=\'font-size:\\n10.5pt;font-family:\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";\\ncolor:#222222;mso-fareast-language:IN\'><p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>Selaras dengan hal tersebut, Sekretaris Jenderal PBB Ant&Atilde;&sup3;nio Guterres juga\\nmengungkapkan, bahwa hutan yang sehat sangat penting bagi manusia dan planet\\nini. Hutan berfungsi sebagai filter alami, menyediakan udara dan air bersih,\\ndan mereka adalah surga keanekaragaman hayati. Membantu mengatur iklim kita\\ndengan mempengaruhi pola curah hujan, mendinginkan daerah perkotaan dan\\nmenyerap sepertiga dari emisi gas rumah kaca. Hutan menjadi sumber mata\\npencaharian bagi banyak komunitas dan masyarakat adat, serta sumber dari\\nobat-obatan, makanan, sekaligus tempat perlindungan. Sayangnya, masih terjadi\\nkerusakan atau kehancuran hutan sekitar 10 juta hektar hutan setiap tahunnya.<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>Indonesia sebagai salah satu negara pemilik hutan terluas di dunia, sejak\\nera orde baru telah mengandalkan hutan sebagai penunjang pertumbuhan\\nekonominya. Karenanya kelestarian hutan menjadi suatu keniscayaan dalam upaya\\nmewujudkan pembangunan berkelanjutan di Indonesia. Menurut Laporan State Forest\\nIndonesian Tahun 2020, yang diterbitkan Kementerian Kehutanan dan Lingkungan\\nHidup bekerjasama dengan FAO (Food and Agriculture Organization) Perserikatan\\nBangsa-Bangsa, luasan kawasan di Indonesia yang ditetapkan sebagai Kawasan\\nHutan mencapai 120 Juta Ha, atau seluas 64 persen dari seluruh wilayah daratan\\nIndonesia. Karena letak geografisnya, Indonesia merupakan salah satu negara\\ndengan tingkat keanekaragaman hayati dan endemisitas yang sangat tinggi, serta\\nmemiliki tingkat keanekaragaman hayati yang lebih tinggi daripada negara lain\\ndi dunia.<a name=\\"_ednref4\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_edn4\\"><span style=\\"color:#56C696\\">[iv]<\\/span><\\/a><p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>Kawasan yang ditetapkan sebagai kawasan Hutan Produksi Indonesia seluas\\n68,8 juta hektar, dimana luasan kawasan yang telah diberikan konsesi mencapai\\n34,18 juta hektar, sedangkan sisanya 34,62 juta hektar belum dibebankan izin.<a name=\\"_ednref5\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_edn5\\"><span style=\\"color:#56C696\\">[v]<\\/span><\\/a>&nbsp;Sedangkan\\nmenurut Laporan Status Hutan dan Kehutanan Indonesia pada tahun 2018, luasan\\nkawasan hutan yang telah diberikan izin konsesi mencapai 30,7 Juta Hektar, dan\\nseluas 38,1 juta hektar sisanya belum dibebani izin apapun.<a name=\\"_ednref6\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_edn6\\"><span style=\\"color:#56C696\\">[vi]<\\/span><\\/a><p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>&nbsp;<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><img style=\\"width: 1113.2px;\\" data-bs-filename=\\"Peringatan-Hari-Hutan-Internasional-3.jpg\\" src=\\"\\/assets\\/artikel\\/peringatan16508596433.png\\"><br><\\/p><p class=\\"MsoNormal\\" align=\\"center\\" style=\\"margin-bottom: 11.25pt; text-align: center; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><b><span style=\'font-size:10.5pt;\\nfont-family:\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";\\ncolor:#222222;mso-fareast-language:IN\'>Foto: Kayu bulat (<i>tangiable<\\/i>) yang\\nmasih menjadi tumpuan ekonomi hutan di Indonesia<\\/span><\\/b><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\n\\"Times New Roman\\";color:#222222;mso-fareast-language:IN\'><p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>Menurut data Statistik Produksi Kehutanan 2020 yang diterbitkan oleh BPS,\\npada tahun 2020 Hutan di Indonesia menghasilkan kayu bulat sebesar 61,02 juta\\nm&Acirc;&sup3;. Sebesar 68,39 persen produksi kayu bulat di Indonesia berasal dari Pulau\\nSumatra, mencapai 41,73 juta m&Acirc;&sup3;. Produksi kayu bulat terbesar adalah kayu\\nakasia sebanyak 32,114 juta m&Acirc;&sup3; (52,63 persen), kayu kelompok rimba campuran\\nsebanyak 20,655 juta m&Acirc;&sup3; (33,85 persen), kayu kelompok meranti sebanyak 4,795\\njuta m&Acirc;&sup3; (7,86 persen), kayu kelompok indah sebanyak 0,492 juta m&Acirc;&sup3; (0,81\\npersen), kayu kelompok eboni sebanyak 0,001 juta m&Acirc;&sup3; (0,00 persen), sedangkan\\nsisanya kayu lainnya sebanyak 2,961 juta m&Acirc;&sup3; (4,85 persen).<a name=\\"_ednref7\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_edn7\\"><span style=\\"color:#56C696\\">[vii]<\\/span><\\/a><p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>Sedangkan produksi kayu olahan pada tahun 2020, berupa chip dan partikel\\nsebesar 21,54 juta m&Acirc;&sup3; dan 12,33 juta ton, diikuti oleh bubur kayu sebesar 8,18\\njuta ton, kayu lapis sebesar 3,88 juta m&Acirc;&sup3;, kayu gergajian sebesar 3,72 juta m&Acirc;&sup3;,\\nveneer sebesar 2,04 juta m&Acirc;&sup3;, papan serat sebesar 0,69 juta m&Acirc;&sup3;, barecore sebesar\\n0,38 juta m&Acirc;&sup3;, moulding\\/dowel sebesar 0,28 juta m&Acirc;&sup3;, dan papan partikel sebesar\\n0,02 juta m&Acirc;&sup3;. Sedangkan sisa kayu olahan lainnya sebanyak 0,34 juta m&Acirc;&sup3; dan 0,03\\njuta ton. Sebagian besar produk kayu olahan dihasilkan di Pulau Sumatera dan\\nPulau Jawa. Produksi kayu olahan berupa chip &amp; partikel, bubur kayu, dan\\npapan serat sebagian besar berasal dari pulau Sumatera. Produksi kayu olahan\\ndengan jenis kayu lapis, kayu gergajian, veneer, barecore, dan moulding\\/ dowel\\nsebagian besar berasal dari pulau Jawa.<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>Kemudian untuk produk hasil hutan bukan kayu (HHBK) dengan jenis rotan,\\ngetah karet, dan sagu banyak yang berasal dari pulau Sumatera. Produksi hutan\\nbukan kayu dengan jenis bambu, getah pinus, daun kayu putih, gondorukem, madu,\\ndan terpentin sebagian besar berasal dari pulau Jawa. Sementara, sebagian besar\\nproduksi hutan bukan kayu dengan jenis sagu dan minyak kayu putih berasal dari\\npulau Maluku dan Papua.<a name=\\"_ednref8\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_edn8\\"><span style=\\"color:#56C696\\">[viii]<\\/span><\\/a><p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>Sampai saat ini, sebagian besar masyarakat Indonesia masih memiliki\\nketergantungan ekonomi terhadap potensi kawasan hutan. Sebanyak 25.800 desa,\\natau 34,1% dari total 74.954 desa di seluruh Indonesia, merupakan\\nwilayah-wilayah yang berbatasan langsung dengan kawasan hutan. Kawasan konservasi\\nterestrial seluas 22,1 juta hektar dikelilingi oleh 6.381 desa, dengan sebagian\\nbesar penduduknya memiliki ketergantungan terhadap sumberdaya alam untuk\\npemenuhan kebutuhan hidupnya.<a name=\\"_ednref9\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_edn9\\"><span style=\\"color:#56C696\\">[ix]<\\/span><\\/a><p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>Pengelolaan hutan yang lestari dan pemanfaatannya atas sumber daya adalah\\nkunci untuk memerangi perubahan iklim dan berkontribusi pada kemakmuran dan\\nkesejahteraan generasi sekarang dan mendatang. Hutan juga memainkan peran\\npenting dalam pengentasan kemiskinan dan dalam pencapaian Tujuan Pembangunan\\nBerkelanjutan (SDGs). Selain itu, Hutan, melalui jasa ekosistemnya, adalah\\nsolusi kunci berbasis alam untuk membangun kembali ekonomi global pascapandemi\\ndengan cara melestarikan alam, sambil mendorong pertumbuhan ekonomi.<a name=\\"_ednref10\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_edn10\\"><span style=\\"color:#56C696\\">[x]<\\/span><\\/a><p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"text-align: center; margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><img style=\\"width: 920px;\\" data-bs-filename=\\"Peringatan-Hari-Hutan-Internasional-4.png\\" src=\\"\\/assets\\/artikel\\/peringatan16508596434.png\\"><br><\\/p><p class=\\"MsoNormal\\" align=\\"center\\" style=\\"margin-bottom: 11.25pt; text-align: center; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><b><span style=\'font-size:10.5pt;\\nfont-family:\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";\\ncolor:#222222;mso-fareast-language:IN\'>Tema Hari Hutan Internasional Tahun\\n2022, &acirc;&#128;&#156;Choose Sustainable Wood for People and Planet&acirc;&#128;&#157;<\\/span><\\/b><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\n\\"Times New Roman\\";color:#222222;mso-fareast-language:IN\'><p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>Seluruh manfaat dan upaya pengelolaan ekosistem hutan telah terangkum dalam\\nRencana Strategis PBB untuk Hutan 2017&acirc;&#128;&#147;2030 (The United Nations Strategic Plan\\nfor Forests 2017&acirc;&#128;&#147;2030) yang memberikan kerangka kerja global untuk tindakan\\npengelolaan seluruh jenis hutan secara berkelanjutan dan untuk menghentikan\\ndeforestasi dan degradasi hutan.<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>Rencana Strategis PBB untuk Hutan 2017-2030 dibuat dengan misi untuk\\nmempromosikan pengelolaan hutan lestari dan meningkatkan kontribusi hutan dan\\npohon ke Agenda 2030 untuk pembangunan berkelanjutan. Rencana tersebut juga\\nmenggariskan, bahwa untuk menciptakan dunia di mana hutan dapat memberikan\\nmanfaat ekonomi, sosial, lingkungan, dan budaya bagi generasi sekarang dan\\nmendatang, maka yang pertama dan utama, adalah dibutuhkan lebih banyak hutan.\\nSehingga berbagai anggapan yang mempertentangkan antara keberlanjutan pembangunan\\ndan kelestarian hutan, sehingga menciptakan pembenaran sebuah deforestasi,\\npatut dikaji kembali secara mendalam.<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>Inti dari Rencana Strategis adalah enam Tujuan Hutan Global (Global Forest\\nGoals\\/ GFGs) dan 26 target terkait yang bersifat sukarela dan universal. Enam\\nTujuan Hutan Global yang secara langsung mendukung Tujuan Pembangunan\\nBerkelanjutan PBB, mencakup:<a name=\\"_ednref11\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_edn11\\"><span style=\\"color:#56C696\\">[xi]<\\/span><\\/a><p><\\/p><\\/span><\\/p><ol start=\\"1\\" type=\\"1\\">\\n<li class=\\"MsoNormal\\" style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'>Membalikkan\\nkehilangan tutupan hutan di seluruh dunia melalui pengelolaan hutan\\nlestari, termasuk perlindungan, restorasi, aforestasi dan reboisasi, dan\\nmeningkatkan upaya untuk mencegah degradasi hutan dan berkontribusi pada\\nupaya dunia untuk mengatasi perubahan iklim.<p><\\/p><\\/span><\\/li>\\n<li class=\\"MsoNormal\\" style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'>Meningkatkan\\nmanfaat ekonomi, sosial dan lingkungan berbasis hutan, termasuk dengan\\nmeningkatkan mata pencaharian masyarakat yang bergantung pada hutan.<p><\\/p><\\/span><\\/li>\\n<li class=\\"MsoNormal\\" style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'>Meningkatkan\\nkawasan hutan lindung di seluruh dunia dan kawasan hutan yang dikelola\\nsecara lestari lainnya secara signifikan, serta proporsi hasil hutan dari\\nhutan yang dikelola secara lestari.<\\/span><\\/li><li class=\\"MsoNormal\\" style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'>Memobilisasi\\nsumber daya keuangan baru dan tambahan yang meningkat secara signifikan\\ndari semua sumber untuk pelaksanaan pengelolaan hutan lestari dan\\nmemperkuat kerjasama dan kemitraan ilmiah dan teknis.<p><\\/p><\\/span><\\/li>\\n<li class=\\"MsoNormal\\" style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'>Mempromosikan\\nkerangka tata kelola untuk menerapkan pengelolaan hutan lestari, termasuk\\nmelalui instrumen hutan PBB, dan meningkatkan kontribusi hutan pada Agenda\\n2030 untuk Pembangunan Berkelanjutan.<p><\\/p><\\/span><\\/li>\\n<li class=\\"MsoNormal\\" style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'>Meningkatkan\\nkerja sama, koordinasi, koherensi, dan sinergi dalam isu-isu terkait hutan\\ndi semua tingkatan, termasuk di dalam sistem Perserikatan Bangsa-Bangsa\\ndan di seluruh organisasi anggota Kemitraan Kolaboratif di Hutan, serta\\nlintas sektor dan pemangku kepentingan terkait.<\\/span><\\/li><\\/ol><p style=\\"color: rgb(34, 34, 34); line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><img style=\\"width: 1113.2px;\\" data-bs-filename=\\"Peringatan-Hari-Hutan-Internasional-5-1536x675.png\\" src=\\"\\/assets\\/artikel\\/peringatan16508596435.png\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";mso-fareast-language:IN\'><br><\\/span><\\/p><ol start=\\"1\\" type=\\"1\\">\\n<\\/ol><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><img style=\\"width: 1113.2px;\\" data-bs-filename=\\"Peringatan-Hari-Hutan-Internasional-6-1536x668.png\\" src=\\"\\/assets\\/artikel\\/peringatan16508596436.png\\"><br><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#222222;mso-fareast-language:\\nIN\'>Semoga peringatan Hari Hutan Internasional menjadi momentum untuk\\nmengingatkan kembali nilai dan manfaat keberadaan ekosistem hutan, sekaligus\\nmendorong komitmen atas pelestarian ekosistem hutan di seluruh dunia. Selamat\\nHari Hutan Internasional&acirc;&#128;&brvbar;<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><a name=\\"_edn1\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_ednref1\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#56C696;mso-fareast-language:\\nIN\'>[i]<\\/span><\\/a><span style=\'font-size:10.5pt;font-family:\\n\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";color:#222222;\\nmso-fareast-language:IN\'>&nbsp;Lihat dalam: (<a href=\\"https:\\/\\/www.fao.org\\/international-day-of-forests\\/en\\/\\"><span style=\\"color:#56C696\\">https:\\/\\/www.fao.org\\/international-day-of-forests\\/en\\/<\\/span><\\/a>)<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><a name=\\"_edn2\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_ednref2\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#56C696;mso-fareast-language:\\nIN\'>[ii]<\\/span><\\/a><span style=\'font-size:10.5pt;font-family:\\n\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";color:#222222;\\nmso-fareast-language:IN\'>&nbsp;United Nations Department of Economic and Social\\nAffairs, United Nations Forum on Forests Secretariat (2021). The Global Forest\\nGoals Report 2021<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><a name=\\"_edn3\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_ednref3\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#56C696;mso-fareast-language:\\nIN\'>[iii]<\\/span><\\/a><span style=\'font-size:10.5pt;font-family:\\n\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";color:#222222;\\nmso-fareast-language:IN\'>&nbsp;Lihat dalam: (<a href=\\"https:\\/\\/www.fao.org\\/international-day-of-forests\\/key-messages\\/en\\/\\"><span style=\\"color:#56C696\\">https:\\/\\/www.fao.org\\/international-day-of-forests\\/key-messages\\/en\\/<\\/span><\\/a>)<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><a name=\\"_edn4\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_ednref4\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#56C696;mso-fareast-language:\\nIN\'>[iv]<\\/span><\\/a><span style=\'font-size:10.5pt;font-family:\\n\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";color:#222222;\\nmso-fareast-language:IN\'>&nbsp;Ministry of environment and Forestry, republic\\nof Indonesia (2021), State Forest Indonesian Tahun 2020<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><a name=\\"_edn5\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_ednref5\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#56C696;mso-fareast-language:\\nIN\'>[v]<\\/span><\\/a><span style=\'font-size:10.5pt;font-family:\\n\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";color:#222222;\\nmso-fareast-language:IN\'>&nbsp;<i>Ibid.<\\/i><p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><a name=\\"_edn6\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_ednref6\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#56C696;mso-fareast-language:\\nIN\'>[vi]<\\/span><\\/a><span style=\'font-size:10.5pt;font-family:\\n\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";color:#222222;\\nmso-fareast-language:IN\'>&nbsp;Kementerian Lingkungan Hidup dan Kehutanan,\\n(2019), Status Hutan dan Kehutanan Indonesia Tahun 2018<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><a name=\\"_edn7\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_ednref7\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#56C696;mso-fareast-language:\\nIN\'>[vii]<\\/span><\\/a><span style=\'font-size:10.5pt;font-family:\\n\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";color:#222222;\\nmso-fareast-language:IN\'>&nbsp;Badan Pusat Statistik, &acirc;&#128;&#156;Statistik Produksi\\nKehutanan 2020&acirc;&#128;&#157;, dokumen dapat diakses di (<a href=\\"https:\\/\\/www.bps.go.id\\/publication\\/2021\\/07\\/30\\/d45441e7214b3c12c9653c45\\/statistik-produksi-kehutanan-2020.html\\"><span style=\\"color:#56C696\\">https:\\/\\/www.bps.go.id\\/publication\\/2021\\/07\\/30\\/d45441e7214b3c12c9653c45\\/statistik-produksi-kehutanan-2020.html<\\/span><\\/a>)<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><a name=\\"_edn8\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_ednref8\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#56C696;mso-fareast-language:\\nIN\'>[viii]<\\/span><\\/a><span style=\'font-size:10.5pt;font-family:\\n\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";color:#222222;\\nmso-fareast-language:IN\'>&nbsp;<i>Ibid.<\\/i><p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><a name=\\"_edn9\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_ednref9\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#56C696;mso-fareast-language:\\nIN\'>[ix]<\\/span><\\/a><span style=\'font-size:10.5pt;font-family:\\n\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";color:#222222;\\nmso-fareast-language:IN\'>&nbsp;Kementerian Lingkungan Hidup dan Kehutanan,\\n(2019), Status Hutan dan Kehutanan Indonesia Tahun 2018<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><a name=\\"_edn10\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_ednref10\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#56C696;mso-fareast-language:\\nIN\'>[x]<\\/span><\\/a><span style=\'font-size:10.5pt;font-family:\\n\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";color:#222222;\\nmso-fareast-language:IN\'>&nbsp;Lihat dalam: (<a href=\\"https:\\/\\/www.unep.org\\/resources\\/factsheet\\/investing-forests-build-back-better-greener\\"><span style=\\"color:#56C696\\">https:\\/\\/www.unep.org\\/resources\\/factsheet\\/investing-forests-build-back-better-greener<\\/span><\\/a>)<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\"><a name=\\"_edn11\\"><\\/a><a href=\\"https:\\/\\/pslh.ugm.ac.id\\/peringatan-hari-hutan-internasional\\/#_ednref11\\"><span style=\'font-size:10.5pt;font-family:\\"Helvetica\\",sans-serif;\\nmso-fareast-font-family:\\"Times New Roman\\";color:#56C696;mso-fareast-language:\\nIN\'>[xi]<\\/span><\\/a><span style=\'font-size:10.5pt;font-family:\\n\\"Helvetica\\",sans-serif;mso-fareast-font-family:\\"Times New Roman\\";color:#222222;\\nmso-fareast-language:IN\'>&nbsp;United Nations Department of Economic and Social\\nAffairs, United Nations Forum on Forests Secretariat (2021). The Global Forest\\nGoals Report 2021<p><\\/p><\\/span><\\/p><p class=\\"MsoNormal\\" style=\\"margin-bottom: 11.25pt; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\\">\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n<\\/p><p class=\\"MsoNormal\\"><p>&nbsp;<\\/p><\\/p><\\/p>\\n","excerpt":"Sejak tahun 2012, Majelis Umum PBB telah menetapkan tanggal 21 Maret sebagai peringatan Hari Hutan Internasional. Tahun 2022 bertema: \\u201cForests and sustainable production and consumption\\u201d","counter":"8","date":"2022-04-21","status":"1","created_at":"2022-04-25 04:07:23","updated_at":"2023-03-20 10:10:33","user_id":"1"}',
            ),
            53 => 
            array (
                'id' => '58',
                'user_id' => '1',
                'log_date' => '2023-03-24 11:58:48',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.106.167","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            54 => 
            array (
                'id' => '59',
                'user_id' => '1',
                'log_date' => '2023-03-24 12:04:05',
                'table_name' => 'artikel',
                'log_type' => 'edit',
            'data' => '{"id":"34","nama":"Akses Jalan Cianjur Selatan Rusak Parah, Warga Tuntut Perbaikan","slug":"akses-jalan-cianjur-selatan-rusak-parah-warga-tuntut-perbaikan","foto":"\\/assets\\/artikel\\/akses-jala16508908150.png","detail":"<p style=\\"text-align: center; margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\"><img style=\\"width: 50%;\\" data-bs-filename=\\"IMG-20220219-WA0020.jpg\\" src=\\"\\/assets\\/artikel\\/akses-jala16508908150.png\\"><span style=\\"list-style: none; border: 0px; outline: none;\\"><br><\\/span><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\"><span style=\\"list-style: none; border: 0px; outline: none;\\">Cianjur<\\/span>&nbsp;&acirc;&#128;&#147; Kesal karena akses jalan provinsi di wilayah Cianjur selatan rusak parah, warga pun protes dengan menanami pohon pisang di sepanjang jalan dan menuntut adanya perbaikan.<\\/p><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">Pasalnya,&nbsp;<a href=\\"https:\\/\\/cianjurtoday.com\\/tag\\/jalan-provinsi\\" style=\\"list-style: none; border: 0px; outline: none; transition: all 0.15s ease 0s;\\">jalan provinsi<\\/a>&nbsp;di Cianjur selatan mulai dari Kecamatan&nbsp;<a href=\\"https:\\/\\/cianjurtoday.com\\/tag\\/cilaku\\" style=\\"list-style: none; border: 0px; outline: none; transition: all 0.15s ease 0s;\\">Cilaku<\\/a>&nbsp;hingga&nbsp;<a href=\\"https:\\/\\/cianjurtoday.com\\/tag\\/sindangbarang\\" style=\\"list-style: none; border: 0px; outline: none; transition: all 0.15s ease 0s;\\">Sindangbarang<\\/a>&nbsp;tersebut merupakan akses vital kegiatan masyarakat.<\\/p><div class=\\"stream-item stream-item-in-post stream-item-inline-post aligncenter\\" style=\\"margin: 6px auto; list-style: none; border: 0px; outline: none; text-align: center; position: relative; z-index: 2; clear: both;\\"><\\/div><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">Kondisi&nbsp;<a href=\\"https:\\/\\/cianjurtoday.com\\/tag\\/jalan-rusak\\" style=\\"list-style: none; border: 0px; outline: none; transition: all 0.15s ease 0s;\\">jalan rusak<\\/a>&nbsp;semakin parah saat hujan tiba, bahkan beberapa lokasi banyak badan jalan yang amblas dan sangat membahayakan. Mulai dari Kecamatan Cilaku, Cibeber, Campaka, Sukanagara, Pagelaran, Tanggeung, Cibinong, dan Sindangbarang.&nbsp;<\\/p><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">Salah seorang mahasiswa Cianjur, Agus Rama Tunggaraga mengatakan, aksi tanam pohon pisang di jalan provinsi ini sebagai bentuk protes masyarakat, akibat jalan rusak di wilayah Cianjur menuju selatan yang belum kunjung diperbaiki.<\\/p><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">&acirc;&#128;&#156;Saya asli orang Cianjur selatan, cape setiap pulang jalannya rusak begini. Makanya, saya bersama teman mahasiswa lainnya sengaja membuat aksi tanam pohon pisang di sepanjang jalan 8 kecamatan ini,&acirc;&#128;&#157; ujarnya kepada wartawan, Jumat (18\\/2\\/2022).&nbsp;<\\/p><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">Tak hanya itu, warga pun turut memasang foto Gubernur Jawa Barat, Ridwan Kamil dan membentangkan spanduk berisikan sejumlah ungkapan protes.<\\/p><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">Mulai desakan agar Gubernur segera melakukan perbaikan jalan hingga imbauan hati-hati pada masyarakat saat melintasi jalan, karena kondisinya yang rusak parah.&nbsp;<\\/p><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">&acirc;&#128;&#156;Sebagai gubernur, Ridwan Kamil harus bertanggungjawab terhadap pembangunan. Jangan hanya pencitraan di media sosial, tapi bangun yang benar infrastrukturnya. Kami sudah jenuh, jalan ke Cianjur selatan rusak parah, kami menuntut agar ada perbaikan dan pembangunan,&acirc;&#128;&#157; ungkapnya.&nbsp;<\\/p><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">Ia menegaskan, mahasiswa dan masyarakat Cianjur akan turun ke jalan menggelar aksi, jika Pemprov Jawa Barat tidak merespon tuntutan perbaikan jalan tersebut.&nbsp;<\\/p><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">&acirc;&#128;&#156;Jalan ini akses utama untuk banyak kegiatan masyarakat. Kalau tidak direspon, berarti Pemprov tidak memperhatikan pembangunan daerah. Kami akan turun ke jalan menggelar aksi,&acirc;&#128;&#157; tegasnya.&nbsp;<\\/p><h2 id=\\"h-jalan-cianjur-selatan-dibiarkan-rusak-bertahun-tahun\\" style=\\"margin-bottom: 0.5em; list-style: none; border: 0px; outline: none; overflow-wrap: break-word; line-height: 1.4;\\">Jalan Cianjur Selatan Dibiarkan Rusak Bertahun-tahun<\\/h2><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">Terpisah, warga Sindangbarang, H Abdul Rasyid menerangkan, akses jalan menuju Cianjur selatan memang sudah bertahun-tahun tidak ada perbaikan. Kalaupun ada, hanya sebatas penambalan dan biasanya tidak bertahan lama.<\\/p><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">&acirc;&#128;&#156;Sudah lama tidak ada perbaikan. Lupa saya, kapan terakhir jalan bagus. Karena sekarang kondisinya rusak parah,&acirc;&#128;&#157; imbuhnya.<\\/p><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">Ia menuturkan, kondisi jalan rusak tersebut sering menjadi penyebab kecelakaan bagi pengendara yang melintas.<\\/p><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">&acirc;&#128;&#156;Sering yang kecelakaan, apalagi saat hujan. Lubang jalan tidak terlihat karena tertutup genangan air,&acirc;&#128;&#157; tambahnya.<\\/p><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">Ia berharap, perbaikan akses jalan provinsi di Cianjur selatan tersebut segera mendapat perhatian pemerintah, agar bisa memberi rasa aman dan nyaman bagi pengguna jalan.<\\/p><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">&acirc;&#128;&#156;Saya berharap segera ada perbaikan, agar masyarakat bisa nyaman beraktivitas,&acirc;&#128;&#157; tutupnya.(ren\\/sis)<\\/p><p style=\\"margin-bottom: 25px; list-style: none; border: 0px; outline: none; line-height: 26px; overflow-wrap: break-word;\\">Sumber:&nbsp;<a href=\\"https:\\/\\/cianjurtoday.com\\/\\" style=\\"background-color: rgb(255, 255, 255); list-style: none; border: 0px; outline: none; transition: all 0.15s ease 0s;\\">CIANJURTODAY.COM<\\/a><\\/p><\\/p>\\n","excerpt":"Kesal karena akses jalan provinsi di wilayah Cianjur selatan rusak parah, warga pun protes dengan menanami pohon pisang di sepanjang jalan dan menuntut adanya perbaikan.","counter":"4","date":"2022-02-19","status":"1","created_at":"2022-04-25 12:46:55","updated_at":"2023-03-20 10:17:45","user_id":"1"}',
            ),
            55 => 
            array (
                'id' => '60',
                'user_id' => '1',
                'log_date' => '2023-03-24 12:05:40',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"1","name":"Isep Lutpi Nur","email":"iseplutpinur7@gmail.com","foto":null,"username":"iseplutpinur","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"9SuJqGVrgZGtA1kcZ0hcynLhK2EWVTeuI8auCBXvoICNNVqFHWqT2riMNs51","created_at":null,"updated_at":"2023-03-16 15:02:39"}',
            ),
            56 => 
            array (
                'id' => '61',
                'user_id' => '1',
                'log_date' => '2023-03-24 12:05:53',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.106.167","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Mobile Safari\\/537.36"}',
            ),
            57 => 
            array (
                'id' => '62',
                'user_id' => '1',
                'log_date' => '2023-03-25 11:44:59',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.106.165","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.51"}',
            ),
            58 => 
            array (
                'id' => '63',
                'user_id' => '1',
                'log_date' => '2023-03-26 06:22:27',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.69.159","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.51"}',
            ),
            59 => 
            array (
                'id' => '64',
                'user_id' => '1',
                'log_date' => '2023-03-27 06:06:57',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.106.246","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.54"}',
            ),
            60 => 
            array (
                'id' => '65',
                'user_id' => '113',
                'log_date' => '2023-03-27 20:40:53',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.101.126","user_agent":"Mozilla\\/5.0 (Linux; Android 11; SM-A207F) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/110.0.0.0 Mobile Safari\\/537.36"}',
            ),
            61 => 
            array (
                'id' => '66',
                'user_id' => '1',
                'log_date' => '2023-03-27 20:57:53',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.97","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.54"}',
            ),
            62 => 
            array (
                'id' => '67',
                'user_id' => '113',
                'log_date' => '2023-03-27 22:32:29',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"113","name":"Faisal Akbar","email":"faisal7794akbar@karmapack.id","foto":null,"username":"faisalakbar","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"8n3LtOXHvFOzVx7PzPUb35K3MNkrOqsKahYsLj28zpZbWHCtzY4v0HtI2Iio","created_at":"2023-03-16 16:19:35","updated_at":"2023-03-16 17:43:52"}',
            ),
            63 => 
            array (
                'id' => '68',
                'user_id' => '1',
                'log_date' => '2023-04-04 13:33:38',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"167.205.66.10","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.62"}',
            ),
            64 => 
            array (
                'id' => '69',
                'user_id' => '1',
                'log_date' => '2023-04-07 13:06:20',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"182.2.164.211","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36 Edg\\/111.0.1661.62"}',
            ),
            65 => 
            array (
                'id' => '70',
                'user_id' => '1',
                'log_date' => '2023-04-11 22:42:45',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.161","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.34"}',
            ),
            66 => 
            array (
                'id' => '71',
                'user_id' => '1',
                'log_date' => '2023-04-12 14:50:01',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.85.134","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Mobile Safari\\/537.36"}',
            ),
            67 => 
            array (
                'id' => '72',
                'user_id' => '1',
                'log_date' => '2023-04-12 20:05:53',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.161","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.39"}',
            ),
            68 => 
            array (
                'id' => '73',
                'user_id' => '1',
                'log_date' => '2023-04-13 14:07:58',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.161","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.39"}',
            ),
            69 => 
            array (
                'id' => '74',
                'user_id' => '1',
                'log_date' => '2023-04-14 09:25:47',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.161","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.39"}',
            ),
            70 => 
            array (
                'id' => '75',
                'user_id' => '1',
                'log_date' => '2023-04-15 16:43:50',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.107.19","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.39"}',
            ),
            71 => 
            array (
                'id' => '76',
                'user_id' => '1',
                'log_date' => '2023-04-16 13:45:22',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.104.204","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.46"}',
            ),
            72 => 
            array (
                'id' => '77',
                'user_id' => '1',
                'log_date' => '2023-04-16 20:57:47',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.115.180","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.46"}',
            ),
            73 => 
            array (
                'id' => '78',
                'user_id' => '1',
                'log_date' => '2023-04-18 22:06:08',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.109.98","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            74 => 
            array (
                'id' => '79',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:14:30',
                'table_name' => 'pengurus_periodes',
                'log_type' => 'edit',
                'data' => '{"id":1,"nama":"Kabinet Masagi","foto":"iconkabinet-ma20220425164938.png","dari":"2021","sampai":"2022","slug":"kabinet-masagi","slogan":"Ngabdi ka nagri bela ka nagara piken ngawujudkeun lemah nu sajati tur ngawangun cianjur pakidulan.","visi":"<p>\\"Terwujudnya KARMAPACK dan masyarakat Cianjur Kidul yang menjungjung tinggi nilai, dan\\r\\nnorma agama,\\r\\nsosial\\r\\nserta budaya lokal.\\"<\\/p>\\r\\n","misi":"<p>1. Meningkatkan pemahaman dan pengalaman keagamaan bagi anggota KARMAPACK dan masyarakat\\r\\nCianjru Kidul\\r\\n<br>\\r\\n2. Melakukan pengabdian kepada masyarakat<br>\\r\\n3. Menumbuhkan rasa cinta terhadap seni dan budaya kedaerahan<\\/p>\\r\\n","filosofi_logo":null,"status":0,"created_at":"2023-02-11 02:06:13","updated_at":"2023-02-18 17:39:38"}',
            ),
            75 => 
            array (
                'id' => '80',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:16:23',
                'table_name' => 'pengurus_periodes',
                'log_type' => 'create',
                'data' => '{"nama":"Situs ini masih dalam masa pengembangan.","slug":"situs-ini-masih-dalam-masa-pengembangan","dari":"2000","sampai":"2022","slogan":"slogan","status":0,"visi":"","misi":"","filosofi_logo":"","foto":"iconsitus-ini-20230420051623.jpg","updated_at":"2023-04-19T22:16:23.000000Z","created_at":"2023-04-19T22:16:23.000000Z","id":3}',
            ),
            76 => 
            array (
                'id' => '81',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:19:45',
                'table_name' => 'pengurus_periodes',
                'log_type' => 'delete',
                'data' => '{"id":3,"nama":"Situs ini masih dalam masa pengembangan.","foto":"iconsitus-ini-20230420051623.jpg","dari":"2000","sampai":"2022","slug":"situs-ini-masih-dalam-masa-pengembangan","slogan":"slogan","visi":"","misi":"","filosofi_logo":"","status":0,"created_at":"2023-04-20 05:16:23","updated_at":"2023-04-20 05:16:23"}',
            ),
            77 => 
            array (
                'id' => '82',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:40:46',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":82,"jabatan_id":63,"anggota_id":30,"created_at":"2023-02-11 02:06:14","updated_at":"2023-02-11 02:06:14"}',
            ),
            78 => 
            array (
                'id' => '83',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:40:46',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":83,"jabatan_id":63,"anggota_id":53,"created_at":"2023-02-11 02:06:14","updated_at":"2023-02-11 02:06:14"}',
            ),
            79 => 
            array (
                'id' => '84',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:40:46',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":84,"jabatan_id":63,"anggota_id":54,"created_at":"2023-02-11 02:06:14","updated_at":"2023-02-11 02:06:14"}',
            ),
            80 => 
            array (
                'id' => '85',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:40:46',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":85,"jabatan_id":63,"anggota_id":55,"created_at":"2023-02-11 02:06:14","updated_at":"2023-02-11 02:06:14"}',
            ),
            81 => 
            array (
                'id' => '86',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:40:46',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":86,"jabatan_id":63,"anggota_id":56,"created_at":"2023-02-11 02:06:14","updated_at":"2023-02-11 02:06:14"}',
            ),
            82 => 
            array (
                'id' => '87',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:40:46',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":87,"jabatan_id":63,"anggota_id":57,"created_at":"2023-02-11 02:06:14","updated_at":"2023-02-11 02:06:14"}',
            ),
            83 => 
            array (
                'id' => '88',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:40:46',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"30","jabatan_id":"63","updated_at":"2023-04-19T22:40:46.000000Z","created_at":"2023-04-19T22:40:46.000000Z","id":116}',
            ),
            84 => 
            array (
                'id' => '89',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:40:46',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"53","jabatan_id":"63","updated_at":"2023-04-19T22:40:46.000000Z","created_at":"2023-04-19T22:40:46.000000Z","id":117}',
            ),
            85 => 
            array (
                'id' => '90',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:40:46',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"54","jabatan_id":"63","updated_at":"2023-04-19T22:40:46.000000Z","created_at":"2023-04-19T22:40:46.000000Z","id":118}',
            ),
            86 => 
            array (
                'id' => '91',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:40:46',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"55","jabatan_id":"63","updated_at":"2023-04-19T22:40:46.000000Z","created_at":"2023-04-19T22:40:46.000000Z","id":119}',
            ),
            87 => 
            array (
                'id' => '92',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:40:46',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"56","jabatan_id":"63","updated_at":"2023-04-19T22:40:46.000000Z","created_at":"2023-04-19T22:40:46.000000Z","id":120}',
            ),
            88 => 
            array (
                'id' => '93',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:40:46',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"57","jabatan_id":"63","updated_at":"2023-04-19T22:40:46.000000Z","created_at":"2023-04-19T22:40:46.000000Z","id":121}',
            ),
            89 => 
            array (
                'id' => '94',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:07',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":116,"jabatan_id":63,"anggota_id":30,"created_at":"2023-04-20 05:40:46","updated_at":"2023-04-20 05:40:46"}',
            ),
            90 => 
            array (
                'id' => '95',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:07',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":117,"jabatan_id":63,"anggota_id":53,"created_at":"2023-04-20 05:40:46","updated_at":"2023-04-20 05:40:46"}',
            ),
            91 => 
            array (
                'id' => '96',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:07',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":118,"jabatan_id":63,"anggota_id":54,"created_at":"2023-04-20 05:40:46","updated_at":"2023-04-20 05:40:46"}',
            ),
            92 => 
            array (
                'id' => '97',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:07',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":119,"jabatan_id":63,"anggota_id":55,"created_at":"2023-04-20 05:40:46","updated_at":"2023-04-20 05:40:46"}',
            ),
            93 => 
            array (
                'id' => '98',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:07',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":120,"jabatan_id":63,"anggota_id":56,"created_at":"2023-04-20 05:40:46","updated_at":"2023-04-20 05:40:46"}',
            ),
            94 => 
            array (
                'id' => '99',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:07',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":121,"jabatan_id":63,"anggota_id":57,"created_at":"2023-04-20 05:40:46","updated_at":"2023-04-20 05:40:46"}',
            ),
            95 => 
            array (
                'id' => '100',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:07',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"30","jabatan_id":"63","updated_at":"2023-04-19T22:41:07.000000Z","created_at":"2023-04-19T22:41:07.000000Z","id":122}',
            ),
            96 => 
            array (
                'id' => '101',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:07',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"53","jabatan_id":"63","updated_at":"2023-04-19T22:41:07.000000Z","created_at":"2023-04-19T22:41:07.000000Z","id":123}',
            ),
            97 => 
            array (
                'id' => '102',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:07',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"54","jabatan_id":"63","updated_at":"2023-04-19T22:41:07.000000Z","created_at":"2023-04-19T22:41:07.000000Z","id":124}',
            ),
            98 => 
            array (
                'id' => '103',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:07',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"55","jabatan_id":"63","updated_at":"2023-04-19T22:41:07.000000Z","created_at":"2023-04-19T22:41:07.000000Z","id":125}',
            ),
            99 => 
            array (
                'id' => '104',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:07',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"56","jabatan_id":"63","updated_at":"2023-04-19T22:41:07.000000Z","created_at":"2023-04-19T22:41:07.000000Z","id":126}',
            ),
            100 => 
            array (
                'id' => '105',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:07',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"57","jabatan_id":"63","updated_at":"2023-04-19T22:41:07.000000Z","created_at":"2023-04-19T22:41:07.000000Z","id":127}',
            ),
            101 => 
            array (
                'id' => '106',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:13',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":122,"jabatan_id":63,"anggota_id":30,"created_at":"2023-04-20 05:41:07","updated_at":"2023-04-20 05:41:07"}',
            ),
            102 => 
            array (
                'id' => '107',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:13',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":123,"jabatan_id":63,"anggota_id":53,"created_at":"2023-04-20 05:41:07","updated_at":"2023-04-20 05:41:07"}',
            ),
            103 => 
            array (
                'id' => '108',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:13',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":124,"jabatan_id":63,"anggota_id":54,"created_at":"2023-04-20 05:41:07","updated_at":"2023-04-20 05:41:07"}',
            ),
            104 => 
            array (
                'id' => '109',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:13',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":125,"jabatan_id":63,"anggota_id":55,"created_at":"2023-04-20 05:41:07","updated_at":"2023-04-20 05:41:07"}',
            ),
            105 => 
            array (
                'id' => '110',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:13',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":126,"jabatan_id":63,"anggota_id":56,"created_at":"2023-04-20 05:41:07","updated_at":"2023-04-20 05:41:07"}',
            ),
            106 => 
            array (
                'id' => '111',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:13',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":127,"jabatan_id":63,"anggota_id":57,"created_at":"2023-04-20 05:41:07","updated_at":"2023-04-20 05:41:07"}',
            ),
            107 => 
            array (
                'id' => '112',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:13',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"30","jabatan_id":"63","updated_at":"2023-04-19T22:41:13.000000Z","created_at":"2023-04-19T22:41:13.000000Z","id":128}',
            ),
            108 => 
            array (
                'id' => '113',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:13',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"53","jabatan_id":"63","updated_at":"2023-04-19T22:41:13.000000Z","created_at":"2023-04-19T22:41:13.000000Z","id":129}',
            ),
            109 => 
            array (
                'id' => '114',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:13',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"54","jabatan_id":"63","updated_at":"2023-04-19T22:41:13.000000Z","created_at":"2023-04-19T22:41:13.000000Z","id":130}',
            ),
            110 => 
            array (
                'id' => '115',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:13',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"55","jabatan_id":"63","updated_at":"2023-04-19T22:41:13.000000Z","created_at":"2023-04-19T22:41:13.000000Z","id":131}',
            ),
            111 => 
            array (
                'id' => '116',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:13',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"56","jabatan_id":"63","updated_at":"2023-04-19T22:41:13.000000Z","created_at":"2023-04-19T22:41:13.000000Z","id":132}',
            ),
            112 => 
            array (
                'id' => '117',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:13',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"57","jabatan_id":"63","updated_at":"2023-04-19T22:41:13.000000Z","created_at":"2023-04-19T22:41:13.000000Z","id":133}',
            ),
            113 => 
            array (
                'id' => '118',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:41',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":128,"jabatan_id":63,"anggota_id":30,"created_at":"2023-04-20 05:41:13","updated_at":"2023-04-20 05:41:13"}',
            ),
            114 => 
            array (
                'id' => '119',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:41',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":129,"jabatan_id":63,"anggota_id":53,"created_at":"2023-04-20 05:41:13","updated_at":"2023-04-20 05:41:13"}',
            ),
            115 => 
            array (
                'id' => '120',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:41',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":130,"jabatan_id":63,"anggota_id":54,"created_at":"2023-04-20 05:41:13","updated_at":"2023-04-20 05:41:13"}',
            ),
            116 => 
            array (
                'id' => '121',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:41',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":131,"jabatan_id":63,"anggota_id":55,"created_at":"2023-04-20 05:41:13","updated_at":"2023-04-20 05:41:13"}',
            ),
            117 => 
            array (
                'id' => '122',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:41',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":132,"jabatan_id":63,"anggota_id":56,"created_at":"2023-04-20 05:41:13","updated_at":"2023-04-20 05:41:13"}',
            ),
            118 => 
            array (
                'id' => '123',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:41',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":133,"jabatan_id":63,"anggota_id":57,"created_at":"2023-04-20 05:41:13","updated_at":"2023-04-20 05:41:13"}',
            ),
            119 => 
            array (
                'id' => '124',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:41',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"30","jabatan_id":"63","updated_at":"2023-04-19T22:41:41.000000Z","created_at":"2023-04-19T22:41:41.000000Z","id":134}',
            ),
            120 => 
            array (
                'id' => '125',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:41',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"53","jabatan_id":"63","updated_at":"2023-04-19T22:41:41.000000Z","created_at":"2023-04-19T22:41:41.000000Z","id":135}',
            ),
            121 => 
            array (
                'id' => '126',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:41',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"54","jabatan_id":"63","updated_at":"2023-04-19T22:41:41.000000Z","created_at":"2023-04-19T22:41:41.000000Z","id":136}',
            ),
            122 => 
            array (
                'id' => '127',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:41',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"55","jabatan_id":"63","updated_at":"2023-04-19T22:41:41.000000Z","created_at":"2023-04-19T22:41:41.000000Z","id":137}',
            ),
            123 => 
            array (
                'id' => '128',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:41',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"56","jabatan_id":"63","updated_at":"2023-04-19T22:41:41.000000Z","created_at":"2023-04-19T22:41:41.000000Z","id":138}',
            ),
            124 => 
            array (
                'id' => '129',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:41:41',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"57","jabatan_id":"63","updated_at":"2023-04-19T22:41:41.000000Z","created_at":"2023-04-19T22:41:41.000000Z","id":139}',
            ),
            125 => 
            array (
                'id' => '130',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:44:38',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":134,"jabatan_id":63,"anggota_id":30,"created_at":"2023-04-20 05:41:41","updated_at":"2023-04-20 05:41:41"}',
            ),
            126 => 
            array (
                'id' => '131',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:44:38',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":135,"jabatan_id":63,"anggota_id":53,"created_at":"2023-04-20 05:41:41","updated_at":"2023-04-20 05:41:41"}',
            ),
            127 => 
            array (
                'id' => '132',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:44:38',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":136,"jabatan_id":63,"anggota_id":54,"created_at":"2023-04-20 05:41:41","updated_at":"2023-04-20 05:41:41"}',
            ),
            128 => 
            array (
                'id' => '133',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:44:38',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":137,"jabatan_id":63,"anggota_id":55,"created_at":"2023-04-20 05:41:41","updated_at":"2023-04-20 05:41:41"}',
            ),
            129 => 
            array (
                'id' => '134',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:44:38',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":138,"jabatan_id":63,"anggota_id":56,"created_at":"2023-04-20 05:41:41","updated_at":"2023-04-20 05:41:41"}',
            ),
            130 => 
            array (
                'id' => '135',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:44:38',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'delete',
                'data' => '{"id":139,"jabatan_id":63,"anggota_id":57,"created_at":"2023-04-20 05:41:41","updated_at":"2023-04-20 05:41:41"}',
            ),
            131 => 
            array (
                'id' => '136',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:44:38',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"30","jabatan_id":"63","updated_at":"2023-04-19T22:44:38.000000Z","created_at":"2023-04-19T22:44:38.000000Z","id":140}',
            ),
            132 => 
            array (
                'id' => '137',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:44:38',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"53","jabatan_id":"63","updated_at":"2023-04-19T22:44:38.000000Z","created_at":"2023-04-19T22:44:38.000000Z","id":141}',
            ),
            133 => 
            array (
                'id' => '138',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:44:38',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"54","jabatan_id":"63","updated_at":"2023-04-19T22:44:38.000000Z","created_at":"2023-04-19T22:44:38.000000Z","id":142}',
            ),
            134 => 
            array (
                'id' => '139',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:44:38',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"55","jabatan_id":"63","updated_at":"2023-04-19T22:44:38.000000Z","created_at":"2023-04-19T22:44:38.000000Z","id":143}',
            ),
            135 => 
            array (
                'id' => '140',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:44:38',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"56","jabatan_id":"63","updated_at":"2023-04-19T22:44:38.000000Z","created_at":"2023-04-19T22:44:38.000000Z","id":144}',
            ),
            136 => 
            array (
                'id' => '141',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:44:38',
                'table_name' => 'pengurus_anggotas',
                'log_type' => 'create',
                'data' => '{"anggota_id":"57","jabatan_id":"63","updated_at":"2023-04-19T22:44:38.000000Z","created_at":"2023-04-19T22:44:38.000000Z","id":145}',
            ),
            137 => 
            array (
                'id' => '142',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:05',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":1,"name":"Isep Lutpi Nur","email":"iseplutpinur7@gmail.com","foto":null,"username":"iseplutpinur","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"PIkbbqCffBYt0omRaXxKTHqxql6qlKeNUHMmElWi9sKJoAqdMU0TH94jxLnW","created_at":null,"updated_at":"2023-03-16 15:02:39"}',
            ),
            138 => 
            array (
                'id' => '143',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:05',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":17,"name":"NITA HALIMATUSSA\\u2019DIYAH","email":"nita_halimatus_syadiah@karmapack.id","foto":null,"username":"nita-hasa","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:44:47"}',
            ),
            139 => 
            array (
                'id' => '144',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:05',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":19,"name":"ABDUL MUHLIS","email":"abdul_muhlis@karmapack.id","foto":null,"username":"abdul_muhlis","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:46:56"}',
            ),
            140 => 
            array (
                'id' => '145',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:05',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":21,"name":"SUKIRMAN MAULANA","email":"sukirman_maulana@karmapack.id","foto":null,"username":"ukir","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:43:22"}',
            ),
            141 => 
            array (
                'id' => '146',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:05',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":22,"name":"DEWI","email":"dewi@karmapack.id","foto":null,"username":"2019dewi","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:29:15"}',
            ),
            142 => 
            array (
                'id' => '147',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:05',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":23,"name":"WIWIT AWALIYAH","email":"wiwit_awaliyah@karmapack.id","foto":null,"username":"wiwit_awaliyah","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:35:32"}',
            ),
            143 => 
            array (
                'id' => '148',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:05',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":24,"name":"SAEPUL ROHMAN","email":"saepul_rohman@karmapack.id","foto":null,"username":null,"email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:05:22"}',
            ),
            144 => 
            array (
                'id' => '149',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:05',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":26,"name":"HILMI FITRIANI","email":"hilmifuaidah0201@gmail.com","foto":null,"username":"hilmiff","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"jx1NL0GzRJMyD6YcurTcVCjY2ZQmaSbqt9FvDBjpi4m0SCpZTLr6MlkqvTCg","created_at":null,"updated_at":"2023-03-18 19:56:40"}',
            ),
            145 => 
            array (
                'id' => '150',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:05',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":27,"name":"SAMSUL MA\'ARIP","email":"samsul_maarip@karmapack.id","foto":null,"username":"samsul_m","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:22:57"}',
            ),
            146 => 
            array (
                'id' => '151',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:05',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":30,"name":"WAHID NURSIDIK","email":"wahid_nursidik@karmapack.id","foto":null,"username":"wahid_nursidik","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:25:14"}',
            ),
            147 => 
            array (
                'id' => '152',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":32,"name":"SALAFIA AL ZAHRA FAUZIA","email":"salafia_al_zahra_fauzia@karmapack.id","foto":null,"username":"salafiaazf","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:12:23"}',
            ),
            148 => 
            array (
                'id' => '153',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":33,"name":"YUSI YUSFITA","email":"yusi_yusfita@karmapack.id","foto":null,"username":null,"email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-10-01 14:54:52"}',
            ),
            149 => 
            array (
                'id' => '154',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":34,"name":"CUCU MARYAM NURPADILAH","email":"cucu_maryam_nurfadilah@karmapack.id","foto":null,"username":"cucumaryamnurpadilah","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-29 18:27:48"}',
            ),
            150 => 
            array (
                'id' => '155',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":35,"name":"RIFKI ALFAIZAR","email":"rifki_alfaizar@karmapack.id","foto":null,"username":"rifki_alfaizar","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:02:11"}',
            ),
            151 => 
            array (
                'id' => '156',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":43,"name":"MUHAMMAD CAHYADI","email":"muhammad_cahyadi@karmapack.id","foto":null,"username":"muhammad_cahyadi","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:52:06"}',
            ),
            152 => 
            array (
                'id' => '157',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":45,"name":"SRI AYUNI WAHYUDIN","email":"sri_ayuni_wahyudin@karmapack.id","foto":null,"username":"sri_ayuni_wahyudin","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:13:43"}',
            ),
            153 => 
            array (
                'id' => '158',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":46,"name":"ENCEP ABDUL HAKIM","email":"encep_abdul_hakim@karmapack.id","foto":null,"username":"ncepkazama27","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:02:44"}',
            ),
            154 => 
            array (
                'id' => '159',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":51,"name":"RURI C. HETIAWATI","email":"ruri_c_hetiawati@karmapack.id","foto":null,"username":"ruri_c_hetiawati","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:32:42"}',
            ),
            155 => 
            array (
                'id' => '160',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":54,"name":"APRILIA UTAMI HERDI","email":"aprilia_utami_herdi@karmapack.id","foto":null,"username":"aprilia_utami_herdi","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:03:07"}',
            ),
            156 => 
            array (
                'id' => '161',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":57,"name":"NU\\u2019MAN BASIR","email":"numanbasir253@gmail.com","foto":null,"username":null,"email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"qFENcieaBhFscP9bAXaWoMLt4ecrVtz9nPqqTW1Vcy8uNMo3HR4g2houlGsV","created_at":null,"updated_at":"2023-03-18 16:45:36"}',
            ),
            157 => 
            array (
                'id' => '162',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":58,"name":"MAULANA YUSUF","email":"maulyusuf246@gmail.com","foto":null,"username":"maulana_yusuf","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2023-03-18 19:27:30"}',
            ),
            158 => 
            array (
                'id' => '163',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":63,"name":"M SYAHRUL RAMADHAN","email":"m_syahrul_ramdan@karmapack.id","foto":null,"username":"m_syahrul_ramadhan","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:51:21"}',
            ),
            159 => 
            array (
                'id' => '164',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":64,"name":"ILHAM FAOZ","email":"ilham_faoz@karmapack.id","foto":null,"username":"ilham_faoz","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:12:42"}',
            ),
            160 => 
            array (
                'id' => '165',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":65,"name":"ADRIAN SYAMSYUL RAMLI","email":"adrian_samsul_ramli@karmapack.id","foto":null,"username":"adrian_syamsyul_ramli","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:30:41"}',
            ),
            161 => 
            array (
                'id' => '166',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":68,"name":"YUSUF MUGHNI","email":"yusuf_mughni@karmapack.id","foto":null,"username":"yusuf_mugni","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:22:14"}',
            ),
            162 => 
            array (
                'id' => '167',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":69,"name":"SITI SUROH HOLISOH","email":"siti_suroh_holisoh@karmapack.id","foto":null,"username":"siti_suroh_holisoh","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:28:05"}',
            ),
            163 => 
            array (
                'id' => '168',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":72,"name":"SRI HASTUTI","email":"sri_hastuti@karmapack.id","foto":null,"username":"sri_hastuti","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:26:36"}',
            ),
            164 => 
            array (
                'id' => '169',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":73,"name":"DERIS KUSNAEDI","email":"deris_kusnaedi@karmapack.id","foto":null,"username":"deris_kusnaedi","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:27:40"}',
            ),
            165 => 
            array (
                'id' => '170',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":74,"name":"Feri Firmansyah","email":"feryfirmansyah280@karmapack.id","foto":null,"username":null,"email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-10-24 10:22:51"}',
            ),
            166 => 
            array (
                'id' => '171',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":75,"name":"NISYARA SEPTIARANI SUKMA","email":"nisyara_septiarani_sukma@karmapack.id","foto":null,"username":"nisyara","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:25:16"}',
            ),
            167 => 
            array (
                'id' => '172',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":76,"name":"SITI NURJAMILAH","email":"siti_nurjamilah@karmapack.id","foto":null,"username":"jemi","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:09:19"}',
            ),
            168 => 
            array (
                'id' => '173',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":77,"name":"PUPUNG RUSTIKA","email":"pupung_rustika@karmapack.id","foto":null,"username":"pupung_rustika","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:25:56"}',
            ),
            169 => 
            array (
                'id' => '174',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":78,"name":"HASBI ABDUL HUSAIN","email":"hasbi_abdul_husain@karmapack.id","foto":null,"username":"hasbi_abdul_husain","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:22:52"}',
            ),
            170 => 
            array (
                'id' => '175',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":79,"name":"NUR HASAN","email":"hnur60443@gmail.com","foto":null,"username":"nurhasan","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"fSxtf2rPwLQQbxz0899Amo0M1ErOYweKMtdkN79SUb7CPl9VV9zAiaGgmB3n","created_at":null,"updated_at":"2023-03-18 20:33:38"}',
            ),
            171 => 
            array (
                'id' => '176',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":80,"name":"ARSILA KHAIRUNNISA","email":"arsila_khairunnisa@karmapack.id","foto":null,"username":"arsila_khairunnisa","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:29:24"}',
            ),
            172 => 
            array (
                'id' => '177',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":81,"name":"Sofy Tri Alfiani","email":"trifyalfiani@karmapack.id","foto":null,"username":"sofy","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:15:49"}',
            ),
            173 => 
            array (
                'id' => '178',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":82,"name":"Ragil JS Munster","email":"ragilsaputra211998@gmail.com","foto":null,"username":null,"email_verified_at":null,"password":"$2y$10$DsI7ChQu4aIwEwc0CTlCnO66pBuIukicAIA\\/oIKwHD4AIGzIHmHZO","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:18:37"}',
            ),
            174 => 
            array (
                'id' => '179',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":83,"name":"MUHAMMAD IMAN NURJAMAN","email":"muhammad_iman_nurjaman@karmapack.id","foto":null,"username":"m_iman_nurjaman","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:19:36"}',
            ),
            175 => 
            array (
                'id' => '180',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":84,"name":"Moh Indra Sukmara Esma","email":"Mohindra.Sukmaraesma29@gmail.com","foto":null,"username":"moh_indra_sukmara_esma","email_verified_at":null,"password":"$2y$10$VDWYFdw4u68s9nvOp7G8A.HunvtPJWsi0eIWD6VFnn8lT7U5vEQzq","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:15:39"}',
            ),
            176 => 
            array (
                'id' => '181',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":85,"name":"MUHAMMAD RAIHAN RAHMAN","email":"muhammad_raihan@karmapack.id","foto":null,"username":"m_raihan_rahman","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:16:47"}',
            ),
            177 => 
            array (
                'id' => '182',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":86,"name":"IMAT ROHIMAT","email":"imat_rohimat@karmapack.id","foto":null,"username":null,"email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-12-04 14:07:45"}',
            ),
            178 => 
            array (
                'id' => '183',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":87,"name":"Alvirda Damayanti Anwari","email":"alfirda_damayanti@karmapack.id","foto":null,"username":"alvirdada","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:37:09"}',
            ),
            179 => 
            array (
                'id' => '184',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":89,"name":"SILVIA ANGGRAENI","email":"silvia_anggraeni@karmapack.id","foto":null,"username":"silviaanggrnii","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:35:23"}',
            ),
            180 => 
            array (
                'id' => '185',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":90,"name":"AI YETI KOKOM KOMALASARI","email":"ai_yeti_kokom_komalasari@karmapack.id","foto":null,"username":"ai_yeti","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:38:45"}',
            ),
            181 => 
            array (
                'id' => '186',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":91,"name":"SIPA PUSPITA SARI","email":"sipapuspita620@gmail.com","foto":null,"username":null,"email_verified_at":null,"password":"$2y$10$DsI7ChQu4aIwEwc0CTlCnO66pBuIukicAIA\\/oIKwHD4AIGzIHmHZO","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-07 11:43:35"}',
            ),
            182 => 
            array (
                'id' => '187',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":92,"name":"ADE MUNAWAR","email":"ade_munawar@karmapack.id","foto":null,"username":"ade_munawar","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:50:36"}',
            ),
            183 => 
            array (
                'id' => '188',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":93,"name":"ABDUL AZIZ","email":"azizalhazkil24@gmail.com","foto":null,"username":"abdul_aziz","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"GJn4SEMcEYrKSjFByQB6A66lwjozGNjd4RYrmgesb2dRxP8OTopLhEV8MAg1","created_at":null,"updated_at":"2023-03-19 10:42:11"}',
            ),
            184 => 
            array (
                'id' => '189',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":94,"name":"GUSAERI","email":"gusaeri@karmapack.id","foto":null,"username":"gusaeri","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:56:04"}',
            ),
            185 => 
            array (
                'id' => '190',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":95,"name":"M. FAISHAL","email":"m_faishal@karmapack.id","foto":null,"username":"m_faishal","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:58:08"}',
            ),
            186 => 
            array (
                'id' => '191',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":96,"name":"NASRIATUL HAMIDAH","email":"nasriatulhamidah12@gmail.com","foto":null,"username":"nasiratul_hamidah","email_verified_at":null,"password":"$2y$10$DHRAQsNhXq6LEcSKHlr.2ejnw04g9NS39HT2gpsNa0TXWDv1ge37m","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:58:51"}',
            ),
            187 => 
            array (
                'id' => '192',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":97,"name":"NENG NURHASANAH","email":"neng_nurhasanah@karmapack.id","foto":null,"username":"nengnurhasanah","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:56:39"}',
            ),
            188 => 
            array (
                'id' => '193',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":98,"name":"SOLEHUDIN","email":"solehudin@karmapack.id","foto":null,"username":"solehudin","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:59:34"}',
            ),
            189 => 
            array (
                'id' => '194',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":99,"name":"AHMAD DIMYATI RIDWAN","email":"dimyatiridwanahmad@gmail.com","foto":null,"username":"ahmaddimyatiridwan16","email_verified_at":null,"password":"$2y$10$DsI7ChQu4aIwEwc0CTlCnO66pBuIukicAIA\\/oIKwHD4AIGzIHmHZO","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:44:12"}',
            ),
            190 => 
            array (
                'id' => '195',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":100,"name":"ELISA PUTRI ANGGRAENI","email":"elisa_putri_anggraeni@karmapack.id","foto":null,"username":"elisot","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2023-03-17 20:21:34"}',
            ),
            191 => 
            array (
                'id' => '196',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":101,"name":"WIDI AYUNI MAULIDIA","email":"widi@karmapack.id","foto":null,"username":"widimailcom","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:47:51"}',
            ),
            192 => 
            array (
                'id' => '197',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":106,"name":"RAMLAN HIDAYAT","email":"ramlan_hidayat@karmapack.id","foto":null,"username":"ramlan_hidayat","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 01:49:15"}',
            ),
            193 => 
            array (
                'id' => '198',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":108,"name":"AJENG KARTINI","email":"ajeng_kartini@karmapack.id","foto":null,"username":"ajeng_kartini_pcy","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:08:49"}',
            ),
            194 => 
            array (
                'id' => '199',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":109,"name":"M. ILHAM FAISAL","email":"ilham_faisal_debo@karmapack.id","foto":null,"username":"m_ilham_faisal","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:06:30"}',
            ),
            195 => 
            array (
                'id' => '200',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":110,"name":"RISMAWANTI AWALIAH S","email":"rismawas1073@gmail.com","foto":null,"username":"rismawannti","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"7ZKL26mR4eWPIfRSAOMa9zPaUCD51bORjbFqCP78NONGlUnRCUicgIQjV3Sx","created_at":null,"updated_at":"2023-03-18 20:44:26"}',
            ),
            196 => 
            array (
                'id' => '201',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":111,"name":"THIA RAMADHANI AMIN","email":"thia_ramadhani_amin@karmapack.id","foto":null,"username":"thia_ramadhani_amin","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":null,"updated_at":"2022-09-01 02:04:45"}',
            ),
            197 => 
            array (
                'id' => '202',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":114,"name":"Engkon Abdul Gani","email":"ukonag04@gmail.com","foto":null,"username":"engkon-abdul-gani20230316162922","email_verified_at":null,"password":"$2y$10$Lz80zGpWXp5XtuH9kmCMDO6FH1lKzO8v6EMgzxC6L\\/5Vz0udA.smi","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"DEoeCQOlOFCCaxMVqmJidEJAzWWUQ9cewGhUDAigAkh0b4AkBEGdY78VKD7l","created_at":"2023-03-16 16:29:23","updated_at":"2023-03-16 16:29:23"}',
            ),
            198 => 
            array (
                'id' => '203',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:50:06',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":185,"name":"Dian Nopiandi","email":"diannopiandi150995@gmail.com","foto":null,"username":"diannopiandi","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"kTq4Otx1xhLpNz1Ap8g9wrBCnzszTL92u8gh8rL6h0JaDeDD6o90UKbdGqQs","created_at":"2023-03-17 23:45:54","updated_at":"2023-03-18 18:56:09"}',
            ),
            199 => 
            array (
                'id' => '204',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:51:30',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":403,"parent_id":null,"title":"Laporan","icon":"fas fa-book","route":null,"sequence":47,"active":1,"type":1,"created_at":"2022-08-18 18:54:07","updated_at":"2023-02-19 20:36:03"}',
            ),
            200 => 
            array (
                'id' => '205',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:51:30',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":403,"updated_at":"2023-04-19T22:51:30.000000Z","created_at":"2023-04-19T22:51:30.000000Z","id":1230}',
            ),
            201 => 
            array (
                'id' => '206',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:51:30',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":4,"menu_id":403,"updated_at":"2023-04-19T22:51:30.000000Z","created_at":"2023-04-19T22:51:30.000000Z","id":1231}',
            ),
            202 => 
            array (
                'id' => '207',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:51:30',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":5,"menu_id":403,"updated_at":"2023-04-19T22:51:30.000000Z","created_at":"2023-04-19T22:51:30.000000Z","id":1232}',
            ),
            203 => 
            array (
                'id' => '208',
                'user_id' => '1',
                'log_date' => '2023-04-20 05:51:30',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":6,"menu_id":403,"updated_at":"2023-04-19T22:51:30.000000Z","created_at":"2023-04-19T22:51:30.000000Z","id":1233}',
            ),
            204 => 
            array (
                'id' => '209',
                'user_id' => '1',
                'log_date' => '2023-04-20 06:35:28',
                'table_name' => 'artikel',
                'log_type' => 'edit',
            'data' => '{"id":40,"nama":"DISKUSI PUBLIK","slug":"diskusi-publik","foto":"\\/assets\\/artikel\\/diskusi-pu16789612170.png","detail":"<div class=\\"_a9zs\\" style=\'display: inline; color: rgb(38, 38, 38); font-family: -apple-system, BlinkMacSystemFont, \\"Segoe UI\\", Roboto, Helvetica, Arial, sans-serif;\'><img data-bs-filename=\\"330374136_875625676874459_7239910307577273849_n.webp\\" style=\\"width: 640.4px;\\" src=\\"\\/assets\\/artikel\\/diskusi-pu16789612170.png\\"><br><div class=\\"_a9zs\\" style=\'display: inline; color: rgb(38, 38, 38); font-family: -apple-system, BlinkMacSystemFont, \\"Segoe UI\\", Roboto, Helvetica, Arial, sans-serif;\'>Alhamdulillah hirobbil alamin diskusi publik dengan tema \\"Peran Mahasiswa dan Pelajar dalam Mengawal Demokrasi\\" dalam rangka memperingati hari ulang tahun Karmapack ke-18 telah selesai dilaksanakan.<br><br>kami ucapkan terimakasih kepada semua pihak yang telah terlibat dalam kegiatan ini. Sampai jumpa di kegiatan selanjutnya &eth;&#159;&#145;&#139;&eth;&#159;&#145;&#139;<br><br>18 Tahun KARMAPACK<br>\\"Meningkatkan Semangat, Menguatkan Persaudaraan \\"<br><br>11 Februari 2023<br><br>HALING KU AING!<br><br>Instagram :&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz notranslate _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/orda_karmapack\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline;\\">@orda_karmapack<\\/a><br>Facebook : Orda Karmapack<br>__________________________<br><a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/ordakarmapack\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#ordakarmapack<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/karmapack\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#karmapack<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/karmapack2022\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#karmapack2022<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/kabinetsabilulungan\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#kabinetsabilulungan<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/halingkuaing\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#halingkuaing<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/harlah\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#harlah<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/harlahkarmapack18\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#harlahkarmapack18<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/harlahkarmapackke18\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#harlahkarmapackke18<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/orda\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#orda<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/cianjur\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#cianjur<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/cianjurkidul\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#cianjurkidul<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/diskusi\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#diskusi<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/diskusipublik\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#diskusipublik<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/mahasiswa\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#mahasiswa<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/pelajar\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#pelajar<\\/a><\\/div><\\/div>\\r\\n","excerpt":"Alhamdulillah hirobbil alamin diskusi publik dengan tema \\"Peran Mahasiswa dan Pelajar dalam Mengawal Demokrasi\\" dalam rangka memperingati hari ulang tahun Karmapack ke-18 telah selesai dilaksanakan.","counter":186,"date":"2023-02-11","status":1,"created_at":"2023-03-16 17:06:57","updated_at":"2023-04-19 04:46:56","user_id":1}',
            ),
            205 => 
            array (
                'id' => '210',
                'user_id' => '1',
                'log_date' => '2023-04-20 06:38:31',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":1,"name":"Isep Lutpi Nur","email":"iseplutpinur7@gmail.com","foto":"iseplutpinur20230316150353.png","username":"iseplutpinur","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":1,"two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"PIkbbqCffBYt0omRaXxKTHqxql6qlKeNUHMmElWi9sKJoAqdMU0TH94jxLnW","created_at":null,"updated_at":"2023-04-20 05:50:05"}',
            ),
            206 => 
            array (
                'id' => '211',
                'user_id' => '1',
                'log_date' => '2023-04-20 06:38:31',
                'table_name' => 'anggotas',
                'log_type' => 'edit',
                'data' => '{"id":1,"nomor_anggota":null,"nama":"Isep Lutpi Nur","tanggal_lahir":"2000-08-10","jenis_kelamin":"laki-laki","angkatan":"2019","province_id":"32","regency_id":"3203","district_id":"3203051","village_id":"3203051006","alamat_lengkap":"Jl. Tipar, Rt 23\\/Rw 12 Dekat SD Negeri 1 Tipar","bio":"Gajah mati meninggalkan gading, harimau mati meninggalkan belang, manusia mati meninggalkan nama.","profesi":"Pelajar\\/Mahasiswa","foto":"iseplutpinur20230316150353.png","telepon":"085798132505","whatsapp":"85798132505","status":"ANGGOTA BIASA","user_id":1,"created_at":"2023-02-11 00:40:11","updated_at":"2023-03-16 15:03:53"}',
            ),
            207 => 
            array (
                'id' => '212',
                'user_id' => '1',
                'log_date' => '2023-04-20 07:00:09',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.85.25","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            208 => 
            array (
                'id' => '213',
                'user_id' => '1',
                'log_date' => '2023-04-20 07:00:28',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"1","name":"Isep Lutpi Nur","email":"iseplutpinur7@gmail.com","foto":"iseplutpinur20230420063831.png","username":"iseplutpinur","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"PIkbbqCffBYt0omRaXxKTHqxql6qlKeNUHMmElWi9sKJoAqdMU0TH94jxLnW","created_at":null,"updated_at":"2023-04-20 06:38:31"}',
            ),
            209 => 
            array (
                'id' => '214',
                'user_id' => '1',
                'log_date' => '2023-04-20 07:01:56',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.79.192","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            210 => 
            array (
                'id' => '215',
                'user_id' => '1',
                'log_date' => '2023-04-20 07:03:39',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.admin.app.title","value":"Karmapack","updated_at":"2023-04-20T00:03:39.000000Z","created_at":"2023-04-20T00:03:39.000000Z","id":1}',
            ),
            211 => 
            array (
                'id' => '216',
                'user_id' => '1',
                'log_date' => '2023-04-20 07:03:39',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.admin.app.copyright","value":"<div>\\u00a9  2023 Karmapack V3.0.0. <\\/div> <div> Persembahan Dari <a href=\\"__base_url__\\/iseplutpinur\\" class=\\"fw-bold\\">Isep Lutpi Nur<\\/a> Bidang Kominfo. <\\/div>","updated_at":"2023-04-20T00:03:39.000000Z","created_at":"2023-04-20T00:03:39.000000Z","id":2}',
            ),
            212 => 
            array (
                'id' => '217',
                'user_id' => '1',
                'log_date' => '2023-04-20 07:03:39',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.admin.app.preloader","value":0,"updated_at":"2023-04-20T00:03:39.000000Z","created_at":"2023-04-20T00:03:39.000000Z","id":3}',
            ),
            213 => 
            array (
                'id' => '218',
                'user_id' => '1',
                'log_date' => '2023-04-20 07:04:14',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.title","value":"Karmapack","updated_at":"2023-04-20T00:04:14.000000Z","created_at":"2023-04-20T00:04:14.000000Z","id":4}',
            ),
            214 => 
            array (
                'id' => '219',
                'user_id' => '1',
                'log_date' => '2023-04-20 07:04:14',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.copyright","value":"\\u00a9 2023 Karmapack V3.0.0. Persembahan Dari <a class=\\"text-purple-1 px-3\\" href=\\"__base_url__\\/iseplutpinur\\">Isep Lutpi Nur<\\/a> Bidang Kominfo.","updated_at":"2023-04-20T00:04:14.000000Z","created_at":"2023-04-20T00:04:14.000000Z","id":5}',
            ),
            215 => 
            array (
                'id' => '220',
                'user_id' => '1',
                'log_date' => '2023-04-20 07:04:14',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.preloader","value":0,"updated_at":"2023-04-20T00:04:14.000000Z","created_at":"2023-04-20T00:04:14.000000Z","id":6}',
            ),
            216 => 
            array (
                'id' => '221',
                'user_id' => '1',
                'log_date' => '2023-04-20 07:04:14',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.no_telepon","value":"6285798132505","updated_at":"2023-04-20T00:04:14.000000Z","created_at":"2023-04-20T00:04:14.000000Z","id":7}',
            ),
            217 => 
            array (
                'id' => '222',
                'user_id' => '1',
                'log_date' => '2023-04-20 07:04:14',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.no_whatsapp","value":"6285798132505","updated_at":"2023-04-20T00:04:14.000000Z","created_at":"2023-04-20T00:04:14.000000Z","id":8}',
            ),
            218 => 
            array (
                'id' => '223',
                'user_id' => '1',
                'log_date' => '2023-04-20 07:04:14',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.address","value":"Jl Terusan Sapujagat No.225 144F, RT.8\\/RW.4, Sukaluyu","updated_at":"2023-04-20T00:04:14.000000Z","created_at":"2023-04-20T00:04:14.000000Z","id":9}',
            ),
            219 => 
            array (
                'id' => '224',
                'user_id' => '1',
                'log_date' => '2023-04-20 07:04:58',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.79.192","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Mobile Safari\\/537.36"}',
            ),
            220 => 
            array (
                'id' => '225',
                'user_id' => '1',
                'log_date' => '2023-04-20 14:11:56',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.71.76","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            221 => 
            array (
                'id' => '226',
                'user_id' => '1',
                'log_date' => '2023-04-20 14:11:56',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.71.76","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            222 => 
            array (
                'id' => '227',
                'user_id' => '1',
                'log_date' => '2023-04-20 14:11:58',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.71.76","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            223 => 
            array (
                'id' => '228',
                'user_id' => '1',
                'log_date' => '2023-04-20 14:12:03',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.71.76","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            224 => 
            array (
                'id' => '229',
                'user_id' => '1',
                'log_date' => '2023-04-20 14:12:03',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.71.76","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            225 => 
            array (
                'id' => '230',
                'user_id' => '1',
                'log_date' => '2023-04-20 14:12:16',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.71.76","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            226 => 
            array (
                'id' => '231',
                'user_id' => '1',
                'log_date' => '2023-04-20 14:12:16',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.71.76","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            227 => 
            array (
                'id' => '232',
                'user_id' => '1',
                'log_date' => '2023-04-20 14:12:16',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.71.76","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            228 => 
            array (
                'id' => '233',
                'user_id' => '1',
                'log_date' => '2023-04-20 14:12:16',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.71.76","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            229 => 
            array (
                'id' => '234',
                'user_id' => '1',
                'log_date' => '2023-04-20 14:42:40',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"1","name":"Isep Lutpi Nur","email":"iseplutpinur7@gmail.com","foto":"iseplutpinur20230420063831.png","username":"iseplutpinur","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"ctA8grRpKabPImLwlh4I8r4xOXprbdWLOf1SencsFGbQrYGSXln5nfwOci9q","created_at":null,"updated_at":"2023-04-20 06:38:31"}',
            ),
            230 => 
            array (
                'id' => '235',
                'user_id' => '1',
                'log_date' => '2023-04-20 14:42:40',
                'table_name' => 'anggotas',
                'log_type' => 'edit',
                'data' => '{"id":"1","nomor_anggota":null,"nama":"Isep Lutpi Nur","tanggal_lahir":"2000-08-10","jenis_kelamin":"laki-laki","angkatan":"2019","province_id":"32","regency_id":"3203","district_id":"3203051","village_id":"3203051006","alamat_lengkap":"Jl. Tipar, Rt 23\\/Rw 12 Dekat SD Negeri 1 Tipar","bio":"Gajah mati meninggalkan gading, harimau mati meninggalkan belang, manusia mati meninggalkan nama.","profesi":"Pelajar\\/Mahasiswa","foto":"iseplutpinur20230316150353.png","telepon":"085798132505","whatsapp":"85798132505","status":"ANGGOTA BIASA","user_id":"1","created_at":"2023-02-11 00:40:11","updated_at":"2023-03-16 15:03:53"}',
            ),
            231 => 
            array (
                'id' => '236',
                'user_id' => '1',
                'log_date' => '2023-04-20 14:45:56',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"1","name":"Isep Lutpi Nur","email":"iseplutpinur7@gmail.com","foto":"iseplutpinur20230420144240.png","username":"iseplutpinur","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"ctA8grRpKabPImLwlh4I8r4xOXprbdWLOf1SencsFGbQrYGSXln5nfwOci9q","created_at":null,"updated_at":"2023-04-20 14:42:40"}',
            ),
            232 => 
            array (
                'id' => '237',
                'user_id' => '16',
                'log_date' => '2023-04-20 14:46:04',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.79.68","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            233 => 
            array (
                'id' => '238',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:51:03',
                'table_name' => 'anggota_hobis',
                'log_type' => 'create',
                'data' => '{"id":18,"nama":"Coding","anggota_id":1,"created_at":null,"updated_at":null}',
            ),
            234 => 
            array (
                'id' => '239',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:51:03',
                'table_name' => 'anggota_hobis',
                'log_type' => 'create',
                'data' => '{"id":19,"nama":"Musik","anggota_id":1,"created_at":null,"updated_at":null}',
            ),
            235 => 
            array (
                'id' => '240',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:51:03',
                'table_name' => 'anggota_hobis',
                'log_type' => 'create',
                'data' => '{"id":20,"nama":"Sepedaan","anggota_id":1,"created_at":null,"updated_at":null}',
            ),
            236 => 
            array (
                'id' => '241',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:51:31',
                'table_name' => 'anggota_hobis',
                'log_type' => 'create',
                'data' => '{"id":21,"nama":"Coding","anggota_id":1,"created_at":null,"updated_at":null}',
            ),
            237 => 
            array (
                'id' => '242',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:51:31',
                'table_name' => 'anggota_hobis',
                'log_type' => 'create',
                'data' => '{"id":22,"nama":"Musik","anggota_id":1,"created_at":null,"updated_at":null}',
            ),
            238 => 
            array (
                'id' => '243',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:51:31',
                'table_name' => 'anggota_hobis',
                'log_type' => 'create',
                'data' => '{"id":23,"nama":"Sepedaan","anggota_id":1,"created_at":null,"updated_at":null}',
            ),
            239 => 
            array (
                'id' => '244',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:51:31',
                'table_name' => 'anggota_hobis',
                'log_type' => 'create',
                'data' => '{"id":24,"nama":"suuuu","anggota_id":1,"created_at":null,"updated_at":null}',
            ),
            240 => 
            array (
                'id' => '245',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:51:39',
                'table_name' => 'anggota_hobis',
                'log_type' => 'create',
                'data' => '{"id":25,"nama":"Coding","anggota_id":1,"created_at":null,"updated_at":null}',
            ),
            241 => 
            array (
                'id' => '246',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:51:39',
                'table_name' => 'anggota_hobis',
                'log_type' => 'create',
                'data' => '{"id":26,"nama":"Musik","anggota_id":1,"created_at":null,"updated_at":null}',
            ),
            242 => 
            array (
                'id' => '247',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:51:39',
                'table_name' => 'anggota_hobis',
                'log_type' => 'create',
                'data' => '{"id":27,"nama":"Sepedaan","anggota_id":1,"created_at":null,"updated_at":null}',
            ),
            243 => 
            array (
                'id' => '248',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:56:06',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.admin.app.title","value":"Karmapack","updated_at":"2023-04-20T08:56:06.000000Z","created_at":"2023-04-20T08:56:06.000000Z","id":1}',
            ),
            244 => 
            array (
                'id' => '249',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:56:06',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.admin.app.copyright","value":"<div>\\u00a9  2023 Karmapack V3.0.1. <\\/div> <div> Persembahan Dari <a href=\\"__base_url__\\/iseplutpinur\\" class=\\"fw-bold\\">Isep Lutpi Nur<\\/a> Bidang Kominfo. <\\/div>","updated_at":"2023-04-20T08:56:06.000000Z","created_at":"2023-04-20T08:56:06.000000Z","id":2}',
            ),
            245 => 
            array (
                'id' => '250',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:56:06',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.admin.app.preloader","value":0,"updated_at":"2023-04-20T08:56:06.000000Z","created_at":"2023-04-20T08:56:06.000000Z","id":3}',
            ),
            246 => 
            array (
                'id' => '251',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:56:13',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.title","value":"Karmapack","updated_at":"2023-04-20T08:56:13.000000Z","created_at":"2023-04-20T08:56:13.000000Z","id":4}',
            ),
            247 => 
            array (
                'id' => '252',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:56:13',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.copyright","value":"\\u00a9 2023 Karmapack V3.0.1. Persembahan Dari <a class=\\"text-purple-1 px-3\\" href=\\"__base_url__\\/iseplutpinur\\">Isep Lutpi Nur<\\/a> Bidang Kominfo.","updated_at":"2023-04-20T08:56:13.000000Z","created_at":"2023-04-20T08:56:13.000000Z","id":5}',
            ),
            248 => 
            array (
                'id' => '253',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:56:13',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.preloader","value":0,"updated_at":"2023-04-20T08:56:13.000000Z","created_at":"2023-04-20T08:56:13.000000Z","id":6}',
            ),
            249 => 
            array (
                'id' => '254',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:56:13',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.no_telepon","value":"6285798132505","updated_at":"2023-04-20T08:56:13.000000Z","created_at":"2023-04-20T08:56:13.000000Z","id":7}',
            ),
            250 => 
            array (
                'id' => '255',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:56:13',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.no_whatsapp","value":"6285798132505","updated_at":"2023-04-20T08:56:13.000000Z","created_at":"2023-04-20T08:56:13.000000Z","id":8}',
            ),
            251 => 
            array (
                'id' => '256',
                'user_id' => '1',
                'log_date' => '2023-04-20 15:56:13',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.address","value":"Jl Terusan Sapujagat No.225 144F, RT.8\\/RW.4, Sukaluyu","updated_at":"2023-04-20T08:56:13.000000Z","created_at":"2023-04-20T08:56:13.000000Z","id":9}',
            ),
            252 => 
            array (
                'id' => '257',
                'user_id' => '16',
                'log_date' => '2023-04-20 16:41:02',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"127.0.0.1","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            253 => 
            array (
                'id' => '258',
                'user_id' => '1',
                'log_date' => '2023-04-20 20:13:53',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.70.192","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Mobile Safari\\/537.36"}',
            ),
            254 => 
            array (
                'id' => '259',
                'user_id' => '1',
                'log_date' => '2023-04-20 20:16:14',
                'table_name' => 'users',
                'log_type' => 'create',
                'data' => '{"name":"Isep Lutpi Nur","email":"iseplutpi1008@gmail.com","username":"isep-lutpi-nur20230420201614","active":1,"updated_at":"2023-04-20T13:16:14.000000Z","created_at":"2023-04-20T13:16:14.000000Z","id":291,"profile_photo_url":"https:\\/\\/ui-avatars.com\\/api\\/?name=I+L+N&color=7F9CF5&background=EBF4FF"}',
            ),
            255 => 
            array (
                'id' => '260',
                'user_id' => '1',
                'log_date' => '2023-04-20 20:16:14',
                'table_name' => 'anggotas',
                'log_type' => 'create',
                'data' => '{"nama":"Isep Lutpi Nur","angkatan":"2022","telepon":"5798132505","whatsapp":"5798132505","user_id":291,"updated_at":"2023-04-20T13:16:14.000000Z","created_at":"2023-04-20T13:16:14.000000Z","id":266}',
            ),
            256 => 
            array (
                'id' => '261',
                'user_id' => '1',
                'log_date' => '2023-04-20 20:16:14',
                'table_name' => 'pend_sensus',
                'log_type' => 'create',
                'data' => '{"nama":"Isep Lutpi Nur","angkatan":"2022","email":"iseplutpi1008@gmail.com","whatsapp":"5798132505","telepon":"5798132505","status":2,"keterangan":"Sudah dijadikan pengguna dengan email: iseplutpi1008@gmail.com dan password: 12345678","updated_at":"2023-04-20T13:16:14.000000Z","created_at":"2023-04-20T13:16:14.000000Z","id":17}',
            ),
            257 => 
            array (
                'id' => '262',
                'user_id' => '1',
                'log_date' => '2023-04-20 20:16:59',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"1","name":"Isep Lutpi Nur","email":"iseplutpinur7@gmail.com","foto":"iseplutpinur20230420144240.png","username":"iseplutpinur","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"ctA8grRpKabPImLwlh4I8r4xOXprbdWLOf1SencsFGbQrYGSXln5nfwOci9q","created_at":null,"updated_at":"2023-04-20 14:42:40"}',
            ),
            258 => 
            array (
                'id' => '263',
                'user_id' => '291',
                'log_date' => '2023-04-20 20:17:13',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"291","name":"Isep Lutpi Nur","email":"iseplutpi1008@gmail.com","foto":null,"username":"isep-lutpi-nur20230420201614","email_verified_at":null,"password":"$2y$10$6l6sTUqdXao0HsBblE4T0uZVrACDUCJyc4cgmSyiE.SKQFL8RZe\\/u","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":"2023-04-20 20:16:14","updated_at":"2023-04-20 20:16:14"}',
            ),
            259 => 
            array (
                'id' => '264',
                'user_id' => '291',
                'log_date' => '2023-04-20 20:17:13',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.70.192","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Mobile Safari\\/537.36"}',
            ),
            260 => 
            array (
                'id' => '265',
                'user_id' => '291',
                'log_date' => '2023-04-20 20:18:20',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"291","name":"Isep Lutpi Nur","email":"iseplutpi1008@gmail.com","foto":null,"username":"isep-lutpi-nur20230420201614","email_verified_at":null,"password":"$2y$10$6l6sTUqdXao0HsBblE4T0uZVrACDUCJyc4cgmSyiE.SKQFL8RZe\\/u","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"OC0PvcDsr4YNRFZadDJECkmOTKjGIssBIr3rHvUPTEHinYeCrzQekoG4ZX28","created_at":"2023-04-20 20:16:14","updated_at":"2023-04-20 20:16:14"}',
            ),
            261 => 
            array (
                'id' => '266',
                'user_id' => '1',
                'log_date' => '2023-04-20 20:18:52',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.70.192","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Mobile Safari\\/537.36"}',
            ),
            262 => 
            array (
                'id' => '267',
                'user_id' => '1',
                'log_date' => '2023-04-20 20:19:08',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.title","value":"Karmapack","updated_at":"2023-04-20T13:19:08.000000Z","created_at":"2023-04-20T13:19:08.000000Z","id":1}',
            ),
            263 => 
            array (
                'id' => '268',
                'user_id' => '1',
                'log_date' => '2023-04-20 20:19:08',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.copyright","value":"\\u00a9 2023 Karmapack v3.1.0 Persembahan Dari <a class=\\"text-purple-1 px-3\\" href=\\"__base_url__\\/iseplutpinur\\">Isep Lutpi Nur<\\/a> Bidang Kominfo.","updated_at":"2023-04-20T13:19:08.000000Z","created_at":"2023-04-20T13:19:08.000000Z","id":2}',
            ),
            264 => 
            array (
                'id' => '269',
                'user_id' => '1',
                'log_date' => '2023-04-20 20:19:08',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.preloader","value":0,"updated_at":"2023-04-20T13:19:08.000000Z","created_at":"2023-04-20T13:19:08.000000Z","id":3}',
            ),
            265 => 
            array (
                'id' => '270',
                'user_id' => '1',
                'log_date' => '2023-04-20 20:19:08',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.no_telepon","value":null,"updated_at":"2023-04-20T13:19:08.000000Z","created_at":"2023-04-20T13:19:08.000000Z","id":4}',
            ),
            266 => 
            array (
                'id' => '271',
                'user_id' => '1',
                'log_date' => '2023-04-20 20:19:08',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.no_whatsapp","value":null,"updated_at":"2023-04-20T13:19:08.000000Z","created_at":"2023-04-20T13:19:08.000000Z","id":5}',
            ),
            267 => 
            array (
                'id' => '272',
                'user_id' => '1',
                'log_date' => '2023-04-20 20:19:08',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.front.app.address","value":null,"updated_at":"2023-04-20T13:19:08.000000Z","created_at":"2023-04-20T13:19:08.000000Z","id":6}',
            ),
            268 => 
            array (
                'id' => '273',
                'user_id' => '1',
                'log_date' => '2023-04-20 20:19:12',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"1","name":"Isep Lutpi Nur","email":"iseplutpinur7@gmail.com","foto":"iseplutpinur20230420144240.png","username":"iseplutpinur","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"2gOVmwZIWhOvLIwgIzqjbinRnXODJ7DXuUAqtwgYZyqWH8K3BuyvFlOXkYyZ","created_at":null,"updated_at":"2023-04-20 14:42:40"}',
            ),
            269 => 
            array (
                'id' => '274',
                'user_id' => '110',
                'log_date' => '2023-04-21 21:09:55',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.208.82","user_agent":"Mozilla\\/5.0 (Linux; Android 13; V2110) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/105.0.0.0 Mobile Safari\\/537.36"}',
            ),
            270 => 
            array (
                'id' => '275',
                'user_id' => '1',
                'log_date' => '2023-04-22 22:22:31',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.69.4","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/103.0.0.0 Mobile Safari\\/537.36"}',
            ),
            271 => 
            array (
                'id' => '276',
                'user_id' => '1',
                'log_date' => '2023-04-23 00:06:24',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.69.226","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            272 => 
            array (
                'id' => '277',
                'user_id' => '1',
                'log_date' => '2023-04-23 07:58:53',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.79.178","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            273 => 
            array (
                'id' => '278',
                'user_id' => '1',
                'log_date' => '2023-04-23 08:44:39',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"1","name":"Isep Lutpi Nur","email":"iseplutpinur7@gmail.com","foto":"iseplutpinur20230420144240.png","username":"iseplutpinur","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"ZeT70S3UgscGpFMYZNQgMwa39DiEwr00fodQz5EvOpDpyYrEzLSQKsUAghKE","created_at":null,"updated_at":"2023-04-20 14:42:40"}',
            ),
            274 => 
            array (
                'id' => '279',
                'user_id' => '1',
                'log_date' => '2023-04-23 08:57:38',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.69.226","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.48"}',
            ),
            275 => 
            array (
                'id' => '280',
                'user_id' => '1',
                'log_date' => '2023-04-23 17:05:00',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.69.118","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/103.0.0.0 Mobile Safari\\/537.36"}',
            ),
            276 => 
            array (
                'id' => '281',
                'user_id' => '1',
                'log_date' => '2023-04-23 17:05:22',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"1","name":"Isep Lutpi Nur","email":"iseplutpinur7@gmail.com","foto":"iseplutpinur20230420144240.png","username":"iseplutpinur","email_verified_at":null,"password":"$2y$10$qsdfd1sVrKFffagRNWzGve3m7kvJv.cfkgWquP7Bw04yZBIyyMcXu","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"YEJExGZidL9W3W5JgbK4Ua9L5oHNioOEedjTAWyALGuo6KObW3WUwp2j0LOz","created_at":null,"updated_at":"2023-04-20 14:42:40"}',
            ),
            277 => 
            array (
                'id' => '282',
                'user_id' => '1',
                'log_date' => '2023-04-23 23:11:11',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.105.40","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.58"}',
            ),
            278 => 
            array (
                'id' => '283',
                'user_id' => '1',
                'log_date' => '2023-04-24 01:51:04',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.105.60","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.58"}',
            ),
            279 => 
            array (
                'id' => '284',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:01',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"52.167.144.117","visitors_id":254,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:01.000000Z","created_at":"2023-04-25T04:38:01.000000Z","id":1}',
            ),
            280 => 
            array (
                'id' => '285',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:03',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":247,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T04:38:03.000000Z","created_at":"2023-04-25T04:38:03.000000Z","id":2}',
            ),
            281 => 
            array (
                'id' => '286',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:05',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.139","visitors_id":248,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:05.000000Z","created_at":"2023-04-25T04:38:05.000000Z","id":3}',
            ),
            282 => 
            array (
                'id' => '287',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:05',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"157.55.39.213","visitors_id":256,"city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:05.000000Z","created_at":"2023-04-25T04:38:05.000000Z","id":4}',
            ),
            283 => 
            array (
                'id' => '288',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:05',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"207.46.13.220","visitors_id":255,"city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:05.000000Z","created_at":"2023-04-25T04:38:05.000000Z","id":5}',
            ),
            284 => 
            array (
                'id' => '289',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:06',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.70.73","visitors_id":249,"city":"Columbia","region":"South Carolina","country_code":"US","country":"United States of America","loc":"34.0007,-81.0348","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:06.000000Z","created_at":"2023-04-25T04:38:06.000000Z","id":6}',
            ),
            285 => 
            array (
                'id' => '290',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:06',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.153","visitors_id":252,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:06.000000Z","created_at":"2023-04-25T04:38:06.000000Z","id":7}',
            ),
            286 => 
            array (
                'id' => '291',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:09',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.129","visitors_id":253,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:09.000000Z","created_at":"2023-04-25T04:38:09.000000Z","id":8}',
            ),
            287 => 
            array (
                'id' => '292',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:11',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.70.77","visitors_id":251,"city":"Columbia","region":"South Carolina","country_code":"US","country":"United States of America","loc":"34.0007,-81.0348","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:11.000000Z","created_at":"2023-04-25T04:38:11.000000Z","id":9}',
            ),
            288 => 
            array (
                'id' => '293',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:13',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.169","visitors_id":250,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:13.000000Z","created_at":"2023-04-25T04:38:13.000000Z","id":10}',
            ),
            289 => 
            array (
                'id' => '294',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:14',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.153","visitors_id":227,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:14.000000Z","created_at":"2023-04-25T04:38:14.000000Z","id":11}',
            ),
            290 => 
            array (
                'id' => '295',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:21',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":224,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T04:38:21.000000Z","created_at":"2023-04-25T04:38:21.000000Z","id":12}',
            ),
            291 => 
            array (
                'id' => '296',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:23',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"54.149.136.178","visitors_id":246,"city":"Boardman","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.8399,-119.7006","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:23.000000Z","created_at":"2023-04-25T04:38:23.000000Z","id":13}',
            ),
            292 => 
            array (
                'id' => '297',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:23',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"35.90.75.158","visitors_id":245,"city":"Boardman","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.8399,-119.7006","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:23.000000Z","created_at":"2023-04-25T04:38:23.000000Z","id":14}',
            ),
            293 => 
            array (
                'id' => '298',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:29',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.169","visitors_id":244,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:29.000000Z","created_at":"2023-04-25T04:38:29.000000Z","id":15}',
            ),
            294 => 
            array (
                'id' => '299',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:30',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.70.69","visitors_id":243,"city":"Columbia","region":"South Carolina","country_code":"US","country":"United States of America","loc":"34.0007,-81.0348","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:30.000000Z","created_at":"2023-04-25T04:38:30.000000Z","id":16}',
            ),
            295 => 
            array (
                'id' => '300',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:30',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.129","visitors_id":229,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:30.000000Z","created_at":"2023-04-25T04:38:30.000000Z","id":17}',
            ),
            296 => 
            array (
                'id' => '301',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:31',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.173","visitors_id":240,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:31.000000Z","created_at":"2023-04-25T04:38:31.000000Z","id":18}',
            ),
            297 => 
            array (
                'id' => '302',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:31',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.169","visitors_id":228,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:31.000000Z","created_at":"2023-04-25T04:38:31.000000Z","id":19}',
            ),
            298 => 
            array (
                'id' => '303',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:31',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"112.215.151.254","visitors_id":242,"city":"Jakarta","region":"Jakarta","country_code":"ID","country":"Indonesia","loc":"-6.2146,106.8451","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:31.000000Z","created_at":"2023-04-25T04:38:31.000000Z","id":20}',
            ),
            299 => 
            array (
                'id' => '304',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:32',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.139","visitors_id":233,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:32.000000Z","created_at":"2023-04-25T04:38:32.000000Z","id":21}',
            ),
            300 => 
            array (
                'id' => '305',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:34',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.171","visitors_id":241,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:34.000000Z","created_at":"2023-04-25T04:38:34.000000Z","id":22}',
            ),
            301 => 
            array (
                'id' => '306',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:34',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.171","visitors_id":239,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:34.000000Z","created_at":"2023-04-25T04:38:34.000000Z","id":23}',
            ),
            302 => 
            array (
                'id' => '307',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:35',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"52.167.144.117","visitors_id":230,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:35.000000Z","created_at":"2023-04-25T04:38:35.000000Z","id":24}',
            ),
            303 => 
            array (
                'id' => '308',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:35',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.70.73","visitors_id":238,"city":"Columbia","region":"South Carolina","country_code":"US","country":"United States of America","loc":"34.0007,-81.0348","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:35.000000Z","created_at":"2023-04-25T04:38:35.000000Z","id":25}',
            ),
            304 => 
            array (
                'id' => '309',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:36',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"36.74.43.121","visitors_id":237,"city":"Tasikmalaya","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-7.3274,108.2207","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:36.000000Z","created_at":"2023-04-25T04:38:36.000000Z","id":26}',
            ),
            305 => 
            array (
                'id' => '310',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:36',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.77.156","visitors_id":236,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:36.000000Z","created_at":"2023-04-25T04:38:36.000000Z","id":27}',
            ),
            306 => 
            array (
                'id' => '311',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:36',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"157.55.39.213","visitors_id":232,"city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:36.000000Z","created_at":"2023-04-25T04:38:36.000000Z","id":28}',
            ),
            307 => 
            array (
                'id' => '312',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:37',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.166","visitors_id":235,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:37.000000Z","created_at":"2023-04-25T04:38:37.000000Z","id":29}',
            ),
            308 => 
            array (
                'id' => '313',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:37',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"207.46.13.220","visitors_id":225,"city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:37.000000Z","created_at":"2023-04-25T04:38:37.000000Z","id":30}',
            ),
            309 => 
            array (
                'id' => '314',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:38',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"89.72.150.66","visitors_id":234,"city":"Warsaw","region":"Mazovia","country_code":"PL","country":"Poland","loc":"52.2298,21.0118","timezone":"Europe\\/Warsaw","updated_at":"2023-04-25T04:38:38.000000Z","created_at":"2023-04-25T04:38:38.000000Z","id":31}',
            ),
            310 => 
            array (
                'id' => '315',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:38',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.83","visitors_id":231,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:38.000000Z","created_at":"2023-04-25T04:38:38.000000Z","id":32}',
            ),
            311 => 
            array (
                'id' => '316',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:38',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"193.235.141.134","visitors_id":226,"city":"M\\u00e4rsta","region":"Stockholm","country_code":"SE","country":"Sweden","loc":"59.6216,17.8548","timezone":"Europe\\/Stockholm","updated_at":"2023-04-25T04:38:38.000000Z","created_at":"2023-04-25T04:38:38.000000Z","id":33}',
            ),
            312 => 
            array (
                'id' => '317',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:39',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"157.55.39.213","visitors_id":197,"city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:39.000000Z","created_at":"2023-04-25T04:38:39.000000Z","id":34}',
            ),
            313 => 
            array (
                'id' => '318',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:39',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.153","visitors_id":220,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:39.000000Z","created_at":"2023-04-25T04:38:39.000000Z","id":35}',
            ),
            314 => 
            array (
                'id' => '319',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:39',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":193,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T04:38:39.000000Z","created_at":"2023-04-25T04:38:39.000000Z","id":36}',
            ),
            315 => 
            array (
                'id' => '320',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:40',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.105.40","visitors_id":223,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:40.000000Z","created_at":"2023-04-25T04:38:40.000000Z","id":37}',
            ),
            316 => 
            array (
                'id' => '321',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:40',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"35.92.186.87","visitors_id":222,"city":"Boardman","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.8399,-119.7006","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:40.000000Z","created_at":"2023-04-25T04:38:40.000000Z","id":38}',
            ),
            317 => 
            array (
                'id' => '322',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:40',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"207.46.13.220","visitors_id":201,"city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:40.000000Z","created_at":"2023-04-25T04:38:40.000000Z","id":39}',
            ),
            318 => 
            array (
                'id' => '323',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:41',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.79.103","visitors_id":221,"city":"Salem","region":"Oregon","country_code":"US","country":"United States of America","loc":"44.9429,-123.0351","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:41.000000Z","created_at":"2023-04-25T04:38:41.000000Z","id":40}',
            ),
            319 => 
            array (
                'id' => '324',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:41',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.129","visitors_id":198,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:41.000000Z","created_at":"2023-04-25T04:38:41.000000Z","id":41}',
            ),
            320 => 
            array (
                'id' => '325',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:41',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"52.167.144.117","visitors_id":202,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:41.000000Z","created_at":"2023-04-25T04:38:41.000000Z","id":42}',
            ),
            321 => 
            array (
                'id' => '326',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:42',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.83","visitors_id":199,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:42.000000Z","created_at":"2023-04-25T04:38:42.000000Z","id":43}',
            ),
            322 => 
            array (
                'id' => '327',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:42',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.39.51.49","visitors_id":210,"city":"Jakarta","region":"Jakarta","country_code":"ID","country":"Indonesia","loc":"-6.2146,106.8451","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:42.000000Z","created_at":"2023-04-25T04:38:42.000000Z","id":44}',
            ),
            323 => 
            array (
                'id' => '328',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:43',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"36.74.43.121","visitors_id":219,"city":"Tasikmalaya","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-7.3274,108.2207","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:43.000000Z","created_at":"2023-04-25T04:38:43.000000Z","id":45}',
            ),
            324 => 
            array (
                'id' => '329',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:43',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.69.118","visitors_id":218,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:43.000000Z","created_at":"2023-04-25T04:38:43.000000Z","id":46}',
            ),
            325 => 
            array (
                'id' => '330',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:43',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.74.133","visitors_id":217,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:43.000000Z","created_at":"2023-04-25T04:38:43.000000Z","id":47}',
            ),
            326 => 
            array (
                'id' => '331',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:44',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.73.208","visitors_id":216,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:44.000000Z","created_at":"2023-04-25T04:38:44.000000Z","id":48}',
            ),
            327 => 
            array (
                'id' => '332',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:44',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.39.51.49","visitors_id":215,"city":"Jakarta","region":"Jakarta","country_code":"ID","country":"Indonesia","loc":"-6.2146,106.8451","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:44.000000Z","created_at":"2023-04-25T04:38:44.000000Z","id":49}',
            ),
            328 => 
            array (
                'id' => '333',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:44',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"36.74.43.121","visitors_id":214,"city":"Tasikmalaya","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-7.3274,108.2207","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:44.000000Z","created_at":"2023-04-25T04:38:44.000000Z","id":50}',
            ),
            329 => 
            array (
                'id' => '334',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:45',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.39.51.49","visitors_id":213,"city":"Jakarta","region":"Jakarta","country_code":"ID","country":"Indonesia","loc":"-6.2146,106.8451","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:45.000000Z","created_at":"2023-04-25T04:38:45.000000Z","id":51}',
            ),
            330 => 
            array (
                'id' => '335',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:45',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"36.74.43.121","visitors_id":212,"city":"Tasikmalaya","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-7.3274,108.2207","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:45.000000Z","created_at":"2023-04-25T04:38:45.000000Z","id":52}',
            ),
            331 => 
            array (
                'id' => '336',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:45',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.39.51.49","visitors_id":211,"city":"Jakarta","region":"Jakarta","country_code":"ID","country":"Indonesia","loc":"-6.2146,106.8451","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:45.000000Z","created_at":"2023-04-25T04:38:45.000000Z","id":53}',
            ),
            332 => 
            array (
                'id' => '337',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:46',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"52.167.144.149","visitors_id":200,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:46.000000Z","created_at":"2023-04-25T04:38:46.000000Z","id":54}',
            ),
            333 => 
            array (
                'id' => '338',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:46',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"140.213.32.210","visitors_id":209,"city":"Jakarta","region":"Jakarta","country_code":"ID","country":"Indonesia","loc":"-6.2146,106.8451","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:46.000000Z","created_at":"2023-04-25T04:38:46.000000Z","id":55}',
            ),
            334 => 
            array (
                'id' => '339',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:46',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.171","visitors_id":208,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:46.000000Z","created_at":"2023-04-25T04:38:46.000000Z","id":56}',
            ),
            335 => 
            array (
                'id' => '340',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:47',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.69.226","visitors_id":195,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:47.000000Z","created_at":"2023-04-25T04:38:47.000000Z","id":57}',
            ),
            336 => 
            array (
                'id' => '341',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:50',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.69.178","visitors_id":207,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:50.000000Z","created_at":"2023-04-25T04:38:50.000000Z","id":58}',
            ),
            337 => 
            array (
                'id' => '342',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:50',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.76.18","visitors_id":206,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:50.000000Z","created_at":"2023-04-25T04:38:50.000000Z","id":59}',
            ),
            338 => 
            array (
                'id' => '343',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:51',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.77.96","visitors_id":205,"city":"Des Moines","region":"Iowa","country_code":"US","country":"United States of America","loc":"41.6005,-93.6091","timezone":"America\\/Chicago","updated_at":"2023-04-25T04:38:51.000000Z","created_at":"2023-04-25T04:38:51.000000Z","id":60}',
            ),
            339 => 
            array (
                'id' => '344',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:51',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.79.178","visitors_id":204,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:51.000000Z","created_at":"2023-04-25T04:38:51.000000Z","id":61}',
            ),
            340 => 
            array (
                'id' => '345',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:51',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.171","visitors_id":203,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:51.000000Z","created_at":"2023-04-25T04:38:51.000000Z","id":62}',
            ),
            341 => 
            array (
                'id' => '346',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:52',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.69.246","visitors_id":196,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:52.000000Z","created_at":"2023-04-25T04:38:52.000000Z","id":63}',
            ),
            342 => 
            array (
                'id' => '347',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:53',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.78.170","visitors_id":194,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:53.000000Z","created_at":"2023-04-25T04:38:53.000000Z","id":64}',
            ),
            343 => 
            array (
                'id' => '348',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:53',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"52.167.144.149","visitors_id":177,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:53.000000Z","created_at":"2023-04-25T04:38:53.000000Z","id":65}',
            ),
            344 => 
            array (
                'id' => '349',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:53',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"18.236.91.203","visitors_id":192,"city":"Boardman","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.8399,-119.7006","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:53.000000Z","created_at":"2023-04-25T04:38:53.000000Z","id":66}',
            ),
            345 => 
            array (
                'id' => '350',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:54',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":174,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T04:38:54.000000Z","created_at":"2023-04-25T04:38:54.000000Z","id":67}',
            ),
            346 => 
            array (
                'id' => '351',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:54',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.69.8","visitors_id":191,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:38:54.000000Z","created_at":"2023-04-25T04:38:54.000000Z","id":68}',
            ),
            347 => 
            array (
                'id' => '352',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:54',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"52.167.144.117","visitors_id":180,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:54.000000Z","created_at":"2023-04-25T04:38:54.000000Z","id":69}',
            ),
            348 => 
            array (
                'id' => '353',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:55',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.173","visitors_id":190,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:55.000000Z","created_at":"2023-04-25T04:38:55.000000Z","id":70}',
            ),
            349 => 
            array (
                'id' => '354',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:55',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.77.121","visitors_id":189,"city":"Des Moines","region":"Iowa","country_code":"US","country":"United States of America","loc":"41.6005,-93.6091","timezone":"America\\/Chicago","updated_at":"2023-04-25T04:38:55.000000Z","created_at":"2023-04-25T04:38:55.000000Z","id":71}',
            ),
            350 => 
            array (
                'id' => '355',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:55',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.77.121","visitors_id":188,"city":"Des Moines","region":"Iowa","country_code":"US","country":"United States of America","loc":"41.6005,-93.6091","timezone":"America\\/Chicago","updated_at":"2023-04-25T04:38:55.000000Z","created_at":"2023-04-25T04:38:55.000000Z","id":72}',
            ),
            351 => 
            array (
                'id' => '356',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:56',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.77.127","visitors_id":187,"city":"Des Moines","region":"Iowa","country_code":"US","country":"United States of America","loc":"41.6005,-93.6091","timezone":"America\\/Chicago","updated_at":"2023-04-25T04:38:56.000000Z","created_at":"2023-04-25T04:38:56.000000Z","id":73}',
            ),
            352 => 
            array (
                'id' => '357',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:56',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.83","visitors_id":182,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:56.000000Z","created_at":"2023-04-25T04:38:56.000000Z","id":74}',
            ),
            353 => 
            array (
                'id' => '358',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:57',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"207.46.13.220","visitors_id":176,"city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:38:57.000000Z","created_at":"2023-04-25T04:38:57.000000Z","id":75}',
            ),
            354 => 
            array (
                'id' => '359',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:57',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"93.158.91.183","visitors_id":186,"city":"Stockholm","region":"Stockholm","country_code":"SE","country":"Sweden","loc":"59.3294,18.0687","timezone":"Europe\\/Stockholm","updated_at":"2023-04-25T04:38:57.000000Z","created_at":"2023-04-25T04:38:57.000000Z","id":76}',
            ),
            355 => 
            array (
                'id' => '360',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:57',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"93.158.91.234","visitors_id":184,"city":"Stockholm","region":"Stockholm","country_code":"SE","country":"Sweden","loc":"59.3294,18.0687","timezone":"Europe\\/Stockholm","updated_at":"2023-04-25T04:38:57.000000Z","created_at":"2023-04-25T04:38:57.000000Z","id":77}',
            ),
            356 => 
            array (
                'id' => '361',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:58',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"93.158.91.184","visitors_id":185,"city":"Stockholm","region":"Stockholm","country_code":"SE","country":"Sweden","loc":"59.3294,18.0687","timezone":"Europe\\/Stockholm","updated_at":"2023-04-25T04:38:58.000000Z","created_at":"2023-04-25T04:38:58.000000Z","id":78}',
            ),
            357 => 
            array (
                'id' => '362',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:38:58',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.129","visitors_id":178,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:38:58.000000Z","created_at":"2023-04-25T04:38:58.000000Z","id":79}',
            ),
            358 => 
            array (
                'id' => '363',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:00',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.171","visitors_id":183,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:39:00.000000Z","created_at":"2023-04-25T04:39:00.000000Z","id":80}',
            ),
            359 => 
            array (
                'id' => '364',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:00',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"157.55.39.213","visitors_id":179,"city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:39:00.000000Z","created_at":"2023-04-25T04:39:00.000000Z","id":81}',
            ),
            360 => 
            array (
                'id' => '365',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:01',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"77.75.79.54","visitors_id":181,"city":"Prague","region":"Hlavn\\u00ed m\\u011bsto Praha","country_code":"CZ","country":"Czech Republic","loc":"50.0880,14.4208","timezone":"Europe\\/Prague","updated_at":"2023-04-25T04:39:01.000000Z","created_at":"2023-04-25T04:39:01.000000Z","id":82}',
            ),
            361 => 
            array (
                'id' => '366',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:01',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.169","visitors_id":175,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:39:01.000000Z","created_at":"2023-04-25T04:39:01.000000Z","id":83}',
            ),
            362 => 
            array (
                'id' => '367',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:03',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"54.69.91.79","visitors_id":173,"city":"Boardman","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.8399,-119.7006","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:39:03.000000Z","created_at":"2023-04-25T04:39:03.000000Z","id":84}',
            ),
            363 => 
            array (
                'id' => '368',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:05',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"52.167.144.149","visitors_id":155,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:39:05.000000Z","created_at":"2023-04-25T04:39:05.000000Z","id":85}',
            ),
            364 => 
            array (
                'id' => '369',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:07',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":152,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T04:39:07.000000Z","created_at":"2023-04-25T04:39:07.000000Z","id":86}',
            ),
            365 => 
            array (
                'id' => '370',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:10',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.129","visitors_id":171,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:39:10.000000Z","created_at":"2023-04-25T04:39:10.000000Z","id":87}',
            ),
            366 => 
            array (
                'id' => '371',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:11',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"157.55.39.213","visitors_id":154,"city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:39:11.000000Z","created_at":"2023-04-25T04:39:11.000000Z","id":88}',
            ),
            367 => 
            array (
                'id' => '372',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:17',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.5.208.82","visitors_id":159,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:39:17.000000Z","created_at":"2023-04-25T04:39:17.000000Z","id":89}',
            ),
            368 => 
            array (
                'id' => '373',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:21',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"207.46.13.220","visitors_id":157,"city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T04:39:21.000000Z","created_at":"2023-04-25T04:39:21.000000Z","id":90}',
            ),
            369 => 
            array (
                'id' => '374',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:21',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.83","visitors_id":158,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:39:21.000000Z","created_at":"2023-04-25T04:39:21.000000Z","id":91}',
            ),
            370 => 
            array (
                'id' => '375',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:21',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.171.161.219","visitors_id":172,"city":"Jakarta","region":"Jakarta","country_code":"ID","country":"Indonesia","loc":"-6.2146,106.8451","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:39:21.000000Z","created_at":"2023-04-25T04:39:21.000000Z","id":92}',
            ),
            371 => 
            array (
                'id' => '376',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:22',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"52.167.144.117","visitors_id":156,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:39:22.000000Z","created_at":"2023-04-25T04:39:22.000000Z","id":93}',
            ),
            372 => 
            array (
                'id' => '377',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:22',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.78.136","visitors_id":170,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:39:22.000000Z","created_at":"2023-04-25T04:39:22.000000Z","id":94}',
            ),
            373 => 
            array (
                'id' => '378',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:23',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"54.198.55.229","visitors_id":169,"city":"Ashburn","region":"Virginia","country_code":"US","country":"United States of America","loc":"39.0437,-77.4875","timezone":"America\\/New_York","updated_at":"2023-04-25T04:39:23.000000Z","created_at":"2023-04-25T04:39:23.000000Z","id":95}',
            ),
            374 => 
            array (
                'id' => '379',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:24',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"101.128.98.153","visitors_id":168,"city":"Denpasar","region":"Bali","country_code":"ID","country":"Indonesia","loc":"-8.6500,115.2167","timezone":"Asia\\/Makassar","updated_at":"2023-04-25T04:39:24.000000Z","created_at":"2023-04-25T04:39:24.000000Z","id":96}',
            ),
            375 => 
            array (
                'id' => '380',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:26',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"101.128.98.153","visitors_id":167,"city":"Denpasar","region":"Bali","country_code":"ID","country":"Indonesia","loc":"-8.6500,115.2167","timezone":"Asia\\/Makassar","updated_at":"2023-04-25T04:39:26.000000Z","created_at":"2023-04-25T04:39:26.000000Z","id":97}',
            ),
            376 => 
            array (
                'id' => '381',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:28',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"101.128.98.153","visitors_id":166,"city":"Denpasar","region":"Bali","country_code":"ID","country":"Indonesia","loc":"-8.6500,115.2167","timezone":"Asia\\/Makassar","updated_at":"2023-04-25T04:39:27.000000Z","created_at":"2023-04-25T04:39:27.000000Z","id":98}',
            ),
            377 => 
            array (
                'id' => '382',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:28',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.114.204","visitors_id":165,"city":"Denpasar","region":"Bali","country_code":"ID","country":"Indonesia","loc":"-8.6500,115.2167","timezone":"Asia\\/Makassar","updated_at":"2023-04-25T04:39:28.000000Z","created_at":"2023-04-25T04:39:28.000000Z","id":99}',
            ),
            378 => 
            array (
                'id' => '383',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:39:28',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.77.96","visitors_id":164,"city":"Des Moines","region":"Iowa","country_code":"US","country":"United States of America","loc":"41.6005,-93.6091","timezone":"America\\/Chicago","updated_at":"2023-04-25T04:39:28.000000Z","created_at":"2023-04-25T04:39:28.000000Z","id":100}',
            ),
            379 => 
            array (
                'id' => '384',
                'user_id' => '1',
                'log_date' => '2023-04-25 11:59:38',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.124.131.102","visitors_id":1,"city":"Jakarta","region":"Jakarta","country_code":"ID","country":"Indonesia","loc":"-6.2146,106.8451","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T04:59:38.000000Z","created_at":"2023-04-25T04:59:38.000000Z","id":101}',
            ),
            380 => 
            array (
                'id' => '385',
                'user_id' => '1',
                'log_date' => '2023-04-25 12:00:17',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":260,"updated_at":"2023-04-25T05:00:17.000000Z","created_at":"2023-04-25T05:00:17.000000Z","id":102}',
            ),
            381 => 
            array (
                'id' => '386',
                'user_id' => '1',
                'log_date' => '2023-04-25 12:00:24',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":260,"updated_at":"2023-04-25T05:00:24.000000Z","created_at":"2023-04-25T05:00:24.000000Z","id":103}',
            ),
            382 => 
            array (
                'id' => '387',
                'user_id' => '1',
                'log_date' => '2023-04-25 12:00:29',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":260,"updated_at":"2023-04-25T05:00:29.000000Z","created_at":"2023-04-25T05:00:29.000000Z","id":104}',
            ),
            383 => 
            array (
                'id' => '388',
                'user_id' => '1',
                'log_date' => '2023-04-25 12:02:21',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":260,"updated_at":"2023-04-25T05:02:21.000000Z","created_at":"2023-04-25T05:02:21.000000Z","id":105}',
            ),
            384 => 
            array (
                'id' => '389',
                'user_id' => '1',
                'log_date' => '2023-04-25 12:02:21',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":260,"updated_at":"2023-04-25T05:02:21.000000Z","created_at":"2023-04-25T05:02:21.000000Z","id":106}',
            ),
            385 => 
            array (
                'id' => '390',
                'user_id' => '1',
                'log_date' => '2023-04-25 12:02:22',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":260,"updated_at":"2023-04-25T05:02:22.000000Z","created_at":"2023-04-25T05:02:22.000000Z","id":107}',
            ),
            386 => 
            array (
                'id' => '391',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:50',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.171","visitors_id":163,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:51:50.000000Z","created_at":"2023-04-25T06:51:50.000000Z","id":108}',
            ),
            387 => 
            array (
                'id' => '392',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:50',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"193.235.141.120","visitors_id":162,"city":"M\\u00e4rsta","region":"Stockholm","country_code":"SE","country":"Sweden","loc":"59.6216,17.8548","timezone":"Europe\\/Stockholm","updated_at":"2023-04-25T06:51:50.000000Z","created_at":"2023-04-25T06:51:50.000000Z","id":109}',
            ),
            388 => 
            array (
                'id' => '393',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:51',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.77.96","visitors_id":160,"city":"Des Moines","region":"Iowa","country_code":"US","country":"United States of America","loc":"41.6005,-93.6091","timezone":"America\\/Chicago","updated_at":"2023-04-25T06:51:51.000000Z","created_at":"2023-04-25T06:51:51.000000Z","id":110}',
            ),
            389 => 
            array (
                'id' => '394',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:51',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.77.121","visitors_id":161,"city":"Des Moines","region":"Iowa","country_code":"US","country":"United States of America","loc":"41.6005,-93.6091","timezone":"America\\/Chicago","updated_at":"2023-04-25T06:51:51.000000Z","created_at":"2023-04-25T06:51:51.000000Z","id":111}',
            ),
            390 => 
            array (
                'id' => '395',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:52',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"207.46.13.211","visitors_id":153,"city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:51:52.000000Z","created_at":"2023-04-25T06:51:52.000000Z","id":112}',
            ),
            391 => 
            array (
                'id' => '396',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:52',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"52.43.152.131","visitors_id":151,"city":"Boardman","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.8399,-119.7006","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:51:52.000000Z","created_at":"2023-04-25T06:51:52.000000Z","id":113}',
            ),
            392 => 
            array (
                'id' => '397',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:52',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"52.167.144.149","visitors_id":150,"city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-25T06:51:52.000000Z","created_at":"2023-04-25T06:51:52.000000Z","id":114}',
            ),
            393 => 
            array (
                'id' => '398',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:53',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":142,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:51:53.000000Z","created_at":"2023-04-25T06:51:53.000000Z","id":115}',
            ),
            394 => 
            array (
                'id' => '399',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:53',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"35.88.219.130","visitors_id":149,"city":"Boardman","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.8399,-119.7006","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:51:53.000000Z","created_at":"2023-04-25T06:51:53.000000Z","id":116}',
            ),
            395 => 
            array (
                'id' => '400',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:54',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"54.212.102.221","visitors_id":148,"city":"Boardman","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.8399,-119.7006","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:51:54.000000Z","created_at":"2023-04-25T06:51:54.000000Z","id":117}',
            ),
            396 => 
            array (
                'id' => '401',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:54',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"207.46.13.211","visitors_id":147,"city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:51:54.000000Z","created_at":"2023-04-25T06:51:54.000000Z","id":118}',
            ),
            397 => 
            array (
                'id' => '402',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:55',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.173","visitors_id":146,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:51:55.000000Z","created_at":"2023-04-25T06:51:55.000000Z","id":119}',
            ),
            398 => 
            array (
                'id' => '403',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:55',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"52.41.64.109","visitors_id":145,"city":"Boardman","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.8399,-119.7006","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:51:55.000000Z","created_at":"2023-04-25T06:51:55.000000Z","id":120}',
            ),
            399 => 
            array (
                'id' => '404',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:56',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"35.166.8.7","visitors_id":144,"city":"Boardman","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.8399,-119.7006","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:51:56.000000Z","created_at":"2023-04-25T06:51:56.000000Z","id":121}',
            ),
            400 => 
            array (
                'id' => '405',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:56',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.171","visitors_id":143,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:51:56.000000Z","created_at":"2023-04-25T06:51:56.000000Z","id":122}',
            ),
            401 => 
            array (
                'id' => '406',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:57',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.22.82","visitors_id":141,"city":"Medan","region":"North Sumatra","country_code":"ID","country":"Indonesia","loc":"3.5833,98.6667","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:51:57.000000Z","created_at":"2023-04-25T06:51:57.000000Z","id":123}',
            ),
            402 => 
            array (
                'id' => '407',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:57',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.70.192","visitors_id":139,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:51:57.000000Z","created_at":"2023-04-25T06:51:57.000000Z","id":124}',
            ),
            403 => 
            array (
                'id' => '408',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:58',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.77.96","visitors_id":140,"city":"Des Moines","region":"Iowa","country_code":"US","country":"United States of America","loc":"41.6005,-93.6091","timezone":"America\\/Chicago","updated_at":"2023-04-25T06:51:58.000000Z","created_at":"2023-04-25T06:51:58.000000Z","id":125}',
            ),
            404 => 
            array (
                'id' => '409',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:59',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.70.192","visitors_id":138,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:51:59.000000Z","created_at":"2023-04-25T06:51:59.000000Z","id":126}',
            ),
            405 => 
            array (
                'id' => '410',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:59',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.74.168","visitors_id":137,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:51:59.000000Z","created_at":"2023-04-25T06:51:59.000000Z","id":127}',
            ),
            406 => 
            array (
                'id' => '411',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:51:59',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":136,"updated_at":"2023-04-25T06:51:59.000000Z","created_at":"2023-04-25T06:51:59.000000Z","id":128}',
            ),
            407 => 
            array (
                'id' => '412',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:00',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":135,"updated_at":"2023-04-25T06:52:00.000000Z","created_at":"2023-04-25T06:52:00.000000Z","id":129}',
            ),
            408 => 
            array (
                'id' => '413',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:00',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":134,"updated_at":"2023-04-25T06:52:00.000000Z","created_at":"2023-04-25T06:52:00.000000Z","id":130}',
            ),
            409 => 
            array (
                'id' => '414',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:01',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":133,"updated_at":"2023-04-25T06:52:01.000000Z","created_at":"2023-04-25T06:52:01.000000Z","id":131}',
            ),
            410 => 
            array (
                'id' => '415',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:01',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":129,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:52:01.000000Z","created_at":"2023-04-25T06:52:01.000000Z","id":132}',
            ),
            411 => 
            array (
                'id' => '416',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:02',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.111.107","visitors_id":132,"city":"Denpasar","region":"Bali","country_code":"ID","country":"Indonesia","loc":"-8.6500,115.2167","timezone":"Asia\\/Makassar","updated_at":"2023-04-25T06:52:02.000000Z","created_at":"2023-04-25T06:52:02.000000Z","id":133}',
            ),
            412 => 
            array (
                'id' => '417',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:02',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"134.209.103.110","visitors_id":131,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.3215,103.6957","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:52:02.000000Z","created_at":"2023-04-25T06:52:02.000000Z","id":134}',
            ),
            413 => 
            array (
                'id' => '418',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:03',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.111.103","visitors_id":130,"city":"Denpasar","region":"Bali","country_code":"ID","country":"Indonesia","loc":"-8.6500,115.2167","timezone":"Asia\\/Makassar","updated_at":"2023-04-25T06:52:03.000000Z","created_at":"2023-04-25T06:52:03.000000Z","id":135}',
            ),
            414 => 
            array (
                'id' => '419',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:03',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":124,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:52:03.000000Z","created_at":"2023-04-25T06:52:03.000000Z","id":136}',
            ),
            415 => 
            array (
                'id' => '420',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:03',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.147.8.161","visitors_id":128,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:03.000000Z","created_at":"2023-04-25T06:52:03.000000Z","id":137}',
            ),
            416 => 
            array (
                'id' => '421',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:04',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"51.120.79.218","visitors_id":127,"city":"Oslo","region":"Oslo","country_code":"NO","country":"Norway","loc":"59.8457,10.7823","timezone":"Europe\\/Oslo","updated_at":"2023-04-25T06:52:04.000000Z","created_at":"2023-04-25T06:52:04.000000Z","id":138}',
            ),
            417 => 
            array (
                'id' => '422',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:04',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.147.9.27","visitors_id":125,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:04.000000Z","created_at":"2023-04-25T06:52:04.000000Z","id":139}',
            ),
            418 => 
            array (
                'id' => '423',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:05',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.147.9.27","visitors_id":126,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:05.000000Z","created_at":"2023-04-25T06:52:05.000000Z","id":140}',
            ),
            419 => 
            array (
                'id' => '424',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:05',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.147.8.161","visitors_id":103,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:05.000000Z","created_at":"2023-04-25T06:52:05.000000Z","id":141}',
            ),
            420 => 
            array (
                'id' => '425',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:06',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":102,"updated_at":"2023-04-25T06:52:06.000000Z","created_at":"2023-04-25T06:52:06.000000Z","id":142}',
            ),
            421 => 
            array (
                'id' => '426',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:06',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":123,"updated_at":"2023-04-25T06:52:06.000000Z","created_at":"2023-04-25T06:52:06.000000Z","id":143}',
            ),
            422 => 
            array (
                'id' => '427',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:07',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"205.169.39.115","visitors_id":122,"city":"Bartlesville","region":"Oklahoma","country_code":"US","country":"United States of America","loc":"36.7473,-95.9808","timezone":"America\\/Chicago","updated_at":"2023-04-25T06:52:07.000000Z","created_at":"2023-04-25T06:52:07.000000Z","id":144}',
            ),
            423 => 
            array (
                'id' => '428',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:07',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"205.169.39.115","visitors_id":121,"city":"Bartlesville","region":"Oklahoma","country_code":"US","country":"United States of America","loc":"36.7473,-95.9808","timezone":"America\\/Chicago","updated_at":"2023-04-25T06:52:07.000000Z","created_at":"2023-04-25T06:52:07.000000Z","id":145}',
            ),
            424 => 
            array (
                'id' => '429',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:08',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"47.242.105.176","visitors_id":120,"city":"Hong Kong","region":"Central and Western","country_code":"HK","country":"Hong Kong","loc":"22.2783,114.1747","timezone":"Asia\\/Hong_Kong","updated_at":"2023-04-25T06:52:08.000000Z","created_at":"2023-04-25T06:52:08.000000Z","id":146}',
            ),
            425 => 
            array (
                'id' => '430',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:08',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"95.216.188.234","visitors_id":119,"city":"Helsinki","region":"Uusimaa","country_code":"FI","country":"Finland","loc":"60.1695,24.9354","timezone":"Europe\\/Helsinki","updated_at":"2023-04-25T06:52:08.000000Z","created_at":"2023-04-25T06:52:08.000000Z","id":147}',
            ),
            426 => 
            array (
                'id' => '431',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:09',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"65.109.163.80","visitors_id":118,"city":"Vaala","region":"Kainuu","country_code":"FI","country":"Finland","loc":"64.5739,26.7669","timezone":"Europe\\/Helsinki","updated_at":"2023-04-25T06:52:09.000000Z","created_at":"2023-04-25T06:52:09.000000Z","id":148}',
            ),
            427 => 
            array (
                'id' => '432',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:09',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"34.254.53.125","visitors_id":117,"city":"Dublin","region":"Leinster","country_code":"IE","country":"Ireland","loc":"53.3331,-6.2489","timezone":"Europe\\/Dublin","updated_at":"2023-04-25T06:52:09.000000Z","created_at":"2023-04-25T06:52:09.000000Z","id":149}',
            ),
            428 => 
            array (
                'id' => '433',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:10',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"34.254.53.125","visitors_id":116,"city":"Dublin","region":"Leinster","country_code":"IE","country":"Ireland","loc":"53.3331,-6.2489","timezone":"Europe\\/Dublin","updated_at":"2023-04-25T06:52:10.000000Z","created_at":"2023-04-25T06:52:10.000000Z","id":150}',
            ),
            429 => 
            array (
                'id' => '434',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:10',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"34.254.53.125","visitors_id":115,"city":"Dublin","region":"Leinster","country_code":"IE","country":"Ireland","loc":"53.3331,-6.2489","timezone":"Europe\\/Dublin","updated_at":"2023-04-25T06:52:10.000000Z","created_at":"2023-04-25T06:52:10.000000Z","id":151}',
            ),
            430 => 
            array (
                'id' => '435',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:11',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"205.169.39.67","visitors_id":114,"city":"Bartlesville","region":"Oklahoma","country_code":"US","country":"United States of America","loc":"36.7473,-95.9808","timezone":"America\\/Chicago","updated_at":"2023-04-25T06:52:11.000000Z","created_at":"2023-04-25T06:52:11.000000Z","id":152}',
            ),
            431 => 
            array (
                'id' => '436',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:11',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"205.169.39.67","visitors_id":113,"city":"Bartlesville","region":"Oklahoma","country_code":"US","country":"United States of America","loc":"36.7473,-95.9808","timezone":"America\\/Chicago","updated_at":"2023-04-25T06:52:11.000000Z","created_at":"2023-04-25T06:52:11.000000Z","id":153}',
            ),
            432 => 
            array (
                'id' => '437',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:11',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"65.154.226.170","visitors_id":112,"city":"Irving","region":"Texas","country_code":"US","country":"United States of America","loc":"32.8140,-96.9489","timezone":"America\\/Chicago","updated_at":"2023-04-25T06:52:11.000000Z","created_at":"2023-04-25T06:52:11.000000Z","id":154}',
            ),
            433 => 
            array (
                'id' => '438',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:12',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"133.242.174.119","visitors_id":111,"city":"Tokyo","region":"Tokyo","country_code":"JP","country":"Japan","loc":"35.6910,139.7679","timezone":"Asia\\/Tokyo","updated_at":"2023-04-25T06:52:12.000000Z","created_at":"2023-04-25T06:52:12.000000Z","id":155}',
            ),
            434 => 
            array (
                'id' => '439',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:12',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.147.8.161","visitors_id":110,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:12.000000Z","created_at":"2023-04-25T06:52:12.000000Z","id":156}',
            ),
            435 => 
            array (
                'id' => '440',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:12',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.147.8.161","visitors_id":109,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:12.000000Z","created_at":"2023-04-25T06:52:12.000000Z","id":157}',
            ),
            436 => 
            array (
                'id' => '441',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:13',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"34.168.208.65","visitors_id":107,"city":"The Dalles","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.5946,-121.1787","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:52:13.000000Z","created_at":"2023-04-25T06:52:13.000000Z","id":158}',
            ),
            437 => 
            array (
                'id' => '442',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:13',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"34.168.208.65","visitors_id":108,"city":"The Dalles","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.5946,-121.1787","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:52:13.000000Z","created_at":"2023-04-25T06:52:13.000000Z","id":159}',
            ),
            438 => 
            array (
                'id' => '443',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:13',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"139.162.7.175","visitors_id":104,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2935,103.8603","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:52:13.000000Z","created_at":"2023-04-25T06:52:13.000000Z","id":160}',
            ),
            439 => 
            array (
                'id' => '444',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:14',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"39.110.218.101","visitors_id":106,"city":"Tokyo","region":"Tokyo","country_code":"JP","country":"Japan","loc":"35.6940,139.7536","timezone":"Asia\\/Tokyo","updated_at":"2023-04-25T06:52:14.000000Z","created_at":"2023-04-25T06:52:14.000000Z","id":161}',
            ),
            440 => 
            array (
                'id' => '445',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:14',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"157.230.185.127","visitors_id":105,"city":"North Bergen","region":"New Jersey","country_code":"US","country":"United States of America","loc":"40.8043,-74.0121","timezone":"America\\/New_York","updated_at":"2023-04-25T06:52:14.000000Z","created_at":"2023-04-25T06:52:14.000000Z","id":162}',
            ),
            441 => 
            array (
                'id' => '446',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:15',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":101,"updated_at":"2023-04-25T06:52:15.000000Z","created_at":"2023-04-25T06:52:15.000000Z","id":163}',
            ),
            442 => 
            array (
                'id' => '447',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:15',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":100,"updated_at":"2023-04-25T06:52:15.000000Z","created_at":"2023-04-25T06:52:15.000000Z","id":164}',
            ),
            443 => 
            array (
                'id' => '448',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:15',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":98,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:52:15.000000Z","created_at":"2023-04-25T06:52:15.000000Z","id":165}',
            ),
            444 => 
            array (
                'id' => '449',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:16',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.147.8.97","visitors_id":99,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:16.000000Z","created_at":"2023-04-25T06:52:16.000000Z","id":166}',
            ),
            445 => 
            array (
                'id' => '450',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:17',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":95,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:52:17.000000Z","created_at":"2023-04-25T06:52:17.000000Z","id":167}',
            ),
            446 => 
            array (
                'id' => '451',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:17',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.195","visitors_id":97,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:52:17.000000Z","created_at":"2023-04-25T06:52:17.000000Z","id":168}',
            ),
            447 => 
            array (
                'id' => '452',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:17',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.79.73","visitors_id":96,"city":"Salem","region":"Oregon","country_code":"US","country":"United States of America","loc":"44.9429,-123.0351","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:52:17.000000Z","created_at":"2023-04-25T06:52:17.000000Z","id":169}',
            ),
            448 => 
            array (
                'id' => '453',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:18',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":92,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:52:18.000000Z","created_at":"2023-04-25T06:52:18.000000Z","id":170}',
            ),
            449 => 
            array (
                'id' => '454',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:18',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.70.191","visitors_id":94,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:18.000000Z","created_at":"2023-04-25T06:52:18.000000Z","id":171}',
            ),
            450 => 
            array (
                'id' => '455',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:19',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.198","visitors_id":93,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:52:19.000000Z","created_at":"2023-04-25T06:52:19.000000Z","id":172}',
            ),
            451 => 
            array (
                'id' => '456',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:20',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.79.70","visitors_id":91,"city":"Salem","region":"Oregon","country_code":"US","country":"United States of America","loc":"44.9429,-123.0351","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:52:20.000000Z","created_at":"2023-04-25T06:52:20.000000Z","id":173}',
            ),
            452 => 
            array (
                'id' => '457',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:20',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":90,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:52:20.000000Z","created_at":"2023-04-25T06:52:20.000000Z","id":174}',
            ),
            453 => 
            array (
                'id' => '458',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:20',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":88,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:52:20.000000Z","created_at":"2023-04-25T06:52:20.000000Z","id":175}',
            ),
            454 => 
            array (
                'id' => '459',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:21',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.106.6","visitors_id":89,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:21.000000Z","created_at":"2023-04-25T06:52:21.000000Z","id":176}',
            ),
            455 => 
            array (
                'id' => '460',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:21',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":85,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:52:21.000000Z","created_at":"2023-04-25T06:52:21.000000Z","id":177}',
            ),
            456 => 
            array (
                'id' => '461',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:22',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.195","visitors_id":87,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:52:22.000000Z","created_at":"2023-04-25T06:52:22.000000Z","id":178}',
            ),
            457 => 
            array (
                'id' => '462',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:22',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.192","visitors_id":86,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:52:22.000000Z","created_at":"2023-04-25T06:52:22.000000Z","id":179}',
            ),
            458 => 
            array (
                'id' => '463',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:23',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":84,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:52:23.000000Z","created_at":"2023-04-25T06:52:23.000000Z","id":180}',
            ),
            459 => 
            array (
                'id' => '464',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:23',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":79,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:52:23.000000Z","created_at":"2023-04-25T06:52:23.000000Z","id":181}',
            ),
            460 => 
            array (
                'id' => '465',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:23',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.198","visitors_id":83,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:52:23.000000Z","created_at":"2023-04-25T06:52:23.000000Z","id":182}',
            ),
            461 => 
            array (
                'id' => '466',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:24',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"45.90.63.167","visitors_id":82,"city":"Pos\\u00eblok Mar\\u2019ino","region":"Moscow Oblast","country_code":"RU","country":"Russian Federation","loc":"55.5500,37.3200","timezone":"Europe\\/Moscow","updated_at":"2023-04-25T06:52:24.000000Z","created_at":"2023-04-25T06:52:24.000000Z","id":183}',
            ),
            462 => 
            array (
                'id' => '467',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:24',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"176.53.220.156","visitors_id":81,"city":"Pos\\u00eblok Mar\\u2019ino","region":"Moscow Oblast","country_code":"RU","country":"Russian Federation","loc":"55.5500,37.3200","timezone":"Europe\\/Moscow","updated_at":"2023-04-25T06:52:24.000000Z","created_at":"2023-04-25T06:52:24.000000Z","id":184}',
            ),
            463 => 
            array (
                'id' => '468',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:25',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.192","visitors_id":80,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:52:25.000000Z","created_at":"2023-04-25T06:52:25.000000Z","id":185}',
            ),
            464 => 
            array (
                'id' => '469',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:25',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":77,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:52:25.000000Z","created_at":"2023-04-25T06:52:25.000000Z","id":186}',
            ),
            465 => 
            array (
                'id' => '470',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:26',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"183.129.153.157","visitors_id":78,"city":"Hangzhou","region":"Zhejiang","country_code":"CN","country":"China","loc":"30.2936,120.1614","timezone":"Asia\\/Shanghai","updated_at":"2023-04-25T06:52:26.000000Z","created_at":"2023-04-25T06:52:26.000000Z","id":187}',
            ),
            466 => 
            array (
                'id' => '471',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:26',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":49,"city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2847,103.8527","timezone":"Asia\\/Singapore","updated_at":"2023-04-25T06:52:26.000000Z","created_at":"2023-04-25T06:52:26.000000Z","id":188}',
            ),
            467 => 
            array (
                'id' => '472',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:26',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.147.8.97","visitors_id":69,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:26.000000Z","created_at":"2023-04-25T06:52:26.000000Z","id":189}',
            ),
            468 => 
            array (
                'id' => '473',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:27',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"176.53.217.213","visitors_id":76,"city":"Pos\\u00eblok Mar\\u2019ino","region":"Moscow Oblast","country_code":"RU","country":"Russian Federation","loc":"55.5500,37.3200","timezone":"Europe\\/Moscow","updated_at":"2023-04-25T06:52:27.000000Z","created_at":"2023-04-25T06:52:27.000000Z","id":190}',
            ),
            469 => 
            array (
                'id' => '474',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:27',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"45.90.62.183","visitors_id":75,"city":"Pos\\u00eblok Mar\\u2019ino","region":"Moscow Oblast","country_code":"RU","country":"Russian Federation","loc":"55.5500,37.3200","timezone":"Europe\\/Moscow","updated_at":"2023-04-25T06:52:27.000000Z","created_at":"2023-04-25T06:52:27.000000Z","id":191}',
            ),
            470 => 
            array (
                'id' => '475',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:28',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.73.36","visitors_id":71,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:28.000000Z","created_at":"2023-04-25T06:52:28.000000Z","id":192}',
            ),
            471 => 
            array (
                'id' => '476',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:28',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.71.32","visitors_id":70,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:28.000000Z","created_at":"2023-04-25T06:52:28.000000Z","id":193}',
            ),
            472 => 
            array (
                'id' => '477',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:29',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"45.55.112.20","visitors_id":74,"city":"San Francisco","region":"California","country_code":"US","country":"United States of America","loc":"37.7309,-122.3886","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:52:29.000000Z","created_at":"2023-04-25T06:52:29.000000Z","id":194}',
            ),
            473 => 
            array (
                'id' => '478',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:29',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.5.217.132","visitors_id":73,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:29.000000Z","created_at":"2023-04-25T06:52:29.000000Z","id":195}',
            ),
            474 => 
            array (
                'id' => '479',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:30',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.73.36","visitors_id":67,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:30.000000Z","created_at":"2023-04-25T06:52:30.000000Z","id":196}',
            ),
            475 => 
            array (
                'id' => '480',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:30',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.71.32","visitors_id":72,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:30.000000Z","created_at":"2023-04-25T06:52:30.000000Z","id":197}',
            ),
            476 => 
            array (
                'id' => '481',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:31',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.70.28","visitors_id":68,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:31.000000Z","created_at":"2023-04-25T06:52:31.000000Z","id":198}',
            ),
            477 => 
            array (
                'id' => '482',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:31',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.70.80","visitors_id":65,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:31.000000Z","created_at":"2023-04-25T06:52:31.000000Z","id":199}',
            ),
            478 => 
            array (
                'id' => '483',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:32',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"205.169.39.25","visitors_id":66,"city":"Bartlesville","region":"Oklahoma","country_code":"US","country":"United States of America","loc":"36.7473,-95.9808","timezone":"America\\/Chicago","updated_at":"2023-04-25T06:52:32.000000Z","created_at":"2023-04-25T06:52:32.000000Z","id":200}',
            ),
            479 => 
            array (
                'id' => '484',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:33',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.106.246","visitors_id":64,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:33.000000Z","created_at":"2023-04-25T06:52:33.000000Z","id":201}',
            ),
            480 => 
            array (
                'id' => '485',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:33',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.100.106","visitors_id":63,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:33.000000Z","created_at":"2023-04-25T06:52:33.000000Z","id":202}',
            ),
            481 => 
            array (
                'id' => '486',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:34',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.106.246","visitors_id":62,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:52:34.000000Z","created_at":"2023-04-25T06:52:34.000000Z","id":203}',
            ),
            482 => 
            array (
                'id' => '487',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:34',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.192","visitors_id":60,"city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T06:52:34.000000Z","created_at":"2023-04-25T06:52:34.000000Z","id":204}',
            ),
            483 => 
            array (
                'id' => '488',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:35',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.64.198","visitors_id":61,"city":"Columbia","region":"South Carolina","country_code":"US","country":"United States of America","loc":"34.0007,-81.0348","timezone":"America\\/New_York","updated_at":"2023-04-25T06:52:34.000000Z","created_at":"2023-04-25T06:52:34.000000Z","id":205}',
            ),
            484 => 
            array (
                'id' => '489',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:35',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.64.195","visitors_id":59,"city":"Columbia","region":"South Carolina","country_code":"US","country":"United States of America","loc":"34.0007,-81.0348","timezone":"America\\/New_York","updated_at":"2023-04-25T06:52:35.000000Z","created_at":"2023-04-25T06:52:35.000000Z","id":206}',
            ),
            485 => 
            array (
                'id' => '490',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:52:36',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.89.193","visitors_id":58,"city":"Columbia","region":"South Carolina","country_code":"US","country":"United States of America","loc":"34.0007,-81.0348","timezone":"America\\/New_York","updated_at":"2023-04-25T06:52:36.000000Z","created_at":"2023-04-25T06:52:36.000000Z","id":207}',
            ),
            486 => 
            array (
                'id' => '491',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:12',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.89.196","visitors_id":57,"city":"Columbia","region":"South Carolina","country_code":"US","country":"United States of America","loc":"34.0007,-81.0348","timezone":"America\\/New_York","updated_at":"2023-04-25T06:53:12.000000Z","created_at":"2023-04-25T06:53:12.000000Z","id":208}',
            ),
            487 => 
            array (
                'id' => '492',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:12',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"109.75.212.102","visitors_id":55,"city":"Frankfurt am Main","region":"Hesse","country_code":"DE","country":"Germany","loc":"50.1155,8.6842","timezone":"Europe\\/Berlin","updated_at":"2023-04-25T06:53:12.000000Z","created_at":"2023-04-25T06:53:12.000000Z","id":209}',
            ),
            488 => 
            array (
                'id' => '493',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:13',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"175.101.69.68","visitors_id":56,"city":"Chennai","region":"Tamil Nadu","country_code":"IN","country":"India","loc":"13.0878,80.2785","timezone":"Asia\\/Kolkata","updated_at":"2023-04-25T06:53:13.000000Z","created_at":"2023-04-25T06:53:13.000000Z","id":210}',
            ),
            489 => 
            array (
                'id' => '494',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:13',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"64.233.172.221","visitors_id":54,"city":"Des Moines","region":"Iowa","country_code":"US","country":"United States of America","loc":"41.6005,-93.6091","timezone":"America\\/Chicago","updated_at":"2023-04-25T06:53:13.000000Z","created_at":"2023-04-25T06:53:13.000000Z","id":211}',
            ),
            490 => 
            array (
                'id' => '495',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:13',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.106.250","visitors_id":47,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:53:13.000000Z","created_at":"2023-04-25T06:53:13.000000Z","id":212}',
            ),
            491 => 
            array (
                'id' => '496',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:14',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.100.106","visitors_id":53,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:53:14.000000Z","created_at":"2023-04-25T06:53:14.000000Z","id":213}',
            ),
            492 => 
            array (
                'id' => '497',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:14',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"34.195.25.237","visitors_id":52,"city":"Ashburn","region":"Virginia","country_code":"US","country":"United States of America","loc":"39.0437,-77.4875","timezone":"America\\/New_York","updated_at":"2023-04-25T06:53:14.000000Z","created_at":"2023-04-25T06:53:14.000000Z","id":214}',
            ),
            493 => 
            array (
                'id' => '498',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:14',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.106.226","visitors_id":51,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:53:14.000000Z","created_at":"2023-04-25T06:53:14.000000Z","id":215}',
            ),
            494 => 
            array (
                'id' => '499',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:15',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.106.226","visitors_id":50,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:53:15.000000Z","created_at":"2023-04-25T06:53:15.000000Z","id":216}',
            ),
            495 => 
            array (
                'id' => '500',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:15',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.106.250","visitors_id":48,"city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T06:53:15.000000Z","created_at":"2023-04-25T06:53:15.000000Z","id":217}',
            ),
            496 => 
            array (
                'id' => '501',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:19',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":46,"updated_at":"2023-04-25T06:53:19.000000Z","created_at":"2023-04-25T06:53:19.000000Z","id":218}',
            ),
            497 => 
            array (
                'id' => '502',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:29',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":45,"updated_at":"2023-04-25T06:53:29.000000Z","created_at":"2023-04-25T06:53:29.000000Z","id":219}',
            ),
            498 => 
            array (
                'id' => '503',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:29',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":42,"updated_at":"2023-04-25T06:53:29.000000Z","created_at":"2023-04-25T06:53:29.000000Z","id":220}',
            ),
            499 => 
            array (
                'id' => '504',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:35',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":44,"updated_at":"2023-04-25T06:53:35.000000Z","created_at":"2023-04-25T06:53:35.000000Z","id":221}',
            ),
        ));
        \DB::table('logs')->insert(array (
            0 => 
            array (
                'id' => '505',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:35',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"192.168.190.26","visitors_id":43,"updated_at":"2023-04-25T06:53:35.000000Z","created_at":"2023-04-25T06:53:35.000000Z","id":222}',
            ),
            1 => 
            array (
                'id' => '506',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:35',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":41,"updated_at":"2023-04-25T06:53:35.000000Z","created_at":"2023-04-25T06:53:35.000000Z","id":223}',
            ),
            2 => 
            array (
                'id' => '507',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:36',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":40,"updated_at":"2023-04-25T06:53:36.000000Z","created_at":"2023-04-25T06:53:36.000000Z","id":224}',
            ),
            3 => 
            array (
                'id' => '508',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:36',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":38,"updated_at":"2023-04-25T06:53:36.000000Z","created_at":"2023-04-25T06:53:36.000000Z","id":225}',
            ),
            4 => 
            array (
                'id' => '509',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:37',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":39,"updated_at":"2023-04-25T06:53:37.000000Z","created_at":"2023-04-25T06:53:37.000000Z","id":226}',
            ),
            5 => 
            array (
                'id' => '510',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:37',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":37,"updated_at":"2023-04-25T06:53:37.000000Z","created_at":"2023-04-25T06:53:37.000000Z","id":227}',
            ),
            6 => 
            array (
                'id' => '511',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:37',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":35,"updated_at":"2023-04-25T06:53:37.000000Z","created_at":"2023-04-25T06:53:37.000000Z","id":228}',
            ),
            7 => 
            array (
                'id' => '512',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:38',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":36,"updated_at":"2023-04-25T06:53:38.000000Z","created_at":"2023-04-25T06:53:38.000000Z","id":229}',
            ),
            8 => 
            array (
                'id' => '513',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:38',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":34,"updated_at":"2023-04-25T06:53:38.000000Z","created_at":"2023-04-25T06:53:38.000000Z","id":230}',
            ),
            9 => 
            array (
                'id' => '514',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:38',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":14,"updated_at":"2023-04-25T06:53:38.000000Z","created_at":"2023-04-25T06:53:38.000000Z","id":231}',
            ),
            10 => 
            array (
                'id' => '515',
                'user_id' => '1',
                'log_date' => '2023-04-25 13:53:39',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"127.0.0.1","visitors_id":15,"updated_at":"2023-04-25T06:53:39.000000Z","created_at":"2023-04-25T06:53:39.000000Z","id":232}',
            ),
            11 => 
            array (
                'id' => '516',
                'user_id' => '1',
                'log_date' => '2023-04-25 14:32:46',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.68.243","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.58"}',
            ),
            12 => 
            array (
                'id' => '517',
                'user_id' => '1',
                'log_date' => '2023-04-25 19:13:51',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.76.239","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/103.0.0.0 Mobile Safari\\/537.36"}',
            ),
            13 => 
            array (
                'id' => '518',
                'user_id' => '1',
                'log_date' => '2023-04-25 19:14:51',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"157.55.39.209","visitors_id":"265","city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T12:14:51.000000Z","created_at":"2023-04-25T12:14:51.000000Z","id":4}',
            ),
            14 => 
            array (
                'id' => '519',
                'user_id' => '1',
                'log_date' => '2023-04-25 19:14:51',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"157.55.39.213","visitors_id":"263","city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-25T12:14:51.000000Z","created_at":"2023-04-25T12:14:51.000000Z","id":5}',
            ),
            15 => 
            array (
                'id' => '520',
                'user_id' => '1',
                'log_date' => '2023-04-25 19:14:51',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.68.243","visitors_id":"261","city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T12:14:51.000000Z","created_at":"2023-04-25T12:14:51.000000Z","id":6}',
            ),
            16 => 
            array (
                'id' => '521',
                'user_id' => '1',
                'log_date' => '2023-04-25 22:17:24',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.77.183","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.58"}',
            ),
            17 => 
            array (
                'id' => '522',
                'user_id' => '1',
                'log_date' => '2023-04-25 22:17:25',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.77.183","visitors_id":"269","city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-25T15:17:25.000000Z","created_at":"2023-04-25T15:17:25.000000Z","id":8}',
            ),
            18 => 
            array (
                'id' => '523',
                'user_id' => '1',
                'log_date' => '2023-04-25 22:17:30',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"1","name":"Isep Lutpi Nur","email":"iseplutpinur7@gmail.com","foto":"iseplutpinur20230420144240.png","username":"iseplutpinur","email_verified_at":null,"password":"$2y$10$OlqEyVYw3cMTKRbuQLjPaePcKi1nrmiQVt7T7jIVyE7kJIoaf\\/eUm","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"YEJExGZidL9W3W5JgbK4Ua9L5oHNioOEedjTAWyALGuo6KObW3WUwp2j0LOz","created_at":null,"updated_at":"2023-04-23 17:05:22"}',
            ),
            19 => 
            array (
                'id' => '524',
                'user_id' => '1',
                'log_date' => '2023-04-25 22:17:45',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.77.183","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.58"}',
            ),
            20 => 
            array (
                'id' => '525',
                'user_id' => '57',
                'log_date' => '2023-04-26 06:04:41',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.215.231","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX2180) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/108.0.0.0 Mobile Safari\\/537.36"}',
            ),
            21 => 
            array (
                'id' => '526',
                'user_id' => '57',
                'log_date' => '2023-04-26 09:11:54',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.215.231","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX2180) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/108.0.0.0 Mobile Safari\\/537.36"}',
            ),
            22 => 
            array (
                'id' => '527',
                'user_id' => '57',
                'log_date' => '2023-04-26 09:11:54',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.215.231","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX2180) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/108.0.0.0 Mobile Safari\\/537.36"}',
            ),
            23 => 
            array (
                'id' => '528',
                'user_id' => '57',
                'log_date' => '2023-04-26 09:11:58',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.215.231","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX2180) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/108.0.0.0 Mobile Safari\\/537.36"}',
            ),
            24 => 
            array (
                'id' => '529',
                'user_id' => '57',
                'log_date' => '2023-04-26 11:23:19',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.215.231","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX2180) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/108.0.0.0 Mobile Safari\\/537.36"}',
            ),
            25 => 
            array (
                'id' => '530',
                'user_id' => '57',
                'log_date' => '2023-04-26 11:23:19',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.215.231","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX2180) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/108.0.0.0 Mobile Safari\\/537.36"}',
            ),
            26 => 
            array (
                'id' => '531',
                'user_id' => '57',
                'log_date' => '2023-04-26 11:23:21',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.215.231","user_agent":"Mozilla\\/5.0 (Linux; Android 11; RMX2180) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/108.0.0.0 Mobile Safari\\/537.36"}',
            ),
            27 => 
            array (
                'id' => '532',
                'user_id' => '1',
                'log_date' => '2023-04-26 14:18:48',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.77.91","user_agent":"Mozilla\\/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/103.0.0.0 Mobile Safari\\/537.36"}',
            ),
            28 => 
            array (
                'id' => '533',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:21',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.71.125","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.58"}',
            ),
            29 => 
            array (
                'id' => '534',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:54',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"172.255.48.147","visitors_id":"317","city":"Vancouver","region":"British Columbia","country_code":"CA","country":"Canada","loc":"49.2497,-123.1193","timezone":"America\\/Vancouver","updated_at":"2023-04-28T14:25:54.000000Z","created_at":"2023-04-28T14:25:54.000000Z","id":34}',
            ),
            30 => 
            array (
                'id' => '535',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:54',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.89","visitors_id":"313","city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-28T14:25:54.000000Z","created_at":"2023-04-28T14:25:54.000000Z","id":35}',
            ),
            31 => 
            array (
                'id' => '536',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:54',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":"307","city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2839,103.8500","timezone":"Asia\\/Singapore","updated_at":"2023-04-28T14:25:54.000000Z","created_at":"2023-04-28T14:25:54.000000Z","id":36}',
            ),
            32 => 
            array (
                'id' => '537',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:55',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.153","visitors_id":"309","city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-28T14:25:55.000000Z","created_at":"2023-04-28T14:25:55.000000Z","id":37}',
            ),
            33 => 
            array (
                'id' => '538',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:55',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.173","visitors_id":"312","city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-28T14:25:55.000000Z","created_at":"2023-04-28T14:25:55.000000Z","id":38}',
            ),
            34 => 
            array (
                'id' => '539',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:55',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"66.249.71.169","visitors_id":"311","city":"Mountain View","region":"California","country_code":"US","country":"United States of America","loc":"37.4056,-122.0775","timezone":"America\\/Los_Angeles","updated_at":"2023-04-28T14:25:55.000000Z","created_at":"2023-04-28T14:25:55.000000Z","id":39}',
            ),
            35 => 
            array (
                'id' => '540',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:56',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":"290","city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2839,103.8500","timezone":"Asia\\/Singapore","updated_at":"2023-04-28T14:25:56.000000Z","created_at":"2023-04-28T14:25:56.000000Z","id":40}',
            ),
            36 => 
            array (
                'id' => '541',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:56',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.129","visitors_id":"292","city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-28T14:25:56.000000Z","created_at":"2023-04-28T14:25:56.000000Z","id":41}',
            ),
            37 => 
            array (
                'id' => '542',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:56',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"157.55.39.213","visitors_id":"293","city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-28T14:25:56.000000Z","created_at":"2023-04-28T14:25:56.000000Z","id":42}',
            ),
            38 => 
            array (
                'id' => '543',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:57',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.82.245","visitors_id":"303","city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-28T14:25:57.000000Z","created_at":"2023-04-28T14:25:57.000000Z","id":43}',
            ),
            39 => 
            array (
                'id' => '544',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:57',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"34.222.8.178","visitors_id":"295","city":"Boardman","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.8399,-119.7006","timezone":"America\\/Los_Angeles","updated_at":"2023-04-28T14:25:57.000000Z","created_at":"2023-04-28T14:25:57.000000Z","id":44}',
            ),
            40 => 
            array (
                'id' => '545',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:57',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"35.89.126.156","visitors_id":"291","city":"Boardman","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.8399,-119.7006","timezone":"America\\/Los_Angeles","updated_at":"2023-04-28T14:25:57.000000Z","created_at":"2023-04-28T14:25:57.000000Z","id":45}',
            ),
            41 => 
            array (
                'id' => '546',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:58',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.153","visitors_id":"278","city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-28T14:25:58.000000Z","created_at":"2023-04-28T14:25:58.000000Z","id":46}',
            ),
            42 => 
            array (
                'id' => '547',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:58',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"185.229.118.32","visitors_id":"273","city":"Singapore","region":"Singapore","country_code":"SG","country":"Singapore","loc":"1.2839,103.8500","timezone":"Asia\\/Singapore","updated_at":"2023-04-28T14:25:58.000000Z","created_at":"2023-04-28T14:25:58.000000Z","id":47}',
            ),
            43 => 
            array (
                'id' => '548',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:58',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"52.167.144.37","visitors_id":"284","city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-28T14:25:58.000000Z","created_at":"2023-04-28T14:25:58.000000Z","id":48}',
            ),
            44 => 
            array (
                'id' => '549',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:59',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"157.55.39.213","visitors_id":"274","city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-28T14:25:59.000000Z","created_at":"2023-04-28T14:25:59.000000Z","id":49}',
            ),
            45 => 
            array (
                'id' => '550',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:59',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.196","visitors_id":"280","city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-28T14:25:59.000000Z","created_at":"2023-04-28T14:25:59.000000Z","id":50}',
            ),
            46 => 
            array (
                'id' => '551',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:25:59',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"193.235.141.19","visitors_id":"289","city":"M\\u00e4rsta","region":"Stockholm","country_code":"SE","country":"Sweden","loc":"59.6216,17.8548","timezone":"Europe\\/Stockholm","updated_at":"2023-04-28T14:25:59.000000Z","created_at":"2023-04-28T14:25:59.000000Z","id":51}',
            ),
            47 => 
            array (
                'id' => '552',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:26:00',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"40.77.167.129","visitors_id":"276","city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-28T14:26:00.000000Z","created_at":"2023-04-28T14:26:00.000000Z","id":52}',
            ),
            48 => 
            array (
                'id' => '553',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:26:00',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"207.46.13.220","visitors_id":"277","city":"Moses Lake","region":"Washington","country_code":"US","country":"United States of America","loc":"47.1301,-119.2781","timezone":"America\\/Los_Angeles","updated_at":"2023-04-28T14:26:00.000000Z","created_at":"2023-04-28T14:26:00.000000Z","id":53}',
            ),
            49 => 
            array (
                'id' => '554',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:26:00',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"52.167.144.117","visitors_id":"275","city":"Boydton","region":"Virginia","country_code":"US","country":"United States of America","loc":"36.6676,-78.3875","timezone":"America\\/New_York","updated_at":"2023-04-28T14:26:00.000000Z","created_at":"2023-04-28T14:26:00.000000Z","id":54}',
            ),
            50 => 
            array (
                'id' => '555',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:26:00',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.5.219.73","visitors_id":"272","city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-04-28T14:26:00.000000Z","created_at":"2023-04-28T14:26:00.000000Z","id":55}',
            ),
            51 => 
            array (
                'id' => '556',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:26:01',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"35.92.192.44","visitors_id":"270","city":"Boardman","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.8399,-119.7006","timezone":"America\\/Los_Angeles","updated_at":"2023-04-28T14:26:01.000000Z","created_at":"2023-04-28T14:26:01.000000Z","id":56}',
            ),
            52 => 
            array (
                'id' => '557',
                'user_id' => '1',
                'log_date' => '2023-04-28 21:26:01',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"54.202.183.231","visitors_id":"267","city":"Boardman","region":"Oregon","country_code":"US","country":"United States of America","loc":"45.8399,-119.7006","timezone":"America\\/Los_Angeles","updated_at":"2023-04-28T14:26:01.000000Z","created_at":"2023-04-28T14:26:01.000000Z","id":57}',
            ),
            53 => 
            array (
                'id' => '558',
                'user_id' => '93',
                'log_date' => '2023-05-01 13:44:58',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.250.19","user_agent":"Mozilla\\/5.0 (Linux; U; Android 12; id-id; Redmi Note 11 Build\\/SKQ1.211103.001) AppleWebKit\\/537.36 (KHTML, like Gecko) Version\\/4.0 Chrome\\/89.0.4389.116 Mobile Safari\\/537.36 XiaoMi\\/MiuiBrowser\\/13.6.0-gn"}',
            ),
            54 => 
            array (
                'id' => '559',
                'user_id' => '93',
                'log_date' => '2023-05-01 13:45:19',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.5.250.19","visitors_id":"354","city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-05-01T06:45:19.000000Z","created_at":"2023-05-01T06:45:19.000000Z","id":69}',
            ),
            55 => 
            array (
                'id' => '560',
                'user_id' => '93',
                'log_date' => '2023-05-01 23:20:35',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.250.19","user_agent":"Mozilla\\/5.0 (Linux; U; Android 12; id-id; Redmi Note 11 Build\\/SKQ1.211103.001) AppleWebKit\\/537.36 (KHTML, like Gecko) Version\\/4.0 Chrome\\/89.0.4389.116 Mobile Safari\\/537.36 XiaoMi\\/MiuiBrowser\\/13.6.0-gn"}',
            ),
            56 => 
            array (
                'id' => '561',
                'user_id' => '93',
                'log_date' => '2023-05-02 15:14:09',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.55.33.178","user_agent":"Mozilla\\/5.0 (Linux; U; Android 12; id-id; Redmi Note 11 Build\\/SKQ1.211103.001) AppleWebKit\\/537.36 (KHTML, like Gecko) Version\\/4.0 Chrome\\/89.0.4389.116 Mobile Safari\\/537.36 XiaoMi\\/MiuiBrowser\\/13.6.0-gn"}',
            ),
            57 => 
            array (
                'id' => '562',
                'user_id' => '93',
                'log_date' => '2023-05-02 15:14:09',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.55.33.178","user_agent":"Mozilla\\/5.0 (Linux; U; Android 12; id-id; Redmi Note 11 Build\\/SKQ1.211103.001) AppleWebKit\\/537.36 (KHTML, like Gecko) Version\\/4.0 Chrome\\/89.0.4389.116 Mobile Safari\\/537.36 XiaoMi\\/MiuiBrowser\\/13.6.0-gn"}',
            ),
            58 => 
            array (
                'id' => '563',
                'user_id' => '1',
                'log_date' => '2023-05-02 16:08:48',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.193","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36 Edg\\/112.0.1722.64"}',
            ),
            59 => 
            array (
                'id' => '564',
                'user_id' => '1',
                'log_date' => '2023-05-02 16:09:56',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.147.8.193","visitors_id":"380","city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-05-02T09:09:56.000000Z","created_at":"2023-05-02T09:09:56.000000Z","id":79}',
            ),
            60 => 
            array (
                'id' => '565',
                'user_id' => '1',
                'log_date' => '2023-05-04 20:22:00',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":368,"parent_id":367,"title":"Permission","icon":null,"route":"admin.user_access.permission","sequence":32,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-03-08 12:49:19"}',
            ),
            61 => 
            array (
                'id' => '566',
                'user_id' => '1',
                'log_date' => '2023-05-04 20:22:00',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":368,"updated_at":"2023-05-04T13:22:00.000000Z","created_at":"2023-05-04T13:22:00.000000Z","id":1234}',
            ),
            62 => 
            array (
                'id' => '567',
                'user_id' => '1',
                'log_date' => '2023-05-04 20:22:00',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":4,"menu_id":368,"updated_at":"2023-05-04T13:22:00.000000Z","created_at":"2023-05-04T13:22:00.000000Z","id":1235}',
            ),
            63 => 
            array (
                'id' => '568',
                'user_id' => '1',
                'log_date' => '2023-05-04 20:22:12',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":369,"parent_id":367,"title":"Role","icon":null,"route":"admin.user_access.role","sequence":33,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-03-08 12:49:19"}',
            ),
            64 => 
            array (
                'id' => '569',
                'user_id' => '1',
                'log_date' => '2023-05-04 20:22:12',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":369,"updated_at":"2023-05-04T13:22:12.000000Z","created_at":"2023-05-04T13:22:12.000000Z","id":1236}',
            ),
            65 => 
            array (
                'id' => '570',
                'user_id' => '1',
                'log_date' => '2023-05-04 20:22:12',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":4,"menu_id":369,"updated_at":"2023-05-04T13:22:12.000000Z","created_at":"2023-05-04T13:22:12.000000Z","id":1237}',
            ),
            66 => 
            array (
                'id' => '571',
                'user_id' => '1',
                'log_date' => '2023-05-08 22:22:19',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Seleksi administrasi","slug":null,"kode":"C1","ci":0,"ri":0,"cr":0,"prioritas":0,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-08 20:06:03"}',
            ),
            67 => 
            array (
                'id' => '572',
                'user_id' => '1',
                'log_date' => '2023-05-08 22:22:22',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Seleksi Wawancara","slug":null,"kode":"C2","ci":0,"ri":0,"cr":0,"prioritas":0,"created_at":"2023-05-08 20:04:45","updated_at":"2023-05-08 20:05:59"}',
            ),
            68 => 
            array (
                'id' => '573',
                'user_id' => '1',
                'log_date' => '2023-05-08 22:22:25',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":null,"kode":"C3","ci":0,"ri":0,"cr":0,"prioritas":0,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-08 20:06:22"}',
            ),
            69 => 
            array (
                'id' => '574',
                'user_id' => '1',
                'log_date' => '2023-05-08 22:22:27',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Wawasan Ke organisasian","slug":null,"kode":"C5","ci":0,"ri":0,"cr":0,"prioritas":0,"created_at":"2023-05-08 20:06:50","updated_at":"2023-05-08 20:06:50"}',
            ),
            70 => 
            array (
                'id' => '575',
                'user_id' => '1',
                'log_date' => '2023-05-08 22:22:39',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Wawasan Ke organisasian","slug":"wawasan-ke-organisasian","kode":"C5","ci":0,"ri":0,"cr":0,"prioritas":0,"created_at":"2023-05-08 20:06:50","updated_at":"2023-05-08 22:22:27"}',
            ),
            71 => 
            array (
                'id' => '576',
                'user_id' => '1',
                'log_date' => '2023-05-08 22:22:45',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Wawasan Ke organisasian","slug":"wawasan-ke-organisasian","kode":"C54","ci":0,"ri":0,"cr":0,"prioritas":0,"created_at":"2023-05-08 20:06:50","updated_at":"2023-05-08 22:22:39"}',
            ),
            72 => 
            array (
                'id' => '577',
                'user_id' => '1',
                'log_date' => '2023-05-08 22:23:32',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":41,"nilai":0.33333333333333,"kriteria_x_id":10,"kriteria_y_id":11,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-08 22:05:09"}',
            ),
            73 => 
            array (
                'id' => '578',
                'user_id' => '1',
                'log_date' => '2023-05-08 22:23:32',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":39,"nilai":3,"kriteria_x_id":11,"kriteria_y_id":10,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-08 22:05:09"}',
            ),
            74 => 
            array (
                'id' => '579',
                'user_id' => '1',
                'log_date' => '2023-05-08 22:23:36',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":43,"nilai":1,"kriteria_x_id":12,"kriteria_y_id":11,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-08 20:06:22"}',
            ),
            75 => 
            array (
                'id' => '580',
                'user_id' => '1',
                'log_date' => '2023-05-08 22:23:36',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":46,"nilai":1,"kriteria_x_id":11,"kriteria_y_id":12,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-08 20:06:22"}',
            ),
            76 => 
            array (
                'id' => '581',
                'user_id' => '1',
                'log_date' => '2023-05-08 22:23:39',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":48,"nilai":1,"kriteria_x_id":13,"kriteria_y_id":11,"created_at":"2023-05-08 20:06:38","updated_at":"2023-05-08 20:06:38"}',
            ),
            77 => 
            array (
                'id' => '582',
                'user_id' => '1',
                'log_date' => '2023-05-08 22:23:39',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":52,"nilai":1,"kriteria_x_id":11,"kriteria_y_id":13,"created_at":"2023-05-08 20:06:38","updated_at":"2023-05-08 20:06:38"}',
            ),
            78 => 
            array (
                'id' => '583',
                'user_id' => '1',
                'log_date' => '2023-05-08 23:32:30',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":41,"nilai":2,"kriteria_x_id":10,"kriteria_y_id":11,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-08 22:23:32"}',
            ),
            79 => 
            array (
                'id' => '584',
                'user_id' => '1',
                'log_date' => '2023-05-08 23:32:30',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":39,"nilai":0.5,"kriteria_x_id":11,"kriteria_y_id":10,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-08 22:23:32"}',
            ),
            80 => 
            array (
                'id' => '585',
                'user_id' => '1',
                'log_date' => '2023-05-08 23:32:41',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":41,"nilai":9,"kriteria_x_id":10,"kriteria_y_id":11,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-08 23:32:30"}',
            ),
            81 => 
            array (
                'id' => '586',
                'user_id' => '1',
                'log_date' => '2023-05-08 23:32:41',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":39,"nilai":0.11111111111111,"kriteria_x_id":11,"kriteria_y_id":10,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-08 23:32:30"}',
            ),
            82 => 
            array (
                'id' => '587',
                'user_id' => '1',
                'log_date' => '2023-05-08 23:35:57',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":41,"nilai":1,"kriteria_x_id":10,"kriteria_y_id":11,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-08 23:32:41"}',
            ),
            83 => 
            array (
                'id' => '588',
                'user_id' => '1',
                'log_date' => '2023-05-08 23:35:57',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":39,"nilai":1,"kriteria_x_id":11,"kriteria_y_id":10,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-08 23:32:41"}',
            ),
            84 => 
            array (
                'id' => '589',
                'user_id' => '1',
                'log_date' => '2023-05-08 23:36:47',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":38,"nilai":3,"kriteria_x_id":10,"kriteria_y_id":10,"created_at":"2023-05-08 20:04:45","updated_at":"2023-05-08 20:04:45"}',
            ),
            85 => 
            array (
                'id' => '590',
                'user_id' => '1',
                'log_date' => '2023-05-08 23:37:18',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":51,"nilai":4,"kriteria_x_id":10,"kriteria_y_id":13,"created_at":"2023-05-08 20:06:38","updated_at":"2023-05-08 20:06:38"}',
            ),
            86 => 
            array (
                'id' => '591',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:07:04',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"11","nama":"Kurang","kode":"C1","updated_at":"2023-05-09T04:07:04.000000Z","created_at":"2023-05-09T04:07:04.000000Z","id":1}',
            ),
            87 => 
            array (
                'id' => '592',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:07:04',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":1,"kriteria_y_id":1,"nilai":1,"updated_at":"2023-05-09T04:07:04.000000Z","created_at":"2023-05-09T04:07:04.000000Z","id":1}',
            ),
            88 => 
            array (
                'id' => '593',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:07:21',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"11","nama":"Cukup","kode":"C2","updated_at":"2023-05-09T04:07:21.000000Z","created_at":"2023-05-09T04:07:21.000000Z","id":2}',
            ),
            89 => 
            array (
                'id' => '594',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:07:21',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":2,"kriteria_y_id":1,"nilai":1,"updated_at":"2023-05-09T04:07:21.000000Z","created_at":"2023-05-09T04:07:21.000000Z","id":2}',
            ),
            90 => 
            array (
                'id' => '595',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:07:21',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":2,"kriteria_y_id":2,"nilai":1,"updated_at":"2023-05-09T04:07:21.000000Z","created_at":"2023-05-09T04:07:21.000000Z","id":3}',
            ),
            91 => 
            array (
                'id' => '596',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:07:21',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":1,"kriteria_y_id":2,"nilai":1,"updated_at":"2023-05-09T04:07:21.000000Z","created_at":"2023-05-09T04:07:21.000000Z","id":4}',
            ),
            92 => 
            array (
                'id' => '597',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:07:30',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"11","nama":"Lengkap","kode":"C3","updated_at":"2023-05-09T04:07:30.000000Z","created_at":"2023-05-09T04:07:30.000000Z","id":3}',
            ),
            93 => 
            array (
                'id' => '598',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:07:30',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":3,"kriteria_y_id":1,"nilai":1,"updated_at":"2023-05-09T04:07:30.000000Z","created_at":"2023-05-09T04:07:30.000000Z","id":5}',
            ),
            94 => 
            array (
                'id' => '599',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:07:30',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":3,"kriteria_y_id":2,"nilai":1,"updated_at":"2023-05-09T04:07:30.000000Z","created_at":"2023-05-09T04:07:30.000000Z","id":6}',
            ),
            95 => 
            array (
                'id' => '600',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:07:30',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":3,"kriteria_y_id":3,"nilai":1,"updated_at":"2023-05-09T04:07:30.000000Z","created_at":"2023-05-09T04:07:30.000000Z","id":7}',
            ),
            96 => 
            array (
                'id' => '601',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:07:30',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":1,"kriteria_y_id":3,"nilai":1,"updated_at":"2023-05-09T04:07:30.000000Z","created_at":"2023-05-09T04:07:30.000000Z","id":8}',
            ),
            97 => 
            array (
                'id' => '602',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:07:30',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":2,"kriteria_y_id":3,"nilai":1,"updated_at":"2023-05-09T04:07:30.000000Z","created_at":"2023-05-09T04:07:30.000000Z","id":9}',
            ),
            98 => 
            array (
                'id' => '603',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:09:37',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"10","nama":"Kurang","kode":"C1","updated_at":"2023-05-09T04:09:37.000000Z","created_at":"2023-05-09T04:09:37.000000Z","id":4}',
            ),
            99 => 
            array (
                'id' => '604',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:09:37',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":4,"kriteria_y_id":4,"nilai":1,"updated_at":"2023-05-09T04:09:37.000000Z","created_at":"2023-05-09T04:09:37.000000Z","id":10}',
            ),
            100 => 
            array (
                'id' => '605',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:09:48',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"10","nama":"Baik","kode":"C2","updated_at":"2023-05-09T04:09:48.000000Z","created_at":"2023-05-09T04:09:48.000000Z","id":5}',
            ),
            101 => 
            array (
                'id' => '606',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:09:48',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":5,"kriteria_y_id":4,"nilai":1,"updated_at":"2023-05-09T04:09:48.000000Z","created_at":"2023-05-09T04:09:48.000000Z","id":11}',
            ),
            102 => 
            array (
                'id' => '607',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:09:48',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":5,"kriteria_y_id":5,"nilai":1,"updated_at":"2023-05-09T04:09:48.000000Z","created_at":"2023-05-09T04:09:48.000000Z","id":12}',
            ),
            103 => 
            array (
                'id' => '608',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:09:48',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":4,"kriteria_y_id":5,"nilai":1,"updated_at":"2023-05-09T04:09:48.000000Z","created_at":"2023-05-09T04:09:48.000000Z","id":13}',
            ),
            104 => 
            array (
                'id' => '609',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:09:57',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"10","nama":"Sangat Baik","kode":"C3","updated_at":"2023-05-09T04:09:57.000000Z","created_at":"2023-05-09T04:09:57.000000Z","id":6}',
            ),
            105 => 
            array (
                'id' => '610',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:09:57',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":6,"kriteria_y_id":4,"nilai":1,"updated_at":"2023-05-09T04:09:57.000000Z","created_at":"2023-05-09T04:09:57.000000Z","id":14}',
            ),
            106 => 
            array (
                'id' => '611',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:09:57',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":6,"kriteria_y_id":5,"nilai":1,"updated_at":"2023-05-09T04:09:57.000000Z","created_at":"2023-05-09T04:09:57.000000Z","id":15}',
            ),
            107 => 
            array (
                'id' => '612',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:09:57',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":6,"kriteria_y_id":6,"nilai":1,"updated_at":"2023-05-09T04:09:57.000000Z","created_at":"2023-05-09T04:09:57.000000Z","id":16}',
            ),
            108 => 
            array (
                'id' => '613',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:09:57',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":4,"kriteria_y_id":6,"nilai":1,"updated_at":"2023-05-09T04:09:57.000000Z","created_at":"2023-05-09T04:09:57.000000Z","id":17}',
            ),
            109 => 
            array (
                'id' => '614',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:09:57',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":5,"kriteria_y_id":6,"nilai":1,"updated_at":"2023-05-09T04:09:57.000000Z","created_at":"2023-05-09T04:09:57.000000Z","id":18}',
            ),
            110 => 
            array (
                'id' => '615',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:18:00',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"11","nama":"d","kode":"C3d","updated_at":"2023-05-09T04:18:00.000000Z","created_at":"2023-05-09T04:18:00.000000Z","id":7}',
            ),
            111 => 
            array (
                'id' => '616',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:18:00',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":7,"kriteria_y_id":1,"nilai":1,"updated_at":"2023-05-09T04:18:00.000000Z","created_at":"2023-05-09T04:18:00.000000Z","id":19}',
            ),
            112 => 
            array (
                'id' => '617',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:18:00',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":7,"kriteria_y_id":2,"nilai":1,"updated_at":"2023-05-09T04:18:00.000000Z","created_at":"2023-05-09T04:18:00.000000Z","id":20}',
            ),
            113 => 
            array (
                'id' => '618',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:18:00',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":7,"kriteria_y_id":3,"nilai":1,"updated_at":"2023-05-09T04:18:00.000000Z","created_at":"2023-05-09T04:18:00.000000Z","id":21}',
            ),
            114 => 
            array (
                'id' => '619',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:18:00',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":7,"kriteria_y_id":7,"nilai":1,"updated_at":"2023-05-09T04:18:00.000000Z","created_at":"2023-05-09T04:18:00.000000Z","id":22}',
            ),
            115 => 
            array (
                'id' => '620',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:18:00',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":1,"kriteria_y_id":7,"nilai":1,"updated_at":"2023-05-09T04:18:00.000000Z","created_at":"2023-05-09T04:18:00.000000Z","id":23}',
            ),
            116 => 
            array (
                'id' => '621',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:18:00',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":2,"kriteria_y_id":7,"nilai":1,"updated_at":"2023-05-09T04:18:00.000000Z","created_at":"2023-05-09T04:18:00.000000Z","id":24}',
            ),
            117 => 
            array (
                'id' => '622',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:18:00',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":3,"kriteria_y_id":7,"nilai":1,"updated_at":"2023-05-09T04:18:00.000000Z","created_at":"2023-05-09T04:18:00.000000Z","id":25}',
            ),
            118 => 
            array (
                'id' => '623',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:18:04',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'delete',
                'data' => '{"id":7,"nama":"d","kode":"C3d","prioritas":0,"total":0,"eign_value":0,"kriteria_id":11,"created_at":"2023-05-09 11:18:00","updated_at":"2023-05-09 11:18:00"}',
            ),
            119 => 
            array (
                'id' => '632',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:33:08',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":4,"nilai":1,"kriteria_x_id":1,"kriteria_y_id":2,"created_at":"2023-05-09 11:07:21","updated_at":"2023-05-09 11:07:21"}',
            ),
            120 => 
            array (
                'id' => '633',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:33:08',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":2,"nilai":1,"kriteria_x_id":2,"kriteria_y_id":1,"created_at":"2023-05-09 11:07:21","updated_at":"2023-05-09 11:07:21"}',
            ),
            121 => 
            array (
                'id' => '634',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:33:08',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":1,"nama":"Kurang","kode":"C1","prioritas":0,"total":0,"eign_value":0,"kriteria_id":11,"created_at":"2023-05-09 11:07:04","updated_at":"2023-05-09 11:07:04"}',
            ),
            122 => 
            array (
                'id' => '635',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:33:08',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":2,"nama":"Cukup","kode":"C2","prioritas":0,"total":0,"eign_value":0,"kriteria_id":11,"created_at":"2023-05-09 11:07:21","updated_at":"2023-05-09 11:07:21"}',
            ),
            123 => 
            array (
                'id' => '636',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:33:08',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":3,"nama":"Lengkap","kode":"C3","prioritas":0,"total":0,"eign_value":0,"kriteria_id":11,"created_at":"2023-05-09 11:07:30","updated_at":"2023-05-09 11:07:30"}',
            ),
            124 => 
            array (
                'id' => '637',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:35:09',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Seleksi administrasi","slug":"seleksi-administrasi","kode":"C1","ci":0,"ri":0,"cr":0,"prioritas":0.13166666666667,"total":8,"eign_value":1.0533333333333,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-09 01:33:54"}',
            ),
            125 => 
            array (
                'id' => '638',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:22',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":2,"nilai":0.5,"kriteria_x_id":2,"kriteria_y_id":1,"created_at":"2023-05-09 11:07:21","updated_at":"2023-05-09 11:33:08"}',
            ),
            126 => 
            array (
                'id' => '639',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:22',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":4,"nilai":2,"kriteria_x_id":1,"kriteria_y_id":2,"created_at":"2023-05-09 11:07:21","updated_at":"2023-05-09 11:33:08"}',
            ),
            127 => 
            array (
                'id' => '640',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:22',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":1,"nama":"Kurang","kode":"C1","prioritas":0.41111111111111,"total":2.5,"eign_value":1.0277777777778,"kriteria_id":11,"created_at":"2023-05-09 11:07:04","updated_at":"2023-05-09 11:33:08"}',
            ),
            128 => 
            array (
                'id' => '641',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:22',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":2,"nama":"Cukup","kode":"C2","prioritas":0.26111111111111,"total":4,"eign_value":1.0444444444444,"kriteria_id":11,"created_at":"2023-05-09 11:07:21","updated_at":"2023-05-09 11:33:08"}',
            ),
            129 => 
            array (
                'id' => '642',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:22',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":3,"nama":"Lengkap","kode":"C3","prioritas":0.32777777777778,"total":3,"eign_value":0.98333333333333,"kriteria_id":11,"created_at":"2023-05-09 11:07:30","updated_at":"2023-05-09 11:33:08"}',
            ),
            130 => 
            array (
                'id' => '643',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:22',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Seleksi administrasi","slug":"seleksi-administrasi","kode":"C1","ci":0.027777777777778,"ri":0.58,"cr":0.047892720306514,"prioritas":0.13166666666667,"total":8,"eign_value":1.0533333333333,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-09 11:35:09"}',
            ),
            131 => 
            array (
                'id' => '644',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:30',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":2,"nilai":3,"kriteria_x_id":2,"kriteria_y_id":1,"created_at":"2023-05-09 11:07:21","updated_at":"2023-05-09 11:41:22"}',
            ),
            132 => 
            array (
                'id' => '645',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:30',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":4,"nilai":0.33333333333333,"kriteria_x_id":1,"kriteria_y_id":2,"created_at":"2023-05-09 11:07:21","updated_at":"2023-05-09 11:41:22"}',
            ),
            133 => 
            array (
                'id' => '646',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:30',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":1,"nama":"Kurang","kode":"C1","prioritas":0.22539682539682,"total":5,"eign_value":1.1269841269841,"kriteria_id":11,"created_at":"2023-05-09 11:07:04","updated_at":"2023-05-09 11:41:22"}',
            ),
            134 => 
            array (
                'id' => '647',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:30',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":2,"nama":"Cukup","kode":"C2","prioritas":0.45396825396825,"total":2.3333333333333,"eign_value":1.0592592592593,"kriteria_id":11,"created_at":"2023-05-09 11:07:21","updated_at":"2023-05-09 11:41:22"}',
            ),
            135 => 
            array (
                'id' => '648',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:30',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":3,"nama":"Lengkap","kode":"C3","prioritas":0.32063492063492,"total":3,"eign_value":0.96190476190476,"kriteria_id":11,"created_at":"2023-05-09 11:07:30","updated_at":"2023-05-09 11:41:22"}',
            ),
            136 => 
            array (
                'id' => '649',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:30',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Seleksi administrasi","slug":"seleksi-administrasi","kode":"C1","ci":0.074074074074073,"ri":0.58,"cr":0.12771392081737,"prioritas":0.13166666666667,"total":8,"eign_value":1.0533333333333,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-09 11:41:22"}',
            ),
            137 => 
            array (
                'id' => '650',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:44',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":2,"nilai":4,"kriteria_x_id":2,"kriteria_y_id":1,"created_at":"2023-05-09 11:07:21","updated_at":"2023-05-09 11:41:30"}',
            ),
            138 => 
            array (
                'id' => '651',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:44',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":4,"nilai":0.25,"kriteria_x_id":1,"kriteria_y_id":2,"created_at":"2023-05-09 11:07:21","updated_at":"2023-05-09 11:41:30"}',
            ),
            139 => 
            array (
                'id' => '652',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:44',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":1,"nama":"Kurang","kode":"C1","prioritas":0.2037037037037,"total":6,"eign_value":1.2222222222222,"kriteria_id":11,"created_at":"2023-05-09 11:07:04","updated_at":"2023-05-09 11:41:30"}',
            ),
            140 => 
            array (
                'id' => '653',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:44',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":2,"nama":"Cukup","kode":"C2","prioritas":0.48148148148148,"total":2.25,"eign_value":1.0833333333333,"kriteria_id":11,"created_at":"2023-05-09 11:07:21","updated_at":"2023-05-09 11:41:30"}',
            ),
            141 => 
            array (
                'id' => '654',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:44',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":3,"nama":"Lengkap","kode":"C3","prioritas":0.31481481481481,"total":3,"eign_value":0.94444444444444,"kriteria_id":11,"created_at":"2023-05-09 11:07:30","updated_at":"2023-05-09 11:41:30"}',
            ),
            142 => 
            array (
                'id' => '655',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:44',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Seleksi administrasi","slug":"seleksi-administrasi","kode":"C1","ci":0.125,"ri":0.58,"cr":0.21551724137931,"prioritas":0.13166666666667,"total":8,"eign_value":1.0533333333333,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-09 11:41:30"}',
            ),
            143 => 
            array (
                'id' => '656',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:49',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":5,"nilai":1,"kriteria_x_id":3,"kriteria_y_id":1,"created_at":"2023-05-09 11:07:30","updated_at":"2023-05-09 11:07:30"}',
            ),
            144 => 
            array (
                'id' => '657',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:49',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":8,"nilai":1,"kriteria_x_id":1,"kriteria_y_id":3,"created_at":"2023-05-09 11:07:30","updated_at":"2023-05-09 11:07:30"}',
            ),
            145 => 
            array (
                'id' => '658',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:49',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":1,"nama":"Kurang","kode":"C1","prioritas":0.26111111111111,"total":4,"eign_value":1.0444444444444,"kriteria_id":11,"created_at":"2023-05-09 11:07:04","updated_at":"2023-05-09 11:41:44"}',
            ),
            146 => 
            array (
                'id' => '659',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:49',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":2,"nama":"Cukup","kode":"C2","prioritas":0.41111111111111,"total":2.5,"eign_value":1.0277777777778,"kriteria_id":11,"created_at":"2023-05-09 11:07:21","updated_at":"2023-05-09 11:41:44"}',
            ),
            147 => 
            array (
                'id' => '660',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:49',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":3,"nama":"Lengkap","kode":"C3","prioritas":0.32777777777778,"total":3,"eign_value":0.98333333333333,"kriteria_id":11,"created_at":"2023-05-09 11:07:30","updated_at":"2023-05-09 11:41:44"}',
            ),
            148 => 
            array (
                'id' => '661',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:41:49',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Seleksi administrasi","slug":"seleksi-administrasi","kode":"C1","ci":0.027777777777778,"ri":0.58,"cr":0.047892720306514,"prioritas":0.13166666666667,"total":8,"eign_value":1.0533333333333,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-09 11:41:44"}',
            ),
            149 => 
            array (
                'id' => '662',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:02',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":6,"nilai":1,"kriteria_x_id":3,"kriteria_y_id":2,"created_at":"2023-05-09 11:07:30","updated_at":"2023-05-09 11:07:30"}',
            ),
            150 => 
            array (
                'id' => '663',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:02',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":9,"nilai":1,"kriteria_x_id":2,"kriteria_y_id":3,"created_at":"2023-05-09 11:07:30","updated_at":"2023-05-09 11:07:30"}',
            ),
            151 => 
            array (
                'id' => '664',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:02',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":1,"nama":"Kurang","kode":"C1","prioritas":0.16984126984127,"total":6,"eign_value":1.0190476190476,"kriteria_id":11,"created_at":"2023-05-09 11:07:04","updated_at":"2023-05-09 11:41:49"}',
            ),
            152 => 
            array (
                'id' => '665',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:02',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":2,"nama":"Cukup","kode":"C2","prioritas":0.38730158730159,"total":2.5,"eign_value":0.96825396825397,"kriteria_id":11,"created_at":"2023-05-09 11:07:21","updated_at":"2023-05-09 11:41:49"}',
            ),
            153 => 
            array (
                'id' => '666',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:02',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":3,"nama":"Lengkap","kode":"C3","prioritas":0.44285714285714,"total":2.3333333333333,"eign_value":1.0333333333333,"kriteria_id":11,"created_at":"2023-05-09 11:07:30","updated_at":"2023-05-09 11:41:49"}',
            ),
            154 => 
            array (
                'id' => '667',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:02',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Seleksi administrasi","slug":"seleksi-administrasi","kode":"C1","ci":0.010317460317459,"ri":0.58,"cr":0.017788724685274,"prioritas":0.13166666666667,"total":8,"eign_value":1.0533333333333,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-09 11:41:49"}',
            ),
            155 => 
            array (
                'id' => '668',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:26',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":11,"nilai":1,"kriteria_x_id":5,"kriteria_y_id":4,"created_at":"2023-05-09 11:09:48","updated_at":"2023-05-09 11:09:48"}',
            ),
            156 => 
            array (
                'id' => '669',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:26',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":13,"nilai":1,"kriteria_x_id":4,"kriteria_y_id":5,"created_at":"2023-05-09 11:09:48","updated_at":"2023-05-09 11:09:48"}',
            ),
            157 => 
            array (
                'id' => '670',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:26',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":4,"nama":"Kurang","kode":"C1","prioritas":0,"total":0,"eign_value":0,"kriteria_id":10,"created_at":"2023-05-09 11:09:37","updated_at":"2023-05-09 11:09:37"}',
            ),
            158 => 
            array (
                'id' => '671',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:26',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":5,"nama":"Baik","kode":"C2","prioritas":0,"total":0,"eign_value":0,"kriteria_id":10,"created_at":"2023-05-09 11:09:48","updated_at":"2023-05-09 11:09:48"}',
            ),
            159 => 
            array (
                'id' => '672',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:26',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":6,"nama":"Sangat Baik","kode":"C3","prioritas":0,"total":0,"eign_value":0,"kriteria_id":10,"created_at":"2023-05-09 11:09:57","updated_at":"2023-05-09 11:09:57"}',
            ),
            160 => 
            array (
                'id' => '673',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:26',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Seleksi Wawancara","slug":"seleksi-wawancara","kode":"C2","ci":0,"ri":0,"cr":0,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:04:45","updated_at":"2023-05-09 01:33:54"}',
            ),
            161 => 
            array (
                'id' => '674',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:30',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":14,"nilai":1,"kriteria_x_id":6,"kriteria_y_id":4,"created_at":"2023-05-09 11:09:57","updated_at":"2023-05-09 11:09:57"}',
            ),
            162 => 
            array (
                'id' => '675',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:30',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":17,"nilai":1,"kriteria_x_id":4,"kriteria_y_id":6,"created_at":"2023-05-09 11:09:57","updated_at":"2023-05-09 11:09:57"}',
            ),
            163 => 
            array (
                'id' => '676',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:30',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":4,"nama":"Kurang","kode":"C1","prioritas":0.26111111111111,"total":4,"eign_value":1.0444444444444,"kriteria_id":10,"created_at":"2023-05-09 11:09:37","updated_at":"2023-05-09 11:42:26"}',
            ),
            164 => 
            array (
                'id' => '677',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:30',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":5,"nama":"Baik","kode":"C2","prioritas":0.41111111111111,"total":2.5,"eign_value":1.0277777777778,"kriteria_id":10,"created_at":"2023-05-09 11:09:48","updated_at":"2023-05-09 11:42:26"}',
            ),
            165 => 
            array (
                'id' => '678',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:30',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":6,"nama":"Sangat Baik","kode":"C3","prioritas":0.32777777777778,"total":3,"eign_value":0.98333333333333,"kriteria_id":10,"created_at":"2023-05-09 11:09:57","updated_at":"2023-05-09 11:42:26"}',
            ),
            166 => 
            array (
                'id' => '679',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:30',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Seleksi Wawancara","slug":"seleksi-wawancara","kode":"C2","ci":0.027777777777778,"ri":0.58,"cr":0.047892720306514,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:04:45","updated_at":"2023-05-09 11:42:26"}',
            ),
            167 => 
            array (
                'id' => '680',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:33',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":14,"nilai":2,"kriteria_x_id":6,"kriteria_y_id":4,"created_at":"2023-05-09 11:09:57","updated_at":"2023-05-09 11:42:29"}',
            ),
            168 => 
            array (
                'id' => '681',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:33',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":17,"nilai":0.5,"kriteria_x_id":4,"kriteria_y_id":6,"created_at":"2023-05-09 11:09:57","updated_at":"2023-05-09 11:42:30"}',
            ),
            169 => 
            array (
                'id' => '682',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:33',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":4,"nama":"Kurang","kode":"C1","prioritas":0.2,"total":5,"eign_value":1,"kriteria_id":10,"created_at":"2023-05-09 11:09:37","updated_at":"2023-05-09 11:42:30"}',
            ),
            170 => 
            array (
                'id' => '683',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:34',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":5,"nama":"Baik","kode":"C2","prioritas":0.4,"total":2.5,"eign_value":1,"kriteria_id":10,"created_at":"2023-05-09 11:09:48","updated_at":"2023-05-09 11:42:30"}',
            ),
            171 => 
            array (
                'id' => '684',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:34',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":6,"nama":"Sangat Baik","kode":"C3","prioritas":0.4,"total":2.5,"eign_value":1,"kriteria_id":10,"created_at":"2023-05-09 11:09:57","updated_at":"2023-05-09 11:42:30"}',
            ),
            172 => 
            array (
                'id' => '685',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:34',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Seleksi Wawancara","slug":"seleksi-wawancara","kode":"C2","ci":4.4408920985006e-16,"ri":0.58,"cr":7.6567105146563e-16,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:04:45","updated_at":"2023-05-09 11:42:30"}',
            ),
            173 => 
            array (
                'id' => '686',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:51',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":15,"nilai":1,"kriteria_x_id":6,"kriteria_y_id":5,"created_at":"2023-05-09 11:09:57","updated_at":"2023-05-09 11:09:57"}',
            ),
            174 => 
            array (
                'id' => '687',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:51',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":18,"nilai":1,"kriteria_x_id":5,"kriteria_y_id":6,"created_at":"2023-05-09 11:09:57","updated_at":"2023-05-09 11:09:57"}',
            ),
            175 => 
            array (
                'id' => '688',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:51',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":4,"nama":"Kurang","kode":"C1","prioritas":0.16984126984127,"total":6,"eign_value":1.0190476190476,"kriteria_id":10,"created_at":"2023-05-09 11:09:37","updated_at":"2023-05-09 11:42:33"}',
            ),
            176 => 
            array (
                'id' => '689',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:51',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":5,"nama":"Baik","kode":"C2","prioritas":0.38730158730159,"total":2.5,"eign_value":0.96825396825397,"kriteria_id":10,"created_at":"2023-05-09 11:09:48","updated_at":"2023-05-09 11:42:33"}',
            ),
            177 => 
            array (
                'id' => '690',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:51',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":6,"nama":"Sangat Baik","kode":"C3","prioritas":0.44285714285714,"total":2.3333333333333,"eign_value":1.0333333333333,"kriteria_id":10,"created_at":"2023-05-09 11:09:57","updated_at":"2023-05-09 11:42:34"}',
            ),
            178 => 
            array (
                'id' => '691',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:42:51',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Seleksi Wawancara","slug":"seleksi-wawancara","kode":"C2","ci":0.010317460317459,"ri":0.58,"cr":0.017788724685274,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:04:45","updated_at":"2023-05-09 11:42:34"}',
            ),
            179 => 
            array (
                'id' => '692',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:43:28',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"12","nama":"Anggota Biasa","kode":"C1","updated_at":"2023-05-09T04:43:28.000000Z","created_at":"2023-05-09T04:43:28.000000Z","id":9}',
            ),
            180 => 
            array (
                'id' => '693',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:43:28',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":9,"kriteria_y_id":9,"nilai":1,"updated_at":"2023-05-09T04:43:28.000000Z","created_at":"2023-05-09T04:43:28.000000Z","id":33}',
            ),
            181 => 
            array (
                'id' => '694',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:43:28',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0,"total":0,"eign_value":0,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:43:28"}',
            ),
            182 => 
            array (
                'id' => '695',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:43:40',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"12","nama":"Pernah jadi sekertaris bidang","kode":"C2","updated_at":"2023-05-09T04:43:40.000000Z","created_at":"2023-05-09T04:43:40.000000Z","id":10}',
            ),
            183 => 
            array (
                'id' => '696',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:43:40',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":10,"kriteria_y_id":9,"nilai":1,"updated_at":"2023-05-09T04:43:40.000000Z","created_at":"2023-05-09T04:43:40.000000Z","id":34}',
            ),
            184 => 
            array (
                'id' => '697',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:43:40',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":10,"kriteria_y_id":10,"nilai":1,"updated_at":"2023-05-09T04:43:40.000000Z","created_at":"2023-05-09T04:43:40.000000Z","id":35}',
            ),
            185 => 
            array (
                'id' => '698',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:43:40',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":9,"kriteria_y_id":10,"nilai":1,"updated_at":"2023-05-09T04:43:40.000000Z","created_at":"2023-05-09T04:43:40.000000Z","id":36}',
            ),
            186 => 
            array (
                'id' => '699',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:43:40',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":1,"total":1,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:43:28"}',
            ),
            187 => 
            array (
                'id' => '700',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:43:40',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0,"total":0,"eign_value":0,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:43:40"}',
            ),
            188 => 
            array (
                'id' => '701',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:02',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"12","nama":"Pernah jadi ketua bidang","kode":"C3","updated_at":"2023-05-09T04:44:02.000000Z","created_at":"2023-05-09T04:44:02.000000Z","id":11}',
            ),
            189 => 
            array (
                'id' => '702',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:02',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":11,"kriteria_y_id":9,"nilai":1,"updated_at":"2023-05-09T04:44:02.000000Z","created_at":"2023-05-09T04:44:02.000000Z","id":37}',
            ),
            190 => 
            array (
                'id' => '703',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:02',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":11,"kriteria_y_id":10,"nilai":1,"updated_at":"2023-05-09T04:44:02.000000Z","created_at":"2023-05-09T04:44:02.000000Z","id":38}',
            ),
            191 => 
            array (
                'id' => '704',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:02',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":11,"kriteria_y_id":11,"nilai":1,"updated_at":"2023-05-09T04:44:02.000000Z","created_at":"2023-05-09T04:44:02.000000Z","id":39}',
            ),
            192 => 
            array (
                'id' => '705',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:02',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":9,"kriteria_y_id":11,"nilai":1,"updated_at":"2023-05-09T04:44:02.000000Z","created_at":"2023-05-09T04:44:02.000000Z","id":40}',
            ),
            193 => 
            array (
                'id' => '706',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:02',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":10,"kriteria_y_id":11,"nilai":1,"updated_at":"2023-05-09T04:44:02.000000Z","created_at":"2023-05-09T04:44:02.000000Z","id":41}',
            ),
            194 => 
            array (
                'id' => '707',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:02',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.5,"total":2,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:43:40"}',
            ),
            195 => 
            array (
                'id' => '708',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:02',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.5,"total":2,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:43:40"}',
            ),
            196 => 
            array (
                'id' => '709',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:02',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0,"total":0,"eign_value":0,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:44:02"}',
            ),
            197 => 
            array (
                'id' => '710',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:02',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0,"ri":0,"cr":0,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 01:33:54"}',
            ),
            198 => 
            array (
                'id' => '711',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:25',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"12","nama":"Pernah jadi bendahara umum","kode":"C4","updated_at":"2023-05-09T04:44:25.000000Z","created_at":"2023-05-09T04:44:25.000000Z","id":12}',
            ),
            199 => 
            array (
                'id' => '712',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:25',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":12,"kriteria_y_id":9,"nilai":1,"updated_at":"2023-05-09T04:44:25.000000Z","created_at":"2023-05-09T04:44:25.000000Z","id":42}',
            ),
            200 => 
            array (
                'id' => '713',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:25',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":12,"kriteria_y_id":10,"nilai":1,"updated_at":"2023-05-09T04:44:25.000000Z","created_at":"2023-05-09T04:44:25.000000Z","id":43}',
            ),
            201 => 
            array (
                'id' => '714',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:25',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":12,"kriteria_y_id":11,"nilai":1,"updated_at":"2023-05-09T04:44:25.000000Z","created_at":"2023-05-09T04:44:25.000000Z","id":44}',
            ),
            202 => 
            array (
                'id' => '715',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:25',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":12,"kriteria_y_id":12,"nilai":1,"updated_at":"2023-05-09T04:44:25.000000Z","created_at":"2023-05-09T04:44:25.000000Z","id":45}',
            ),
            203 => 
            array (
                'id' => '716',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:25',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":9,"kriteria_y_id":12,"nilai":1,"updated_at":"2023-05-09T04:44:25.000000Z","created_at":"2023-05-09T04:44:25.000000Z","id":46}',
            ),
            204 => 
            array (
                'id' => '717',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:25',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":10,"kriteria_y_id":12,"nilai":1,"updated_at":"2023-05-09T04:44:25.000000Z","created_at":"2023-05-09T04:44:25.000000Z","id":47}',
            ),
            205 => 
            array (
                'id' => '718',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:25',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":11,"kriteria_y_id":12,"nilai":1,"updated_at":"2023-05-09T04:44:25.000000Z","created_at":"2023-05-09T04:44:25.000000Z","id":48}',
            ),
            206 => 
            array (
                'id' => '719',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:25',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.33333333333333,"total":3,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:44:02"}',
            ),
            207 => 
            array (
                'id' => '720',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:25',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.33333333333333,"total":3,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:44:02"}',
            ),
            208 => 
            array (
                'id' => '721',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:25',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.33333333333333,"total":3,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:44:02"}',
            ),
            209 => 
            array (
                'id' => '722',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:25',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0,"total":0,"eign_value":0,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:44:25"}',
            ),
            210 => 
            array (
                'id' => '723',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:25',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0,"ri":0.58,"cr":0,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:44:02"}',
            ),
            211 => 
            array (
                'id' => '724',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:36',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"12","nama":"Pernah jadi sekertaris umum","kode":"C5","updated_at":"2023-05-09T04:44:36.000000Z","created_at":"2023-05-09T04:44:36.000000Z","id":13}',
            ),
            212 => 
            array (
                'id' => '725',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:36',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":13,"kriteria_y_id":9,"nilai":1,"updated_at":"2023-05-09T04:44:36.000000Z","created_at":"2023-05-09T04:44:36.000000Z","id":49}',
            ),
            213 => 
            array (
                'id' => '726',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:36',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":13,"kriteria_y_id":10,"nilai":1,"updated_at":"2023-05-09T04:44:36.000000Z","created_at":"2023-05-09T04:44:36.000000Z","id":50}',
            ),
            214 => 
            array (
                'id' => '727',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:36',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":13,"kriteria_y_id":11,"nilai":1,"updated_at":"2023-05-09T04:44:36.000000Z","created_at":"2023-05-09T04:44:36.000000Z","id":51}',
            ),
            215 => 
            array (
                'id' => '728',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:36',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":13,"kriteria_y_id":12,"nilai":1,"updated_at":"2023-05-09T04:44:36.000000Z","created_at":"2023-05-09T04:44:36.000000Z","id":52}',
            ),
            216 => 
            array (
                'id' => '729',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:36',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":13,"kriteria_y_id":13,"nilai":1,"updated_at":"2023-05-09T04:44:36.000000Z","created_at":"2023-05-09T04:44:36.000000Z","id":53}',
            ),
            217 => 
            array (
                'id' => '730',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:36',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":9,"kriteria_y_id":13,"nilai":1,"updated_at":"2023-05-09T04:44:36.000000Z","created_at":"2023-05-09T04:44:36.000000Z","id":54}',
            ),
            218 => 
            array (
                'id' => '731',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:37',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":10,"kriteria_y_id":13,"nilai":1,"updated_at":"2023-05-09T04:44:37.000000Z","created_at":"2023-05-09T04:44:37.000000Z","id":55}',
            ),
            219 => 
            array (
                'id' => '732',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:37',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":11,"kriteria_y_id":13,"nilai":1,"updated_at":"2023-05-09T04:44:37.000000Z","created_at":"2023-05-09T04:44:37.000000Z","id":56}',
            ),
            220 => 
            array (
                'id' => '733',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:37',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":12,"kriteria_y_id":13,"nilai":1,"updated_at":"2023-05-09T04:44:37.000000Z","created_at":"2023-05-09T04:44:37.000000Z","id":57}',
            ),
            221 => 
            array (
                'id' => '734',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:37',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.25,"total":4,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:44:25"}',
            ),
            222 => 
            array (
                'id' => '735',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:37',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.25,"total":4,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:44:25"}',
            ),
            223 => 
            array (
                'id' => '736',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:37',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.25,"total":4,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:44:25"}',
            ),
            224 => 
            array (
                'id' => '737',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:37',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.25,"total":4,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:44:25"}',
            ),
            225 => 
            array (
                'id' => '738',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:37',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0,"total":0,"eign_value":0,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:44:36"}',
            ),
            226 => 
            array (
                'id' => '739',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:37',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0,"ri":0.9,"cr":0,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:44:25"}',
            ),
            227 => 
            array (
                'id' => '740',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"12","nama":"Pernah jadi ketua umum","kode":"C6","updated_at":"2023-05-09T04:44:55.000000Z","created_at":"2023-05-09T04:44:55.000000Z","id":14}',
            ),
            228 => 
            array (
                'id' => '741',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":14,"kriteria_y_id":9,"nilai":1,"updated_at":"2023-05-09T04:44:55.000000Z","created_at":"2023-05-09T04:44:55.000000Z","id":58}',
            ),
            229 => 
            array (
                'id' => '742',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":14,"kriteria_y_id":10,"nilai":1,"updated_at":"2023-05-09T04:44:55.000000Z","created_at":"2023-05-09T04:44:55.000000Z","id":59}',
            ),
            230 => 
            array (
                'id' => '743',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":14,"kriteria_y_id":11,"nilai":1,"updated_at":"2023-05-09T04:44:55.000000Z","created_at":"2023-05-09T04:44:55.000000Z","id":60}',
            ),
            231 => 
            array (
                'id' => '744',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":14,"kriteria_y_id":12,"nilai":1,"updated_at":"2023-05-09T04:44:55.000000Z","created_at":"2023-05-09T04:44:55.000000Z","id":61}',
            ),
            232 => 
            array (
                'id' => '745',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":14,"kriteria_y_id":13,"nilai":1,"updated_at":"2023-05-09T04:44:55.000000Z","created_at":"2023-05-09T04:44:55.000000Z","id":62}',
            ),
            233 => 
            array (
                'id' => '746',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":14,"kriteria_y_id":14,"nilai":1,"updated_at":"2023-05-09T04:44:55.000000Z","created_at":"2023-05-09T04:44:55.000000Z","id":63}',
            ),
            234 => 
            array (
                'id' => '747',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":9,"kriteria_y_id":14,"nilai":1,"updated_at":"2023-05-09T04:44:55.000000Z","created_at":"2023-05-09T04:44:55.000000Z","id":64}',
            ),
            235 => 
            array (
                'id' => '748',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":10,"kriteria_y_id":14,"nilai":1,"updated_at":"2023-05-09T04:44:55.000000Z","created_at":"2023-05-09T04:44:55.000000Z","id":65}',
            ),
            236 => 
            array (
                'id' => '749',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":11,"kriteria_y_id":14,"nilai":1,"updated_at":"2023-05-09T04:44:55.000000Z","created_at":"2023-05-09T04:44:55.000000Z","id":66}',
            ),
            237 => 
            array (
                'id' => '750',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":12,"kriteria_y_id":14,"nilai":1,"updated_at":"2023-05-09T04:44:55.000000Z","created_at":"2023-05-09T04:44:55.000000Z","id":67}',
            ),
            238 => 
            array (
                'id' => '751',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":13,"kriteria_y_id":14,"nilai":1,"updated_at":"2023-05-09T04:44:55.000000Z","created_at":"2023-05-09T04:44:55.000000Z","id":68}',
            ),
            239 => 
            array (
                'id' => '752',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.2,"total":5,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:44:37"}',
            ),
            240 => 
            array (
                'id' => '753',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.2,"total":5,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:44:37"}',
            ),
            241 => 
            array (
                'id' => '754',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.2,"total":5,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:44:37"}',
            ),
            242 => 
            array (
                'id' => '755',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.2,"total":5,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:44:37"}',
            ),
            243 => 
            array (
                'id' => '756',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.2,"total":5,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:44:37"}',
            ),
            244 => 
            array (
                'id' => '757',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0,"total":0,"eign_value":0,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:44:55"}',
            ),
            245 => 
            array (
                'id' => '758',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:44:55',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0,"ri":1.12,"cr":0,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:44:37"}',
            ),
            246 => 
            array (
                'id' => '759',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:13',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":36,"nilai":1,"kriteria_x_id":9,"kriteria_y_id":10,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:43:40"}',
            ),
            247 => 
            array (
                'id' => '760',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:13',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":34,"nilai":1,"kriteria_x_id":10,"kriteria_y_id":9,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:43:40"}',
            ),
            248 => 
            array (
                'id' => '761',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:13',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.16666666666667,"total":6,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:44:55"}',
            ),
            249 => 
            array (
                'id' => '762',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:13',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.16666666666667,"total":6,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:44:55"}',
            ),
            250 => 
            array (
                'id' => '763',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:13',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.16666666666667,"total":6,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:44:55"}',
            ),
            251 => 
            array (
                'id' => '764',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:13',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.16666666666667,"total":6,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:44:55"}',
            ),
            252 => 
            array (
                'id' => '765',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:13',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.16666666666667,"total":6,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:44:55"}',
            ),
            253 => 
            array (
                'id' => '766',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:13',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.16666666666667,"total":6,"eign_value":1,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:44:55"}',
            ),
            254 => 
            array (
                'id' => '767',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:13',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0,"ri":1.24,"cr":0,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:44:55"}',
            ),
            255 => 
            array (
                'id' => '768',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:24',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":34,"nilai":0.5,"kriteria_x_id":10,"kriteria_y_id":9,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:45:13"}',
            ),
            256 => 
            array (
                'id' => '769',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:24',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":36,"nilai":2,"kriteria_x_id":9,"kriteria_y_id":10,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:45:13"}',
            ),
            257 => 
            array (
                'id' => '770',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:24',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.18903318903319,"total":5.5,"eign_value":1.0396825396825,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:45:13"}',
            ),
            258 => 
            array (
                'id' => '771',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:24',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.15007215007215,"total":7,"eign_value":1.0505050505051,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:45:13"}',
            ),
            259 => 
            array (
                'id' => '772',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:32',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":37,"nilai":1,"kriteria_x_id":11,"kriteria_y_id":9,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:44:02"}',
            ),
            260 => 
            array (
                'id' => '773',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:32',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":40,"nilai":1,"kriteria_x_id":9,"kriteria_y_id":11,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:44:02"}',
            ),
            261 => 
            array (
                'id' => '774',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:32',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.15007215007215,"total":7,"eign_value":1.0505050505051,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:45:24"}',
            ),
            262 => 
            array (
                'id' => '775',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:32',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.18903318903319,"total":5.5,"eign_value":1.0396825396825,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:45:24"}',
            ),
            263 => 
            array (
                'id' => '776',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:32',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.16522366522367,"total":6,"eign_value":0.99134199134199,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:45:13"}',
            ),
            264 => 
            array (
                'id' => '777',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:32',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.16522366522367,"total":6,"eign_value":0.99134199134199,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:45:13"}',
            ),
            265 => 
            array (
                'id' => '778',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:32',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.16522366522367,"total":6,"eign_value":0.99134199134199,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:45:13"}',
            ),
            266 => 
            array (
                'id' => '779',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:32',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.16522366522367,"total":6,"eign_value":0.99134199134199,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:45:13"}',
            ),
            267 => 
            array (
                'id' => '780',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:32',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.011111111111111,"ri":1.24,"cr":0.0089605734767022,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:45:13"}',
            ),
            268 => 
            array (
                'id' => '781',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:38',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":42,"nilai":1,"kriteria_x_id":12,"kriteria_y_id":9,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:44:25"}',
            ),
            269 => 
            array (
                'id' => '782',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:38',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":46,"nilai":1,"kriteria_x_id":9,"kriteria_y_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:44:25"}',
            ),
            270 => 
            array (
                'id' => '783',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:38',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.12742003367003,"total":9,"eign_value":1.1467803030303,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:45:32"}',
            ),
            271 => 
            array (
                'id' => '784',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:38',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.1819234006734,"total":5.5,"eign_value":1.0005787037037,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:45:32"}',
            ),
            272 => 
            array (
                'id' => '785',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:38',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.20044191919192,"total":5.3333333333333,"eign_value":1.0690235690236,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:45:32"}',
            ),
            273 => 
            array (
                'id' => '786',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:38',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.16340488215488,"total":6,"eign_value":0.98042929292929,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:45:32"}',
            ),
            274 => 
            array (
                'id' => '787',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:38',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.16340488215488,"total":6,"eign_value":0.98042929292929,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:45:32"}',
            ),
            275 => 
            array (
                'id' => '788',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:38',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.16340488215488,"total":6,"eign_value":0.98042929292929,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:45:32"}',
            ),
            276 => 
            array (
                'id' => '789',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:38',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.031534090909091,"ri":1.24,"cr":0.025430718475073,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:45:32"}',
            ),
            277 => 
            array (
                'id' => '790',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:44',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":49,"nilai":1,"kriteria_x_id":13,"kriteria_y_id":9,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:44:36"}',
            ),
            278 => 
            array (
                'id' => '791',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:44',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":54,"nilai":1,"kriteria_x_id":9,"kriteria_y_id":13,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:44:36"}',
            ),
            279 => 
            array (
                'id' => '792',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:44',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.10294913419913,"total":12,"eign_value":1.2353896103896,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:45:38"}',
            ),
            280 => 
            array (
                'id' => '793',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:44',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.1766323953824,"total":5.5,"eign_value":0.97147817460317,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:45:38"}',
            ),
            281 => 
            array (
                'id' => '794',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:44',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.19052128427128,"total":5.3333333333333,"eign_value":1.0161135161135,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:45:38"}',
            ),
            282 => 
            array (
                'id' => '795',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:44',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.20441017316017,"total":5.25,"eign_value":1.0731534090909,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:45:38"}',
            ),
            283 => 
            array (
                'id' => '796',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:44',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.16274350649351,"total":6,"eign_value":0.97646103896104,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:45:38"}',
            ),
            284 => 
            array (
                'id' => '797',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:44',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.16274350649351,"total":6,"eign_value":0.97646103896104,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:45:38"}',
            ),
            285 => 
            array (
                'id' => '798',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:44',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.049811357623857,"ri":1.24,"cr":0.040170449696659,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:45:38"}',
            ),
            286 => 
            array (
                'id' => '799',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:51',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":58,"nilai":1,"kriteria_x_id":14,"kriteria_y_id":9,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:44:55"}',
            ),
            287 => 
            array (
                'id' => '800',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:51',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":64,"nilai":1,"kriteria_x_id":9,"kriteria_y_id":14,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:44:55"}',
            ),
            288 => 
            array (
                'id' => '801',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:51',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.07810939060939,"total":16,"eign_value":1.2497502497502,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:45:44"}',
            ),
            289 => 
            array (
                'id' => '802',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:51',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.17396145521146,"total":5.5,"eign_value":0.956788003663,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:45:44"}',
            ),
            290 => 
            array (
                'id' => '803',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:51',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.18437812187812,"total":5.3333333333333,"eign_value":0.98334998334998,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:45:44"}',
            ),
            291 => 
            array (
                'id' => '804',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:51',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.19479478854479,"total":5.25,"eign_value":1.0226726398601,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:45:44"}',
            ),
            292 => 
            array (
                'id' => '805',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:51',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.20521145521146,"total":5.2,"eign_value":1.0670995670996,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:45:44"}',
            ),
            293 => 
            array (
                'id' => '806',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:51',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.16354478854479,"total":6,"eign_value":0.98126873126873,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:45:44"}',
            ),
            294 => 
            array (
                'id' => '807',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:45:51',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.052185834998335,"ri":1.24,"cr":0.042085350805108,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:45:44"}',
            ),
            295 => 
            array (
                'id' => '808',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:06',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":38,"nilai":1,"kriteria_x_id":11,"kriteria_y_id":10,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:44:02"}',
            ),
            296 => 
            array (
                'id' => '809',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:06',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":41,"nilai":1,"kriteria_x_id":10,"kriteria_y_id":11,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:44:02"}',
            ),
            297 => 
            array (
                'id' => '810',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:06',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.053227798187476,"total":21,"eign_value":1.117783761937,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:45:51"}',
            ),
            298 => 
            array (
                'id' => '811',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:06',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.17348142448949,"total":5.5,"eign_value":0.95414783469219,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:45:51"}',
            ),
            299 => 
            array (
                'id' => '812',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:06',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.181417932426,"total":5.3333333333333,"eign_value":0.96756230627198,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:45:51"}',
            ),
            300 => 
            array (
                'id' => '813',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:06',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.1893544403625,"total":5.25,"eign_value":0.99411081190315,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:45:51"}',
            ),
            301 => 
            array (
                'id' => '814',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:06',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.19729094829901,"total":5.2,"eign_value":1.0259129311549,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:45:51"}',
            ),
            302 => 
            array (
                'id' => '815',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:06',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.20522745623552,"total":5.1666666666667,"eign_value":1.0603418572169,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:45:51"}',
            ),
            303 => 
            array (
                'id' => '816',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:06',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.023971900635207,"ri":1.24,"cr":0.019332177931619,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:45:51"}',
            ),
            304 => 
            array (
                'id' => '817',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:12',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":43,"nilai":1,"kriteria_x_id":12,"kriteria_y_id":10,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:44:25"}',
            ),
            305 => 
            array (
                'id' => '818',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:12',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":47,"nilai":1,"kriteria_x_id":10,"kriteria_y_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:44:25"}',
            ),
            306 => 
            array (
                'id' => '819',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:12',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.05197438206337,"total":21,"eign_value":1.0914620233308,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:46:06"}',
            ),
            307 => 
            array (
                'id' => '820',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:12',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.15481079913783,"total":6.5,"eign_value":1.0062701943959,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:46:06"}',
            ),
            308 => 
            array (
                'id' => '821',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:12',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.20562971202571,"total":4.8333333333333,"eign_value":0.99387694145759,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:46:06"}',
            ),
            309 => 
            array (
                'id' => '822',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:12',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.18792519432119,"total":5.25,"eign_value":0.98660727018625,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:46:06"}',
            ),
            310 => 
            array (
                'id' => '823',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:12',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.1958617022577,"total":5.2,"eign_value":1.01848085174,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:46:06"}',
            ),
            311 => 
            array (
                'id' => '824',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:12',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.20379821019421,"total":5.1666666666667,"eign_value":1.0529574193367,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:46:06"}',
            ),
            312 => 
            array (
                'id' => '825',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:12',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.029930940089449,"ri":1.24,"cr":0.024137854910846,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:46:06"}',
            ),
            313 => 
            array (
                'id' => '826',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:17',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":43,"nilai":2,"kriteria_x_id":12,"kriteria_y_id":10,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:46:12"}',
            ),
            314 => 
            array (
                'id' => '827',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:17',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":47,"nilai":0.5,"kriteria_x_id":10,"kriteria_y_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:46:12"}',
            ),
            315 => 
            array (
                'id' => '828',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:17',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.051100402242022,"total":21,"eign_value":1.0731084470825,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:46:12"}',
            ),
            316 => 
            array (
                'id' => '829',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:17',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.13718982362212,"total":7.5,"eign_value":1.0289236771659,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:46:12"}',
            ),
            317 => 
            array (
                'id' => '830',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:17',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.20213379274031,"total":4.8333333333333,"eign_value":0.97697999824485,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:46:12"}',
            ),
            318 => 
            array (
                'id' => '831',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:17',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.21007030067682,"total":4.75,"eign_value":0.99783392821491,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:46:12"}',
            ),
            319 => 
            array (
                'id' => '832',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:17',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.19578458639111,"total":5.2,"eign_value":1.0180798492338,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:46:12"}',
            ),
            320 => 
            array (
                'id' => '833',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:17',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.20372109432762,"total":5.1666666666667,"eign_value":1.0525589873594,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:46:12"}',
            ),
            321 => 
            array (
                'id' => '834',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:17',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.029496977460241,"ri":1.24,"cr":0.023787885048581,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:46:12"}',
            ),
            322 => 
            array (
                'id' => '835',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:22',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":50,"nilai":1,"kriteria_x_id":13,"kriteria_y_id":10,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:44:36"}',
            ),
            323 => 
            array (
                'id' => '836',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:22',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":55,"nilai":1,"kriteria_x_id":10,"kriteria_y_id":13,"created_at":"2023-05-09 11:44:37","updated_at":"2023-05-09 11:44:37"}',
            ),
            324 => 
            array (
                'id' => '837',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:22',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.050112191965886,"total":21,"eign_value":1.0523560312836,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:46:17"}',
            ),
            325 => 
            array (
                'id' => '838',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:22',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.12915279700924,"total":8.5,"eign_value":1.0977987745785,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:46:17"}',
            ),
            326 => 
            array (
                'id' => '839',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:22',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.19818095163577,"total":4.8333333333333,"eign_value":0.95787459957289,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:46:17"}',
            ),
            327 => 
            array (
                'id' => '840',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:22',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.22572530270953,"total":4.5833333333333,"eign_value":1.0345743040854,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:46:17"}',
            ),
            328 => 
            array (
                'id' => '841',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:22',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.19444612437153,"total":5.2,"eign_value":1.011119846732,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:46:17"}',
            ),
            329 => 
            array (
                'id' => '842',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:22',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.20238263230804,"total":5.1666666666667,"eign_value":1.0456436002582,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:46:17"}',
            ),
            330 => 
            array (
                'id' => '843',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:22',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.03987343130211,"ri":1.24,"cr":0.032155992985572,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:46:17"}',
            ),
            331 => 
            array (
                'id' => '844',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:27',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":59,"nilai":1,"kriteria_x_id":14,"kriteria_y_id":10,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:44:55"}',
            ),
            332 => 
            array (
                'id' => '845',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:27',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":65,"nilai":1,"kriteria_x_id":10,"kriteria_y_id":14,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:44:55"}',
            ),
            333 => 
            array (
                'id' => '846',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:27',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.048635027502716,"total":21,"eign_value":1.021335577557,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:46:22"}',
            ),
            334 => 
            array (
                'id' => '847',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:27',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.10134972132404,"total":11.5,"eign_value":1.1655217952265,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:46:22"}',
            ),
            335 => 
            array (
                'id' => '848',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:27',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.19335267407695,"total":4.8333333333333,"eign_value":0.93453792470528,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:46:22"}',
            ),
            336 => 
            array (
                'id' => '849',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:27',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.21578193563665,"total":4.5833333333333,"eign_value":0.98900053833465,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:46:22"}',
            ),
            337 => 
            array (
                'id' => '850',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:27',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.23821119719635,"total":4.45,"eign_value":1.0600398275237,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:46:22"}',
            ),
            338 => 
            array (
                'id' => '851',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:27',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.20266944426329,"total":5.1666666666667,"eign_value":1.047125462027,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:46:22"}',
            ),
            339 => 
            array (
                'id' => '852',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:27',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.043512225074834,"ri":1.24,"cr":0.035090504092608,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:46:22"}',
            ),
            340 => 
            array (
                'id' => '853',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:36',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":44,"nilai":1,"kriteria_x_id":12,"kriteria_y_id":11,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:44:25"}',
            ),
            341 => 
            array (
                'id' => '854',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:36',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":48,"nilai":1,"kriteria_x_id":11,"kriteria_y_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:44:25"}',
            ),
            342 => 
            array (
                'id' => '855',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:36',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.047749973846338,"total":21,"eign_value":1.0027494507731,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:46:27"}',
            ),
            343 => 
            array (
                'id' => '856',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:36',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.072985179143025,"total":15.5,"eign_value":1.1312702767169,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:46:27"}',
            ),
            344 => 
            array (
                'id' => '857',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:36',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.19178241758983,"total":4.8333333333333,"eign_value":0.92694835168419,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:46:27"}',
            ),
            345 => 
            array (
                'id' => '858',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:36',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.21047161369838,"total":4.5833333333333,"eign_value":0.96466156278426,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:46:27"}',
            ),
            346 => 
            array (
                'id' => '859',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:36',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.22916080980693,"total":4.45,"eign_value":1.0197656036409,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:46:27"}',
            ),
            347 => 
            array (
                'id' => '860',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:36',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.24785000591549,"total":4.3666666666667,"eign_value":1.0822783591643,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:46:27"}',
            ),
            348 => 
            array (
                'id' => '861',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:36',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.025534720952716,"ri":1.24,"cr":0.020592516897352,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:46:27"}',
            ),
            349 => 
            array (
                'id' => '862',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:43',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":51,"nilai":1,"kriteria_x_id":13,"kriteria_y_id":11,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:44:36"}',
            ),
            350 => 
            array (
                'id' => '863',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:43',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":56,"nilai":1,"kriteria_x_id":11,"kriteria_y_id":13,"created_at":"2023-05-09 11:44:37","updated_at":"2023-05-09 11:44:37"}',
            ),
            351 => 
            array (
                'id' => '864',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:43',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.046892703038328,"total":21,"eign_value":0.98474676380489,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:46:36"}',
            ),
            352 => 
            array (
                'id' => '865',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:43',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.071513744174053,"total":15.5,"eign_value":1.1084630346978,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:46:36"}',
            ),
            353 => 
            array (
                'id' => '866',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:43',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.16991561444224,"total":5.8333333333333,"eign_value":0.99117441757974,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:46:36"}',
            ),
            354 => 
            array (
                'id' => '867',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:43',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.23758440238753,"total":4.0833333333333,"eign_value":0.97013630974907,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:46:36"}',
            ),
            355 => 
            array (
                'id' => '868',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:43',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.22770216992465,"total":4.45,"eign_value":1.0132746561647,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:46:36"}',
            ),
            356 => 
            array (
                'id' => '869',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:43',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.2463913660332,"total":4.3666666666667,"eign_value":1.0759089650116,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:46:36"}',
            ),
            357 => 
            array (
                'id' => '870',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:43',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.028740829401572,"ri":1.24,"cr":0.023178088227074,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:46:36"}',
            ),
            358 => 
            array (
                'id' => '871',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:49',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":60,"nilai":1,"kriteria_x_id":14,"kriteria_y_id":11,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:44:55"}',
            ),
            359 => 
            array (
                'id' => '872',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:49',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":66,"nilai":1,"kriteria_x_id":11,"kriteria_y_id":14,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:44:55"}',
            ),
            360 => 
            array (
                'id' => '873',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:49',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.045781028079184,"total":21,"eign_value":0.96140158966286,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:46:43"}',
            ),
            361 => 
            array (
                'id' => '874',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:49',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.06951624773956,"total":15.5,"eign_value":1.0775018399632,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:46:43"}',
            ),
            362 => 
            array (
                'id' => '875',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:49',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.13985188590694,"total":7.8333333333333,"eign_value":1.0955064396043,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:46:43"}',
            ),
            363 => 
            array (
                'id' => '876',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:49',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.22959441664956,"total":4.0833333333333,"eign_value":0.93751053465235,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:46:43"}',
            ),
            364 => 
            array (
                'id' => '877',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:49',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.26956020850279,"total":3.7833333333333,"eign_value":1.0198361221689,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:46:43"}',
            ),
            365 => 
            array (
                'id' => '878',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:49',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.24569621312198,"total":4.3666666666667,"eign_value":1.072873463966,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:46:43"}',
            ),
            366 => 
            array (
                'id' => '879',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:46:49',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.032925998003514,"ri":1.24,"cr":0.026553224196382,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:46:43"}',
            ),
            367 => 
            array (
                'id' => '880',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:04',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":52,"nilai":1,"kriteria_x_id":13,"kriteria_y_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:44:36"}',
            ),
            368 => 
            array (
                'id' => '881',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:04',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":57,"nilai":1,"kriteria_x_id":12,"kriteria_y_id":13,"created_at":"2023-05-09 11:44:37","updated_at":"2023-05-09 11:44:37"}',
            ),
            369 => 
            array (
                'id' => '882',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:04',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.045136203022072,"total":21,"eign_value":0.94786026346351,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:46:49"}',
            ),
            370 => 
            array (
                'id' => '883',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:04',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.068153259635019,"total":15.5,"eign_value":1.0563755243428,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:46:49"}',
            ),
            371 => 
            array (
                'id' => '884',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:04',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.10731270394276,"total":10.833333333333,"eign_value":1.1625542927132,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:46:49"}',
            ),
            372 => 
            array (
                'id' => '885',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:04',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.22572546630688,"total":4.0833333333333,"eign_value":0.9217123207531,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:46:49"}',
            ),
            373 => 
            array (
                'id' => '886',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:04',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.25979927780005,"total":3.7833333333333,"eign_value":0.98290726767685,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:46:49"}',
            ),
            374 => 
            array (
                'id' => '887',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:04',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.29387308929322,"total":3.6166666666667,"eign_value":1.0628410062771,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:46:49"}',
            ),
            375 => 
            array (
                'id' => '888',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:04',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.026850135045327,"ri":1.24,"cr":0.021653334713974,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:46:49"}',
            ),
            376 => 
            array (
                'id' => '889',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:14',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":61,"nilai":1,"kriteria_x_id":14,"kriteria_y_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:44:55"}',
            ),
            377 => 
            array (
                'id' => '890',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:14',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":67,"nilai":1,"kriteria_x_id":12,"kriteria_y_id":14,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:44:55"}',
            ),
            378 => 
            array (
                'id' => '891',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:14',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.044470554277629,"total":21,"eign_value":0.9338816398302,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:47:04"}',
            ),
            379 => 
            array (
                'id' => '892',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:14',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.067153918677701,"total":15.5,"eign_value":1.0408857395044,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:47:04"}',
            ),
            380 => 
            array (
                'id' => '893',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:14',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.10553416926163,"total":10.833333333333,"eign_value":1.1432868336677,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:47:04"}',
            ),
            381 => 
            array (
                'id' => '894',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:14',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.19902387224595,"total":5.0833333333333,"eign_value":1.0117046839169,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:47:04"}',
            ),
            382 => 
            array (
                'id' => '895',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:14',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.29126527964491,"total":3.2833333333333,"eign_value":0.9563210015008,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:47:04"}',
            ),
            383 => 
            array (
                'id' => '896',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:14',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.29255220589218,"total":3.6166666666667,"eign_value":1.05806381131,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:47:04"}',
            ),
            384 => 
            array (
                'id' => '897',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:14',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.028828741945995,"ri":1.24,"cr":0.023248985440318,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:47:04"}',
            ),
            385 => 
            array (
                'id' => '898',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:23',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":62,"nilai":1,"kriteria_x_id":14,"kriteria_y_id":13,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:44:55"}',
            ),
            386 => 
            array (
                'id' => '899',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:23',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":68,"nilai":1,"kriteria_x_id":13,"kriteria_y_id":14,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:44:55"}',
            ),
            387 => 
            array (
                'id' => '900',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:23',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":9,"nama":"Anggota Biasa","kode":"C1","prioritas":0.043891890212744,"total":21,"eign_value":0.92172969446763,"kriteria_id":12,"created_at":"2023-05-09 11:43:28","updated_at":"2023-05-09 11:47:14"}',
            ),
            388 => 
            array (
                'id' => '901',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:23',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Pernah jadi sekertaris bidang","kode":"C2","prioritas":0.066150939350466,"total":15.5,"eign_value":1.0253395599322,"kriteria_id":12,"created_at":"2023-05-09 11:43:40","updated_at":"2023-05-09 11:47:14"}',
            ),
            389 => 
            array (
                'id' => '902',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:23',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Pernah jadi ketua bidang","kode":"C3","prioritas":0.10350898897915,"total":10.833333333333,"eign_value":1.1213473806075,"kriteria_id":12,"created_at":"2023-05-09 11:44:02","updated_at":"2023-05-09 11:47:14"}',
            ),
            390 => 
            array (
                'id' => '903',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:23',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pernah jadi bendahara umum","kode":"C4","prioritas":0.16251584116974,"total":7.0833333333333,"eign_value":1.1511538749523,"kriteria_id":12,"created_at":"2023-05-09 11:44:25","updated_at":"2023-05-09 11:47:14"}',
            ),
            391 => 
            array (
                'id' => '904',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:23',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Pernah jadi sekertaris umum","kode":"C5","prioritas":0.28316455851501,"total":3.2833333333333,"eign_value":0.92972363379095,"kriteria_id":12,"created_at":"2023-05-09 11:44:36","updated_at":"2023-05-09 11:47:14"}',
            ),
            392 => 
            array (
                'id' => '905',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:23',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Pernah jadi ketua umum","kode":"C6","prioritas":0.34076778177288,"total":2.95,"eign_value":1.00526495623,"kriteria_id":12,"created_at":"2023-05-09 11:44:55","updated_at":"2023-05-09 11:47:14"}',
            ),
            393 => 
            array (
                'id' => '906',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:23',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.030911819996133,"ri":1.24,"cr":0.024928887093655,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:47:14"}',
            ),
            394 => 
            array (
                'id' => '907',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:55',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"13","nama":"2018","kode":"C1","updated_at":"2023-05-09T04:47:55.000000Z","created_at":"2023-05-09T04:47:55.000000Z","id":15}',
            ),
            395 => 
            array (
                'id' => '908',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:55',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":15,"kriteria_y_id":15,"nilai":1,"updated_at":"2023-05-09T04:47:55.000000Z","created_at":"2023-05-09T04:47:55.000000Z","id":69}',
            ),
            396 => 
            array (
                'id' => '909',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:47:55',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":15,"nama":"2018","kode":"C1","prioritas":0,"total":0,"eign_value":0,"kriteria_id":13,"created_at":"2023-05-09 11:47:55","updated_at":"2023-05-09 11:47:55"}',
            ),
            397 => 
            array (
                'id' => '910',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:00',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'delete',
                'data' => '{"id":15,"nama":"2018","kode":"C1","prioritas":1,"total":1,"eign_value":1,"kriteria_id":13,"created_at":"2023-05-09 11:47:55","updated_at":"2023-05-09 11:47:55"}',
            ),
            398 => 
            array (
                'id' => '911',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:11',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"13","nama":"2018","kode":"C1","updated_at":"2023-05-09T04:48:11.000000Z","created_at":"2023-05-09T04:48:11.000000Z","id":16}',
            ),
            399 => 
            array (
                'id' => '912',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:11',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":16,"kriteria_y_id":16,"nilai":1,"updated_at":"2023-05-09T04:48:11.000000Z","created_at":"2023-05-09T04:48:11.000000Z","id":70}',
            ),
            400 => 
            array (
                'id' => '913',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:11',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":16,"nama":"2018","kode":"C1","prioritas":0,"total":0,"eign_value":0,"kriteria_id":13,"created_at":"2023-05-09 11:48:11","updated_at":"2023-05-09 11:48:11"}',
            ),
            401 => 
            array (
                'id' => '914',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:19',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"13","nama":"2019","kode":"C2","updated_at":"2023-05-09T04:48:19.000000Z","created_at":"2023-05-09T04:48:19.000000Z","id":17}',
            ),
            402 => 
            array (
                'id' => '915',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:19',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":17,"kriteria_y_id":16,"nilai":1,"updated_at":"2023-05-09T04:48:19.000000Z","created_at":"2023-05-09T04:48:19.000000Z","id":71}',
            ),
            403 => 
            array (
                'id' => '916',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:19',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":17,"kriteria_y_id":17,"nilai":1,"updated_at":"2023-05-09T04:48:19.000000Z","created_at":"2023-05-09T04:48:19.000000Z","id":72}',
            ),
            404 => 
            array (
                'id' => '917',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:19',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":16,"kriteria_y_id":17,"nilai":1,"updated_at":"2023-05-09T04:48:19.000000Z","created_at":"2023-05-09T04:48:19.000000Z","id":73}',
            ),
            405 => 
            array (
                'id' => '918',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:19',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":16,"nama":"2018","kode":"C1","prioritas":1,"total":1,"eign_value":1,"kriteria_id":13,"created_at":"2023-05-09 11:48:11","updated_at":"2023-05-09 11:48:11"}',
            ),
            406 => 
            array (
                'id' => '919',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:19',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":17,"nama":"2019","kode":"C2","prioritas":0,"total":0,"eign_value":0,"kriteria_id":13,"created_at":"2023-05-09 11:48:19","updated_at":"2023-05-09 11:48:19"}',
            ),
            407 => 
            array (
                'id' => '920',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:30',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"13","nama":"2020","kode":"C3","updated_at":"2023-05-09T04:48:30.000000Z","created_at":"2023-05-09T04:48:30.000000Z","id":18}',
            ),
            408 => 
            array (
                'id' => '921',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:30',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":18,"kriteria_y_id":16,"nilai":1,"updated_at":"2023-05-09T04:48:30.000000Z","created_at":"2023-05-09T04:48:30.000000Z","id":74}',
            ),
            409 => 
            array (
                'id' => '922',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:30',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":18,"kriteria_y_id":17,"nilai":1,"updated_at":"2023-05-09T04:48:30.000000Z","created_at":"2023-05-09T04:48:30.000000Z","id":75}',
            ),
            410 => 
            array (
                'id' => '923',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:30',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":18,"kriteria_y_id":18,"nilai":1,"updated_at":"2023-05-09T04:48:30.000000Z","created_at":"2023-05-09T04:48:30.000000Z","id":76}',
            ),
            411 => 
            array (
                'id' => '924',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:30',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":16,"kriteria_y_id":18,"nilai":1,"updated_at":"2023-05-09T04:48:30.000000Z","created_at":"2023-05-09T04:48:30.000000Z","id":77}',
            ),
            412 => 
            array (
                'id' => '925',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:30',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":17,"kriteria_y_id":18,"nilai":1,"updated_at":"2023-05-09T04:48:30.000000Z","created_at":"2023-05-09T04:48:30.000000Z","id":78}',
            ),
            413 => 
            array (
                'id' => '926',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:30',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":16,"nama":"2018","kode":"C1","prioritas":0.5,"total":2,"eign_value":1,"kriteria_id":13,"created_at":"2023-05-09 11:48:11","updated_at":"2023-05-09 11:48:19"}',
            ),
            414 => 
            array (
                'id' => '927',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:30',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":17,"nama":"2019","kode":"C2","prioritas":0.5,"total":2,"eign_value":1,"kriteria_id":13,"created_at":"2023-05-09 11:48:19","updated_at":"2023-05-09 11:48:19"}',
            ),
            415 => 
            array (
                'id' => '928',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:30',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":18,"nama":"2020","kode":"C3","prioritas":0,"total":0,"eign_value":0,"kriteria_id":13,"created_at":"2023-05-09 11:48:30","updated_at":"2023-05-09 11:48:30"}',
            ),
            416 => 
            array (
                'id' => '929',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:30',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Tahun Masuk","slug":"tahun-masuk","kode":"C4","ci":0,"ri":0,"cr":0,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:38","updated_at":"2023-05-09 01:33:54"}',
            ),
            417 => 
            array (
                'id' => '930',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:53',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":73,"nilai":1,"kriteria_x_id":16,"kriteria_y_id":17,"created_at":"2023-05-09 11:48:19","updated_at":"2023-05-09 11:48:19"}',
            ),
            418 => 
            array (
                'id' => '931',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:53',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":71,"nilai":1,"kriteria_x_id":17,"kriteria_y_id":16,"created_at":"2023-05-09 11:48:19","updated_at":"2023-05-09 11:48:19"}',
            ),
            419 => 
            array (
                'id' => '932',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:53',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":16,"nama":"2018","kode":"C1","prioritas":0.33333333333333,"total":3,"eign_value":1,"kriteria_id":13,"created_at":"2023-05-09 11:48:11","updated_at":"2023-05-09 11:48:30"}',
            ),
            420 => 
            array (
                'id' => '933',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:53',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":17,"nama":"2019","kode":"C2","prioritas":0.33333333333333,"total":3,"eign_value":1,"kriteria_id":13,"created_at":"2023-05-09 11:48:19","updated_at":"2023-05-09 11:48:30"}',
            ),
            421 => 
            array (
                'id' => '934',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:53',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":18,"nama":"2020","kode":"C3","prioritas":0.33333333333333,"total":3,"eign_value":1,"kriteria_id":13,"created_at":"2023-05-09 11:48:30","updated_at":"2023-05-09 11:48:30"}',
            ),
            422 => 
            array (
                'id' => '935',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:48:53',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Tahun Masuk","slug":"tahun-masuk","kode":"C4","ci":0,"ri":0.58,"cr":0,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:38","updated_at":"2023-05-09 11:48:30"}',
            ),
            423 => 
            array (
                'id' => '936',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:01',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":77,"nilai":1,"kriteria_x_id":16,"kriteria_y_id":18,"created_at":"2023-05-09 11:48:30","updated_at":"2023-05-09 11:48:30"}',
            ),
            424 => 
            array (
                'id' => '937',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:01',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":74,"nilai":1,"kriteria_x_id":18,"kriteria_y_id":16,"created_at":"2023-05-09 11:48:30","updated_at":"2023-05-09 11:48:30"}',
            ),
            425 => 
            array (
                'id' => '938',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:01',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":16,"nama":"2018","kode":"C1","prioritas":0.41111111111111,"total":2.5,"eign_value":1.0277777777778,"kriteria_id":13,"created_at":"2023-05-09 11:48:11","updated_at":"2023-05-09 11:48:53"}',
            ),
            426 => 
            array (
                'id' => '939',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:01',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":17,"nama":"2019","kode":"C2","prioritas":0.26111111111111,"total":4,"eign_value":1.0444444444444,"kriteria_id":13,"created_at":"2023-05-09 11:48:19","updated_at":"2023-05-09 11:48:53"}',
            ),
            427 => 
            array (
                'id' => '940',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:01',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":18,"nama":"2020","kode":"C3","prioritas":0.32777777777778,"total":3,"eign_value":0.98333333333333,"kriteria_id":13,"created_at":"2023-05-09 11:48:30","updated_at":"2023-05-09 11:48:53"}',
            ),
            428 => 
            array (
                'id' => '941',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:01',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Tahun Masuk","slug":"tahun-masuk","kode":"C4","ci":0.027777777777778,"ri":0.58,"cr":0.047892720306514,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:38","updated_at":"2023-05-09 11:48:53"}',
            ),
            429 => 
            array (
                'id' => '942',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:07',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":78,"nilai":1,"kriteria_x_id":17,"kriteria_y_id":18,"created_at":"2023-05-09 11:48:30","updated_at":"2023-05-09 11:48:30"}',
            ),
            430 => 
            array (
                'id' => '943',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:07',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":75,"nilai":1,"kriteria_x_id":18,"kriteria_y_id":17,"created_at":"2023-05-09 11:48:30","updated_at":"2023-05-09 11:48:30"}',
            ),
            431 => 
            array (
                'id' => '944',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:07',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":16,"nama":"2018","kode":"C1","prioritas":0.54848484848485,"total":1.8333333333333,"eign_value":1.0055555555556,"kriteria_id":13,"created_at":"2023-05-09 11:48:11","updated_at":"2023-05-09 11:49:01"}',
            ),
            432 => 
            array (
                'id' => '945',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:07',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":17,"nama":"2019","kode":"C2","prioritas":0.24090909090909,"total":4,"eign_value":0.96363636363636,"kriteria_id":13,"created_at":"2023-05-09 11:48:19","updated_at":"2023-05-09 11:49:01"}',
            ),
            433 => 
            array (
                'id' => '946',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:07',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":18,"nama":"2020","kode":"C3","prioritas":0.21060606060606,"total":5,"eign_value":1.0530303030303,"kriteria_id":13,"created_at":"2023-05-09 11:48:30","updated_at":"2023-05-09 11:49:01"}',
            ),
            434 => 
            array (
                'id' => '947',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:07',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Tahun Masuk","slug":"tahun-masuk","kode":"C4","ci":0.01111111111111,"ri":0.58,"cr":0.019157088122603,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:38","updated_at":"2023-05-09 11:49:01"}',
            ),
            435 => 
            array (
                'id' => '948',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:48',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"14","nama":"Kurang","kode":"C1","updated_at":"2023-05-09T04:49:48.000000Z","created_at":"2023-05-09T04:49:48.000000Z","id":19}',
            ),
            436 => 
            array (
                'id' => '949',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:48',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":19,"kriteria_y_id":19,"nilai":1,"updated_at":"2023-05-09T04:49:48.000000Z","created_at":"2023-05-09T04:49:48.000000Z","id":79}',
            ),
            437 => 
            array (
                'id' => '950',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:48',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":19,"nama":"Kurang","kode":"C1","prioritas":0,"total":0,"eign_value":0,"kriteria_id":14,"created_at":"2023-05-09 11:49:48","updated_at":"2023-05-09 11:49:48"}',
            ),
            438 => 
            array (
                'id' => '951',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:57',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"14","nama":"Baik","kode":"C2","updated_at":"2023-05-09T04:49:57.000000Z","created_at":"2023-05-09T04:49:57.000000Z","id":20}',
            ),
            439 => 
            array (
                'id' => '952',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:57',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":20,"kriteria_y_id":19,"nilai":1,"updated_at":"2023-05-09T04:49:57.000000Z","created_at":"2023-05-09T04:49:57.000000Z","id":80}',
            ),
            440 => 
            array (
                'id' => '953',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:57',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":20,"kriteria_y_id":20,"nilai":1,"updated_at":"2023-05-09T04:49:57.000000Z","created_at":"2023-05-09T04:49:57.000000Z","id":81}',
            ),
            441 => 
            array (
                'id' => '954',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:57',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":19,"kriteria_y_id":20,"nilai":1,"updated_at":"2023-05-09T04:49:57.000000Z","created_at":"2023-05-09T04:49:57.000000Z","id":82}',
            ),
            442 => 
            array (
                'id' => '955',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:57',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":19,"nama":"Kurang","kode":"C1","prioritas":1,"total":1,"eign_value":1,"kriteria_id":14,"created_at":"2023-05-09 11:49:48","updated_at":"2023-05-09 11:49:48"}',
            ),
            443 => 
            array (
                'id' => '956',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:49:57',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":20,"nama":"Baik","kode":"C2","prioritas":0,"total":0,"eign_value":0,"kriteria_id":14,"created_at":"2023-05-09 11:49:57","updated_at":"2023-05-09 11:49:57"}',
            ),
            444 => 
            array (
                'id' => '957',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:04',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'create',
                'data' => '{"kriteria_id":"14","nama":"Sangat Baik","kode":"C3","updated_at":"2023-05-09T04:50:04.000000Z","created_at":"2023-05-09T04:50:04.000000Z","id":21}',
            ),
            445 => 
            array (
                'id' => '958',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:04',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":21,"kriteria_y_id":19,"nilai":1,"updated_at":"2023-05-09T04:50:04.000000Z","created_at":"2023-05-09T04:50:04.000000Z","id":83}',
            ),
            446 => 
            array (
                'id' => '959',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:04',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":21,"kriteria_y_id":20,"nilai":1,"updated_at":"2023-05-09T04:50:04.000000Z","created_at":"2023-05-09T04:50:04.000000Z","id":84}',
            ),
            447 => 
            array (
                'id' => '960',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:04',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":21,"kriteria_y_id":21,"nilai":1,"updated_at":"2023-05-09T04:50:04.000000Z","created_at":"2023-05-09T04:50:04.000000Z","id":85}',
            ),
            448 => 
            array (
                'id' => '961',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:04',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":19,"kriteria_y_id":21,"nilai":1,"updated_at":"2023-05-09T04:50:04.000000Z","created_at":"2023-05-09T04:50:04.000000Z","id":86}',
            ),
            449 => 
            array (
                'id' => '962',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:04',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":20,"kriteria_y_id":21,"nilai":1,"updated_at":"2023-05-09T04:50:04.000000Z","created_at":"2023-05-09T04:50:04.000000Z","id":87}',
            ),
            450 => 
            array (
                'id' => '963',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:04',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":19,"nama":"Kurang","kode":"C1","prioritas":0.5,"total":2,"eign_value":1,"kriteria_id":14,"created_at":"2023-05-09 11:49:48","updated_at":"2023-05-09 11:49:57"}',
            ),
            451 => 
            array (
                'id' => '964',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:04',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":20,"nama":"Baik","kode":"C2","prioritas":0.5,"total":2,"eign_value":1,"kriteria_id":14,"created_at":"2023-05-09 11:49:57","updated_at":"2023-05-09 11:49:57"}',
            ),
            452 => 
            array (
                'id' => '965',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:04',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":21,"nama":"Sangat Baik","kode":"C3","prioritas":0,"total":0,"eign_value":0,"kriteria_id":14,"created_at":"2023-05-09 11:50:04","updated_at":"2023-05-09 11:50:04"}',
            ),
            453 => 
            array (
                'id' => '966',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:04',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Wawasan Ke organisasian","slug":"wawasan-ke-organisasian","kode":"C5","ci":0,"ri":0,"cr":0,"prioritas":0.19833333333333,"total":5,"eign_value":0.99166666666667,"created_at":"2023-05-08 20:06:50","updated_at":"2023-05-09 01:33:54"}',
            ),
            454 => 
            array (
                'id' => '967',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:15',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":80,"nilai":1,"kriteria_x_id":20,"kriteria_y_id":19,"created_at":"2023-05-09 11:49:57","updated_at":"2023-05-09 11:49:57"}',
            ),
            455 => 
            array (
                'id' => '968',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:15',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":82,"nilai":1,"kriteria_x_id":19,"kriteria_y_id":20,"created_at":"2023-05-09 11:49:57","updated_at":"2023-05-09 11:49:57"}',
            ),
            456 => 
            array (
                'id' => '969',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:15',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":19,"nama":"Kurang","kode":"C1","prioritas":0.33333333333333,"total":3,"eign_value":1,"kriteria_id":14,"created_at":"2023-05-09 11:49:48","updated_at":"2023-05-09 11:50:04"}',
            ),
            457 => 
            array (
                'id' => '970',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:15',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":20,"nama":"Baik","kode":"C2","prioritas":0.33333333333333,"total":3,"eign_value":1,"kriteria_id":14,"created_at":"2023-05-09 11:49:57","updated_at":"2023-05-09 11:50:04"}',
            ),
            458 => 
            array (
                'id' => '971',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:15',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":21,"nama":"Sangat Baik","kode":"C3","prioritas":0.33333333333333,"total":3,"eign_value":1,"kriteria_id":14,"created_at":"2023-05-09 11:50:04","updated_at":"2023-05-09 11:50:04"}',
            ),
            459 => 
            array (
                'id' => '972',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:15',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Wawasan Ke organisasian","slug":"wawasan-ke-organisasian","kode":"C5","ci":0,"ri":0.58,"cr":0,"prioritas":0.19833333333333,"total":5,"eign_value":0.99166666666667,"created_at":"2023-05-08 20:06:50","updated_at":"2023-05-09 11:50:04"}',
            ),
            460 => 
            array (
                'id' => '973',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:20',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":83,"nilai":1,"kriteria_x_id":21,"kriteria_y_id":19,"created_at":"2023-05-09 11:50:04","updated_at":"2023-05-09 11:50:04"}',
            ),
            461 => 
            array (
                'id' => '974',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:20',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":86,"nilai":1,"kriteria_x_id":19,"kriteria_y_id":21,"created_at":"2023-05-09 11:50:04","updated_at":"2023-05-09 11:50:04"}',
            ),
            462 => 
            array (
                'id' => '975',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:20',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":19,"nama":"Kurang","kode":"C1","prioritas":0.26111111111111,"total":4,"eign_value":1.0444444444444,"kriteria_id":14,"created_at":"2023-05-09 11:49:48","updated_at":"2023-05-09 11:50:15"}',
            ),
            463 => 
            array (
                'id' => '976',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:20',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":20,"nama":"Baik","kode":"C2","prioritas":0.41111111111111,"total":2.5,"eign_value":1.0277777777778,"kriteria_id":14,"created_at":"2023-05-09 11:49:57","updated_at":"2023-05-09 11:50:15"}',
            ),
            464 => 
            array (
                'id' => '977',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:20',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":21,"nama":"Sangat Baik","kode":"C3","prioritas":0.32777777777778,"total":3,"eign_value":0.98333333333333,"kriteria_id":14,"created_at":"2023-05-09 11:50:04","updated_at":"2023-05-09 11:50:15"}',
            ),
            465 => 
            array (
                'id' => '978',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:20',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Wawasan Ke organisasian","slug":"wawasan-ke-organisasian","kode":"C5","ci":0.027777777777778,"ri":0.58,"cr":0.047892720306514,"prioritas":0.19833333333333,"total":5,"eign_value":0.99166666666667,"created_at":"2023-05-08 20:06:50","updated_at":"2023-05-09 11:50:15"}',
            ),
            466 => 
            array (
                'id' => '979',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:35',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":84,"nilai":1,"kriteria_x_id":21,"kriteria_y_id":20,"created_at":"2023-05-09 11:50:04","updated_at":"2023-05-09 11:50:04"}',
            ),
            467 => 
            array (
                'id' => '980',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:35',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":87,"nilai":1,"kriteria_x_id":20,"kriteria_y_id":21,"created_at":"2023-05-09 11:50:04","updated_at":"2023-05-09 11:50:04"}',
            ),
            468 => 
            array (
                'id' => '981',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:35',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":19,"nama":"Kurang","kode":"C1","prioritas":0.16984126984127,"total":6,"eign_value":1.0190476190476,"kriteria_id":14,"created_at":"2023-05-09 11:49:48","updated_at":"2023-05-09 11:50:20"}',
            ),
            469 => 
            array (
                'id' => '982',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:35',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":20,"nama":"Baik","kode":"C2","prioritas":0.38730158730159,"total":2.5,"eign_value":0.96825396825397,"kriteria_id":14,"created_at":"2023-05-09 11:49:57","updated_at":"2023-05-09 11:50:20"}',
            ),
            470 => 
            array (
                'id' => '983',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:35',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":21,"nama":"Sangat Baik","kode":"C3","prioritas":0.44285714285714,"total":2.3333333333333,"eign_value":1.0333333333333,"kriteria_id":14,"created_at":"2023-05-09 11:50:04","updated_at":"2023-05-09 11:50:20"}',
            ),
            471 => 
            array (
                'id' => '984',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:35',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Wawasan Ke organisasian","slug":"wawasan-ke-organisasian","kode":"C5","ci":0.010317460317459,"ri":0.58,"cr":0.017788724685274,"prioritas":0.19833333333333,"total":5,"eign_value":0.99166666666667,"created_at":"2023-05-08 20:06:50","updated_at":"2023-05-09 11:50:20"}',
            ),
            472 => 
            array (
                'id' => '985',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:40',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":84,"nilai":3,"kriteria_x_id":21,"kriteria_y_id":20,"created_at":"2023-05-09 11:50:04","updated_at":"2023-05-09 11:50:35"}',
            ),
            473 => 
            array (
                'id' => '986',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:40',
                'table_name' => 'spk_ahp_kriteria_jenis_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":87,"nilai":0.33333333333333,"kriteria_x_id":20,"kriteria_y_id":21,"created_at":"2023-05-09 11:50:04","updated_at":"2023-05-09 11:50:35"}',
            ),
            474 => 
            array (
                'id' => '987',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:40',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":19,"nama":"Kurang","kode":"C1","prioritas":0.15925925925926,"total":6,"eign_value":0.95555555555555,"kriteria_id":14,"created_at":"2023-05-09 11:49:48","updated_at":"2023-05-09 11:50:35"}',
            ),
            475 => 
            array (
                'id' => '988',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:40',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":20,"nama":"Baik","kode":"C2","prioritas":0.25185185185185,"total":4.5,"eign_value":1.1333333333333,"kriteria_id":14,"created_at":"2023-05-09 11:49:57","updated_at":"2023-05-09 11:50:35"}',
            ),
            476 => 
            array (
                'id' => '989',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:40',
                'table_name' => 'spk_ahp_kriteria_jenis',
                'log_type' => 'edit',
                'data' => '{"id":21,"nama":"Sangat Baik","kode":"C3","prioritas":0.58888888888889,"total":1.6666666666667,"eign_value":0.98148148148148,"kriteria_id":14,"created_at":"2023-05-09 11:50:04","updated_at":"2023-05-09 11:50:35"}',
            ),
            477 => 
            array (
                'id' => '990',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:50:40',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Wawasan Ke organisasian","slug":"wawasan-ke-organisasian","kode":"C5","ci":0.035185185185182,"ri":0.58,"cr":0.060664112388245,"prioritas":0.19833333333333,"total":5,"eign_value":0.99166666666667,"created_at":"2023-05-08 20:06:50","updated_at":"2023-05-09 11:50:35"}',
            ),
            478 => 
            array (
                'id' => '991',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:00',
                'table_name' => 'p_menu',
                'log_type' => 'create',
                'data' => '{"sequence":"54","parent_id":null,"active":"1","title":"Seleksi Calon Ketua Umum","icon":"fas fa-stream","route":"admin.spk.ahp.kriteria","type":"1","updated_at":"2023-05-09T04:53:00.000000Z","created_at":"2023-05-09T04:53:00.000000Z","id":413}',
            ),
            479 => 
            array (
                'id' => '992',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:00',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":413,"updated_at":"2023-05-09T04:53:00.000000Z","created_at":"2023-05-09T04:53:00.000000Z","id":1238}',
            ),
            480 => 
            array (
                'id' => '993',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":413,"parent_id":null,"title":"Seleksi Calon Ketua Umum","icon":"fas fa-stream","route":"admin.spk.ahp.kriteria","sequence":54,"active":1,"type":1,"created_at":"2023-05-09 11:53:00","updated_at":"2023-05-09 11:53:00"}',
            ),
            481 => 
            array (
                'id' => '994',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":355,"parent_id":null,"title":"Data Alamat Profil","icon":"fas fa-map-marker-alt","route":null,"sequence":26,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-03-08 12:49:19"}',
            ),
            482 => 
            array (
                'id' => '995',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":356,"parent_id":355,"title":"Provinsi","icon":null,"route":"admin.address.province","sequence":27,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-03-08 12:49:19"}',
            ),
            483 => 
            array (
                'id' => '996',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":357,"parent_id":355,"title":"Kabupaten\\/Kota","icon":null,"route":"admin.address.regencie","sequence":28,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-03-08 12:49:19"}',
            ),
            484 => 
            array (
                'id' => '997',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":358,"parent_id":355,"title":"Kecamatan","icon":null,"route":"admin.address.district","sequence":29,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-03-08 12:49:19"}',
            ),
            485 => 
            array (
                'id' => '998',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":359,"parent_id":355,"title":"Desa\\/Keluarahan","icon":null,"route":"admin.address.village","sequence":30,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-03-08 12:49:19"}',
            ),
            486 => 
            array (
                'id' => '999',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":367,"parent_id":null,"title":"Akses Pengguna","icon":"fas fa-user-check","route":null,"sequence":31,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-03-08 13:56:36"}',
            ),
            487 => 
            array (
                'id' => '1000',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":368,"parent_id":367,"title":"Perizinan","icon":null,"route":"admin.user_access.permission","sequence":32,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-05-04 20:22:00"}',
            ),
            488 => 
            array (
                'id' => '1001',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":369,"parent_id":367,"title":"Sebagai","icon":null,"route":"admin.user_access.role","sequence":33,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-05-04 20:22:12"}',
            ),
            489 => 
            array (
                'id' => '1002',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":361,"parent_id":null,"title":"Menu Management","icon":"fas fa-stream","route":null,"sequence":34,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-03-08 12:49:19"}',
            ),
            490 => 
            array (
                'id' => '1003',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":405,"parent_id":361,"title":"Admin","icon":null,"route":"admin.menu.admin","sequence":35,"active":1,"type":1,"created_at":"2022-08-20 14:12:45","updated_at":"2023-03-08 12:49:19"}',
            ),
            491 => 
            array (
                'id' => '1004',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":406,"parent_id":361,"title":"Depan","icon":null,"route":"admin.menu.frontend","sequence":36,"active":1,"type":1,"created_at":"2022-08-20 14:16:07","updated_at":"2023-03-08 12:49:19"}',
            ),
            492 => 
            array (
                'id' => '1005',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":393,"parent_id":null,"title":"Utility","icon":"fas fa-tools","route":null,"sequence":37,"active":1,"type":1,"created_at":"2022-08-08 22:41:26","updated_at":"2022-09-01 18:25:56"}',
            ),
            493 => 
            array (
                'id' => '1006',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":402,"parent_id":393,"title":"Notifikasi Admin Atas","icon":null,"route":"admin.utility.notif_admin_atas","sequence":38,"active":1,"type":1,"created_at":"2022-08-18 16:42:00","updated_at":"2022-09-01 18:25:56"}',
            ),
            494 => 
            array (
                'id' => '1007',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":394,"parent_id":393,"title":"Notifikasi Depan Atas","icon":null,"route":"admin.utility.notif_depan_atas","sequence":39,"active":1,"type":1,"created_at":"2022-08-08 22:41:53","updated_at":"2022-09-01 18:25:56"}',
            ),
            495 => 
            array (
                'id' => '1008',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":401,"parent_id":393,"title":"Hari Besar Nasional","icon":null,"route":"admin.utility.hari_besar_nasional","sequence":40,"active":1,"type":1,"created_at":"2022-08-17 21:19:05","updated_at":"2022-09-01 18:25:56"}',
            ),
            496 => 
            array (
                'id' => '1009',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":397,"parent_id":null,"title":"Setting Halaman","icon":"fas fa-wrench","route":null,"sequence":41,"active":1,"type":1,"created_at":"2022-08-14 21:10:57","updated_at":"2022-09-01 18:28:59"}',
            ),
            497 => 
            array (
                'id' => '1010',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":398,"parent_id":397,"title":"Halaman Admin","icon":null,"route":"admin.setting.admin","sequence":42,"active":1,"type":1,"created_at":"2022-08-14 21:11:42","updated_at":"2023-02-19 22:20:30"}',
            ),
            498 => 
            array (
                'id' => '1011',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":399,"parent_id":397,"title":"Halaman Depan","icon":null,"route":"admin.setting.front","sequence":43,"active":1,"type":1,"created_at":"2022-08-14 21:52:45","updated_at":"2023-02-19 22:20:40"}',
            ),
            499 => 
            array (
                'id' => '1012',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":400,"parent_id":397,"title":"Halaman Utama","icon":null,"route":"admin.setting.home","sequence":44,"active":1,"type":1,"created_at":"2022-08-16 14:55:41","updated_at":"2023-02-19 22:20:12"}',
            ),
        ));
        \DB::table('logs')->insert(array (
            0 => 
            array (
                'id' => '1013',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":412,"parent_id":397,"title":"Halaman Sejarah","icon":null,"route":"admin.setting.sejarah","sequence":45,"active":1,"type":1,"created_at":"2023-02-19 10:02:10","updated_at":"2023-02-19 22:20:49"}',
            ),
            1 => 
            array (
                'id' => '1014',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":395,"parent_id":null,"title":"Daftar Kata Alumni","icon":"fas fa-user-edit","route":"admin.kata_alumni","sequence":46,"active":1,"type":1,"created_at":"2022-08-09 15:20:36","updated_at":"2023-02-20 08:07:19"}',
            ),
            2 => 
            array (
                'id' => '1015',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":403,"parent_id":null,"title":"Laporan","icon":"fas fa-book","route":null,"sequence":47,"active":0,"type":1,"created_at":"2022-08-18 18:54:07","updated_at":"2023-04-20 05:51:30"}',
            ),
            3 => 
            array (
                'id' => '1016',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":404,"parent_id":403,"title":"Anggota","icon":null,"route":"admin.lapooran.anggota","sequence":48,"active":1,"type":1,"created_at":"2022-08-18 18:55:08","updated_at":"2023-02-19 20:36:03"}',
            ),
            4 => 
            array (
                'id' => '1017',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":370,"parent_id":null,"title":"Anggota","icon":null,"route":null,"sequence":49,"active":1,"type":0,"created_at":"2022-08-05 23:50:28","updated_at":"2023-02-19 20:36:03"}',
            ),
            5 => 
            array (
                'id' => '1018',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":372,"parent_id":null,"title":"Profile","icon":"fas fa-user","route":"member.profile","sequence":50,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-02-19 20:36:03"}',
            ),
            6 => 
            array (
                'id' => '1019',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":389,"parent_id":null,"title":"Alumni Menu","icon":null,"route":null,"sequence":51,"active":1,"type":0,"created_at":"2022-08-06 14:06:05","updated_at":"2023-02-19 20:36:03"}',
            ),
            7 => 
            array (
                'id' => '1020',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":396,"parent_id":null,"title":"Kata Alumni","icon":"fas fa-user-edit","route":"member.kata_alumni","sequence":52,"active":1,"type":1,"created_at":"2022-08-09 15:23:52","updated_at":"2023-02-19 20:36:03"}',
            ),
            8 => 
            array (
                'id' => '1021',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":373,"parent_id":null,"title":"Ganti Password","icon":"fas fa-key","route":"member.password","sequence":53,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-02-19 20:36:03"}',
            ),
            9 => 
            array (
                'id' => '1022',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":386,"parent_id":null,"title":"Logout","icon":"fas fa-sign-out-alt","route":"logout","sequence":54,"active":1,"type":1,"created_at":"2022-08-05 23:54:09","updated_at":"2023-02-19 20:36:03"}',
            ),
            10 => 
            array (
                'id' => '1023',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:51',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":413,"parent_id":null,"title":"Seleksi Calon Ketua Umum","icon":"fas fa-stream","route":"admin.spk.ahp.kriteria","sequence":26,"active":1,"type":1,"created_at":"2023-05-09 11:53:00","updated_at":"2023-05-09 11:53:18"}',
            ),
            11 => 
            array (
                'id' => '1024',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:53:51',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":413,"updated_at":"2023-05-09T04:53:51.000000Z","created_at":"2023-05-09T04:53:51.000000Z","id":1239}',
            ),
            12 => 
            array (
                'id' => '1025',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:54:34',
                'table_name' => 'p_menu',
                'log_type' => 'create',
                'data' => '{"sequence":"55","parent_id":"413","active":"1","title":"Kriteria","icon":null,"route":"admin.spk.ahp.kriteria","type":"1","updated_at":"2023-05-09T04:54:34.000000Z","created_at":"2023-05-09T04:54:34.000000Z","id":414}',
            ),
            13 => 
            array (
                'id' => '1026',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:54:34',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":414,"updated_at":"2023-05-09T04:54:34.000000Z","created_at":"2023-05-09T04:54:34.000000Z","id":1240}',
            ),
            14 => 
            array (
                'id' => '1027',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:55:18',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":413,"parent_id":null,"title":"Seleksi Calon Ketua Umum","icon":"fas fa-id-card","route":"admin.spk.ahp.kriteria","sequence":26,"active":1,"type":1,"created_at":"2023-05-09 11:53:00","updated_at":"2023-05-09 11:53:51"}',
            ),
            15 => 
            array (
                'id' => '1028',
                'user_id' => '1',
                'log_date' => '2023-05-09 11:55:18',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":413,"updated_at":"2023-05-09T04:55:18.000000Z","created_at":"2023-05-09T04:55:18.000000Z","id":1241}',
            ),
            16 => 
            array (
                'id' => '1029',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:16:13',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"127.0.0.1","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36 Edg\\/113.0.1774.35"}',
            ),
            17 => 
            array (
                'id' => '1030',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:17:57',
                'table_name' => 'p_menu',
                'log_type' => 'create',
                'data' => '{"sequence":"55","parent_id":"413","active":"1","title":"Calon","icon":null,"route":null,"type":"1","updated_at":"2023-05-09T07:17:57.000000Z","created_at":"2023-05-09T07:17:57.000000Z","id":415}',
            ),
            18 => 
            array (
                'id' => '1031',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:17:57',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":415,"updated_at":"2023-05-09T07:17:57.000000Z","created_at":"2023-05-09T07:17:57.000000Z","id":1242}',
            ),
            19 => 
            array (
                'id' => '1032',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:10',
                'table_name' => 'p_menu',
                'log_type' => 'create',
                'data' => '{"sequence":"56","parent_id":"413","active":"1","title":"Perhitungan","icon":null,"route":null,"type":"1","updated_at":"2023-05-09T07:18:10.000000Z","created_at":"2023-05-09T07:18:10.000000Z","id":416}',
            ),
            20 => 
            array (
                'id' => '1033',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:10',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":416,"updated_at":"2023-05-09T07:18:10.000000Z","created_at":"2023-05-09T07:18:10.000000Z","id":1243}',
            ),
            21 => 
            array (
                'id' => '1034',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":415,"parent_id":413,"title":"Calon","icon":null,"route":null,"sequence":55,"active":1,"type":1,"created_at":"2023-05-09 14:17:57","updated_at":"2023-05-09 14:17:57"}',
            ),
            22 => 
            array (
                'id' => '1035',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":416,"parent_id":413,"title":"Perhitungan","icon":null,"route":null,"sequence":56,"active":1,"type":1,"created_at":"2023-05-09 14:18:10","updated_at":"2023-05-09 14:18:10"}',
            ),
            23 => 
            array (
                'id' => '1036',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":414,"parent_id":413,"title":"Kriteria","icon":null,"route":"admin.spk.ahp.kriteria","sequence":55,"active":1,"type":1,"created_at":"2023-05-09 11:54:34","updated_at":"2023-05-09 11:54:34"}',
            ),
            24 => 
            array (
                'id' => '1037',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":355,"parent_id":null,"title":"Data Alamat Profil","icon":"fas fa-map-marker-alt","route":null,"sequence":27,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-05-09 11:53:18"}',
            ),
            25 => 
            array (
                'id' => '1038',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":356,"parent_id":355,"title":"Provinsi","icon":null,"route":"admin.address.province","sequence":28,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-05-09 11:53:18"}',
            ),
            26 => 
            array (
                'id' => '1039',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":357,"parent_id":355,"title":"Kabupaten\\/Kota","icon":null,"route":"admin.address.regencie","sequence":29,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-05-09 11:53:18"}',
            ),
            27 => 
            array (
                'id' => '1040',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":358,"parent_id":355,"title":"Kecamatan","icon":null,"route":"admin.address.district","sequence":30,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-05-09 11:53:18"}',
            ),
            28 => 
            array (
                'id' => '1041',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":359,"parent_id":355,"title":"Desa\\/Keluarahan","icon":null,"route":"admin.address.village","sequence":31,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-05-09 11:53:18"}',
            ),
            29 => 
            array (
                'id' => '1042',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":367,"parent_id":null,"title":"Akses Pengguna","icon":"fas fa-user-check","route":null,"sequence":32,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-05-09 11:53:18"}',
            ),
            30 => 
            array (
                'id' => '1043',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":368,"parent_id":367,"title":"Perizinan","icon":null,"route":"admin.user_access.permission","sequence":33,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-05-09 11:53:18"}',
            ),
            31 => 
            array (
                'id' => '1044',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":369,"parent_id":367,"title":"Sebagai","icon":null,"route":"admin.user_access.role","sequence":34,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-05-09 11:53:18"}',
            ),
            32 => 
            array (
                'id' => '1045',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":361,"parent_id":null,"title":"Menu Management","icon":"fas fa-stream","route":null,"sequence":35,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-05-09 11:53:18"}',
            ),
            33 => 
            array (
                'id' => '1046',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":405,"parent_id":361,"title":"Admin","icon":null,"route":"admin.menu.admin","sequence":36,"active":1,"type":1,"created_at":"2022-08-20 14:12:45","updated_at":"2023-05-09 11:53:18"}',
            ),
            34 => 
            array (
                'id' => '1047',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":406,"parent_id":361,"title":"Depan","icon":null,"route":"admin.menu.frontend","sequence":37,"active":1,"type":1,"created_at":"2022-08-20 14:16:07","updated_at":"2023-05-09 11:53:18"}',
            ),
            35 => 
            array (
                'id' => '1048',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":393,"parent_id":null,"title":"Utility","icon":"fas fa-tools","route":null,"sequence":38,"active":1,"type":1,"created_at":"2022-08-08 22:41:26","updated_at":"2023-05-09 11:53:18"}',
            ),
            36 => 
            array (
                'id' => '1049',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":402,"parent_id":393,"title":"Notifikasi Admin Atas","icon":null,"route":"admin.utility.notif_admin_atas","sequence":39,"active":1,"type":1,"created_at":"2022-08-18 16:42:00","updated_at":"2023-05-09 11:53:18"}',
            ),
            37 => 
            array (
                'id' => '1050',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":394,"parent_id":393,"title":"Notifikasi Depan Atas","icon":null,"route":"admin.utility.notif_depan_atas","sequence":40,"active":1,"type":1,"created_at":"2022-08-08 22:41:53","updated_at":"2023-05-09 11:53:18"}',
            ),
            38 => 
            array (
                'id' => '1051',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":401,"parent_id":393,"title":"Hari Besar Nasional","icon":null,"route":"admin.utility.hari_besar_nasional","sequence":41,"active":1,"type":1,"created_at":"2022-08-17 21:19:05","updated_at":"2023-05-09 11:53:18"}',
            ),
            39 => 
            array (
                'id' => '1052',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":397,"parent_id":null,"title":"Setting Halaman","icon":"fas fa-wrench","route":null,"sequence":42,"active":1,"type":1,"created_at":"2022-08-14 21:10:57","updated_at":"2023-05-09 11:53:18"}',
            ),
            40 => 
            array (
                'id' => '1053',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":398,"parent_id":397,"title":"Halaman Admin","icon":null,"route":"admin.setting.admin","sequence":43,"active":1,"type":1,"created_at":"2022-08-14 21:11:42","updated_at":"2023-05-09 11:53:18"}',
            ),
            41 => 
            array (
                'id' => '1054',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":399,"parent_id":397,"title":"Halaman Depan","icon":null,"route":"admin.setting.front","sequence":44,"active":1,"type":1,"created_at":"2022-08-14 21:52:45","updated_at":"2023-05-09 11:53:18"}',
            ),
            42 => 
            array (
                'id' => '1055',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":400,"parent_id":397,"title":"Halaman Utama","icon":null,"route":"admin.setting.home","sequence":45,"active":1,"type":1,"created_at":"2022-08-16 14:55:41","updated_at":"2023-05-09 11:53:18"}',
            ),
            43 => 
            array (
                'id' => '1056',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":412,"parent_id":397,"title":"Halaman Sejarah","icon":null,"route":"admin.setting.sejarah","sequence":46,"active":1,"type":1,"created_at":"2023-02-19 10:02:10","updated_at":"2023-05-09 11:53:18"}',
            ),
            44 => 
            array (
                'id' => '1057',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":395,"parent_id":null,"title":"Daftar Kata Alumni","icon":"fas fa-user-edit","route":"admin.kata_alumni","sequence":47,"active":1,"type":1,"created_at":"2022-08-09 15:20:36","updated_at":"2023-05-09 11:53:18"}',
            ),
            45 => 
            array (
                'id' => '1058',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":403,"parent_id":null,"title":"Laporan","icon":"fas fa-book","route":null,"sequence":48,"active":0,"type":1,"created_at":"2022-08-18 18:54:07","updated_at":"2023-05-09 11:53:18"}',
            ),
            46 => 
            array (
                'id' => '1059',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":404,"parent_id":403,"title":"Anggota","icon":null,"route":"admin.lapooran.anggota","sequence":49,"active":1,"type":1,"created_at":"2022-08-18 18:55:08","updated_at":"2023-05-09 11:53:18"}',
            ),
            47 => 
            array (
                'id' => '1060',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":370,"parent_id":null,"title":"Anggota","icon":null,"route":null,"sequence":50,"active":1,"type":0,"created_at":"2022-08-05 23:50:28","updated_at":"2023-05-09 11:53:18"}',
            ),
            48 => 
            array (
                'id' => '1061',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":372,"parent_id":null,"title":"Profile","icon":"fas fa-user","route":"member.profile","sequence":51,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-05-09 11:53:18"}',
            ),
            49 => 
            array (
                'id' => '1062',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":389,"parent_id":null,"title":"Alumni Menu","icon":null,"route":null,"sequence":52,"active":1,"type":0,"created_at":"2022-08-06 14:06:05","updated_at":"2023-05-09 11:53:18"}',
            ),
            50 => 
            array (
                'id' => '1063',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":396,"parent_id":null,"title":"Kata Alumni","icon":"fas fa-user-edit","route":"member.kata_alumni","sequence":53,"active":1,"type":1,"created_at":"2022-08-09 15:23:52","updated_at":"2023-05-09 11:53:18"}',
            ),
            51 => 
            array (
                'id' => '1064',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":373,"parent_id":null,"title":"Ganti Password","icon":"fas fa-key","route":"member.password","sequence":54,"active":1,"type":1,"created_at":"2022-08-05 23:50:28","updated_at":"2023-05-09 11:53:18"}',
            ),
            52 => 
            array (
                'id' => '1065',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:18:58',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":386,"parent_id":null,"title":"Logout","icon":"fas fa-sign-out-alt","route":"logout","sequence":55,"active":1,"type":1,"created_at":"2022-08-05 23:54:09","updated_at":"2023-05-09 11:53:18"}',
            ),
            53 => 
            array (
                'id' => '1066',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:19:10',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":416,"parent_id":413,"title":"Perhitungan","icon":null,"route":null,"sequence":28,"active":1,"type":1,"created_at":"2023-05-09 14:18:10","updated_at":"2023-05-09 14:18:58"}',
            ),
            54 => 
            array (
                'id' => '1067',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:19:10',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":415,"parent_id":413,"title":"Calon","icon":null,"route":null,"sequence":27,"active":1,"type":1,"created_at":"2023-05-09 14:17:57","updated_at":"2023-05-09 14:18:58"}',
            ),
            55 => 
            array (
                'id' => '1068',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:19:27',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":414,"parent_id":413,"title":"Kriteria","icon":null,"route":"admin.spk.ahp.kriteria","sequence":29,"active":1,"type":1,"created_at":"2023-05-09 11:54:34","updated_at":"2023-05-09 14:18:58"}',
            ),
            56 => 
            array (
                'id' => '1069',
                'user_id' => '1',
                'log_date' => '2023-05-09 14:19:27',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":416,"parent_id":413,"title":"Perhitungan","icon":null,"route":null,"sequence":27,"active":1,"type":1,"created_at":"2023-05-09 14:18:10","updated_at":"2023-05-09 14:19:10"}',
            ),
            57 => 
            array (
                'id' => '1070',
                'user_id' => '1',
                'log_date' => '2023-05-09 16:22:10',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":415,"parent_id":413,"title":"Calon","icon":null,"route":null,"sequence":28,"active":1,"type":1,"created_at":"2023-05-09 14:17:57","updated_at":"2023-05-09 14:19:10"}',
            ),
            58 => 
            array (
                'id' => '1071',
                'user_id' => '1',
                'log_date' => '2023-05-09 16:22:10',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":415,"updated_at":"2023-05-09T09:22:10.000000Z","created_at":"2023-05-09T09:22:10.000000Z","id":1244}',
            ),
            59 => 
            array (
                'id' => '1076',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:29:46',
                'table_name' => 'spk_ahp_alternatif',
                'log_type' => 'create',
                'data' => '{"anggota_id":"1","updated_at":"2023-05-09T10:29:46.000000Z","created_at":"2023-05-09T10:29:46.000000Z","id":5}',
            ),
            60 => 
            array (
                'id' => '1077',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:29:46',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":10,"kriteria_jenis_id":6,"updated_at":"2023-05-09T10:29:46.000000Z","created_at":"2023-05-09T10:29:46.000000Z","id":1}',
            ),
            61 => 
            array (
                'id' => '1078',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:29:46',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":11,"kriteria_jenis_id":3,"updated_at":"2023-05-09T10:29:46.000000Z","created_at":"2023-05-09T10:29:46.000000Z","id":2}',
            ),
            62 => 
            array (
                'id' => '1079',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:29:46',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":12,"kriteria_jenis_id":14,"updated_at":"2023-05-09T10:29:46.000000Z","created_at":"2023-05-09T10:29:46.000000Z","id":3}',
            ),
            63 => 
            array (
                'id' => '1080',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:29:46',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":13,"kriteria_jenis_id":16,"updated_at":"2023-05-09T10:29:46.000000Z","created_at":"2023-05-09T10:29:46.000000Z","id":4}',
            ),
            64 => 
            array (
                'id' => '1081',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:29:46',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":14,"kriteria_jenis_id":20,"updated_at":"2023-05-09T10:29:46.000000Z","created_at":"2023-05-09T10:29:46.000000Z","id":5}',
            ),
            65 => 
            array (
                'id' => '1082',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:20',
                'table_name' => 'spk_ahp_alternatif',
                'log_type' => 'create',
                'data' => '{"anggota_id":"2","updated_at":"2023-05-09T10:30:20.000000Z","created_at":"2023-05-09T10:30:20.000000Z","id":6}',
            ),
            66 => 
            array (
                'id' => '1083',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:20',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":6,"kriteria_id":10,"kriteria_jenis_id":4,"updated_at":"2023-05-09T10:30:20.000000Z","created_at":"2023-05-09T10:30:20.000000Z","id":6}',
            ),
            67 => 
            array (
                'id' => '1084',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:20',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":6,"kriteria_id":11,"kriteria_jenis_id":1,"updated_at":"2023-05-09T10:30:20.000000Z","created_at":"2023-05-09T10:30:20.000000Z","id":7}',
            ),
            68 => 
            array (
                'id' => '1085',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:20',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":6,"kriteria_id":12,"kriteria_jenis_id":9,"updated_at":"2023-05-09T10:30:20.000000Z","created_at":"2023-05-09T10:30:20.000000Z","id":8}',
            ),
            69 => 
            array (
                'id' => '1086',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:20',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":6,"kriteria_id":13,"kriteria_jenis_id":16,"updated_at":"2023-05-09T10:30:20.000000Z","created_at":"2023-05-09T10:30:20.000000Z","id":9}',
            ),
            70 => 
            array (
                'id' => '1087',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:20',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":6,"kriteria_id":14,"kriteria_jenis_id":19,"updated_at":"2023-05-09T10:30:20.000000Z","created_at":"2023-05-09T10:30:20.000000Z","id":10}',
            ),
            71 => 
            array (
                'id' => '1088',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:25',
                'table_name' => 'spk_ahp_alternatif',
                'log_type' => 'create',
                'data' => '{"anggota_id":"3","updated_at":"2023-05-09T10:30:25.000000Z","created_at":"2023-05-09T10:30:25.000000Z","id":7}',
            ),
            72 => 
            array (
                'id' => '1089',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:25',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":7,"kriteria_id":10,"kriteria_jenis_id":4,"updated_at":"2023-05-09T10:30:25.000000Z","created_at":"2023-05-09T10:30:25.000000Z","id":11}',
            ),
            73 => 
            array (
                'id' => '1090',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:25',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":7,"kriteria_id":11,"kriteria_jenis_id":1,"updated_at":"2023-05-09T10:30:25.000000Z","created_at":"2023-05-09T10:30:25.000000Z","id":12}',
            ),
            74 => 
            array (
                'id' => '1091',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:25',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":7,"kriteria_id":12,"kriteria_jenis_id":9,"updated_at":"2023-05-09T10:30:25.000000Z","created_at":"2023-05-09T10:30:25.000000Z","id":13}',
            ),
            75 => 
            array (
                'id' => '1092',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:25',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":7,"kriteria_id":13,"kriteria_jenis_id":16,"updated_at":"2023-05-09T10:30:25.000000Z","created_at":"2023-05-09T10:30:25.000000Z","id":14}',
            ),
            76 => 
            array (
                'id' => '1093',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:25',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":7,"kriteria_id":14,"kriteria_jenis_id":19,"updated_at":"2023-05-09T10:30:25.000000Z","created_at":"2023-05-09T10:30:25.000000Z","id":15}',
            ),
            77 => 
            array (
                'id' => '1094',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:39',
                'table_name' => 'spk_ahp_alternatif',
                'log_type' => 'create',
                'data' => '{"anggota_id":"4","updated_at":"2023-05-09T10:30:39.000000Z","created_at":"2023-05-09T10:30:39.000000Z","id":8}',
            ),
            78 => 
            array (
                'id' => '1095',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:39',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":10,"kriteria_jenis_id":4,"updated_at":"2023-05-09T10:30:39.000000Z","created_at":"2023-05-09T10:30:39.000000Z","id":16}',
            ),
            79 => 
            array (
                'id' => '1096',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:40',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":11,"kriteria_jenis_id":1,"updated_at":"2023-05-09T10:30:39.000000Z","created_at":"2023-05-09T10:30:39.000000Z","id":17}',
            ),
            80 => 
            array (
                'id' => '1097',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:40',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":12,"kriteria_jenis_id":9,"updated_at":"2023-05-09T10:30:40.000000Z","created_at":"2023-05-09T10:30:40.000000Z","id":18}',
            ),
            81 => 
            array (
                'id' => '1098',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:40',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":13,"kriteria_jenis_id":16,"updated_at":"2023-05-09T10:30:40.000000Z","created_at":"2023-05-09T10:30:40.000000Z","id":19}',
            ),
            82 => 
            array (
                'id' => '1099',
                'user_id' => '1',
                'log_date' => '2023-05-09 17:30:40',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":14,"kriteria_jenis_id":19,"updated_at":"2023-05-09T10:30:40.000000Z","created_at":"2023-05-09T10:30:40.000000Z","id":20}',
            ),
            83 => 
            array (
                'id' => '1100',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:00:21',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":415,"parent_id":413,"title":"Calon","icon":null,"route":"admin.spk.ahp.alternatif","sequence":28,"active":1,"type":1,"created_at":"2023-05-09 14:17:57","updated_at":"2023-05-09 16:22:10"}',
            ),
            84 => 
            array (
                'id' => '1101',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:00:21',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":415,"updated_at":"2023-05-09T11:00:21.000000Z","created_at":"2023-05-09T11:00:21.000000Z","id":1245}',
            ),
            85 => 
            array (
                'id' => '1102',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'create',
                'data' => '{"nama":"dddd","kode":"C1d","slug":"dddd","updated_at":"2023-05-09T11:13:41.000000Z","created_at":"2023-05-09T11:13:41.000000Z","id":15}',
            ),
            86 => 
            array (
                'id' => '1103',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":15,"kriteria_y_id":10,"nilai":1,"updated_at":"2023-05-09T11:13:41.000000Z","created_at":"2023-05-09T11:13:41.000000Z","id":63}',
            ),
            87 => 
            array (
                'id' => '1104',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":15,"kriteria_y_id":11,"nilai":1,"updated_at":"2023-05-09T11:13:41.000000Z","created_at":"2023-05-09T11:13:41.000000Z","id":64}',
            ),
            88 => 
            array (
                'id' => '1105',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":15,"kriteria_y_id":12,"nilai":1,"updated_at":"2023-05-09T11:13:41.000000Z","created_at":"2023-05-09T11:13:41.000000Z","id":65}',
            ),
            89 => 
            array (
                'id' => '1106',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":15,"kriteria_y_id":13,"nilai":1,"updated_at":"2023-05-09T11:13:41.000000Z","created_at":"2023-05-09T11:13:41.000000Z","id":66}',
            ),
            90 => 
            array (
                'id' => '1107',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":15,"kriteria_y_id":14,"nilai":1,"updated_at":"2023-05-09T11:13:41.000000Z","created_at":"2023-05-09T11:13:41.000000Z","id":67}',
            ),
            91 => 
            array (
                'id' => '1108',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":15,"kriteria_y_id":15,"nilai":1,"updated_at":"2023-05-09T11:13:41.000000Z","created_at":"2023-05-09T11:13:41.000000Z","id":68}',
            ),
            92 => 
            array (
                'id' => '1109',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":10,"kriteria_y_id":15,"nilai":1,"updated_at":"2023-05-09T11:13:41.000000Z","created_at":"2023-05-09T11:13:41.000000Z","id":69}',
            ),
            93 => 
            array (
                'id' => '1110',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":11,"kriteria_y_id":15,"nilai":1,"updated_at":"2023-05-09T11:13:41.000000Z","created_at":"2023-05-09T11:13:41.000000Z","id":70}',
            ),
            94 => 
            array (
                'id' => '1111',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":12,"kriteria_y_id":15,"nilai":1,"updated_at":"2023-05-09T11:13:41.000000Z","created_at":"2023-05-09T11:13:41.000000Z","id":71}',
            ),
            95 => 
            array (
                'id' => '1112',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":13,"kriteria_y_id":15,"nilai":1,"updated_at":"2023-05-09T11:13:41.000000Z","created_at":"2023-05-09T11:13:41.000000Z","id":72}',
            ),
            96 => 
            array (
                'id' => '1113',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'create',
                'data' => '{"kriteria_x_id":14,"kriteria_y_id":15,"nilai":1,"updated_at":"2023-05-09T11:13:41.000000Z","created_at":"2023-05-09T11:13:41.000000Z","id":73}',
            ),
            97 => 
            array (
                'id' => '1114',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Seleksi administrasi","slug":"seleksi-administrasi","kode":"C1","ci":0.0055916305916288,"ri":0.58,"cr":0.00964074239936,"prioritas":0.13166666666667,"total":8,"eign_value":1.0533333333333,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-09 11:42:02"}',
            ),
            98 => 
            array (
                'id' => '1115',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":15,"nama":"dddd","slug":"dddd","kode":"C1d","ci":0,"ri":0,"cr":0,"prioritas":0,"total":0,"eign_value":0,"created_at":"2023-05-09 18:13:41","updated_at":"2023-05-09 18:13:41"}',
            ),
            99 => 
            array (
                'id' => '1116',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Seleksi Wawancara","slug":"seleksi-wawancara","kode":"C2","ci":0.0055916305916288,"ri":0.58,"cr":0.00964074239936,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:04:45","updated_at":"2023-05-09 11:42:51"}',
            ),
            100 => 
            array (
                'id' => '1117',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.033780862157283,"ri":1.24,"cr":0.027242630772003,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 11:47:23"}',
            ),
            101 => 
            array (
                'id' => '1118',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Tahun Masuk","slug":"tahun-masuk","kode":"C4","ci":0.0055916305916288,"ri":0.58,"cr":0.00964074239936,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:38","updated_at":"2023-05-09 11:49:07"}',
            ),
            102 => 
            array (
                'id' => '1119',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:41',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Wawasan Ke organisasian","slug":"wawasan-ke-organisasian","kode":"C5","ci":0.0055916305916288,"ri":0.58,"cr":0.00964074239936,"prioritas":0.19833333333333,"total":5,"eign_value":0.99166666666667,"created_at":"2023-05-08 20:06:50","updated_at":"2023-05-09 11:50:40"}',
            ),
            103 => 
            array (
                'id' => '1120',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:53',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'delete',
                'data' => '{"id":15,"nama":"dddd","slug":"dddd","kode":"C1d","ci":0,"ri":0,"cr":0,"prioritas":0.16498316498316,"total":6,"eign_value":0.98989898989899,"created_at":"2023-05-09 18:13:41","updated_at":"2023-05-09 18:13:41"}',
            ),
            104 => 
            array (
                'id' => '1121',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:53',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Seleksi administrasi","slug":"seleksi-administrasi","kode":"C1","ci":0.0055916305916288,"ri":0.58,"cr":0.00964074239936,"prioritas":0.11952861952862,"total":9,"eign_value":1.0757575757576,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-09 18:13:41"}',
            ),
            105 => 
            array (
                'id' => '1122',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:53',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Seleksi Wawancara","slug":"seleksi-wawancara","kode":"C2","ci":0.0055916305916288,"ri":0.58,"cr":0.00964074239936,"prioritas":0.18350168350168,"total":5.5,"eign_value":1.0092592592593,"created_at":"2023-05-08 20:04:45","updated_at":"2023-05-09 18:13:41"}',
            ),
            106 => 
            array (
                'id' => '1123',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:53',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.033780862157283,"ri":1.24,"cr":0.027242630772003,"prioritas":0.18350168350168,"total":5.5,"eign_value":1.0092592592593,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 18:13:41"}',
            ),
            107 => 
            array (
                'id' => '1124',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:53',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Tahun Masuk","slug":"tahun-masuk","kode":"C4","ci":0.0055916305916288,"ri":0.58,"cr":0.00964074239936,"prioritas":0.18350168350168,"total":5.5,"eign_value":1.0092592592593,"created_at":"2023-05-08 20:06:38","updated_at":"2023-05-09 18:13:41"}',
            ),
            108 => 
            array (
                'id' => '1125',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:13:53',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Wawasan Ke organisasian","slug":"wawasan-ke-organisasian","kode":"C5","ci":0.0055916305916288,"ri":0.58,"cr":0.00964074239936,"prioritas":0.16498316498316,"total":6,"eign_value":0.98989898989899,"created_at":"2023-05-08 20:06:50","updated_at":"2023-05-09 18:13:41"}',
            ),
            109 => 
            array (
                'id' => '1126',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:16:12',
                'table_name' => 'spk_ahp_alternatif',
                'log_type' => 'create',
                'data' => '{"anggota_id":"6","updated_at":"2023-05-09T11:16:12.000000Z","created_at":"2023-05-09T11:16:12.000000Z","id":9}',
            ),
            110 => 
            array (
                'id' => '1127',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:16:12',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":9,"kriteria_id":10,"kriteria_jenis_id":6,"updated_at":"2023-05-09T11:16:12.000000Z","created_at":"2023-05-09T11:16:12.000000Z","id":21}',
            ),
            111 => 
            array (
                'id' => '1128',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:16:12',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":9,"kriteria_id":11,"kriteria_jenis_id":2,"updated_at":"2023-05-09T11:16:12.000000Z","created_at":"2023-05-09T11:16:12.000000Z","id":22}',
            ),
            112 => 
            array (
                'id' => '1129',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:16:12',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":9,"kriteria_id":12,"kriteria_jenis_id":11,"updated_at":"2023-05-09T11:16:12.000000Z","created_at":"2023-05-09T11:16:12.000000Z","id":23}',
            ),
            113 => 
            array (
                'id' => '1130',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:16:12',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":9,"kriteria_id":13,"kriteria_jenis_id":17,"updated_at":"2023-05-09T11:16:12.000000Z","created_at":"2023-05-09T11:16:12.000000Z","id":24}',
            ),
            114 => 
            array (
                'id' => '1131',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:16:12',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":9,"kriteria_id":14,"kriteria_jenis_id":20,"updated_at":"2023-05-09T11:16:12.000000Z","created_at":"2023-05-09T11:16:12.000000Z","id":25}',
            ),
            115 => 
            array (
                'id' => '1132',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:16:39',
                'table_name' => 'spk_ahp_alternatif',
                'log_type' => 'create',
                'data' => '{"anggota_id":"9","updated_at":"2023-05-09T11:16:39.000000Z","created_at":"2023-05-09T11:16:39.000000Z","id":10}',
            ),
            116 => 
            array (
                'id' => '1133',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:16:39',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":10,"kriteria_id":10,"kriteria_jenis_id":4,"updated_at":"2023-05-09T11:16:39.000000Z","created_at":"2023-05-09T11:16:39.000000Z","id":26}',
            ),
            117 => 
            array (
                'id' => '1134',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:16:39',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":10,"kriteria_id":11,"kriteria_jenis_id":1,"updated_at":"2023-05-09T11:16:39.000000Z","created_at":"2023-05-09T11:16:39.000000Z","id":27}',
            ),
            118 => 
            array (
                'id' => '1135',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:16:39',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":10,"kriteria_id":12,"kriteria_jenis_id":9,"updated_at":"2023-05-09T11:16:39.000000Z","created_at":"2023-05-09T11:16:39.000000Z","id":28}',
            ),
            119 => 
            array (
                'id' => '1136',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:16:39',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":10,"kriteria_id":13,"kriteria_jenis_id":16,"updated_at":"2023-05-09T11:16:39.000000Z","created_at":"2023-05-09T11:16:39.000000Z","id":29}',
            ),
            120 => 
            array (
                'id' => '1137',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:16:39',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":10,"kriteria_id":14,"kriteria_jenis_id":19,"updated_at":"2023-05-09T11:16:39.000000Z","created_at":"2023-05-09T11:16:39.000000Z","id":30}',
            ),
            121 => 
            array (
                'id' => '1138',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:21:07',
                'table_name' => 'spk_ahp_alternatif',
                'log_type' => 'create',
                'data' => '{"anggota_id":"10","updated_at":"2023-05-09T11:21:07.000000Z","created_at":"2023-05-09T11:21:07.000000Z","id":11}',
            ),
            122 => 
            array (
                'id' => '1139',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:21:07',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":11,"kriteria_id":10,"kriteria_jenis_id":4,"updated_at":"2023-05-09T11:21:07.000000Z","created_at":"2023-05-09T11:21:07.000000Z","id":31}',
            ),
            123 => 
            array (
                'id' => '1140',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:21:07',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":11,"kriteria_id":11,"kriteria_jenis_id":1,"updated_at":"2023-05-09T11:21:07.000000Z","created_at":"2023-05-09T11:21:07.000000Z","id":32}',
            ),
            124 => 
            array (
                'id' => '1141',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:21:07',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":11,"kriteria_id":12,"kriteria_jenis_id":9,"updated_at":"2023-05-09T11:21:07.000000Z","created_at":"2023-05-09T11:21:07.000000Z","id":33}',
            ),
            125 => 
            array (
                'id' => '1142',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:21:07',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":11,"kriteria_id":13,"kriteria_jenis_id":18,"updated_at":"2023-05-09T11:21:07.000000Z","created_at":"2023-05-09T11:21:07.000000Z","id":34}',
            ),
            126 => 
            array (
                'id' => '1143',
                'user_id' => '1',
                'log_date' => '2023-05-09 18:21:07',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":11,"kriteria_id":14,"kriteria_jenis_id":19,"updated_at":"2023-05-09T11:21:07.000000Z","created_at":"2023-05-09T11:21:07.000000Z","id":35}',
            ),
            127 => 
            array (
                'id' => '1144',
                'user_id' => '1',
                'log_date' => '2023-05-09 19:26:34',
                'table_name' => 'spk_ahp_alternatif',
                'log_type' => 'create',
                'data' => '{"anggota_id":"38","updated_at":"2023-05-09T12:26:34.000000Z","created_at":"2023-05-09T12:26:34.000000Z","id":12}',
            ),
            128 => 
            array (
                'id' => '1145',
                'user_id' => '1',
                'log_date' => '2023-05-09 19:26:34',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":12,"kriteria_id":10,"kriteria_jenis_id":4,"updated_at":"2023-05-09T12:26:34.000000Z","created_at":"2023-05-09T12:26:34.000000Z","id":36}',
            ),
            129 => 
            array (
                'id' => '1146',
                'user_id' => '1',
                'log_date' => '2023-05-09 19:26:34',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":12,"kriteria_id":11,"kriteria_jenis_id":1,"updated_at":"2023-05-09T12:26:34.000000Z","created_at":"2023-05-09T12:26:34.000000Z","id":37}',
            ),
            130 => 
            array (
                'id' => '1147',
                'user_id' => '1',
                'log_date' => '2023-05-09 19:26:34',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":12,"kriteria_id":12,"kriteria_jenis_id":9,"updated_at":"2023-05-09T12:26:34.000000Z","created_at":"2023-05-09T12:26:34.000000Z","id":38}',
            ),
            131 => 
            array (
                'id' => '1148',
                'user_id' => '1',
                'log_date' => '2023-05-09 19:26:34',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":12,"kriteria_id":13,"kriteria_jenis_id":16,"updated_at":"2023-05-09T12:26:34.000000Z","created_at":"2023-05-09T12:26:34.000000Z","id":39}',
            ),
            132 => 
            array (
                'id' => '1149',
                'user_id' => '1',
                'log_date' => '2023-05-09 19:26:34',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":12,"kriteria_id":14,"kriteria_jenis_id":19,"updated_at":"2023-05-09T12:26:34.000000Z","created_at":"2023-05-09T12:26:34.000000Z","id":40}',
            ),
            133 => 
            array (
                'id' => '1150',
                'user_id' => '1',
                'log_date' => '2023-05-09 19:27:13',
                'table_name' => 'spk_ahp_alternatif',
                'log_type' => 'create',
                'data' => '{"anggota_id":"183","updated_at":"2023-05-09T12:27:13.000000Z","created_at":"2023-05-09T12:27:13.000000Z","id":13}',
            ),
            134 => 
            array (
                'id' => '1151',
                'user_id' => '1',
                'log_date' => '2023-05-09 19:27:13',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":13,"kriteria_id":10,"kriteria_jenis_id":4,"updated_at":"2023-05-09T12:27:13.000000Z","created_at":"2023-05-09T12:27:13.000000Z","id":41}',
            ),
            135 => 
            array (
                'id' => '1152',
                'user_id' => '1',
                'log_date' => '2023-05-09 19:27:13',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":13,"kriteria_id":11,"kriteria_jenis_id":1,"updated_at":"2023-05-09T12:27:13.000000Z","created_at":"2023-05-09T12:27:13.000000Z","id":42}',
            ),
            136 => 
            array (
                'id' => '1153',
                'user_id' => '1',
                'log_date' => '2023-05-09 19:27:13',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":13,"kriteria_id":12,"kriteria_jenis_id":9,"updated_at":"2023-05-09T12:27:13.000000Z","created_at":"2023-05-09T12:27:13.000000Z","id":43}',
            ),
            137 => 
            array (
                'id' => '1154',
                'user_id' => '1',
                'log_date' => '2023-05-09 19:27:13',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":13,"kriteria_id":13,"kriteria_jenis_id":16,"updated_at":"2023-05-09T12:27:13.000000Z","created_at":"2023-05-09T12:27:13.000000Z","id":44}',
            ),
            138 => 
            array (
                'id' => '1155',
                'user_id' => '1',
                'log_date' => '2023-05-09 19:27:13',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":13,"kriteria_id":14,"kriteria_jenis_id":19,"updated_at":"2023-05-09T12:27:13.000000Z","created_at":"2023-05-09T12:27:13.000000Z","id":45}',
            ),
            139 => 
            array (
                'id' => '1156',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:15:49',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":10,"kriteria_jenis_id":4,"updated_at":"2023-05-09T13:15:49.000000Z","created_at":"2023-05-09T13:15:49.000000Z","id":46}',
            ),
            140 => 
            array (
                'id' => '1157',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:15:49',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":11,"kriteria_jenis_id":1,"updated_at":"2023-05-09T13:15:49.000000Z","created_at":"2023-05-09T13:15:49.000000Z","id":47}',
            ),
            141 => 
            array (
                'id' => '1158',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:15:49',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":12,"kriteria_jenis_id":14,"updated_at":"2023-05-09T13:15:49.000000Z","created_at":"2023-05-09T13:15:49.000000Z","id":48}',
            ),
            142 => 
            array (
                'id' => '1159',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:15:49',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":13,"kriteria_jenis_id":16,"updated_at":"2023-05-09T13:15:49.000000Z","created_at":"2023-05-09T13:15:49.000000Z","id":49}',
            ),
            143 => 
            array (
                'id' => '1160',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:15:49',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":14,"kriteria_jenis_id":19,"updated_at":"2023-05-09T13:15:49.000000Z","created_at":"2023-05-09T13:15:49.000000Z","id":50}',
            ),
            144 => 
            array (
                'id' => '1161',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:16:19',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":10,"kriteria_jenis_id":6,"updated_at":"2023-05-09T13:16:19.000000Z","created_at":"2023-05-09T13:16:19.000000Z","id":51}',
            ),
            145 => 
            array (
                'id' => '1162',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:16:19',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":11,"kriteria_jenis_id":3,"updated_at":"2023-05-09T13:16:19.000000Z","created_at":"2023-05-09T13:16:19.000000Z","id":52}',
            ),
            146 => 
            array (
                'id' => '1163',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:16:19',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":12,"kriteria_jenis_id":14,"updated_at":"2023-05-09T13:16:19.000000Z","created_at":"2023-05-09T13:16:19.000000Z","id":53}',
            ),
            147 => 
            array (
                'id' => '1164',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:16:19',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":13,"kriteria_jenis_id":18,"updated_at":"2023-05-09T13:16:19.000000Z","created_at":"2023-05-09T13:16:19.000000Z","id":54}',
            ),
            148 => 
            array (
                'id' => '1165',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:16:19',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":14,"kriteria_jenis_id":21,"updated_at":"2023-05-09T13:16:19.000000Z","created_at":"2023-05-09T13:16:19.000000Z","id":55}',
            ),
            149 => 
            array (
                'id' => '1166',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:16:51',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":10,"kriteria_jenis_id":6,"updated_at":"2023-05-09T13:16:51.000000Z","created_at":"2023-05-09T13:16:51.000000Z","id":56}',
            ),
            150 => 
            array (
                'id' => '1167',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:16:51',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":11,"kriteria_jenis_id":3,"updated_at":"2023-05-09T13:16:51.000000Z","created_at":"2023-05-09T13:16:51.000000Z","id":57}',
            ),
            151 => 
            array (
                'id' => '1168',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:16:51',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":12,"kriteria_jenis_id":14,"updated_at":"2023-05-09T13:16:51.000000Z","created_at":"2023-05-09T13:16:51.000000Z","id":58}',
            ),
            152 => 
            array (
                'id' => '1169',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:16:51',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":13,"kriteria_jenis_id":18,"updated_at":"2023-05-09T13:16:51.000000Z","created_at":"2023-05-09T13:16:51.000000Z","id":59}',
            ),
            153 => 
            array (
                'id' => '1170',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:16:51',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":14,"kriteria_jenis_id":21,"updated_at":"2023-05-09T13:16:51.000000Z","created_at":"2023-05-09T13:16:51.000000Z","id":60}',
            ),
            154 => 
            array (
                'id' => '1171',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:17:04',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":10,"kriteria_jenis_id":6,"updated_at":"2023-05-09T13:17:04.000000Z","created_at":"2023-05-09T13:17:04.000000Z","id":61}',
            ),
            155 => 
            array (
                'id' => '1172',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:17:04',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":11,"kriteria_jenis_id":3,"updated_at":"2023-05-09T13:17:04.000000Z","created_at":"2023-05-09T13:17:04.000000Z","id":62}',
            ),
            156 => 
            array (
                'id' => '1173',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:17:04',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":12,"kriteria_jenis_id":14,"updated_at":"2023-05-09T13:17:04.000000Z","created_at":"2023-05-09T13:17:04.000000Z","id":63}',
            ),
            157 => 
            array (
                'id' => '1174',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:17:04',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":13,"kriteria_jenis_id":18,"updated_at":"2023-05-09T13:17:04.000000Z","created_at":"2023-05-09T13:17:04.000000Z","id":64}',
            ),
            158 => 
            array (
                'id' => '1175',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:17:04',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":8,"kriteria_id":14,"kriteria_jenis_id":21,"updated_at":"2023-05-09T13:17:04.000000Z","created_at":"2023-05-09T13:17:04.000000Z","id":65}',
            ),
            159 => 
            array (
                'id' => '1176',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:25:09',
                'table_name' => 'spk_ahp_alternatif',
                'log_type' => 'delete',
                'data' => '{"id":9,"anggota_id":6,"created_at":"2023-05-09 18:16:12","updated_at":"2023-05-09 18:16:12"}',
            ),
            160 => 
            array (
                'id' => '1177',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:29:49',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":416,"parent_id":413,"title":"Perhitungan","icon":null,"route":null,"sequence":29,"active":1,"type":1,"created_at":"2023-05-09 14:18:10","updated_at":"2023-05-09 14:19:27"}',
            ),
            161 => 
            array (
                'id' => '1178',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:29:49',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":416,"updated_at":"2023-05-09T13:29:49.000000Z","created_at":"2023-05-09T13:29:49.000000Z","id":1246}',
            ),
            162 => 
            array (
                'id' => '1179',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:56:34',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":416,"parent_id":413,"title":"Hasil","icon":null,"route":null,"sequence":29,"active":1,"type":1,"created_at":"2023-05-09 14:18:10","updated_at":"2023-05-09 20:29:49"}',
            ),
            163 => 
            array (
                'id' => '1180',
                'user_id' => '1',
                'log_date' => '2023-05-09 20:56:34',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":416,"updated_at":"2023-05-09T13:56:34.000000Z","created_at":"2023-05-09T13:56:34.000000Z","id":1247}',
            ),
            164 => 
            array (
                'id' => '1181',
                'user_id' => '1',
                'log_date' => '2023-05-09 23:34:57',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":42,"nilai":1,"kriteria_x_id":12,"kriteria_y_id":10,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-08 20:06:22"}',
            ),
            165 => 
            array (
                'id' => '1182',
                'user_id' => '1',
                'log_date' => '2023-05-09 23:34:57',
                'table_name' => 'spk_ahp_kriteria_perbandingan',
                'log_type' => 'edit',
                'data' => '{"id":45,"nilai":1,"kriteria_x_id":10,"kriteria_y_id":12,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-08 20:06:22"}',
            ),
            166 => 
            array (
                'id' => '1183',
                'user_id' => '1',
                'log_date' => '2023-05-09 23:34:57',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":11,"nama":"Seleksi administrasi","slug":"seleksi-administrasi","kode":"C1","ci":0.0055916305916288,"ri":0.58,"cr":0.00964074239936,"prioritas":0.13166666666667,"total":8,"eign_value":1.0533333333333,"created_at":"2023-05-08 20:05:18","updated_at":"2023-05-09 18:13:53"}',
            ),
            167 => 
            array (
                'id' => '1184',
                'user_id' => '1',
                'log_date' => '2023-05-09 23:34:57',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":10,"nama":"Seleksi Wawancara","slug":"seleksi-wawancara","kode":"C2","ci":0.0055916305916288,"ri":0.58,"cr":0.00964074239936,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:04:45","updated_at":"2023-05-09 18:13:53"}',
            ),
            168 => 
            array (
                'id' => '1185',
                'user_id' => '1',
                'log_date' => '2023-05-09 23:34:57',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":12,"nama":"Pengalaman Organisasi","slug":"pengalaman-organisasi","kode":"C3","ci":0.033780862157283,"ri":1.24,"cr":0.027242630772003,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:22","updated_at":"2023-05-09 18:13:53"}',
            ),
            169 => 
            array (
                'id' => '1186',
                'user_id' => '1',
                'log_date' => '2023-05-09 23:34:57',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":13,"nama":"Tahun Masuk","slug":"tahun-masuk","kode":"C4","ci":0.0055916305916288,"ri":0.58,"cr":0.00964074239936,"prioritas":0.22333333333333,"total":4.5,"eign_value":1.005,"created_at":"2023-05-08 20:06:38","updated_at":"2023-05-09 18:13:53"}',
            ),
            170 => 
            array (
                'id' => '1187',
                'user_id' => '1',
                'log_date' => '2023-05-09 23:34:57',
                'table_name' => 'spk_ahp_kriteria',
                'log_type' => 'edit',
                'data' => '{"id":14,"nama":"Wawasan Ke organisasian","slug":"wawasan-ke-organisasian","kode":"C5","ci":0.0055916305916288,"ri":0.58,"cr":0.00964074239936,"prioritas":0.19833333333333,"total":5,"eign_value":0.99166666666667,"created_at":"2023-05-08 20:06:50","updated_at":"2023-05-09 18:13:53"}',
            ),
            171 => 
            array (
                'id' => '1188',
                'user_id' => '1',
                'log_date' => '2023-05-10 00:43:58',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":10,"kriteria_jenis_id":6,"updated_at":"2023-05-09T17:43:58.000000Z","created_at":"2023-05-09T17:43:58.000000Z","id":66}',
            ),
            172 => 
            array (
                'id' => '1189',
                'user_id' => '1',
                'log_date' => '2023-05-10 00:43:58',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":11,"kriteria_jenis_id":3,"updated_at":"2023-05-09T17:43:58.000000Z","created_at":"2023-05-09T17:43:58.000000Z","id":67}',
            ),
            173 => 
            array (
                'id' => '1190',
                'user_id' => '1',
                'log_date' => '2023-05-10 00:43:58',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":12,"kriteria_jenis_id":14,"updated_at":"2023-05-09T17:43:58.000000Z","created_at":"2023-05-09T17:43:58.000000Z","id":68}',
            ),
            174 => 
            array (
                'id' => '1191',
                'user_id' => '1',
                'log_date' => '2023-05-10 00:43:58',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":13,"kriteria_jenis_id":18,"updated_at":"2023-05-09T17:43:58.000000Z","created_at":"2023-05-09T17:43:58.000000Z","id":69}',
            ),
            175 => 
            array (
                'id' => '1192',
                'user_id' => '1',
                'log_date' => '2023-05-10 00:43:58',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":14,"kriteria_jenis_id":20,"updated_at":"2023-05-09T17:43:58.000000Z","created_at":"2023-05-09T17:43:58.000000Z","id":70}',
            ),
            176 => 
            array (
                'id' => '1193',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:22:16',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.spk.ahp.visible","value":0,"updated_at":"2023-05-09T18:22:16.000000Z","created_at":"2023-05-09T18:22:16.000000Z","id":1}',
            ),
            177 => 
            array (
                'id' => '1194',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:22:16',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.spk.ahp.jml_seleksi","value":"4","updated_at":"2023-05-09T18:22:16.000000Z","created_at":"2023-05-09T18:22:16.000000Z","id":2}',
            ),
            178 => 
            array (
                'id' => '1195',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:22:42',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.spk.ahp.umumkan","value":1,"updated_at":"2023-05-09T18:22:42.000000Z","created_at":"2023-05-09T18:22:42.000000Z","id":3}',
            ),
            179 => 
            array (
                'id' => '1196',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:32:34',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":13,"kriteria_id":10,"kriteria_jenis_id":4,"updated_at":"2023-05-09T18:32:34.000000Z","created_at":"2023-05-09T18:32:34.000000Z","id":71}',
            ),
            180 => 
            array (
                'id' => '1197',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:32:34',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":13,"kriteria_id":11,"kriteria_jenis_id":1,"updated_at":"2023-05-09T18:32:34.000000Z","created_at":"2023-05-09T18:32:34.000000Z","id":72}',
            ),
            181 => 
            array (
                'id' => '1198',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:32:34',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":13,"kriteria_id":12,"kriteria_jenis_id":13,"updated_at":"2023-05-09T18:32:34.000000Z","created_at":"2023-05-09T18:32:34.000000Z","id":73}',
            ),
            182 => 
            array (
                'id' => '1199',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:32:34',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":13,"kriteria_id":13,"kriteria_jenis_id":16,"updated_at":"2023-05-09T18:32:34.000000Z","created_at":"2023-05-09T18:32:34.000000Z","id":74}',
            ),
            183 => 
            array (
                'id' => '1200',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:32:34',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":13,"kriteria_id":14,"kriteria_jenis_id":19,"updated_at":"2023-05-09T18:32:34.000000Z","created_at":"2023-05-09T18:32:34.000000Z","id":75}',
            ),
            184 => 
            array (
                'id' => '1201',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:32:42',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":7,"kriteria_id":10,"kriteria_jenis_id":5,"updated_at":"2023-05-09T18:32:42.000000Z","created_at":"2023-05-09T18:32:42.000000Z","id":76}',
            ),
            185 => 
            array (
                'id' => '1202',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:32:42',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":7,"kriteria_id":11,"kriteria_jenis_id":2,"updated_at":"2023-05-09T18:32:42.000000Z","created_at":"2023-05-09T18:32:42.000000Z","id":77}',
            ),
            186 => 
            array (
                'id' => '1203',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:32:42',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":7,"kriteria_id":12,"kriteria_jenis_id":9,"updated_at":"2023-05-09T18:32:42.000000Z","created_at":"2023-05-09T18:32:42.000000Z","id":78}',
            ),
            187 => 
            array (
                'id' => '1204',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:32:42',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":7,"kriteria_id":13,"kriteria_jenis_id":16,"updated_at":"2023-05-09T18:32:42.000000Z","created_at":"2023-05-09T18:32:42.000000Z","id":79}',
            ),
            188 => 
            array (
                'id' => '1205',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:32:42',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":7,"kriteria_id":14,"kriteria_jenis_id":19,"updated_at":"2023-05-09T18:32:42.000000Z","created_at":"2023-05-09T18:32:42.000000Z","id":80}',
            ),
            189 => 
            array (
                'id' => '1206',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:33:14',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":6,"kriteria_id":10,"kriteria_jenis_id":4,"updated_at":"2023-05-09T18:33:14.000000Z","created_at":"2023-05-09T18:33:14.000000Z","id":81}',
            ),
            190 => 
            array (
                'id' => '1207',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:33:14',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":6,"kriteria_id":11,"kriteria_jenis_id":1,"updated_at":"2023-05-09T18:33:14.000000Z","created_at":"2023-05-09T18:33:14.000000Z","id":82}',
            ),
            191 => 
            array (
                'id' => '1208',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:33:14',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":6,"kriteria_id":12,"kriteria_jenis_id":11,"updated_at":"2023-05-09T18:33:14.000000Z","created_at":"2023-05-09T18:33:14.000000Z","id":83}',
            ),
            192 => 
            array (
                'id' => '1209',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:33:14',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":6,"kriteria_id":13,"kriteria_jenis_id":16,"updated_at":"2023-05-09T18:33:14.000000Z","created_at":"2023-05-09T18:33:14.000000Z","id":84}',
            ),
            193 => 
            array (
                'id' => '1210',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:33:14',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":6,"kriteria_id":14,"kriteria_jenis_id":19,"updated_at":"2023-05-09T18:33:14.000000Z","created_at":"2023-05-09T18:33:14.000000Z","id":85}',
            ),
            194 => 
            array (
                'id' => '1211',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:33:40',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":12,"kriteria_id":10,"kriteria_jenis_id":5,"updated_at":"2023-05-09T18:33:40.000000Z","created_at":"2023-05-09T18:33:40.000000Z","id":86}',
            ),
            195 => 
            array (
                'id' => '1212',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:33:40',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":12,"kriteria_id":11,"kriteria_jenis_id":2,"updated_at":"2023-05-09T18:33:40.000000Z","created_at":"2023-05-09T18:33:40.000000Z","id":87}',
            ),
            196 => 
            array (
                'id' => '1213',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:33:40',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":12,"kriteria_id":12,"kriteria_jenis_id":10,"updated_at":"2023-05-09T18:33:40.000000Z","created_at":"2023-05-09T18:33:40.000000Z","id":88}',
            ),
            197 => 
            array (
                'id' => '1214',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:33:40',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":12,"kriteria_id":13,"kriteria_jenis_id":16,"updated_at":"2023-05-09T18:33:40.000000Z","created_at":"2023-05-09T18:33:40.000000Z","id":89}',
            ),
            198 => 
            array (
                'id' => '1215',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:33:40',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":12,"kriteria_id":14,"kriteria_jenis_id":19,"updated_at":"2023-05-09T18:33:40.000000Z","created_at":"2023-05-09T18:33:40.000000Z","id":90}',
            ),
            199 => 
            array (
                'id' => '1216',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:37:32',
                'table_name' => 'setting_activities',
                'log_type' => 'edit',
                'data' => '{"id":3,"key":"setting.spk.ahp.umumkan","value":"1","created_at":"2023-05-10 01:22:42","updated_at":"2023-05-10 01:22:42"}',
            ),
            200 => 
            array (
                'id' => '1217',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:37:41',
                'table_name' => 'setting_activities',
                'log_type' => 'edit',
                'data' => '{"id":3,"key":"setting.spk.ahp.umumkan","value":"0","created_at":"2023-05-10 01:22:42","updated_at":"2023-05-10 01:37:32"}',
            ),
            201 => 
            array (
                'id' => '1218',
                'user_id' => '1',
                'log_date' => '2023-05-10 01:37:41',
                'table_name' => 'setting_activities',
                'log_type' => 'edit',
                'data' => '{"id":2,"key":"setting.spk.ahp.jml_seleksi","value":"4","created_at":"2023-05-10 01:22:16","updated_at":"2023-05-10 01:22:16"}',
            ),
            202 => 
            array (
                'id' => '1219',
                'user_id' => '1',
                'log_date' => '2023-05-10 02:08:43',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.101.231","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36 Edg\\/113.0.1774.35"}',
            ),
            203 => 
            array (
                'id' => '1220',
                'user_id' => '1',
                'log_date' => '2023-05-10 02:09:21',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":"414","parent_id":"413","title":"Kriteria","icon":null,"route":"admin.spk.ahp.kriteria","sequence":"27","active":"1","type":"1","created_at":"2023-05-09 11:54:34","updated_at":"2023-05-09 14:19:27"}',
            ),
            204 => 
            array (
                'id' => '1221',
                'user_id' => '1',
                'log_date' => '2023-05-10 02:09:21',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":414,"updated_at":"2023-05-09T19:09:21.000000Z","created_at":"2023-05-09T19:09:21.000000Z","id":1248}',
            ),
            205 => 
            array (
                'id' => '1222',
                'user_id' => '1',
                'log_date' => '2023-05-10 02:11:00',
                'table_name' => 'p_menu',
                'log_type' => 'edit',
                'data' => '{"id":"414","parent_id":"413","title":"Kriteria","icon":null,"route":null,"sequence":"27","active":"1","type":"1","created_at":"2023-05-09 11:54:34","updated_at":"2023-05-10 02:09:21"}',
            ),
            206 => 
            array (
                'id' => '1223',
                'user_id' => '1',
                'log_date' => '2023-05-10 02:11:00',
                'table_name' => 'p_role_has_menu',
                'log_type' => 'create',
                'data' => '{"role_id":1,"menu_id":414,"updated_at":"2023-05-09T19:11:00.000000Z","created_at":"2023-05-09T19:11:00.000000Z","id":1249}',
            ),
            207 => 
            array (
                'id' => '1224',
                'user_id' => '1',
                'log_date' => '2023-05-10 02:11:43',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.spk.ahp.umumkan","value":0,"updated_at":"2023-05-09T19:11:43.000000Z","created_at":"2023-05-09T19:11:43.000000Z","id":1}',
            ),
            208 => 
            array (
                'id' => '1225',
                'user_id' => '1',
                'log_date' => '2023-05-10 02:11:43',
                'table_name' => 'setting_activities',
                'log_type' => 'create',
                'data' => '{"key":"setting.spk.ahp.jml_seleksi","value":"3","updated_at":"2023-05-09T19:11:43.000000Z","created_at":"2023-05-09T19:11:43.000000Z","id":2}',
            ),
            209 => 
            array (
                'id' => '1226',
                'user_id' => '1',
                'log_date' => '2023-05-10 10:41:03',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.133","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36 Edg\\/113.0.1774.35"}',
            ),
            210 => 
            array (
                'id' => '1227',
                'user_id' => '1',
                'log_date' => '2023-05-10 12:50:52',
                'table_name' => 'spk_ahp_alternatif',
                'log_type' => 'edit',
                'data' => '{"id":"5","anggota_id":"1","created_at":"2023-05-09 17:29:46","updated_at":"2023-05-09 17:29:46"}',
            ),
            211 => 
            array (
                'id' => '1228',
                'user_id' => '1',
                'log_date' => '2023-05-10 12:50:52',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":"10","kriteria_jenis_id":6,"updated_at":"2023-05-10T05:50:52.000000Z","created_at":"2023-05-10T05:50:52.000000Z","id":91}',
            ),
            212 => 
            array (
                'id' => '1229',
                'user_id' => '1',
                'log_date' => '2023-05-10 12:50:52',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":"11","kriteria_jenis_id":3,"updated_at":"2023-05-10T05:50:52.000000Z","created_at":"2023-05-10T05:50:52.000000Z","id":92}',
            ),
            213 => 
            array (
                'id' => '1230',
                'user_id' => '1',
                'log_date' => '2023-05-10 12:50:52',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":"12","kriteria_jenis_id":14,"updated_at":"2023-05-10T05:50:52.000000Z","created_at":"2023-05-10T05:50:52.000000Z","id":93}',
            ),
            214 => 
            array (
                'id' => '1231',
                'user_id' => '1',
                'log_date' => '2023-05-10 12:50:52',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":"13","kriteria_jenis_id":16,"updated_at":"2023-05-10T05:50:52.000000Z","created_at":"2023-05-10T05:50:52.000000Z","id":94}',
            ),
            215 => 
            array (
                'id' => '1232',
                'user_id' => '1',
                'log_date' => '2023-05-10 12:50:52',
                'table_name' => 'spk_ahp_alternatif_kriteria',
                'log_type' => 'create',
                'data' => '{"alternatif_id":5,"kriteria_id":"14","kriteria_jenis_id":20,"updated_at":"2023-05-10T05:50:52.000000Z","created_at":"2023-05-10T05:50:52.000000Z","id":95}',
            ),
            216 => 
            array (
                'id' => '1233',
                'user_id' => '1',
                'log_date' => '2023-05-11 14:58:37',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.133","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36 Edg\\/113.0.1774.35"}',
            ),
            217 => 
            array (
                'id' => '1234',
                'user_id' => '1',
                'log_date' => '2023-05-11 15:07:47',
                'table_name' => 'setting_activities',
                'log_type' => 'edit',
                'data' => '{"id":"1","key":"setting.spk.ahp.umumkan","value":"0","created_at":"2023-05-10 02:11:43","updated_at":"2023-05-10 02:11:43"}',
            ),
            218 => 
            array (
                'id' => '1235',
                'user_id' => '1',
                'log_date' => '2023-05-11 15:08:06',
                'table_name' => 'setting_activities',
                'log_type' => 'edit',
                'data' => '{"id":"1","key":"setting.spk.ahp.umumkan","value":"1","created_at":"2023-05-10 02:11:43","updated_at":"2023-05-11 15:07:47"}',
            ),
            219 => 
            array (
                'id' => '1236',
                'user_id' => '1',
                'log_date' => '2023-05-11 18:18:35',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.133","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36 Edg\\/113.0.1774.35"}',
            ),
            220 => 
            array (
                'id' => '1237',
                'user_id' => '1',
                'log_date' => '2023-05-12 13:08:51',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.133","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36 Edg\\/113.0.1774.35"}',
            ),
            221 => 
            array (
                'id' => '1238',
                'user_id' => '1',
                'log_date' => '2023-05-12 15:24:26',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.133","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36 Edg\\/113.0.1774.35"}',
            ),
            222 => 
            array (
                'id' => '1239',
                'user_id' => '1',
                'log_date' => '2023-05-12 21:56:56',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.133","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36 Edg\\/113.0.1774.35"}',
            ),
            223 => 
            array (
                'id' => '1240',
                'user_id' => '16',
                'log_date' => '2023-05-14 11:23:10',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"36.74.45.185","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36"}',
            ),
            224 => 
            array (
                'id' => '1241',
                'user_id' => '1',
                'log_date' => '2023-05-15 21:49:27',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.79.121","user_agent":"Mozilla\\/5.0 (Linux; Android 10; K) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Mobile Safari\\/537.36"}',
            ),
            225 => 
            array (
                'id' => '1242',
                'user_id' => '290',
                'log_date' => '2023-05-16 20:55:40',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"290","name":"Rifqi Munawar Ridwan","email":"rifqimunawar48@gmail.com","foto":null,"username":"rifqi-munawar-ridwan20230403161942","email_verified_at":null,"password":"$2y$10$qZB.ejA.OYUqIh1PFprzpeyuIszHuUVXspz39mivoe.NqBVZHpQeC","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":null,"created_at":"2023-04-03 16:19:42","updated_at":"2023-04-03 16:19:42"}',
            ),
            226 => 
            array (
                'id' => '1243',
                'user_id' => '290',
                'log_date' => '2023-05-16 20:55:40',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.211.223","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36"}',
            ),
            227 => 
            array (
                'id' => '1244',
                'user_id' => '290',
                'log_date' => '2023-05-16 21:00:39',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"290","name":"Rifqi Munawar Ridwan","email":"rifqimunawar48@gmail.com","foto":null,"username":"rifqi-munawar-ridwan20230403161942","email_verified_at":null,"password":"$2y$10$qZB.ejA.OYUqIh1PFprzpeyuIszHuUVXspz39mivoe.NqBVZHpQeC","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"NDUz3bluDSkXGoDsN4EXzn8moaJnYWywoa0xI4imQweE46pM3y9PukVi1IGI","created_at":"2023-04-03 16:19:42","updated_at":"2023-04-03 16:19:42"}',
            ),
            228 => 
            array (
                'id' => '1245',
                'user_id' => '290',
                'log_date' => '2023-05-16 21:00:39',
                'table_name' => 'anggotas',
                'log_type' => 'edit',
                'data' => '{"id":"265","nomor_anggota":null,"nama":"Rifqi Munawar Ridwan","tanggal_lahir":null,"jenis_kelamin":null,"angkatan":"2022","province_id":null,"regency_id":null,"district_id":null,"village_id":null,"alamat_lengkap":null,"bio":null,"profesi":null,"foto":null,"telepon":"08561145097","whatsapp":"08561145097","status":null,"user_id":"290","created_at":"2023-04-03 16:19:42","updated_at":"2023-04-03 16:19:42"}',
            ),
            229 => 
            array (
                'id' => '1246',
                'user_id' => '290',
                'log_date' => '2023-05-16 21:00:42',
                'table_name' => 'anggotas',
                'log_type' => 'edit',
                'data' => '{"id":"265","nomor_anggota":null,"nama":"Rifqi Munawar Ridwan","tanggal_lahir":null,"jenis_kelamin":null,"angkatan":"2022","province_id":null,"regency_id":null,"district_id":null,"village_id":null,"alamat_lengkap":null,"bio":"hidup seperti larry","profesi":"Pelajar\\/Mahasiswa","foto":"rifqi-munawar-ridwan2023040316194220230516210039.jpg","telepon":"08561145097","whatsapp":"08561145097","status":null,"user_id":"290","created_at":"2023-04-03 16:19:42","updated_at":"2023-05-16 21:00:39"}',
            ),
            230 => 
            array (
                'id' => '1247',
                'user_id' => '290',
                'log_date' => '2023-05-16 21:00:42',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"290","name":"Rifqi Munawar Ridwan","email":"rifqimunawar48@gmail.com","foto":"rifqi-munawar-ridwan2023040316194220230516210039.jpg","username":"rifqi-munawar-ridwan20230403161942","email_verified_at":null,"password":"$2y$10$qZB.ejA.OYUqIh1PFprzpeyuIszHuUVXspz39mivoe.NqBVZHpQeC","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"NDUz3bluDSkXGoDsN4EXzn8moaJnYWywoa0xI4imQweE46pM3y9PukVi1IGI","created_at":"2023-04-03 16:19:42","updated_at":"2023-05-16 21:00:39"}',
            ),
            231 => 
            array (
                'id' => '1248',
                'user_id' => '290',
                'log_date' => '2023-05-16 21:00:50',
                'table_name' => 'anggotas',
                'log_type' => 'edit',
                'data' => '{"id":"265","nomor_anggota":null,"nama":"Rifqi Munawar Ridwan","tanggal_lahir":"2001-11-05","jenis_kelamin":null,"angkatan":"2022","province_id":null,"regency_id":null,"district_id":null,"village_id":null,"alamat_lengkap":null,"bio":"hidup seperti larry","profesi":"Pelajar\\/Mahasiswa","foto":"rifqi-munawar-ridwan2023040316194220230516210039.jpg","telepon":"08561145097","whatsapp":"085161145097","status":null,"user_id":"290","created_at":"2023-04-03 16:19:42","updated_at":"2023-05-16 21:00:42"}',
            ),
            232 => 
            array (
                'id' => '1249',
                'user_id' => '290',
                'log_date' => '2023-05-16 21:03:26',
                'table_name' => 'anggota_kontaks',
                'log_type' => 'create',
                'data' => '{"anggota_id":"265","jenis_id":"5","nilai":"https:\\/\\/www.instagram.com\\/rifqi_munawar\\/","updated_at":"2023-05-16T14:03:26.000000Z","created_at":"2023-05-16T14:03:26.000000Z","id":129}',
            ),
            233 => 
            array (
                'id' => '1250',
                'user_id' => '290',
                'log_date' => '2023-05-16 21:04:08',
                'table_name' => 'anggota_pendidikans',
                'log_type' => 'create',
                'data' => '{"anggota_id":"265","jenis_id":"5","instansi":"Universitas Islam Nusantara","dari":"2021","sampai":"2025","jurusan":"Teknik Informatika","keterangan":null,"updated_at":"2023-05-16T14:04:08.000000Z","created_at":"2023-05-16T14:04:08.000000Z","id":239}',
            ),
            234 => 
            array (
                'id' => '1251',
                'user_id' => '290',
                'log_date' => '2023-05-16 23:30:37',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.211.223","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36"}',
            ),
            235 => 
            array (
                'id' => '1252',
                'user_id' => '290',
                'log_date' => '2023-05-16 23:32:54',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"290","name":"Rifqi Munawar Ridwan","email":"rifqimunawar48@gmail.com","foto":"rifqi-munawar-ridwan2023040316194220230516210039.jpg","username":"rifqi_munawar","email_verified_at":null,"password":"$2y$10$qZB.ejA.OYUqIh1PFprzpeyuIszHuUVXspz39mivoe.NqBVZHpQeC","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"NDUz3bluDSkXGoDsN4EXzn8moaJnYWywoa0xI4imQweE46pM3y9PukVi1IGI","created_at":"2023-04-03 16:19:42","updated_at":"2023-05-16 21:00:42"}',
            ),
            236 => 
            array (
                'id' => '1253',
                'user_id' => '290',
                'log_date' => '2023-05-17 00:07:35',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.211.223","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/112.0.0.0 Safari\\/537.36"}',
            ),
            237 => 
            array (
                'id' => '1254',
                'user_id' => '1',
                'log_date' => '2023-05-20 13:03:25',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.105","user_agent":"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36"}',
            ),
            238 => 
            array (
                'id' => '1255',
                'user_id' => '1',
                'log_date' => '2023-05-20 13:03:29',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.147.8.105","visitors_id":"604","city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-05-20T06:03:29.000000Z","created_at":"2023-05-20T06:03:29.000000Z","id":81}',
            ),
            239 => 
            array (
                'id' => '1256',
                'user_id' => '1',
                'log_date' => '2023-05-20 13:03:39',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.147.8.105","visitors_id":"605","city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-05-20T06:03:39.000000Z","created_at":"2023-05-20T06:03:39.000000Z","id":82}',
            ),
            240 => 
            array (
                'id' => '1257',
                'user_id' => '1',
                'log_date' => '2023-05-20 13:03:48',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"1","name":"Isep Lutpi Nur","email":"iseplutpinur7@gmail.com","foto":"iseplutpinur20230420144240.png","username":"iseplutpinur","email_verified_at":null,"password":"$2y$10$OlqEyVYw3cMTKRbuQLjPaePcKi1nrmiQVt7T7jIVyE7kJIoaf\\/eUm","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"8CJFiodsLtwCvzJcJB1dUHglxuRe53tQz4reY08n7uvHrIoZ3SazUtIT7He1","created_at":null,"updated_at":"2023-04-23 17:05:22"}',
            ),
            241 => 
            array (
                'id' => '1258',
                'user_id' => '1',
                'log_date' => '2023-05-20 13:03:59',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.105","user_agent":"Mozilla\\/5.0 (Linux; Android 10; K) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Mobile Safari\\/537.36"}',
            ),
            242 => 
            array (
                'id' => '1259',
                'user_id' => '1',
                'log_date' => '2023-05-20 13:04:08',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"1","name":"Isep Lutpi Nur","email":"iseplutpinur7@gmail.com","foto":"iseplutpinur20230420144240.png","username":"iseplutpinur","email_verified_at":null,"password":"$2y$10$OlqEyVYw3cMTKRbuQLjPaePcKi1nrmiQVt7T7jIVyE7kJIoaf\\/eUm","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"pdhAcaOAlQsbgy2WMwaSmgNEy9Z00rzpttygUQ39NHQ23Q8wn0TMDKOtqzIU","created_at":null,"updated_at":"2023-04-23 17:05:22"}',
            ),
            243 => 
            array (
                'id' => '1260',
                'user_id' => '290',
                'log_date' => '2023-05-20 23:46:17',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.244.78","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36"}',
            ),
            244 => 
            array (
                'id' => '1261',
                'user_id' => '290',
                'log_date' => '2023-05-20 23:46:18',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.124.244.78","visitors_id":"611","city":"Jakarta","region":"Jakarta","country_code":"ID","country":"Indonesia","loc":"-6.2146,106.8451","timezone":"Asia\\/Jakarta","updated_at":"2023-05-20T16:46:18.000000Z","created_at":"2023-05-20T16:46:18.000000Z","id":85}',
            ),
            245 => 
            array (
                'id' => '1262',
                'user_id' => '290',
                'log_date' => '2023-05-21 14:21:57',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.211.223","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36"}',
            ),
            246 => 
            array (
                'id' => '1263',
                'user_id' => '290',
                'log_date' => '2023-05-21 14:22:00',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.5.211.223","visitors_id":"626","city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-05-21T07:22:00.000000Z","created_at":"2023-05-21T07:22:00.000000Z","id":89}',
            ),
            247 => 
            array (
                'id' => '1264',
                'user_id' => '290',
                'log_date' => '2023-05-21 19:55:47',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.248.227","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36"}',
            ),
            248 => 
            array (
                'id' => '1265',
                'user_id' => '290',
                'log_date' => '2023-05-21 19:55:47',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.248.227","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36"}',
            ),
            249 => 
            array (
                'id' => '1266',
                'user_id' => '290',
                'log_date' => '2023-05-21 19:55:47',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.5.248.227","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36"}',
            ),
            250 => 
            array (
                'id' => '1267',
                'user_id' => '290',
                'log_date' => '2023-05-22 00:34:10',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.124.205.157","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36"}',
            ),
            251 => 
            array (
                'id' => '1268',
                'user_id' => '290',
                'log_date' => '2023-05-22 00:34:12',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.124.205.157","visitors_id":"633","city":"Jakarta","region":"Jakarta","country_code":"ID","country":"Indonesia","loc":"-6.2146,106.8451","timezone":"Asia\\/Jakarta","updated_at":"2023-05-21T17:34:12.000000Z","created_at":"2023-05-21T17:34:12.000000Z","id":92}',
            ),
            252 => 
            array (
                'id' => '1269',
                'user_id' => '290',
                'log_date' => '2023-05-22 00:36:00',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.124.241.12","visitors_id":"634","city":"Jakarta","region":"Jakarta","country_code":"ID","country":"Indonesia","loc":"-6.2146,106.8451","timezone":"Asia\\/Jakarta","updated_at":"2023-05-21T17:36:00.000000Z","created_at":"2023-05-21T17:36:00.000000Z","id":93}',
            ),
            253 => 
            array (
                'id' => '1270',
                'user_id' => '290',
                'log_date' => '2023-05-22 00:36:14',
                'table_name' => 'artikel',
                'log_type' => 'edit',
            'data' => '{"id":"40","nama":"DISKUSI PUBLIK","slug":"diskusi-publik","foto":"\\/assets\\/artikel\\/diskusi-pu16789612170.png","detail":"<div class=\\"_a9zs\\" style=\'display: inline; color: rgb(38, 38, 38); font-family: -apple-system, BlinkMacSystemFont, \\"Segoe UI\\", Roboto, Helvetica, Arial, sans-serif;\'><img data-bs-filename=\\"330374136_875625676874459_7239910307577273849_n.webp\\" style=\\"width: 640.4px;\\" src=\\"\\/assets\\/artikel\\/diskusi-pu16789612170.png\\"><br><div class=\\"_a9zs\\" style=\'display: inline; color: rgb(38, 38, 38); font-family: -apple-system, BlinkMacSystemFont, \\"Segoe UI\\", Roboto, Helvetica, Arial, sans-serif;\'>Alhamdulillah hirobbil alamin diskusi publik dengan tema \\"Peran Mahasiswa dan Pelajar dalam Mengawal Demokrasi\\" dalam rangka memperingati hari ulang tahun Karmapack ke-18 telah selesai dilaksanakan.<br><br>kami ucapkan terimakasih kepada semua pihak yang telah terlibat dalam kegiatan ini. Sampai jumpa di kegiatan selanjutnya &eth;&#159;&#145;&#139;&eth;&#159;&#145;&#139;<br><br>18 Tahun KARMAPACK<br>\\"Meningkatkan Semangat, Menguatkan Persaudaraan \\"<br><br>11 Februari 2023<br><br>HALING KU AING!<br><br>Instagram :&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz notranslate _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/orda_karmapack\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline;\\">@orda_karmapack<\\/a><br>Facebook : Orda Karmapack<br>__________________________<br><a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/ordakarmapack\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#ordakarmapack<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/karmapack\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#karmapack<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/karmapack2022\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#karmapack2022<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/kabinetsabilulungan\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#kabinetsabilulungan<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/halingkuaing\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#halingkuaing<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/harlah\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#harlah<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/harlahkarmapack18\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#harlahkarmapack18<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/harlahkarmapackke18\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#harlahkarmapackke18<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/orda\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#orda<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/cianjur\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#cianjur<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/cianjurkidul\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#cianjurkidul<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/diskusi\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#diskusi<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/diskusipublik\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#diskusipublik<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/mahasiswa\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#mahasiswa<\\/a>&nbsp;<a class=\\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz  _aa9_ _a6hd\\" href=\\"https:\\/\\/www.instagram.com\\/explore\\/tags\\/pelajar\\/\\" role=\\"link\\" tabindex=\\"0\\" style=\\"cursor: pointer; text-align: inherit; outline: none; border-width: 0px; border-style: initial; border-color: initial; -webkit-tap-highlight-color: transparent; list-style: none; touch-action: manipulation; display: inline; overflow-wrap: break-word;\\">#pelajar<\\/a><\\/div><\\/div>\\n","excerpt":"Alhamdulillah hirobbil alamin diskusi publik dengan tema \\"Peran Mahasiswa dan Pelajar dalam Mengawal Demokrasi\\" dalam rangka memperingati hari ulang tahun Karmapack ke-18 telah selesai dilaksanakan.","counter":"190","date":"2023-02-11","status":"1","created_at":"2023-03-16 17:06:57","updated_at":"2023-05-16 20:52:57","user_id":"1"}',
            ),
            254 => 
            array (
                'id' => '1271',
                'user_id' => '1',
                'log_date' => '2023-05-27 13:21:39',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.116.19","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36 Edg\\/113.0.1774.50"}',
            ),
            255 => 
            array (
                'id' => '1272',
                'user_id' => '1',
                'log_date' => '2023-05-27 13:25:05',
                'table_name' => 'setting_activities',
                'log_type' => 'edit',
                'data' => '{"id":"1","key":"setting.spk.ahp.umumkan","value":"0","created_at":"2023-05-10 02:11:43","updated_at":"2023-05-11 15:08:06"}',
            ),
            256 => 
            array (
                'id' => '1273',
                'user_id' => '1',
                'log_date' => '2023-05-29 14:08:34',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.43","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36 Edg\\/113.0.1774.57"}',
            ),
            257 => 
            array (
                'id' => '1274',
                'user_id' => '1',
                'log_date' => '2023-05-29 14:08:35',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.147.8.43","visitors_id":"780","city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-05-29T07:08:35.000000Z","created_at":"2023-05-29T07:08:35.000000Z","id":131}',
            ),
            258 => 
            array (
                'id' => '1275',
                'user_id' => '1',
                'log_date' => '2023-05-29 14:08:42',
                'table_name' => 'users',
                'log_type' => 'edit',
                'data' => '{"id":"1","name":"Isep Lutpi Nur","email":"iseplutpinur7@gmail.com","foto":"iseplutpinur20230420144240.png","username":"iseplutpinur","email_verified_at":null,"password":"$2y$10$OlqEyVYw3cMTKRbuQLjPaePcKi1nrmiQVt7T7jIVyE7kJIoaf\\/eUm","active":"1","two_factor_secret":null,"two_factor_recovery_codes":null,"two_factor_confirmed_at":null,"current_team_id":null,"profile_photo_path":null,"remember_token":"lk3zn5bSj4jOMhoGQNGIBpqAA23zwLQAk2pz34SJ2alHqdYd9u7OSbN0svOh","created_at":null,"updated_at":"2023-04-23 17:05:22"}',
            ),
            259 => 
            array (
                'id' => '1276',
                'user_id' => '1',
                'log_date' => '2023-06-01 03:15:36',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.43","user_agent":"Mozilla\\/5.0 (Linux; Android 10; K) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Mobile Safari\\/537.36"}',
            ),
            260 => 
            array (
                'id' => '1277',
                'user_id' => '1',
                'log_date' => '2023-06-04 02:19:29',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.43","user_agent":"Mozilla\\/5.0 (Linux; Android 10; K) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Mobile Safari\\/537.36"}',
            ),
            261 => 
            array (
                'id' => '1278',
                'user_id' => '1',
                'log_date' => '2023-06-04 02:19:29',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.43","user_agent":"Mozilla\\/5.0 (Linux; Android 10; K) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Mobile Safari\\/537.36"}',
            ),
            262 => 
            array (
                'id' => '1279',
                'user_id' => '1',
                'log_date' => '2023-06-04 02:19:31',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.147.8.43","visitors_id":"941","city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-06-03T19:19:31.000000Z","created_at":"2023-06-03T19:19:31.000000Z","id":159}',
            ),
            263 => 
            array (
                'id' => '1280',
                'user_id' => '1',
                'log_date' => '2023-06-04 19:39:15',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.147.8.43","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36 Edg\\/113.0.1774.57"}',
            ),
            264 => 
            array (
                'id' => '1281',
                'user_id' => '1',
                'log_date' => '2023-06-07 14:49:26',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.110.107","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/114.0.0.0 Safari\\/537.36 Edg\\/114.0.1823.37"}',
            ),
            265 => 
            array (
                'id' => '1282',
                'user_id' => '1',
                'log_date' => '2023-06-07 15:05:20',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"114.122.110.103","visitors_id":"1021","city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-06-07T08:05:20.000000Z","created_at":"2023-06-07T08:05:20.000000Z","id":180}',
            ),
            266 => 
            array (
                'id' => '1283',
                'user_id' => '1',
                'log_date' => '2023-06-07 17:35:08',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"114.122.110.107","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/114.0.0.0 Safari\\/537.36 Edg\\/114.0.1823.37"}',
            ),
            267 => 
            array (
                'id' => '1284',
                'user_id' => '1',
                'log_date' => '2023-06-13 20:29:37',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.90.64.253","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/114.0.0.0 Safari\\/537.36 Edg\\/114.0.1823.43"}',
            ),
            268 => 
            array (
                'id' => '1285',
                'user_id' => '1',
                'log_date' => '2023-06-13 20:29:38',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.90.64.253","visitors_id":"1153","city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-06-13T13:29:38.000000Z","created_at":"2023-06-13T13:29:38.000000Z","id":196}',
            ),
            269 => 
            array (
                'id' => '1286',
                'user_id' => '1',
                'log_date' => '2023-06-14 10:51:17',
                'table_name' => '',
                'log_type' => 'login',
            'data' => '{"ip":"103.90.64.253","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/114.0.0.0 Safari\\/537.36 Edg\\/114.0.1823.43"}',
            ),
            270 => 
            array (
                'id' => '1287',
                'user_id' => '1',
                'log_date' => '2023-06-14 10:51:18',
                'table_name' => 'visitors_ip_detail',
                'log_type' => 'create',
                'data' => '{"ip":"103.90.64.253","visitors_id":"1186","city":"Bandung","region":"West Java","country_code":"ID","country":"Indonesia","loc":"-6.9222,107.6069","timezone":"Asia\\/Jakarta","updated_at":"2023-06-14T03:51:18.000000Z","created_at":"2023-06-14T03:51:18.000000Z","id":199}',
            ),
        ));
        
        
    }
}