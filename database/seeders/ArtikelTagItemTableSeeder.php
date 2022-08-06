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
                'id' => 4,
                'artikel_id' => 27,
                'tag_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'artikel_id' => 28,
                'tag_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 9,
                'artikel_id' => 29,
                'tag_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 10,
                'artikel_id' => 30,
                'tag_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 13,
                'artikel_id' => 33,
                'tag_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 15,
                'artikel_id' => 32,
                'tag_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 19,
                'artikel_id' => 31,
                'tag_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}