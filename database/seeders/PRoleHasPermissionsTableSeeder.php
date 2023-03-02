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
                'role_id' => 1,
            ),
            74 => 
            array (
                'permission_id' => 33,
                'role_id' => 2,
            ),
            75 => 
            array (
                'permission_id' => 33,
                'role_id' => 3,
            ),
            76 => 
            array (
                'permission_id' => 33,
                'role_id' => 4,
            ),
            77 => 
            array (
                'permission_id' => 33,
                'role_id' => 5,
            ),
            78 => 
            array (
                'permission_id' => 33,
                'role_id' => 6,
            ),
            79 => 
            array (
                'permission_id' => 33,
                'role_id' => 7,
            ),
            80 => 
            array (
                'permission_id' => 33,
                'role_id' => 8,
            ),
            81 => 
            array (
                'permission_id' => 33,
                'role_id' => 9,
            ),
            82 => 
            array (
                'permission_id' => 33,
                'role_id' => 10,
            ),
            83 => 
            array (
                'permission_id' => 35,
                'role_id' => 10,
            ),
            84 => 
            array (
                'permission_id' => 36,
                'role_id' => 10,
            ),
            85 => 
            array (
                'permission_id' => 37,
                'role_id' => 10,
            ),
            86 => 
            array (
                'permission_id' => 38,
                'role_id' => 1,
            ),
            87 => 
            array (
                'permission_id' => 38,
                'role_id' => 2,
            ),
            88 => 
            array (
                'permission_id' => 38,
                'role_id' => 3,
            ),
            89 => 
            array (
                'permission_id' => 38,
                'role_id' => 4,
            ),
            90 => 
            array (
                'permission_id' => 38,
                'role_id' => 5,
            ),
            91 => 
            array (
                'permission_id' => 38,
                'role_id' => 6,
            ),
            92 => 
            array (
                'permission_id' => 38,
                'role_id' => 7,
            ),
            93 => 
            array (
                'permission_id' => 38,
                'role_id' => 8,
            ),
            94 => 
            array (
                'permission_id' => 38,
                'role_id' => 9,
            ),
            95 => 
            array (
                'permission_id' => 38,
                'role_id' => 10,
            ),
            96 => 
            array (
                'permission_id' => 40,
                'role_id' => 10,
            ),
            97 => 
            array (
                'permission_id' => 41,
                'role_id' => 10,
            ),
            98 => 
            array (
                'permission_id' => 42,
                'role_id' => 10,
            ),
            99 => 
            array (
                'permission_id' => 43,
                'role_id' => 2,
            ),
            100 => 
            array (
                'permission_id' => 43,
                'role_id' => 3,
            ),
            101 => 
            array (
                'permission_id' => 43,
                'role_id' => 4,
            ),
            102 => 
            array (
                'permission_id' => 43,
                'role_id' => 5,
            ),
            103 => 
            array (
                'permission_id' => 43,
                'role_id' => 6,
            ),
            104 => 
            array (
                'permission_id' => 43,
                'role_id' => 7,
            ),
            105 => 
            array (
                'permission_id' => 43,
                'role_id' => 8,
            ),
            106 => 
            array (
                'permission_id' => 43,
                'role_id' => 9,
            ),
            107 => 
            array (
                'permission_id' => 43,
                'role_id' => 10,
            ),
            108 => 
            array (
                'permission_id' => 47,
                'role_id' => 3,
            ),
            109 => 
            array (
                'permission_id' => 47,
                'role_id' => 4,
            ),
            110 => 
            array (
                'permission_id' => 47,
                'role_id' => 5,
            ),
            111 => 
            array (
                'permission_id' => 47,
                'role_id' => 6,
            ),
            112 => 
            array (
                'permission_id' => 47,
                'role_id' => 7,
            ),
            113 => 
            array (
                'permission_id' => 47,
                'role_id' => 8,
            ),
            114 => 
            array (
                'permission_id' => 47,
                'role_id' => 10,
            ),
            115 => 
            array (
                'permission_id' => 48,
                'role_id' => 2,
            ),
            116 => 
            array (
                'permission_id' => 48,
                'role_id' => 3,
            ),
            117 => 
            array (
                'permission_id' => 48,
                'role_id' => 4,
            ),
            118 => 
            array (
                'permission_id' => 48,
                'role_id' => 5,
            ),
            119 => 
            array (
                'permission_id' => 48,
                'role_id' => 6,
            ),
            120 => 
            array (
                'permission_id' => 48,
                'role_id' => 7,
            ),
            121 => 
            array (
                'permission_id' => 48,
                'role_id' => 8,
            ),
            122 => 
            array (
                'permission_id' => 48,
                'role_id' => 9,
            ),
            123 => 
            array (
                'permission_id' => 48,
                'role_id' => 10,
            ),
            124 => 
            array (
                'permission_id' => 55,
                'role_id' => 2,
            ),
            125 => 
            array (
                'permission_id' => 55,
                'role_id' => 3,
            ),
            126 => 
            array (
                'permission_id' => 55,
                'role_id' => 4,
            ),
            127 => 
            array (
                'permission_id' => 55,
                'role_id' => 5,
            ),
            128 => 
            array (
                'permission_id' => 55,
                'role_id' => 6,
            ),
            129 => 
            array (
                'permission_id' => 55,
                'role_id' => 7,
            ),
            130 => 
            array (
                'permission_id' => 55,
                'role_id' => 8,
            ),
            131 => 
            array (
                'permission_id' => 55,
                'role_id' => 9,
            ),
            132 => 
            array (
                'permission_id' => 55,
                'role_id' => 10,
            ),
            133 => 
            array (
                'permission_id' => 59,
                'role_id' => 2,
            ),
            134 => 
            array (
                'permission_id' => 59,
                'role_id' => 3,
            ),
            135 => 
            array (
                'permission_id' => 59,
                'role_id' => 4,
            ),
            136 => 
            array (
                'permission_id' => 59,
                'role_id' => 5,
            ),
            137 => 
            array (
                'permission_id' => 59,
                'role_id' => 6,
            ),
            138 => 
            array (
                'permission_id' => 59,
                'role_id' => 7,
            ),
            139 => 
            array (
                'permission_id' => 59,
                'role_id' => 8,
            ),
            140 => 
            array (
                'permission_id' => 59,
                'role_id' => 9,
            ),
            141 => 
            array (
                'permission_id' => 59,
                'role_id' => 10,
            ),
            142 => 
            array (
                'permission_id' => 61,
                'role_id' => 1,
            ),
            143 => 
            array (
                'permission_id' => 61,
                'role_id' => 2,
            ),
            144 => 
            array (
                'permission_id' => 61,
                'role_id' => 3,
            ),
            145 => 
            array (
                'permission_id' => 61,
                'role_id' => 4,
            ),
            146 => 
            array (
                'permission_id' => 61,
                'role_id' => 5,
            ),
            147 => 
            array (
                'permission_id' => 61,
                'role_id' => 6,
            ),
            148 => 
            array (
                'permission_id' => 61,
                'role_id' => 7,
            ),
            149 => 
            array (
                'permission_id' => 61,
                'role_id' => 8,
            ),
            150 => 
            array (
                'permission_id' => 61,
                'role_id' => 9,
            ),
            151 => 
            array (
                'permission_id' => 61,
                'role_id' => 10,
            ),
            152 => 
            array (
                'permission_id' => 63,
                'role_id' => 4,
            ),
            153 => 
            array (
                'permission_id' => 64,
                'role_id' => 4,
            ),
            154 => 
            array (
                'permission_id' => 65,
                'role_id' => 4,
            ),
            155 => 
            array (
                'permission_id' => 66,
                'role_id' => 2,
            ),
            156 => 
            array (
                'permission_id' => 66,
                'role_id' => 3,
            ),
            157 => 
            array (
                'permission_id' => 66,
                'role_id' => 4,
            ),
            158 => 
            array (
                'permission_id' => 66,
                'role_id' => 5,
            ),
            159 => 
            array (
                'permission_id' => 66,
                'role_id' => 6,
            ),
            160 => 
            array (
                'permission_id' => 66,
                'role_id' => 7,
            ),
            161 => 
            array (
                'permission_id' => 66,
                'role_id' => 8,
            ),
            162 => 
            array (
                'permission_id' => 66,
                'role_id' => 9,
            ),
            163 => 
            array (
                'permission_id' => 66,
                'role_id' => 10,
            ),
            164 => 
            array (
                'permission_id' => 70,
                'role_id' => 2,
            ),
            165 => 
            array (
                'permission_id' => 70,
                'role_id' => 3,
            ),
            166 => 
            array (
                'permission_id' => 70,
                'role_id' => 4,
            ),
            167 => 
            array (
                'permission_id' => 70,
                'role_id' => 5,
            ),
            168 => 
            array (
                'permission_id' => 70,
                'role_id' => 6,
            ),
            169 => 
            array (
                'permission_id' => 70,
                'role_id' => 7,
            ),
            170 => 
            array (
                'permission_id' => 70,
                'role_id' => 8,
            ),
            171 => 
            array (
                'permission_id' => 70,
                'role_id' => 9,
            ),
            172 => 
            array (
                'permission_id' => 70,
                'role_id' => 10,
            ),
            173 => 
            array (
                'permission_id' => 74,
                'role_id' => 2,
            ),
            174 => 
            array (
                'permission_id' => 74,
                'role_id' => 3,
            ),
            175 => 
            array (
                'permission_id' => 74,
                'role_id' => 4,
            ),
            176 => 
            array (
                'permission_id' => 74,
                'role_id' => 5,
            ),
            177 => 
            array (
                'permission_id' => 74,
                'role_id' => 6,
            ),
            178 => 
            array (
                'permission_id' => 74,
                'role_id' => 7,
            ),
            179 => 
            array (
                'permission_id' => 74,
                'role_id' => 8,
            ),
            180 => 
            array (
                'permission_id' => 74,
                'role_id' => 9,
            ),
            181 => 
            array (
                'permission_id' => 74,
                'role_id' => 10,
            ),
            182 => 
            array (
                'permission_id' => 78,
                'role_id' => 1,
            ),
            183 => 
            array (
                'permission_id' => 78,
                'role_id' => 2,
            ),
            184 => 
            array (
                'permission_id' => 78,
                'role_id' => 3,
            ),
            185 => 
            array (
                'permission_id' => 78,
                'role_id' => 4,
            ),
            186 => 
            array (
                'permission_id' => 78,
                'role_id' => 5,
            ),
            187 => 
            array (
                'permission_id' => 78,
                'role_id' => 6,
            ),
            188 => 
            array (
                'permission_id' => 78,
                'role_id' => 7,
            ),
            189 => 
            array (
                'permission_id' => 78,
                'role_id' => 8,
            ),
            190 => 
            array (
                'permission_id' => 78,
                'role_id' => 9,
            ),
            191 => 
            array (
                'permission_id' => 78,
                'role_id' => 10,
            ),
            192 => 
            array (
                'permission_id' => 79,
                'role_id' => 4,
            ),
            193 => 
            array (
                'permission_id' => 80,
                'role_id' => 4,
            ),
            194 => 
            array (
                'permission_id' => 81,
                'role_id' => 4,
            ),
            195 => 
            array (
                'permission_id' => 82,
                'role_id' => 1,
            ),
            196 => 
            array (
                'permission_id' => 82,
                'role_id' => 2,
            ),
            197 => 
            array (
                'permission_id' => 82,
                'role_id' => 3,
            ),
            198 => 
            array (
                'permission_id' => 82,
                'role_id' => 4,
            ),
            199 => 
            array (
                'permission_id' => 82,
                'role_id' => 5,
            ),
            200 => 
            array (
                'permission_id' => 82,
                'role_id' => 6,
            ),
            201 => 
            array (
                'permission_id' => 82,
                'role_id' => 7,
            ),
            202 => 
            array (
                'permission_id' => 82,
                'role_id' => 8,
            ),
            203 => 
            array (
                'permission_id' => 82,
                'role_id' => 9,
            ),
            204 => 
            array (
                'permission_id' => 82,
                'role_id' => 10,
            ),
            205 => 
            array (
                'permission_id' => 83,
                'role_id' => 4,
            ),
            206 => 
            array (
                'permission_id' => 84,
                'role_id' => 4,
            ),
            207 => 
            array (
                'permission_id' => 85,
                'role_id' => 4,
            ),
            208 => 
            array (
                'permission_id' => 86,
                'role_id' => 2,
            ),
            209 => 
            array (
                'permission_id' => 86,
                'role_id' => 3,
            ),
            210 => 
            array (
                'permission_id' => 86,
                'role_id' => 4,
            ),
            211 => 
            array (
                'permission_id' => 86,
                'role_id' => 5,
            ),
            212 => 
            array (
                'permission_id' => 86,
                'role_id' => 6,
            ),
            213 => 
            array (
                'permission_id' => 86,
                'role_id' => 7,
            ),
            214 => 
            array (
                'permission_id' => 86,
                'role_id' => 8,
            ),
            215 => 
            array (
                'permission_id' => 86,
                'role_id' => 9,
            ),
            216 => 
            array (
                'permission_id' => 86,
                'role_id' => 10,
            ),
            217 => 
            array (
                'permission_id' => 89,
                'role_id' => 2,
            ),
            218 => 
            array (
                'permission_id' => 89,
                'role_id' => 3,
            ),
            219 => 
            array (
                'permission_id' => 89,
                'role_id' => 4,
            ),
            220 => 
            array (
                'permission_id' => 89,
                'role_id' => 5,
            ),
            221 => 
            array (
                'permission_id' => 89,
                'role_id' => 6,
            ),
            222 => 
            array (
                'permission_id' => 89,
                'role_id' => 7,
            ),
            223 => 
            array (
                'permission_id' => 89,
                'role_id' => 8,
            ),
            224 => 
            array (
                'permission_id' => 89,
                'role_id' => 9,
            ),
            225 => 
            array (
                'permission_id' => 89,
                'role_id' => 10,
            ),
            226 => 
            array (
                'permission_id' => 94,
                'role_id' => 2,
            ),
            227 => 
            array (
                'permission_id' => 94,
                'role_id' => 3,
            ),
            228 => 
            array (
                'permission_id' => 94,
                'role_id' => 4,
            ),
            229 => 
            array (
                'permission_id' => 94,
                'role_id' => 5,
            ),
            230 => 
            array (
                'permission_id' => 94,
                'role_id' => 6,
            ),
            231 => 
            array (
                'permission_id' => 94,
                'role_id' => 7,
            ),
            232 => 
            array (
                'permission_id' => 94,
                'role_id' => 8,
            ),
            233 => 
            array (
                'permission_id' => 94,
                'role_id' => 9,
            ),
            234 => 
            array (
                'permission_id' => 94,
                'role_id' => 10,
            ),
            235 => 
            array (
                'permission_id' => 97,
                'role_id' => 1,
            ),
            236 => 
            array (
                'permission_id' => 97,
                'role_id' => 2,
            ),
            237 => 
            array (
                'permission_id' => 97,
                'role_id' => 3,
            ),
            238 => 
            array (
                'permission_id' => 97,
                'role_id' => 4,
            ),
            239 => 
            array (
                'permission_id' => 97,
                'role_id' => 5,
            ),
            240 => 
            array (
                'permission_id' => 97,
                'role_id' => 6,
            ),
            241 => 
            array (
                'permission_id' => 97,
                'role_id' => 7,
            ),
            242 => 
            array (
                'permission_id' => 97,
                'role_id' => 8,
            ),
            243 => 
            array (
                'permission_id' => 97,
                'role_id' => 9,
            ),
            244 => 
            array (
                'permission_id' => 97,
                'role_id' => 10,
            ),
            245 => 
            array (
                'permission_id' => 102,
                'role_id' => 1,
            ),
            246 => 
            array (
                'permission_id' => 102,
                'role_id' => 2,
            ),
            247 => 
            array (
                'permission_id' => 102,
                'role_id' => 3,
            ),
            248 => 
            array (
                'permission_id' => 102,
                'role_id' => 4,
            ),
            249 => 
            array (
                'permission_id' => 102,
                'role_id' => 5,
            ),
            250 => 
            array (
                'permission_id' => 102,
                'role_id' => 6,
            ),
            251 => 
            array (
                'permission_id' => 102,
                'role_id' => 7,
            ),
            252 => 
            array (
                'permission_id' => 102,
                'role_id' => 8,
            ),
            253 => 
            array (
                'permission_id' => 102,
                'role_id' => 9,
            ),
            254 => 
            array (
                'permission_id' => 102,
                'role_id' => 10,
            ),
            255 => 
            array (
                'permission_id' => 109,
                'role_id' => 1,
            ),
            256 => 
            array (
                'permission_id' => 109,
                'role_id' => 2,
            ),
            257 => 
            array (
                'permission_id' => 109,
                'role_id' => 3,
            ),
            258 => 
            array (
                'permission_id' => 109,
                'role_id' => 4,
            ),
            259 => 
            array (
                'permission_id' => 109,
                'role_id' => 5,
            ),
            260 => 
            array (
                'permission_id' => 109,
                'role_id' => 6,
            ),
            261 => 
            array (
                'permission_id' => 109,
                'role_id' => 7,
            ),
            262 => 
            array (
                'permission_id' => 109,
                'role_id' => 8,
            ),
            263 => 
            array (
                'permission_id' => 109,
                'role_id' => 9,
            ),
            264 => 
            array (
                'permission_id' => 109,
                'role_id' => 10,
            ),
            265 => 
            array (
                'permission_id' => 110,
                'role_id' => 2,
            ),
            266 => 
            array (
                'permission_id' => 110,
                'role_id' => 3,
            ),
            267 => 
            array (
                'permission_id' => 110,
                'role_id' => 4,
            ),
            268 => 
            array (
                'permission_id' => 110,
                'role_id' => 5,
            ),
            269 => 
            array (
                'permission_id' => 110,
                'role_id' => 6,
            ),
            270 => 
            array (
                'permission_id' => 110,
                'role_id' => 7,
            ),
            271 => 
            array (
                'permission_id' => 110,
                'role_id' => 8,
            ),
            272 => 
            array (
                'permission_id' => 110,
                'role_id' => 9,
            ),
            273 => 
            array (
                'permission_id' => 110,
                'role_id' => 10,
            ),
            274 => 
            array (
                'permission_id' => 135,
                'role_id' => 2,
            ),
            275 => 
            array (
                'permission_id' => 135,
                'role_id' => 3,
            ),
            276 => 
            array (
                'permission_id' => 135,
                'role_id' => 4,
            ),
            277 => 
            array (
                'permission_id' => 135,
                'role_id' => 5,
            ),
            278 => 
            array (
                'permission_id' => 135,
                'role_id' => 6,
            ),
            279 => 
            array (
                'permission_id' => 135,
                'role_id' => 7,
            ),
            280 => 
            array (
                'permission_id' => 135,
                'role_id' => 8,
            ),
            281 => 
            array (
                'permission_id' => 135,
                'role_id' => 9,
            ),
            282 => 
            array (
                'permission_id' => 135,
                'role_id' => 10,
            ),
            283 => 
            array (
                'permission_id' => 136,
                'role_id' => 2,
            ),
            284 => 
            array (
                'permission_id' => 136,
                'role_id' => 3,
            ),
            285 => 
            array (
                'permission_id' => 136,
                'role_id' => 4,
            ),
            286 => 
            array (
                'permission_id' => 136,
                'role_id' => 5,
            ),
            287 => 
            array (
                'permission_id' => 136,
                'role_id' => 6,
            ),
            288 => 
            array (
                'permission_id' => 136,
                'role_id' => 7,
            ),
            289 => 
            array (
                'permission_id' => 136,
                'role_id' => 8,
            ),
            290 => 
            array (
                'permission_id' => 136,
                'role_id' => 9,
            ),
            291 => 
            array (
                'permission_id' => 137,
                'role_id' => 2,
            ),
            292 => 
            array (
                'permission_id' => 137,
                'role_id' => 3,
            ),
            293 => 
            array (
                'permission_id' => 137,
                'role_id' => 4,
            ),
            294 => 
            array (
                'permission_id' => 137,
                'role_id' => 5,
            ),
            295 => 
            array (
                'permission_id' => 137,
                'role_id' => 6,
            ),
            296 => 
            array (
                'permission_id' => 137,
                'role_id' => 7,
            ),
            297 => 
            array (
                'permission_id' => 137,
                'role_id' => 8,
            ),
            298 => 
            array (
                'permission_id' => 137,
                'role_id' => 9,
            ),
            299 => 
            array (
                'permission_id' => 145,
                'role_id' => 4,
            ),
            300 => 
            array (
                'permission_id' => 147,
                'role_id' => 3,
            ),
            301 => 
            array (
                'permission_id' => 147,
                'role_id' => 4,
            ),
            302 => 
            array (
                'permission_id' => 147,
                'role_id' => 5,
            ),
            303 => 
            array (
                'permission_id' => 147,
                'role_id' => 6,
            ),
            304 => 
            array (
                'permission_id' => 147,
                'role_id' => 7,
            ),
            305 => 
            array (
                'permission_id' => 147,
                'role_id' => 8,
            ),
            306 => 
            array (
                'permission_id' => 148,
                'role_id' => 3,
            ),
            307 => 
            array (
                'permission_id' => 148,
                'role_id' => 4,
            ),
            308 => 
            array (
                'permission_id' => 148,
                'role_id' => 5,
            ),
            309 => 
            array (
                'permission_id' => 148,
                'role_id' => 7,
            ),
            310 => 
            array (
                'permission_id' => 148,
                'role_id' => 8,
            ),
            311 => 
            array (
                'permission_id' => 149,
                'role_id' => 3,
            ),
            312 => 
            array (
                'permission_id' => 149,
                'role_id' => 4,
            ),
            313 => 
            array (
                'permission_id' => 149,
                'role_id' => 5,
            ),
            314 => 
            array (
                'permission_id' => 149,
                'role_id' => 7,
            ),
            315 => 
            array (
                'permission_id' => 149,
                'role_id' => 8,
            ),
            316 => 
            array (
                'permission_id' => 150,
                'role_id' => 3,
            ),
            317 => 
            array (
                'permission_id' => 150,
                'role_id' => 4,
            ),
            318 => 
            array (
                'permission_id' => 150,
                'role_id' => 5,
            ),
            319 => 
            array (
                'permission_id' => 150,
                'role_id' => 7,
            ),
            320 => 
            array (
                'permission_id' => 150,
                'role_id' => 8,
            ),
            321 => 
            array (
                'permission_id' => 151,
                'role_id' => 1,
            ),
            322 => 
            array (
                'permission_id' => 151,
                'role_id' => 3,
            ),
            323 => 
            array (
                'permission_id' => 151,
                'role_id' => 4,
            ),
            324 => 
            array (
                'permission_id' => 151,
                'role_id' => 5,
            ),
            325 => 
            array (
                'permission_id' => 151,
                'role_id' => 6,
            ),
            326 => 
            array (
                'permission_id' => 151,
                'role_id' => 7,
            ),
            327 => 
            array (
                'permission_id' => 151,
                'role_id' => 8,
            ),
            328 => 
            array (
                'permission_id' => 152,
                'role_id' => 4,
            ),
            329 => 
            array (
                'permission_id' => 153,
                'role_id' => 4,
            ),
            330 => 
            array (
                'permission_id' => 154,
                'role_id' => 4,
            ),
            331 => 
            array (
                'permission_id' => 155,
                'role_id' => 1,
            ),
            332 => 
            array (
                'permission_id' => 155,
                'role_id' => 4,
            ),
            333 => 
            array (
                'permission_id' => 155,
                'role_id' => 7,
            ),
            334 => 
            array (
                'permission_id' => 155,
                'role_id' => 9,
            ),
            335 => 
            array (
                'permission_id' => 156,
                'role_id' => 6,
            ),
            336 => 
            array (
                'permission_id' => 161,
                'role_id' => 1,
            ),
            337 => 
            array (
                'permission_id' => 161,
                'role_id' => 3,
            ),
            338 => 
            array (
                'permission_id' => 161,
                'role_id' => 4,
            ),
            339 => 
            array (
                'permission_id' => 161,
                'role_id' => 5,
            ),
            340 => 
            array (
                'permission_id' => 161,
                'role_id' => 6,
            ),
            341 => 
            array (
                'permission_id' => 161,
                'role_id' => 7,
            ),
            342 => 
            array (
                'permission_id' => 161,
                'role_id' => 8,
            ),
            343 => 
            array (
                'permission_id' => 166,
                'role_id' => 1,
            ),
            344 => 
            array (
                'permission_id' => 166,
                'role_id' => 4,
            ),
            345 => 
            array (
                'permission_id' => 166,
                'role_id' => 5,
            ),
            346 => 
            array (
                'permission_id' => 166,
                'role_id' => 6,
            ),
            347 => 
            array (
                'permission_id' => 168,
                'role_id' => 4,
            ),
            348 => 
            array (
                'permission_id' => 168,
                'role_id' => 5,
            ),
            349 => 
            array (
                'permission_id' => 168,
                'role_id' => 6,
            ),
            350 => 
            array (
                'permission_id' => 169,
                'role_id' => 3,
            ),
            351 => 
            array (
                'permission_id' => 169,
                'role_id' => 4,
            ),
            352 => 
            array (
                'permission_id' => 169,
                'role_id' => 5,
            ),
            353 => 
            array (
                'permission_id' => 169,
                'role_id' => 6,
            ),
            354 => 
            array (
                'permission_id' => 169,
                'role_id' => 7,
            ),
            355 => 
            array (
                'permission_id' => 169,
                'role_id' => 8,
            ),
            356 => 
            array (
                'permission_id' => 170,
                'role_id' => 2,
            ),
            357 => 
            array (
                'permission_id' => 170,
                'role_id' => 3,
            ),
            358 => 
            array (
                'permission_id' => 170,
                'role_id' => 4,
            ),
            359 => 
            array (
                'permission_id' => 170,
                'role_id' => 5,
            ),
            360 => 
            array (
                'permission_id' => 170,
                'role_id' => 6,
            ),
            361 => 
            array (
                'permission_id' => 170,
                'role_id' => 7,
            ),
            362 => 
            array (
                'permission_id' => 171,
                'role_id' => 1,
            ),
            363 => 
            array (
                'permission_id' => 171,
                'role_id' => 3,
            ),
            364 => 
            array (
                'permission_id' => 171,
                'role_id' => 4,
            ),
            365 => 
            array (
                'permission_id' => 171,
                'role_id' => 5,
            ),
            366 => 
            array (
                'permission_id' => 171,
                'role_id' => 6,
            ),
            367 => 
            array (
                'permission_id' => 171,
                'role_id' => 7,
            ),
            368 => 
            array (
                'permission_id' => 171,
                'role_id' => 8,
            ),
            369 => 
            array (
                'permission_id' => 172,
                'role_id' => 3,
            ),
            370 => 
            array (
                'permission_id' => 172,
                'role_id' => 4,
            ),
            371 => 
            array (
                'permission_id' => 172,
                'role_id' => 5,
            ),
            372 => 
            array (
                'permission_id' => 172,
                'role_id' => 6,
            ),
            373 => 
            array (
                'permission_id' => 172,
                'role_id' => 7,
            ),
            374 => 
            array (
                'permission_id' => 172,
                'role_id' => 8,
            ),
            375 => 
            array (
                'permission_id' => 173,
                'role_id' => 1,
            ),
            376 => 
            array (
                'permission_id' => 174,
                'role_id' => 1,
            ),
            377 => 
            array (
                'permission_id' => 175,
                'role_id' => 1,
            ),
            378 => 
            array (
                'permission_id' => 176,
                'role_id' => 1,
            ),
        ));
        
        
    }
}