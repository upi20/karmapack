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
                'id' => '10',
                'nama' => 'Seleksi Wawancara',
                'slug' => 'seleksi-wawancara',
                'kode' => 'C2',
                'ci' => '0.0055916305916288',
                'ri' => '0.58',
                'cr' => '0.00964074239936',
                'prioritas' => '0.17444444444444',
                'total' => '7.5',
                'eign_value' => '1.3083333333333',
                'created_at' => '2023-05-08 20:04:45',
                'updated_at' => '2023-05-09 23:34:57',
            ),
            1 => 
            array (
                'id' => '11',
                'nama' => 'Seleksi administrasi',
                'slug' => 'seleksi-administrasi',
                'kode' => 'C1',
                'ci' => '0.0055916305916288',
                'ri' => '0.58',
                'cr' => '0.00964074239936',
                'prioritas' => '0.12722222222222',
                'total' => '8',
                'eign_value' => '1.0177777777778',
                'created_at' => '2023-05-08 20:05:18',
                'updated_at' => '2023-05-09 23:34:57',
            ),
            2 => 
            array (
                'id' => '12',
                'nama' => 'Pengalaman Organisasi',
                'slug' => 'pengalaman-organisasi',
                'kode' => 'C3',
                'ci' => '0.033780862157283',
                'ri' => '1.24',
                'cr' => '0.027242630772003',
                'prioritas' => '0.29444444444444',
                'total' => '3.75',
                'eign_value' => '1.1041666666667',
                'created_at' => '2023-05-08 20:06:22',
                'updated_at' => '2023-05-09 23:34:57',
            ),
            3 => 
            array (
                'id' => '13',
                'nama' => 'Tahun Masuk',
                'slug' => 'tahun-masuk',
                'kode' => 'C4',
                'ci' => '0.0055916305916288',
                'ri' => '0.58',
                'cr' => '0.00964074239936',
                'prioritas' => '0.21444444444444',
                'total' => '4.5',
                'eign_value' => '0.965',
                'created_at' => '2023-05-08 20:06:38',
                'updated_at' => '2023-05-09 23:34:57',
            ),
            4 => 
            array (
                'id' => '14',
                'nama' => 'Wawasan Ke organisasian',
                'slug' => 'wawasan-ke-organisasian',
                'kode' => 'C5',
                'ci' => '0.0055916305916288',
                'ri' => '0.58',
                'cr' => '0.00964074239936',
                'prioritas' => '0.18944444444444',
                'total' => '5',
                'eign_value' => '0.94722222222222',
                'created_at' => '2023-05-08 20:06:50',
                'updated_at' => '2023-05-09 23:34:57',
            ),
        ));
        
        
    }
}