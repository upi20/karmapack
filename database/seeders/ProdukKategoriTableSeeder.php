<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdukKategoriTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('produk_kategori')->delete();
        
        \DB::table('produk_kategori')->insert(array (
            0 => 
            array (
                'id' => 6,
                'nama' => 'Biji Kopi',
                'slug' => 'biji-kopi',
                'keterangan' => NULL,
                'created_at' => '2023-03-20 12:29:03',
                'updated_at' => '2023-03-20 12:29:03',
            ),
            1 => 
            array (
                'id' => 7,
                'nama' => 'Biji Kopi A',
                'slug' => 'biji-kopi-a',
                'keterangan' => NULL,
                'created_at' => '2023-03-20 12:29:49',
                'updated_at' => '2023-03-20 12:29:49',
            ),
            2 => 
            array (
                'id' => 8,
                'nama' => 'Biji Kopi B',
                'slug' => 'biji-kopi-b',
                'keterangan' => NULL,
                'created_at' => '2023-03-20 12:29:56',
                'updated_at' => '2023-03-20 12:29:56',
            ),
            3 => 
            array (
                'id' => 9,
                'nama' => 'Biji Kopi C',
                'slug' => 'biji-kopi-c',
                'keterangan' => NULL,
                'created_at' => '2023-03-20 12:30:02',
                'updated_at' => '2023-03-20 12:30:02',
            ),
            4 => 
            array (
                'id' => 10,
                'nama' => 'Biji Kopi D',
                'slug' => 'biji-kopi-d',
                'keterangan' => NULL,
                'created_at' => '2023-03-20 12:30:09',
                'updated_at' => '2023-03-20 12:30:15',
            ),
        ));
        
        
    }
}