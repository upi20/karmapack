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
                'dari' => '2017',
                'sampai' => '2018',
                'jabatan' => 'Anggota',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:54:43',
                'updated_at' => '2022-07-15 17:27:43',
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
            7 => 
            array (
                'id' => 8,
                'user_id' => 101,
                'nama' => 'Palang Merah Remaja',
                'dari' => '2017',
                'sampai' => '2020',
                'jabatan' => 'Bendahara umum',
                'keterangan' => '-',
                'created_at' => '2022-07-15 22:29:42',
                'updated_at' => '2022-07-15 22:29:42',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 21,
                'nama' => 'OSIS SMPN 2 Sindangbarang',
                'dari' => '2012',
                'sampai' => '2013',
                'jabatan' => 'Ketua bidang kerohanian',
                'keterangan' => NULL,
                'created_at' => '2022-07-15 22:46:14',
                'updated_at' => '2022-07-15 22:46:14',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 101,
                'nama' => 'Gerakan Mengajar Desa',
                'dari' => '2020',
                'sampai' => '2022',
                'jabatan' => 'Tutor inspiratif',
                'keterangan' => NULL,
                'created_at' => '2022-07-15 22:49:13',
                'updated_at' => '2022-07-15 22:49:13',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 99,
                'nama' => 'Karmapack',
                'dari' => '2020',
                'sampai' => '2024',
                'jabatan' => 'Sekbid Kominfo',
                'keterangan' => NULL,
                'created_at' => '2022-07-16 11:23:00',
                'updated_at' => '2022-07-16 11:23:00',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 100,
                'nama' => 'Lembaga Dakwah kampus Stisip Guna Nusantara',
                'dari' => '2022',
                'sampai' => '2023',
                'jabatan' => 'Divisi Syiar',
                'keterangan' => 'Pengelola Media sosial',
                'created_at' => '2022-07-19 20:01:31',
                'updated_at' => '2022-07-19 20:01:31',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 99,
                'nama' => 'OSIS MAN 3 Cianjur',
                'dari' => '2018',
                'sampai' => '2019',
                'jabatan' => 'Ketua',
                'keterangan' => NULL,
                'created_at' => '2022-08-22 12:10:31',
                'updated_at' => '2022-08-22 12:10:45',
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => 99,
                'nama' => 'Unit Kegiatan Santri Futsal dan Sepak Bola Al-Ihsan',
                'dari' => '2022',
                'sampai' => '2023',
                'jabatan' => 'Ketua',
                'keterangan' => NULL,
                'created_at' => '2022-08-22 12:11:18',
                'updated_at' => '2022-08-22 12:11:18',
            ),
        ));
        
        
    }
}