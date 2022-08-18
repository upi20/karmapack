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
                'id' => 1,
                'nama' => 'Situs ini masih dalam masa pengembangan.',
                'deskripsi' => 'Website ini masih dalam masa pengembangan. jika anda menemukan error atau ada saran lain-nya bisa menghubungi developer',
                'dari' => '2022-08-02',
                'sampai' => NULL,
                'link' => 'https://wa.me/+6285798132505',
                'link_nama' => 'Klik disini',
                'created_at' => '2022-08-08 22:37:14',
                'updated_at' => '2022-08-18 21:09:50',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Testing',
                'deskripsi' => 'Testing wkwk',
                'dari' => '2022-08-01',
                'sampai' => '2022-08-07',
                'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSdau6VwXEPJ_fiKm1SZAZf4tZ7UCZFGpejVbmfbHevdQcmA5Q/viewform',
                'link_nama' => 'Klik Disini',
                'created_at' => '2022-08-08 22:38:37',
                'updated_at' => '2022-08-08 22:59:36',
            ),
        ));
        
        
    }
}