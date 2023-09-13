<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArtikelTagItemTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('artikel_tag_item')->delete();
        
        \DB::table('artikel_tag_item')->insert(array (
            0 => 
            array (
                'id' => '4',
                'artikel_id' => '27',
                'tag_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => '5',
                'artikel_id' => '28',
                'tag_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => '9',
                'artikel_id' => '29',
                'tag_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => '10',
                'artikel_id' => '30',
                'tag_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => '13',
                'artikel_id' => '33',
                'tag_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => '15',
                'artikel_id' => '32',
                'tag_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => '21',
                'artikel_id' => '31',
                'tag_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => '25',
                'artikel_id' => '37',
                'tag_id' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => '26',
                'artikel_id' => '38',
                'tag_id' => '6',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => '28',
                'artikel_id' => '40',
                'tag_id' => '9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => '32',
                'artikel_id' => '41',
                'tag_id' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => '41',
                'artikel_id' => '43',
                'tag_id' => '13',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => '42',
                'artikel_id' => '42',
                'tag_id' => '11',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => '43',
                'artikel_id' => '42',
                'tag_id' => '12',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => '44',
                'artikel_id' => '42',
                'tag_id' => '13',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}