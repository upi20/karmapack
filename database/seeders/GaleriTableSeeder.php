<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GaleriTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('galeri')->delete();

        \DB::table('galeri')->insert(array(
            0 =>
            array(
                'id' => 1,
                'nama' => 'Poesaka 2021 HP',
                'foto' => '2022-02-04_06-42-23_karmapack_image_WhatsApp_Image_2022-02-02_at_10_49_38_PM.jpeg',
                'foto_id_gdrive' => '13b0CTxnvNoCnOsbNQ7ZPS6Q2z0UQv4Bu',
                'slug' => 'poesaka-2021-hp',
                'id_gdrive' => '1F1QK4DlfRtA-N4cwWqozhsC3bEXQVkYw',
                'keterangan' => 'Poesaka 2021',
                'status' => 1,
            ),
            1 =>
            array(
                'id' => 2,
                'nama' => 'Poesaka 2021 Aksi',
                'foto' => '',
                'foto_id_gdrive' => '1zBhpR4ZorbUKCegBKWL6vkaZEGyD_XSv',
                'slug' => 'poesaka-2021-aksi',
                'id_gdrive' => '1E7M9y3SYGPchJZ_a405ZyslSnZjsjKmx',
                'keterangan' => 'Poesaka 2021',
                'status' => 1,
            ),
            2 =>
            array(
                'id' => 3,
                'nama' => 'Poesaka 2021 Alumni',
                'foto' => '',
                'foto_id_gdrive' => '1Z_OidR5bx3dKsURlPMjfEMVt2QjiKZPE',
                'slug' => 'poesaka-2021-alumni',
                'id_gdrive' => '1Nec7rpkeyDDIrK87LBXOGX3HEo1QaUVS',
                'keterangan' => 'Poesaka 2021',
                'status' => 1,
            ),
            3 =>
            array(
                'id' => 4,
                'nama' => 'Poesaka 2021 Bersama',
                'foto' => '',
                'foto_id_gdrive' => '1WO_AvcDgcgX10AC9DRmoNVDYQY_jizAx',
                'slug' => 'poesaka-2021-bersama',
                'id_gdrive' => '1XTem6ZsdzI3UFePcaC-4aOq0jEQJLrKH',
                'keterangan' => 'Poesaka 2021',
                'status' => 1,
            ),
            4 =>
            array(
                'id' => 5,
                'nama' => 'Poesaka 2021 Panitia',
                'foto' => '',
                'foto_id_gdrive' => '1aqr3bC8tIm1UFDZNAkteenY_mY8EUsJF',
                'slug' => 'poesaka-2021-panitia',
                'id_gdrive' => '1v69PHNkZL7MnjYrzZKd6TdD6uqLwYN7h',
                'keterangan' => 'Poesaka 2021',
                'status' => 1,
            ),
            5 =>
            array(
                'id' => 6,
                'nama' => 'Poesaka 2021 Pemateri',
                'foto' => '',
                'foto_id_gdrive' => '1raNNMwl5v2StH3q75zNjpMUh8Gj1GyMa',
                'slug' => 'poesaka-2021-pemateri',
                'id_gdrive' => '1BiAWI0EEO5fzqGJ7aVhGWBGPXNNlZnS2',
                'keterangan' => 'Poesaka 2021',
                'status' => 1,
            ),
            6 =>
            array(
                'id' => 7,
                'nama' => 'Poesaka 2021 Peserta',
                'foto' => '',
                'foto_id_gdrive' => '1a6wl413xLxQ7Qsm6Jwp-LPdoTZr-FBLX',
                'slug' => 'poesaka-2021-peserta',
                'id_gdrive' => '1iU_QYfDJm-t8yFXN4sehVBAJu5l6un6W',
                'keterangan' => 'Poesaka 2021',
                'status' => 1,
            ),
        ));
    }
}
