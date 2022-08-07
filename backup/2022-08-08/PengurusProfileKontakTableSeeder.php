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
            2 => 
            array (
                'id' => 9,
                'kontak_tipe_id' => 5,
                'user_id' => 17,
                'value' => '@hasnhaaa_nita',
                'created_at' => '2022-07-15 22:16:33',
                'updated_at' => '2022-07-15 22:16:33',
            ),
            3 => 
            array (
                'id' => 10,
                'kontak_tipe_id' => 5,
                'user_id' => 101,
                'value' => 'https://instagram.com/widiimaulidiaa_?igshid=YmMyMTA2M2Y=',
                'created_at' => '2022-07-15 22:29:08',
                'updated_at' => '2022-07-15 22:29:08',
            ),
            4 => 
            array (
                'id' => 11,
                'kontak_tipe_id' => 1,
                'user_id' => 21,
                'value' => 'https://m.facebook.com/profile.php',
                'created_at' => '2022-07-15 22:40:12',
                'updated_at' => '2022-07-15 22:40:12',
            ),
            5 => 
            array (
                'id' => 12,
                'kontak_tipe_id' => 4,
                'user_id' => 99,
                'value' => 'Ahmad Dimyati Ridwan',
                'created_at' => '2022-07-16 11:07:39',
                'updated_at' => '2022-07-16 11:16:50',
            ),
            6 => 
            array (
                'id' => 13,
                'kontak_tipe_id' => 1,
                'user_id' => 99,
                'value' => 'Ahmad Dimyati Ridwan',
                'created_at' => '2022-07-16 11:16:28',
                'updated_at' => '2022-07-16 11:16:28',
            ),
            7 => 
            array (
                'id' => 14,
                'kontak_tipe_id' => 2,
                'user_id' => 99,
                'value' => 'Ahmad Dimyati Ridwan',
                'created_at' => '2022-07-16 11:17:42',
                'updated_at' => '2022-07-16 11:17:42',
            ),
            8 => 
            array (
                'id' => 15,
                'kontak_tipe_id' => 3,
                'user_id' => 99,
                'value' => 'Ahmad Dimyati Ridwan',
                'created_at' => '2022-07-16 11:18:12',
                'updated_at' => '2022-07-16 11:18:12',
            ),
            9 => 
            array (
                'id' => 16,
                'kontak_tipe_id' => 5,
                'user_id' => 99,
                'value' => 'ahmaddimyatiridwan16',
                'created_at' => '2022-07-16 11:19:16',
                'updated_at' => '2022-07-16 11:19:16',
            ),
        ));
        
        
    }
}