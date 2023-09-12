<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArtikelKategoriItemTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('artikel_kategori_item')->delete();
        
        \DB::table('artikel_kategori_item')->insert(array (
            0 => 
            array (
                'id' => '4',
                'artikel_id' => '27',
                'kategori_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => '5',
                'artikel_id' => '28',
                'kategori_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => '9',
                'artikel_id' => '29',
                'kategori_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => '10',
                'artikel_id' => '30',
                'kategori_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => '15',
                'artikel_id' => '33',
                'kategori_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => '16',
                'artikel_id' => '34',
                'kategori_id' => '6',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => '17',
                'artikel_id' => '35',
                'kategori_id' => '6',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => '20',
                'artikel_id' => '32',
                'kategori_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => '21',
                'artikel_id' => '32',
                'kategori_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => '22',
                'artikel_id' => '32',
                'kategori_id' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => '23',
                'artikel_id' => '32',
                'kategori_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => '31',
                'artikel_id' => '31',
                'kategori_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => '32',
                'artikel_id' => '31',
                'kategori_id' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => '39',
                'artikel_id' => '37',
                'kategori_id' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => '40',
                'artikel_id' => '37',
                'kategori_id' => '8',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => '41',
                'artikel_id' => '38',
                'kategori_id' => '9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => '44',
                'artikel_id' => '40',
                'kategori_id' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => '49',
                'artikel_id' => '41',
                'kategori_id' => '11',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => '54',
                'artikel_id' => '43',
                'kategori_id' => '13',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => '55',
                'artikel_id' => '42',
                'kategori_id' => '13',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}