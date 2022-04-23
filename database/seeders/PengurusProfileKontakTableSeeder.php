<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengurusProfileKontakTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pengurus_profile_kontak')->delete();
        
        \DB::table('pengurus_profile_kontak')->insert(array (
            0 => 
            array (
                'id' => 7,
                'kontak_tipe_id' => 1,
                'user_id' => 1,
                'value' => 'https://facebook.com/iseplutpinur7/',
                'created_at' => '2022-04-23 07:05:43',
                'updated_at' => '2022-04-23 07:05:43',
            ),
            1 => 
            array (
                'id' => 8,
                'kontak_tipe_id' => 5,
                'user_id' => 1,
                'value' => 'https://www.instagram.com/iseplutpinur/',
                'created_at' => '2022-04-23 07:06:21',
                'updated_at' => '2022-04-23 07:06:21',
            ),
        ));
        
        
    }
}