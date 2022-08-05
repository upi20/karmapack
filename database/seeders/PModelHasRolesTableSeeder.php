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
                'model_id' => 16,
            ),
            2 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 17,
            ),
            3 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 19,
            ),
            4 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 20,
            ),
            5 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 21,
            ),
            6 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 22,
            ),
            7 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 23,
            ),
            8 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 24,
            ),
            9 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 26,
            ),
            10 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 27,
            ),
            11 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 28,
            ),
            12 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 29,
            ),
            13 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 30,
            ),
            14 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 31,
            ),
            15 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 32,
            ),
            16 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 33,
            ),
            17 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 34,
            ),
            18 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 35,
            ),
            19 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 36,
            ),
            20 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 37,
            ),
            21 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 38,
            ),
            22 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 39,
            ),
            23 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 40,
            ),
            24 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 41,
            ),
            25 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 42,
            ),
            26 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 43,
            ),
            27 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 44,
            ),
            28 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 45,
            ),
            29 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 46,
            ),
            30 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 47,
            ),
            31 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 49,
            ),
            32 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 50,
            ),
            33 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 51,
            ),
            34 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 52,
            ),
            35 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 53,
            ),
            36 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 54,
            ),
            37 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 55,
            ),
            38 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 57,
            ),
            39 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 58,
            ),
            40 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 59,
            ),
            41 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 60,
            ),
            42 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 61,
            ),
            43 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 62,
            ),
            44 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 63,
            ),
            45 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 64,
            ),
            46 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 65,
            ),
            47 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 67,
            ),
            48 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 68,
            ),
            49 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 69,
            ),
            50 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 70,
            ),
            51 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 71,
            ),
            52 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 72,
            ),
            53 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 73,
            ),
            54 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 74,
            ),
            55 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 75,
            ),
            56 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 76,
            ),
            57 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 77,
            ),
            58 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 78,
            ),
            59 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 79,
            ),
            60 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 80,
            ),
            61 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 81,
            ),
            62 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 82,
            ),
            63 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 83,
            ),
            64 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 84,
            ),
            65 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 85,
            ),
            66 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 86,
            ),
            67 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 87,
            ),
            68 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 89,
            ),
            69 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 90,
            ),
            70 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 91,
            ),
            71 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 92,
            ),
            72 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 93,
            ),
            73 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 94,
            ),
            74 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 95,
            ),
            75 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 96,
            ),
            76 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 97,
            ),
            77 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 98,
            ),
            78 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 99,
            ),
            79 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 100,
            ),
            80 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 101,
            ),
            81 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 106,
            ),
            82 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 108,
            ),
            83 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 109,
            ),
            84 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 110,
            ),
            85 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 111,
            ),
        ));
        
        
    }
}