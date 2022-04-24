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
        
        \DB::table('galeri')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Poesaka 2021 HP',
                'foto' => '2022-02-04_06-42-23_karmapack_image_WhatsApp_Image_2022-02-02_at_10_49_38_PM.jpeg',
                'foto_id_gdrive' => '13b0CTxnvNoCnOsbNQ7ZPS6Q2z0UQv4Bu',
                'id_gdrive' => '1F1QK4DlfRtA-N4cwWqozhsC3bEXQVkYw',
                'slug' => 'poesaka-2021-hp',
                'keterangan' => 'Poesaka 2021',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Poesaka 2021 Aksi',
                'foto' => '',
                'foto_id_gdrive' => '1zBhpR4ZorbUKCegBKWL6vkaZEGyD_XSv',
                'id_gdrive' => '1E7M9y3SYGPchJZ_a405ZyslSnZjsjKmx',
                'slug' => 'poesaka-2021-aksi',
                'keterangan' => 'Poesaka 2021',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Poesaka 2021 Alumni',
                'foto' => '',
                'foto_id_gdrive' => '1Z_OidR5bx3dKsURlPMjfEMVt2QjiKZPE',
                'id_gdrive' => '1Nec7rpkeyDDIrK87LBXOGX3HEo1QaUVS',
                'slug' => 'poesaka-2021-alumni',
                'keterangan' => 'Poesaka 2021',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Poesaka 2021 Bersama',
                'foto' => '',
                'foto_id_gdrive' => '1WO_AvcDgcgX10AC9DRmoNVDYQY_jizAx',
                'id_gdrive' => '1XTem6ZsdzI3UFePcaC-4aOq0jEQJLrKH',
                'slug' => 'poesaka-2021-bersama',
                'keterangan' => 'Poesaka 2021',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'Poesaka 2021 Panitia',
                'foto' => '',
                'foto_id_gdrive' => '1aqr3bC8tIm1UFDZNAkteenY_mY8EUsJF',
                'id_gdrive' => '1v69PHNkZL7MnjYrzZKd6TdD6uqLwYN7h',
                'slug' => 'poesaka-2021-panitia',
                'keterangan' => 'Poesaka 2021',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'nama' => 'Poesaka 2021 Pemateri',
                'foto' => '',
                'foto_id_gdrive' => '1raNNMwl5v2StH3q75zNjpMUh8Gj1GyMa',
                'id_gdrive' => '1BiAWI0EEO5fzqGJ7aVhGWBGPXNNlZnS2',
                'slug' => 'poesaka-2021-pemateri',
                'keterangan' => 'Poesaka 2021',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'nama' => 'Poesaka 2021 Peserta',
                'foto' => '',
                'foto_id_gdrive' => '1a6wl413xLxQ7Qsm6Jwp-LPdoTZr-FBLX',
                'id_gdrive' => '1iU_QYfDJm-t8yFXN4sehVBAJu5l6un6W',
                'slug' => 'poesaka-2021-peserta',
                'keterangan' => 'Poesaka 2021',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}