<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengurusProfilePendidikanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pengurus_profile_pendidikan')->delete();
        
        \DB::table('pengurus_profile_pendidikan')->insert(array (
            0 => 
            array (
                'id' => 5,
                'pendidikan_jenis_id' => 2,
                'user_id' => 1,
                'dari' => '2007',
                'sampai' => '2013',
                'instansi' => 'SD Negeri 1 Tipar',
                'jurusan' => NULL,
                'keterangan' => NULL,
                'created_at' => '2022-04-23 07:06:46',
                'updated_at' => '2022-04-23 07:06:46',
            ),
            1 => 
            array (
                'id' => 6,
                'pendidikan_jenis_id' => 3,
                'user_id' => 1,
                'dari' => '2013',
                'sampai' => '2016',
                'instansi' => 'SMP PGRI 46 CIBINONG',
                'jurusan' => NULL,
                'keterangan' => 'VII B, VIII B, IX B',
                'created_at' => '2022-04-23 07:07:44',
                'updated_at' => '2022-04-23 07:07:44',
            ),
            2 => 
            array (
                'id' => 7,
                'pendidikan_jenis_id' => 4,
                'user_id' => 1,
                'dari' => '2016',
                'sampai' => '2019',
                'instansi' => 'SMK Negeri 1 Tanggeung',
                'jurusan' => 'Otomatisasi Tata Kelola Perkantoran',
                'keterangan' => 'Kelas OTKP 2',
                'created_at' => '2022-04-23 07:08:15',
                'updated_at' => '2022-04-23 07:08:15',
            ),
            3 => 
            array (
                'id' => 8,
                'pendidikan_jenis_id' => 5,
                'user_id' => 1,
                'dari' => '2019',
                'sampai' => NULL,
                'instansi' => 'Universitas Sangga Buana YPKP Bandung',
                'jurusan' => 'S1 Teknik Infomatika',
                'keterangan' => 'Kelas A2 2019',
                'created_at' => '2022-04-23 07:08:39',
                'updated_at' => '2022-04-23 07:08:39',
            ),
            4 => 
            array (
                'id' => 9,
                'pendidikan_jenis_id' => 2,
                'user_id' => 17,
                'dari' => '2008',
                'sampai' => '2014',
                'instansi' => 'SD NEGERI POGOR',
                'jurusan' => '-',
                'keterangan' => NULL,
                'created_at' => '2022-07-15 22:17:26',
                'updated_at' => '2022-07-15 22:17:26',
            ),
            5 => 
            array (
                'id' => 10,
                'pendidikan_jenis_id' => 5,
                'user_id' => 101,
                'dari' => '2020',
                'sampai' => '2024',
                'instansi' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung',
                'jurusan' => 'Ilmu komunikasi hubungan masyarakat dan',
                'keterangan' => 'Kelas Humas 4C',
                'created_at' => '2022-07-15 22:20:47',
                'updated_at' => '2022-07-15 22:20:47',
            ),
            6 => 
            array (
                'id' => 11,
                'pendidikan_jenis_id' => 2,
                'user_id' => 21,
                'dari' => '2005',
                'sampai' => '2011',
                'instansi' => 'SDN CIAKAR',
                'jurusan' => NULL,
                'keterangan' => NULL,
                'created_at' => '2022-07-15 22:41:06',
                'updated_at' => '2022-07-15 22:42:01',
            ),
            7 => 
            array (
                'id' => 12,
                'pendidikan_jenis_id' => 3,
                'user_id' => 21,
                'dari' => '2011',
                'sampai' => '2014',
                'instansi' => 'SMPN 2 SINDANGBARANG',
                'jurusan' => NULL,
                'keterangan' => NULL,
                'created_at' => '2022-07-15 22:41:49',
                'updated_at' => '2022-07-15 22:41:49',
            ),
            8 => 
            array (
                'id' => 13,
                'pendidikan_jenis_id' => 4,
                'user_id' => 101,
                'dari' => '2017',
                'sampai' => '2020',
                'instansi' => 'MAN 3 CIANJUR',
                'jurusan' => 'IPA',
                'keterangan' => NULL,
                'created_at' => '2022-07-15 22:43:02',
                'updated_at' => '2022-07-15 22:43:19',
            ),
            9 => 
            array (
                'id' => 14,
                'pendidikan_jenis_id' => 4,
                'user_id' => 21,
                'dari' => '2014',
                'sampai' => '2015',
                'instansi' => 'MA AR-ROCHMAH LEMBANG',
                'jurusan' => 'IPS',
                'keterangan' => NULL,
                'created_at' => '2022-07-15 22:43:49',
                'updated_at' => '2022-07-15 22:44:02',
            ),
            10 => 
            array (
                'id' => 15,
                'pendidikan_jenis_id' => 4,
                'user_id' => 21,
                'dari' => '2015',
                'sampai' => '2017',
                'instansi' => 'MAN 3 CIANJUR',
                'jurusan' => 'IPS',
                'keterangan' => NULL,
                'created_at' => '2022-07-15 22:44:22',
                'updated_at' => '2022-07-15 22:44:22',
            ),
            11 => 
            array (
                'id' => 16,
                'pendidikan_jenis_id' => 3,
                'user_id' => 101,
                'dari' => '2013',
                'sampai' => '2016',
                'instansi' => 'SMP 1 CIBEBER',
                'jurusan' => '-',
                'keterangan' => 'Kelas F',
                'created_at' => '2022-07-15 22:47:10',
                'updated_at' => '2022-07-15 22:47:10',
            ),
            12 => 
            array (
                'id' => 17,
                'pendidikan_jenis_id' => 2,
                'user_id' => 101,
                'dari' => '2008',
                'sampai' => '2013',
                'instansi' => 'MI AL KHOERIYAH',
                'jurusan' => '-',
                'keterangan' => NULL,
                'created_at' => '2022-07-15 22:47:46',
                'updated_at' => '2022-07-15 22:47:46',
            ),
            13 => 
            array (
                'id' => 18,
                'pendidikan_jenis_id' => 5,
                'user_id' => 99,
                'dari' => '2020',
                'sampai' => '2024',
                'instansi' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung',
                'jurusan' => 'Bahasa dan Sastra Arab',
                'keterangan' => 'Kelas A',
                'created_at' => '2022-07-16 11:11:19',
                'updated_at' => '2022-07-16 11:20:43',
            ),
            14 => 
            array (
                'id' => 19,
                'pendidikan_jenis_id' => 4,
                'user_id' => 99,
                'dari' => '2017',
                'sampai' => '2020',
                'instansi' => 'MAN 3 CIANJUR',
                'jurusan' => 'IPA',
                'keterangan' => 'Kelas IPA 2',
                'created_at' => '2022-07-16 11:20:25',
                'updated_at' => '2022-07-16 11:20:25',
            ),
            15 => 
            array (
                'id' => 20,
                'pendidikan_jenis_id' => 5,
                'user_id' => 100,
                'dari' => '2021',
                'sampai' => '2025',
                'instansi' => 'Stisip Guna Nusantara Cianjur',
                'jurusan' => 'Ilmu Pemerintahan',
                'keterangan' => '652012122077 Kelas A',
                'created_at' => '2022-07-19 20:00:06',
                'updated_at' => '2022-07-19 20:00:06',
            ),
            16 => 
            array (
                'id' => 21,
                'pendidikan_jenis_id' => 2,
                'user_id' => 100,
                'dari' => '2009',
                'sampai' => '2015',
                'instansi' => 'Mi Cijoho',
                'jurusan' => NULL,
                'keterangan' => NULL,
                'created_at' => '2022-07-19 20:06:13',
                'updated_at' => '2022-07-19 20:06:13',
            ),
            17 => 
            array (
                'id' => 22,
                'pendidikan_jenis_id' => 3,
                'user_id' => 100,
                'dari' => '2015',
                'sampai' => '2018',
                'instansi' => 'Mts Tanwirul Amin',
                'jurusan' => NULL,
                'keterangan' => NULL,
                'created_at' => '2022-07-19 20:07:24',
                'updated_at' => '2022-07-19 20:08:10',
            ),
            18 => 
            array (
                'id' => 23,
                'pendidikan_jenis_id' => 4,
                'user_id' => 100,
                'dari' => '2018',
                'sampai' => '2021',
                'instansi' => 'MA Tanwirul',
                'jurusan' => 'Ips',
                'keterangan' => NULL,
                'created_at' => '2022-07-19 20:07:55',
                'updated_at' => '2022-07-19 20:07:55',
            ),
        ));
        
        
    }
}