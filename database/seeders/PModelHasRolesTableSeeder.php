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
                'role_id' => '1',
                'model_type' => 'App\\Models\\User',
                'model_id' => '1',
            ),
            1 => 
            array (
                'role_id' => '1',
                'model_type' => 'App\\Models\\User',
                'model_id' => '17',
            ),
            2 => 
            array (
                'role_id' => '1',
                'model_type' => 'App\\Models\\User',
                'model_id' => '19',
            ),
            3 => 
            array (
                'role_id' => '1',
                'model_type' => 'App\\Models\\User',
                'model_id' => '21',
            ),
            4 => 
            array (
                'role_id' => '1',
                'model_type' => 'App\\Models\\User',
                'model_id' => '99',
            ),
            5 => 
            array (
                'role_id' => '1',
                'model_type' => 'App\\Models\\User',
                'model_id' => '100',
            ),
            6 => 
            array (
                'role_id' => '1',
                'model_type' => 'App\\Models\\User',
                'model_id' => '101',
            ),
            7 => 
            array (
                'role_id' => '1',
                'model_type' => 'App\\Models\\User',
                'model_id' => '106',
            ),
            8 => 
            array (
                'role_id' => '2',
                'model_type' => 'App\\Models\\User',
                'model_id' => '1',
            ),
            9 => 
            array (
                'role_id' => '2',
                'model_type' => 'App\\Models\\User',
                'model_id' => '36',
            ),
            10 => 
            array (
                'role_id' => '2',
                'model_type' => 'App\\Models\\User',
                'model_id' => '113',
            ),
            11 => 
            array (
                'role_id' => '2',
                'model_type' => 'App\\Models\\User',
                'model_id' => '114',
            ),
            12 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '1',
            ),
            13 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '23',
            ),
            14 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '24',
            ),
            15 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '30',
            ),
            16 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '43',
            ),
            17 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '45',
            ),
            18 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '46',
            ),
            19 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '54',
            ),
            20 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '69',
            ),
            21 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '72',
            ),
            22 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '73',
            ),
            23 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '74',
            ),
            24 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '75',
            ),
            25 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '76',
            ),
            26 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '77',
            ),
            27 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '78',
            ),
            28 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '79',
            ),
            29 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '80',
            ),
            30 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '81',
            ),
            31 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '82',
            ),
            32 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '83',
            ),
            33 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '84',
            ),
            34 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '85',
            ),
            35 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '86',
            ),
            36 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '87',
            ),
            37 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '89',
            ),
            38 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '90',
            ),
            39 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '91',
            ),
            40 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '93',
            ),
            41 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '94',
            ),
            42 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '95',
            ),
            43 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '96',
            ),
            44 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '97',
            ),
            45 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '98',
            ),
            46 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '108',
            ),
            47 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '109',
            ),
            48 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '110',
            ),
            49 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '111',
            ),
            50 => 
            array (
                'role_id' => '4',
                'model_type' => 'App\\Models\\User',
                'model_id' => '57',
            ),
            51 => 
            array (
                'role_id' => '5',
                'model_type' => 'App\\Models\\User',
                'model_id' => '32',
            ),
            52 => 
            array (
                'role_id' => '6',
                'model_type' => 'App\\Models\\User',
                'model_id' => '26',
            ),
            53 => 
            array (
                'role_id' => '7',
                'model_type' => 'App\\Models\\User',
                'model_id' => '22',
            ),
            54 => 
            array (
                'role_id' => '7',
                'model_type' => 'App\\Models\\User',
                'model_id' => '33',
            ),
            55 => 
            array (
                'role_id' => '7',
                'model_type' => 'App\\Models\\User',
                'model_id' => '58',
            ),
            56 => 
            array (
                'role_id' => '7',
                'model_type' => 'App\\Models\\User',
                'model_id' => '65',
            ),
            57 => 
            array (
                'role_id' => '7',
                'model_type' => 'App\\Models\\User',
                'model_id' => '68',
            ),
            58 => 
            array (
                'role_id' => '7',
                'model_type' => 'App\\Models\\User',
                'model_id' => '92',
            ),
            59 => 
            array (
                'role_id' => '8',
                'model_type' => 'App\\Models\\User',
                'model_id' => '27',
            ),
            60 => 
            array (
                'role_id' => '8',
                'model_type' => 'App\\Models\\User',
                'model_id' => '34',
            ),
            61 => 
            array (
                'role_id' => '8',
                'model_type' => 'App\\Models\\User',
                'model_id' => '35',
            ),
            62 => 
            array (
                'role_id' => '8',
                'model_type' => 'App\\Models\\User',
                'model_id' => '51',
            ),
            63 => 
            array (
                'role_id' => '8',
                'model_type' => 'App\\Models\\User',
                'model_id' => '63',
            ),
            64 => 
            array (
                'role_id' => '8',
                'model_type' => 'App\\Models\\User',
                'model_id' => '64',
            ),
            65 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '16',
            ),
            66 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '20',
            ),
            67 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '28',
            ),
            68 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '29',
            ),
            69 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '31',
            ),
            70 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '37',
            ),
            71 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '38',
            ),
            72 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '39',
            ),
            73 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '40',
            ),
            74 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '41',
            ),
            75 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '42',
            ),
            76 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '44',
            ),
            77 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '47',
            ),
            78 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '49',
            ),
            79 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '50',
            ),
            80 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '52',
            ),
            81 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '53',
            ),
            82 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '55',
            ),
            83 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '59',
            ),
            84 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '60',
            ),
            85 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '61',
            ),
            86 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '62',
            ),
            87 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '67',
            ),
            88 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '70',
            ),
            89 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '71',
            ),
        ));
        
        
    }
}