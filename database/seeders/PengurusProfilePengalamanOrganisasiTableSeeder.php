<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengurusProfilePengalamanOrganisasiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pengurus_profile_pengalaman_organisasi')->delete();
        
        \DB::table('pengurus_profile_pengalaman_organisasi')->insert(array (
            0 => 
            array (
                'id' => '1',
                'user_id' => '1',
                'nama' => 'Palang Merah Remaja',
                'dari' => '2017',
                'sampai' => '2018',
                'jabatan' => 'Anggota',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:46:23',
                'updated_at' => '2022-04-23 08:51:15',
            ),
            1 => 
            array (
                'id' => '2',
                'user_id' => '1',
                'nama' => 'Palang Merah Remaja',
                'dari' => '2018',
                'sampai' => '2019',
                'jabatan' => 'Sekertaris Umum',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:53:55',
                'updated_at' => '2022-04-23 08:53:55',
            ),
            2 => 
            array (
                'id' => '3',
                'user_id' => '1',
                'nama' => 'Majelis Perwakilan Kelas',
                'dari' => '2017',
                'sampai' => '2018',
                'jabatan' => 'Anggota',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:54:43',
                'updated_at' => '2022-07-15 17:27:43',
            ),
            3 => 
            array (
                'id' => '4',
                'user_id' => '1',
                'nama' => 'Majelis Perwakilan Kelas',
                'dari' => '2018',
                'sampai' => '2019',
                'jabatan' => 'Ketua Umum',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:55:02',
                'updated_at' => '2022-04-23 08:55:38',
            ),
            4 => 
            array (
                'id' => '5',
                'user_id' => '1',
                'nama' => 'DKM Ulil Albab USB YPKP',
                'dari' => '2020',
                'sampai' => '2021',
                'jabatan' => 'Anggota',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:56:22',
                'updated_at' => '2022-04-23 08:56:22',
            ),
            5 => 
            array (
                'id' => '6',
                'user_id' => '1',
                'nama' => 'DKM Ulil Albab USB YPKP',
                'dari' => '2021',
                'sampai' => NULL,
                'jabatan' => 'Media Divisi dan Informasi',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:57:03',
                'updated_at' => '2022-04-23 09:05:31',
            ),
            6 => 
            array (
                'id' => '7',
                'user_id' => '1',
                'nama' => 'Karmapack',
                'dari' => '2021',
                'sampai' => NULL,
            'jabatan' => 'Anggota Bidang Komunikasi dan Informasi (KOMINFO)',
                'keterangan' => NULL,
                'created_at' => '2022-04-23 08:57:40',
                'updated_at' => '2022-04-23 09:05:21',
            ),
            7 => 
            array (
                'id' => '8',
                'user_id' => '101',
                'nama' => 'Palang Merah Remaja',
                'dari' => '2017',
                'sampai' => '2020',
                'jabatan' => 'Bendahara umum',
                'keterangan' => '-',
                'created_at' => '2022-07-15 22:29:42',
                'updated_at' => '2022-07-15 22:29:42',
            ),
            8 => 
            array (
                'id' => '9',
                'user_id' => '21',
                'nama' => 'OSIS SMPN 2 Sindangbarang',
                'dari' => '2012',
                'sampai' => '2013',
                'jabatan' => 'Ketua bidang kerohanian',
                'keterangan' => NULL,
                'created_at' => '2022-07-15 22:46:14',
                'updated_at' => '2022-07-15 22:46:14',
            ),
            9 => 
            array (
                'id' => '10',
                'user_id' => '101',
                'nama' => 'Gerakan Mengajar Desa',
                'dari' => '2020',
                'sampai' => '2022',
                'jabatan' => 'Tutor inspiratif',
                'keterangan' => NULL,
                'created_at' => '2022-07-15 22:49:13',
                'updated_at' => '2022-07-15 22:49:13',
            ),
            10 => 
            array (
                'id' => '11',
                'user_id' => '99',
                'nama' => 'Karmapack',
                'dari' => '2020',
                'sampai' => '2024',
                'jabatan' => 'Sekbid Kominfo',
                'keterangan' => NULL,
                'created_at' => '2022-07-16 11:23:00',
                'updated_at' => '2022-07-16 11:23:00',
            ),
            11 => 
            array (
                'id' => '12',
                'user_id' => '100',
                'nama' => 'Lembaga Dakwah kampus Stisip Guna Nusantara',
                'dari' => '2022',
                'sampai' => '2023',
                'jabatan' => 'Divisi Syiar',
                'keterangan' => 'Pengelola Media sosial',
                'created_at' => '2022-07-19 20:01:31',
                'updated_at' => '2022-07-19 20:01:31',
            ),
            12 => 
            array (
                'id' => '13',
                'user_id' => '99',
                'nama' => 'OSIS MAN 3 Cianjur',
                'dari' => '2018',
                'sampai' => '2019',
                'jabatan' => 'Ketua',
                'keterangan' => NULL,
                'created_at' => '2022-08-22 12:10:31',
                'updated_at' => '2022-08-22 12:10:45',
            ),
            13 => 
            array (
                'id' => '14',
                'user_id' => '99',
                'nama' => 'Unit Kegiatan Santri Futsal dan Sepak Bola Al-Ihsan',
                'dari' => '2022',
                'sampai' => '2023',
                'jabatan' => 'Ketua',
                'keterangan' => NULL,
                'created_at' => '2022-08-22 12:11:18',
                'updated_at' => '2022-08-22 12:11:18',
            ),
            14 => 
            array (
                'id' => '15',
                'user_id' => '87',
                'nama' => 'HMJ Ekonomi Syariah',
                'dari' => '2020',
                'sampai' => '2021',
                'jabatan' => 'Staff PAO',
                'keterangan' => NULL,
                'created_at' => '2022-08-30 17:53:45',
                'updated_at' => '2022-08-30 17:53:45',
            ),
            15 => 
            array (
                'id' => '16',
                'user_id' => '87',
            'nama' => 'Ikatan Keluarga Alumni YASPIDA (IKMADA) Bandung',
                'dari' => '2020',
                'sampai' => '2022',
                'jabatan' => 'Ketua bidang PAO',
                'keterangan' => NULL,
                'created_at' => '2022-08-30 17:54:38',
                'updated_at' => '2022-08-30 17:54:38',
            ),
            16 => 
            array (
                'id' => '17',
                'user_id' => '87',
            'nama' => 'Forum Studi Ekonomi Islam (FORDES) UIN BANDUNG',
                'dari' => '2021',
                'sampai' => '2022',
                'jabatan' => 'Staff Human Resource Development',
                'keterangan' => NULL,
                'created_at' => '2022-08-30 17:55:28',
                'updated_at' => '2022-08-30 17:55:28',
            ),
            17 => 
            array (
                'id' => '18',
                'user_id' => '87',
                'nama' => 'UPTQ UIN Bandung',
                'dari' => '2020',
                'sampai' => '2022',
                'jabatan' => 'Anggota',
                'keterangan' => NULL,
                'created_at' => '2022-08-30 17:55:58',
                'updated_at' => '2022-08-30 17:55:58',
            ),
            18 => 
            array (
                'id' => '19',
                'user_id' => '97',
                'nama' => 'OSIS MTS AL-HUDA RAWAHANJA',
                'dari' => '2015',
                'sampai' => '2016',
                'jabatan' => 'KETUA OSIS',
                'keterangan' => NULL,
                'created_at' => '2022-08-30 18:20:16',
                'updated_at' => '2022-08-30 18:20:16',
            ),
            19 => 
            array (
                'id' => '20',
                'user_id' => '97',
                'nama' => 'BES MAS AL-MANSHURIYAH',
                'dari' => '2018',
                'sampai' => '2019',
                'jabatan' => 'WAKIL KETUA DPT',
                'keterangan' => NULL,
                'created_at' => '2022-08-30 18:20:54',
                'updated_at' => '2022-08-30 18:20:54',
            ),
            20 => 
            array (
                'id' => '21',
                'user_id' => '97',
                'nama' => 'DKR KWARRAN PAGELARAN',
                'dari' => '2018',
                'sampai' => '2019',
                'jabatan' => 'WAKIL KETUA',
                'keterangan' => NULL,
                'created_at' => '2022-08-30 18:21:32',
                'updated_at' => '2022-08-30 18:21:32',
            ),
            21 => 
            array (
                'id' => '22',
                'user_id' => '97',
                'nama' => 'HIMAPSI UNIVERSITAS MUHAMMADIYAH BANDUNG',
                'dari' => '2021',
                'sampai' => '2022',
                'jabatan' => 'ANGGOTA BIDANG MINAT DAN BAKAT',
                'keterangan' => NULL,
                'created_at' => '2022-08-30 18:22:29',
                'updated_at' => '2022-08-30 18:22:29',
            ),
            22 => 
            array (
                'id' => '23',
                'user_id' => '76',
                'nama' => 'Paskibra Smkn 1 Tanggeung',
                'dari' => '2019',
                'sampai' => '2021',
                'jabatan' => 'Ketua paskibra',
                'keterangan' => '-',
                'created_at' => '2022-08-30 18:25:03',
                'updated_at' => '2022-08-30 18:25:03',
            ),
            23 => 
            array (
                'id' => '24',
                'user_id' => '97',
                'nama' => 'BEWARA PERS UNIVERSITAS MUHAMMADIYAH BANDUNG',
                'dari' => '2021',
                'sampai' => '2022',
                'jabatan' => 'KOOR VIDEO DAN FOTO',
                'keterangan' => 'DIVISI PEMBERITAAN',
                'created_at' => '2022-08-30 18:25:24',
                'updated_at' => '2022-08-30 18:25:24',
            ),
            24 => 
            array (
                'id' => '25',
                'user_id' => '97',
                'nama' => 'UKM FOTOGRAFI UNIVERSITAS MUHAMMADIYAH BANDUNG',
                'dari' => '2021',
                'sampai' => '2022',
                'jabatan' => 'ANGGOTA BIDANG MINAT DAN BAKAT',
                'keterangan' => NULL,
                'created_at' => '2022-08-30 18:26:22',
                'updated_at' => '2022-08-30 18:26:22',
            ),
            25 => 
            array (
                'id' => '26',
                'user_id' => '97',
                'nama' => 'SANTRI MENDUNIA JAWA BARAT',
                'dari' => '2020',
                'sampai' => '2022',
                'jabatan' => 'KOOR DESIGN MANAGEMENT',
                'keterangan' => NULL,
                'created_at' => '2022-08-30 18:28:15',
                'updated_at' => '2022-08-30 18:28:15',
            ),
            26 => 
            array (
                'id' => '27',
                'user_id' => '73',
                'nama' => 'Himpunan Mahasiswa Ekonomi Syariah',
                'dari' => '2022',
                'sampai' => NULL,
                'jabatan' => 'Anggota',
                'keterangan' => NULL,
                'created_at' => '2022-08-30 22:54:25',
                'updated_at' => '2022-08-30 22:54:25',
            ),
            27 => 
            array (
                'id' => '28',
                'user_id' => '74',
                'nama' => 'Paskibra Kabupaten Cianjur',
                'dari' => '2019',
                'sampai' => NULL,
                'jabatan' => 'Anggota PKC 2019',
                'keterangan' => NULL,
                'created_at' => '2022-08-31 11:26:14',
                'updated_at' => '2022-08-31 11:26:14',
            ),
            28 => 
            array (
                'id' => '29',
                'user_id' => '74',
                'nama' => 'Paskibra Kecamatan Cijati',
                'dari' => '2019',
                'sampai' => NULL,
                'jabatan' => 'Anggota PKC 2019',
                'keterangan' => NULL,
                'created_at' => '2022-08-31 11:26:53',
                'updated_at' => '2022-08-31 11:26:53',
            ),
            29 => 
            array (
                'id' => '30',
                'user_id' => '74',
                'nama' => 'Pengurus Paskibra Kecamatan Cijati',
                'dari' => '2022',
                'sampai' => '2025',
                'jabatan' => 'Sekretaris Umum',
                'keterangan' => NULL,
                'created_at' => '2022-08-31 11:28:25',
                'updated_at' => '2022-08-31 11:28:25',
            ),
            30 => 
            array (
                'id' => '31',
                'user_id' => '74',
                'nama' => 'OSIS SMK Negeri 1 Cijati',
                'dari' => '2018',
                'sampai' => '2019',
                'jabatan' => 'Anggota',
                'keterangan' => 'Periode 2018-2019',
                'created_at' => '2022-08-31 11:29:29',
                'updated_at' => '2022-08-31 11:29:29',
            ),
            31 => 
            array (
                'id' => '32',
                'user_id' => '74',
                'nama' => 'Pramuka SMK Negeri 1 Cijati',
                'dari' => '2018',
                'sampai' => '2021',
                'jabatan' => 'Juru Adat Putra',
                'keterangan' => NULL,
                'created_at' => '2022-08-31 11:30:09',
                'updated_at' => '2022-08-31 11:30:09',
            ),
            32 => 
            array (
                'id' => '33',
                'user_id' => '74',
                'nama' => 'Raimuna Cabang Cianjur 2019',
                'dari' => '2019',
                'sampai' => NULL,
                'jabatan' => 'Peserta',
                'keterangan' => NULL,
                'created_at' => '2022-08-31 11:30:45',
                'updated_at' => '2022-08-31 11:30:45',
            ),
            33 => 
            array (
                'id' => '34',
                'user_id' => '74',
                'nama' => 'Paskibra SMK Negeri 1 Cijati',
                'dari' => '2018',
                'sampai' => '2021',
                'jabatan' => 'Anggota',
                'keterangan' => NULL,
                'created_at' => '2022-08-31 11:31:30',
                'updated_at' => '2022-08-31 11:31:30',
            ),
            34 => 
            array (
                'id' => '35',
                'user_id' => '74',
                'nama' => 'Dianpiru 2019',
                'dari' => '2019',
                'sampai' => '2019',
                'jabatan' => 'Panitia Saka Bhakti Husada Kabupaten Cianjur',
                'keterangan' => NULL,
                'created_at' => '2022-08-31 11:32:47',
                'updated_at' => '2022-08-31 11:32:47',
            ),
            35 => 
            array (
                'id' => '36',
                'user_id' => '46',
            'nama' => 'Himpunan Mahasiswa Islam (HMI)',
                'dari' => '2021',
                'sampai' => '2025',
                'jabatan' => 'Kader',
                'keterangan' => NULL,
                'created_at' => '2022-08-31 17:54:13',
                'updated_at' => '2022-08-31 18:33:12',
            ),
            36 => 
            array (
                'id' => '37',
                'user_id' => '46',
                'nama' => 'karang Taruna Kecamatan Cibinong',
                'dari' => '2021',
                'sampai' => '2026',
                'jabatan' => 'WAKIL SEKRETARIS IV',
                'keterangan' => NULL,
                'created_at' => '2022-08-31 17:55:20',
                'updated_at' => '2022-08-31 18:34:19',
            ),
            37 => 
            array (
                'id' => '38',
                'user_id' => '46',
                'nama' => 'PGRI Ranting Saripudin',
                'dari' => '2022',
                'sampai' => '2026',
                'jabatan' => 'Anggota pengembangan bidang olahraga',
                'keterangan' => NULL,
                'created_at' => '2022-08-31 17:57:04',
                'updated_at' => '2022-08-31 18:32:22',
            ),
            38 => 
            array (
                'id' => '39',
                'user_id' => '46',
            'nama' => 'Aliansi Mahasiswa Jawa barat (ALAM JABAR)',
                'dari' => '2021',
                'sampai' => '2024',
                'jabatan' => 'Kader',
                'keterangan' => NULL,
                'created_at' => '2022-08-31 17:58:11',
                'updated_at' => '2022-08-31 18:37:38',
            ),
            39 => 
            array (
                'id' => '40',
                'user_id' => '46',
            'nama' => 'Keluarga Mahasiswa Dan Pelajaran Cianjur Kidul (KARMAPACK)',
                'dari' => '2022',
                'sampai' => '2023',
            'jabatan' => 'Anggota Bidang Pengembangan Aparatur Organisasi (PAO)',
                'keterangan' => NULL,
                'created_at' => '2022-08-31 18:03:24',
                'updated_at' => '2022-08-31 18:31:40',
            ),
            40 => 
            array (
                'id' => '41',
                'user_id' => '46',
            'nama' => 'Himpunan Mahasiswa Pendidikan Guru Sekolah Dasar (HIMASEDA) Invada',
                'dari' => '2021',
                'sampai' => '2022',
                'jabatan' => 'Anggota',
                'keterangan' => NULL,
                'created_at' => '2022-08-31 18:40:29',
                'updated_at' => '2022-08-31 18:45:22',
            ),
            41 => 
            array (
                'id' => '42',
                'user_id' => '89',
                'nama' => 'OSIS SMPN 1 CIKADU',
                'dari' => '2015',
                'sampai' => '2017',
                'jabatan' => 'Ketua Bidang',
                'keterangan' => '2 priode',
                'created_at' => '2022-09-01 01:08:33',
                'updated_at' => '2022-09-01 01:08:33',
            ),
            42 => 
            array (
                'id' => '43',
                'user_id' => '89',
                'nama' => 'OSIS SMKN 1 CIKADU',
                'dari' => '2019',
                'sampai' => '2020',
                'jabatan' => 'Sekertaris',
                'keterangan' => NULL,
                'created_at' => '2022-09-01 01:09:37',
                'updated_at' => '2022-09-01 01:09:37',
            ),
            43 => 
            array (
                'id' => '44',
                'user_id' => '89',
                'nama' => 'DKR KWARAN CIKADU',
                'dari' => '2019',
                'sampai' => '2022',
                'jabatan' => 'Sekertaris',
                'keterangan' => NULL,
                'created_at' => '2022-09-01 01:10:48',
                'updated_at' => '2022-09-01 01:11:16',
            ),
            44 => 
            array (
                'id' => '45',
                'user_id' => '89',
                'nama' => 'Paskibra Kecamatan Cikadu',
                'dari' => '2018',
                'sampai' => '2019',
                'jabatan' => 'Anggota',
                'keterangan' => NULL,
                'created_at' => '2022-09-01 01:12:43',
                'updated_at' => '2022-09-01 01:12:43',
            ),
            45 => 
            array (
                'id' => '46',
                'user_id' => '89',
            'nama' => 'Himpunan Mahasiswa Manajeman ( HIMAMAN )',
                'dari' => '2022',
                'sampai' => '2023',
                'jabatan' => 'Divisi Social',
                'keterangan' => NULL,
                'created_at' => '2022-09-01 01:15:24',
                'updated_at' => '2022-09-01 01:16:05',
            ),
            46 => 
            array (
                'id' => '47',
                'user_id' => '110',
                'nama' => 'Palang Merah Remaja',
                'dari' => '2019',
                'sampai' => '2021',
                'jabatan' => 'Wakil Ketua PMR',
                'keterangan' => NULL,
                'created_at' => '2022-09-01 06:17:51',
                'updated_at' => '2022-09-01 06:17:51',
            ),
        ));
        
        
    }
}