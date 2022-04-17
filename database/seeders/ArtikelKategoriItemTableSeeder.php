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
                'id' => 4,
                'artikel_id' => 27,
                'kategori_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'artikel_id' => 28,
                'kategori_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}