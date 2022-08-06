<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('p_permissions')->delete();
        
        \DB::table('p_permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin.dashboard',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin.user',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'admin.user.excel',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'admin.user.store',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'admin.user.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'admin.user.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'admin.address.province',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'admin.address.province.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'admin.address.province.store',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'admin.address.province.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'admin.address.province.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'admin.address.regencie',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'admin.address.regencie.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'admin.address.regencie.store',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'admin.address.regencie.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'admin.address.regencie.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'admin.address.district',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'admin.address.district.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'admin.address.district.store',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'admin.address.district.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'admin.address.district.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'admin.address.village',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'admin.address.village.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'admin.address.village.store',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'admin.address.village.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'admin.address.village.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'admin.artikel.data',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'admin.artikel.data.add',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'admin.artikel.data.edit',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'admin.artikel.data.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'admin.artikel.data.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'admin.artikel.data.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'admin.artikel.kategori',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'admin.artikel.kategori.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'admin.artikel.kategori.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'admin.artikel.kategori.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'admin.artikel.kategori.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'admin.artikel.tag',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'admin.artikel.tag.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'admin.artikel.tag.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'admin.artikel.tag.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'admin.artikel.tag.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'admin.pengurus.periode',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'admin.pengurus.periode.add',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'admin.pengurus.periode.edit',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'admin.pengurus.periode.active',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'admin.pengurus.periode.member',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'admin.pengurus.periode.detail',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'admin.pengurus.periode.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'admin.pengurus.periode.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'admin.pengurus.periode.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'admin.pengurus.jabatan.parent',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'admin.pengurus.jabatan.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'admin.pengurus.jabatan.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'admin.pengurus.jabatan',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'admin.pengurus.jabatan.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'admin.pengurus.jabatan.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'admin.pengurus.jabatan.member.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'admin.pengurus.jabatan.member',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'admin.pengurus.jabatan.member.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'admin.galeri',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'admin.galeri.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'admin.galeri.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'admin.galeri.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'admin.galeri.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'admin.social_media',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'admin.social_media.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'admin.social_media.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'admin.social_media.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'admin.contact',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'admin.contact.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'admin.contact.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'admin.contact.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'admin.footer_instagram',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'admin.footer_instagram.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'admin.footer_instagram.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'admin.footer_instagram.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'admin.profile.pendidikan_jenis',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'admin.profile.pendidikan_jenis.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'admin.profile.pendidikan_jenis.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'admin.profile.pendidikan_jenis.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'admin.profile.kontak_tipe',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'admin.profile.kontak_tipe.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'admin.profile.kontak_tipe.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'admin.profile.kontak_tipe.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'admin.username_validation',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'admin.username_validation.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'admin.username_validation.save',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'admin.pendaftaran',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'admin.pendaftaran.get_one',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'admin.pendaftaran.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'admin.pendaftaran.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'admin.pendaftaran.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'admin.pendaftaran.sensus',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'admin.pendaftaran.sensus.excel',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'admin.pendaftaran.sensus.status',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'admin.user_access.permission',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'admin.user_access.permission.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'admin.user_access.permission.store',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'admin.user_access.permission.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'admin.user_access.permission.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'admin.user_access.role',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'admin.user_access.role.create',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'admin.user_access.role.edit',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'admin.user_access.role.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'admin.user_access.role.store',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'admin.user_access.role.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'admin.user_access.role.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'member.dashboard',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'member.profile',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'member.profile.save_basic',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'member.profile.save_address',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'member.profile.save_detail',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'member.profile.kontak',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'member.profile.kontak_insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'member.profile.kontak_update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'member.profile.kontak_delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'member.profile.hobby_select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'member.profile.hobby_save',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'member.profile.profesi_select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'member.profile.pendidikan',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'member.profile.pendidikan_select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'member.profile.pendidikan_insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'member.profile.pendidikan_update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'member.profile.pendidikan_delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'member.profile.pengalaman_organisasi',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'member.profile.pengalaman_organisasi_select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:45',
                'updated_at' => '2022-08-04 16:05:45',
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'member.profile.pengalaman_organisasi_insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:45',
                'updated_at' => '2022-08-04 16:05:45',
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'member.profile.pengalaman_organisasi_update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:45',
                'updated_at' => '2022-08-04 16:05:45',
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'member.profile.pengalaman_organisasi_delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:45',
                'updated_at' => '2022-08-04 16:05:45',
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'member.profile.pengalaman_lain',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:45',
                'updated_at' => '2022-08-04 16:05:45',
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'member.profile.pengalaman_lain_insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:45',
                'updated_at' => '2022-08-04 16:05:45',
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'member.profile.pengalaman_lain_update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:45',
                'updated_at' => '2022-08-04 16:05:45',
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'member.profile.pengalaman_lain_delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:45',
                'updated_at' => '2022-08-04 16:05:45',
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'member.password',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:45',
                'updated_at' => '2022-08-04 16:05:45',
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'member.password.save',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:45',
                'updated_at' => '2022-08-04 16:05:45',
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'admin.menu',
                'guard_name' => 'web',
                'created_at' => '2022-08-05 00:27:17',
                'updated_at' => '2022-08-05 00:27:17',
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'admin.menu.list',
                'guard_name' => 'web',
                'created_at' => '2022-08-05 16:41:21',
                'updated_at' => '2022-08-05 16:41:21',
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'admin.menu.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-05 19:03:54',
                'updated_at' => '2022-08-05 19:03:54',
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'admin.menu.save',
                'guard_name' => 'web',
                'created_at' => '2022-08-05 21:03:40',
                'updated_at' => '2022-08-05 21:03:40',
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'admin.menu.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-05 21:03:46',
                'updated_at' => '2022-08-05 21:03:46',
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'admin.menu.find',
                'guard_name' => 'web',
                'created_at' => '2022-08-05 22:20:51',
                'updated_at' => '2022-08-05 22:20:51',
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'admin.menu.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-05 23:07:03',
                'updated_at' => '2022-08-05 23:07:03',
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'admin.user.find',
                'guard_name' => 'web',
                'created_at' => '2022-08-06 00:50:25',
                'updated_at' => '2022-08-06 00:50:25',
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'admin.profile.save_another',
                'guard_name' => 'web',
                'created_at' => '2022-08-06 14:48:58',
                'updated_at' => '2022-08-06 14:48:58',
            ),
        ));
        
        
    }
}