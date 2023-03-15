<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnggotaHobisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('anggota_hobis')->delete();
        
        \DB::table('anggota_hobis')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'Sepedaan',
                'anggota_id' => '1',
                'created_at' => '2023-02-11 00:40:11',
                'updated_at' => '2023-02-11 00:40:11',
            ),
            1 => 
            array (
                'id' => '2',
                'nama' => 'Musik',
                'anggota_id' => '1',
                'created_at' => '2023-02-11 00:40:11',
                'updated_at' => '2023-02-11 00:40:11',
            ),
            2 => 
            array (
                'id' => '3',
                'nama' => 'Codding',
                'anggota_id' => '1',
                'created_at' => '2023-02-11 00:40:11',
                'updated_at' => '2023-02-11 00:40:11',
            ),
            3 => 
            array (
                'id' => '6',
                'nama' => 'A',
                'anggota_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => '7',
                'nama' => 'B',
                'anggota_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}