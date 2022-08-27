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
                'id' => '1',
                'nama' => 'Isep Lutpi Nur',
                'angkatan' => '2019',
                'email' => 'iseplutpinur7@gmail.com',
                'whatsapp' => '085798132505',
                'telepon' => '085798132505',
                'keterangan' => NULL,
                'status' => '1',
                'created_at' => '2022-05-06 20:24:03',
                'updated_at' => '2022-06-26 04:11:57',
            ),
            1 => 
            array (
                'id' => '2',
                'nama' => 'Tes Sensus 2',
                'angkatan' => '2020',
                'email' => 'tes@email.com',
                'whatsapp' => '085798132505',
                'telepon' => '085798132505',
                'keterangan' => 'Email Sudah digunakan',
                'status' => '3',
                'created_at' => '2022-05-06 20:46:27',
                'updated_at' => '2022-05-07 00:55:21',
            ),
            2 => 
            array (
                'id' => '3',
                'nama' => 'ISEP LUTPI NUR iseplutpinur',
                'angkatan' => '2020',
                'email' => 'iseplutpinur7@gmail.com',
                'whatsapp' => '08579813250',
                'telepon' => '085798132505',
                'keterangan' => NULL,
                'status' => '0',
                'created_at' => '2022-05-07 01:11:59',
                'updated_at' => '2022-05-07 01:11:59',
            ),
            3 => 
            array (
                'id' => '4',
                'nama' => 'Isep Lutpi Nur',
                'angkatan' => '2021',
                'email' => 'iseplutpi1008@gmail.com',
                'whatsapp' => '085798132505',
                'telepon' => '+6285798132505',
                'keterangan' => NULL,
                'status' => '0',
                'created_at' => '2022-05-07 01:12:25',
                'updated_at' => '2022-05-07 01:12:25',
            ),
            4 => 
            array (
                'id' => '5',
                'nama' => 'PENGUMPULAN DATA PENGURUS KARMAPACK PERIODE 2022-2023',
                'angkatan' => '2022',
                'email' => 'asadf@gmail.com',
                'whatsapp' => 'asdfasdf',
                'telepon' => 'asfsdafsadf',
                'keterangan' => NULL,
                'status' => '0',
                'created_at' => '2022-08-09 23:31:45',
                'updated_at' => '2022-08-09 23:31:45',
            ),
        ));
        
        
    }
}