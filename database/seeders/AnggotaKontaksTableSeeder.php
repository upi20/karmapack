<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnggotaKontaksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('anggota_kontaks')->delete();
        
        \DB::table('anggota_kontaks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'jenis_id' => 1,
                'anggota_id' => 1,
                'nilai' => 'https://facebook.com/iseplutpinur7/',
                'created_at' => '2023-02-11 00:40:11',
                'updated_at' => '2023-02-11 00:40:11',
            ),
            1 => 
            array (
                'id' => 2,
                'jenis_id' => 5,
                'anggota_id' => 1,
                'nilai' => 'https://www.instagram.com/iseplutpinur/',
                'created_at' => '2023-02-11 00:40:11',
                'updated_at' => '2023-02-11 00:40:11',
            ),
            2 => 
            array (
                'id' => 3,
                'jenis_id' => 5,
                'anggota_id' => 3,
                'nilai' => '@hasnhaaa_nita',
                'created_at' => '2023-02-11 00:40:11',
                'updated_at' => '2023-02-11 00:40:11',
            ),
            3 => 
            array (
                'id' => 4,
                'jenis_id' => 1,
                'anggota_id' => 6,
                'nilai' => 'https://m.facebook.com/profile.php',
                'created_at' => '2023-02-11 00:40:11',
                'updated_at' => '2023-02-11 00:40:11',
            ),
            4 => 
            array (
                'id' => 5,
                'jenis_id' => 1,
                'anggota_id' => 30,
                'nilai' => 'https://www.facebook.com/profile.php?id=100080648587270',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            5 => 
            array (
                'id' => 6,
                'jenis_id' => 5,
                'anggota_id' => 30,
                'nilai' => '@ncepkazama27',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            6 => 
            array (
                'id' => 7,
                'jenis_id' => 3,
                'anggota_id' => 30,
                'nilai' => '085524947588',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            7 => 
            array (
                'id' => 8,
                'jenis_id' => 5,
                'anggota_id' => 33,
                'nilai' => 'agustianisr',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            8 => 
            array (
                'id' => 9,
                'jenis_id' => 5,
                'anggota_id' => 39,
                'nilai' => 'Nu\'man Basir',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            9 => 
            array (
                'id' => 10,
                'jenis_id' => 5,
                'anggota_id' => 54,
                'nilai' => 'Deriis19',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            10 => 
            array (
                'id' => 11,
                'jenis_id' => 5,
                'anggota_id' => 56,
                'nilai' => '@sptiaran11',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            11 => 
            array (
                'id' => 12,
                'jenis_id' => 5,
                'anggota_id' => 57,
                'nilai' => 'snurjamilaa02',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            12 => 
            array (
                'id' => 13,
                'jenis_id' => 5,
                'anggota_id' => 65,
                'nilai' => 'indraskmra',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            13 => 
            array (
                'id' => 14,
                'jenis_id' => 5,
                'anggota_id' => 66,
                'nilai' => 'Muhamadraihanrahman_23',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            14 => 
            array (
                'id' => 15,
                'jenis_id' => 5,
                'anggota_id' => 68,
                'nilai' => '@alvirdadmyti521_',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            15 => 
            array (
                'id' => 16,
                'jenis_id' => 1,
                'anggota_id' => 68,
                'nilai' => 'Alvirda Damayanti A',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            16 => 
            array (
                'id' => 17,
                'jenis_id' => 3,
                'anggota_id' => 68,
                'nilai' => '085861610741',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            17 => 
            array (
                'id' => 18,
                'jenis_id' => 1,
                'anggota_id' => 69,
                'nilai' => 'https://www.facebook.com/profile.php?id=100016292327014',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            18 => 
            array (
                'id' => 19,
                'jenis_id' => 5,
                'anggota_id' => 69,
                'nilai' => 'https://instagram.com/_silviaanggraeni_?igshid=YmMyMTA2M2Y=',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            19 => 
            array (
                'id' => 20,
                'jenis_id' => 2,
                'anggota_id' => 69,
                'nilai' => 'https://twitter.com/iainisisill?t=-V61OTpJhhkqo_qcE3dOvQ&s=09',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            20 => 
            array (
                'id' => 21,
                'jenis_id' => 1,
                'anggota_id' => 70,
                'nilai' => 'https://www.facebook.com/ai.yeti.3194',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            21 => 
            array (
                'id' => 22,
                'jenis_id' => 5,
                'anggota_id' => 76,
                'nilai' => 'nasriatulhamidah',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            22 => 
            array (
                'id' => 23,
                'jenis_id' => 3,
                'anggota_id' => 77,
                'nilai' => '085861444715',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            23 => 
            array (
                'id' => 24,
                'jenis_id' => 4,
                'anggota_id' => 79,
                'nilai' => 'Ahmad Dimyati Ridwan',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            24 => 
            array (
                'id' => 25,
                'jenis_id' => 1,
                'anggota_id' => 79,
                'nilai' => 'Ahmad Dimyati Ridwan',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            25 => 
            array (
                'id' => 26,
                'jenis_id' => 2,
                'anggota_id' => 79,
                'nilai' => 'Ahmad Dimyati Ridwan',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            26 => 
            array (
                'id' => 27,
                'jenis_id' => 3,
                'anggota_id' => 79,
                'nilai' => 'Ahmad Dimyati Ridwan',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            27 => 
            array (
                'id' => 28,
                'jenis_id' => 5,
                'anggota_id' => 79,
                'nilai' => 'ahmaddimyatiridwan16',
                'created_at' => '2023-02-11 00:40:12',
                'updated_at' => '2023-02-11 00:40:12',
            ),
            28 => 
            array (
                'id' => 29,
                'jenis_id' => 5,
                'anggota_id' => 81,
                'nilai' => 'https://instagram.com/widiimaulidiaa_?igshid=YmMyMTA2M2Y=',
                'created_at' => '2023-02-11 00:40:13',
                'updated_at' => '2023-02-11 00:40:13',
            ),
            29 => 
            array (
                'id' => 30,
                'jenis_id' => 5,
                'anggota_id' => 85,
                'nilai' => 'http://www.instagram.com/r.aws_',
                'created_at' => '2023-02-11 00:40:13',
                'updated_at' => '2023-02-11 00:40:13',
            ),
        ));
        
        
    }
}