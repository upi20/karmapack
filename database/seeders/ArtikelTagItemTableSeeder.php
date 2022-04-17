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
                'id' => 1,
                'artikel_id' => 5,
                'tag_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}