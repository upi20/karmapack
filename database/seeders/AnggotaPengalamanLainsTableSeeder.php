<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnggotaPengalamanLainsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('anggota_pengalaman_lains')->delete();
        
        \DB::table('anggota_pengalaman_lains')->insert(array (
            0 => 
            array (
                'id' => '1',
            'pengalaman' => 'Terlibat dalam pembuatan aplikasi Rencana Anggaran Biaya (RAB) Untuk Sekolah Indonesia Kota Kinabalu (SIKK) Malaysia pada tahun 2021',
                'keterangan' => NULL,
                'anggota_id' => '1',
                'created_at' => '2023-02-11 00:40:11',
                'updated_at' => '2023-02-11 00:40:11',
            ),
            1 => 
            array (
                'id' => '2',
                'pengalaman' => 'Guru pendamping Anak berkebutuhan khusus di SMP IT Ibnu Khaldun Lembang
2018-2019',
                'keterangan' => NULL,
                'anggota_id' => '6',
                'created_at' => '2023-02-11 00:40:11',
                'updated_at' => '2023-02-11 00:40:11',
            ),
            2 => 
            array (
                'id' => '3',
                'pengalaman' => 'PESIMA ITPS 2020',
                'keterangan' => NULL,
                'anggota_id' => '30',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-09-13 18:08:11',
            ),
            3 => 
            array (
                'id' => '4',
                'pengalaman' => 'VOLUNTEER PELITA MENGABDI BATCH #3',
                'keterangan' => '2022',
                'anggota_id' => '77',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            4 => 
            array (
                'id' => '5',
                'pengalaman' => 'Penulis buku "Cinta adalah Luka"',
                'keterangan' => NULL,
                'anggota_id' => '79',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            5 => 
            array (
                'id' => '6',
                'pengalaman' => 'Himpunan mahasiswa islam Komisariat Stisip Guna Nusantara 
Gardu Literasi Pagelaran
Komunitas Jarang Ulin
Komunitas Menulis',
                'keterangan' => 'Anggota dan Pengurus',
                'anggota_id' => '80',
                'created_at' => '2023-02-11 00:40:13',
                'updated_at' => '2023-02-11 00:40:13',
            ),
            6 => 
            array (
                'id' => '7',
                'pengalaman' => 'Tutor inspiratif Gerakan Mengajar Desa Cianjur',
                'keterangan' => NULL,
                'anggota_id' => '81',
                'created_at' => '2023-02-11 00:40:13',
                'updated_at' => '2023-02-11 00:40:13',
            ),
        ));
        
        
    }
}