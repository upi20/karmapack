<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengurusProfilePengalamanLainTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pengurus_profile_pengalaman_lain')->delete();
        
        \DB::table('pengurus_profile_pengalaman_lain')->insert(array (
            0 => 
            array (
                'id' => '1',
                'user_id' => '1',
                'pengalaman' => 'Pengalaman lain',
                'keterangan' => '1',
                'created_at' => '2022-04-29 08:10:08',
                'updated_at' => '2022-04-29 08:10:08',
            ),
            1 => 
            array (
                'id' => '2',
                'user_id' => '101',
                'pengalaman' => 'Tutor inspiratif Gerakan Mengajar Desa Cianjur',
                'keterangan' => NULL,
                'created_at' => '2022-07-15 22:30:05',
                'updated_at' => '2022-07-15 22:30:05',
            ),
            2 => 
            array (
                'id' => '3',
                'user_id' => '21',
                'pengalaman' => 'Guru pendamping Anak berkebutuhan khusus di SMP IT Ibnu Khaldun Lembang
2018-2019',
                'keterangan' => NULL,
                'created_at' => '2022-07-15 22:47:46',
                'updated_at' => '2022-07-15 22:47:46',
            ),
            3 => 
            array (
                'id' => '4',
                'user_id' => '99',
                'pengalaman' => 'Ketua OSIS MAN 3 Cianjur 2018/2019
Ketua Unit Kegiatan Santri Futsal dan Sepak Bola Al-Ihsan 2022/2023
Penulis buku "Cinta adalah Luka"',
                'keterangan' => NULL,
                'created_at' => '2022-07-16 11:24:17',
                'updated_at' => '2022-07-16 11:24:17',
            ),
            4 => 
            array (
                'id' => '5',
                'user_id' => '100',
                'pengalaman' => 'Himpunan mahasiswa islam Komisariat Stisip Guna Nusantara 
Gardu Literasi Pagelaran
Komunitas Jarang Ulin
Komunitas Menulis',
                'keterangan' => 'Anggota dan Pengurus',
                'created_at' => '2022-07-19 20:03:34',
                'updated_at' => '2022-07-19 20:03:34',
            ),
        ));
        
        
    }
}