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
                'id' => 75,
                'jabatan_id' => 7,
                'user_id' => 17,
                'created_at' => '2022-04-21 14:58:12',
                'updated_at' => '2022-04-21 14:58:12',
            ),
            43 => 
            array (
                'id' => 76,
                'jabatan_id' => 7,
                'user_id' => 21,
                'created_at' => '2022-04-21 14:58:12',
                'updated_at' => '2022-04-21 14:58:12',
            ),
            44 => 
            array (
                'id' => 77,
                'jabatan_id' => 7,
                'user_id' => 59,
                'created_at' => '2022-04-21 14:58:12',
                'updated_at' => '2022-04-21 14:58:12',
            ),
            45 => 
            array (
                'id' => 78,
                'jabatan_id' => 7,
                'user_id' => 1,
                'created_at' => '2022-04-21 14:58:12',
                'updated_at' => '2022-04-21 14:58:12',
            ),
            46 => 
            array (
                'id' => 79,
                'jabatan_id' => 38,
                'user_id' => 37,
                'created_at' => '2022-05-02 19:49:06',
                'updated_at' => '2022-05-02 19:49:06',
            ),
            47 => 
            array (
                'id' => 80,
                'jabatan_id' => 39,
                'user_id' => 33,
                'created_at' => '2022-05-02 19:49:20',
                'updated_at' => '2022-05-02 19:49:20',
            ),
            48 => 
            array (
                'id' => 81,
                'jabatan_id' => 40,
                'user_id' => 51,
                'created_at' => '2022-05-02 19:49:47',
                'updated_at' => '2022-05-02 19:49:47',
            ),
            49 => 
            array (
                'id' => 82,
                'jabatan_id' => 40,
                'user_id' => 50,
                'created_at' => '2022-05-02 19:49:47',
                'updated_at' => '2022-05-02 19:49:47',
            ),
            50 => 
            array (
                'id' => 83,
                'jabatan_id' => 40,
                'user_id' => 22,
                'created_at' => '2022-05-02 19:49:47',
                'updated_at' => '2022-05-02 19:49:47',
            ),
            51 => 
            array (
                'id' => 84,
                'jabatan_id' => 41,
                'user_id' => 57,
                'created_at' => '2022-07-15 16:23:18',
                'updated_at' => '2022-07-15 16:23:18',
            ),
            52 => 
            array (
                'id' => 85,
                'jabatan_id' => 42,
                'user_id' => 32,
                'created_at' => '2022-07-15 16:23:27',
                'updated_at' => '2022-07-15 16:23:27',
            ),
            53 => 
            array (
                'id' => 86,
                'jabatan_id' => 43,
                'user_id' => 26,
                'created_at' => '2022-07-15 16:24:20',
                'updated_at' => '2022-07-15 16:24:20',
            ),
            54 => 
            array (
                'id' => 87,
                'jabatan_id' => 45,
                'user_id' => 21,
                'created_at' => '2022-07-15 16:26:07',
                'updated_at' => '2022-07-15 16:26:07',
            ),
            55 => 
            array (
                'id' => 88,
                'jabatan_id' => 46,
                'user_id' => 99,
                'created_at' => '2022-07-15 16:26:14',
                'updated_at' => '2022-07-15 16:26:14',
            ),
            56 => 
            array (
                'id' => 89,
                'jabatan_id' => 47,
                'user_id' => 1,
                'created_at' => '2022-07-15 16:27:13',
                'updated_at' => '2022-07-15 16:27:13',
            ),
            57 => 
            array (
                'id' => 90,
                'jabatan_id' => 47,
                'user_id' => 101,
                'created_at' => '2022-07-15 16:27:13',
                'updated_at' => '2022-07-15 16:27:13',
            ),
            58 => 
            array (
                'id' => 91,
                'jabatan_id' => 47,
                'user_id' => 17,
                'created_at' => '2022-07-15 16:27:13',
                'updated_at' => '2022-07-15 16:27:13',
            ),
            59 => 
            array (
                'id' => 92,
                'jabatan_id' => 47,
                'user_id' => 19,
                'created_at' => '2022-07-15 16:27:13',
                'updated_at' => '2022-07-15 16:27:13',
            ),
            60 => 
            array (
                'id' => 93,
                'jabatan_id' => 47,
                'user_id' => 106,
                'created_at' => '2022-07-15 16:27:13',
                'updated_at' => '2022-07-15 16:27:13',
            ),
            61 => 
            array (
                'id' => 94,
                'jabatan_id' => 61,
                'user_id' => 68,
                'created_at' => '2022-07-15 16:30:05',
                'updated_at' => '2022-07-15 16:30:05',
            ),
            62 => 
            array (
                'id' => 95,
                'jabatan_id' => 62,
                'user_id' => 27,
                'created_at' => '2022-07-15 16:30:22',
                'updated_at' => '2022-07-15 16:30:22',
            ),
            63 => 
            array (
                'id' => 96,
                'jabatan_id' => 63,
                'user_id' => 46,
                'created_at' => '2022-07-15 16:31:01',
                'updated_at' => '2022-07-15 16:31:01',
            ),
            64 => 
            array (
                'id' => 97,
                'jabatan_id' => 63,
                'user_id' => 72,
                'created_at' => '2022-07-15 16:31:01',
                'updated_at' => '2022-07-15 16:31:01',
            ),
            65 => 
            array (
                'id' => 98,
                'jabatan_id' => 63,
                'user_id' => 73,
                'created_at' => '2022-07-15 16:31:01',
                'updated_at' => '2022-07-15 16:31:01',
            ),
            66 => 
            array (
                'id' => 99,
                'jabatan_id' => 63,
                'user_id' => 74,
                'created_at' => '2022-07-15 16:31:01',
                'updated_at' => '2022-07-15 16:31:01',
            ),
            67 => 
            array (
                'id' => 100,
                'jabatan_id' => 63,
                'user_id' => 75,
                'created_at' => '2022-07-15 16:31:01',
                'updated_at' => '2022-07-15 16:31:01',
            ),
            68 => 
            array (
                'id' => 101,
                'jabatan_id' => 63,
                'user_id' => 76,
                'created_at' => '2022-07-15 16:31:01',
                'updated_at' => '2022-07-15 16:31:01',
            ),
            69 => 
            array (
                'id' => 102,
                'jabatan_id' => 65,
                'user_id' => 33,
                'created_at' => '2022-07-15 16:34:42',
                'updated_at' => '2022-07-15 16:34:42',
            ),
            70 => 
            array (
                'id' => 103,
                'jabatan_id' => 66,
                'user_id' => 34,
                'created_at' => '2022-07-15 16:34:50',
                'updated_at' => '2022-07-15 16:34:50',
            ),
            71 => 
            array (
                'id' => 110,
                'jabatan_id' => 67,
                'user_id' => 30,
                'created_at' => '2022-07-15 16:35:48',
                'updated_at' => '2022-07-15 16:35:48',
            ),
            72 => 
            array (
                'id' => 111,
                'jabatan_id' => 67,
                'user_id' => 77,
                'created_at' => '2022-07-15 16:35:48',
                'updated_at' => '2022-07-15 16:35:48',
            ),
            73 => 
            array (
                'id' => 112,
                'jabatan_id' => 67,
                'user_id' => 78,
                'created_at' => '2022-07-15 16:35:48',
                'updated_at' => '2022-07-15 16:35:48',
            ),
            74 => 
            array (
                'id' => 113,
                'jabatan_id' => 67,
                'user_id' => 69,
                'created_at' => '2022-07-15 16:35:48',
                'updated_at' => '2022-07-15 16:35:48',
            ),
            75 => 
            array (
                'id' => 114,
                'jabatan_id' => 67,
                'user_id' => 79,
                'created_at' => '2022-07-15 16:35:48',
                'updated_at' => '2022-07-15 16:35:48',
            ),
            76 => 
            array (
                'id' => 115,
                'jabatan_id' => 67,
                'user_id' => 80,
                'created_at' => '2022-07-15 16:35:48',
                'updated_at' => '2022-07-15 16:35:48',
            ),
            77 => 
            array (
                'id' => 116,
                'jabatan_id' => 53,
                'user_id' => 65,
                'created_at' => '2022-07-15 16:39:16',
                'updated_at' => '2022-07-15 16:39:16',
            ),
            78 => 
            array (
                'id' => 117,
                'jabatan_id' => 54,
                'user_id' => 64,
                'created_at' => '2022-07-15 16:39:31',
                'updated_at' => '2022-07-15 16:39:31',
            ),
            79 => 
            array (
                'id' => 118,
                'jabatan_id' => 76,
                'user_id' => 45,
                'created_at' => '2022-07-15 16:41:00',
                'updated_at' => '2022-07-15 16:41:00',
            ),
            80 => 
            array (
                'id' => 119,
                'jabatan_id' => 76,
                'user_id' => 81,
                'created_at' => '2022-07-15 16:41:00',
                'updated_at' => '2022-07-15 16:41:00',
            ),
            81 => 
            array (
                'id' => 120,
                'jabatan_id' => 76,
                'user_id' => 82,
                'created_at' => '2022-07-15 16:41:00',
                'updated_at' => '2022-07-15 16:41:00',
            ),
            82 => 
            array (
                'id' => 121,
                'jabatan_id' => 76,
                'user_id' => 83,
                'created_at' => '2022-07-15 16:41:00',
                'updated_at' => '2022-07-15 16:41:00',
            ),
            83 => 
            array (
                'id' => 122,
                'jabatan_id' => 76,
                'user_id' => 84,
                'created_at' => '2022-07-15 16:41:00',
                'updated_at' => '2022-07-15 16:41:00',
            ),
            84 => 
            array (
                'id' => 123,
                'jabatan_id' => 76,
                'user_id' => 85,
                'created_at' => '2022-07-15 16:41:00',
                'updated_at' => '2022-07-15 16:41:00',
            ),
            85 => 
            array (
                'id' => 124,
                'jabatan_id' => 75,
                'user_id' => 86,
                'created_at' => '2022-07-15 16:45:18',
                'updated_at' => '2022-07-15 16:45:18',
            ),
            86 => 
            array (
                'id' => 125,
                'jabatan_id' => 75,
                'user_id' => 87,
                'created_at' => '2022-07-15 16:45:18',
                'updated_at' => '2022-07-15 16:45:18',
            ),
            87 => 
            array (
                'id' => 126,
                'jabatan_id' => 75,
                'user_id' => 23,
                'created_at' => '2022-07-15 16:45:18',
                'updated_at' => '2022-07-15 16:45:18',
            ),
            88 => 
            array (
                'id' => 127,
                'jabatan_id' => 75,
                'user_id' => 89,
                'created_at' => '2022-07-15 16:45:18',
                'updated_at' => '2022-07-15 16:45:18',
            ),
            89 => 
            array (
                'id' => 128,
                'jabatan_id' => 75,
                'user_id' => 90,
                'created_at' => '2022-07-15 16:45:18',
                'updated_at' => '2022-07-15 16:45:18',
            ),
            90 => 
            array (
                'id' => 129,
                'jabatan_id' => 75,
                'user_id' => 91,
                'created_at' => '2022-07-15 16:45:18',
                'updated_at' => '2022-07-15 16:45:18',
            ),
            91 => 
            array (
                'id' => 130,
                'jabatan_id' => 74,
                'user_id' => 51,
                'created_at' => '2022-07-15 16:45:20',
                'updated_at' => '2022-07-15 16:45:20',
            ),
            92 => 
            array (
                'id' => 131,
                'jabatan_id' => 73,
                'user_id' => 22,
                'created_at' => '2022-07-15 16:45:22',
                'updated_at' => '2022-07-15 16:45:22',
            ),
            93 => 
            array (
                'id' => 132,
                'jabatan_id' => 57,
                'user_id' => 92,
                'created_at' => '2022-07-15 16:46:05',
                'updated_at' => '2022-07-15 16:46:05',
            ),
            94 => 
            array (
                'id' => 133,
                'jabatan_id' => 58,
                'user_id' => 63,
                'created_at' => '2022-07-15 16:46:18',
                'updated_at' => '2022-07-15 16:46:18',
            ),
            95 => 
            array (
                'id' => 134,
                'jabatan_id' => 59,
                'user_id' => 93,
                'created_at' => '2022-07-15 16:47:38',
                'updated_at' => '2022-07-15 16:47:38',
            ),
            96 => 
            array (
                'id' => 135,
                'jabatan_id' => 59,
                'user_id' => 94,
                'created_at' => '2022-07-15 16:47:38',
                'updated_at' => '2022-07-15 16:47:38',
            ),
            97 => 
            array (
                'id' => 136,
                'jabatan_id' => 59,
                'user_id' => 95,
                'created_at' => '2022-07-15 16:47:38',
                'updated_at' => '2022-07-15 16:47:38',
            ),
            98 => 
            array (
                'id' => 137,
                'jabatan_id' => 59,
                'user_id' => 43,
                'created_at' => '2022-07-15 16:47:38',
                'updated_at' => '2022-07-15 16:47:38',
            ),
            99 => 
            array (
                'id' => 138,
                'jabatan_id' => 59,
                'user_id' => 96,
                'created_at' => '2022-07-15 16:47:38',
                'updated_at' => '2022-07-15 16:47:38',
            ),
            100 => 
            array (
                'id' => 139,
                'jabatan_id' => 59,
                'user_id' => 97,
                'created_at' => '2022-07-15 16:47:38',
                'updated_at' => '2022-07-15 16:47:38',
            ),
            101 => 
            array (
                'id' => 140,
                'jabatan_id' => 59,
                'user_id' => 98,
                'created_at' => '2022-07-15 16:47:38',
                'updated_at' => '2022-07-15 16:47:38',
            ),
            102 => 
            array (
                'id' => 141,
                'jabatan_id' => 69,
                'user_id' => 58,
                'created_at' => '2022-07-15 16:48:47',
                'updated_at' => '2022-07-15 16:48:47',
            ),
            103 => 
            array (
                'id' => 142,
                'jabatan_id' => 70,
                'user_id' => 35,
                'created_at' => '2022-07-15 16:48:54',
                'updated_at' => '2022-07-15 16:48:54',
            ),
            104 => 
            array (
                'id' => 143,
                'jabatan_id' => 77,
                'user_id' => 108,
                'created_at' => '2022-07-15 16:49:24',
                'updated_at' => '2022-07-15 16:49:24',
            ),
            105 => 
            array (
                'id' => 144,
                'jabatan_id' => 77,
                'user_id' => 109,
                'created_at' => '2022-07-15 16:49:24',
                'updated_at' => '2022-07-15 16:49:24',
            ),
            106 => 
            array (
                'id' => 145,
                'jabatan_id' => 77,
                'user_id' => 110,
                'created_at' => '2022-07-15 16:49:24',
                'updated_at' => '2022-07-15 16:49:24',
            ),
            107 => 
            array (
                'id' => 146,
                'jabatan_id' => 77,
                'user_id' => 111,
                'created_at' => '2022-07-15 16:49:24',
                'updated_at' => '2022-07-15 16:49:24',
            ),
            108 => 
            array (
                'id' => 147,
                'jabatan_id' => 77,
                'user_id' => 54,
                'created_at' => '2022-07-15 16:49:24',
                'updated_at' => '2022-07-15 16:49:24',
            ),
            109 => 
            array (
                'id' => 148,
                'jabatan_id' => 77,
                'user_id' => 24,
                'created_at' => '2022-07-15 16:49:25',
                'updated_at' => '2022-07-15 16:49:25',
            ),
        ));
        
        
    }
}