<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengurusProfilePengalamanLainTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pengurus_profile_pengalaman_lain')->delete();
        
        \DB::table('pengurus_profile_pengalaman_lain')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'pengalaman' => 'Pengalaman lain',
                'keterangan' => '1',
                'created_at' => '2022-04-29 08:10:08',
                'updated_at' => '2022-04-29 08:10:08',
            ),
        ));
        
        
    }
}