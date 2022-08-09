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
                'permission_id' => 47,
                'role_id' => 3,
            ),
            105 => 
            array (
                'permission_id' => 47,
                'role_id' => 4,
            ),
            106 => 
            array (
                'permission_id' => 47,
                'role_id' => 5,
            ),
            107 => 
            array (
                'permission_id' => 47,
                'role_id' => 6,
            ),
            108 => 
            array (
                'permission_id' => 47,
                'role_id' => 7,
            ),
            109 => 
            array (
                'permission_id' => 47,
                'role_id' => 8,
            ),
            110 => 
            array (
                'permission_id' => 47,
                'role_id' => 10,
            ),
            111 => 
            array (
                'permission_id' => 48,
                'role_id' => 2,
            ),
            112 => 
            array (
                'permission_id' => 48,
                'role_id' => 3,
            ),
            113 => 
            array (
                'permission_id' => 48,
                'role_id' => 4,
            ),
            114 => 
            array (
                'permission_id' => 48,
                'role_id' => 5,
            ),
            115 => 
            array (
                'permission_id' => 48,
                'role_id' => 6,
            ),
            116 => 
            array (
                'permission_id' => 48,
                'role_id' => 7,
            ),
            117 => 
            array (
                'permission_id' => 48,
                'role_id' => 8,
            ),
            118 => 
            array (
                'permission_id' => 48,
                'role_id' => 9,
            ),
            119 => 
            array (
                'permission_id' => 48,
                'role_id' => 10,
            ),
            120 => 
            array (
                'permission_id' => 55,
                'role_id' => 2,
            ),
            121 => 
            array (
                'permission_id' => 55,
                'role_id' => 3,
            ),
            122 => 
            array (
                'permission_id' => 55,
                'role_id' => 4,
            ),
            123 => 
            array (
                'permission_id' => 55,
                'role_id' => 5,
            ),
            124 => 
            array (
                'permission_id' => 55,
                'role_id' => 6,
            ),
            125 => 
            array (
                'permission_id' => 55,
                'role_id' => 7,
            ),
            126 => 
            array (
                'permission_id' => 55,
                'role_id' => 8,
            ),
            127 => 
            array (
                'permission_id' => 55,
                'role_id' => 9,
            ),
            128 => 
            array (
                'permission_id' => 55,
                'role_id' => 10,
            ),
            129 => 
            array (
                'permission_id' => 59,
                'role_id' => 2,
            ),
            130 => 
            array (
                'permission_id' => 59,
                'role_id' => 3,
            ),
            131 => 
            array (
                'permission_id' => 59,
                'role_id' => 4,
            ),
            132 => 
            array (
                'permission_id' => 59,
                'role_id' => 5,
            ),
            133 => 
            array (
                'permission_id' => 59,
                'role_id' => 6,
            ),
            134 => 
            array (
                'permission_id' => 59,
                'role_id' => 7,
            ),
            135 => 
            array (
                'permission_id' => 59,
                'role_id' => 8,
            ),
            136 => 
            array (
                'permission_id' => 59,
                'role_id' => 9,
            ),
            137 => 
            array (
                'permission_id' => 59,
                'role_id' => 10,
            ),
            138 => 
            array (
                'permission_id' => 61,
                'role_id' => 2,
            ),
            139 => 
            array (
                'permission_id' => 61,
                'role_id' => 3,
            ),
            140 => 
            array (
                'permission_id' => 61,
                'role_id' => 4,
            ),
            141 => 
            array (
                'permission_id' => 61,
                'role_id' => 5,
            ),
            142 => 
            array (
                'permission_id' => 61,
                'role_id' => 6,
            ),
            143 => 
            array (
                'permission_id' => 61,
                'role_id' => 7,
            ),
            144 => 
            array (
                'permission_id' => 61,
                'role_id' => 8,
            ),
            145 => 
            array (
                'permission_id' => 61,
                'role_id' => 9,
            ),
            146 => 
            array (
                'permission_id' => 61,
                'role_id' => 10,
            ),
            147 => 
            array (
                'permission_id' => 63,
                'role_id' => 4,
            ),
            148 => 
            array (
                'permission_id' => 64,
                'role_id' => 4,
            ),
            149 => 
            array (
                'permission_id' => 65,
                'role_id' => 4,
            ),
            150 => 
            array (
                'permission_id' => 66,
                'role_id' => 2,
            ),
            151 => 
            array (
                'permission_id' => 66,
                'role_id' => 3,
            ),
            152 => 
            array (
                'permission_id' => 66,
                'role_id' => 4,
            ),
            153 => 
            array (
                'permission_id' => 66,
                'role_id' => 5,
            ),
            154 => 
            array (
                'permission_id' => 66,
                'role_id' => 6,
            ),
            155 => 
            array (
                'permission_id' => 66,
                'role_id' => 7,
            ),
            156 => 
            array (
                'permission_id' => 66,
                'role_id' => 8,
            ),
            157 => 
            array (
                'permission_id' => 66,
                'role_id' => 9,
            ),
            158 => 
            array (
                'permission_id' => 66,
                'role_id' => 10,
            ),
            159 => 
            array (
                'permission_id' => 70,
                'role_id' => 2,
            ),
            160 => 
            array (
                'permission_id' => 70,
                'role_id' => 3,
            ),
            161 => 
            array (
                'permission_id' => 70,
                'role_id' => 4,
            ),
            162 => 
            array (
                'permission_id' => 70,
                'role_id' => 5,
            ),
            163 => 
            array (
                'permission_id' => 70,
                'role_id' => 6,
            ),
            164 => 
            array (
                'permission_id' => 70,
                'role_id' => 7,
            ),
            165 => 
            array (
                'permission_id' => 70,
                'role_id' => 8,
            ),
            166 => 
            array (
                'permission_id' => 70,
                'role_id' => 9,
            ),
            167 => 
            array (
                'permission_id' => 70,
                'role_id' => 10,
            ),
            168 => 
            array (
                'permission_id' => 74,
                'role_id' => 2,
            ),
            169 => 
            array (
                'permission_id' => 74,
                'role_id' => 3,
            ),
            170 => 
            array (
                'permission_id' => 74,
                'role_id' => 4,
            ),
            171 => 
            array (
                'permission_id' => 74,
                'role_id' => 5,
            ),
            172 => 
            array (
                'permission_id' => 74,
                'role_id' => 6,
            ),
            173 => 
            array (
                'permission_id' => 74,
                'role_id' => 7,
            ),
            174 => 
            array (
                'permission_id' => 74,
                'role_id' => 8,
            ),
            175 => 
            array (
                'permission_id' => 74,
                'role_id' => 9,
            ),
            176 => 
            array (
                'permission_id' => 74,
                'role_id' => 10,
            ),
            177 => 
            array (
                'permission_id' => 78,
                'role_id' => 2,
            ),
            178 => 
            array (
                'permission_id' => 78,
                'role_id' => 3,
            ),
            179 => 
            array (
                'permission_id' => 78,
                'role_id' => 4,
            ),
            180 => 
            array (
                'permission_id' => 78,
                'role_id' => 5,
            ),
            181 => 
            array (
                'permission_id' => 78,
                'role_id' => 6,
            ),
            182 => 
            array (
                'permission_id' => 78,
                'role_id' => 7,
            ),
            183 => 
            array (
                'permission_id' => 78,
                'role_id' => 8,
            ),
            184 => 
            array (
                'permission_id' => 78,
                'role_id' => 9,
            ),
            185 => 
            array (
                'permission_id' => 78,
                'role_id' => 10,
            ),
            186 => 
            array (
                'permission_id' => 79,
                'role_id' => 4,
            ),
            187 => 
            array (
                'permission_id' => 80,
                'role_id' => 4,
            ),
            188 => 
            array (
                'permission_id' => 81,
                'role_id' => 4,
            ),
            189 => 
            array (
                'permission_id' => 82,
                'role_id' => 2,
            ),
            190 => 
            array (
                'permission_id' => 82,
                'role_id' => 3,
            ),
            191 => 
            array (
                'permission_id' => 82,
                'role_id' => 4,
            ),
            192 => 
            array (
                'permission_id' => 82,
                'role_id' => 5,
            ),
            193 => 
            array (
                'permission_id' => 82,
                'role_id' => 6,
            ),
            194 => 
            array (
                'permission_id' => 82,
                'role_id' => 7,
            ),
            195 => 
            array (
                'permission_id' => 82,
                'role_id' => 8,
            ),
            196 => 
            array (
                'permission_id' => 82,
                'role_id' => 9,
            ),
            197 => 
            array (
                'permission_id' => 82,
                'role_id' => 10,
            ),
            198 => 
            array (
                'permission_id' => 83,
                'role_id' => 4,
            ),
            199 => 
            array (
                'permission_id' => 84,
                'role_id' => 4,
            ),
            200 => 
            array (
                'permission_id' => 85,
                'role_id' => 4,
            ),
            201 => 
            array (
                'permission_id' => 86,
                'role_id' => 2,
            ),
            202 => 
            array (
                'permission_id' => 86,
                'role_id' => 3,
            ),
            203 => 
            array (
                'permission_id' => 86,
                'role_id' => 4,
            ),
            204 => 
            array (
                'permission_id' => 86,
                'role_id' => 5,
            ),
            205 => 
            array (
                'permission_id' => 86,
                'role_id' => 6,
            ),
            206 => 
            array (
                'permission_id' => 86,
                'role_id' => 7,
            ),
            207 => 
            array (
                'permission_id' => 86,
                'role_id' => 8,
            ),
            208 => 
            array (
                'permission_id' => 86,
                'role_id' => 9,
            ),
            209 => 
            array (
                'permission_id' => 86,
                'role_id' => 10,
            ),
            210 => 
            array (
                'permission_id' => 89,
                'role_id' => 2,
            ),
            211 => 
            array (
                'permission_id' => 89,
                'role_id' => 3,
            ),
            212 => 
            array (
                'permission_id' => 89,
                'role_id' => 4,
            ),
            213 => 
            array (
                'permission_id' => 89,
                'role_id' => 5,
            ),
            214 => 
            array (
                'permission_id' => 89,
                'role_id' => 6,
            ),
            215 => 
            array (
                'permission_id' => 89,
                'role_id' => 7,
            ),
            216 => 
            array (
                'permission_id' => 89,
                'role_id' => 8,
            ),
            217 => 
            array (
                'permission_id' => 89,
                'role_id' => 9,
            ),
            218 => 
            array (
                'permission_id' => 89,
                'role_id' => 10,
            ),
            219 => 
            array (
                'permission_id' => 94,
                'role_id' => 2,
            ),
            220 => 
            array (
                'permission_id' => 94,
                'role_id' => 3,
            ),
            221 => 
            array (
                'permission_id' => 94,
                'role_id' => 4,
            ),
            222 => 
            array (
                'permission_id' => 94,
                'role_id' => 5,
            ),
            223 => 
            array (
                'permission_id' => 94,
                'role_id' => 6,
            ),
            224 => 
            array (
                'permission_id' => 94,
                'role_id' => 7,
            ),
            225 => 
            array (
                'permission_id' => 94,
                'role_id' => 8,
            ),
            226 => 
            array (
                'permission_id' => 94,
                'role_id' => 9,
            ),
            227 => 
            array (
                'permission_id' => 94,
                'role_id' => 10,
            ),
            228 => 
            array (
                'permission_id' => 97,
                'role_id' => 2,
            ),
            229 => 
            array (
                'permission_id' => 97,
                'role_id' => 3,
            ),
            230 => 
            array (
                'permission_id' => 97,
                'role_id' => 4,
            ),
            231 => 
            array (
                'permission_id' => 97,
                'role_id' => 5,
            ),
            232 => 
            array (
                'permission_id' => 97,
                'role_id' => 6,
            ),
            233 => 
            array (
                'permission_id' => 97,
                'role_id' => 7,
            ),
            234 => 
            array (
                'permission_id' => 97,
                'role_id' => 8,
            ),
            235 => 
            array (
                'permission_id' => 97,
                'role_id' => 9,
            ),
            236 => 
            array (
                'permission_id' => 97,
                'role_id' => 10,
            ),
            237 => 
            array (
                'permission_id' => 102,
                'role_id' => 2,
            ),
            238 => 
            array (
                'permission_id' => 102,
                'role_id' => 3,
            ),
            239 => 
            array (
                'permission_id' => 102,
                'role_id' => 4,
            ),
            240 => 
            array (
                'permission_id' => 102,
                'role_id' => 5,
            ),
            241 => 
            array (
                'permission_id' => 102,
                'role_id' => 6,
            ),
            242 => 
            array (
                'permission_id' => 102,
                'role_id' => 7,
            ),
            243 => 
            array (
                'permission_id' => 102,
                'role_id' => 8,
            ),
            244 => 
            array (
                'permission_id' => 102,
                'role_id' => 9,
            ),
            245 => 
            array (
                'permission_id' => 102,
                'role_id' => 10,
            ),
            246 => 
            array (
                'permission_id' => 109,
                'role_id' => 2,
            ),
            247 => 
            array (
                'permission_id' => 109,
                'role_id' => 3,
            ),
            248 => 
            array (
                'permission_id' => 109,
                'role_id' => 4,
            ),
            249 => 
            array (
                'permission_id' => 109,
                'role_id' => 5,
            ),
            250 => 
            array (
                'permission_id' => 109,
                'role_id' => 6,
            ),
            251 => 
            array (
                'permission_id' => 109,
                'role_id' => 7,
            ),
            252 => 
            array (
                'permission_id' => 109,
                'role_id' => 8,
            ),
            253 => 
            array (
                'permission_id' => 109,
                'role_id' => 9,
            ),
            254 => 
            array (
                'permission_id' => 109,
                'role_id' => 10,
            ),
            255 => 
            array (
                'permission_id' => 110,
                'role_id' => 2,
            ),
            256 => 
            array (
                'permission_id' => 110,
                'role_id' => 3,
            ),
            257 => 
            array (
                'permission_id' => 110,
                'role_id' => 4,
            ),
            258 => 
            array (
                'permission_id' => 110,
                'role_id' => 5,
            ),
            259 => 
            array (
                'permission_id' => 110,
                'role_id' => 6,
            ),
            260 => 
            array (
                'permission_id' => 110,
                'role_id' => 7,
            ),
            261 => 
            array (
                'permission_id' => 110,
                'role_id' => 8,
            ),
            262 => 
            array (
                'permission_id' => 110,
                'role_id' => 9,
            ),
            263 => 
            array (
                'permission_id' => 110,
                'role_id' => 10,
            ),
            264 => 
            array (
                'permission_id' => 135,
                'role_id' => 2,
            ),
            265 => 
            array (
                'permission_id' => 135,
                'role_id' => 3,
            ),
            266 => 
            array (
                'permission_id' => 135,
                'role_id' => 4,
            ),
            267 => 
            array (
                'permission_id' => 135,
                'role_id' => 5,
            ),
            268 => 
            array (
                'permission_id' => 135,
                'role_id' => 6,
            ),
            269 => 
            array (
                'permission_id' => 135,
                'role_id' => 7,
            ),
            270 => 
            array (
                'permission_id' => 135,
                'role_id' => 8,
            ),
            271 => 
            array (
                'permission_id' => 135,
                'role_id' => 9,
            ),
            272 => 
            array (
                'permission_id' => 135,
                'role_id' => 10,
            ),
            273 => 
            array (
                'permission_id' => 136,
                'role_id' => 2,
            ),
            274 => 
            array (
                'permission_id' => 136,
                'role_id' => 3,
            ),
            275 => 
            array (
                'permission_id' => 136,
                'role_id' => 5,
            ),
            276 => 
            array (
                'permission_id' => 136,
                'role_id' => 6,
            ),
            277 => 
            array (
                'permission_id' => 136,
                'role_id' => 7,
            ),
            278 => 
            array (
                'permission_id' => 136,
                'role_id' => 8,
            ),
            279 => 
            array (
                'permission_id' => 136,
                'role_id' => 9,
            ),
            280 => 
            array (
                'permission_id' => 137,
                'role_id' => 2,
            ),
            281 => 
            array (
                'permission_id' => 137,
                'role_id' => 3,
            ),
            282 => 
            array (
                'permission_id' => 137,
                'role_id' => 4,
            ),
            283 => 
            array (
                'permission_id' => 137,
                'role_id' => 5,
            ),
            284 => 
            array (
                'permission_id' => 137,
                'role_id' => 6,
            ),
            285 => 
            array (
                'permission_id' => 137,
                'role_id' => 7,
            ),
            286 => 
            array (
                'permission_id' => 137,
                'role_id' => 8,
            ),
            287 => 
            array (
                'permission_id' => 137,
                'role_id' => 9,
            ),
            288 => 
            array (
                'permission_id' => 137,
                'role_id' => 10,
            ),
            289 => 
            array (
                'permission_id' => 145,
                'role_id' => 4,
            ),
            290 => 
            array (
                'permission_id' => 147,
                'role_id' => 3,
            ),
            291 => 
            array (
                'permission_id' => 147,
                'role_id' => 4,
            ),
            292 => 
            array (
                'permission_id' => 147,
                'role_id' => 5,
            ),
            293 => 
            array (
                'permission_id' => 147,
                'role_id' => 6,
            ),
            294 => 
            array (
                'permission_id' => 147,
                'role_id' => 7,
            ),
            295 => 
            array (
                'permission_id' => 147,
                'role_id' => 8,
            ),
            296 => 
            array (
                'permission_id' => 148,
                'role_id' => 3,
            ),
            297 => 
            array (
                'permission_id' => 148,
                'role_id' => 4,
            ),
            298 => 
            array (
                'permission_id' => 148,
                'role_id' => 5,
            ),
            299 => 
            array (
                'permission_id' => 148,
                'role_id' => 7,
            ),
            300 => 
            array (
                'permission_id' => 148,
                'role_id' => 8,
            ),
            301 => 
            array (
                'permission_id' => 149,
                'role_id' => 3,
            ),
            302 => 
            array (
                'permission_id' => 149,
                'role_id' => 4,
            ),
            303 => 
            array (
                'permission_id' => 149,
                'role_id' => 5,
            ),
            304 => 
            array (
                'permission_id' => 149,
                'role_id' => 7,
            ),
            305 => 
            array (
                'permission_id' => 149,
                'role_id' => 8,
            ),
            306 => 
            array (
                'permission_id' => 150,
                'role_id' => 3,
            ),
            307 => 
            array (
                'permission_id' => 150,
                'role_id' => 4,
            ),
            308 => 
            array (
                'permission_id' => 150,
                'role_id' => 5,
            ),
            309 => 
            array (
                'permission_id' => 150,
                'role_id' => 7,
            ),
            310 => 
            array (
                'permission_id' => 150,
                'role_id' => 8,
            ),
            311 => 
            array (
                'permission_id' => 151,
                'role_id' => 3,
            ),
            312 => 
            array (
                'permission_id' => 151,
                'role_id' => 4,
            ),
            313 => 
            array (
                'permission_id' => 151,
                'role_id' => 5,
            ),
            314 => 
            array (
                'permission_id' => 151,
                'role_id' => 6,
            ),
            315 => 
            array (
                'permission_id' => 151,
                'role_id' => 7,
            ),
            316 => 
            array (
                'permission_id' => 151,
                'role_id' => 8,
            ),
            317 => 
            array (
                'permission_id' => 152,
                'role_id' => 4,
            ),
            318 => 
            array (
                'permission_id' => 153,
                'role_id' => 4,
            ),
            319 => 
            array (
                'permission_id' => 154,
                'role_id' => 4,
            ),
            320 => 
            array (
                'permission_id' => 155,
                'role_id' => 7,
            ),
            321 => 
            array (
                'permission_id' => 155,
                'role_id' => 9,
            ),
        ));
        
        
    }
}