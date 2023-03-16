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
            5 => 
            array (
                'id' => '8',
                'nama' => 'coding, Mendaki gunung, bermain sepak bola, bermain perempuan',
                'anggota_id' => '89',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => '9',
                'nama' => 'Sepakbola',
                'anggota_id' => '88',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => '10',
                'nama' => 'Volly',
                'anggota_id' => '88',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => '11',
                'nama' => 'Coding',
                'anggota_id' => '88',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}