<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnggotaPendidikanJenisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('anggota_pendidikan_jenis')->delete();
        
        \DB::table('anggota_pendidikan_jenis')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'TK/PAUD DLL',
                'keterangan' => 'Pendidikan Kanak Kanak',
                'status' => '1',
                'created_at' => '2023-02-11 00:09:21',
                'updated_at' => '2023-02-11 00:09:21',
            ),
            1 => 
            array (
                'id' => '2',
            'nama' => 'SD/MI (Dasar)',
                'keterangan' => 'Sekolah Dasar',
                'status' => '1',
                'created_at' => '2023-02-11 00:09:21',
                'updated_at' => '2023-02-11 00:09:21',
            ),
            2 => 
            array (
                'id' => '3',
                'nama' => 'Sekolah Lanjut Tingkat Pertama',
                'keterangan' => 'Sekolah Lanjut Tingkat Pertama',
                'status' => '1',
                'created_at' => '2023-02-11 00:09:21',
                'updated_at' => '2023-02-11 00:09:21',
            ),
            3 => 
            array (
                'id' => '4',
                'nama' => 'Sekolah Lanjut Tingkat Atas',
                'keterangan' => 'Sekolah Lanjut Tingkat Atas',
                'status' => '1',
                'created_at' => '2023-02-11 00:09:21',
                'updated_at' => '2023-02-11 00:09:21',
            ),
            4 => 
            array (
                'id' => '5',
                'nama' => 'Perguruan Tinggi',
                'keterangan' => 'Perguruan Tinggi',
                'status' => '1',
                'created_at' => '2023-02-11 00:09:21',
                'updated_at' => '2023-02-11 00:09:21',
            ),
            5 => 
            array (
                'id' => '6',
                'nama' => 'Lainnya',
                'keterangan' => 'Pendidikan resmi lainnya',
                'status' => '1',
                'created_at' => '2023-02-11 00:09:21',
                'updated_at' => '2023-02-11 00:09:21',
            ),
        ));
        
        
    }
}