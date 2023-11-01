<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PMenuFrontendsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('p_menu_frontends')->delete();
        
        \DB::table('p_menu_frontends')->insert(array (
            0 => 
            array (
                'id' => '1',
                'parent_id' => NULL,
                'title' => 'Utama',
                'icon' => NULL,
                'route' => '__base_url__',
                'sequence' => '1',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:26:10',
                'updated_at' => '2023-02-18 22:38:16',
            ),
            1 => 
            array (
                'id' => '2',
                'parent_id' => NULL,
                'title' => 'Tentang Kami',
                'icon' => NULL,
                'route' => '#',
                'sequence' => '2',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:30:39',
                'updated_at' => '2023-02-18 22:39:37',
            ),
            2 => 
            array (
                'id' => '3',
                'parent_id' => '2',
                'title' => 'Sejarah',
                'icon' => NULL,
                'route' => 'tentang.sejarah',
                'sequence' => '3',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:30:59',
                'updated_at' => '2023-02-19 09:50:07',
            ),
            3 => 
            array (
                'id' => '4',
                'parent_id' => '2',
                'title' => 'Struktur Kepengurusan',
                'icon' => NULL,
                'route' => 'tentang.kepengurusan.struktur',
                'sequence' => '5',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:31:18',
                'updated_at' => '2023-02-18 22:39:37',
            ),
            4 => 
            array (
                'id' => '5',
                'parent_id' => '2',
                'title' => 'Daftar Periode Kepengurusan',
                'icon' => NULL,
                'route' => 'tentang.kepengurusan.periode',
                'sequence' => '4',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:31:35',
                'updated_at' => '2023-03-18 00:24:10',
            ),
            5 => 
            array (
                'id' => '6',
                'parent_id' => '2',
                'title' => 'Anggaran Dasar Anggaran Rumah Tangga',
                'icon' => NULL,
                'route' => '__file_shared__/ad_art_dan_ghbo_karmapack.pdf',
                'sequence' => '6',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:31:46',
                'updated_at' => '2023-10-20 00:10:53',
            ),
            6 => 
            array (
                'id' => '7',
                'parent_id' => NULL,
                'title' => 'Bidang',
                'icon' => NULL,
                'route' => '#',
                'sequence' => '7',
                'active' => '0',
                'type' => '1',
                'created_at' => '2022-08-20 14:32:07',
                'updated_at' => '2023-10-20 00:13:12',
            ),
            7 => 
            array (
                'id' => '8',
                'parent_id' => '7',
                'title' => 'Komunikasi dan Informasi',
                'icon' => NULL,
                'route' => '__base_url__/tentang/kepengurusan/bidang/2022-2023-komunikasi-dan-informasi',
                'sequence' => '8',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:34:52',
                'updated_at' => '2023-02-18 06:37:32',
            ),
            8 => 
            array (
                'id' => '9',
                'parent_id' => '7',
                'title' => 'Pengembangan Nalar dan Intelektual',
                'icon' => NULL,
                'route' => '__base_url__/tentang/kepengurusan/bidang/2022-2023-pengembangan-nalar-dan-intelektual',
                'sequence' => '9',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:34:52',
                'updated_at' => '2023-02-18 06:37:40',
            ),
            9 => 
            array (
                'id' => '10',
                'parent_id' => '7',
                'title' => 'Minat dan Bakat',
                'icon' => NULL,
                'route' => '__base_url__/tentang/kepengurusan/bidang/2022-2023-minat-dan-bakat',
                'sequence' => '10',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:34:52',
                'updated_at' => '2023-02-18 06:37:51',
            ),
            10 => 
            array (
                'id' => '11',
                'parent_id' => '7',
                'title' => 'Pengembangan Aparatur Organisasi',
                'icon' => NULL,
                'route' => '__base_url__/tentang/kepengurusan/bidang/2022-2023-pengembangan-aparatur-organisasi',
                'sequence' => '11',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:34:52',
                'updated_at' => '2023-02-18 06:37:57',
            ),
            11 => 
            array (
                'id' => '12',
                'parent_id' => '7',
                'title' => 'Pengembangan Kode Etik dan Akhlakul Karimah',
                'icon' => NULL,
                'route' => '__base_url__/tentang/kepengurusan/bidang/2022-2023-pengembangan-kode-etik-dan-akhlakul-karimah',
                'sequence' => '12',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:34:52',
                'updated_at' => '2023-02-18 06:38:02',
            ),
            12 => 
            array (
                'id' => '13',
                'parent_id' => '7',
                'title' => 'Sosial Masyarakat',
                'icon' => NULL,
                'route' => '__base_url__/tentang/kepengurusan/bidang/2022-2023-sosial-masyarakat',
                'sequence' => '13',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:34:52',
                'updated_at' => '2023-02-18 06:38:08',
            ),
            13 => 
            array (
                'id' => '14',
                'parent_id' => '7',
                'title' => 'Keperempuanan',
                'icon' => NULL,
                'route' => '__base_url__/tentang/kepengurusan/bidang/2022-2023-keperempuanan',
                'sequence' => '14',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:34:52',
                'updated_at' => '2023-02-18 06:38:14',
            ),
            14 => 
            array (
                'id' => '15',
                'parent_id' => NULL,
                'title' => 'Anggota',
                'icon' => NULL,
                'route' => 'anggota',
                'sequence' => '15',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:46:42',
                'updated_at' => '2022-08-22 01:33:48',
            ),
            15 => 
            array (
                'id' => '16',
                'parent_id' => NULL,
                'title' => 'Galeri',
                'icon' => NULL,
                'route' => 'galeri',
                'sequence' => '17',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:46:53',
                'updated_at' => '2022-09-02 01:03:08',
            ),
            16 => 
            array (
                'id' => '17',
                'parent_id' => NULL,
                'title' => 'Pendaftaran',
                'icon' => NULL,
                'route' => 'pendaftaran',
                'sequence' => '18',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:47:03',
                'updated_at' => '2022-09-02 01:03:08',
            ),
            17 => 
            array (
                'id' => '18',
                'parent_id' => NULL,
                'title' => 'Kontak',
                'icon' => NULL,
                'route' => 'kontak',
                'sequence' => '19',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:47:10',
                'updated_at' => '2022-09-02 01:03:08',
            ),
            18 => 
            array (
                'id' => '19',
                'parent_id' => NULL,
                'title' => 'Artikel',
                'icon' => NULL,
                'route' => 'artikel',
                'sequence' => '16',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-09-02 01:03:02',
                'updated_at' => '2022-09-02 01:03:08',
            ),
        ));
        
        
    }
}