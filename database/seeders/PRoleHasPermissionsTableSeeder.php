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
                'role_id' => 3,
            ),
            3 => 
            array (
                'permission_id' => 1,
                'role_id' => 4,
            ),
            4 => 
            array (
                'permission_id' => 1,
                'role_id' => 5,
            ),
            5 => 
            array (
                'permission_id' => 1,
                'role_id' => 6,
            ),
            6 => 
            array (
                'permission_id' => 1,
                'role_id' => 7,
            ),
            7 => 
            array (
                'permission_id' => 1,
                'role_id' => 8,
            ),
            8 => 
            array (
                'permission_id' => 1,
                'role_id' => 9,
            ),
            9 => 
            array (
                'permission_id' => 1,
                'role_id' => 10,
            ),
            10 => 
            array (
                'permission_id' => 2,
                'role_id' => 1,
            ),
            11 => 
            array (
                'permission_id' => 2,
                'role_id' => 2,
            ),
            12 => 
            array (
                'permission_id' => 2,
                'role_id' => 3,
            ),
            13 => 
            array (
                'permission_id' => 2,
                'role_id' => 4,
            ),
            14 => 
            array (
                'permission_id' => 2,
                'role_id' => 5,
            ),
            15 => 
            array (
                'permission_id' => 2,
                'role_id' => 6,
            ),
            16 => 
            array (
                'permission_id' => 2,
                'role_id' => 7,
            ),
            17 => 
            array (
                'permission_id' => 2,
                'role_id' => 8,
            ),
            18 => 
            array (
                'permission_id' => 2,
                'role_id' => 9,
            ),
            19 => 
            array (
                'permission_id' => 2,
                'role_id' => 10,
            ),
            20 => 
            array (
                'permission_id' => 3,
                'role_id' => 4,
            ),
            21 => 
            array (
                'permission_id' => 4,
                'role_id' => 4,
            ),
            22 => 
            array (
                'permission_id' => 5,
                'role_id' => 4,
            ),
            23 => 
            array (
                'permission_id' => 6,
                'role_id' => 4,
            ),
            24 => 
            array (
                'permission_id' => 7,
                'role_id' => 2,
            ),
            25 => 
            array (
                'permission_id' => 7,
                'role_id' => 3,
            ),
            26 => 
            array (
                'permission_id' => 7,
                'role_id' => 4,
            ),
            27 => 
            array (
                'permission_id' => 7,
                'role_id' => 5,
            ),
            28 => 
            array (
                'permission_id' => 7,
                'role_id' => 6,
            ),
            29 => 
            array (
                'permission_id' => 7,
                'role_id' => 7,
            ),
            30 => 
            array (
                'permission_id' => 7,
                'role_id' => 8,
            ),
            31 => 
            array (
                'permission_id' => 7,
                'role_id' => 9,
            ),
            32 => 
            array (
                'permission_id' => 7,
                'role_id' => 10,
            ),
            33 => 
            array (
                'permission_id' => 12,
                'role_id' => 2,
            ),
            34 => 
            array (
                'permission_id' => 12,
                'role_id' => 3,
            ),
            35 => 
            array (
                'permission_id' => 12,
                'role_id' => 4,
            ),
            36 => 
            array (
                'permission_id' => 12,
                'role_id' => 5,
            ),
            37 => 
            array (
                'permission_id' => 12,
                'role_id' => 6,
            ),
            38 => 
            array (
                'permission_id' => 12,
                'role_id' => 7,
            ),
            39 => 
            array (
                'permission_id' => 12,
                'role_id' => 8,
            ),
            40 => 
            array (
                'permission_id' => 12,
                'role_id' => 9,
            ),
            41 => 
            array (
                'permission_id' => 12,
                'role_id' => 10,
            ),
            42 => 
            array (
                'permission_id' => 17,
                'role_id' => 2,
            ),
            43 => 
            array (
                'permission_id' => 17,
                'role_id' => 3,
            ),
            44 => 
            array (
                'permission_id' => 17,
                'role_id' => 4,
            ),
            45 => 
            array (
                'permission_id' => 17,
                'role_id' => 5,
            ),
            46 => 
            array (
                'permission_id' => 17,
                'role_id' => 6,
            ),
            47 => 
            array (
                'permission_id' => 17,
                'role_id' => 7,
            ),
            48 => 
            array (
                'permission_id' => 17,
                'role_id' => 8,
            ),
            49 => 
            array (
                'permission_id' => 17,
                'role_id' => 9,
            ),
            50 => 
            array (
                'permission_id' => 17,
                'role_id' => 10,
            ),
            51 => 
            array (
                'permission_id' => 22,
                'role_id' => 2,
            ),
            52 => 
            array (
                'permission_id' => 22,
                'role_id' => 3,
            ),
            53 => 
            array (
                'permission_id' => 22,
                'role_id' => 4,
            ),
            54 => 
            array (
                'permission_id' => 22,
                'role_id' => 5,
            ),
            55 => 
            array (
                'permission_id' => 22,
                'role_id' => 6,
            ),
            56 => 
            array (
                'permission_id' => 22,
                'role_id' => 7,
            ),
            57 => 
            array (
                'permission_id' => 22,
                'role_id' => 8,
            ),
            58 => 
            array (
                'permission_id' => 22,
                'role_id' => 9,
            ),
            59 => 
            array (
                'permission_id' => 22,
                'role_id' => 10,
            ),
            60 => 
            array (
                'permission_id' => 27,
                'role_id' => 1,
            ),
            61 => 
            array (
                'permission_id' => 27,
                'role_id' => 2,
            ),
            62 => 
            array (
                'permission_id' => 27,
                'role_id' => 3,
            ),
            63 => 
            array (
                'permission_id' => 27,
                'role_id' => 4,
            ),
            64 => 
            array (
                'permission_id' => 27,
                'role_id' => 5,
            ),
            65 => 
            array (
                'permission_id' => 27,
                'role_id' => 6,
            ),
            66 => 
            array (
                'permission_id' => 27,
                'role_id' => 7,
            ),
            67 => 
            array (
                'permission_id' => 27,
                'role_id' => 8,
            ),
            68 => 
            array (
                'permission_id' => 27,
                'role_id' => 9,
            ),
            69 => 
            array (
                'permission_id' => 27,
                'role_id' => 10,
            ),
            70 => 
            array (
                'permission_id' => 30,
                'role_id' => 10,
            ),
            71 => 
            array (
                'permission_id' => 31,
                'role_id' => 10,
            ),
            72 => 
            array (
                'permission_id' => 32,
                'role_id' => 10,
            ),
            73 => 
            array (
                'permission_id' => 33,
                'role_id' => 2,
            ),
            74 => 
            array (
                'permission_id' => 33,
                'role_id' => 3,
            ),
            75 => 
            array (
                'permission_id' => 33,
                'role_id' => 4,
            ),
            76 => 
            array (
                'permission_id' => 33,
                'role_id' => 5,
            ),
            77 => 
            array (
                'permission_id' => 33,
                'role_id' => 6,
            ),
            78 => 
            array (
                'permission_id' => 33,
                'role_id' => 7,
            ),
            79 => 
            array (
                'permission_id' => 33,
                'role_id' => 8,
            ),
            80 => 
            array (
                'permission_id' => 33,
                'role_id' => 9,
            ),
            81 => 
            array (
                'permission_id' => 33,
                'role_id' => 10,
            ),
            82 => 
            array (
                'permission_id' => 35,
                'role_id' => 10,
            ),
            83 => 
            array (
                'permission_id' => 36,
                'role_id' => 10,
            ),
            84 => 
            array (
                'permission_id' => 37,
                'role_id' => 10,
            ),
            85 => 
            array (
                'permission_id' => 38,
                'role_id' => 1,
            ),
            86 => 
            array (
                'permission_id' => 38,
                'role_id' => 2,
            ),
            87 => 
            array (
                'permission_id' => 38,
                'role_id' => 3,
            ),
            88 => 
            array (
                'permission_id' => 38,
                'role_id' => 4,
            ),
            89 => 
            array (
                'permission_id' => 38,
                'role_id' => 5,
            ),
            90 => 
            array (
                'permission_id' => 38,
                'role_id' => 6,
            ),
            91 => 
            array (
                'permission_id' => 38,
                'role_id' => 7,
            ),
            92 => 
            array (
                'permission_id' => 38,
                'role_id' => 8,
            ),
            93 => 
            array (
                'permission_id' => 38,
                'role_id' => 9,
            ),
            94 => 
            array (
                'permission_id' => 38,
                'role_id' => 10,
            ),
            95 => 
            array (
                'permission_id' => 40,
                'role_id' => 10,
            ),
            96 => 
            array (
                'permission_id' => 41,
                'role_id' => 10,
            ),
            97 => 
            array (
                'permission_id' => 42,
                'role_id' => 10,
            ),
            98 => 
            array (
                'permission_id' => 43,
                'role_id' => 2,
            ),
            99 => 
            array (
                'permission_id' => 43,
                'role_id' => 3,
            ),
            100 => 
            array (
                'permission_id' => 43,
                'role_id' => 4,
            ),
            101 => 
            array (
                'permission_id' => 43,
                'role_id' => 5,
            ),
            102 => 
            array (
                'permission_id' => 43,
                'role_id' => 6,
            ),
            103 => 
            array (
                'permission_id' => 43,
                'role_id' => 7,
            ),
            104 => 
            array (
                'permission_id' => 43,
                'role_id' => 8,
            ),
            105 => 
            array (
                'permission_id' => 43,
                'role_id' => 9,
            ),
            106 => 
            array (
                'permission_id' => 43,
                'role_id' => 10,
            ),
            107 => 
            array (
                'permission_id' => 47,
                'role_id' => 3,
            ),
            108 => 
            array (
                'permission_id' => 47,
                'role_id' => 4,
            ),
            109 => 
            array (
                'permission_id' => 47,
                'role_id' => 5,
            ),
            110 => 
            array (
                'permission_id' => 47,
                'role_id' => 6,
            ),
            111 => 
            array (
                'permission_id' => 47,
                'role_id' => 7,
            ),
            112 => 
            array (
                'permission_id' => 47,
                'role_id' => 8,
            ),
            113 => 
            array (
                'permission_id' => 47,
                'role_id' => 10,
            ),
            114 => 
            array (
                'permission_id' => 48,
                'role_id' => 2,
            ),
            115 => 
            array (
                'permission_id' => 48,
                'role_id' => 3,
            ),
            116 => 
            array (
                'permission_id' => 48,
                'role_id' => 4,
            ),
            117 => 
            array (
                'permission_id' => 48,
                'role_id' => 5,
            ),
            118 => 
            array (
                'permission_id' => 48,
                'role_id' => 6,
            ),
            119 => 
            array (
                'permission_id' => 48,
                'role_id' => 7,
            ),
            120 => 
            array (
                'permission_id' => 48,
                'role_id' => 8,
            ),
            121 => 
            array (
                'permission_id' => 48,
                'role_id' => 9,
            ),
            122 => 
            array (
                'permission_id' => 48,
                'role_id' => 10,
            ),
            123 => 
            array (
                'permission_id' => 55,
                'role_id' => 2,
            ),
            124 => 
            array (
                'permission_id' => 55,
                'role_id' => 3,
            ),
            125 => 
            array (
                'permission_id' => 55,
                'role_id' => 4,
            ),
            126 => 
            array (
                'permission_id' => 55,
                'role_id' => 5,
            ),
            127 => 
            array (
                'permission_id' => 55,
                'role_id' => 6,
            ),
            128 => 
            array (
                'permission_id' => 55,
                'role_id' => 7,
            ),
            129 => 
            array (
                'permission_id' => 55,
                'role_id' => 8,
            ),
            130 => 
            array (
                'permission_id' => 55,
                'role_id' => 9,
            ),
            131 => 
            array (
                'permission_id' => 55,
                'role_id' => 10,
            ),
            132 => 
            array (
                'permission_id' => 59,
                'role_id' => 2,
            ),
            133 => 
            array (
                'permission_id' => 59,
                'role_id' => 3,
            ),
            134 => 
            array (
                'permission_id' => 59,
                'role_id' => 4,
            ),
            135 => 
            array (
                'permission_id' => 59,
                'role_id' => 5,
            ),
            136 => 
            array (
                'permission_id' => 59,
                'role_id' => 6,
            ),
            137 => 
            array (
                'permission_id' => 59,
                'role_id' => 7,
            ),
            138 => 
            array (
                'permission_id' => 59,
                'role_id' => 8,
            ),
            139 => 
            array (
                'permission_id' => 59,
                'role_id' => 9,
            ),
            140 => 
            array (
                'permission_id' => 59,
                'role_id' => 10,
            ),
            141 => 
            array (
                'permission_id' => 61,
                'role_id' => 2,
            ),
            142 => 
            array (
                'permission_id' => 61,
                'role_id' => 3,
            ),
            143 => 
            array (
                'permission_id' => 61,
                'role_id' => 4,
            ),
            144 => 
            array (
                'permission_id' => 61,
                'role_id' => 5,
            ),
            145 => 
            array (
                'permission_id' => 61,
                'role_id' => 6,
            ),
            146 => 
            array (
                'permission_id' => 61,
                'role_id' => 7,
            ),
            147 => 
            array (
                'permission_id' => 61,
                'role_id' => 8,
            ),
            148 => 
            array (
                'permission_id' => 61,
                'role_id' => 9,
            ),
            149 => 
            array (
                'permission_id' => 61,
                'role_id' => 10,
            ),
            150 => 
            array (
                'permission_id' => 63,
                'role_id' => 4,
            ),
            151 => 
            array (
                'permission_id' => 64,
                'role_id' => 4,
            ),
            152 => 
            array (
                'permission_id' => 65,
                'role_id' => 4,
            ),
            153 => 
            array (
                'permission_id' => 66,
                'role_id' => 2,
            ),
            154 => 
            array (
                'permission_id' => 66,
                'role_id' => 3,
            ),
            155 => 
            array (
                'permission_id' => 66,
                'role_id' => 4,
            ),
            156 => 
            array (
                'permission_id' => 66,
                'role_id' => 5,
            ),
            157 => 
            array (
                'permission_id' => 66,
                'role_id' => 6,
            ),
            158 => 
            array (
                'permission_id' => 66,
                'role_id' => 7,
            ),
            159 => 
            array (
                'permission_id' => 66,
                'role_id' => 8,
            ),
            160 => 
            array (
                'permission_id' => 66,
                'role_id' => 9,
            ),
            161 => 
            array (
                'permission_id' => 66,
                'role_id' => 10,
            ),
            162 => 
            array (
                'permission_id' => 70,
                'role_id' => 2,
            ),
            163 => 
            array (
                'permission_id' => 70,
                'role_id' => 3,
            ),
            164 => 
            array (
                'permission_id' => 70,
                'role_id' => 4,
            ),
            165 => 
            array (
                'permission_id' => 70,
                'role_id' => 5,
            ),
            166 => 
            array (
                'permission_id' => 70,
                'role_id' => 6,
            ),
            167 => 
            array (
                'permission_id' => 70,
                'role_id' => 7,
            ),
            168 => 
            array (
                'permission_id' => 70,
                'role_id' => 8,
            ),
            169 => 
            array (
                'permission_id' => 70,
                'role_id' => 9,
            ),
            170 => 
            array (
                'permission_id' => 70,
                'role_id' => 10,
            ),
            171 => 
            array (
                'permission_id' => 74,
                'role_id' => 2,
            ),
            172 => 
            array (
                'permission_id' => 74,
                'role_id' => 3,
            ),
            173 => 
            array (
                'permission_id' => 74,
                'role_id' => 4,
            ),
            174 => 
            array (
                'permission_id' => 74,
                'role_id' => 5,
            ),
            175 => 
            array (
                'permission_id' => 74,
                'role_id' => 6,
            ),
            176 => 
            array (
                'permission_id' => 74,
                'role_id' => 7,
            ),
            177 => 
            array (
                'permission_id' => 74,
                'role_id' => 8,
            ),
            178 => 
            array (
                'permission_id' => 74,
                'role_id' => 9,
            ),
            179 => 
            array (
                'permission_id' => 74,
                'role_id' => 10,
            ),
            180 => 
            array (
                'permission_id' => 78,
                'role_id' => 2,
            ),
            181 => 
            array (
                'permission_id' => 78,
                'role_id' => 3,
            ),
            182 => 
            array (
                'permission_id' => 78,
                'role_id' => 4,
            ),
            183 => 
            array (
                'permission_id' => 78,
                'role_id' => 5,
            ),
            184 => 
            array (
                'permission_id' => 78,
                'role_id' => 6,
            ),
            185 => 
            array (
                'permission_id' => 78,
                'role_id' => 7,
            ),
            186 => 
            array (
                'permission_id' => 78,
                'role_id' => 8,
            ),
            187 => 
            array (
                'permission_id' => 78,
                'role_id' => 9,
            ),
            188 => 
            array (
                'permission_id' => 78,
                'role_id' => 10,
            ),
            189 => 
            array (
                'permission_id' => 79,
                'role_id' => 4,
            ),
            190 => 
            array (
                'permission_id' => 80,
                'role_id' => 4,
            ),
            191 => 
            array (
                'permission_id' => 81,
                'role_id' => 4,
            ),
            192 => 
            array (
                'permission_id' => 82,
                'role_id' => 2,
            ),
            193 => 
            array (
                'permission_id' => 82,
                'role_id' => 3,
            ),
            194 => 
            array (
                'permission_id' => 82,
                'role_id' => 4,
            ),
            195 => 
            array (
                'permission_id' => 82,
                'role_id' => 5,
            ),
            196 => 
            array (
                'permission_id' => 82,
                'role_id' => 6,
            ),
            197 => 
            array (
                'permission_id' => 82,
                'role_id' => 7,
            ),
            198 => 
            array (
                'permission_id' => 82,
                'role_id' => 8,
            ),
            199 => 
            array (
                'permission_id' => 82,
                'role_id' => 9,
            ),
            200 => 
            array (
                'permission_id' => 82,
                'role_id' => 10,
            ),
            201 => 
            array (
                'permission_id' => 83,
                'role_id' => 4,
            ),
            202 => 
            array (
                'permission_id' => 84,
                'role_id' => 4,
            ),
            203 => 
            array (
                'permission_id' => 85,
                'role_id' => 4,
            ),
            204 => 
            array (
                'permission_id' => 86,
                'role_id' => 2,
            ),
            205 => 
            array (
                'permission_id' => 86,
                'role_id' => 3,
            ),
            206 => 
            array (
                'permission_id' => 86,
                'role_id' => 4,
            ),
            207 => 
            array (
                'permission_id' => 86,
                'role_id' => 5,
            ),
            208 => 
            array (
                'permission_id' => 86,
                'role_id' => 6,
            ),
            209 => 
            array (
                'permission_id' => 86,
                'role_id' => 7,
            ),
            210 => 
            array (
                'permission_id' => 86,
                'role_id' => 8,
            ),
            211 => 
            array (
                'permission_id' => 86,
                'role_id' => 9,
            ),
            212 => 
            array (
                'permission_id' => 86,
                'role_id' => 10,
            ),
            213 => 
            array (
                'permission_id' => 89,
                'role_id' => 2,
            ),
            214 => 
            array (
                'permission_id' => 89,
                'role_id' => 3,
            ),
            215 => 
            array (
                'permission_id' => 89,
                'role_id' => 4,
            ),
            216 => 
            array (
                'permission_id' => 89,
                'role_id' => 5,
            ),
            217 => 
            array (
                'permission_id' => 89,
                'role_id' => 6,
            ),
            218 => 
            array (
                'permission_id' => 89,
                'role_id' => 7,
            ),
            219 => 
            array (
                'permission_id' => 89,
                'role_id' => 8,
            ),
            220 => 
            array (
                'permission_id' => 89,
                'role_id' => 9,
            ),
            221 => 
            array (
                'permission_id' => 89,
                'role_id' => 10,
            ),
            222 => 
            array (
                'permission_id' => 94,
                'role_id' => 2,
            ),
            223 => 
            array (
                'permission_id' => 94,
                'role_id' => 3,
            ),
            224 => 
            array (
                'permission_id' => 94,
                'role_id' => 4,
            ),
            225 => 
            array (
                'permission_id' => 94,
                'role_id' => 5,
            ),
            226 => 
            array (
                'permission_id' => 94,
                'role_id' => 6,
            ),
            227 => 
            array (
                'permission_id' => 94,
                'role_id' => 7,
            ),
            228 => 
            array (
                'permission_id' => 94,
                'role_id' => 8,
            ),
            229 => 
            array (
                'permission_id' => 94,
                'role_id' => 9,
            ),
            230 => 
            array (
                'permission_id' => 94,
                'role_id' => 10,
            ),
            231 => 
            array (
                'permission_id' => 97,
                'role_id' => 2,
            ),
            232 => 
            array (
                'permission_id' => 97,
                'role_id' => 3,
            ),
            233 => 
            array (
                'permission_id' => 97,
                'role_id' => 4,
            ),
            234 => 
            array (
                'permission_id' => 97,
                'role_id' => 5,
            ),
            235 => 
            array (
                'permission_id' => 97,
                'role_id' => 6,
            ),
            236 => 
            array (
                'permission_id' => 97,
                'role_id' => 7,
            ),
            237 => 
            array (
                'permission_id' => 97,
                'role_id' => 8,
            ),
            238 => 
            array (
                'permission_id' => 97,
                'role_id' => 9,
            ),
            239 => 
            array (
                'permission_id' => 97,
                'role_id' => 10,
            ),
            240 => 
            array (
                'permission_id' => 102,
                'role_id' => 2,
            ),
            241 => 
            array (
                'permission_id' => 102,
                'role_id' => 3,
            ),
            242 => 
            array (
                'permission_id' => 102,
                'role_id' => 4,
            ),
            243 => 
            array (
                'permission_id' => 102,
                'role_id' => 5,
            ),
            244 => 
            array (
                'permission_id' => 102,
                'role_id' => 6,
            ),
            245 => 
            array (
                'permission_id' => 102,
                'role_id' => 7,
            ),
            246 => 
            array (
                'permission_id' => 102,
                'role_id' => 8,
            ),
            247 => 
            array (
                'permission_id' => 102,
                'role_id' => 9,
            ),
            248 => 
            array (
                'permission_id' => 102,
                'role_id' => 10,
            ),
            249 => 
            array (
                'permission_id' => 109,
                'role_id' => 1,
            ),
            250 => 
            array (
                'permission_id' => 109,
                'role_id' => 2,
            ),
            251 => 
            array (
                'permission_id' => 109,
                'role_id' => 3,
            ),
            252 => 
            array (
                'permission_id' => 109,
                'role_id' => 4,
            ),
            253 => 
            array (
                'permission_id' => 109,
                'role_id' => 5,
            ),
            254 => 
            array (
                'permission_id' => 109,
                'role_id' => 6,
            ),
            255 => 
            array (
                'permission_id' => 109,
                'role_id' => 7,
            ),
            256 => 
            array (
                'permission_id' => 109,
                'role_id' => 8,
            ),
            257 => 
            array (
                'permission_id' => 109,
                'role_id' => 9,
            ),
            258 => 
            array (
                'permission_id' => 109,
                'role_id' => 10,
            ),
            259 => 
            array (
                'permission_id' => 110,
                'role_id' => 2,
            ),
            260 => 
            array (
                'permission_id' => 110,
                'role_id' => 3,
            ),
            261 => 
            array (
                'permission_id' => 110,
                'role_id' => 4,
            ),
            262 => 
            array (
                'permission_id' => 110,
                'role_id' => 5,
            ),
            263 => 
            array (
                'permission_id' => 110,
                'role_id' => 6,
            ),
            264 => 
            array (
                'permission_id' => 110,
                'role_id' => 7,
            ),
            265 => 
            array (
                'permission_id' => 110,
                'role_id' => 8,
            ),
            266 => 
            array (
                'permission_id' => 110,
                'role_id' => 9,
            ),
            267 => 
            array (
                'permission_id' => 110,
                'role_id' => 10,
            ),
            268 => 
            array (
                'permission_id' => 135,
                'role_id' => 2,
            ),
            269 => 
            array (
                'permission_id' => 135,
                'role_id' => 3,
            ),
            270 => 
            array (
                'permission_id' => 135,
                'role_id' => 4,
            ),
            271 => 
            array (
                'permission_id' => 135,
                'role_id' => 5,
            ),
            272 => 
            array (
                'permission_id' => 135,
                'role_id' => 6,
            ),
            273 => 
            array (
                'permission_id' => 135,
                'role_id' => 7,
            ),
            274 => 
            array (
                'permission_id' => 135,
                'role_id' => 8,
            ),
            275 => 
            array (
                'permission_id' => 135,
                'role_id' => 9,
            ),
            276 => 
            array (
                'permission_id' => 135,
                'role_id' => 10,
            ),
            277 => 
            array (
                'permission_id' => 136,
                'role_id' => 2,
            ),
            278 => 
            array (
                'permission_id' => 136,
                'role_id' => 3,
            ),
            279 => 
            array (
                'permission_id' => 136,
                'role_id' => 4,
            ),
            280 => 
            array (
                'permission_id' => 136,
                'role_id' => 5,
            ),
            281 => 
            array (
                'permission_id' => 136,
                'role_id' => 6,
            ),
            282 => 
            array (
                'permission_id' => 136,
                'role_id' => 7,
            ),
            283 => 
            array (
                'permission_id' => 136,
                'role_id' => 8,
            ),
            284 => 
            array (
                'permission_id' => 136,
                'role_id' => 9,
            ),
            285 => 
            array (
                'permission_id' => 137,
                'role_id' => 2,
            ),
            286 => 
            array (
                'permission_id' => 137,
                'role_id' => 3,
            ),
            287 => 
            array (
                'permission_id' => 137,
                'role_id' => 4,
            ),
            288 => 
            array (
                'permission_id' => 137,
                'role_id' => 5,
            ),
            289 => 
            array (
                'permission_id' => 137,
                'role_id' => 6,
            ),
            290 => 
            array (
                'permission_id' => 137,
                'role_id' => 7,
            ),
            291 => 
            array (
                'permission_id' => 137,
                'role_id' => 8,
            ),
            292 => 
            array (
                'permission_id' => 137,
                'role_id' => 9,
            ),
            293 => 
            array (
                'permission_id' => 145,
                'role_id' => 4,
            ),
            294 => 
            array (
                'permission_id' => 147,
                'role_id' => 3,
            ),
            295 => 
            array (
                'permission_id' => 147,
                'role_id' => 4,
            ),
            296 => 
            array (
                'permission_id' => 147,
                'role_id' => 5,
            ),
            297 => 
            array (
                'permission_id' => 147,
                'role_id' => 6,
            ),
            298 => 
            array (
                'permission_id' => 147,
                'role_id' => 7,
            ),
            299 => 
            array (
                'permission_id' => 147,
                'role_id' => 8,
            ),
            300 => 
            array (
                'permission_id' => 148,
                'role_id' => 3,
            ),
            301 => 
            array (
                'permission_id' => 148,
                'role_id' => 4,
            ),
            302 => 
            array (
                'permission_id' => 148,
                'role_id' => 5,
            ),
            303 => 
            array (
                'permission_id' => 148,
                'role_id' => 7,
            ),
            304 => 
            array (
                'permission_id' => 148,
                'role_id' => 8,
            ),
            305 => 
            array (
                'permission_id' => 149,
                'role_id' => 3,
            ),
            306 => 
            array (
                'permission_id' => 149,
                'role_id' => 4,
            ),
            307 => 
            array (
                'permission_id' => 149,
                'role_id' => 5,
            ),
            308 => 
            array (
                'permission_id' => 149,
                'role_id' => 7,
            ),
            309 => 
            array (
                'permission_id' => 149,
                'role_id' => 8,
            ),
            310 => 
            array (
                'permission_id' => 150,
                'role_id' => 3,
            ),
            311 => 
            array (
                'permission_id' => 150,
                'role_id' => 4,
            ),
            312 => 
            array (
                'permission_id' => 150,
                'role_id' => 5,
            ),
            313 => 
            array (
                'permission_id' => 150,
                'role_id' => 7,
            ),
            314 => 
            array (
                'permission_id' => 150,
                'role_id' => 8,
            ),
            315 => 
            array (
                'permission_id' => 151,
                'role_id' => 3,
            ),
            316 => 
            array (
                'permission_id' => 151,
                'role_id' => 4,
            ),
            317 => 
            array (
                'permission_id' => 151,
                'role_id' => 5,
            ),
            318 => 
            array (
                'permission_id' => 151,
                'role_id' => 6,
            ),
            319 => 
            array (
                'permission_id' => 151,
                'role_id' => 7,
            ),
            320 => 
            array (
                'permission_id' => 151,
                'role_id' => 8,
            ),
            321 => 
            array (
                'permission_id' => 152,
                'role_id' => 4,
            ),
            322 => 
            array (
                'permission_id' => 153,
                'role_id' => 4,
            ),
            323 => 
            array (
                'permission_id' => 154,
                'role_id' => 4,
            ),
            324 => 
            array (
                'permission_id' => 155,
                'role_id' => 7,
            ),
            325 => 
            array (
                'permission_id' => 155,
                'role_id' => 9,
            ),
            326 => 
            array (
                'permission_id' => 156,
                'role_id' => 6,
            ),
            327 => 
            array (
                'permission_id' => 161,
                'role_id' => 1,
            ),
            328 => 
            array (
                'permission_id' => 161,
                'role_id' => 3,
            ),
            329 => 
            array (
                'permission_id' => 161,
                'role_id' => 4,
            ),
            330 => 
            array (
                'permission_id' => 161,
                'role_id' => 5,
            ),
            331 => 
            array (
                'permission_id' => 161,
                'role_id' => 6,
            ),
            332 => 
            array (
                'permission_id' => 161,
                'role_id' => 7,
            ),
            333 => 
            array (
                'permission_id' => 161,
                'role_id' => 8,
            ),
            334 => 
            array (
                'permission_id' => 166,
                'role_id' => 5,
            ),
            335 => 
            array (
                'permission_id' => 168,
                'role_id' => 4,
            ),
            336 => 
            array (
                'permission_id' => 168,
                'role_id' => 5,
            ),
            337 => 
            array (
                'permission_id' => 168,
                'role_id' => 6,
            ),
            338 => 
            array (
                'permission_id' => 169,
                'role_id' => 3,
            ),
            339 => 
            array (
                'permission_id' => 169,
                'role_id' => 4,
            ),
            340 => 
            array (
                'permission_id' => 169,
                'role_id' => 5,
            ),
            341 => 
            array (
                'permission_id' => 169,
                'role_id' => 6,
            ),
            342 => 
            array (
                'permission_id' => 169,
                'role_id' => 7,
            ),
            343 => 
            array (
                'permission_id' => 169,
                'role_id' => 8,
            ),
            344 => 
            array (
                'permission_id' => 170,
                'role_id' => 2,
            ),
            345 => 
            array (
                'permission_id' => 170,
                'role_id' => 3,
            ),
            346 => 
            array (
                'permission_id' => 170,
                'role_id' => 4,
            ),
            347 => 
            array (
                'permission_id' => 170,
                'role_id' => 5,
            ),
            348 => 
            array (
                'permission_id' => 170,
                'role_id' => 6,
            ),
            349 => 
            array (
                'permission_id' => 170,
                'role_id' => 7,
            ),
            350 => 
            array (
                'permission_id' => 171,
                'role_id' => 1,
            ),
            351 => 
            array (
                'permission_id' => 171,
                'role_id' => 3,
            ),
            352 => 
            array (
                'permission_id' => 171,
                'role_id' => 4,
            ),
            353 => 
            array (
                'permission_id' => 171,
                'role_id' => 5,
            ),
            354 => 
            array (
                'permission_id' => 171,
                'role_id' => 6,
            ),
            355 => 
            array (
                'permission_id' => 171,
                'role_id' => 7,
            ),
            356 => 
            array (
                'permission_id' => 171,
                'role_id' => 8,
            ),
        ));
        
        
    }
}