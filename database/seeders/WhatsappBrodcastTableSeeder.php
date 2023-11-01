<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WhatsappBrodcastTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('whatsapp_brodcast')->delete();
        
        \DB::table('whatsapp_brodcast')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'Kurasi tahap 2',
                'template' => 'Hallo Kak *__nama_anggota__* , Salam Cempor! 
Terima kasih atas partisipasi Anda pada pendaftaran Pelatihan Dasar Woodcraft Cempor 2023,
Dispora Kota Bandung. Saat ini, tim kami masih dalam proses kurasi Tahap 2.',
                'created_at' => '2023-08-14 10:45:43',
                'updated_at' => '2023-08-14 10:45:43',
            ),
            1 => 
            array (
                'id' => '2',
                'nama' => 'Konfirmasi kehadiran',
                'template' => '"Halo Kak *__nama_anggota__*,\\n
Salam Cempor!\\n
\\n
Terima kasih atas partisipasi Anda pada pendaftaran Pelatihan Dasar  *__nama_pelatihan__* Cempor 2023, Dispora Kota Bandung. Saat ini, tim kami sedang dalam proses kurasi Tahap 2.
\\n
Berikut info jadwal pelaksanaan kegiatan Pelatihan Dasar:\\n
\\n
Hari       : Selasa & Rabu\\n
Tanggal : 26 & 27 Juli 2023\\n
Pukul     : 08.30 - 17.00 WIB\\n
\\n
*Bagi calon anggota yang masih bersedia untuk melanjutkan Pelatihan ini, dimohon untuk konfirmasi batas waktu pukul 15.00 WIB, 19 September 2023) :\\n
\\n
\\n
Calon Peserta yang Lolos Tahap Akhir akan diumumkan melalui akun Instagram @cempor_disporabdg.\\n
\\n
Jika Anda memiliki kendala atau pertanyaan, silakan sampaikan di sini.\\n
\\n
Cempor, Wani diadu!"""\\n',
            'created_at' => '2023-08-14 11:13:12',
            'updated_at' => '2023-09-19 03:01:36',
        ),
        2 => 
        array (
            'id' => '3',
            'nama' => 'Konfirmasi Pendaftar',
            'template' => 'Hallo Kak  *__nama_anggota__* , Kakak telah berhasil mendaftar Akun Cempor. Silahkan untuk update biodata di Akun cempor dan melanjutkan ke pemilihan pelatihan ya ....',
            'created_at' => '2023-08-14 12:13:55',
            'updated_at' => '2023-08-14 12:13:55',
        ),
        3 => 
        array (
            'id' => '4',
            'nama' => 'Invite Grup',
            'template' => 'Hai Kak *__nama_anggota__*,
Salam Cempor !!

Selamat!! telah lolos Kurasi Tahap Akhir untuk mengikuti *Pelatihan Dasar Wood Craft Cempor Dispora Kota Bandung 2023.*

Silahkan bergabung pada grup whatsapp, seluruh informasi akan diumumkan di grup.

Buka tautan ini untuk bergabung ke grup WhatsApp saya: https://chat.whatsapp.com/HFR1NoLpbOk9uTPssphMQz

Cempor, Wani Diadu!',
            'created_at' => '2023-08-16 06:04:30',
            'updated_at' => '2023-08-16 06:07:05',
        ),
        4 => 
        array (
            'id' => '5',
            'nama' => 'Kelengkapan Akun Cempor',
        'template' => 'Hallo Kak *__nama_anggota__* , Selamat ya kakak telah lolos di pelatihan Wood Craft. Untuk mempermudah pendataan silahkan login/masuk akun kakak di www.cempordigital.com menggunakan email : __email_anggota__ dengan password 12345678 . Silahkan rubah password dan lengkapi data yang masih kosong. Mengisi biodata hingga selesai penting untuk Absensi kehadiran, sertifikat dan fasilitas lainya . jika ada kendala bisa hubungi kami kembali. terima kasih :)',
        'created_at' => '2023-08-16 06:59:06',
        'updated_at' => '2023-08-16 07:02:39',
    ),
    5 => 
    array (
        'id' => '6',
        'nama' => 'Kurasi Tahap 2 - Kesediaan',
        'template' => 'Halo Kak *__nama_anggota__*, 
Salam Cempor!

Terima kasih atas partisipasi Anda pada pendaftaran *Pelatihan Dasar __nama_pelatihan__ Cempor 2023, Dispora Kota Bandung*. Saat ini, tim kami masih dalam proses kurasi Tahap 2.

Bagi calon anggota yang masih bersedia untuk melanjutkan Proses Kurasi tahap akhir, dimohon untuk mengisi formulir kesediaan pada tautan berikut (batas waktu pukul 10.00 WIB, 16 Agustus 2023) :

https://bit.ly/FormKesediaanMengikutiSerangkaianPelatihanDasarCempor2023

Calon Peserta yang Lolos Tahap Akhir akan diumumkan melalui akun Instagram @cempor_disporabdg.

Cempor, Wani diadu!',
        'created_at' => '2023-09-05 02:19:17',
        'updated_at' => '2023-09-05 02:31:11',
    ),
    6 => 
    array (
        'id' => '7',
        'nama' => 'Meeting sebelum latsar',
        'template' => 'Halo Kak __nama_anggota__
Salam Cempor!

Terima kasih atas partisipasi Anda pada pendaftaran *Pelatihan Dasar Desain Produk Limbah Plastik Cempor 2023*, Dispora Kota Bandung. Saat ini, tim kami masih dalam proses kurasi Tahap 2.

Bagi calon anggota yang masih bersedia untuk melanjutkan dimohon konfirmasinya untuk mengikuti *Meeting Online* pada:

Hari        : *Jumat*
Tanggal : *15 September 2023*
Pukul     : *19.00 WIB sd selesai*

Link room akan kami berikan sesaat sebelum meeting. Apabila ada pertanyaan silakan tanyakan disini.

Cempor, Wani diadu!',
        'created_at' => '2023-09-14 15:11:33',
        'updated_at' => '2023-09-14 15:11:33',
    ),
));
        
        
    }
}