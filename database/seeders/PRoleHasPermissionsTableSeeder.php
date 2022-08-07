<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PRoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('p_role_has_permissions')->delete();
        
        \DB::table('p_role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'role_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 1,
                'role_id' => 2,
            ),
            2 => 
            array (
                'permission_id' => 1,
                'role_id' => 9,
            ),
            3 => 
            array (
                'permission_id' => 2,
                'role_id' => 4,
            ),
            4 => 
            array (
                'permission_id' => 3,
                'role_id' => 4,
            ),
            5 => 
            array (
                'permission_id' => 4,
                'role_id' => 4,
            ),
            6 => 
            array (
                'permission_id' => 5,
                'role_id' => 4,
            ),
            7 => 
            array (
                'permission_id' => 6,
                'role_id' => 4,
            ),
            8 => 
            array (
                'permission_id' => 7,
                'role_id' => 4,
            ),
            9 => 
            array (
                'permission_id' => 12,
                'role_id' => 4,
            ),
            10 => 
            array (
                'permission_id' => 17,
                'role_id' => 4,
            ),
            11 => 
            array (
                'permission_id' => 22,
                'role_id' => 4,
            ),
            12 => 
            array (
                'permission_id' => 27,
                'role_id' => 4,
            ),
            13 => 
            array (
                'permission_id' => 27,
                'role_id' => 10,
            ),
            14 => 
            array (
                'permission_id' => 30,
                'role_id' => 4,
            ),
            15 => 
            array (
                'permission_id' => 30,
                'role_id' => 10,
            ),
            16 => 
            array (
                'permission_id' => 31,
                'role_id' => 4,
            ),
            17 => 
            array (
                'permission_id' => 31,
                'role_id' => 10,
            ),
            18 => 
            array (
                'permission_id' => 32,
                'role_id' => 4,
            ),
            19 => 
            array (
                'permission_id' => 32,
                'role_id' => 10,
            ),
            20 => 
            array (
                'permission_id' => 33,
                'role_id' => 4,
            ),
            21 => 
            array (
                'permission_id' => 33,
                'role_id' => 10,
            ),
            22 => 
            array (
                'permission_id' => 35,
                'role_id' => 4,
            ),
            23 => 
            array (
                'permission_id' => 35,
                'role_id' => 10,
            ),
            24 => 
            array (
                'permission_id' => 36,
                'role_id' => 4,
            ),
            25 => 
            array (
                'permission_id' => 36,
                'role_id' => 10,
            ),
            26 => 
            array (
                'permission_id' => 37,
                'role_id' => 4,
            ),
            27 => 
            array (
                'permission_id' => 37,
                'role_id' => 10,
            ),
            28 => 
            array (
                'permission_id' => 38,
                'role_id' => 4,
            ),
            29 => 
            array (
                'permission_id' => 38,
                'role_id' => 10,
            ),
            30 => 
            array (
                'permission_id' => 40,
                'role_id' => 4,
            ),
            31 => 
            array (
                'permission_id' => 40,
                'role_id' => 10,
            ),
            32 => 
            array (
                'permission_id' => 41,
                'role_id' => 4,
            ),
            33 => 
            array (
                'permission_id' => 41,
                'role_id' => 10,
            ),
            34 => 
            array (
                'permission_id' => 42,
                'role_id' => 4,
            ),
            35 => 
            array (
                'permission_id' => 42,
                'role_id' => 10,
            ),
            36 => 
            array (
                'permission_id' => 43,
                'role_id' => 4,
            ),
            37 => 
            array (
                'permission_id' => 47,
                'role_id' => 4,
            ),
            38 => 
            array (
                'permission_id' => 48,
                'role_id' => 4,
            ),
            39 => 
            array (
                'permission_id' => 54,
                'role_id' => 4,
            ),
            40 => 
            array (
                'permission_id' => 55,
                'role_id' => 4,
            ),
            41 => 
            array (
                'permission_id' => 56,
                'role_id' => 4,
            ),
            42 => 
            array (
                'permission_id' => 57,
                'role_id' => 4,
            ),
            43 => 
            array (
                'permission_id' => 59,
                'role_id' => 4,
            ),
            44 => 
            array (
                'permission_id' => 60,
                'role_id' => 4,
            ),
            45 => 
            array (
                'permission_id' => 61,
                'role_id' => 4,
            ),
            46 => 
            array (
                'permission_id' => 63,
                'role_id' => 4,
            ),
            47 => 
            array (
                'permission_id' => 64,
                'role_id' => 4,
            ),
            48 => 
            array (
                'permission_id' => 65,
                'role_id' => 4,
            ),
            49 => 
            array (
                'permission_id' => 78,
                'role_id' => 4,
            ),
            50 => 
            array (
                'permission_id' => 79,
                'role_id' => 4,
            ),
            51 => 
            array (
                'permission_id' => 80,
                'role_id' => 4,
            ),
            52 => 
            array (
                'permission_id' => 81,
                'role_id' => 4,
            ),
            53 => 
            array (
                'permission_id' => 82,
                'role_id' => 4,
            ),
            54 => 
            array (
                'permission_id' => 83,
                'role_id' => 4,
            ),
            55 => 
            array (
                'permission_id' => 84,
                'role_id' => 4,
            ),
            56 => 
            array (
                'permission_id' => 85,
                'role_id' => 4,
            ),
            57 => 
            array (
                'permission_id' => 109,
                'role_id' => 2,
            ),
            58 => 
            array (
                'permission_id' => 109,
                'role_id' => 3,
            ),
            59 => 
            array (
                'permission_id' => 109,
                'role_id' => 4,
            ),
            60 => 
            array (
                'permission_id' => 109,
                'role_id' => 5,
            ),
            61 => 
            array (
                'permission_id' => 109,
                'role_id' => 6,
            ),
            62 => 
            array (
                'permission_id' => 109,
                'role_id' => 7,
            ),
            63 => 
            array (
                'permission_id' => 109,
                'role_id' => 8,
            ),
            64 => 
            array (
                'permission_id' => 109,
                'role_id' => 9,
            ),
            65 => 
            array (
                'permission_id' => 110,
                'role_id' => 2,
            ),
            66 => 
            array (
                'permission_id' => 110,
                'role_id' => 3,
            ),
            67 => 
            array (
                'permission_id' => 110,
                'role_id' => 4,
            ),
            68 => 
            array (
                'permission_id' => 110,
                'role_id' => 5,
            ),
            69 => 
            array (
                'permission_id' => 110,
                'role_id' => 6,
            ),
            70 => 
            array (
                'permission_id' => 110,
                'role_id' => 7,
            ),
            71 => 
            array (
                'permission_id' => 110,
                'role_id' => 8,
            ),
            72 => 
            array (
                'permission_id' => 110,
                'role_id' => 9,
            ),
            73 => 
            array (
                'permission_id' => 135,
                'role_id' => 2,
            ),
            74 => 
            array (
                'permission_id' => 135,
                'role_id' => 3,
            ),
            75 => 
            array (
                'permission_id' => 135,
                'role_id' => 4,
            ),
            76 => 
            array (
                'permission_id' => 135,
                'role_id' => 5,
            ),
            77 => 
            array (
                'permission_id' => 135,
                'role_id' => 6,
            ),
            78 => 
            array (
                'permission_id' => 135,
                'role_id' => 7,
            ),
            79 => 
            array (
                'permission_id' => 135,
                'role_id' => 8,
            ),
            80 => 
            array (
                'permission_id' => 135,
                'role_id' => 9,
            ),
            81 => 
            array (
                'permission_id' => 136,
                'role_id' => 2,
            ),
            82 => 
            array (
                'permission_id' => 136,
                'role_id' => 3,
            ),
            83 => 
            array (
                'permission_id' => 136,
                'role_id' => 4,
            ),
            84 => 
            array (
                'permission_id' => 136,
                'role_id' => 5,
            ),
            85 => 
            array (
                'permission_id' => 136,
                'role_id' => 6,
            ),
            86 => 
            array (
                'permission_id' => 136,
                'role_id' => 7,
            ),
            87 => 
            array (
                'permission_id' => 136,
                'role_id' => 8,
            ),
            88 => 
            array (
                'permission_id' => 136,
                'role_id' => 9,
            ),
            89 => 
            array (
                'permission_id' => 145,
                'role_id' => 4,
            ),
        ));
        
        
    }
}