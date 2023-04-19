<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HomePengurusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('home_pengurus')->delete();
        
        \DB::table('home_pengurus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'urutan' => 1,
                'nama' => 'Dian Nopiandi, S.Sos., M.Pd',
                'sebagai' => 'Pendiri',
                'foto' => '20230327080501.jpg',
                'no_whatsapp' => NULL,
                'no_telepon' => '081322608453',
                'facebook' => NULL,
                'twitter' => NULL,
                'instagram' => NULL,
                'tampilkan' => 'Ya',
                'created_at' => '2023-03-26 17:41:37',
                'updated_at' => '2023-03-27 22:08:24',
            ),
            1 => 
            array (
                'id' => 7,
                'urutan' => 2,
                'nama' => 'Puput Risnawati,S.Pd',
                'sebagai' => 'Pendiri',
                'foto' => '20230327184526.jpg',
                'no_whatsapp' => NULL,
                'no_telepon' => '081322608453',
                'facebook' => NULL,
                'twitter' => NULL,
                'instagram' => NULL,
                'tampilkan' => 'Ya',
                'created_at' => '2023-03-27 18:45:26',
                'updated_at' => '2023-03-27 18:46:04',
            ),
        ));
        
        
    }
}