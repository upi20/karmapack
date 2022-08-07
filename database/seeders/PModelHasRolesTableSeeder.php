<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PModelHasRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('p_model_has_roles')->delete();
        
        \DB::table('p_model_has_roles')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'model_type' => 'App\\Models\\User',
                'model_id' => 1,
            ),
            1 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 17,
            ),
            2 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 19,
            ),
            3 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 20,
            ),
            4 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 22,
            ),
            5 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 23,
            ),
            6 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 24,
            ),
            7 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 27,
            ),
            8 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 28,
            ),
            9 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 29,
            ),
            10 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 30,
            ),
            11 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 31,
            ),
            12 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 33,
            ),
            13 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 34,
            ),
            14 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 35,
            ),
            15 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 36,
            ),
            16 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 37,
            ),
            17 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 38,
            ),
            18 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 40,
            ),
            19 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 41,
            ),
            20 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 42,
            ),
            21 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 43,
            ),
            22 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 44,
            ),
            23 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 45,
            ),
            24 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 46,
            ),
            25 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 47,
            ),
            26 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 49,
            ),
            27 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 50,
            ),
            28 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 51,
            ),
            29 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 52,
            ),
            30 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 53,
            ),
            31 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 54,
            ),
            32 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 55,
            ),
            33 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 58,
            ),
            34 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 59,
            ),
            35 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 60,
            ),
            36 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 61,
            ),
            37 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 62,
            ),
            38 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 63,
            ),
            39 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 64,
            ),
            40 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 67,
            ),
            41 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 68,
            ),
            42 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 69,
            ),
            43 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 70,
            ),
            44 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 71,
            ),
            45 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 72,
            ),
            46 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 73,
            ),
            47 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 74,
            ),
            48 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 75,
            ),
            49 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 76,
            ),
            50 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 77,
            ),
            51 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 78,
            ),
            52 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 79,
            ),
            53 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 80,
            ),
            54 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 81,
            ),
            55 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 82,
            ),
            56 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 83,
            ),
            57 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 84,
            ),
            58 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 85,
            ),
            59 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 86,
            ),
            60 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 87,
            ),
            61 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 89,
            ),
            62 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 90,
            ),
            63 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 91,
            ),
            64 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 92,
            ),
            65 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 93,
            ),
            66 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 94,
            ),
            67 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 95,
            ),
            68 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 96,
            ),
            69 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 97,
            ),
            70 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 98,
            ),
            71 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 99,
            ),
            72 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 100,
            ),
            73 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 101,
            ),
            74 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 106,
            ),
            75 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 108,
            ),
            76 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 109,
            ),
            77 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 110,
            ),
            78 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 111,
            ),
            79 => 
            array (
                'role_id' => 4,
                'model_type' => 'App\\Models\\User',
                'model_id' => 57,
            ),
            80 => 
            array (
                'role_id' => 5,
                'model_type' => 'App\\Models\\User',
                'model_id' => 32,
            ),
            81 => 
            array (
                'role_id' => 6,
                'model_type' => 'App\\Models\\User',
                'model_id' => 26,
            ),
            82 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\Models\\User',
                'model_id' => 21,
            ),
            83 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\Models\\User',
                'model_id' => 65,
            ),
            84 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\Models\\User',
                'model_id' => 16,
            ),
            85 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\Models\\User',
                'model_id' => 39,
            ),
            86 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 16,
            ),
        ));
        
        
    }
}