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
                'id' => 1,
                'artikel_id' => 5,
                'kategori_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}