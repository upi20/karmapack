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
                'role_id' => 2,
            ),
            11 => 
            array (
                'permission_id' => 2,
                'role_id' => 3,
            ),
            12 => 
            array (
                'permission_id' => 2,
                'role_id' => 4,
            ),
            13 => 
            array (
                'permission_id' => 2,
                'role_id' => 5,
            ),
            14 => 
            array (
                'permission_id' => 2,
                'role_id' => 6,
            ),
            15 => 
            array (
                'permission_id' => 2,
                'role_id' => 7,
            ),
            16 => 
            array (
                'permission_id' => 2,
                'role_id' => 8,
            ),
            17 => 
            array (
                'permission_id' => 2,
                'role_id' => 9,
            ),
            18 => 
            array (
                'permission_id' => 2,
                'role_id' => 10,
            ),
            19 => 
            array (
                'permission_id' => 3,
                'role_id' => 4,
            ),
            20 => 
            array (
                'permission_id' => 4,
                'role_id' => 4,
            ),
            21 => 
            array (
                'permission_id' => 5,
                'role_id' => 4,
            ),
            22 => 
            array (
                'permission_id' => 6,
                'role_id' => 4,
            ),
            23 => 
            array (
                'permission_id' => 7,
                'role_id' => 2,
            ),
            24 => 
            array (
                'permission_id' => 7,
                'role_id' => 3,
            ),
            25 => 
            array (
                'permission_id' => 7,
                'role_id' => 4,
            ),
            26 => 
            array (
                'permission_id' => 7,
                'role_id' => 5,
            ),
            27 => 
            array (
                'permission_id' => 7,
                'role_id' => 6,
            ),
            28 => 
            array (
                'permission_id' => 7,
                'role_id' => 7,
            ),
            29 => 
            array (
                'permission_id' => 7,
                'role_id' => 8,
            ),
            30 => 
            array (
                'permission_id' => 7,
                'role_id' => 9,
            ),
            31 => 
            array (
                'permission_id' => 7,
                'role_id' => 10,
            ),
            32 => 
            array (
                'permission_id' => 12,
                'role_id' => 2,
            ),
            33 => 
            array (
                'permission_id' => 12,
                'role_id' => 3,
            ),
            34 => 
            array (
                'permission_id' => 12,
                'role_id' => 4,
            ),
            35 => 
            array (
                'permission_id' => 12,
                'role_id' => 5,
            ),
            36 => 
            array (
                'permission_id' => 12,
                'role_id' => 6,
            ),
            37 => 
            array (
                'permission_id' => 12,
                'role_id' => 7,
            ),
            38 => 
            array (
                'permission_id' => 12,
                'role_id' => 8,
            ),
            39 => 
            array (
                'permission_id' => 12,
                'role_id' => 9,
            ),
            40 => 
            array (
                'permission_id' => 12,
                'role_id' => 10,
            ),
            41 => 
            array (
                'permission_id' => 17,
                'role_id' => 2,
            ),
            42 => 
            array (
                'permission_id' => 17,
                'role_id' => 3,
            ),
            43 => 
            array (
                'permission_id' => 17,
                'role_id' => 4,
            ),
            44 => 
            array (
                'permission_id' => 17,
                'role_id' => 5,
            ),
            45 => 
            array (
                'permission_id' => 17,
                'role_id' => 6,
            ),
            46 => 
            array (
                'permission_id' => 17,
                'role_id' => 7,
            ),
            47 => 
            array (
                'permission_id' => 17,
                'role_id' => 8,
            ),
            48 => 
            array (
                'permission_id' => 17,
                'role_id' => 9,
            ),
            49 => 
            array (
                'permission_id' => 17,
                'role_id' => 10,
            ),
            50 => 
            array (
                'permission_id' => 22,
                'role_id' => 2,
            ),
            51 => 
            array (
                'permission_id' => 22,
                'role_id' => 3,
            ),
            52 => 
            array (
                'permission_id' => 22,
                'role_id' => 4,
            ),
            53 => 
            array (
                'permission_id' => 22,
                'role_id' => 5,
            ),
            54 => 
            array (
                'permission_id' => 22,
                'role_id' => 6,
            ),
            55 => 
            array (
                'permission_id' => 22,
                'role_id' => 7,
            ),
            56 => 
            array (
                'permission_id' => 22,
                'role_id' => 8,
            ),
            57 => 
            array (
                'permission_id' => 22,
                'role_id' => 9,
            ),
            58 => 
            array (
                'permission_id' => 22,
                'role_id' => 10,
            ),
            59 => 
            array (
                'permission_id' => 27,
                'role_id' => 2,
            ),
            60 => 
            array (
                'permission_id' => 27,
                'role_id' => 3,
            ),
            61 => 
            array (
                'permission_id' => 27,
                'role_id' => 4,
            ),
            62 => 
            array (
                'permission_id' => 27,
                'role_id' => 5,
            ),
            63 => 
            array (
                'permission_id' => 27,
                'role_id' => 6,
            ),
            64 => 
            array (
                'permission_id' => 27,
                'role_id' => 7,
            ),
            65 => 
            array (
                'permission_id' => 27,
                'role_id' => 8,
            ),
            66 => 
            array (
                'permission_id' => 27,
                'role_id' => 9,
            ),
            67 => 
            array (
                'permission_id' => 27,
                'role_id' => 10,
            ),
            68 => 
            array (
                'permission_id' => 30,
                'role_id' => 10,
            ),
            69 => 
            array (
                'permission_id' => 31,
                'role_id' => 10,
            ),
            70 => 
            array (
                'permission_id' => 32,
                'role_id' => 10,
            ),
            71 => 
            array (
                'permission_id' => 33,
                'role_id' => 2,
            ),
            72 => 
            array (
                'permission_id' => 33,
                'role_id' => 3,
            ),
            73 => 
            array (
                'permission_id' => 33,
                'role_id' => 4,
            ),
            74 => 
            array (
                'permission_id' => 33,
                'role_id' => 5,
            ),
            75 => 
            array (
                'permission_id' => 33,
                'role_id' => 6,
            ),
            76 => 
            array (
                'permission_id' => 33,
                'role_id' => 7,
            ),
            77 => 
            array (
                'permission_id' => 33,
                'role_id' => 8,
            ),
            78 => 
            array (
                'permission_id' => 33,
                'role_id' => 9,
            ),
            79 => 
            array (
                'permission_id' => 33,
                'role_id' => 10,
            ),
            80 => 
            array (
                'permission_id' => 35,
                'role_id' => 10,
            ),
            81 => 
            array (
                'permission_id' => 36,
                'role_id' => 10,
            ),
            82 => 
            array (
                'permission_id' => 37,
                'role_id' => 10,
            ),
            83 => 
            array (
                'permission_id' => 38,
                'role_id' => 2,
            ),
            84 => 
            array (
                'permission_id' => 38,
                'role_id' => 3,
            ),
            85 => 
            array (
                'permission_id' => 38,
                'role_id' => 4,
            ),
            86 => 
            array (
                'permission_id' => 38,
                'role_id' => 5,
            ),
            87 => 
            array (
                'permission_id' => 38,
                'role_id' => 6,
            ),
            88 => 
            array (
                'permission_id' => 38,
                'role_id' => 7,
            ),
            89 => 
            array (
                'permission_id' => 38,
                'role_id' => 8,
            ),
            90 => 
            array (
                'permission_id' => 38,
                'role_id' => 9,
            ),
            91 => 
            array (
                'permission_id' => 38,
                'role_id' => 10,
            ),
            92 => 
            array (
                'permission_id' => 40,
                'role_id' => 10,
            ),
            93 => 
            array (
                'permission_id' => 41,
                'role_id' => 10,
            ),
            94 => 
            array (
                'permission_id' => 42,
                'role_id' => 10,
            ),
            95 => 
            array (
                'permission_id' => 43,
                'role_id' => 2,
            ),
            96 => 
            array (
                'permission_id' => 43,
                'role_id' => 3,
            ),
            97 => 
            array (
                'permission_id' => 43,
                'role_id' => 4,
            ),
            98 => 
            array (
                'permission_id' => 43,
                'role_id' => 5,
            ),
            99 => 
            array (
                'permission_id' => 43,
                'role_id' => 6,
            ),
            100 => 
            array (
                'permission_id' => 43,
                'role_id' => 7,
            ),
            101 => 
            array (
                'permission_id' => 43,
                'role_id' => 8,
            ),
            102 => 
            array (
                'permission_id' => 43,
                'role_id' => 9,
            ),
            103 => 
            array (
                'permission_id' => 43,
                'role_id' => 10,
            ),
            104 => 
            array (
                'permission_id' => 48,
                'role_id' => 2,
            ),
            105 => 
            array (
                'permission_id' => 48,
                'role_id' => 3,
            ),
            106 => 
            array (
                'permission_id' => 48,
                'role_id' => 4,
            ),
            107 => 
            array (
                'permission_id' => 48,
                'role_id' => 5,
            ),
            108 => 
            array (
                'permission_id' => 48,
                'role_id' => 6,
            ),
            109 => 
            array (
                'permission_id' => 48,
                'role_id' => 7,
            ),
            110 => 
            array (
                'permission_id' => 48,
                'role_id' => 8,
            ),
            111 => 
            array (
                'permission_id' => 48,
                'role_id' => 9,
            ),
            112 => 
            array (
                'permission_id' => 48,
                'role_id' => 10,
            ),
            113 => 
            array (
                'permission_id' => 55,
                'role_id' => 2,
            ),
            114 => 
            array (
                'permission_id' => 55,
                'role_id' => 3,
            ),
            115 => 
            array (
                'permission_id' => 55,
                'role_id' => 4,
            ),
            116 => 
            array (
                'permission_id' => 55,
                'role_id' => 5,
            ),
            117 => 
            array (
                'permission_id' => 55,
                'role_id' => 6,
            ),
            118 => 
            array (
                'permission_id' => 55,
                'role_id' => 7,
            ),
            119 => 
            array (
                'permission_id' => 55,
                'role_id' => 8,
            ),
            120 => 
            array (
                'permission_id' => 55,
                'role_id' => 9,
            ),
            121 => 
            array (
                'permission_id' => 55,
                'role_id' => 10,
            ),
            122 => 
            array (
                'permission_id' => 59,
                'role_id' => 2,
            ),
            123 => 
            array (
                'permission_id' => 59,
                'role_id' => 3,
            ),
            124 => 
            array (
                'permission_id' => 59,
                'role_id' => 4,
            ),
            125 => 
            array (
                'permission_id' => 59,
                'role_id' => 5,
            ),
            126 => 
            array (
                'permission_id' => 59,
                'role_id' => 6,
            ),
            127 => 
            array (
                'permission_id' => 59,
                'role_id' => 7,
            ),
            128 => 
            array (
                'permission_id' => 59,
                'role_id' => 8,
            ),
            129 => 
            array (
                'permission_id' => 59,
                'role_id' => 9,
            ),
            130 => 
            array (
                'permission_id' => 59,
                'role_id' => 10,
            ),
            131 => 
            array (
                'permission_id' => 61,
                'role_id' => 2,
            ),
            132 => 
            array (
                'permission_id' => 61,
                'role_id' => 3,
            ),
            133 => 
            array (
                'permission_id' => 61,
                'role_id' => 4,
            ),
            134 => 
            array (
                'permission_id' => 61,
                'role_id' => 5,
            ),
            135 => 
            array (
                'permission_id' => 61,
                'role_id' => 6,
            ),
            136 => 
            array (
                'permission_id' => 61,
                'role_id' => 7,
            ),
            137 => 
            array (
                'permission_id' => 61,
                'role_id' => 8,
            ),
            138 => 
            array (
                'permission_id' => 61,
                'role_id' => 9,
            ),
            139 => 
            array (
                'permission_id' => 61,
                'role_id' => 10,
            ),
            140 => 
            array (
                'permission_id' => 63,
                'role_id' => 4,
            ),
            141 => 
            array (
                'permission_id' => 64,
                'role_id' => 4,
            ),
            142 => 
            array (
                'permission_id' => 65,
                'role_id' => 4,
            ),
            143 => 
            array (
                'permission_id' => 66,
                'role_id' => 2,
            ),
            144 => 
            array (
                'permission_id' => 66,
                'role_id' => 3,
            ),
            145 => 
            array (
                'permission_id' => 66,
                'role_id' => 4,
            ),
            146 => 
            array (
                'permission_id' => 66,
                'role_id' => 5,
            ),
            147 => 
            array (
                'permission_id' => 66,
                'role_id' => 6,
            ),
            148 => 
            array (
                'permission_id' => 66,
                'role_id' => 7,
            ),
            149 => 
            array (
                'permission_id' => 66,
                'role_id' => 8,
            ),
            150 => 
            array (
                'permission_id' => 66,
                'role_id' => 9,
            ),
            151 => 
            array (
                'permission_id' => 66,
                'role_id' => 10,
            ),
            152 => 
            array (
                'permission_id' => 70,
                'role_id' => 2,
            ),
            153 => 
            array (
                'permission_id' => 70,
                'role_id' => 3,
            ),
            154 => 
            array (
                'permission_id' => 70,
                'role_id' => 4,
            ),
            155 => 
            array (
                'permission_id' => 70,
                'role_id' => 5,
            ),
            156 => 
            array (
                'permission_id' => 70,
                'role_id' => 6,
            ),
            157 => 
            array (
                'permission_id' => 70,
                'role_id' => 7,
            ),
            158 => 
            array (
                'permission_id' => 70,
                'role_id' => 8,
            ),
            159 => 
            array (
                'permission_id' => 70,
                'role_id' => 9,
            ),
            160 => 
            array (
                'permission_id' => 70,
                'role_id' => 10,
            ),
            161 => 
            array (
                'permission_id' => 74,
                'role_id' => 2,
            ),
            162 => 
            array (
                'permission_id' => 74,
                'role_id' => 3,
            ),
            163 => 
            array (
                'permission_id' => 74,
                'role_id' => 4,
            ),
            164 => 
            array (
                'permission_id' => 74,
                'role_id' => 5,
            ),
            165 => 
            array (
                'permission_id' => 74,
                'role_id' => 6,
            ),
            166 => 
            array (
                'permission_id' => 74,
                'role_id' => 7,
            ),
            167 => 
            array (
                'permission_id' => 74,
                'role_id' => 8,
            ),
            168 => 
            array (
                'permission_id' => 74,
                'role_id' => 9,
            ),
            169 => 
            array (
                'permission_id' => 74,
                'role_id' => 10,
            ),
            170 => 
            array (
                'permission_id' => 78,
                'role_id' => 2,
            ),
            171 => 
            array (
                'permission_id' => 78,
                'role_id' => 3,
            ),
            172 => 
            array (
                'permission_id' => 78,
                'role_id' => 4,
            ),
            173 => 
            array (
                'permission_id' => 78,
                'role_id' => 5,
            ),
            174 => 
            array (
                'permission_id' => 78,
                'role_id' => 6,
            ),
            175 => 
            array (
                'permission_id' => 78,
                'role_id' => 7,
            ),
            176 => 
            array (
                'permission_id' => 78,
                'role_id' => 8,
            ),
            177 => 
            array (
                'permission_id' => 78,
                'role_id' => 9,
            ),
            178 => 
            array (
                'permission_id' => 78,
                'role_id' => 10,
            ),
            179 => 
            array (
                'permission_id' => 79,
                'role_id' => 4,
            ),
            180 => 
            array (
                'permission_id' => 80,
                'role_id' => 4,
            ),
            181 => 
            array (
                'permission_id' => 81,
                'role_id' => 4,
            ),
            182 => 
            array (
                'permission_id' => 82,
                'role_id' => 2,
            ),
            183 => 
            array (
                'permission_id' => 82,
                'role_id' => 3,
            ),
            184 => 
            array (
                'permission_id' => 82,
                'role_id' => 4,
            ),
            185 => 
            array (
                'permission_id' => 82,
                'role_id' => 5,
            ),
            186 => 
            array (
                'permission_id' => 82,
                'role_id' => 6,
            ),
            187 => 
            array (
                'permission_id' => 82,
                'role_id' => 7,
            ),
            188 => 
            array (
                'permission_id' => 82,
                'role_id' => 8,
            ),
            189 => 
            array (
                'permission_id' => 82,
                'role_id' => 9,
            ),
            190 => 
            array (
                'permission_id' => 82,
                'role_id' => 10,
            ),
            191 => 
            array (
                'permission_id' => 83,
                'role_id' => 4,
            ),
            192 => 
            array (
                'permission_id' => 84,
                'role_id' => 4,
            ),
            193 => 
            array (
                'permission_id' => 85,
                'role_id' => 4,
            ),
            194 => 
            array (
                'permission_id' => 86,
                'role_id' => 2,
            ),
            195 => 
            array (
                'permission_id' => 86,
                'role_id' => 3,
            ),
            196 => 
            array (
                'permission_id' => 86,
                'role_id' => 4,
            ),
            197 => 
            array (
                'permission_id' => 86,
                'role_id' => 5,
            ),
            198 => 
            array (
                'permission_id' => 86,
                'role_id' => 6,
            ),
            199 => 
            array (
                'permission_id' => 86,
                'role_id' => 7,
            ),
            200 => 
            array (
                'permission_id' => 86,
                'role_id' => 8,
            ),
            201 => 
            array (
                'permission_id' => 86,
                'role_id' => 9,
            ),
            202 => 
            array (
                'permission_id' => 86,
                'role_id' => 10,
            ),
            203 => 
            array (
                'permission_id' => 89,
                'role_id' => 2,
            ),
            204 => 
            array (
                'permission_id' => 89,
                'role_id' => 3,
            ),
            205 => 
            array (
                'permission_id' => 89,
                'role_id' => 4,
            ),
            206 => 
            array (
                'permission_id' => 89,
                'role_id' => 5,
            ),
            207 => 
            array (
                'permission_id' => 89,
                'role_id' => 6,
            ),
            208 => 
            array (
                'permission_id' => 89,
                'role_id' => 7,
            ),
            209 => 
            array (
                'permission_id' => 89,
                'role_id' => 8,
            ),
            210 => 
            array (
                'permission_id' => 89,
                'role_id' => 9,
            ),
            211 => 
            array (
                'permission_id' => 89,
                'role_id' => 10,
            ),
            212 => 
            array (
                'permission_id' => 94,
                'role_id' => 2,
            ),
            213 => 
            array (
                'permission_id' => 94,
                'role_id' => 3,
            ),
            214 => 
            array (
                'permission_id' => 94,
                'role_id' => 4,
            ),
            215 => 
            array (
                'permission_id' => 94,
                'role_id' => 5,
            ),
            216 => 
            array (
                'permission_id' => 94,
                'role_id' => 6,
            ),
            217 => 
            array (
                'permission_id' => 94,
                'role_id' => 7,
            ),
            218 => 
            array (
                'permission_id' => 94,
                'role_id' => 8,
            ),
            219 => 
            array (
                'permission_id' => 94,
                'role_id' => 9,
            ),
            220 => 
            array (
                'permission_id' => 94,
                'role_id' => 10,
            ),
            221 => 
            array (
                'permission_id' => 97,
                'role_id' => 2,
            ),
            222 => 
            array (
                'permission_id' => 97,
                'role_id' => 3,
            ),
            223 => 
            array (
                'permission_id' => 97,
                'role_id' => 4,
            ),
            224 => 
            array (
                'permission_id' => 97,
                'role_id' => 5,
            ),
            225 => 
            array (
                'permission_id' => 97,
                'role_id' => 6,
            ),
            226 => 
            array (
                'permission_id' => 97,
                'role_id' => 7,
            ),
            227 => 
            array (
                'permission_id' => 97,
                'role_id' => 8,
            ),
            228 => 
            array (
                'permission_id' => 97,
                'role_id' => 9,
            ),
            229 => 
            array (
                'permission_id' => 97,
                'role_id' => 10,
            ),
            230 => 
            array (
                'permission_id' => 102,
                'role_id' => 2,
            ),
            231 => 
            array (
                'permission_id' => 102,
                'role_id' => 3,
            ),
            232 => 
            array (
                'permission_id' => 102,
                'role_id' => 4,
            ),
            233 => 
            array (
                'permission_id' => 102,
                'role_id' => 5,
            ),
            234 => 
            array (
                'permission_id' => 102,
                'role_id' => 6,
            ),
            235 => 
            array (
                'permission_id' => 102,
                'role_id' => 7,
            ),
            236 => 
            array (
                'permission_id' => 102,
                'role_id' => 8,
            ),
            237 => 
            array (
                'permission_id' => 102,
                'role_id' => 9,
            ),
            238 => 
            array (
                'permission_id' => 102,
                'role_id' => 10,
            ),
            239 => 
            array (
                'permission_id' => 109,
                'role_id' => 2,
            ),
            240 => 
            array (
                'permission_id' => 109,
                'role_id' => 3,
            ),
            241 => 
            array (
                'permission_id' => 109,
                'role_id' => 4,
            ),
            242 => 
            array (
                'permission_id' => 109,
                'role_id' => 5,
            ),
            243 => 
            array (
                'permission_id' => 109,
                'role_id' => 6,
            ),
            244 => 
            array (
                'permission_id' => 109,
                'role_id' => 7,
            ),
            245 => 
            array (
                'permission_id' => 109,
                'role_id' => 8,
            ),
            246 => 
            array (
                'permission_id' => 109,
                'role_id' => 9,
            ),
            247 => 
            array (
                'permission_id' => 109,
                'role_id' => 10,
            ),
            248 => 
            array (
                'permission_id' => 110,
                'role_id' => 2,
            ),
            249 => 
            array (
                'permission_id' => 110,
                'role_id' => 3,
            ),
            250 => 
            array (
                'permission_id' => 110,
                'role_id' => 4,
            ),
            251 => 
            array (
                'permission_id' => 110,
                'role_id' => 5,
            ),
            252 => 
            array (
                'permission_id' => 110,
                'role_id' => 6,
            ),
            253 => 
            array (
                'permission_id' => 110,
                'role_id' => 7,
            ),
            254 => 
            array (
                'permission_id' => 110,
                'role_id' => 8,
            ),
            255 => 
            array (
                'permission_id' => 110,
                'role_id' => 9,
            ),
            256 => 
            array (
                'permission_id' => 110,
                'role_id' => 10,
            ),
            257 => 
            array (
                'permission_id' => 135,
                'role_id' => 2,
            ),
            258 => 
            array (
                'permission_id' => 135,
                'role_id' => 3,
            ),
            259 => 
            array (
                'permission_id' => 135,
                'role_id' => 4,
            ),
            260 => 
            array (
                'permission_id' => 135,
                'role_id' => 5,
            ),
            261 => 
            array (
                'permission_id' => 135,
                'role_id' => 6,
            ),
            262 => 
            array (
                'permission_id' => 135,
                'role_id' => 7,
            ),
            263 => 
            array (
                'permission_id' => 135,
                'role_id' => 8,
            ),
            264 => 
            array (
                'permission_id' => 135,
                'role_id' => 9,
            ),
            265 => 
            array (
                'permission_id' => 135,
                'role_id' => 10,
            ),
            266 => 
            array (
                'permission_id' => 136,
                'role_id' => 2,
            ),
            267 => 
            array (
                'permission_id' => 136,
                'role_id' => 3,
            ),
            268 => 
            array (
                'permission_id' => 136,
                'role_id' => 5,
            ),
            269 => 
            array (
                'permission_id' => 136,
                'role_id' => 6,
            ),
            270 => 
            array (
                'permission_id' => 136,
                'role_id' => 7,
            ),
            271 => 
            array (
                'permission_id' => 136,
                'role_id' => 8,
            ),
            272 => 
            array (
                'permission_id' => 136,
                'role_id' => 9,
            ),
            273 => 
            array (
                'permission_id' => 137,
                'role_id' => 2,
            ),
            274 => 
            array (
                'permission_id' => 137,
                'role_id' => 3,
            ),
            275 => 
            array (
                'permission_id' => 137,
                'role_id' => 4,
            ),
            276 => 
            array (
                'permission_id' => 137,
                'role_id' => 5,
            ),
            277 => 
            array (
                'permission_id' => 137,
                'role_id' => 6,
            ),
            278 => 
            array (
                'permission_id' => 137,
                'role_id' => 7,
            ),
            279 => 
            array (
                'permission_id' => 137,
                'role_id' => 8,
            ),
            280 => 
            array (
                'permission_id' => 137,
                'role_id' => 9,
            ),
            281 => 
            array (
                'permission_id' => 137,
                'role_id' => 10,
            ),
            282 => 
            array (
                'permission_id' => 145,
                'role_id' => 4,
            ),
        ));
        
        
    }
}