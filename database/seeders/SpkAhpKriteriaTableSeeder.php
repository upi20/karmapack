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
                'prioritas' => 0.0,
                'created_at' => '2023-05-08 20:04:45',
                'updated_at' => '2023-05-08 22:22:22',
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
                'prioritas' => 0.0,
                'created_at' => '2023-05-08 20:05:18',
                'updated_at' => '2023-05-08 22:22:19',
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
                'prioritas' => 0.0,
                'created_at' => '2023-05-08 20:06:22',
                'updated_at' => '2023-05-08 22:22:25',
            ),
            3 => 
            array (
                'id' => 13,
                'nama' => 'Tahun Masuk',
                'slug' => NULL,
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
                'slug' => 'wawasan-ke-organisasian',
                'kode' => 'C5',
                'ci' => 0.0,
                'ri' => 0.0,
                'cr' => 0.0,
                'prioritas' => 0.0,
                'created_at' => '2023-05-08 20:06:50',
                'updated_at' => '2023-05-08 22:22:45',
            ),
        ));
        
        
    }
}