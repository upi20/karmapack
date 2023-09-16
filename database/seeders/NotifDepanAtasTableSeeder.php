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
                'id' => '3',
                'nama' => 'Sensus Anggota',
                'deskripsi' => 'Sensus anggota sedang dilakukan, untuk semua anggota maupun alumni karmapack yang belum tercatat pada Aplikasi Sistem Informasi Anggota',
                'dari' => '2023-03-23',
                'sampai' => '2023-09-15',
                'link' => 'https://karmapack.id/pendaftaran/sensus',
                'link_nama' => 'Klik disini',
                'created_at' => '2023-03-24 05:45:52',
                'updated_at' => '2023-09-16 06:40:25',
            ),
        ));
        
        
    }
}