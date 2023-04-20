<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KataAlumnisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kata_alumnis')->delete();
        
        \DB::table('kata_alumnis')->insert(array (
            0 => 
            array (
                'id' => '1',
                'user_id' => '1',
                'sebagai' => 'Kominfo 2021-2023',
                'deskripsi' => 'Saya khusus mendedikasikan waktu saya untuk belajar ngoding. Di Dicoding belajarnya step by step, library-nya up-to-date. Kalau ada eror, nggak bingung. Di sini saya juga belajar untuk nggak asal coding. CV pun jadi bagus. Saya jadi percaya diri.',
                'sequence' => '2',
                'profesi' => 'Junior Programmer Di Shopee',
                'status' => '1',
                'created_at' => '2022-08-09 15:11:08',
                'updated_at' => '2022-08-18 15:03:10',
            ),
            1 => 
            array (
                'id' => '2',
                'user_id' => '16',
                'sebagai' => 'Ketua Bidang Kominfo Kabinet Masagi',
                'deskripsi' => 'Aplikasi karya saya & tim di kantor sudah go-internasional. “Fueru” kini dinikmati puluhan ribu user Jepang. Salah satu bekalnya, sertifikasi Dicoding. Dengan belajar di sini, saya jadi tahu level skill coding saya. Materi ajar sangat lengkap. Fitur code review membuat saya paham bagian mana yang perlu ditingkatkan dari kode saya.',
                'sequence' => '3',
                'profesi' => 'Developer - PT Mirai International Indonesia',
                'status' => '1',
                'created_at' => '2022-08-18 14:52:12',
                'updated_at' => '2022-08-18 15:03:10',
            ),
            2 => 
            array (
                'id' => '3',
                'user_id' => '55',
                'sebagai' => 'Sekertaris bidang Wirausaha Kabinet Masagi',
                'deskripsi' => 'Yang kudapat dari kelas Dicoding adalah teknik belajar yang terstruktur dan komunitasnya yang bagus. Dalam waktu 2 tahun, Dicoding jadi salah satu andalanku dalam mempersiapkan diri demi pindah karir. Sebelumnya geolog di perusahaan migas, kini aku lead developer di bank nasional!',
                'sequence' => '4',
                'profesi' => 'Lead Front-end Developer - Bank CIMB Niaga',
                'status' => '1',
                'created_at' => '2022-08-18 14:54:41',
                'updated_at' => '2022-08-18 15:03:10',
            ),
            3 => 
            array (
                'id' => '4',
                'user_id' => '20',
                'sebagai' => 'Ketua Umum Kabinet Masagi',
                'deskripsi' => 'Mengandalkan kuliah saja, tidak cukup. Dengan Dicoding, saya mantap tinggalkan dunia gaming lantas belajar dunia Android yang ternyata menyenangkan. Yang nomor satu, Dicoding mengajarkan ilmu berorientasi kerja. Kini saya sangat terbantu dalam karir saya.',
                'sequence' => '1',
                'profesi' => 'Android Developer - Nusantara Beta Studio',
                'status' => '1',
                'created_at' => '2022-08-18 14:55:43',
                'updated_at' => '2023-02-20 08:08:57',
            ),
            4 => 
            array (
                'id' => '5',
                'user_id' => '62',
                'sebagai' => 'Ketua Bidang Nalar dan Intelektual  Kabinet Masagi',
                'deskripsi' => 'Saya khusus mendedikasikan waktu saya untuk belajar ngoding. Di Dicoding belajarnya step by step, library-nya up-to-date. Kalau ada eror, nggak bingung. Di sini saya juga belajar untuk nggak asal coding. CV pun jadi bagus. Saya jadi percaya diri.',
                'sequence' => '5',
                'profesi' => 'Product Engineer - Gojek',
                'status' => '1',
                'created_at' => '2022-08-18 14:56:57',
                'updated_at' => '2022-08-18 15:03:10',
            ),
            5 => 
            array (
                'id' => '6',
                'user_id' => '67',
                'sebagai' => 'Anggota PAKEAK Kabinet Masagi',
                'deskripsi' => 'Join Dicoding! Banyak sekali materi yang bagus di sini. Pengalaman saya, dengan kelas Android di Dicoding saya jadi PD untuk ambil bidang Android di Tokopedia dan disetujui. Bahkan sebelum wisuda kuliah, saya telah berhasil lulus seleksi dan diterima kerja di unicorn tersebut.',
                'sequence' => '6',
                'profesi' => 'Software Engineer Android - Tokopedia',
                'status' => '1',
                'created_at' => '2022-08-18 14:58:09',
                'updated_at' => '2023-02-20 08:08:10',
            ),
        ));
        
        
    }
}