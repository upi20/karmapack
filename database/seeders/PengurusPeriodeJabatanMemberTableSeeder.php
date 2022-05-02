<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengurusPeriodeJabatanMemberTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pengurus_periode_jabatan_member')->delete();
        
        \DB::table('pengurus_periode_jabatan_member')->insert(array (
            0 => 
            array (
                'id' => 26,
                'jabatan_id' => 3,
                'user_id' => 20,
                'created_at' => '2022-02-21 13:20:32',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 28,
                'jabatan_id' => 17,
                'user_id' => 44,
                'created_at' => '2022-02-21 13:21:10',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 29,
                'jabatan_id' => 18,
                'user_id' => 49,
                'created_at' => '2022-02-21 13:21:41',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 30,
                'jabatan_id' => 8,
                'user_id' => 16,
                'created_at' => '2022-02-21 13:22:13',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 31,
                'jabatan_id' => 9,
                'user_id' => 19,
                'created_at' => '2022-02-21 13:23:19',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 36,
                'jabatan_id' => 11,
                'user_id' => 26,
                'created_at' => '2022-02-21 13:29:48',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 37,
                'jabatan_id' => 12,
                'user_id' => 55,
                'created_at' => '2022-02-21 13:29:56',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 38,
                'jabatan_id' => 13,
                'user_id' => 60,
                'created_at' => '2022-02-21 13:30:39',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 39,
                'jabatan_id' => 13,
                'user_id' => 53,
                'created_at' => '2022-02-21 13:30:47',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 40,
                'jabatan_id' => 13,
                'user_id' => 52,
                'created_at' => '2022-02-21 13:31:00',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 41,
                'jabatan_id' => 13,
                'user_id' => 31,
                'created_at' => '2022-02-21 13:31:16',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 42,
                'jabatan_id' => 13,
                'user_id' => 61,
                'created_at' => '2022-02-21 13:32:25',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 43,
                'jabatan_id' => 24,
                'user_id' => 62,
                'created_at' => '2022-02-21 13:33:48',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 44,
                'jabatan_id' => 23,
                'user_id' => 57,
                'created_at' => '2022-02-21 13:34:17',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 45,
                'jabatan_id' => 25,
                'user_id' => 63,
                'created_at' => '2022-02-21 13:35:31',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 46,
                'jabatan_id' => 25,
                'user_id' => 42,
                'created_at' => '2022-02-21 13:35:54',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 47,
                'jabatan_id' => 25,
                'user_id' => 45,
                'created_at' => '2022-02-21 13:36:03',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 48,
                'jabatan_id' => 25,
                'user_id' => 64,
                'created_at' => '2022-02-21 13:37:00',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 49,
                'jabatan_id' => 32,
                'user_id' => 32,
                'created_at' => '2022-02-21 13:43:52',
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 50,
                'jabatan_id' => 33,
                'user_id' => 65,
                'created_at' => '2022-02-21 13:45:00',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 51,
                'jabatan_id' => 34,
                'user_id' => 34,
                'created_at' => '2022-02-21 13:47:10',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 52,
                'jabatan_id' => 34,
                'user_id' => 30,
                'created_at' => '2022-02-21 13:47:18',
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 53,
                'jabatan_id' => 34,
                'user_id' => 29,
                'created_at' => '2022-02-21 13:47:37',
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 54,
                'jabatan_id' => 34,
                'user_id' => 67,
                'created_at' => '2022-02-21 13:47:43',
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 55,
                'jabatan_id' => 29,
                'user_id' => 68,
                'created_at' => '2022-02-21 13:51:08',
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 56,
                'jabatan_id' => 30,
                'user_id' => 47,
                'created_at' => '2022-02-21 13:51:27',
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 57,
                'jabatan_id' => 31,
                'user_id' => 24,
                'created_at' => '2022-02-21 13:51:35',
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 58,
                'jabatan_id' => 31,
                'user_id' => 69,
                'created_at' => '2022-02-21 13:52:28',
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 59,
                'jabatan_id' => 31,
                'user_id' => 27,
                'created_at' => '2022-02-21 13:52:37',
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 60,
                'jabatan_id' => 31,
                'user_id' => 35,
                'created_at' => '2022-02-21 13:52:41',
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 62,
                'jabatan_id' => 26,
                'user_id' => 38,
                'created_at' => '2022-02-22 00:20:26',
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 63,
                'jabatan_id' => 27,
                'user_id' => 39,
                'created_at' => '2022-02-22 00:20:35',
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 64,
                'jabatan_id' => 28,
                'user_id' => 28,
                'created_at' => '2022-02-22 00:20:54',
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 65,
                'jabatan_id' => 28,
                'user_id' => 41,
                'created_at' => '2022-02-22 00:21:00',
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 66,
                'jabatan_id' => 28,
                'user_id' => 40,
                'created_at' => '2022-02-22 00:21:10',
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 67,
                'jabatan_id' => 28,
                'user_id' => 70,
                'created_at' => '2022-02-22 00:22:30',
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 68,
                'jabatan_id' => 35,
                'user_id' => 71,
                'created_at' => '2022-02-22 00:27:44',
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 69,
                'jabatan_id' => 36,
                'user_id' => 58,
                'created_at' => '2022-02-22 00:27:56',
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 70,
                'jabatan_id' => 37,
                'user_id' => 23,
                'created_at' => '2022-02-22 00:28:09',
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 71,
                'jabatan_id' => 37,
                'user_id' => 43,
                'created_at' => '2022-02-22 00:28:20',
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 72,
                'jabatan_id' => 37,
                'user_id' => 46,
                'created_at' => '2022-02-22 00:28:33',
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 73,
                'jabatan_id' => 37,
                'user_id' => 54,
                'created_at' => '2022-02-22 00:28:40',
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 74,
                'jabatan_id' => 41,
                'user_id' => 20,
                'created_at' => '2022-04-21 14:38:23',
                'updated_at' => '2022-04-21 14:38:23',
            ),
            43 => 
            array (
                'id' => 75,
                'jabatan_id' => 7,
                'user_id' => 17,
                'created_at' => '2022-04-21 14:58:12',
                'updated_at' => '2022-04-21 14:58:12',
            ),
            44 => 
            array (
                'id' => 76,
                'jabatan_id' => 7,
                'user_id' => 21,
                'created_at' => '2022-04-21 14:58:12',
                'updated_at' => '2022-04-21 14:58:12',
            ),
            45 => 
            array (
                'id' => 77,
                'jabatan_id' => 7,
                'user_id' => 59,
                'created_at' => '2022-04-21 14:58:12',
                'updated_at' => '2022-04-21 14:58:12',
            ),
            46 => 
            array (
                'id' => 78,
                'jabatan_id' => 7,
                'user_id' => 1,
                'created_at' => '2022-04-21 14:58:12',
                'updated_at' => '2022-04-21 14:58:12',
            ),
            47 => 
            array (
                'id' => 79,
                'jabatan_id' => 38,
                'user_id' => 37,
                'created_at' => '2022-05-02 19:49:06',
                'updated_at' => '2022-05-02 19:49:06',
            ),
            48 => 
            array (
                'id' => 80,
                'jabatan_id' => 39,
                'user_id' => 33,
                'created_at' => '2022-05-02 19:49:20',
                'updated_at' => '2022-05-02 19:49:20',
            ),
            49 => 
            array (
                'id' => 81,
                'jabatan_id' => 40,
                'user_id' => 51,
                'created_at' => '2022-05-02 19:49:47',
                'updated_at' => '2022-05-02 19:49:47',
            ),
            50 => 
            array (
                'id' => 82,
                'jabatan_id' => 40,
                'user_id' => 50,
                'created_at' => '2022-05-02 19:49:47',
                'updated_at' => '2022-05-02 19:49:47',
            ),
            51 => 
            array (
                'id' => 83,
                'jabatan_id' => 40,
                'user_id' => 22,
                'created_at' => '2022-05-02 19:49:47',
                'updated_at' => '2022-05-02 19:49:47',
            ),
        ));
        
        
    }
}