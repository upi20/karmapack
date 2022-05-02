<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PendSensusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pend_sensus')->delete();
        
        \DB::table('pend_sensus')->insert(array (
            0 => 
            array (
                'id' => 13,
                'nama' => 'ISEP LUTPI NUR iseplutpinur',
                'angkatan' => '2003',
                'email' => 'iseplutpinur7@gmail.com',
                'whatsapp' => '08579813250',
                'telepon' => '085798132505',
                'created_at' => '2022-05-02 23:10:27',
                'updated_at' => '2022-05-02 23:10:27',
            ),
            1 => 
            array (
                'id' => 14,
                'nama' => 'ISEP LUTPI NUR iseplutpinur',
                'angkatan' => '2020',
                'email' => 'iseplutpinur7@gmail.com',
                'whatsapp' => '08579813250',
                'telepon' => '085798132505',
                'created_at' => '2022-05-02 23:11:04',
                'updated_at' => '2022-05-02 23:11:04',
            ),
        ));
        
        
    }
}