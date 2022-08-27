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
                'id' => 1,
                'parent_id' => NULL,
                'title' => 'Home',
                'icon' => NULL,
                'route' => '__base_url__',
                'sequence' => 1,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:26:10',
                'updated_at' => '2022-08-25 21:41:05',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'title' => 'Tentang Kami',
                'icon' => NULL,
                'route' => '#',
                'sequence' => 3,
                'active' => 0,
                'type' => 1,
                'created_at' => '2022-08-20 14:30:39',
                'updated_at' => '2022-08-22 01:33:54',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 2,
                'title' => 'Sejarah',
                'icon' => NULL,
                'route' => '#',
                'sequence' => 4,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:30:59',
                'updated_at' => '2022-08-22 01:33:48',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => NULL,
                'title' => 'Struktur Kepengurusan',
                'icon' => NULL,
                'route' => 'about.kepengurusan.struktur',
                'sequence' => 2,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:31:18',
                'updated_at' => '2022-08-25 21:41:05',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 2,
                'title' => 'Periode Kepengurusan',
                'icon' => NULL,
                'route' => '#',
                'sequence' => 5,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:31:35',
                'updated_at' => '2022-08-20 14:45:44',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'title' => 'Anggaran Dasar Anggaran Rumah Tangga',
                'icon' => NULL,
                'route' => '#',
                'sequence' => 6,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:31:46',
                'updated_at' => '2022-08-20 14:45:44',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => NULL,
                'title' => 'Bidang',
                'icon' => NULL,
                'route' => '#',
                'sequence' => 7,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:32:07',
                'updated_at' => '2022-08-20 14:45:44',
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => 7,
                'title' => 'Komunikasi dan Informasi',
                'icon' => NULL,
                'route' => '__base_url__/about/kepengurusan/bidang/2022-2023-komunikasi-dan-informasi',
                'sequence' => 8,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:34:52',
                'updated_at' => '2022-08-20 14:45:44',
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => 7,
                'title' => 'Pengembangan Nalar dan Intelektual',
                'icon' => NULL,
                'route' => '__base_url__/about/kepengurusan/bidang/2022-2023-pengembangan-nalar-dan-intelektual',
                'sequence' => 9,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:34:52',
                'updated_at' => '2022-08-20 14:45:44',
            ),
            9 => 
            array (
                'id' => 10,
                'parent_id' => 7,
                'title' => 'Minat dan Baka',
                'icon' => NULL,
                'route' => '__base_url__/about/kepengurusan/bidang/2022-2023-minat-dan-bakat',
                'sequence' => 10,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:34:52',
                'updated_at' => '2022-08-20 14:45:44',
            ),
            10 => 
            array (
                'id' => 11,
                'parent_id' => 7,
                'title' => 'Pengembangan Aparatur Organisasi',
                'icon' => NULL,
                'route' => '__base_url__/about/kepengurusan/bidang/2022-2023-pengembangan-aparatur-organisasi',
                'sequence' => 11,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:34:52',
                'updated_at' => '2022-08-20 14:45:44',
            ),
            11 => 
            array (
                'id' => 12,
                'parent_id' => 7,
                'title' => 'Pengembangan Kode Etik dan Akhlakul Karimah',
                'icon' => NULL,
                'route' => '__base_url__/about/kepengurusan/bidang/2022-2023-pengembangan-kode-etik-dan-akhlakul-karimah',
                'sequence' => 12,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:34:52',
                'updated_at' => '2022-08-20 14:45:44',
            ),
            12 => 
            array (
                'id' => 13,
                'parent_id' => 7,
                'title' => 'Sosial Masyarakat',
                'icon' => NULL,
                'route' => '__base_url__/about/kepengurusan/bidang/2022-2023-sosial-masyarakat',
                'sequence' => 13,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:34:52',
                'updated_at' => '2022-08-20 14:45:44',
            ),
            13 => 
            array (
                'id' => 14,
                'parent_id' => 7,
                'title' => 'Keperempuanan',
                'icon' => NULL,
                'route' => '__base_url__/about/kepengurusan/bidang/2022-2023-keperempuanan',
                'sequence' => 14,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:34:52',
                'updated_at' => '2022-08-20 14:45:44',
            ),
            14 => 
            array (
                'id' => 15,
                'parent_id' => NULL,
                'title' => 'Anggota',
                'icon' => NULL,
                'route' => 'anggota',
                'sequence' => 15,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:46:42',
                'updated_at' => '2022-08-22 01:33:48',
            ),
            15 => 
            array (
                'id' => 16,
                'parent_id' => NULL,
                'title' => 'Galeri',
                'icon' => NULL,
                'route' => 'galeri',
                'sequence' => 16,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:46:53',
                'updated_at' => '2022-08-22 01:33:48',
            ),
            16 => 
            array (
                'id' => 17,
                'parent_id' => NULL,
                'title' => 'Pendaftaran',
                'icon' => NULL,
                'route' => 'pendaftaran',
                'sequence' => 17,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:47:03',
                'updated_at' => '2022-08-22 01:33:48',
            ),
            17 => 
            array (
                'id' => 18,
                'parent_id' => NULL,
                'title' => 'Kontak',
                'icon' => NULL,
                'route' => 'kontak',
                'sequence' => 18,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:47:10',
                'updated_at' => '2022-08-22 01:33:48',
            ),
        ));
        
        
    }
}