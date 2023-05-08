<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SpkAhpKriteriaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('spk_ahp_kriteria')->delete();
        
        \DB::table('spk_ahp_kriteria')->insert(array (
            0 => 
            array (
                'id' => 10,
                'nama' => 'Seleksi Wawancara',
                'kode' => 'C2',
                'ci' => 0.0,
                'ri' => 0.0,
                'cr' => 0.0,
                'prioritas' => 0.0,
                'created_at' => '2023-05-08 20:04:45',
                'updated_at' => '2023-05-08 20:05:59',
            ),
            1 => 
            array (
                'id' => 11,
                'nama' => 'Seleksi administrasi',
                'kode' => 'C1',
                'ci' => 0.0,
                'ri' => 0.0,
                'cr' => 0.0,
                'prioritas' => 0.0,
                'created_at' => '2023-05-08 20:05:18',
                'updated_at' => '2023-05-08 20:06:03',
            ),
            2 => 
            array (
                'id' => 12,
                'nama' => 'Pengalaman Organisasi',
                'kode' => 'C3',
                'ci' => 0.0,
                'ri' => 0.0,
                'cr' => 0.0,
                'prioritas' => 0.0,
                'created_at' => '2023-05-08 20:06:22',
                'updated_at' => '2023-05-08 20:06:22',
            ),
            3 => 
            array (
                'id' => 13,
                'nama' => 'Tahun Masuk',
                'kode' => 'C4',
                'ci' => 0.0,
                'ri' => 0.0,
                'cr' => 0.0,
                'prioritas' => 0.0,
                'created_at' => '2023-05-08 20:06:38',
                'updated_at' => '2023-05-08 20:06:38',
            ),
            4 => 
            array (
                'id' => 14,
                'nama' => 'Wawasan Ke organisasian',
                'kode' => 'C5',
                'ci' => 0.0,
                'ri' => 0.0,
                'cr' => 0.0,
                'prioritas' => 0.0,
                'created_at' => '2023-05-08 20:06:50',
                'updated_at' => '2023-05-08 20:06:50',
            ),
        ));
        
        
    }
}