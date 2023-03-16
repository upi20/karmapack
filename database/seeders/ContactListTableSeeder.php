<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactListTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contact_list')->delete();
        
        \DB::table('contact_list')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'Location',
                'icon' => 'fas fa-map-marker-alt',
                'url' => 'https://goo.gl/maps/5r4WzKbNY89GSHHe6',
                'order' => '1',
                'keterangan' => 'Cianjur Selatan<br> Jawa Barat 43272, Indonesia.',
                'status' => '1',
                'created_at' => '2022-08-21 08:34:56',
                'updated_at' => '2022-08-21 08:34:56',
            ),
            1 => 
            array (
                'id' => '2',
                'nama' => 'Telepon',
                'icon' => 'fas fa-phone',
                'url' => 'tel:+6285798132505',
                'order' => '2',
                'keterangan' => '+6285798132505',
                'status' => '1',
                'created_at' => '2022-08-21 08:35:23',
                'updated_at' => '2022-08-21 08:35:23',
            ),
            2 => 
            array (
                'id' => '3',
                'nama' => 'Email',
                'icon' => 'fas fa-envelope',
                'url' => 'mailto:help@karmapack.id',
                'order' => '3',
                'keterangan' => 'help@karmapack.id',
                'status' => '1',
                'created_at' => '2022-08-21 08:35:47',
                'updated_at' => '2023-03-16 17:52:14',
            ),
        ));
        
        
    }
}