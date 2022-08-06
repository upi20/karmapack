<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contacts')->delete();
        
        \DB::table('contacts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Phone',
                'icon' => 'icon icon-phone',
                'url' => '+628798132505',
                'order' => 1,
                'keterangan' => 'Telepon',
                'status' => 1,
                'created_at' => '2022-04-18 07:49:36',
                'updated_at' => '2022-04-18 07:49:36',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'E-Mail',
                'icon' => 'icon icon-envelope-open',
                'url' => 'hello@example.com',
                'order' => 2,
                'keterangan' => '-',
                'status' => 1,
                'created_at' => '2022-04-18 07:50:12',
                'updated_at' => '2022-04-18 07:50:12',
            ),
        ));
        
        
    }
}