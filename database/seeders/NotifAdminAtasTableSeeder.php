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
                'id' => '1',
                'nama' => 'situs belum siap wkwk',
                'deskripsi' => 'Website ini masih dalam masa pengembangan. jika anda menemukan error atau ada saran lain-nya bisa menghubungi developer',
                'dari' => '2022-08-17',
                'sampai' => '2023-03-18',
                'link' => 'https://wa.me/+6285798132505',
                'link_nama' => 'Klik disini',
                'created_at' => '2022-08-18 16:42:49',
                'updated_at' => '2023-03-19 10:54:30',
            ),
        ));
        
        
    }
}