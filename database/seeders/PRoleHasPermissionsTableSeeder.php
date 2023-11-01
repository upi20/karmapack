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
                'permission_id' => '1',
                'role_id' => '1',
            ),
            1 => 
            array (
                'permission_id' => '1',
                'role_id' => '2',
            ),
            2 => 
            array (
                'permission_id' => '1',
                'role_id' => '3',
            ),
            3 => 
            array (
                'permission_id' => '1',
                'role_id' => '4',
            ),
            4 => 
            array (
                'permission_id' => '1',
                'role_id' => '5',
            ),
            5 => 
            array (
                'permission_id' => '1',
                'role_id' => '6',
            ),
            6 => 
            array (
                'permission_id' => '1',
                'role_id' => '7',
            ),
            7 => 
            array (
                'permission_id' => '1',
                'role_id' => '8',
            ),
            8 => 
            array (
                'permission_id' => '1',
                'role_id' => '9',
            ),
            9 => 
            array (
                'permission_id' => '2',
                'role_id' => '1',
            ),
            10 => 
            array (
                'permission_id' => '2',
                'role_id' => '2',
            ),
            11 => 
            array (
                'permission_id' => '2',
                'role_id' => '3',
            ),
            12 => 
            array (
                'permission_id' => '2',
                'role_id' => '4',
            ),
            13 => 
            array (
                'permission_id' => '2',
                'role_id' => '5',
            ),
            14 => 
            array (
                'permission_id' => '2',
                'role_id' => '6',
            ),
            15 => 
            array (
                'permission_id' => '2',
                'role_id' => '7',
            ),
            16 => 
            array (
                'permission_id' => '2',
                'role_id' => '8',
            ),
            17 => 
            array (
                'permission_id' => '2',
                'role_id' => '9',
            ),
            18 => 
            array (
                'permission_id' => '3',
                'role_id' => '1',
            ),
            19 => 
            array (
                'permission_id' => '3',
                'role_id' => '4',
            ),
            20 => 
            array (
                'permission_id' => '4',
                'role_id' => '1',
            ),
            21 => 
            array (
                'permission_id' => '4',
                'role_id' => '4',
            ),
            22 => 
            array (
                'permission_id' => '5',
                'role_id' => '1',
            ),
            23 => 
            array (
                'permission_id' => '5',
                'role_id' => '4',
            ),
            24 => 
            array (
                'permission_id' => '6',
                'role_id' => '1',
            ),
            25 => 
            array (
                'permission_id' => '6',
                'role_id' => '4',
            ),
            26 => 
            array (
                'permission_id' => '7',
                'role_id' => '1',
            ),
            27 => 
            array (
                'permission_id' => '7',
                'role_id' => '2',
            ),
            28 => 
            array (
                'permission_id' => '7',
                'role_id' => '3',
            ),
            29 => 
            array (
                'permission_id' => '7',
                'role_id' => '4',
            ),
            30 => 
            array (
                'permission_id' => '7',
                'role_id' => '5',
            ),
            31 => 
            array (
                'permission_id' => '7',
                'role_id' => '6',
            ),
            32 => 
            array (
                'permission_id' => '7',
                'role_id' => '7',
            ),
            33 => 
            array (
                'permission_id' => '7',
                'role_id' => '8',
            ),
            34 => 
            array (
                'permission_id' => '7',
                'role_id' => '9',
            ),
            35 => 
            array (
                'permission_id' => '9',
                'role_id' => '1',
            ),
            36 => 
            array (
                'permission_id' => '10',
                'role_id' => '1',
            ),
            37 => 
            array (
                'permission_id' => '11',
                'role_id' => '1',
            ),
            38 => 
            array (
                'permission_id' => '12',
                'role_id' => '1',
            ),
            39 => 
            array (
                'permission_id' => '12',
                'role_id' => '2',
            ),
            40 => 
            array (
                'permission_id' => '12',
                'role_id' => '3',
            ),
            41 => 
            array (
                'permission_id' => '12',
                'role_id' => '4',
            ),
            42 => 
            array (
                'permission_id' => '12',
                'role_id' => '5',
            ),
            43 => 
            array (
                'permission_id' => '12',
                'role_id' => '6',
            ),
            44 => 
            array (
                'permission_id' => '12',
                'role_id' => '7',
            ),
            45 => 
            array (
                'permission_id' => '12',
                'role_id' => '8',
            ),
            46 => 
            array (
                'permission_id' => '12',
                'role_id' => '9',
            ),
            47 => 
            array (
                'permission_id' => '14',
                'role_id' => '1',
            ),
            48 => 
            array (
                'permission_id' => '15',
                'role_id' => '1',
            ),
            49 => 
            array (
                'permission_id' => '16',
                'role_id' => '1',
            ),
            50 => 
            array (
                'permission_id' => '17',
                'role_id' => '1',
            ),
            51 => 
            array (
                'permission_id' => '17',
                'role_id' => '2',
            ),
            52 => 
            array (
                'permission_id' => '17',
                'role_id' => '3',
            ),
            53 => 
            array (
                'permission_id' => '17',
                'role_id' => '4',
            ),
            54 => 
            array (
                'permission_id' => '17',
                'role_id' => '5',
            ),
            55 => 
            array (
                'permission_id' => '17',
                'role_id' => '6',
            ),
            56 => 
            array (
                'permission_id' => '17',
                'role_id' => '7',
            ),
            57 => 
            array (
                'permission_id' => '17',
                'role_id' => '8',
            ),
            58 => 
            array (
                'permission_id' => '17',
                'role_id' => '9',
            ),
            59 => 
            array (
                'permission_id' => '19',
                'role_id' => '1',
            ),
            60 => 
            array (
                'permission_id' => '20',
                'role_id' => '1',
            ),
            61 => 
            array (
                'permission_id' => '21',
                'role_id' => '1',
            ),
            62 => 
            array (
                'permission_id' => '22',
                'role_id' => '1',
            ),
            63 => 
            array (
                'permission_id' => '22',
                'role_id' => '2',
            ),
            64 => 
            array (
                'permission_id' => '22',
                'role_id' => '3',
            ),
            65 => 
            array (
                'permission_id' => '22',
                'role_id' => '4',
            ),
            66 => 
            array (
                'permission_id' => '22',
                'role_id' => '5',
            ),
            67 => 
            array (
                'permission_id' => '22',
                'role_id' => '6',
            ),
            68 => 
            array (
                'permission_id' => '22',
                'role_id' => '7',
            ),
            69 => 
            array (
                'permission_id' => '22',
                'role_id' => '8',
            ),
            70 => 
            array (
                'permission_id' => '22',
                'role_id' => '9',
            ),
            71 => 
            array (
                'permission_id' => '24',
                'role_id' => '1',
            ),
            72 => 
            array (
                'permission_id' => '25',
                'role_id' => '1',
            ),
            73 => 
            array (
                'permission_id' => '26',
                'role_id' => '1',
            ),
            74 => 
            array (
                'permission_id' => '27',
                'role_id' => '1',
            ),
            75 => 
            array (
                'permission_id' => '27',
                'role_id' => '2',
            ),
            76 => 
            array (
                'permission_id' => '27',
                'role_id' => '3',
            ),
            77 => 
            array (
                'permission_id' => '27',
                'role_id' => '4',
            ),
            78 => 
            array (
                'permission_id' => '27',
                'role_id' => '5',
            ),
            79 => 
            array (
                'permission_id' => '27',
                'role_id' => '6',
            ),
            80 => 
            array (
                'permission_id' => '27',
                'role_id' => '7',
            ),
            81 => 
            array (
                'permission_id' => '27',
                'role_id' => '8',
            ),
            82 => 
            array (
                'permission_id' => '27',
                'role_id' => '9',
            ),
            83 => 
            array (
                'permission_id' => '27',
                'role_id' => '10',
            ),
            84 => 
            array (
                'permission_id' => '30',
                'role_id' => '1',
            ),
            85 => 
            array (
                'permission_id' => '30',
                'role_id' => '10',
            ),
            86 => 
            array (
                'permission_id' => '31',
                'role_id' => '1',
            ),
            87 => 
            array (
                'permission_id' => '31',
                'role_id' => '10',
            ),
            88 => 
            array (
                'permission_id' => '32',
                'role_id' => '1',
            ),
            89 => 
            array (
                'permission_id' => '32',
                'role_id' => '10',
            ),
            90 => 
            array (
                'permission_id' => '33',
                'role_id' => '1',
            ),
            91 => 
            array (
                'permission_id' => '33',
                'role_id' => '2',
            ),
            92 => 
            array (
                'permission_id' => '33',
                'role_id' => '3',
            ),
            93 => 
            array (
                'permission_id' => '33',
                'role_id' => '4',
            ),
            94 => 
            array (
                'permission_id' => '33',
                'role_id' => '5',
            ),
            95 => 
            array (
                'permission_id' => '33',
                'role_id' => '6',
            ),
            96 => 
            array (
                'permission_id' => '33',
                'role_id' => '7',
            ),
            97 => 
            array (
                'permission_id' => '33',
                'role_id' => '8',
            ),
            98 => 
            array (
                'permission_id' => '33',
                'role_id' => '9',
            ),
            99 => 
            array (
                'permission_id' => '33',
                'role_id' => '10',
            ),
            100 => 
            array (
                'permission_id' => '35',
                'role_id' => '1',
            ),
            101 => 
            array (
                'permission_id' => '35',
                'role_id' => '10',
            ),
            102 => 
            array (
                'permission_id' => '36',
                'role_id' => '1',
            ),
            103 => 
            array (
                'permission_id' => '36',
                'role_id' => '10',
            ),
            104 => 
            array (
                'permission_id' => '37',
                'role_id' => '1',
            ),
            105 => 
            array (
                'permission_id' => '37',
                'role_id' => '10',
            ),
            106 => 
            array (
                'permission_id' => '38',
                'role_id' => '1',
            ),
            107 => 
            array (
                'permission_id' => '38',
                'role_id' => '2',
            ),
            108 => 
            array (
                'permission_id' => '38',
                'role_id' => '3',
            ),
            109 => 
            array (
                'permission_id' => '38',
                'role_id' => '4',
            ),
            110 => 
            array (
                'permission_id' => '38',
                'role_id' => '5',
            ),
            111 => 
            array (
                'permission_id' => '38',
                'role_id' => '6',
            ),
            112 => 
            array (
                'permission_id' => '38',
                'role_id' => '7',
            ),
            113 => 
            array (
                'permission_id' => '38',
                'role_id' => '8',
            ),
            114 => 
            array (
                'permission_id' => '38',
                'role_id' => '9',
            ),
            115 => 
            array (
                'permission_id' => '38',
                'role_id' => '10',
            ),
            116 => 
            array (
                'permission_id' => '40',
                'role_id' => '1',
            ),
            117 => 
            array (
                'permission_id' => '40',
                'role_id' => '10',
            ),
            118 => 
            array (
                'permission_id' => '41',
                'role_id' => '1',
            ),
            119 => 
            array (
                'permission_id' => '41',
                'role_id' => '10',
            ),
            120 => 
            array (
                'permission_id' => '42',
                'role_id' => '1',
            ),
            121 => 
            array (
                'permission_id' => '42',
                'role_id' => '10',
            ),
            122 => 
            array (
                'permission_id' => '43',
                'role_id' => '1',
            ),
            123 => 
            array (
                'permission_id' => '43',
                'role_id' => '2',
            ),
            124 => 
            array (
                'permission_id' => '43',
                'role_id' => '3',
            ),
            125 => 
            array (
                'permission_id' => '43',
                'role_id' => '4',
            ),
            126 => 
            array (
                'permission_id' => '43',
                'role_id' => '5',
            ),
            127 => 
            array (
                'permission_id' => '43',
                'role_id' => '6',
            ),
            128 => 
            array (
                'permission_id' => '43',
                'role_id' => '7',
            ),
            129 => 
            array (
                'permission_id' => '43',
                'role_id' => '8',
            ),
            130 => 
            array (
                'permission_id' => '43',
                'role_id' => '9',
            ),
            131 => 
            array (
                'permission_id' => '46',
                'role_id' => '1',
            ),
            132 => 
            array (
                'permission_id' => '47',
                'role_id' => '1',
            ),
            133 => 
            array (
                'permission_id' => '47',
                'role_id' => '3',
            ),
            134 => 
            array (
                'permission_id' => '47',
                'role_id' => '4',
            ),
            135 => 
            array (
                'permission_id' => '47',
                'role_id' => '5',
            ),
            136 => 
            array (
                'permission_id' => '47',
                'role_id' => '6',
            ),
            137 => 
            array (
                'permission_id' => '47',
                'role_id' => '7',
            ),
            138 => 
            array (
                'permission_id' => '47',
                'role_id' => '8',
            ),
            139 => 
            array (
                'permission_id' => '48',
                'role_id' => '1',
            ),
            140 => 
            array (
                'permission_id' => '48',
                'role_id' => '2',
            ),
            141 => 
            array (
                'permission_id' => '48',
                'role_id' => '3',
            ),
            142 => 
            array (
                'permission_id' => '48',
                'role_id' => '4',
            ),
            143 => 
            array (
                'permission_id' => '48',
                'role_id' => '5',
            ),
            144 => 
            array (
                'permission_id' => '48',
                'role_id' => '6',
            ),
            145 => 
            array (
                'permission_id' => '48',
                'role_id' => '7',
            ),
            146 => 
            array (
                'permission_id' => '48',
                'role_id' => '8',
            ),
            147 => 
            array (
                'permission_id' => '48',
                'role_id' => '9',
            ),
            148 => 
            array (
                'permission_id' => '49',
                'role_id' => '1',
            ),
            149 => 
            array (
                'permission_id' => '50',
                'role_id' => '1',
            ),
            150 => 
            array (
                'permission_id' => '51',
                'role_id' => '1',
            ),
            151 => 
            array (
                'permission_id' => '54',
                'role_id' => '1',
            ),
            152 => 
            array (
                'permission_id' => '55',
                'role_id' => '1',
            ),
            153 => 
            array (
                'permission_id' => '55',
                'role_id' => '2',
            ),
            154 => 
            array (
                'permission_id' => '55',
                'role_id' => '3',
            ),
            155 => 
            array (
                'permission_id' => '55',
                'role_id' => '4',
            ),
            156 => 
            array (
                'permission_id' => '55',
                'role_id' => '5',
            ),
            157 => 
            array (
                'permission_id' => '55',
                'role_id' => '6',
            ),
            158 => 
            array (
                'permission_id' => '55',
                'role_id' => '7',
            ),
            159 => 
            array (
                'permission_id' => '55',
                'role_id' => '8',
            ),
            160 => 
            array (
                'permission_id' => '55',
                'role_id' => '9',
            ),
            161 => 
            array (
                'permission_id' => '56',
                'role_id' => '1',
            ),
            162 => 
            array (
                'permission_id' => '57',
                'role_id' => '1',
            ),
            163 => 
            array (
                'permission_id' => '59',
                'role_id' => '1',
            ),
            164 => 
            array (
                'permission_id' => '59',
                'role_id' => '2',
            ),
            165 => 
            array (
                'permission_id' => '59',
                'role_id' => '3',
            ),
            166 => 
            array (
                'permission_id' => '59',
                'role_id' => '4',
            ),
            167 => 
            array (
                'permission_id' => '59',
                'role_id' => '5',
            ),
            168 => 
            array (
                'permission_id' => '59',
                'role_id' => '6',
            ),
            169 => 
            array (
                'permission_id' => '59',
                'role_id' => '7',
            ),
            170 => 
            array (
                'permission_id' => '59',
                'role_id' => '8',
            ),
            171 => 
            array (
                'permission_id' => '59',
                'role_id' => '9',
            ),
            172 => 
            array (
                'permission_id' => '60',
                'role_id' => '1',
            ),
            173 => 
            array (
                'permission_id' => '61',
                'role_id' => '1',
            ),
            174 => 
            array (
                'permission_id' => '61',
                'role_id' => '2',
            ),
            175 => 
            array (
                'permission_id' => '61',
                'role_id' => '3',
            ),
            176 => 
            array (
                'permission_id' => '61',
                'role_id' => '4',
            ),
            177 => 
            array (
                'permission_id' => '61',
                'role_id' => '5',
            ),
            178 => 
            array (
                'permission_id' => '61',
                'role_id' => '6',
            ),
            179 => 
            array (
                'permission_id' => '61',
                'role_id' => '7',
            ),
            180 => 
            array (
                'permission_id' => '61',
                'role_id' => '8',
            ),
            181 => 
            array (
                'permission_id' => '61',
                'role_id' => '9',
            ),
            182 => 
            array (
                'permission_id' => '63',
                'role_id' => '1',
            ),
            183 => 
            array (
                'permission_id' => '63',
                'role_id' => '4',
            ),
            184 => 
            array (
                'permission_id' => '64',
                'role_id' => '1',
            ),
            185 => 
            array (
                'permission_id' => '64',
                'role_id' => '4',
            ),
            186 => 
            array (
                'permission_id' => '65',
                'role_id' => '1',
            ),
            187 => 
            array (
                'permission_id' => '65',
                'role_id' => '4',
            ),
            188 => 
            array (
                'permission_id' => '66',
                'role_id' => '1',
            ),
            189 => 
            array (
                'permission_id' => '66',
                'role_id' => '2',
            ),
            190 => 
            array (
                'permission_id' => '66',
                'role_id' => '3',
            ),
            191 => 
            array (
                'permission_id' => '66',
                'role_id' => '4',
            ),
            192 => 
            array (
                'permission_id' => '66',
                'role_id' => '5',
            ),
            193 => 
            array (
                'permission_id' => '66',
                'role_id' => '6',
            ),
            194 => 
            array (
                'permission_id' => '66',
                'role_id' => '7',
            ),
            195 => 
            array (
                'permission_id' => '66',
                'role_id' => '8',
            ),
            196 => 
            array (
                'permission_id' => '66',
                'role_id' => '9',
            ),
            197 => 
            array (
                'permission_id' => '67',
                'role_id' => '1',
            ),
            198 => 
            array (
                'permission_id' => '68',
                'role_id' => '1',
            ),
            199 => 
            array (
                'permission_id' => '69',
                'role_id' => '1',
            ),
            200 => 
            array (
                'permission_id' => '70',
                'role_id' => '1',
            ),
            201 => 
            array (
                'permission_id' => '70',
                'role_id' => '2',
            ),
            202 => 
            array (
                'permission_id' => '70',
                'role_id' => '3',
            ),
            203 => 
            array (
                'permission_id' => '70',
                'role_id' => '4',
            ),
            204 => 
            array (
                'permission_id' => '70',
                'role_id' => '5',
            ),
            205 => 
            array (
                'permission_id' => '70',
                'role_id' => '6',
            ),
            206 => 
            array (
                'permission_id' => '70',
                'role_id' => '7',
            ),
            207 => 
            array (
                'permission_id' => '70',
                'role_id' => '8',
            ),
            208 => 
            array (
                'permission_id' => '70',
                'role_id' => '9',
            ),
            209 => 
            array (
                'permission_id' => '71',
                'role_id' => '1',
            ),
            210 => 
            array (
                'permission_id' => '72',
                'role_id' => '1',
            ),
            211 => 
            array (
                'permission_id' => '73',
                'role_id' => '1',
            ),
            212 => 
            array (
                'permission_id' => '74',
                'role_id' => '1',
            ),
            213 => 
            array (
                'permission_id' => '74',
                'role_id' => '2',
            ),
            214 => 
            array (
                'permission_id' => '74',
                'role_id' => '3',
            ),
            215 => 
            array (
                'permission_id' => '74',
                'role_id' => '4',
            ),
            216 => 
            array (
                'permission_id' => '74',
                'role_id' => '5',
            ),
            217 => 
            array (
                'permission_id' => '74',
                'role_id' => '6',
            ),
            218 => 
            array (
                'permission_id' => '74',
                'role_id' => '7',
            ),
            219 => 
            array (
                'permission_id' => '74',
                'role_id' => '8',
            ),
            220 => 
            array (
                'permission_id' => '74',
                'role_id' => '9',
            ),
            221 => 
            array (
                'permission_id' => '75',
                'role_id' => '1',
            ),
            222 => 
            array (
                'permission_id' => '76',
                'role_id' => '1',
            ),
            223 => 
            array (
                'permission_id' => '77',
                'role_id' => '1',
            ),
            224 => 
            array (
                'permission_id' => '78',
                'role_id' => '1',
            ),
            225 => 
            array (
                'permission_id' => '78',
                'role_id' => '2',
            ),
            226 => 
            array (
                'permission_id' => '78',
                'role_id' => '3',
            ),
            227 => 
            array (
                'permission_id' => '78',
                'role_id' => '4',
            ),
            228 => 
            array (
                'permission_id' => '78',
                'role_id' => '5',
            ),
            229 => 
            array (
                'permission_id' => '78',
                'role_id' => '6',
            ),
            230 => 
            array (
                'permission_id' => '78',
                'role_id' => '7',
            ),
            231 => 
            array (
                'permission_id' => '78',
                'role_id' => '8',
            ),
            232 => 
            array (
                'permission_id' => '78',
                'role_id' => '9',
            ),
            233 => 
            array (
                'permission_id' => '79',
                'role_id' => '1',
            ),
            234 => 
            array (
                'permission_id' => '79',
                'role_id' => '4',
            ),
            235 => 
            array (
                'permission_id' => '80',
                'role_id' => '1',
            ),
            236 => 
            array (
                'permission_id' => '80',
                'role_id' => '4',
            ),
            237 => 
            array (
                'permission_id' => '81',
                'role_id' => '1',
            ),
            238 => 
            array (
                'permission_id' => '81',
                'role_id' => '4',
            ),
            239 => 
            array (
                'permission_id' => '82',
                'role_id' => '1',
            ),
            240 => 
            array (
                'permission_id' => '82',
                'role_id' => '2',
            ),
            241 => 
            array (
                'permission_id' => '82',
                'role_id' => '3',
            ),
            242 => 
            array (
                'permission_id' => '82',
                'role_id' => '4',
            ),
            243 => 
            array (
                'permission_id' => '82',
                'role_id' => '5',
            ),
            244 => 
            array (
                'permission_id' => '82',
                'role_id' => '6',
            ),
            245 => 
            array (
                'permission_id' => '82',
                'role_id' => '7',
            ),
            246 => 
            array (
                'permission_id' => '82',
                'role_id' => '8',
            ),
            247 => 
            array (
                'permission_id' => '82',
                'role_id' => '9',
            ),
            248 => 
            array (
                'permission_id' => '83',
                'role_id' => '1',
            ),
            249 => 
            array (
                'permission_id' => '83',
                'role_id' => '4',
            ),
            250 => 
            array (
                'permission_id' => '84',
                'role_id' => '1',
            ),
            251 => 
            array (
                'permission_id' => '84',
                'role_id' => '4',
            ),
            252 => 
            array (
                'permission_id' => '85',
                'role_id' => '1',
            ),
            253 => 
            array (
                'permission_id' => '85',
                'role_id' => '4',
            ),
            254 => 
            array (
                'permission_id' => '86',
                'role_id' => '1',
            ),
            255 => 
            array (
                'permission_id' => '86',
                'role_id' => '2',
            ),
            256 => 
            array (
                'permission_id' => '86',
                'role_id' => '3',
            ),
            257 => 
            array (
                'permission_id' => '86',
                'role_id' => '4',
            ),
            258 => 
            array (
                'permission_id' => '86',
                'role_id' => '5',
            ),
            259 => 
            array (
                'permission_id' => '86',
                'role_id' => '6',
            ),
            260 => 
            array (
                'permission_id' => '86',
                'role_id' => '7',
            ),
            261 => 
            array (
                'permission_id' => '86',
                'role_id' => '8',
            ),
            262 => 
            array (
                'permission_id' => '86',
                'role_id' => '9',
            ),
            263 => 
            array (
                'permission_id' => '87',
                'role_id' => '1',
            ),
            264 => 
            array (
                'permission_id' => '88',
                'role_id' => '1',
            ),
            265 => 
            array (
                'permission_id' => '89',
                'role_id' => '1',
            ),
            266 => 
            array (
                'permission_id' => '89',
                'role_id' => '2',
            ),
            267 => 
            array (
                'permission_id' => '89',
                'role_id' => '3',
            ),
            268 => 
            array (
                'permission_id' => '89',
                'role_id' => '4',
            ),
            269 => 
            array (
                'permission_id' => '89',
                'role_id' => '5',
            ),
            270 => 
            array (
                'permission_id' => '89',
                'role_id' => '6',
            ),
            271 => 
            array (
                'permission_id' => '89',
                'role_id' => '7',
            ),
            272 => 
            array (
                'permission_id' => '89',
                'role_id' => '8',
            ),
            273 => 
            array (
                'permission_id' => '89',
                'role_id' => '9',
            ),
            274 => 
            array (
                'permission_id' => '90',
                'role_id' => '1',
            ),
            275 => 
            array (
                'permission_id' => '91',
                'role_id' => '1',
            ),
            276 => 
            array (
                'permission_id' => '92',
                'role_id' => '1',
            ),
            277 => 
            array (
                'permission_id' => '93',
                'role_id' => '1',
            ),
            278 => 
            array (
                'permission_id' => '94',
                'role_id' => '1',
            ),
            279 => 
            array (
                'permission_id' => '94',
                'role_id' => '2',
            ),
            280 => 
            array (
                'permission_id' => '94',
                'role_id' => '3',
            ),
            281 => 
            array (
                'permission_id' => '94',
                'role_id' => '4',
            ),
            282 => 
            array (
                'permission_id' => '94',
                'role_id' => '5',
            ),
            283 => 
            array (
                'permission_id' => '94',
                'role_id' => '6',
            ),
            284 => 
            array (
                'permission_id' => '94',
                'role_id' => '7',
            ),
            285 => 
            array (
                'permission_id' => '94',
                'role_id' => '8',
            ),
            286 => 
            array (
                'permission_id' => '94',
                'role_id' => '9',
            ),
            287 => 
            array (
                'permission_id' => '95',
                'role_id' => '1',
            ),
            288 => 
            array (
                'permission_id' => '96',
                'role_id' => '1',
            ),
            289 => 
            array (
                'permission_id' => '97',
                'role_id' => '1',
            ),
            290 => 
            array (
                'permission_id' => '97',
                'role_id' => '2',
            ),
            291 => 
            array (
                'permission_id' => '97',
                'role_id' => '3',
            ),
            292 => 
            array (
                'permission_id' => '97',
                'role_id' => '4',
            ),
            293 => 
            array (
                'permission_id' => '97',
                'role_id' => '5',
            ),
            294 => 
            array (
                'permission_id' => '97',
                'role_id' => '6',
            ),
            295 => 
            array (
                'permission_id' => '97',
                'role_id' => '7',
            ),
            296 => 
            array (
                'permission_id' => '97',
                'role_id' => '8',
            ),
            297 => 
            array (
                'permission_id' => '97',
                'role_id' => '9',
            ),
            298 => 
            array (
                'permission_id' => '99',
                'role_id' => '1',
            ),
            299 => 
            array (
                'permission_id' => '100',
                'role_id' => '1',
            ),
            300 => 
            array (
                'permission_id' => '101',
                'role_id' => '1',
            ),
            301 => 
            array (
                'permission_id' => '102',
                'role_id' => '1',
            ),
            302 => 
            array (
                'permission_id' => '102',
                'role_id' => '2',
            ),
            303 => 
            array (
                'permission_id' => '102',
                'role_id' => '3',
            ),
            304 => 
            array (
                'permission_id' => '102',
                'role_id' => '4',
            ),
            305 => 
            array (
                'permission_id' => '102',
                'role_id' => '5',
            ),
            306 => 
            array (
                'permission_id' => '102',
                'role_id' => '6',
            ),
            307 => 
            array (
                'permission_id' => '102',
                'role_id' => '7',
            ),
            308 => 
            array (
                'permission_id' => '102',
                'role_id' => '8',
            ),
            309 => 
            array (
                'permission_id' => '102',
                'role_id' => '9',
            ),
            310 => 
            array (
                'permission_id' => '103',
                'role_id' => '1',
            ),
            311 => 
            array (
                'permission_id' => '107',
                'role_id' => '1',
            ),
            312 => 
            array (
                'permission_id' => '108',
                'role_id' => '1',
            ),
            313 => 
            array (
                'permission_id' => '109',
                'role_id' => '1',
            ),
            314 => 
            array (
                'permission_id' => '109',
                'role_id' => '2',
            ),
            315 => 
            array (
                'permission_id' => '109',
                'role_id' => '3',
            ),
            316 => 
            array (
                'permission_id' => '109',
                'role_id' => '4',
            ),
            317 => 
            array (
                'permission_id' => '109',
                'role_id' => '5',
            ),
            318 => 
            array (
                'permission_id' => '109',
                'role_id' => '6',
            ),
            319 => 
            array (
                'permission_id' => '109',
                'role_id' => '7',
            ),
            320 => 
            array (
                'permission_id' => '109',
                'role_id' => '8',
            ),
            321 => 
            array (
                'permission_id' => '109',
                'role_id' => '9',
            ),
            322 => 
            array (
                'permission_id' => '110',
                'role_id' => '1',
            ),
            323 => 
            array (
                'permission_id' => '110',
                'role_id' => '2',
            ),
            324 => 
            array (
                'permission_id' => '110',
                'role_id' => '3',
            ),
            325 => 
            array (
                'permission_id' => '110',
                'role_id' => '4',
            ),
            326 => 
            array (
                'permission_id' => '110',
                'role_id' => '5',
            ),
            327 => 
            array (
                'permission_id' => '110',
                'role_id' => '6',
            ),
            328 => 
            array (
                'permission_id' => '110',
                'role_id' => '7',
            ),
            329 => 
            array (
                'permission_id' => '110',
                'role_id' => '8',
            ),
            330 => 
            array (
                'permission_id' => '110',
                'role_id' => '9',
            ),
            331 => 
            array (
                'permission_id' => '135',
                'role_id' => '1',
            ),
            332 => 
            array (
                'permission_id' => '135',
                'role_id' => '2',
            ),
            333 => 
            array (
                'permission_id' => '135',
                'role_id' => '3',
            ),
            334 => 
            array (
                'permission_id' => '135',
                'role_id' => '4',
            ),
            335 => 
            array (
                'permission_id' => '135',
                'role_id' => '5',
            ),
            336 => 
            array (
                'permission_id' => '135',
                'role_id' => '6',
            ),
            337 => 
            array (
                'permission_id' => '135',
                'role_id' => '7',
            ),
            338 => 
            array (
                'permission_id' => '135',
                'role_id' => '8',
            ),
            339 => 
            array (
                'permission_id' => '135',
                'role_id' => '9',
            ),
            340 => 
            array (
                'permission_id' => '136',
                'role_id' => '1',
            ),
            341 => 
            array (
                'permission_id' => '136',
                'role_id' => '2',
            ),
            342 => 
            array (
                'permission_id' => '136',
                'role_id' => '3',
            ),
            343 => 
            array (
                'permission_id' => '136',
                'role_id' => '4',
            ),
            344 => 
            array (
                'permission_id' => '136',
                'role_id' => '5',
            ),
            345 => 
            array (
                'permission_id' => '136',
                'role_id' => '6',
            ),
            346 => 
            array (
                'permission_id' => '136',
                'role_id' => '7',
            ),
            347 => 
            array (
                'permission_id' => '136',
                'role_id' => '8',
            ),
            348 => 
            array (
                'permission_id' => '136',
                'role_id' => '9',
            ),
            349 => 
            array (
                'permission_id' => '137',
                'role_id' => '1',
            ),
            350 => 
            array (
                'permission_id' => '137',
                'role_id' => '2',
            ),
            351 => 
            array (
                'permission_id' => '137',
                'role_id' => '3',
            ),
            352 => 
            array (
                'permission_id' => '137',
                'role_id' => '4',
            ),
            353 => 
            array (
                'permission_id' => '137',
                'role_id' => '5',
            ),
            354 => 
            array (
                'permission_id' => '137',
                'role_id' => '6',
            ),
            355 => 
            array (
                'permission_id' => '137',
                'role_id' => '7',
            ),
            356 => 
            array (
                'permission_id' => '137',
                'role_id' => '8',
            ),
            357 => 
            array (
                'permission_id' => '137',
                'role_id' => '9',
            ),
            358 => 
            array (
                'permission_id' => '139',
                'role_id' => '1',
            ),
            359 => 
            array (
                'permission_id' => '140',
                'role_id' => '1',
            ),
            360 => 
            array (
                'permission_id' => '141',
                'role_id' => '1',
            ),
            361 => 
            array (
                'permission_id' => '143',
                'role_id' => '1',
            ),
            362 => 
            array (
                'permission_id' => '145',
                'role_id' => '1',
            ),
            363 => 
            array (
                'permission_id' => '145',
                'role_id' => '4',
            ),
            364 => 
            array (
                'permission_id' => '146',
                'role_id' => '1',
            ),
            365 => 
            array (
                'permission_id' => '147',
                'role_id' => '1',
            ),
            366 => 
            array (
                'permission_id' => '147',
                'role_id' => '3',
            ),
            367 => 
            array (
                'permission_id' => '147',
                'role_id' => '4',
            ),
            368 => 
            array (
                'permission_id' => '147',
                'role_id' => '5',
            ),
            369 => 
            array (
                'permission_id' => '147',
                'role_id' => '6',
            ),
            370 => 
            array (
                'permission_id' => '147',
                'role_id' => '7',
            ),
            371 => 
            array (
                'permission_id' => '147',
                'role_id' => '8',
            ),
            372 => 
            array (
                'permission_id' => '147',
                'role_id' => '9',
            ),
            373 => 
            array (
                'permission_id' => '148',
                'role_id' => '1',
            ),
            374 => 
            array (
                'permission_id' => '148',
                'role_id' => '3',
            ),
            375 => 
            array (
                'permission_id' => '148',
                'role_id' => '4',
            ),
            376 => 
            array (
                'permission_id' => '148',
                'role_id' => '5',
            ),
            377 => 
            array (
                'permission_id' => '148',
                'role_id' => '7',
            ),
            378 => 
            array (
                'permission_id' => '148',
                'role_id' => '8',
            ),
            379 => 
            array (
                'permission_id' => '149',
                'role_id' => '1',
            ),
            380 => 
            array (
                'permission_id' => '149',
                'role_id' => '3',
            ),
            381 => 
            array (
                'permission_id' => '149',
                'role_id' => '4',
            ),
            382 => 
            array (
                'permission_id' => '149',
                'role_id' => '5',
            ),
            383 => 
            array (
                'permission_id' => '149',
                'role_id' => '7',
            ),
            384 => 
            array (
                'permission_id' => '149',
                'role_id' => '8',
            ),
            385 => 
            array (
                'permission_id' => '150',
                'role_id' => '1',
            ),
            386 => 
            array (
                'permission_id' => '150',
                'role_id' => '3',
            ),
            387 => 
            array (
                'permission_id' => '150',
                'role_id' => '4',
            ),
            388 => 
            array (
                'permission_id' => '150',
                'role_id' => '5',
            ),
            389 => 
            array (
                'permission_id' => '150',
                'role_id' => '7',
            ),
            390 => 
            array (
                'permission_id' => '150',
                'role_id' => '8',
            ),
            391 => 
            array (
                'permission_id' => '151',
                'role_id' => '1',
            ),
            392 => 
            array (
                'permission_id' => '151',
                'role_id' => '3',
            ),
            393 => 
            array (
                'permission_id' => '151',
                'role_id' => '4',
            ),
            394 => 
            array (
                'permission_id' => '151',
                'role_id' => '5',
            ),
            395 => 
            array (
                'permission_id' => '151',
                'role_id' => '6',
            ),
            396 => 
            array (
                'permission_id' => '151',
                'role_id' => '7',
            ),
            397 => 
            array (
                'permission_id' => '151',
                'role_id' => '8',
            ),
            398 => 
            array (
                'permission_id' => '151',
                'role_id' => '9',
            ),
            399 => 
            array (
                'permission_id' => '152',
                'role_id' => '1',
            ),
            400 => 
            array (
                'permission_id' => '152',
                'role_id' => '4',
            ),
            401 => 
            array (
                'permission_id' => '153',
                'role_id' => '1',
            ),
            402 => 
            array (
                'permission_id' => '153',
                'role_id' => '4',
            ),
            403 => 
            array (
                'permission_id' => '154',
                'role_id' => '1',
            ),
            404 => 
            array (
                'permission_id' => '154',
                'role_id' => '4',
            ),
            405 => 
            array (
                'permission_id' => '155',
                'role_id' => '1',
            ),
            406 => 
            array (
                'permission_id' => '155',
                'role_id' => '4',
            ),
            407 => 
            array (
                'permission_id' => '155',
                'role_id' => '7',
            ),
            408 => 
            array (
                'permission_id' => '155',
                'role_id' => '9',
            ),
            409 => 
            array (
                'permission_id' => '156',
                'role_id' => '1',
            ),
            410 => 
            array (
                'permission_id' => '156',
                'role_id' => '2',
            ),
            411 => 
            array (
                'permission_id' => '156',
                'role_id' => '3',
            ),
            412 => 
            array (
                'permission_id' => '156',
                'role_id' => '4',
            ),
            413 => 
            array (
                'permission_id' => '156',
                'role_id' => '5',
            ),
            414 => 
            array (
                'permission_id' => '156',
                'role_id' => '6',
            ),
            415 => 
            array (
                'permission_id' => '156',
                'role_id' => '7',
            ),
            416 => 
            array (
                'permission_id' => '156',
                'role_id' => '8',
            ),
            417 => 
            array (
                'permission_id' => '156',
                'role_id' => '9',
            ),
            418 => 
            array (
                'permission_id' => '157',
                'role_id' => '1',
            ),
            419 => 
            array (
                'permission_id' => '158',
                'role_id' => '1',
            ),
            420 => 
            array (
                'permission_id' => '158',
                'role_id' => '2',
            ),
            421 => 
            array (
                'permission_id' => '158',
                'role_id' => '9',
            ),
            422 => 
            array (
                'permission_id' => '159',
                'role_id' => '1',
            ),
            423 => 
            array (
                'permission_id' => '160',
                'role_id' => '1',
            ),
            424 => 
            array (
                'permission_id' => '161',
                'role_id' => '1',
            ),
            425 => 
            array (
                'permission_id' => '161',
                'role_id' => '2',
            ),
            426 => 
            array (
                'permission_id' => '161',
                'role_id' => '3',
            ),
            427 => 
            array (
                'permission_id' => '161',
                'role_id' => '4',
            ),
            428 => 
            array (
                'permission_id' => '161',
                'role_id' => '5',
            ),
            429 => 
            array (
                'permission_id' => '161',
                'role_id' => '6',
            ),
            430 => 
            array (
                'permission_id' => '161',
                'role_id' => '7',
            ),
            431 => 
            array (
                'permission_id' => '161',
                'role_id' => '8',
            ),
            432 => 
            array (
                'permission_id' => '161',
                'role_id' => '9',
            ),
            433 => 
            array (
                'permission_id' => '162',
                'role_id' => '1',
            ),
            434 => 
            array (
                'permission_id' => '163',
                'role_id' => '1',
            ),
            435 => 
            array (
                'permission_id' => '164',
                'role_id' => '1',
            ),
            436 => 
            array (
                'permission_id' => '165',
                'role_id' => '1',
            ),
            437 => 
            array (
                'permission_id' => '166',
                'role_id' => '1',
            ),
            438 => 
            array (
                'permission_id' => '166',
                'role_id' => '4',
            ),
            439 => 
            array (
                'permission_id' => '166',
                'role_id' => '5',
            ),
            440 => 
            array (
                'permission_id' => '166',
                'role_id' => '6',
            ),
            441 => 
            array (
                'permission_id' => '166',
                'role_id' => '8',
            ),
            442 => 
            array (
                'permission_id' => '167',
                'role_id' => '1',
            ),
            443 => 
            array (
                'permission_id' => '168',
                'role_id' => '1',
            ),
            444 => 
            array (
                'permission_id' => '168',
                'role_id' => '4',
            ),
            445 => 
            array (
                'permission_id' => '168',
                'role_id' => '5',
            ),
            446 => 
            array (
                'permission_id' => '168',
                'role_id' => '6',
            ),
            447 => 
            array (
                'permission_id' => '169',
                'role_id' => '1',
            ),
            448 => 
            array (
                'permission_id' => '169',
                'role_id' => '2',
            ),
            449 => 
            array (
                'permission_id' => '169',
                'role_id' => '3',
            ),
            450 => 
            array (
                'permission_id' => '169',
                'role_id' => '4',
            ),
            451 => 
            array (
                'permission_id' => '169',
                'role_id' => '5',
            ),
            452 => 
            array (
                'permission_id' => '169',
                'role_id' => '6',
            ),
            453 => 
            array (
                'permission_id' => '169',
                'role_id' => '7',
            ),
            454 => 
            array (
                'permission_id' => '169',
                'role_id' => '8',
            ),
            455 => 
            array (
                'permission_id' => '169',
                'role_id' => '9',
            ),
            456 => 
            array (
                'permission_id' => '170',
                'role_id' => '1',
            ),
            457 => 
            array (
                'permission_id' => '170',
                'role_id' => '2',
            ),
            458 => 
            array (
                'permission_id' => '170',
                'role_id' => '3',
            ),
            459 => 
            array (
                'permission_id' => '170',
                'role_id' => '4',
            ),
            460 => 
            array (
                'permission_id' => '170',
                'role_id' => '5',
            ),
            461 => 
            array (
                'permission_id' => '170',
                'role_id' => '6',
            ),
            462 => 
            array (
                'permission_id' => '170',
                'role_id' => '7',
            ),
            463 => 
            array (
                'permission_id' => '170',
                'role_id' => '9',
            ),
            464 => 
            array (
                'permission_id' => '171',
                'role_id' => '1',
            ),
            465 => 
            array (
                'permission_id' => '171',
                'role_id' => '2',
            ),
            466 => 
            array (
                'permission_id' => '171',
                'role_id' => '3',
            ),
            467 => 
            array (
                'permission_id' => '171',
                'role_id' => '4',
            ),
            468 => 
            array (
                'permission_id' => '171',
                'role_id' => '5',
            ),
            469 => 
            array (
                'permission_id' => '171',
                'role_id' => '6',
            ),
            470 => 
            array (
                'permission_id' => '171',
                'role_id' => '7',
            ),
            471 => 
            array (
                'permission_id' => '171',
                'role_id' => '8',
            ),
            472 => 
            array (
                'permission_id' => '171',
                'role_id' => '9',
            ),
            473 => 
            array (
                'permission_id' => '172',
                'role_id' => '1',
            ),
            474 => 
            array (
                'permission_id' => '172',
                'role_id' => '2',
            ),
            475 => 
            array (
                'permission_id' => '172',
                'role_id' => '3',
            ),
            476 => 
            array (
                'permission_id' => '172',
                'role_id' => '4',
            ),
            477 => 
            array (
                'permission_id' => '172',
                'role_id' => '5',
            ),
            478 => 
            array (
                'permission_id' => '172',
                'role_id' => '6',
            ),
            479 => 
            array (
                'permission_id' => '172',
                'role_id' => '7',
            ),
            480 => 
            array (
                'permission_id' => '172',
                'role_id' => '8',
            ),
            481 => 
            array (
                'permission_id' => '172',
                'role_id' => '9',
            ),
            482 => 
            array (
                'permission_id' => '173',
                'role_id' => '1',
            ),
            483 => 
            array (
                'permission_id' => '173',
                'role_id' => '9',
            ),
            484 => 
            array (
                'permission_id' => '174',
                'role_id' => '1',
            ),
            485 => 
            array (
                'permission_id' => '174',
                'role_id' => '9',
            ),
            486 => 
            array (
                'permission_id' => '175',
                'role_id' => '1',
            ),
            487 => 
            array (
                'permission_id' => '175',
                'role_id' => '9',
            ),
            488 => 
            array (
                'permission_id' => '176',
                'role_id' => '1',
            ),
            489 => 
            array (
                'permission_id' => '176',
                'role_id' => '9',
            ),
            490 => 
            array (
                'permission_id' => '177',
                'role_id' => '1',
            ),
            491 => 
            array (
                'permission_id' => '177',
                'role_id' => '3',
            ),
            492 => 
            array (
                'permission_id' => '178',
                'role_id' => '1',
            ),
            493 => 
            array (
                'permission_id' => '178',
                'role_id' => '2',
            ),
            494 => 
            array (
                'permission_id' => '178',
                'role_id' => '3',
            ),
            495 => 
            array (
                'permission_id' => '178',
                'role_id' => '4',
            ),
            496 => 
            array (
                'permission_id' => '178',
                'role_id' => '5',
            ),
            497 => 
            array (
                'permission_id' => '178',
                'role_id' => '6',
            ),
            498 => 
            array (
                'permission_id' => '178',
                'role_id' => '7',
            ),
            499 => 
            array (
                'permission_id' => '178',
                'role_id' => '8',
            ),
        ));
        \DB::table('p_role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => '178',
                'role_id' => '9',
            ),
            1 => 
            array (
                'permission_id' => '179',
                'role_id' => '2',
            ),
        ));
        
        
    }
}