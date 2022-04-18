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
                'keterangan' => 'Pendidikan Kanak Kanak',
                'status' => 1,
                'created_at' => '2022-04-18 04:13:43',
                'updated_at' => '2022-04-18 04:13:43',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'SD/MI',
                'keterangan' => 'Sekolah Dasar',
                'status' => 1,
                'created_at' => '2022-04-18 04:14:06',
                'updated_at' => '2022-04-18 04:14:06',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'SLTP',
                'keterangan' => 'Sekolah Lanjut Tingkat Pertama',
                'status' => 1,
                'created_at' => '2022-04-18 04:14:21',
                'updated_at' => '2022-04-18 04:14:21',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'SLTA',
                'keterangan' => 'Sekolah Lanjut Tingkat Atas',
                'status' => 1,
                'created_at' => '2022-04-18 04:14:44',
                'updated_at' => '2022-04-18 04:14:44',
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'PT',
                'keterangan' => 'Perguruan Tingggi',
                'status' => 1,
                'created_at' => '2022-04-18 04:14:55',
                'updated_at' => '2022-04-18 04:14:55',
            ),
            5 => 
            array (
                'id' => 6,
                'nama' => 'LAINNYA',
                'keterangan' => 'Pendidikan resmi lainnya',
                'status' => 1,
                'created_at' => '2022-04-18 04:15:18',
                'updated_at' => '2022-04-18 04:15:18',
            ),
        ));
        
        
    }
}