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
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '1',
            ),
            11 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '23',
            ),
            12 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '24',
            ),
            13 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '30',
            ),
            14 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '43',
            ),
            15 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '45',
            ),
            16 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '46',
            ),
            17 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '54',
            ),
            18 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '69',
            ),
            19 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '72',
            ),
            20 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '73',
            ),
            21 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '74',
            ),
            22 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '75',
            ),
            23 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '76',
            ),
            24 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '77',
            ),
            25 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '78',
            ),
            26 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '79',
            ),
            27 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '80',
            ),
            28 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '81',
            ),
            29 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '82',
            ),
            30 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '83',
            ),
            31 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '84',
            ),
            32 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '85',
            ),
            33 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '86',
            ),
            34 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '87',
            ),
            35 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '89',
            ),
            36 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '90',
            ),
            37 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '91',
            ),
            38 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '93',
            ),
            39 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '94',
            ),
            40 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '95',
            ),
            41 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '96',
            ),
            42 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '97',
            ),
            43 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '98',
            ),
            44 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '108',
            ),
            45 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '109',
            ),
            46 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '110',
            ),
            47 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\Models\\User',
                'model_id' => '111',
            ),
            48 => 
            array (
                'role_id' => '4',
                'model_type' => 'App\\Models\\User',
                'model_id' => '57',
            ),
            49 => 
            array (
                'role_id' => '5',
                'model_type' => 'App\\Models\\User',
                'model_id' => '32',
            ),
            50 => 
            array (
                'role_id' => '6',
                'model_type' => 'App\\Models\\User',
                'model_id' => '26',
            ),
            51 => 
            array (
                'role_id' => '7',
                'model_type' => 'App\\Models\\User',
                'model_id' => '22',
            ),
            52 => 
            array (
                'role_id' => '7',
                'model_type' => 'App\\Models\\User',
                'model_id' => '33',
            ),
            53 => 
            array (
                'role_id' => '7',
                'model_type' => 'App\\Models\\User',
                'model_id' => '58',
            ),
            54 => 
            array (
                'role_id' => '7',
                'model_type' => 'App\\Models\\User',
                'model_id' => '65',
            ),
            55 => 
            array (
                'role_id' => '7',
                'model_type' => 'App\\Models\\User',
                'model_id' => '68',
            ),
            56 => 
            array (
                'role_id' => '7',
                'model_type' => 'App\\Models\\User',
                'model_id' => '92',
            ),
            57 => 
            array (
                'role_id' => '8',
                'model_type' => 'App\\Models\\User',
                'model_id' => '27',
            ),
            58 => 
            array (
                'role_id' => '8',
                'model_type' => 'App\\Models\\User',
                'model_id' => '34',
            ),
            59 => 
            array (
                'role_id' => '8',
                'model_type' => 'App\\Models\\User',
                'model_id' => '35',
            ),
            60 => 
            array (
                'role_id' => '8',
                'model_type' => 'App\\Models\\User',
                'model_id' => '51',
            ),
            61 => 
            array (
                'role_id' => '8',
                'model_type' => 'App\\Models\\User',
                'model_id' => '63',
            ),
            62 => 
            array (
                'role_id' => '8',
                'model_type' => 'App\\Models\\User',
                'model_id' => '64',
            ),
            63 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '16',
            ),
            64 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '20',
            ),
            65 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '28',
            ),
            66 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '29',
            ),
            67 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '31',
            ),
            68 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '37',
            ),
            69 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '38',
            ),
            70 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '39',
            ),
            71 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '40',
            ),
            72 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '41',
            ),
            73 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '42',
            ),
            74 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '44',
            ),
            75 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '47',
            ),
            76 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '49',
            ),
            77 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '50',
            ),
            78 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '52',
            ),
            79 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '53',
            ),
            80 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '55',
            ),
            81 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '59',
            ),
            82 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '60',
            ),
            83 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '61',
            ),
            84 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '62',
            ),
            85 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '67',
            ),
            86 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '70',
            ),
            87 => 
            array (
                'role_id' => '9',
                'model_type' => 'App\\Models\\User',
                'model_id' => '71',
            ),
        ));
        
        
    }
}