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
                'id' => '9',
                'nama' => 'Sepakbola',
                'anggota_id' => '88',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => '10',
                'nama' => 'Volly',
                'anggota_id' => '88',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => '11',
                'nama' => 'Coding',
                'anggota_id' => '88',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => '15',
                'nama' => 'Coding',
                'anggota_id' => '89',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => '16',
                'nama' => 'Mendaki Gunung',
                'anggota_id' => '89',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => '17',
                'nama' => 'Bermain Sepak Bola',
                'anggota_id' => '89',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => '25',
                'nama' => 'Coding',
                'anggota_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => '26',
                'nama' => 'Musik',
                'anggota_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => '27',
                'nama' => 'Sepedaan',
                'anggota_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}