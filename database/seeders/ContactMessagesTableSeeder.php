<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactMessagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contact_messages')->delete();
        
        \DB::table('contact_messages')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'Isep Lutpi Nur',
                'email' => 'iseplutpinur7@gmail.com',
                'message' => 'Tes via hp',
                'status' => NULL,
                'created_at' => '2022-08-21 15:49:29',
                'updated_at' => '2022-08-21 15:49:29',
            ),
        ));
        
        
    }
}