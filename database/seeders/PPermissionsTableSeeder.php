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
                'id' => '1',
                'name' => 'admin.dashboard',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'admin.user',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'admin.user.excel',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'admin.user.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-06 16:14:59',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'admin.user.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'admin.user.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            6 => 
            array (
                'id' => '7',
                'name' => 'admin.address.province',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            7 => 
            array (
                'id' => '9',
                'name' => 'admin.address.province.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-06 23:52:49',
            ),
            8 => 
            array (
                'id' => '10',
                'name' => 'admin.address.province.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            9 => 
            array (
                'id' => '11',
                'name' => 'admin.address.province.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            10 => 
            array (
                'id' => '12',
                'name' => 'admin.address.regencie',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            11 => 
            array (
                'id' => '14',
                'name' => 'admin.address.regencie.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-06 23:53:26',
            ),
            12 => 
            array (
                'id' => '15',
                'name' => 'admin.address.regencie.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            13 => 
            array (
                'id' => '16',
                'name' => 'admin.address.regencie.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            14 => 
            array (
                'id' => '17',
                'name' => 'admin.address.district',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            15 => 
            array (
                'id' => '19',
                'name' => 'admin.address.district.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-06 23:53:54',
            ),
            16 => 
            array (
                'id' => '20',
                'name' => 'admin.address.district.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-06 23:53:49',
            ),
            17 => 
            array (
                'id' => '21',
                'name' => 'admin.address.district.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            18 => 
            array (
                'id' => '22',
                'name' => 'admin.address.village',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            19 => 
            array (
                'id' => '24',
                'name' => 'admin.address.village.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-06 23:54:04',
            ),
            20 => 
            array (
                'id' => '25',
                'name' => 'admin.address.village.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            21 => 
            array (
                'id' => '26',
                'name' => 'admin.address.village.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            22 => 
            array (
                'id' => '27',
                'name' => 'admin.artikel.data',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            23 => 
            array (
                'id' => '30',
                'name' => 'admin.artikel.data.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            24 => 
            array (
                'id' => '31',
                'name' => 'admin.artikel.data.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            25 => 
            array (
                'id' => '32',
                'name' => 'admin.artikel.data.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            26 => 
            array (
                'id' => '33',
                'name' => 'admin.artikel.kategori',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            27 => 
            array (
                'id' => '35',
                'name' => 'admin.artikel.kategori.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            28 => 
            array (
                'id' => '36',
                'name' => 'admin.artikel.kategori.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            29 => 
            array (
                'id' => '37',
                'name' => 'admin.artikel.kategori.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            30 => 
            array (
                'id' => '38',
                'name' => 'admin.artikel.tag',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            31 => 
            array (
                'id' => '40',
                'name' => 'admin.artikel.tag.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            32 => 
            array (
                'id' => '41',
                'name' => 'admin.artikel.tag.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            33 => 
            array (
                'id' => '42',
                'name' => 'admin.artikel.tag.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            34 => 
            array (
                'id' => '43',
                'name' => 'admin.pengurus.periode',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            35 => 
            array (
                'id' => '46',
                'name' => 'admin.pengurus.periode.active',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            36 => 
            array (
                'id' => '47',
                'name' => 'admin.pengurus.periode.member',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            37 => 
            array (
                'id' => '48',
                'name' => 'admin.pengurus.periode.detail',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            38 => 
            array (
                'id' => '49',
                'name' => 'admin.pengurus.periode.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            39 => 
            array (
                'id' => '50',
                'name' => 'admin.pengurus.periode.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            40 => 
            array (
                'id' => '51',
                'name' => 'admin.pengurus.periode.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            41 => 
            array (
                'id' => '54',
                'name' => 'admin.pengurus.jabatan.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            42 => 
            array (
                'id' => '55',
                'name' => 'admin.pengurus.jabatan',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            43 => 
            array (
                'id' => '56',
                'name' => 'admin.pengurus.jabatan.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            44 => 
            array (
                'id' => '57',
                'name' => 'admin.pengurus.jabatan.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            45 => 
            array (
                'id' => '59',
                'name' => 'admin.pengurus.jabatan.member',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:42',
                'updated_at' => '2022-08-04 16:05:42',
            ),
            46 => 
            array (
                'id' => '60',
                'name' => 'admin.pengurus.jabatan.member.save',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-06 21:31:08',
            ),
            47 => 
            array (
                'id' => '61',
                'name' => 'admin.galeri',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            48 => 
            array (
                'id' => '63',
                'name' => 'admin.galeri.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            49 => 
            array (
                'id' => '64',
                'name' => 'admin.galeri.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            50 => 
            array (
                'id' => '65',
                'name' => 'admin.galeri.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            51 => 
            array (
                'id' => '66',
                'name' => 'admin.social_media',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            52 => 
            array (
                'id' => '67',
                'name' => 'admin.social_media.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            53 => 
            array (
                'id' => '68',
                'name' => 'admin.social_media.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            54 => 
            array (
                'id' => '69',
                'name' => 'admin.social_media.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            55 => 
            array (
                'id' => '70',
                'name' => 'admin.contact',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            56 => 
            array (
                'id' => '71',
                'name' => 'admin.contact.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            57 => 
            array (
                'id' => '72',
                'name' => 'admin.contact.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            58 => 
            array (
                'id' => '73',
                'name' => 'admin.contact.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            59 => 
            array (
                'id' => '74',
                'name' => 'admin.footer_instagram',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            60 => 
            array (
                'id' => '75',
                'name' => 'admin.footer_instagram.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            61 => 
            array (
                'id' => '76',
                'name' => 'admin.footer_instagram.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            62 => 
            array (
                'id' => '77',
                'name' => 'admin.footer_instagram.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            63 => 
            array (
                'id' => '78',
                'name' => 'admin.profile.pendidikan_jenis',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            64 => 
            array (
                'id' => '79',
                'name' => 'admin.profile.pendidikan_jenis.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            65 => 
            array (
                'id' => '80',
                'name' => 'admin.profile.pendidikan_jenis.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            66 => 
            array (
                'id' => '81',
                'name' => 'admin.profile.pendidikan_jenis.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            67 => 
            array (
                'id' => '82',
                'name' => 'admin.profile.kontak_tipe',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            68 => 
            array (
                'id' => '83',
                'name' => 'admin.profile.kontak_tipe.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            69 => 
            array (
                'id' => '84',
                'name' => 'admin.profile.kontak_tipe.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            70 => 
            array (
                'id' => '85',
                'name' => 'admin.profile.kontak_tipe.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            71 => 
            array (
                'id' => '86',
                'name' => 'admin.username_validation',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            72 => 
            array (
                'id' => '87',
                'name' => 'admin.username_validation.select2',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            73 => 
            array (
                'id' => '88',
                'name' => 'admin.username_validation.save',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            74 => 
            array (
                'id' => '89',
                'name' => 'admin.pendaftaran',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            75 => 
            array (
                'id' => '90',
                'name' => 'admin.pendaftaran.get_one',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            76 => 
            array (
                'id' => '91',
                'name' => 'admin.pendaftaran.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            77 => 
            array (
                'id' => '92',
                'name' => 'admin.pendaftaran.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            78 => 
            array (
                'id' => '93',
                'name' => 'admin.pendaftaran.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            79 => 
            array (
                'id' => '94',
                'name' => 'admin.pendaftaran.sensus',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            80 => 
            array (
                'id' => '95',
                'name' => 'admin.pendaftaran.sensus.excel',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:43',
                'updated_at' => '2022-08-04 16:05:43',
            ),
            81 => 
            array (
                'id' => '96',
                'name' => 'admin.pendaftaran.sensus.status',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            82 => 
            array (
                'id' => '97',
                'name' => 'admin.user_access.permission',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            83 => 
            array (
                'id' => '99',
                'name' => 'admin.user_access.permission.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-07 15:43:41',
            ),
            84 => 
            array (
                'id' => '100',
                'name' => 'admin.user_access.permission.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            85 => 
            array (
                'id' => '101',
                'name' => 'admin.user_access.permission.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            86 => 
            array (
                'id' => '102',
                'name' => 'admin.user_access.role',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            87 => 
            array (
                'id' => '103',
                'name' => 'admin.user_access.role.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-07 15:37:35',
            ),
            88 => 
            array (
                'id' => '107',
                'name' => 'admin.user_access.role.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            89 => 
            array (
                'id' => '108',
                'name' => 'admin.user_access.role.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            90 => 
            array (
                'id' => '109',
                'name' => 'member.dashboard',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            91 => 
            array (
                'id' => '110',
                'name' => 'member.profile',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:44',
                'updated_at' => '2022-08-04 16:05:44',
            ),
            92 => 
            array (
                'id' => '135',
                'name' => 'member.password',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:45',
                'updated_at' => '2022-08-04 16:05:45',
            ),
            93 => 
            array (
                'id' => '136',
                'name' => 'member.password.save',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:45',
                'updated_at' => '2022-08-04 16:05:45',
            ),
            94 => 
            array (
                'id' => '137',
                'name' => 'admin.menu.admin',
                'guard_name' => 'web',
                'created_at' => '2022-08-05 00:27:17',
                'updated_at' => '2022-08-20 14:13:15',
            ),
            95 => 
            array (
                'id' => '139',
                'name' => 'admin.menu.admin.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-05 19:03:54',
                'updated_at' => '2022-08-20 14:13:37',
            ),
            96 => 
            array (
                'id' => '140',
                'name' => 'admin.menu.admin.save',
                'guard_name' => 'web',
                'created_at' => '2022-08-05 21:03:40',
                'updated_at' => '2022-08-20 14:13:32',
            ),
            97 => 
            array (
                'id' => '141',
                'name' => 'admin.menu.admin.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-05 21:03:46',
                'updated_at' => '2022-08-20 14:13:26',
            ),
            98 => 
            array (
                'id' => '143',
                'name' => 'admin.menu.admin.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-05 23:07:03',
                'updated_at' => '2022-08-20 14:13:21',
            ),
            99 => 
            array (
                'id' => '145',
                'name' => 'admin.profile.save_another',
                'guard_name' => 'web',
                'created_at' => '2022-08-06 14:48:58',
                'updated_at' => '2022-08-06 14:48:58',
            ),
            100 => 
            array (
                'id' => '146',
                'name' => 'admin.pengurus.periode.set_role',
                'guard_name' => 'web',
                'created_at' => '2022-08-08 21:06:58',
                'updated_at' => '2022-08-08 21:06:58',
            ),
            101 => 
            array (
                'id' => '147',
                'name' => 'admin.pendaftaran.gform',
                'guard_name' => 'web',
                'created_at' => '2022-08-08 21:07:44',
                'updated_at' => '2022-08-08 21:07:44',
            ),
            102 => 
            array (
                'id' => '148',
                'name' => 'admin.pendaftaran.gform.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-08 21:08:04',
                'updated_at' => '2022-08-08 21:08:04',
            ),
            103 => 
            array (
                'id' => '149',
                'name' => 'admin.pendaftaran.gform.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-08 21:08:12',
                'updated_at' => '2022-08-08 21:08:12',
            ),
            104 => 
            array (
                'id' => '150',
                'name' => 'admin.pendaftaran.gform.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-08 21:08:18',
                'updated_at' => '2022-08-08 21:08:18',
            ),
            105 => 
            array (
                'id' => '151',
                'name' => 'admin.kata_alumni',
                'guard_name' => 'web',
                'created_at' => '2022-08-09 15:19:19',
                'updated_at' => '2022-08-09 15:19:19',
            ),
            106 => 
            array (
                'id' => '152',
                'name' => 'admin.kata_alumni.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-09 15:19:25',
                'updated_at' => '2022-08-09 15:19:25',
            ),
            107 => 
            array (
                'id' => '153',
                'name' => 'admin.kata_alumni.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-09 15:19:30',
                'updated_at' => '2022-08-09 15:19:30',
            ),
            108 => 
            array (
                'id' => '154',
                'name' => 'admin.kata_alumni.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-09 15:19:35',
                'updated_at' => '2022-08-09 15:19:35',
            ),
            109 => 
            array (
                'id' => '155',
                'name' => 'member.kata_alumni',
                'guard_name' => 'web',
                'created_at' => '2022-08-09 15:22:56',
                'updated_at' => '2022-08-09 15:22:56',
            ),
            110 => 
            array (
                'id' => '156',
                'name' => 'admin.kontak.faq',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            111 => 
            array (
                'id' => '157',
                'name' => 'admin.kontak.faq.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            112 => 
            array (
                'id' => '158',
                'name' => 'admin.kontak.faq.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            113 => 
            array (
                'id' => '159',
                'name' => 'admin.kontak.faq.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            114 => 
            array (
                'id' => '160',
                'name' => 'admin.kontak.faq.setting',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            115 => 
            array (
                'id' => '161',
                'name' => 'admin.kontak.list',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            116 => 
            array (
                'id' => '162',
                'name' => 'admin.kontak.list.insert',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            117 => 
            array (
                'id' => '163',
                'name' => 'admin.kontak.list.update',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            118 => 
            array (
                'id' => '164',
                'name' => 'admin.kontak.list.delete',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            119 => 
            array (
                'id' => '165',
                'name' => 'admin.kontak.list.setting',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            120 => 
            array (
                'id' => '166',
                'name' => 'admin.kontak.message',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            121 => 
            array (
                'id' => '167',
                'name' => 'admin.kontak.message.setting',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-04 16:05:41',
            ),
            122 => 
            array (
                'id' => '168',
                'name' => 'debugbar.openhandler',
                'guard_name' => 'web',
                'created_at' => '2022-09-01 18:19:49',
                'updated_at' => '2022-09-01 18:19:49',
            ),
            123 => 
            array (
                'id' => '169',
                'name' => 'admin.instagram',
                'guard_name' => 'web',
                'created_at' => '2022-09-01 18:27:59',
                'updated_at' => '2022-09-01 18:27:59',
            ),
            124 => 
            array (
                'id' => '170',
                'name' => 'admin.menu.frontend',
                'guard_name' => 'web',
                'created_at' => '2022-09-01 18:46:05',
                'updated_at' => '2022-09-01 18:46:05',
            ),
            125 => 
            array (
                'id' => '171',
                'name' => 'admin.anggota',
                'guard_name' => 'web',
                'created_at' => '2023-02-18 00:24:06',
                'updated_at' => '2023-02-18 00:24:06',
            ),
            126 => 
            array (
                'id' => '172',
                'name' => 'admin.kepengurusan.periode',
                'guard_name' => 'web',
                'created_at' => '2023-02-18 21:46:15',
                'updated_at' => '2023-02-18 21:46:15',
            ),
            127 => 
            array (
                'id' => '173',
                'name' => 'admin.setting.sejarah',
                'guard_name' => 'web',
                'created_at' => '2023-02-19 16:41:50',
                'updated_at' => '2023-02-19 16:41:50',
            ),
            128 => 
            array (
                'id' => '174',
                'name' => 'admin.setting.front',
                'guard_name' => 'web',
                'created_at' => '2023-02-19 22:19:56',
                'updated_at' => '2023-02-19 22:19:56',
            ),
            129 => 
            array (
                'id' => '175',
                'name' => 'admin.setting.home',
                'guard_name' => 'web',
                'created_at' => '2023-02-19 22:20:12',
                'updated_at' => '2023-02-19 22:20:12',
            ),
            130 => 
            array (
                'id' => '176',
                'name' => 'admin.setting.admin',
                'guard_name' => 'web',
                'created_at' => '2023-02-19 22:20:30',
                'updated_at' => '2023-02-19 22:20:30',
            ),
            131 => 
            array (
                'id' => '177',
                'name' => 'admin.kepengurusan.periode.detail',
                'guard_name' => 'web',
                'created_at' => '2023-03-08 13:04:42',
                'updated_at' => '2023-03-08 13:04:42',
            ),
            132 => 
            array (
                'id' => '178',
                'name' => 'admin.utility.hari_besar_nasional',
                'guard_name' => 'web',
                'created_at' => '2023-03-08 14:03:27',
                'updated_at' => '2023-03-08 14:03:27',
            ),
            133 => 
            array (
                'id' => '179',
                'name' => 'admin.password.save',
                'guard_name' => 'web',
                'created_at' => '2023-10-31 15:44:14',
                'updated_at' => '2023-10-31 15:44:14',
            ),
        ));
        
        
    }
}