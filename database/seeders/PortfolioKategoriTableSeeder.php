<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PortfolioKategoriTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('portfolio_kategori')->delete();
        
        \DB::table('portfolio_kategori')->insert(array (
            0 => 
            array (
                'id' => 7,
                'urutan' => 2,
                'nama' => 'Ilustrator',
                'slug' => 'ilustrator',
                'keterangan' => NULL,
                'created_at' => '2023-04-12 23:55:26',
                'updated_at' => '2023-04-14 02:22:07',
            ),
            1 => 
            array (
                'id' => 8,
                'urutan' => 3,
                'nama' => 'Sosial Media/ Ads',
                'slug' => 'sosial-media-ads',
                'keterangan' => NULL,
                'created_at' => '2023-04-12 23:55:38',
                'updated_at' => '2023-04-14 02:22:58',
            ),
            2 => 
            array (
                'id' => 9,
                'urutan' => 4,
                'nama' => 'Brosur',
                'slug' => 'brosur',
                'keterangan' => NULL,
                'created_at' => '2023-04-12 23:55:45',
                'updated_at' => '2023-04-14 02:23:14',
            ),
            3 => 
            array (
                'id' => 10,
                'urutan' => 5,
                'nama' => 'Lainnya',
                'slug' => 'lainnya',
                'keterangan' => NULL,
                'created_at' => '2023-04-13 01:52:09',
                'updated_at' => '2023-04-13 01:52:09',
            ),
            4 => 
            array (
                'id' => 11,
                'urutan' => 1,
                'nama' => 'Logo',
                'slug' => 'logo',
                'keterangan' => NULL,
                'created_at' => '2023-04-14 02:19:55',
                'updated_at' => '2023-04-15 15:42:34',
            ),
            5 => 
            array (
                'id' => 12,
                'urutan' => 6,
                'nama' => 'Kaos',
                'slug' => 'kaos',
                'keterangan' => NULL,
                'created_at' => '2023-04-14 02:23:53',
                'updated_at' => '2023-04-14 02:23:53',
            ),
            6 => 
            array (
                'id' => 13,
                'urutan' => 7,
                'nama' => 'Fotografi',
                'slug' => 'fotografi',
                'keterangan' => NULL,
                'created_at' => '2023-04-14 02:24:13',
                'updated_at' => '2023-04-14 02:24:13',
            ),
            7 => 
            array (
                'id' => 14,
                'urutan' => 8,
                'nama' => 'Videografi',
                'slug' => 'videografi',
                'keterangan' => NULL,
                'created_at' => '2023-04-14 02:24:39',
                'updated_at' => '2023-04-14 02:24:39',
            ),
            8 => 
            array (
                'id' => 15,
                'urutan' => 9,
                'nama' => 'Banner/ Poster',
                'slug' => 'banner-poster',
                'keterangan' => NULL,
                'created_at' => '2023-04-14 02:25:20',
                'updated_at' => '2023-04-14 02:25:20',
            ),
            9 => 
            array (
                'id' => 16,
                'urutan' => 10,
                'nama' => 'Website',
                'slug' => 'website',
                'keterangan' => NULL,
                'created_at' => '2023-04-14 02:25:53',
                'updated_at' => '2023-04-15 15:39:26',
            ),
        ));
        
        
    }
}