<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SpkAhpKriteriaJenisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('spk_ahp_kriteria_jenis')->delete();
        
        \DB::table('spk_ahp_kriteria_jenis')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'Kurang',
                'kode' => 'C1',
                'prioritas' => '0.16378066378066',
                'total' => '6',
                'eign_value' => '0.98268398268398',
                'kriteria_id' => '11',
                'created_at' => '2023-05-09 11:07:04',
                'updated_at' => '2023-05-09 11:42:02',
            ),
            1 => 
            array (
                'id' => '2',
                'nama' => 'Cukup',
                'kode' => 'C2',
                'prioritas' => '0.2972582972583',
                'total' => '3.5',
                'eign_value' => '1.040404040404',
                'kriteria_id' => '11',
                'created_at' => '2023-05-09 11:07:21',
                'updated_at' => '2023-05-09 11:42:02',
            ),
            2 => 
            array (
                'id' => '3',
                'nama' => 'Lengkap',
                'kode' => 'C3',
                'prioritas' => '0.53896103896104',
                'total' => '1.8333333333333',
                'eign_value' => '0.98809523809524',
                'kriteria_id' => '11',
                'created_at' => '2023-05-09 11:07:30',
                'updated_at' => '2023-05-09 11:42:02',
            ),
            3 => 
            array (
                'id' => '4',
                'nama' => 'Kurang',
                'kode' => 'C1',
                'prioritas' => '0.16378066378066',
                'total' => '6',
                'eign_value' => '0.98268398268398',
                'kriteria_id' => '10',
                'created_at' => '2023-05-09 11:09:37',
                'updated_at' => '2023-05-09 11:42:51',
            ),
            4 => 
            array (
                'id' => '5',
                'nama' => 'Baik',
                'kode' => 'C2',
                'prioritas' => '0.2972582972583',
                'total' => '3.5',
                'eign_value' => '1.040404040404',
                'kriteria_id' => '10',
                'created_at' => '2023-05-09 11:09:48',
                'updated_at' => '2023-05-09 11:42:51',
            ),
            5 => 
            array (
                'id' => '6',
                'nama' => 'Sangat Baik',
                'kode' => 'C3',
                'prioritas' => '0.53896103896104',
                'total' => '1.8333333333333',
                'eign_value' => '0.98809523809524',
                'kriteria_id' => '10',
                'created_at' => '2023-05-09 11:09:57',
                'updated_at' => '2023-05-09 11:42:51',
            ),
            6 => 
            array (
                'id' => '9',
                'nama' => 'Anggota Biasa',
                'kode' => 'C1',
                'prioritas' => '0.043443379739952',
                'total' => '21',
                'eign_value' => '0.91231097453899',
                'kriteria_id' => '12',
                'created_at' => '2023-05-09 11:43:28',
                'updated_at' => '2023-05-09 11:47:23',
            ),
            7 => 
            array (
                'id' => '10',
                'nama' => 'Pernah jadi sekertaris bidang',
                'kode' => 'C2',
                'prioritas' => '0.065494217628283',
                'total' => '15.5',
                'eign_value' => '1.0151603732384',
                'kriteria_id' => '12',
                'created_at' => '2023-05-09 11:43:40',
                'updated_at' => '2023-05-09 11:47:23',
            ),
            8 => 
            array (
                'id' => '11',
                'nama' => 'Pernah jadi ketua bidang',
                'kode' => 'C3',
                'prioritas' => '0.10244119275386',
                'total' => '10.833333333333',
                'eign_value' => '1.1097795881668',
                'kriteria_id' => '12',
                'created_at' => '2023-05-09 11:44:02',
                'updated_at' => '2023-05-09 11:47:23',
            ),
            9 => 
            array (
                'id' => '12',
                'nama' => 'Pernah jadi bendahara umum',
                'kode' => 'C4',
                'prioritas' => '0.16043372867584',
                'total' => '7.0833333333333',
                'eign_value' => '1.1364055781205',
                'kriteria_id' => '12',
                'created_at' => '2023-05-09 11:44:25',
                'updated_at' => '2023-05-09 11:47:23',
            ),
            10 => 
            array (
                'id' => '13',
                'nama' => 'Pernah jadi sekertaris umum',
                'kode' => 'C5',
                'prioritas' => '0.24883007333272',
                'total' => '4.2833333333333',
                'eign_value' => '1.0658221474418',
                'kriteria_id' => '12',
                'created_at' => '2023-05-09 11:44:36',
                'updated_at' => '2023-05-09 11:47:23',
            ),
            11 => 
            array (
                'id' => '14',
                'nama' => 'Pernah jadi ketua umum',
                'kode' => 'C6',
                'prioritas' => '0.37935740786935',
                'total' => '2.45',
                'eign_value' => '0.9294256492799',
                'kriteria_id' => '12',
                'created_at' => '2023-05-09 11:44:55',
                'updated_at' => '2023-05-09 11:47:23',
            ),
            12 => 
            array (
                'id' => '16',
                'nama' => '2018',
                'kode' => 'C1',
                'prioritas' => '0.53896103896104',
                'total' => '1.8333333333333',
                'eign_value' => '0.98809523809524',
                'kriteria_id' => '13',
                'created_at' => '2023-05-09 11:48:11',
                'updated_at' => '2023-05-09 11:49:07',
            ),
            13 => 
            array (
                'id' => '17',
                'nama' => '2019',
                'kode' => 'C2',
                'prioritas' => '0.2972582972583',
                'total' => '3.5',
                'eign_value' => '1.040404040404',
                'kriteria_id' => '13',
                'created_at' => '2023-05-09 11:48:19',
                'updated_at' => '2023-05-09 11:49:07',
            ),
            14 => 
            array (
                'id' => '18',
                'nama' => '2020',
                'kode' => 'C3',
                'prioritas' => '0.16378066378066',
                'total' => '6',
                'eign_value' => '0.98268398268398',
                'kriteria_id' => '13',
                'created_at' => '2023-05-09 11:48:30',
                'updated_at' => '2023-05-09 11:49:07',
            ),
            15 => 
            array (
                'id' => '19',
                'nama' => 'Kurang',
                'kode' => 'C1',
                'prioritas' => '0.16378066378066',
                'total' => '6',
                'eign_value' => '0.98268398268398',
                'kriteria_id' => '14',
                'created_at' => '2023-05-09 11:49:48',
                'updated_at' => '2023-05-09 11:50:40',
            ),
            16 => 
            array (
                'id' => '20',
                'nama' => 'Baik',
                'kode' => 'C2',
                'prioritas' => '0.2972582972583',
                'total' => '3.5',
                'eign_value' => '1.040404040404',
                'kriteria_id' => '14',
                'created_at' => '2023-05-09 11:49:57',
                'updated_at' => '2023-05-09 11:50:40',
            ),
            17 => 
            array (
                'id' => '21',
                'nama' => 'Sangat Baik',
                'kode' => 'C3',
                'prioritas' => '0.53896103896104',
                'total' => '1.8333333333333',
                'eign_value' => '0.98809523809524',
                'kriteria_id' => '14',
                'created_at' => '2023-05-09 11:50:04',
                'updated_at' => '2023-05-09 11:50:40',
            ),
        ));
        
        
    }
}