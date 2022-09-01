<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('p_menu')->delete();
        
        \DB::table('p_menu')->insert(array (
            0 => 
            array (
                'id' => '345',
                'parent_id' => NULL,
                'title' => 'Admin Dashboard',
                'icon' => 'fas fa-tachometer-alt',
                'route' => 'admin.dashboard',
                'sequence' => '2',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            1 => 
            array (
                'id' => '346',
                'parent_id' => NULL,
                'title' => 'Anggota',
                'icon' => 'fas fa-users',
                'route' => 'admin.user',
                'sequence' => '21',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:27:22',
            ),
            2 => 
            array (
                'id' => '347',
                'parent_id' => NULL,
                'title' => 'Profile Addon',
                'icon' => 'fas fa-user',
                'route' => NULL,
                'sequence' => '22',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:27:22',
            ),
            3 => 
            array (
                'id' => '348',
                'parent_id' => '347',
                'title' => 'Pendidikan Jenis',
                'icon' => NULL,
                'route' => 'admin.profile.pendidikan_jenis',
                'sequence' => '23',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:27:22',
            ),
            4 => 
            array (
                'id' => '349',
                'parent_id' => '347',
                'title' => 'Kontak Tipe',
                'icon' => NULL,
                'route' => 'admin.profile.kontak_tipe',
                'sequence' => '24',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:27:22',
            ),
            5 => 
            array (
                'id' => '350',
                'parent_id' => NULL,
                'title' => 'Kepengurusan',
                'icon' => 'fas fa-sitemap',
                'route' => 'admin.pengurus.periode',
                'sequence' => '20',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:27:22',
            ),
            6 => 
            array (
                'id' => '351',
                'parent_id' => NULL,
                'title' => 'Artikel',
                'icon' => 'fas fa-file-alt',
                'route' => NULL,
                'sequence' => '4',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            7 => 
            array (
                'id' => '352',
                'parent_id' => '351',
                'title' => 'Data',
                'icon' => NULL,
                'route' => 'admin.artikel.data',
                'sequence' => '5',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            8 => 
            array (
                'id' => '353',
                'parent_id' => '351',
                'title' => 'Kategori',
                'icon' => NULL,
                'route' => 'admin.artikel.kategori',
                'sequence' => '6',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            9 => 
            array (
                'id' => '354',
                'parent_id' => '351',
                'title' => 'Tag',
                'icon' => NULL,
                'route' => 'admin.artikel.tag',
                'sequence' => '7',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            10 => 
            array (
                'id' => '355',
                'parent_id' => NULL,
                'title' => 'Address',
                'icon' => 'fas fa-map-marker-alt',
                'route' => NULL,
                'sequence' => '25',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            11 => 
            array (
                'id' => '356',
                'parent_id' => '355',
                'title' => 'Province',
                'icon' => NULL,
                'route' => 'admin.address.province',
                'sequence' => '26',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            12 => 
            array (
                'id' => '357',
                'parent_id' => '355',
                'title' => 'Regencie',
                'icon' => NULL,
                'route' => 'admin.address.regencie',
                'sequence' => '27',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            13 => 
            array (
                'id' => '358',
                'parent_id' => '355',
                'title' => 'District',
                'icon' => NULL,
                'route' => 'admin.address.district',
                'sequence' => '28',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            14 => 
            array (
                'id' => '359',
                'parent_id' => '355',
                'title' => 'Village',
                'icon' => NULL,
                'route' => 'admin.address.village',
                'sequence' => '29',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            15 => 
            array (
                'id' => '360',
                'parent_id' => NULL,
                'title' => 'Galeri',
                'icon' => 'fas fa-images',
                'route' => 'admin.galeri',
                'sequence' => '13',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            16 => 
            array (
                'id' => '361',
                'parent_id' => NULL,
                'title' => 'Menu Management',
                'icon' => 'fas fa-stream',
                'route' => NULL,
                'sequence' => '33',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:27:22',
            ),
            17 => 
            array (
                'id' => '362',
                'parent_id' => NULL,
                'title' => 'Pendaftaran',
                'icon' => 'fas fa-user-edit',
                'route' => NULL,
                'sequence' => '8',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            18 => 
            array (
                'id' => '363',
                'parent_id' => NULL,
                'title' => 'Sosial Media',
                'icon' => 'fas fa-share-alt',
                'route' => 'admin.social_media',
                'sequence' => '14',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            19 => 
            array (
                'id' => '364',
                'parent_id' => NULL,
                'title' => 'Kontak',
                'icon' => 'fas fa-phone',
                'route' => NULL,
                'sequence' => '15',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            20 => 
            array (
                'id' => '365',
                'parent_id' => NULL,
                'title' => 'Instagram',
                'icon' => 'fas fa-image',
                'route' => 'admin.instagram',
                'sequence' => '12',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:28:00',
            ),
            21 => 
            array (
                'id' => '366',
                'parent_id' => NULL,
                'title' => 'Username Role',
                'icon' => 'fas fa-check',
                'route' => 'admin.username_validation',
                'sequence' => '36',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:27:22',
            ),
            22 => 
            array (
                'id' => '367',
                'parent_id' => NULL,
                'title' => 'User Access',
                'icon' => 'fas fa-user-check',
                'route' => NULL,
                'sequence' => '30',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:27:22',
            ),
            23 => 
            array (
                'id' => '368',
                'parent_id' => '367',
                'title' => 'Permission',
                'icon' => NULL,
                'route' => 'admin.user_access.permission',
                'sequence' => '31',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:27:22',
            ),
            24 => 
            array (
                'id' => '369',
                'parent_id' => '367',
                'title' => 'Role',
                'icon' => NULL,
                'route' => 'admin.user_access.role',
                'sequence' => '32',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:27:22',
            ),
            25 => 
            array (
                'id' => '370',
                'parent_id' => NULL,
                'title' => 'Anggota',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => '48',
                'active' => '1',
                'type' => '0',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            26 => 
            array (
                'id' => '372',
                'parent_id' => NULL,
                'title' => 'Profile',
                'icon' => 'fas fa-user',
                'route' => 'member.profile',
                'sequence' => '49',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            27 => 
            array (
                'id' => '373',
                'parent_id' => NULL,
                'title' => 'Ganti Password',
                'icon' => 'fas fa-key',
                'route' => 'member.password',
                'sequence' => '52',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            28 => 
            array (
                'id' => '386',
                'parent_id' => NULL,
                'title' => 'Logout',
                'icon' => 'fas fa-sign-out-alt',
                'route' => 'logout',
                'sequence' => '53',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-05 23:54:09',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            29 => 
            array (
                'id' => '387',
                'parent_id' => '362',
                'title' => 'List Data',
                'icon' => NULL,
                'route' => 'admin.pendaftaran',
                'sequence' => '9',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-06 00:05:47',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            30 => 
            array (
                'id' => '388',
                'parent_id' => '362',
                'title' => 'Sensus Anggota',
                'icon' => NULL,
                'route' => 'admin.pendaftaran.sensus',
                'sequence' => '11',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-06 00:06:23',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            31 => 
            array (
                'id' => '389',
                'parent_id' => NULL,
                'title' => 'Alumni Menu',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => '50',
                'active' => '1',
                'type' => '0',
                'created_at' => '2022-08-06 14:06:05',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            32 => 
            array (
                'id' => '390',
                'parent_id' => NULL,
                'title' => 'Dashboard',
                'icon' => 'fas fa-tachometer-alt',
                'route' => 'member.dashboard',
                'sequence' => '1',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-06 15:16:19',
                'updated_at' => '2022-09-01 18:25:42',
            ),
            33 => 
            array (
                'id' => '392',
                'parent_id' => '362',
                'title' => 'Google Forms',
                'icon' => NULL,
                'route' => 'admin.pendaftaran.gform',
                'sequence' => '10',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-08 16:14:54',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            34 => 
            array (
                'id' => '393',
                'parent_id' => NULL,
                'title' => 'Utility',
                'icon' => 'fas fa-tools',
                'route' => NULL,
                'sequence' => '37',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-08 22:41:26',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            35 => 
            array (
                'id' => '394',
                'parent_id' => '393',
                'title' => 'Notifikasi Depan Atas',
                'icon' => NULL,
                'route' => 'admin.utility.notif_depan_atas',
                'sequence' => '39',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-08 22:41:53',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            36 => 
            array (
                'id' => '395',
                'parent_id' => NULL,
                'title' => 'List Kata Alumni',
                'icon' => 'fas fa-user-edit',
                'route' => 'admin.kata_alumni',
                'sequence' => '45',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-09 15:20:36',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            37 => 
            array (
                'id' => '396',
                'parent_id' => NULL,
                'title' => 'Kata Alumni',
                'icon' => 'fas fa-user-edit',
                'route' => 'member.kata_alumni',
                'sequence' => '51',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-09 15:23:52',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            38 => 
            array (
                'id' => '397',
                'parent_id' => NULL,
                'title' => 'Setting Halaman',
                'icon' => 'fas fa-wrench',
                'route' => NULL,
                'sequence' => '41',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-14 21:10:57',
                'updated_at' => '2022-09-01 18:28:59',
            ),
            39 => 
            array (
                'id' => '398',
                'parent_id' => '397',
                'title' => 'Admin',
                'icon' => NULL,
                'route' => 'admin.setting.admin',
                'sequence' => '42',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-14 21:11:42',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            40 => 
            array (
                'id' => '399',
                'parent_id' => '397',
                'title' => 'Front',
                'icon' => NULL,
                'route' => 'admin.setting.front',
                'sequence' => '43',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-14 21:52:45',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            41 => 
            array (
                'id' => '400',
                'parent_id' => '397',
                'title' => 'Home',
                'icon' => NULL,
                'route' => 'admin.setting.home',
                'sequence' => '44',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-16 14:55:41',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            42 => 
            array (
                'id' => '401',
                'parent_id' => '393',
                'title' => 'Hari Besar Nasional',
                'icon' => NULL,
                'route' => 'admin.utility.hari_besar_nasional',
                'sequence' => '40',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-17 21:19:05',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            43 => 
            array (
                'id' => '402',
                'parent_id' => '393',
                'title' => 'Notifikasi Admin Atas',
                'icon' => NULL,
                'route' => 'admin.utility.notif_admin_atas',
                'sequence' => '38',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-18 16:42:00',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            44 => 
            array (
                'id' => '403',
                'parent_id' => NULL,
                'title' => 'Laporan',
                'icon' => 'fas fa-book',
                'route' => NULL,
                'sequence' => '46',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-18 18:54:07',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            45 => 
            array (
                'id' => '404',
                'parent_id' => '403',
                'title' => 'Anggota',
                'icon' => NULL,
                'route' => 'admin.lapooran.anggota',
                'sequence' => '47',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-18 18:55:08',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            46 => 
            array (
                'id' => '405',
                'parent_id' => '361',
                'title' => 'Admin',
                'icon' => NULL,
                'route' => 'admin.menu.admin',
                'sequence' => '34',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:12:45',
                'updated_at' => '2022-09-01 18:27:22',
            ),
            47 => 
            array (
                'id' => '406',
                'parent_id' => '361',
                'title' => 'Frontend',
                'icon' => NULL,
                'route' => 'admin.menu.frontend',
                'sequence' => '35',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-20 14:16:07',
                'updated_at' => '2022-09-01 18:27:22',
            ),
            48 => 
            array (
                'id' => '407',
                'parent_id' => '364',
                'title' => 'Message',
                'icon' => NULL,
                'route' => 'admin.kontak.message',
                'sequence' => '16',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-21 08:38:20',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            49 => 
            array (
                'id' => '408',
                'parent_id' => '364',
                'title' => 'FAQ',
                'icon' => NULL,
                'route' => 'admin.kontak.faq',
                'sequence' => '17',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-21 08:39:18',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            50 => 
            array (
                'id' => '409',
                'parent_id' => '364',
                'title' => 'List',
                'icon' => NULL,
                'route' => 'admin.kontak.list',
                'sequence' => '18',
                'active' => '1',
                'type' => '1',
                'created_at' => '2022-08-21 08:40:08',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            51 => 
            array (
                'id' => '410',
                'parent_id' => NULL,
                'title' => 'Media dan informasi',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => '3',
                'active' => '1',
                'type' => '0',
                'created_at' => '2022-09-01 18:18:20',
                'updated_at' => '2022-09-01 18:25:56',
            ),
            52 => 
            array (
                'id' => '411',
                'parent_id' => NULL,
                'title' => 'Peralatan',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => '19',
                'active' => '1',
                'type' => '0',
                'created_at' => '2022-09-01 18:22:47',
                'updated_at' => '2022-09-01 18:25:56',
            ),
        ));
        
        
    }
}