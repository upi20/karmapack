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
                'model_id' => 1,
            ),
            2 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 16,
            ),
            3 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 17,
            ),
            4 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 19,
            ),
            5 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 20,
            ),
            6 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 21,
            ),
            7 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 22,
            ),
            8 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 23,
            ),
            9 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 24,
            ),
            10 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 26,
            ),
            11 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 27,
            ),
            12 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 28,
            ),
            13 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 29,
            ),
            14 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 30,
            ),
            15 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 31,
            ),
            16 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 32,
            ),
            17 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 33,
            ),
            18 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 34,
            ),
            19 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 35,
            ),
            20 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 36,
            ),
            21 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 37,
            ),
            22 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 38,
            ),
            23 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 39,
            ),
            24 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 40,
            ),
            25 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 41,
            ),
            26 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 42,
            ),
            27 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 43,
            ),
            28 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 44,
            ),
            29 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 45,
            ),
            30 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 46,
            ),
            31 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 47,
            ),
            32 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 49,
            ),
            33 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 50,
            ),
            34 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 51,
            ),
            35 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 52,
            ),
            36 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 53,
            ),
            37 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 54,
            ),
            38 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 55,
            ),
            39 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 57,
            ),
            40 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 58,
            ),
            41 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 59,
            ),
            42 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 60,
            ),
            43 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 61,
            ),
            44 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 62,
            ),
            45 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 63,
            ),
            46 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 64,
            ),
            47 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 65,
            ),
            48 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 67,
            ),
            49 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 68,
            ),
            50 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 69,
            ),
            51 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 70,
            ),
            52 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 71,
            ),
            53 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 72,
            ),
            54 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 73,
            ),
            55 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 74,
            ),
            56 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 75,
            ),
            57 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 76,
            ),
            58 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 77,
            ),
            59 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 78,
            ),
            60 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 79,
            ),
            61 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 80,
            ),
            62 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 81,
            ),
            63 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 82,
            ),
            64 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 83,
            ),
            65 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 84,
            ),
            66 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 85,
            ),
            67 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 86,
            ),
            68 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 87,
            ),
            69 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 89,
            ),
            70 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 90,
            ),
            71 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 91,
            ),
            72 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 92,
            ),
            73 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 93,
            ),
            74 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 94,
            ),
            75 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 95,
            ),
            76 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 96,
            ),
            77 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 97,
            ),
            78 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 98,
            ),
            79 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 99,
            ),
            80 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 100,
            ),
            81 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 101,
            ),
            82 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 106,
            ),
            83 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 108,
            ),
            84 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 109,
            ),
            85 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 110,
            ),
            86 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 111,
            ),
        ));
        
        
    }
}