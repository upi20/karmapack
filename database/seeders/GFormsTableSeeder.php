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
                'id' => '5',
                'user_id' => '1',
                'nama' => 'EVALUASI PENGISIAN DATA PENGURUS DI WEBSITE KARMAPACK PERIODE 2022-2023',
                'slug' => 'evaluasi-pengisian-data-pengurus-di-website-karmapack-periode-20222023',
                'deskripsi' => 'Setelah mengisi data pribadi pengurus untuk mengetahui seberapa baik fitur dan fungsi dari website ini.',
                'no_urut' => '1',
                'dari' => '2022-08-30',
                'sampai' => '2022-09-10',
                'link' => 'https://docs.google.com/forms/d/e/1FAIpQLScxdh0gW2IJL_3MbqTsMpPTsazFopTXZS2QmN_N0OAX-xjdaA/viewform',
                'foto' => '20220830111336.png',
                'tampilkan' => '0',
                'status' => '1',
                'created_at' => '2022-08-30 11:11:21',
                'updated_at' => '2022-08-30 11:13:36',
            ),
            2 => 
            array (
                'id' => '6',
                'user_id' => '1',
                'nama' => 'Absensi POESAKA 2022',
                'slug' => 'absensi-poesaka-2022',
                'deskripsi' => 'Absensi Poesaka hari terakhir minggu.',
                'no_urut' => '3',
                'dari' => '2022-12-17',
                'sampai' => '2022-12-23',
                'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSdjx3u0IiQxrbFQ35jasBmHUJ0f4Gb7s8aXr18gQ18Scr9j9g/viewform',
                'foto' => '20221218223719.png',
                'tampilkan' => '0',
                'status' => '1',
                'created_at' => '2022-12-17 17:43:57',
                'updated_at' => '2022-12-21 19:24:34',
            ),
            3 => 
            array (
                'id' => '7',
                'user_id' => '1',
                'nama' => 'Sertifikat Panitia Poesaka 2022',
                'slug' => 'sertifikat-panitia-poesaka-2022',
                'deskripsi' => 'Sertifikat untuk panitia Poesaka 2022',
                'no_urut' => '4',
                'dari' => '2022-12-20',
                'sampai' => '2022-12-31',
                'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSfh03U_l_X5NcecPQDBx01m2VyYmgvUqKiscnHS9svLX86Ccw/viewform',
                'foto' => '20221221202643.png',
                'tampilkan' => '0',
                'status' => '1',
                'created_at' => '2022-12-21 20:26:28',
                'updated_at' => '2022-12-21 20:26:43',
            ),
        ));
        
        
    }
}