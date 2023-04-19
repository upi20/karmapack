<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NotifDepanAtasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('notif_depan_atas')->delete();
        
        \DB::table('notif_depan_atas')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'Hi i\'m Astro',
                'deskripsi' => 'Hi i\'m Astro',
                'dari' => '2022-08-02',
                'sampai' => '2022-10-01',
                'link' => 'https://karmapack.id/pendaftaran/sensus',
                'link_nama' => 'Klik disini',
                'created_at' => '2022-08-08 22:37:14',
                'updated_at' => '2023-03-24 05:46:05',
            ),
            1 => 
            array (
                'id' => '2',
                'nama' => 'Testing',
                'deskripsi' => 'Testing wkwk',
                'dari' => '2022-08-01',
                'sampai' => '2022-08-07',
                'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSdau6VwXEPJ_fiKm1SZAZf4tZ7UCZFGpejVbmfbHevdQcmA5Q/viewform',
                'link_nama' => 'Klik Disini',
                'created_at' => '2022-08-08 22:38:37',
                'updated_at' => '2022-08-08 22:59:36',
            ),
            2 => 
            array (
                'id' => '3',
                'nama' => 'Sensus Anggota',
                'deskripsi' => 'Sensus anggota sedang dilakukan, untuk semua anggota maupun alumni karmapack yang belum tercatat pada Aplikasi Sistem Informasi Anggota',
                'dari' => '2023-03-23',
                'sampai' => NULL,
                'link' => 'https://karmapack.id/pendaftaran/sensus',
                'link_nama' => 'Klik disini',
                'created_at' => '2023-03-24 05:45:52',
                'updated_at' => '2023-03-24 05:48:00',
            ),
        ));
        
        
    }
}