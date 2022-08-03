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
                'name' => 'user',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user.excel',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'user.store',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'user.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'user.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'address.province',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'address.province.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'address.province.store',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'address.province.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'address.province.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'address.regencie',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'address.regencie.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'address.regencie.store',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'address.regencie.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'address.regencie.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'address.district',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'address.district.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'address.district.store',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'address.district.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'address.district.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'address.village',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'address.village.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'address.village.store',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'address.village.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'address.village.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'artikel.data',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'artikel.data.add',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'artikel.data.edit',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'artikel.data.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'artikel.data.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'artikel.data.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'artikel.kategori',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'artikel.kategori.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'artikel.kategori.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'artikel.kategori.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'artikel.kategori.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'artikel.tag',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'artikel.tag.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'artikel.tag.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'artikel.tag.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'artikel.tag.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'pengurus.periode',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'pengurus.periode.add',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'pengurus.periode.edit',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'pengurus.periode.active',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'pengurus.periode.member',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'pengurus.periode.detail',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'pengurus.periode.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'pengurus.periode.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'pengurus.periode.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'pengurus.jabatan.parent',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'pengurus.jabatan.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'pengurus.jabatan.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'pengurus.jabatan',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'pengurus.jabatan.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'pengurus.jabatan.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'pengurus.jabatan.member.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'pengurus.jabatan.member',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'pengurus.jabatan.member.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'galeri',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'galeri.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'galeri.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'galeri.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'galeri.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'social_media',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'social_media.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'social_media.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'social_media.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'contact',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'contact.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'contact.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'contact.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'footer_instagram',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'footer_instagram.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'footer_instagram.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'footer_instagram.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'profile.pendidikan_jenis',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'profile.pendidikan_jenis.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'profile.pendidikan_jenis.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'profile.pendidikan_jenis.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'profile.kontak_tipe',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'profile.kontak_tipe.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'profile.kontak_tipe.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'profile.kontak_tipe.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'username_validation',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'username_validation.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'username_validation.save',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'pendaftaran',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'pendaftaran.get_one',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'pendaftaran.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'pendaftaran.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'pendaftaran.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'pendaftaran.sensus',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'pendaftaran.sensus.excel',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'pendaftaran.sensus.status',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:31',
                'updated_at' => '2022-08-04 04:07:31',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'dashboard',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'profile',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'profile.save_basic',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'profile.save_address',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'profile.save_detail',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'profile.kontak',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'profile.kontak_insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'profile.kontak_update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'profile.kontak_delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'profile.hobby_select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'profile.hobby_save',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'profile.profesi_select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'profile.pendidikan',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'profile.pendidikan_select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'profile.pendidikan_insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'profile.pendidikan_update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'profile.pendidikan_delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'profile.pengalaman_organisasi',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'profile.pengalaman_organisasi_select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'profile.pengalaman_organisasi_insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'profile.pengalaman_organisasi_update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'profile.pengalaman_organisasi_delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'profile.pengalaman_lain',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'profile.pengalaman_lain_insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'profile.pengalaman_lain_update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'profile.pengalaman_lain_delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'password',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'password.save',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:32',
                'updated_at' => '2022-08-04 04:07:32',
            ),
        ));
        
        
    }
}