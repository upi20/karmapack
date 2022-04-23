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
        ));
        
        
    }
}