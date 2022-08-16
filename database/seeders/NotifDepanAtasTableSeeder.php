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
                'deskripsi' => 'Situs ini masih dalam masa pengembangan.',
                'dari' => '2022-08-02',
                'sampai' => NULL,
                'link' => NULL,
                'link_nama' => NULL,
                'created_at' => '2022-08-08 22:37:14',
                'updated_at' => '2022-08-16 02:22:49',
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