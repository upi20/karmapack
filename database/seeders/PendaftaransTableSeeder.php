<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PendaftaransTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('pendaftarans')->delete();

        \DB::table('pendaftarans')->insert(array(
            0 =>
            array(
                'id' => '3',
                'nama' => 'Sensus Anggota',
                'deskripsi' => 'Sensus anggota bertujuan untuk mendokumentasikan data anggota dan untuk mempermudah komunikasi pengurus terhadap anggota yang masih menjabat maupun alumni.',
                'pengumuman' => 'Sensus anggota sedang dilakukan, untuk semua anggota karmapack yang belum tercatat pada Aplikasi Sistem Informasi Anggota. diharapkan untuk mengisi sensus disini(link)',
                'no_urut' => '1',
                'dari' => '2022-05-01',
                'sampai' => '2022-06-01',
                'route' => 'pendaftaran.sensus',
                'foto' => '20220502202741.png',
                'status' => '1',
                'created_at' => '2022-05-02 20:02:52',
                'updated_at' => '2022-05-02 22:17:08',
            ),
        ));
    }
}
