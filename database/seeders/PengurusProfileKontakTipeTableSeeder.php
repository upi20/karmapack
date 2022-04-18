<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengurusProfileKontakTipeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pengurus_profile_kontak_tipe')->delete();
        
        \DB::table('pengurus_profile_kontak_tipe')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Pengaturan',
                'keterangan' => 'Siswa Kelas VI',
                'status' => 1,
                'created_at' => '2022-04-18 04:04:06',
                'updated_at' => '2022-04-18 04:04:06',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Twitter',
                'keterangan' => 'Sosial Media',
                'status' => 1,
                'created_at' => '2022-04-18 04:05:42',
                'updated_at' => '2022-04-18 04:05:42',
            ),
        ));
        
        
    }
}