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
                'id' => '1',
                'user_id' => '1',
                'nama' => 'PENGUMPULAN DATA PENGURUS KARMAPACK PERIODE 2022-2023',
                'slug' => 'pengumpulan-data-pengurus-karmapack-periode-20222023',
                'deskripsi' => 'Sehubungan akan adanya pembuatan struktur organisasi. Kami dari divisi Kominfo meminta akang teteh untuk mengisi format dibawah ini.',
                'no_urut' => '1',
                'dari' => '2022-08-17',
                'sampai' => '2022-08-11',
                'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSdau6VwXEPJ_fiKm1SZAZf4tZ7UCZFGpejVbmfbHevdQcmA5Q/viewform',
                'foto' => '20220808151008.png',
                'tampilkan' => '1',
                'status' => '1',
                'created_at' => '2022-08-08 13:55:32',
                'updated_at' => '2022-08-20 14:49:46',
            ),
            1 => 
            array (
                'id' => '3',
                'user_id' => '1',
                'nama' => 'Testing',
                'slug' => 'testing',
                'deskripsi' => 'Testing',
                'no_urut' => '2',
                'dari' => '2022-08-25',
                'sampai' => '2022-09-03',
                'link' => 'https://forms.gle/emJnUVmXYZN9hRsa7',
                'foto' => '',
                'tampilkan' => '0',
                'status' => '0',
                'created_at' => '2022-08-08 17:06:30',
                'updated_at' => '2022-08-09 11:45:00',
            ),
            2 => 
            array (
                'id' => '4',
                'user_id' => '1',
                'nama' => 'tes',
                'slug' => 'tes',
                'deskripsi' => 'des',
                'no_urut' => '1',
                'dari' => '2022-08-13',
                'sampai' => '2022-08-25',
                'link' => 'http://www.zondervan.com/the-reason-for-god-discussion-guide-with-dvd',
                'foto' => '',
                'tampilkan' => '0',
                'status' => '0',
                'created_at' => '2022-08-08 17:10:52',
                'updated_at' => '2022-08-09 11:45:16',
            ),
        ));
        
        
    }
}