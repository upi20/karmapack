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
                'slug' => 'seleksi-wawancara',
                'kode' => 'C2',
                'ci' => 0.0,
                'ri' => 0.0,
                'cr' => 0.0,
                'prioritas' => 0.22333333333333,
                'total' => 4.5,
                'eign_value' => 1.005,
                'created_at' => '2023-05-08 20:04:45',
                'updated_at' => '2023-05-09 01:33:54',
            ),
            1 => 
            array (
                'id' => 11,
                'nama' => 'Seleksi administrasi',
                'slug' => 'seleksi-administrasi',
                'kode' => 'C1',
                'ci' => 0.0,
                'ri' => 0.0,
                'cr' => 0.0,
                'prioritas' => 0.13166666666667,
                'total' => 8.0,
                'eign_value' => 1.0533333333333,
                'created_at' => '2023-05-08 20:05:18',
                'updated_at' => '2023-05-09 01:33:54',
            ),
            2 => 
            array (
                'id' => 12,
                'nama' => 'Pengalaman Organisasi',
                'slug' => 'pengalaman-organisasi',
                'kode' => 'C3',
                'ci' => 0.0,
                'ri' => 0.0,
                'cr' => 0.0,
                'prioritas' => 0.22333333333333,
                'total' => 4.5,
                'eign_value' => 1.005,
                'created_at' => '2023-05-08 20:06:22',
                'updated_at' => '2023-05-09 01:33:54',
            ),
            3 => 
            array (
                'id' => 13,
                'nama' => 'Tahun Masuk',
                'slug' => 'tahun-masuk',
                'kode' => 'C4',
                'ci' => 0.0,
                'ri' => 0.0,
                'cr' => 0.0,
                'prioritas' => 0.22333333333333,
                'total' => 4.5,
                'eign_value' => 1.005,
                'created_at' => '2023-05-08 20:06:38',
                'updated_at' => '2023-05-09 01:33:54',
            ),
            4 => 
            array (
                'id' => 14,
                'nama' => 'Wawasan Ke organisasian',
                'slug' => 'wawasan-ke-organisasian',
                'kode' => 'C5',
                'ci' => 0.0,
                'ri' => 0.0,
                'cr' => 0.0,
                'prioritas' => 0.19833333333333,
                'total' => 5.0,
                'eign_value' => 0.99166666666667,
                'created_at' => '2023-05-08 20:06:50',
                'updated_at' => '2023-05-09 01:33:54',
            ),
        ));
        
        
    }
}