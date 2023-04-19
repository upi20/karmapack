<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdukMarketPlaceTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('produk_market_place')->delete();
        
        \DB::table('produk_market_place')->insert(array (
            0 => 
            array (
                'id' => 1,
                'produk_id' => 4,
                'jenis_id' => 9,
                'link' => NULL,
                'created_at' => '2023-03-20 12:31:19',
                'updated_at' => '2023-03-20 12:31:19',
            ),
            1 => 
            array (
                'id' => 2,
                'produk_id' => 4,
                'jenis_id' => 3,
                'link' => 'https://padiumkm.id/store/68374-wkg-roastery',
                'created_at' => '2023-03-20 12:31:27',
                'updated_at' => '2023-03-20 12:31:27',
            ),
            2 => 
            array (
                'id' => 3,
                'produk_id' => 4,
                'jenis_id' => 2,
                'link' => 'https://chat.whatsapp.com/E9Eumj8OwpbLOplOxPer4e',
                'created_at' => '2023-03-20 12:31:37',
                'updated_at' => '2023-03-20 12:31:37',
            ),
            3 => 
            array (
                'id' => 4,
                'produk_id' => 4,
                'jenis_id' => 6,
                'link' => NULL,
                'created_at' => '2023-03-20 12:31:47',
                'updated_at' => '2023-03-20 12:31:55',
            ),
            4 => 
            array (
                'id' => 5,
                'produk_id' => 5,
                'jenis_id' => 6,
                'link' => NULL,
                'created_at' => '2023-03-20 12:34:17',
                'updated_at' => '2023-03-20 12:34:17',
            ),
            5 => 
            array (
                'id' => 6,
                'produk_id' => 6,
                'jenis_id' => 1,
                'link' => 'https://padiumkm.id/store/68374-wkg-roastery',
                'created_at' => '2023-03-20 12:37:39',
                'updated_at' => '2023-03-20 12:37:39',
            ),
            6 => 
            array (
                'id' => 7,
                'produk_id' => 6,
                'jenis_id' => 2,
                'link' => NULL,
                'created_at' => '2023-03-20 12:37:49',
                'updated_at' => '2023-03-20 12:37:49',
            ),
        ));
        
        
    }
}