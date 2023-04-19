<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HomeProgramPembelajaranTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('home_program_pembelajaran')->delete();
        
        \DB::table('home_program_pembelajaran')->insert(array (
            0 => 
            array (
                'id' => 5,
                'nama' => 'Tahfizh Quran',
                'foto' => '20230326130805.png',
                'keterangan' => 'Menghafal al-Quran dan Belajar Tahsin',
                'urutan' => 1,
                'created_at' => '2023-03-26 13:08:05',
                'updated_at' => '2023-03-27 16:59:19',
            ),
            1 => 
            array (
                'id' => 6,
                'nama' => 'Belajar Fiqh',
                'foto' => '20230326130825.png',
                'keterangan' => 'Mempelajari aturan-aturan dan hukum-hukum Islam, baik yang terkait dengan ibadah maupun yang lain.',
                'urutan' => 2,
                'created_at' => '2023-03-26 13:08:25',
                'updated_at' => '2023-03-26 13:08:25',
            ),
            2 => 
            array (
                'id' => 7,
                'nama' => 'Belajar Aqidah',
                'foto' => '20230326130847.png',
                'keterangan' => 'Mempelajari tentang kepercayaan dan keyakinan dalam agama Islam,seperti kepercayaan kepada Allah, malaikat, kitab-kitab suci, dan sebagainya.',
                'urutan' => 3,
                'created_at' => '2023-03-26 13:08:47',
                'updated_at' => '2023-03-26 13:08:47',
            ),
            3 => 
            array (
                'id' => 8,
                'nama' => 'Sejarah Islam',
                'foto' => '20230326130907.png',
                'keterangan' => 'Mempelajari tentang sejarah perkembangan agama Islam dan peristiwa-peristiwa penting yang terkait dengan Islam.',
                'urutan' => 4,
                'created_at' => '2023-03-26 13:09:07',
                'updated_at' => '2023-03-26 13:09:07',
            ),
        ));
        
        
    }
}