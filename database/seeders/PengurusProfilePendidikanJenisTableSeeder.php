<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengurusProfilePendidikanJenisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pengurus_profile_pendidikan_jenis')->delete();
        
        \DB::table('pengurus_profile_pendidikan_jenis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'TK/PAUD DLL',
                'no_urut' => 1,
                'keterangan' => 'Pendidikan Kanak Kanak',
                'status' => 1,
                'created_at' => '2022-04-18 04:13:43',
                'updated_at' => '2022-04-23 05:36:09',
            ),
            1 => 
            array (
                'id' => 2,
            'nama' => 'SD/MI (Dasar)',
                'no_urut' => 2,
                'keterangan' => 'Sekolah Dasar',
                'status' => 1,
                'created_at' => '2022-04-18 04:14:06',
                'updated_at' => '2022-04-23 05:37:13',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Sekolah Lanjut Tingkat Pertama',
                'no_urut' => 3,
                'keterangan' => 'Sekolah Lanjut Tingkat Pertama',
                'status' => 1,
                'created_at' => '2022-04-18 04:14:21',
                'updated_at' => '2022-04-23 05:37:34',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Sekolah Lanjut Tingkat Atas',
                'no_urut' => 4,
                'keterangan' => 'Sekolah Lanjut Tingkat Atas',
                'status' => 1,
                'created_at' => '2022-04-18 04:14:44',
                'updated_at' => '2022-04-23 05:37:41',
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'Perguruan Tingggi',
                'no_urut' => 5,
                'keterangan' => 'Perguruan Tingggi',
                'status' => 1,
                'created_at' => '2022-04-18 04:14:55',
                'updated_at' => '2022-04-23 05:37:48',
            ),
            5 => 
            array (
                'id' => 6,
                'nama' => 'Lainnya',
                'no_urut' => 6,
                'keterangan' => 'Pendidikan resmi lainnya',
                'status' => 1,
                'created_at' => '2022-04-18 04:15:18',
                'updated_at' => '2022-04-23 05:37:54',
            ),
        ));
        
        
    }
}