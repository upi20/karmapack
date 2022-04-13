<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArtikelKategoriTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('artikel_kategori')->delete();
        
        \DB::table('artikel_kategori')->insert(array (
            0 => 
            array (
                'id' => 2,
                'nama' => 'Edukasi',
                'slug' => 'edukasi',
                'foto' => NULL,
                'status' => 1,
                'created_at' => '2022-04-13 19:11:56',
                'updated_at' => '2022-04-13 19:11:56',
            ),
        ));
        
        
    }
}