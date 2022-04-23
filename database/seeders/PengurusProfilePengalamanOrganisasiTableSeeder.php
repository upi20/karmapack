<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengurusProfilePengalamanOrganisasiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pengurus_profile_pengalaman_organisasi')->delete();
        
        \DB::table('pengurus_profile_pengalaman_organisasi')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'nama' => 'Palang Merah Remaja',
                'dari' => '2017',
                'sampai' => '2018',
                'jabatan' => 'Anggota',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:46:23',
                'updated_at' => '2022-04-23 08:51:15',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'nama' => 'Palang Merah Remaja',
                'dari' => '2018',
                'sampai' => '2019',
                'jabatan' => 'Sekertaris Umum',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:53:55',
                'updated_at' => '2022-04-23 08:53:55',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'nama' => 'Majelis Perwakilan Kelas',
                'dari' => '2018',
                'sampai' => '2018',
                'jabatan' => 'Anggota',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:54:43',
                'updated_at' => '2022-04-23 08:55:28',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'nama' => 'Majelis Perwakilan Kelas',
                'dari' => '2018',
                'sampai' => '2019',
                'jabatan' => 'Ketua Umum',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:55:02',
                'updated_at' => '2022-04-23 08:55:38',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 1,
                'nama' => 'DKM Ulil Albab USB YPKP',
                'dari' => '2020',
                'sampai' => '2021',
                'jabatan' => 'Anggota',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:56:22',
                'updated_at' => '2022-04-23 08:56:22',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 1,
                'nama' => 'DKM Ulil Albab USB YPKP',
                'dari' => '2021',
                'sampai' => NULL,
                'jabatan' => 'Media Divisi dan Informasi',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:57:03',
                'updated_at' => '2022-04-23 09:05:31',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 1,
                'nama' => 'Karmapack',
                'dari' => '2021',
                'sampai' => NULL,
            'jabatan' => 'Anggota Bidang Komunikasi dan Informasi (KOMINFO)',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:57:40',
                'updated_at' => '2022-04-23 09:05:21',
            ),
        ));
        
        
    }
}