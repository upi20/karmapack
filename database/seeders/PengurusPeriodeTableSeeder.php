<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengurusPeriodeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pengurus_periode')->delete();
        
        \DB::table('pengurus_periode')->insert(array (
            0 => 
            array (
                'id' => 2,
                'nama' => 'Kabinet Masagi',
                'foto' => 'iconkabinet-ma20220425164938.png',
                'dari' => '2021',
                'sampai' => '2022',
                'slug' => 'kabinet-masagi',
                'slogan' => 'Ngabdi ka nagri bela ka nagara piken ngawujudkeun lemah nu sajati tur ngawangun cianjur pakidulan.',
                'visi' => '<p>"Terwujudnya KARMAPACK dan masyarakat Cianjur Kidul yang menjungjung tinggi nilai, dan
norma agama,
sosial
serta budaya lokal."</p>
',
                'misi' => '<p>1. Meningkatkan pemahaman dan pengalaman keagamaan bagi anggota KARMAPACK dan masyarakat
Cianjru Kidul
<br>
2. Melakukan pengabdian kepada masyarakat<br>
3. Menumbuhkan rasa cinta terhadap seni dan budaya kedaerahan</p>
',
                'status' => 0,
                'created_at' => '2022-04-14 08:31:00',
                'updated_at' => '2022-08-16 16:44:16',
            ),
            1 => 
            array (
                'id' => 6,
                'nama' => 'Kabinet Sauyunan',
                'foto' => 'iconkabinet-sa20220816164522.png',
                'dari' => '2022',
                'sampai' => '2023',
                'slug' => 'kabinet-sauyunan',
                'slogan' => '-',
                'visi' => '<p>"Terwujudnya KARMAPACK dan masyarakat Cianjur Kidul yang menjungjung tinggi nilai, dan norma agama, sosial serta budaya lokal."<br></p>
',
                'misi' => '<p>1. Meningkatkan pemahaman dan pengalaman keagamaan bagi anggota KARMAPACK dan masyarakat Cianjru Kidul<br>2. Melakukan pengabdian kepada masyarakat<br>3. Menumbuhkan rasa cinta terhadap seni dan budaya kedaerahan<br></p>
',
                'status' => 1,
                'created_at' => '2022-07-15 15:25:06',
                'updated_at' => '2022-08-16 16:45:22',
            ),
        ));
        
        
    }
}