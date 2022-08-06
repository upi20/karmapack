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
                'permission_id' => 27,
                'role_id' => 10,
            ),
            4 => 
            array (
                'permission_id' => 28,
                'role_id' => 10,
            ),
            5 => 
            array (
                'permission_id' => 29,
                'role_id' => 10,
            ),
            6 => 
            array (
                'permission_id' => 30,
                'role_id' => 10,
            ),
            7 => 
            array (
                'permission_id' => 31,
                'role_id' => 10,
            ),
            8 => 
            array (
                'permission_id' => 32,
                'role_id' => 10,
            ),
            9 => 
            array (
                'permission_id' => 33,
                'role_id' => 10,
            ),
            10 => 
            array (
                'permission_id' => 34,
                'role_id' => 10,
            ),
            11 => 
            array (
                'permission_id' => 35,
                'role_id' => 10,
            ),
            12 => 
            array (
                'permission_id' => 36,
                'role_id' => 10,
            ),
            13 => 
            array (
                'permission_id' => 37,
                'role_id' => 10,
            ),
            14 => 
            array (
                'permission_id' => 38,
                'role_id' => 10,
            ),
            15 => 
            array (
                'permission_id' => 39,
                'role_id' => 10,
            ),
            16 => 
            array (
                'permission_id' => 40,
                'role_id' => 10,
            ),
            17 => 
            array (
                'permission_id' => 41,
                'role_id' => 10,
            ),
            18 => 
            array (
                'permission_id' => 42,
                'role_id' => 10,
            ),
            19 => 
            array (
                'permission_id' => 109,
                'role_id' => 2,
            ),
            20 => 
            array (
                'permission_id' => 109,
                'role_id' => 3,
            ),
            21 => 
            array (
                'permission_id' => 109,
                'role_id' => 4,
            ),
            22 => 
            array (
                'permission_id' => 109,
                'role_id' => 5,
            ),
            23 => 
            array (
                'permission_id' => 109,
                'role_id' => 6,
            ),
            24 => 
            array (
                'permission_id' => 109,
                'role_id' => 7,
            ),
            25 => 
            array (
                'permission_id' => 109,
                'role_id' => 8,
            ),
            26 => 
            array (
                'permission_id' => 109,
                'role_id' => 9,
            ),
            27 => 
            array (
                'permission_id' => 110,
                'role_id' => 2,
            ),
            28 => 
            array (
                'permission_id' => 110,
                'role_id' => 3,
            ),
            29 => 
            array (
                'permission_id' => 110,
                'role_id' => 4,
            ),
            30 => 
            array (
                'permission_id' => 110,
                'role_id' => 5,
            ),
            31 => 
            array (
                'permission_id' => 110,
                'role_id' => 6,
            ),
            32 => 
            array (
                'permission_id' => 110,
                'role_id' => 7,
            ),
            33 => 
            array (
                'permission_id' => 110,
                'role_id' => 8,
            ),
            34 => 
            array (
                'permission_id' => 110,
                'role_id' => 9,
            ),
            35 => 
            array (
                'permission_id' => 111,
                'role_id' => 2,
            ),
            36 => 
            array (
                'permission_id' => 111,
                'role_id' => 3,
            ),
            37 => 
            array (
                'permission_id' => 111,
                'role_id' => 4,
            ),
            38 => 
            array (
                'permission_id' => 111,
                'role_id' => 5,
            ),
            39 => 
            array (
                'permission_id' => 111,
                'role_id' => 6,
            ),
            40 => 
            array (
                'permission_id' => 111,
                'role_id' => 7,
            ),
            41 => 
            array (
                'permission_id' => 111,
                'role_id' => 8,
            ),
            42 => 
            array (
                'permission_id' => 111,
                'role_id' => 9,
            ),
            43 => 
            array (
                'permission_id' => 112,
                'role_id' => 2,
            ),
            44 => 
            array (
                'permission_id' => 112,
                'role_id' => 3,
            ),
            45 => 
            array (
                'permission_id' => 112,
                'role_id' => 4,
            ),
            46 => 
            array (
                'permission_id' => 112,
                'role_id' => 5,
            ),
            47 => 
            array (
                'permission_id' => 112,
                'role_id' => 6,
            ),
            48 => 
            array (
                'permission_id' => 112,
                'role_id' => 7,
            ),
            49 => 
            array (
                'permission_id' => 112,
                'role_id' => 8,
            ),
            50 => 
            array (
                'permission_id' => 112,
                'role_id' => 9,
            ),
            51 => 
            array (
                'permission_id' => 113,
                'role_id' => 2,
            ),
            52 => 
            array (
                'permission_id' => 113,
                'role_id' => 3,
            ),
            53 => 
            array (
                'permission_id' => 113,
                'role_id' => 4,
            ),
            54 => 
            array (
                'permission_id' => 113,
                'role_id' => 5,
            ),
            55 => 
            array (
                'permission_id' => 113,
                'role_id' => 6,
            ),
            56 => 
            array (
                'permission_id' => 113,
                'role_id' => 7,
            ),
            57 => 
            array (
                'permission_id' => 113,
                'role_id' => 8,
            ),
            58 => 
            array (
                'permission_id' => 113,
                'role_id' => 9,
            ),
            59 => 
            array (
                'permission_id' => 114,
                'role_id' => 2,
            ),
            60 => 
            array (
                'permission_id' => 114,
                'role_id' => 3,
            ),
            61 => 
            array (
                'permission_id' => 114,
                'role_id' => 4,
            ),
            62 => 
            array (
                'permission_id' => 114,
                'role_id' => 5,
            ),
            63 => 
            array (
                'permission_id' => 114,
                'role_id' => 6,
            ),
            64 => 
            array (
                'permission_id' => 114,
                'role_id' => 7,
            ),
            65 => 
            array (
                'permission_id' => 114,
                'role_id' => 8,
            ),
            66 => 
            array (
                'permission_id' => 114,
                'role_id' => 9,
            ),
            67 => 
            array (
                'permission_id' => 115,
                'role_id' => 2,
            ),
            68 => 
            array (
                'permission_id' => 115,
                'role_id' => 3,
            ),
            69 => 
            array (
                'permission_id' => 115,
                'role_id' => 4,
            ),
            70 => 
            array (
                'permission_id' => 115,
                'role_id' => 5,
            ),
            71 => 
            array (
                'permission_id' => 115,
                'role_id' => 6,
            ),
            72 => 
            array (
                'permission_id' => 115,
                'role_id' => 7,
            ),
            73 => 
            array (
                'permission_id' => 115,
                'role_id' => 8,
            ),
            74 => 
            array (
                'permission_id' => 115,
                'role_id' => 9,
            ),
            75 => 
            array (
                'permission_id' => 116,
                'role_id' => 2,
            ),
            76 => 
            array (
                'permission_id' => 116,
                'role_id' => 3,
            ),
            77 => 
            array (
                'permission_id' => 116,
                'role_id' => 4,
            ),
            78 => 
            array (
                'permission_id' => 116,
                'role_id' => 5,
            ),
            79 => 
            array (
                'permission_id' => 116,
                'role_id' => 6,
            ),
            80 => 
            array (
                'permission_id' => 116,
                'role_id' => 7,
            ),
            81 => 
            array (
                'permission_id' => 116,
                'role_id' => 8,
            ),
            82 => 
            array (
                'permission_id' => 116,
                'role_id' => 9,
            ),
            83 => 
            array (
                'permission_id' => 117,
                'role_id' => 2,
            ),
            84 => 
            array (
                'permission_id' => 117,
                'role_id' => 3,
            ),
            85 => 
            array (
                'permission_id' => 117,
                'role_id' => 4,
            ),
            86 => 
            array (
                'permission_id' => 117,
                'role_id' => 5,
            ),
            87 => 
            array (
                'permission_id' => 117,
                'role_id' => 6,
            ),
            88 => 
            array (
                'permission_id' => 117,
                'role_id' => 7,
            ),
            89 => 
            array (
                'permission_id' => 117,
                'role_id' => 8,
            ),
            90 => 
            array (
                'permission_id' => 117,
                'role_id' => 9,
            ),
            91 => 
            array (
                'permission_id' => 118,
                'role_id' => 2,
            ),
            92 => 
            array (
                'permission_id' => 118,
                'role_id' => 3,
            ),
            93 => 
            array (
                'permission_id' => 118,
                'role_id' => 4,
            ),
            94 => 
            array (
                'permission_id' => 118,
                'role_id' => 5,
            ),
            95 => 
            array (
                'permission_id' => 118,
                'role_id' => 6,
            ),
            96 => 
            array (
                'permission_id' => 118,
                'role_id' => 7,
            ),
            97 => 
            array (
                'permission_id' => 118,
                'role_id' => 8,
            ),
            98 => 
            array (
                'permission_id' => 118,
                'role_id' => 9,
            ),
            99 => 
            array (
                'permission_id' => 119,
                'role_id' => 2,
            ),
            100 => 
            array (
                'permission_id' => 119,
                'role_id' => 3,
            ),
            101 => 
            array (
                'permission_id' => 119,
                'role_id' => 4,
            ),
            102 => 
            array (
                'permission_id' => 119,
                'role_id' => 5,
            ),
            103 => 
            array (
                'permission_id' => 119,
                'role_id' => 6,
            ),
            104 => 
            array (
                'permission_id' => 119,
                'role_id' => 7,
            ),
            105 => 
            array (
                'permission_id' => 119,
                'role_id' => 8,
            ),
            106 => 
            array (
                'permission_id' => 119,
                'role_id' => 9,
            ),
            107 => 
            array (
                'permission_id' => 120,
                'role_id' => 2,
            ),
            108 => 
            array (
                'permission_id' => 120,
                'role_id' => 3,
            ),
            109 => 
            array (
                'permission_id' => 120,
                'role_id' => 4,
            ),
            110 => 
            array (
                'permission_id' => 120,
                'role_id' => 5,
            ),
            111 => 
            array (
                'permission_id' => 120,
                'role_id' => 6,
            ),
            112 => 
            array (
                'permission_id' => 120,
                'role_id' => 7,
            ),
            113 => 
            array (
                'permission_id' => 120,
                'role_id' => 8,
            ),
            114 => 
            array (
                'permission_id' => 120,
                'role_id' => 9,
            ),
            115 => 
            array (
                'permission_id' => 121,
                'role_id' => 2,
            ),
            116 => 
            array (
                'permission_id' => 121,
                'role_id' => 3,
            ),
            117 => 
            array (
                'permission_id' => 121,
                'role_id' => 4,
            ),
            118 => 
            array (
                'permission_id' => 121,
                'role_id' => 5,
            ),
            119 => 
            array (
                'permission_id' => 121,
                'role_id' => 6,
            ),
            120 => 
            array (
                'permission_id' => 121,
                'role_id' => 7,
            ),
            121 => 
            array (
                'permission_id' => 121,
                'role_id' => 8,
            ),
            122 => 
            array (
                'permission_id' => 121,
                'role_id' => 9,
            ),
            123 => 
            array (
                'permission_id' => 122,
                'role_id' => 2,
            ),
            124 => 
            array (
                'permission_id' => 122,
                'role_id' => 3,
            ),
            125 => 
            array (
                'permission_id' => 122,
                'role_id' => 4,
            ),
            126 => 
            array (
                'permission_id' => 122,
                'role_id' => 5,
            ),
            127 => 
            array (
                'permission_id' => 122,
                'role_id' => 6,
            ),
            128 => 
            array (
                'permission_id' => 122,
                'role_id' => 7,
            ),
            129 => 
            array (
                'permission_id' => 122,
                'role_id' => 8,
            ),
            130 => 
            array (
                'permission_id' => 122,
                'role_id' => 9,
            ),
            131 => 
            array (
                'permission_id' => 123,
                'role_id' => 2,
            ),
            132 => 
            array (
                'permission_id' => 123,
                'role_id' => 3,
            ),
            133 => 
            array (
                'permission_id' => 123,
                'role_id' => 4,
            ),
            134 => 
            array (
                'permission_id' => 123,
                'role_id' => 5,
            ),
            135 => 
            array (
                'permission_id' => 123,
                'role_id' => 6,
            ),
            136 => 
            array (
                'permission_id' => 123,
                'role_id' => 7,
            ),
            137 => 
            array (
                'permission_id' => 123,
                'role_id' => 8,
            ),
            138 => 
            array (
                'permission_id' => 123,
                'role_id' => 9,
            ),
            139 => 
            array (
                'permission_id' => 124,
                'role_id' => 2,
            ),
            140 => 
            array (
                'permission_id' => 124,
                'role_id' => 3,
            ),
            141 => 
            array (
                'permission_id' => 124,
                'role_id' => 4,
            ),
            142 => 
            array (
                'permission_id' => 124,
                'role_id' => 5,
            ),
            143 => 
            array (
                'permission_id' => 124,
                'role_id' => 6,
            ),
            144 => 
            array (
                'permission_id' => 124,
                'role_id' => 7,
            ),
            145 => 
            array (
                'permission_id' => 124,
                'role_id' => 8,
            ),
            146 => 
            array (
                'permission_id' => 124,
                'role_id' => 9,
            ),
            147 => 
            array (
                'permission_id' => 125,
                'role_id' => 2,
            ),
            148 => 
            array (
                'permission_id' => 125,
                'role_id' => 3,
            ),
            149 => 
            array (
                'permission_id' => 125,
                'role_id' => 4,
            ),
            150 => 
            array (
                'permission_id' => 125,
                'role_id' => 5,
            ),
            151 => 
            array (
                'permission_id' => 125,
                'role_id' => 6,
            ),
            152 => 
            array (
                'permission_id' => 125,
                'role_id' => 7,
            ),
            153 => 
            array (
                'permission_id' => 125,
                'role_id' => 8,
            ),
            154 => 
            array (
                'permission_id' => 125,
                'role_id' => 9,
            ),
            155 => 
            array (
                'permission_id' => 126,
                'role_id' => 2,
            ),
            156 => 
            array (
                'permission_id' => 126,
                'role_id' => 3,
            ),
            157 => 
            array (
                'permission_id' => 126,
                'role_id' => 4,
            ),
            158 => 
            array (
                'permission_id' => 126,
                'role_id' => 5,
            ),
            159 => 
            array (
                'permission_id' => 126,
                'role_id' => 6,
            ),
            160 => 
            array (
                'permission_id' => 126,
                'role_id' => 7,
            ),
            161 => 
            array (
                'permission_id' => 126,
                'role_id' => 8,
            ),
            162 => 
            array (
                'permission_id' => 126,
                'role_id' => 9,
            ),
            163 => 
            array (
                'permission_id' => 127,
                'role_id' => 2,
            ),
            164 => 
            array (
                'permission_id' => 127,
                'role_id' => 3,
            ),
            165 => 
            array (
                'permission_id' => 127,
                'role_id' => 4,
            ),
            166 => 
            array (
                'permission_id' => 127,
                'role_id' => 5,
            ),
            167 => 
            array (
                'permission_id' => 127,
                'role_id' => 6,
            ),
            168 => 
            array (
                'permission_id' => 127,
                'role_id' => 7,
            ),
            169 => 
            array (
                'permission_id' => 127,
                'role_id' => 8,
            ),
            170 => 
            array (
                'permission_id' => 127,
                'role_id' => 9,
            ),
            171 => 
            array (
                'permission_id' => 128,
                'role_id' => 2,
            ),
            172 => 
            array (
                'permission_id' => 128,
                'role_id' => 3,
            ),
            173 => 
            array (
                'permission_id' => 128,
                'role_id' => 4,
            ),
            174 => 
            array (
                'permission_id' => 128,
                'role_id' => 5,
            ),
            175 => 
            array (
                'permission_id' => 128,
                'role_id' => 6,
            ),
            176 => 
            array (
                'permission_id' => 128,
                'role_id' => 7,
            ),
            177 => 
            array (
                'permission_id' => 128,
                'role_id' => 8,
            ),
            178 => 
            array (
                'permission_id' => 128,
                'role_id' => 9,
            ),
            179 => 
            array (
                'permission_id' => 129,
                'role_id' => 2,
            ),
            180 => 
            array (
                'permission_id' => 129,
                'role_id' => 3,
            ),
            181 => 
            array (
                'permission_id' => 129,
                'role_id' => 4,
            ),
            182 => 
            array (
                'permission_id' => 129,
                'role_id' => 5,
            ),
            183 => 
            array (
                'permission_id' => 129,
                'role_id' => 6,
            ),
            184 => 
            array (
                'permission_id' => 129,
                'role_id' => 7,
            ),
            185 => 
            array (
                'permission_id' => 129,
                'role_id' => 8,
            ),
            186 => 
            array (
                'permission_id' => 129,
                'role_id' => 9,
            ),
            187 => 
            array (
                'permission_id' => 130,
                'role_id' => 2,
            ),
            188 => 
            array (
                'permission_id' => 130,
                'role_id' => 3,
            ),
            189 => 
            array (
                'permission_id' => 130,
                'role_id' => 4,
            ),
            190 => 
            array (
                'permission_id' => 130,
                'role_id' => 5,
            ),
            191 => 
            array (
                'permission_id' => 130,
                'role_id' => 6,
            ),
            192 => 
            array (
                'permission_id' => 130,
                'role_id' => 7,
            ),
            193 => 
            array (
                'permission_id' => 130,
                'role_id' => 8,
            ),
            194 => 
            array (
                'permission_id' => 130,
                'role_id' => 9,
            ),
            195 => 
            array (
                'permission_id' => 131,
                'role_id' => 2,
            ),
            196 => 
            array (
                'permission_id' => 131,
                'role_id' => 3,
            ),
            197 => 
            array (
                'permission_id' => 131,
                'role_id' => 4,
            ),
            198 => 
            array (
                'permission_id' => 131,
                'role_id' => 5,
            ),
            199 => 
            array (
                'permission_id' => 131,
                'role_id' => 6,
            ),
            200 => 
            array (
                'permission_id' => 131,
                'role_id' => 7,
            ),
            201 => 
            array (
                'permission_id' => 131,
                'role_id' => 8,
            ),
            202 => 
            array (
                'permission_id' => 131,
                'role_id' => 9,
            ),
            203 => 
            array (
                'permission_id' => 132,
                'role_id' => 2,
            ),
            204 => 
            array (
                'permission_id' => 132,
                'role_id' => 3,
            ),
            205 => 
            array (
                'permission_id' => 132,
                'role_id' => 4,
            ),
            206 => 
            array (
                'permission_id' => 132,
                'role_id' => 5,
            ),
            207 => 
            array (
                'permission_id' => 132,
                'role_id' => 6,
            ),
            208 => 
            array (
                'permission_id' => 132,
                'role_id' => 7,
            ),
            209 => 
            array (
                'permission_id' => 132,
                'role_id' => 8,
            ),
            210 => 
            array (
                'permission_id' => 132,
                'role_id' => 9,
            ),
            211 => 
            array (
                'permission_id' => 133,
                'role_id' => 2,
            ),
            212 => 
            array (
                'permission_id' => 133,
                'role_id' => 3,
            ),
            213 => 
            array (
                'permission_id' => 133,
                'role_id' => 4,
            ),
            214 => 
            array (
                'permission_id' => 133,
                'role_id' => 5,
            ),
            215 => 
            array (
                'permission_id' => 133,
                'role_id' => 6,
            ),
            216 => 
            array (
                'permission_id' => 133,
                'role_id' => 7,
            ),
            217 => 
            array (
                'permission_id' => 133,
                'role_id' => 8,
            ),
            218 => 
            array (
                'permission_id' => 133,
                'role_id' => 9,
            ),
            219 => 
            array (
                'permission_id' => 134,
                'role_id' => 2,
            ),
            220 => 
            array (
                'permission_id' => 134,
                'role_id' => 3,
            ),
            221 => 
            array (
                'permission_id' => 134,
                'role_id' => 4,
            ),
            222 => 
            array (
                'permission_id' => 134,
                'role_id' => 5,
            ),
            223 => 
            array (
                'permission_id' => 134,
                'role_id' => 6,
            ),
            224 => 
            array (
                'permission_id' => 134,
                'role_id' => 7,
            ),
            225 => 
            array (
                'permission_id' => 134,
                'role_id' => 8,
            ),
            226 => 
            array (
                'permission_id' => 134,
                'role_id' => 9,
            ),
            227 => 
            array (
                'permission_id' => 135,
                'role_id' => 2,
            ),
            228 => 
            array (
                'permission_id' => 135,
                'role_id' => 3,
            ),
            229 => 
            array (
                'permission_id' => 135,
                'role_id' => 4,
            ),
            230 => 
            array (
                'permission_id' => 135,
                'role_id' => 5,
            ),
            231 => 
            array (
                'permission_id' => 135,
                'role_id' => 6,
            ),
            232 => 
            array (
                'permission_id' => 135,
                'role_id' => 7,
            ),
            233 => 
            array (
                'permission_id' => 135,
                'role_id' => 8,
            ),
            234 => 
            array (
                'permission_id' => 135,
                'role_id' => 9,
            ),
            235 => 
            array (
                'permission_id' => 136,
                'role_id' => 2,
            ),
            236 => 
            array (
                'permission_id' => 136,
                'role_id' => 3,
            ),
            237 => 
            array (
                'permission_id' => 136,
                'role_id' => 4,
            ),
            238 => 
            array (
                'permission_id' => 136,
                'role_id' => 5,
            ),
            239 => 
            array (
                'permission_id' => 136,
                'role_id' => 6,
            ),
            240 => 
            array (
                'permission_id' => 136,
                'role_id' => 7,
            ),
            241 => 
            array (
                'permission_id' => 136,
                'role_id' => 8,
            ),
            242 => 
            array (
                'permission_id' => 136,
                'role_id' => 9,
            ),
        ));
        
        
    }
}