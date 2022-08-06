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
                'id' => 344,
                'parent_id' => NULL,
                'title' => 'Administrator Menu',
                'icon' => 'icon',
                'route' => 'debugbar.openhandler',
                'sequence' => 1,
                'active' => 1,
                'type' => 0,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 00:38:58',
            ),
            1 => 
            array (
                'id' => 345,
                'parent_id' => NULL,
                'title' => 'Admin Dashboard',
                'icon' => 'fe fe-home',
                'route' => 'admin.dashboard',
                'sequence' => 2,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:36:00',
            ),
            2 => 
            array (
                'id' => 346,
                'parent_id' => NULL,
                'title' => 'Member',
                'icon' => 'fe fe-users',
                'route' => 'admin.user',
                'sequence' => 4,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            3 => 
            array (
                'id' => 347,
                'parent_id' => NULL,
                'title' => 'Profile Addon',
                'icon' => 'fe fe-user-plus',
                'route' => '',
                'sequence' => 5,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            4 => 
            array (
                'id' => 348,
                'parent_id' => 347,
                'title' => 'Pendidikan Jenis',
                'icon' => NULL,
                'route' => 'admin.profile.pendidikan_jenis',
                'sequence' => 6,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            5 => 
            array (
                'id' => 349,
                'parent_id' => 347,
                'title' => 'Kontak Tipe',
                'icon' => NULL,
                'route' => 'admin.profile.kontak_tipe',
                'sequence' => 7,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            6 => 
            array (
                'id' => 350,
                'parent_id' => NULL,
                'title' => 'Kepengurusan',
                'icon' => 'fe fe-sliders',
                'route' => 'admin.pengurus.periode',
                'sequence' => 8,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            7 => 
            array (
                'id' => 351,
                'parent_id' => NULL,
                'title' => 'Artikel',
                'icon' => 'fe fe-file-text',
                'route' => NULL,
                'sequence' => 9,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            8 => 
            array (
                'id' => 352,
                'parent_id' => 351,
                'title' => 'Data',
                'icon' => NULL,
                'route' => 'admin.artikel.data',
                'sequence' => 10,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            9 => 
            array (
                'id' => 353,
                'parent_id' => 351,
                'title' => 'Kategori',
                'icon' => NULL,
                'route' => 'admin.artikel.kategori',
                'sequence' => 11,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            10 => 
            array (
                'id' => 354,
                'parent_id' => 351,
                'title' => 'Tag',
                'icon' => NULL,
                'route' => 'admin.artikel.tag',
                'sequence' => 12,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            11 => 
            array (
                'id' => 355,
                'parent_id' => NULL,
                'title' => 'Address',
                'icon' => 'fe fe-map-pin',
                'route' => '',
                'sequence' => 13,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            12 => 
            array (
                'id' => 356,
                'parent_id' => 355,
                'title' => 'Province',
                'icon' => NULL,
                'route' => 'admin.address.province',
                'sequence' => 14,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            13 => 
            array (
                'id' => 357,
                'parent_id' => 355,
                'title' => 'Regencie',
                'icon' => NULL,
                'route' => 'admin.address.regencie',
                'sequence' => 15,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            14 => 
            array (
                'id' => 358,
                'parent_id' => 355,
                'title' => 'District',
                'icon' => NULL,
                'route' => 'admin.address.district',
                'sequence' => 16,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            15 => 
            array (
                'id' => 359,
                'parent_id' => 355,
                'title' => 'Village',
                'icon' => NULL,
                'route' => 'admin.address.village',
                'sequence' => 17,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            16 => 
            array (
                'id' => 360,
                'parent_id' => NULL,
                'title' => 'Galeri',
                'icon' => 'fe fe-image',
                'route' => 'admin.galeri',
                'sequence' => 18,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            17 => 
            array (
                'id' => 361,
                'parent_id' => NULL,
                'title' => 'Menu',
                'icon' => 'fe fe-align-justify',
                'route' => 'admin.menu',
                'sequence' => 26,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            18 => 
            array (
                'id' => 362,
                'parent_id' => NULL,
                'title' => 'Pendaftaran',
                'icon' => 'fe fe-edit',
                'route' => NULL,
                'sequence' => 19,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            19 => 
            array (
                'id' => 363,
                'parent_id' => NULL,
                'title' => 'Sosial Media',
                'icon' => 'fe fe-aperture',
                'route' => 'admin.social_media',
                'sequence' => 22,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            20 => 
            array (
                'id' => 364,
                'parent_id' => NULL,
                'title' => 'Kontak',
                'icon' => 'fe fe-phone',
                'route' => 'admin.contact',
                'sequence' => 23,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            21 => 
            array (
                'id' => 365,
                'parent_id' => NULL,
                'title' => 'Footer Instagram',
                'icon' => 'fe fe-image',
                'route' => 'admin.footer_instagram',
                'sequence' => 24,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            22 => 
            array (
                'id' => 366,
                'parent_id' => NULL,
                'title' => 'Username Role',
                'icon' => 'fe fe-check',
                'route' => 'admin.username_validation',
                'sequence' => 25,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            23 => 
            array (
                'id' => 367,
                'parent_id' => NULL,
                'title' => 'User Access',
                'icon' => 'fe fe-user-check',
                'route' => '',
                'sequence' => 27,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            24 => 
            array (
                'id' => 368,
                'parent_id' => 367,
                'title' => 'Permission',
                'icon' => NULL,
                'route' => 'admin.user_access.permission',
                'sequence' => 28,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            25 => 
            array (
                'id' => 369,
                'parent_id' => 367,
                'title' => 'Role',
                'icon' => NULL,
                'route' => 'admin.user_access.role',
                'sequence' => 29,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            26 => 
            array (
                'id' => 370,
                'parent_id' => NULL,
                'title' => 'Anggota Menu',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => 31,
                'active' => 1,
                'type' => 0,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            27 => 
            array (
                'id' => 372,
                'parent_id' => NULL,
                'title' => 'Profile',
                'icon' => 'fe fe-user',
                'route' => 'member.profile',
                'sequence' => 32,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:16:29',
            ),
            28 => 
            array (
                'id' => 373,
                'parent_id' => NULL,
                'title' => 'Ganti Password',
                'icon' => 'fe fe-lock',
                'route' => 'member.password',
                'sequence' => 33,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 15:16:29',
            ),
            29 => 
            array (
                'id' => 386,
                'parent_id' => NULL,
                'title' => 'Logout',
                'icon' => 'fe fe-alert-circle',
                'route' => 'logout',
                'sequence' => 34,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:54:09',
                'updated_at' => '2022-08-06 15:16:29',
            ),
            30 => 
            array (
                'id' => 387,
                'parent_id' => 362,
                'title' => 'List Data',
                'icon' => NULL,
                'route' => 'admin.pendaftaran',
                'sequence' => 20,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-06 00:05:47',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            31 => 
            array (
                'id' => 388,
                'parent_id' => 362,
                'title' => 'Sensus Anggota',
                'icon' => NULL,
                'route' => 'admin.pendaftaran.sensus',
                'sequence' => 21,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-06 00:06:23',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            32 => 
            array (
                'id' => 389,
                'parent_id' => NULL,
                'title' => 'Alumni Menu',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => 30,
                'active' => 1,
                'type' => 0,
                'created_at' => '2022-08-06 14:06:05',
                'updated_at' => '2022-08-06 15:35:53',
            ),
            33 => 
            array (
                'id' => 390,
                'parent_id' => NULL,
                'title' => 'Dashboard',
                'icon' => 'fe fe-home',
                'route' => 'member.dashboard',
                'sequence' => 3,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-06 15:16:19',
                'updated_at' => '2022-08-06 15:35:53',
            ),
        ));
        
        
    }
}