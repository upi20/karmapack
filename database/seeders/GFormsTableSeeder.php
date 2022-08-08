<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GFormsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('g_forms')->delete();
        
        \DB::table('g_forms')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'nama' => 'PENGUMPULAN DATA PENGURUS KARMAPACK PERIODE 2022-2023',
                'slug' => 'pengumpulan-data-pengurus-karmapack-periode-20222023',
                'deskripsi' => 'Sehubungan akan adanya pembuatan struktur organisasi. Kami dari divisi Kominfo meminta akang teteh untuk mengisi format dibawah ini.',
                'pengumuman' => 'Sehubungan akan adanya pembuatan struktur organisasi. Kami dari divisi Kominfo meminta akang teteh untuk mengisi format dibawah ini.',
                'no_urut' => 1,
                'dari' => '2022-08-17',
                'sampai' => '2022-08-11',
                'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSdau6VwXEPJ_fiKm1SZAZf4tZ7UCZFGpejVbmfbHevdQcmA5Q/viewform',
                'foto' => '20220808151008.png',
                'tampilkan' => 1,
                'status' => 1,
                'created_at' => '2022-08-08 13:55:32',
                'updated_at' => '2022-08-08 15:10:08',
            ),
        ));
        
        
    }
}