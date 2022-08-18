<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NotifAdminAtasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('notif_admin_atas')->delete();
        
        \DB::table('notif_admin_atas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'situs belum siap wkwk',
                'deskripsi' => 'Situs ini masih dalam masa pengembangan.',
                'dari' => '2022-08-17',
                'sampai' => NULL,
                'link' => NULL,
                'link_nama' => NULL,
                'created_at' => '2022-08-18 16:42:49',
                'updated_at' => '2022-08-18 16:58:44',
            ),
        ));
        
        
    }
}