<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdukFotoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('produk_foto')->delete();
        
        \DB::table('produk_foto')->insert(array (
            0 => 
            array (
                'id' => 1,
                'produk_id' => 4,
                'nama' => 'a',
                'foto' => '20230320123045.png',
                'urutan' => 1,
                'created_at' => '2023-03-20 12:30:45',
                'updated_at' => '2023-03-20 12:30:45',
            ),
            1 => 
            array (
                'id' => 2,
                'produk_id' => 4,
                'nama' => 'b',
                'foto' => '20230320123056.png',
                'urutan' => 2,
                'created_at' => '2023-03-20 12:30:56',
                'updated_at' => '2023-03-20 12:30:56',
            ),
            2 => 
            array (
                'id' => 3,
                'produk_id' => 4,
                'nama' => 'c',
                'foto' => '20230320123113.png',
                'urutan' => 3,
                'created_at' => '2023-03-20 12:31:13',
                'updated_at' => '2023-03-20 12:31:13',
            ),
            3 => 
            array (
                'id' => 4,
                'produk_id' => 5,
                'nama' => 'a',
                'foto' => 'robusta-vietnam20230320123402.png',
                'urutan' => 1,
                'created_at' => '2023-03-20 12:34:02',
                'updated_at' => '2023-03-20 12:34:02',
            ),
            4 => 
            array (
                'id' => 5,
                'produk_id' => 5,
                'nama' => 'w',
                'foto' => 'robusta-vietnam20230320123412.png',
                'urutan' => 2,
                'created_at' => '2023-03-20 12:34:12',
                'updated_at' => '2023-03-20 12:34:12',
            ),
            5 => 
            array (
                'id' => 6,
                'produk_id' => 6,
                'nama' => 'a',
                'foto' => 'ethiopia-yirgacheffe20230320123710.png',
                'urutan' => 1,
                'created_at' => '2023-03-20 12:37:10',
                'updated_at' => '2023-03-20 12:37:10',
            ),
            6 => 
            array (
                'id' => 7,
                'produk_id' => 6,
                'nama' => 'b',
                'foto' => 'ethiopia-yirgacheffe20230320123719.png',
                'urutan' => 2,
                'created_at' => '2023-03-20 12:37:19',
                'updated_at' => '2023-03-20 12:37:19',
            ),
            7 => 
            array (
                'id' => 8,
                'produk_id' => 6,
                'nama' => 'd',
                'foto' => 'ethiopia-yirgacheffe20230320123730.png',
                'urutan' => 3,
                'created_at' => '2023-03-20 12:37:30',
                'updated_at' => '2023-03-20 12:37:30',
            ),
        ));
        
        
    }
}