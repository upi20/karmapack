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
                'updated_at' => '2022-08-05 23:53:19',
            ),
            1 => 
            array (
                'id' => 345,
                'parent_id' => NULL,
                'title' => 'Dashboard',
                'icon' => 'fe fe-home',
                'route' => 'admin.dashboard',
                'sequence' => 2,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:58:55',
            ),
            2 => 
            array (
                'id' => 346,
                'parent_id' => NULL,
                'title' => 'Member',
                'icon' => 'fe fe-users',
                'route' => 'admin.user',
                'sequence' => 3,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            3 => 
            array (
                'id' => 347,
                'parent_id' => NULL,
                'title' => 'Profile Addon',
                'icon' => 'fe fe-user-plus',
                'route' => '',
                'sequence' => 4,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            4 => 
            array (
                'id' => 348,
                'parent_id' => 347,
                'title' => 'Pendidikan Jenis',
                'icon' => NULL,
                'route' => 'admin.profile.pendidikan_jenis',
                'sequence' => 5,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            5 => 
            array (
                'id' => 349,
                'parent_id' => 347,
                'title' => 'Kontak Tipe',
                'icon' => NULL,
                'route' => 'admin.profile.kontak_tipe',
                'sequence' => 6,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            6 => 
            array (
                'id' => 350,
                'parent_id' => NULL,
                'title' => 'Kepengurusan',
                'icon' => 'fe fe-sliders',
                'route' => 'admin.pengurus.periode',
                'sequence' => 7,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            7 => 
            array (
                'id' => 351,
                'parent_id' => NULL,
                'title' => 'Artikel',
                'icon' => 'fe fe-file-text',
                'route' => '',
                'sequence' => 8,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            8 => 
            array (
                'id' => 352,
                'parent_id' => 351,
                'title' => 'Data',
                'icon' => NULL,
                'route' => 'admin.artikel.data',
                'sequence' => 9,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            9 => 
            array (
                'id' => 353,
                'parent_id' => 351,
                'title' => 'Kategori',
                'icon' => NULL,
                'route' => 'admin.artikel.kategori',
                'sequence' => 10,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            10 => 
            array (
                'id' => 354,
                'parent_id' => 351,
                'title' => 'Tag',
                'icon' => NULL,
                'route' => 'admin.artikel.tag',
                'sequence' => 11,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            11 => 
            array (
                'id' => 355,
                'parent_id' => NULL,
                'title' => 'Address',
                'icon' => 'fe fe-map-pin',
                'route' => '',
                'sequence' => 12,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            12 => 
            array (
                'id' => 356,
                'parent_id' => 355,
                'title' => 'Province',
                'icon' => NULL,
                'route' => 'admin.address.province',
                'sequence' => 13,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            13 => 
            array (
                'id' => 357,
                'parent_id' => 355,
                'title' => 'Regencie',
                'icon' => NULL,
                'route' => 'admin.address.regencie',
                'sequence' => 14,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            14 => 
            array (
                'id' => 358,
                'parent_id' => 355,
                'title' => 'District',
                'icon' => NULL,
                'route' => 'admin.address.district',
                'sequence' => 15,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            15 => 
            array (
                'id' => 359,
                'parent_id' => 355,
                'title' => 'Village',
                'icon' => NULL,
                'route' => 'admin.address.village',
                'sequence' => 16,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            16 => 
            array (
                'id' => 360,
                'parent_id' => NULL,
                'title' => 'Galeri',
                'icon' => 'fe fe-image',
                'route' => 'admin.galeri',
                'sequence' => 17,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            17 => 
            array (
                'id' => 361,
                'parent_id' => NULL,
                'title' => 'Menu',
                'icon' => 'fe fe-align-justify',
                'route' => 'admin.menu',
                'sequence' => 18,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
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
                'updated_at' => '2022-08-06 00:00:58',
            ),
            19 => 
            array (
                'id' => 363,
                'parent_id' => NULL,
                'title' => 'Sosial Media',
                'icon' => 'fe fe-aperture',
                'route' => 'admin.social_media',
                'sequence' => 20,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            20 => 
            array (
                'id' => 364,
                'parent_id' => NULL,
                'title' => 'Kontak',
                'icon' => 'fe fe-phone',
                'route' => 'admin.contact',
                'sequence' => 21,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            21 => 
            array (
                'id' => 365,
                'parent_id' => NULL,
                'title' => 'Footer Instagram',
                'icon' => 'fe fe-image',
                'route' => 'admin.footer_instagram',
                'sequence' => 22,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            22 => 
            array (
                'id' => 366,
                'parent_id' => NULL,
                'title' => 'Username Role',
                'icon' => 'fe fe-check',
                'route' => 'admin.username_validation',
                'sequence' => 23,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            23 => 
            array (
                'id' => 367,
                'parent_id' => NULL,
                'title' => 'User Access',
                'icon' => 'fe fe-user-check',
                'route' => '',
                'sequence' => 24,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            24 => 
            array (
                'id' => 368,
                'parent_id' => 367,
                'title' => 'Permission',
                'icon' => NULL,
                'route' => 'admin.user_access.permission',
                'sequence' => 25,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            25 => 
            array (
                'id' => 369,
                'parent_id' => 367,
                'title' => 'Role',
                'icon' => NULL,
                'route' => 'admin.user_access.role',
                'sequence' => 26,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            26 => 
            array (
                'id' => 370,
                'parent_id' => NULL,
                'title' => 'Member Menu',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => 27,
                'active' => 1,
                'type' => 0,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-06 00:08:33',
            ),
            27 => 
            array (
                'id' => 372,
                'parent_id' => NULL,
                'title' => 'Profile',
                'icon' => 'fe fe-user',
                'route' => 'member.profile',
                'sequence' => 29,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            28 => 
            array (
                'id' => 373,
                'parent_id' => NULL,
                'title' => 'Ganti Password',
                'icon' => 'fe fe-lock',
                'route' => 'member.password',
                'sequence' => 30,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-08-05 23:50:28',
            ),
            29 => 
            array (
                'id' => 386,
                'parent_id' => NULL,
                'title' => 'Logout',
                'icon' => 'fe fe-alert-circle',
                'route' => 'logout',
                'sequence' => 66,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:54:09',
                'updated_at' => '2022-08-05 23:54:09',
            ),
            30 => 
            array (
                'id' => 387,
                'parent_id' => 362,
                'title' => 'List Data',
                'icon' => NULL,
                'route' => 'admin.pendaftaran',
                'sequence' => 66,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-06 00:05:47',
                'updated_at' => '2022-08-06 00:10:07',
            ),
            31 => 
            array (
                'id' => 388,
                'parent_id' => 362,
                'title' => 'Sensus Anggota',
                'icon' => NULL,
                'route' => 'admin.pendaftaran.sensus',
                'sequence' => 67,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-06 00:06:23',
                'updated_at' => '2022-08-06 00:09:52',
            ),
        ));
        
        
    }
}