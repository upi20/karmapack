<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengurusPeriodeJabatanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('pengurus_periode_jabatan')->delete();

        \DB::table('pengurus_periode_jabatan')->insert(array(
            0 =>
            array(
                'id' => 1,
                'periode_id' => 2,
                'parent_id' => NULL,
                'no_urut' => 4,
                'nama' => 'Komunikasi dan Informasi',
                'slug' => '2021-2022-komunikasi-dan-informasi',
                'foto' => '2021-12-04_09-58-12_karmapack_image_Kominfo.png',
                'visi' => 'visi',
                'misi' => 'misi',
                'slogan' => 'Hebat',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array(
                'id' => 3,
                'periode_id' => 2,
                'parent_id' => NULL,
                'no_urut' => 1,
                'nama' => 'Ketua Umum',
                'slug' => '2021-2022-ketua-umum',
                'foto' => '2021-12-06_11-03-40_karmapack_image_Ketua_Umum.png',
                'visi' => 'visi',
                'misi' => 'misi',
                'slogan' => 'Hebat',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array(
                'id' => 7,
                'periode_id' => 2,
                'parent_id' => 1,
                'no_urut' => 3,
                'nama' => 'Anggota',
                'slug' => '2021-2022-komunikasi-dan-informasi-anggota',
                'foto' => '2021-12-04_10-23-11_karmapack_image_Anggota.png',
                'visi' => 'visi',
                'misi' => 'misi',
                'slogan' => 'Hebat',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array(
                'id' => 8,
                'periode_id' => 2,
                'parent_id' => 1,
                'no_urut' => 1,
                'nama' => 'Ketua Bidang',
                'slug' => '2021-2022-komunikasi-dan-informasi-ketua-bidang',
                'foto' => '2021-12-04_10-23-27_karmapack_image_Ketua.png',
                'visi' => 'visi',
                'misi' => 'misi',
                'slogan' => 'Hebat',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array(
                'id' => 9,
                'periode_id' => 2,
                'parent_id' => 1,
                'no_urut' => 2,
                'nama' => 'Sekertaris bidang',
                'slug' => '2021-2022-komunikasi-dan-informasi-sekertaris-bidang',
                'foto' => '2021-12-04_10-23-52_karmapack_image_Sekertaris-bidang.png',
                'visi' => 'visi',
                'misi' => 'misi',
                'slogan' => 'Hebat',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array(
                'id' => 10,
                'periode_id' => 2,
                'parent_id' => NULL,
                'no_urut' => 5,
                'nama' => 'Wirausaha',
                'slug' => '2021-2022-wirausaha',
                'foto' => '2021-12-04_10-25-19_karmapack_image_Wira_Usaha.png',
                'visi' => 'visi',
                'misi' => 'misi',
                'slogan' => 'Hebat',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array(
                'id' => 11,
                'periode_id' => 2,
                'parent_id' => 10,
                'no_urut' => 1,
                'nama' => 'Ketua Bidang',
                'slug' => '2021-2022-wira-usaha-ketua-bidang',
                'foto' => '2021-12-04_10-25-47_karmapack_image_Ketua.png',
                'visi' => 'visi',
                'misi' => 'misi',
                'slogan' => 'Hebat',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array(
                'id' => 12,
                'periode_id' => 2,
                'parent_id' => 10,
                'no_urut' => 2,
                'nama' => 'Sekertaris bidang',
                'slug' => '2021-2022-wira-usaha-sekertaris-bidang',
                'foto' => '2021-12-04_10-26-00_karmapack_image_Sekertaris.png',
                'visi' => 'visi',
                'misi' => 'misi',
                'slogan' => 'Hebat',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array(
                'id' => 13,
                'periode_id' => 2,
                'parent_id' => 10,
                'no_urut' => 3,
                'nama' => 'Anggota',
                'slug' => '2021-2022-wira-usaha-anggota',
                'foto' => '2021-12-04_10-26-10_karmapack_image_Anggota.png',
                'visi' => 'visi',
                'misi' => 'misi',
                'slogan' => 'Hebat',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 =>
            array(
                'id' => 14,
                'periode_id' => 2,
                'parent_id' => NULL,
                'no_urut' => 6,
                'nama' => 'Nalar dan Intelektual',
                'slug' => '2021-2022-nalar-dan-intelektual',
                'foto' => '',
                'visi' => 'Visi Indonesia raya merdeka',
                'misi' => 'Misi Indonesia raya merdeka',
                'slogan' => 'Hebat Tamat',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 =>
            array(
                'id' => 15,
                'periode_id' => 2,
                'parent_id' => NULL,
                'no_urut' => 7,
                'nama' => 'Minat dan Bakat',
                'slug' => '2021-2022-minat-dan-bakat',
                'foto' => '2021-12-07_09-07-24_karmapack_image_Minat_Dan_Bakat.jpg',
                'visi' => 'Visi',
                'misi' => 'Misi',
                'slogan' => 'Slogan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 =>
            array(
                'id' => 17,
                'periode_id' => 2,
                'parent_id' => NULL,
                'no_urut' => 2,
                'nama' => 'Sekertaris Umum',
                'slug' => '2021-2022-sekertaris-umum',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '-',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 =>
            array(
                'id' => 18,
                'periode_id' => 2,
                'parent_id' => NULL,
                'no_urut' => 3,
                'nama' => 'Bendahara Umum',
                'slug' => '2021-2022-bendahara-umum',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '-',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 =>
            array(
                'id' => 19,
                'periode_id' => 2,
                'parent_id' => NULL,
                'no_urut' => 8,
                'nama' => 'Pengembangan Aparatur Organisasi',
                'slug' => '2021-2022-pengembangan-aparatur-organisasi',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 =>
            array(
                'id' => 20,
                'periode_id' => 2,
                'parent_id' => NULL,
                'no_urut' => 9,
                'nama' => 'Pengembangan Kode Etik dan Akhlakul Karimah',
                'slug' => '2021-2022-pengembangan-kode-etik-dan-akhlakul-karimah',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 =>
            array(
                'id' => 21,
                'periode_id' => 2,
                'parent_id' => NULL,
                'no_urut' => 10,
                'nama' => 'Sosial Masyarakat',
                'slug' => '2021-2022-sosial-masyarakat',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 =>
            array(
                'id' => 22,
                'periode_id' => 2,
                'parent_id' => NULL,
                'no_urut' => 11,
                'nama' => 'Keperempuanan',
                'slug' => '2021-2022-keperempuanan',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 =>
            array(
                'id' => 23,
                'periode_id' => 2,
                'parent_id' => 14,
                'no_urut' => 2,
                'nama' => 'Sekertaris bidang',
                'slug' => '2021-2022-nalar-dan-intelektual-sekertaris-bidang',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 =>
            array(
                'id' => 24,
                'periode_id' => 2,
                'parent_id' => 14,
                'no_urut' => 1,
                'nama' => 'Ketua Bidang',
                'slug' => '2021-2022-nalar-dan-intelektual-ketua-bidang',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 =>
            array(
                'id' => 25,
                'periode_id' => 2,
                'parent_id' => 14,
                'no_urut' => 3,
                'nama' => 'Anggota',
                'slug' => '2021-2022-nalar-dan-intelektual-anggota',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 =>
            array(
                'id' => 26,
                'periode_id' => 2,
                'parent_id' => 15,
                'no_urut' => 1,
                'nama' => 'Ketua Bidang',
                'slug' => '2021-2022-minat-dan-bakat-ketua-bidang',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 =>
            array(
                'id' => 27,
                'periode_id' => 2,
                'parent_id' => 15,
                'no_urut' => 2,
                'nama' => 'Sekertaris bidang',
                'slug' => '2021-2022-minat-dan-bakat-sekertaris-bidang',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 =>
            array(
                'id' => 28,
                'periode_id' => 2,
                'parent_id' => 15,
                'no_urut' => 3,
                'nama' => 'Anggota',
                'slug' => '2021-2022-minat-dan-bakat-anggota',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 =>
            array(
                'id' => 29,
                'periode_id' => 2,
                'parent_id' => 19,
                'no_urut' => 1,
                'nama' => 'Ketua Bidang',
                'slug' => '2021-2022-pengembangan-aparatur-organisasi-ketua-bidang',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 =>
            array(
                'id' => 30,
                'periode_id' => 2,
                'parent_id' => 19,
                'no_urut' => 2,
                'nama' => 'Sekertaris bidang',
                'slug' => '2021-2022-pengembangan-aparatur-organisasi-sekertaris-bidang',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 =>
            array(
                'id' => 31,
                'periode_id' => 2,
                'parent_id' => 19,
                'no_urut' => 3,
                'nama' => 'Anggota',
                'slug' => '2021-2022-pengembangan-aparatur-organisasi-anggota',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 =>
            array(
                'id' => 32,
                'periode_id' => 2,
                'parent_id' => 20,
                'no_urut' => 1,
                'nama' => 'Ketua Bidang',
                'slug' => '2021-2022-pengembangan-kode-etik-dan-akhlakul-karimah-ketua-bidang',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 =>
            array(
                'id' => 33,
                'periode_id' => 2,
                'parent_id' => 20,
                'no_urut' => 2,
                'nama' => 'Sekertaris bidang',
                'slug' => '2021-2022-pengembangan-kode-etik-dan-akhlakul-karimah-sekertaris-bidang',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 =>
            array(
                'id' => 34,
                'periode_id' => 2,
                'parent_id' => 20,
                'no_urut' => 3,
                'nama' => 'Anggota',
                'slug' => '2021-2022-pengembangan-kode-etik-dan-akhlakul-karimah-anggota',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 =>
            array(
                'id' => 35,
                'periode_id' => 2,
                'parent_id' => 21,
                'no_urut' => 1,
                'nama' => 'Ketua Bidang',
                'slug' => '2021-2022-sosial-masyarakat-ketua-bidang',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 =>
            array(
                'id' => 36,
                'periode_id' => 2,
                'parent_id' => 21,
                'no_urut' => 2,
                'nama' => 'Sekertaris bidang',
                'slug' => '2021-2022-sosial-masyarakat-sekertaris-bidang',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 =>
            array(
                'id' => 37,
                'periode_id' => 2,
                'parent_id' => 21,
                'no_urut' => 3,
                'nama' => 'Anggota',
                'slug' => '2021-2022-sosial-masyarakat-anggota',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 =>
            array(
                'id' => 38,
                'periode_id' => 2,
                'parent_id' => 22,
                'no_urut' => 1,
                'nama' => 'Ketua Bidang',
                'slug' => '2021-2022-keperempuanan-ketua-bidang',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 =>
            array(
                'id' => 39,
                'periode_id' => 2,
                'parent_id' => 22,
                'no_urut' => 2,
                'nama' => 'Sekertaris bidang',
                'slug' => '2021-2022-keperempuanan-sekertaris-bidang',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 =>
            array(
                'id' => 40,
                'periode_id' => 2,
                'parent_id' => 22,
                'no_urut' => 3,
                'nama' => 'Anggota',
                'slug' => '2021-2022-keperempuanan-anggota',
                'foto' => '',
                'visi' => '',
                'misi' => '',
                'slogan' => '',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
