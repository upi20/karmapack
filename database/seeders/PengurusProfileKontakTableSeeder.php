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
                'id' => 2,
                'kontak_tipe_id' => 1,
                'user_id' => 1,
                'value' => 'asdfsdf',
                'created_at' => '2022-04-22 15:14:10',
                'updated_at' => '2022-04-22 15:14:10',
            ),
            1 => 
            array (
                'id' => 4,
                'kontak_tipe_id' => 1,
                'user_id' => 1,
                'value' => 'https://web.facebook.com/iseplutpinur7',
                'created_at' => '2022-04-22 15:32:43',
                'updated_at' => '2022-04-22 15:44:20',
            ),
            2 => 
            array (
                'id' => 6,
                'kontak_tipe_id' => 2,
                'user_id' => 1,
                'value' => 'https://web.facebook.com/iseplutpinur7',
                'created_at' => '2022-04-22 15:49:07',
                'updated_at' => '2022-04-22 15:49:13',
            ),
        ));
        
        
    }
}