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
                'id' => 1,
                'nama' => 'Pengaturan',
                'foto' => NULL,
                'dari' => '2001',
                'sampai' => '2001',
                'slug' => 'pengaturan',
                'slogan' => '1',
                'visi' => '<p><img style="width: 783px;" data-bs-filename="Picture1.jpg" src="/assets/pengurus/periode/visi16502030810.png"><br></p>
',
                'misi' => '<p><img style="width: 157px;" data-bs-filename="Group 5.png" src="/assets/pengurus/periode/misi16502030810.png"><br></p>
',
                'status' => 0,
                'created_at' => '2022-04-14 09:09:02',
                'updated_at' => '2022-04-24 16:04:08',
            ),
            1 => 
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
                'status' => 1,
                'created_at' => '2022-04-14 08:31:00',
                'updated_at' => '2022-04-25 16:49:38',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'tes',
                'foto' => NULL,
                'dari' => '2001',
                'sampai' => '2001',
                'slug' => 'tes',
                'slogan' => '1',
                'visi' => '<p><img style="width: 700px;" data-bs-filename="34166-toleransi-di-jabar-dianggap-rendah-mui-tidak-benar.jpeg" src="/assets/pengurus/periode/visi16499552520.png"><br></p>
',
                'misi' => '<p><img style="width: 1050px;" data-bs-filename="How-to-Use-Summernote-Editor-for-Image-Upload-in-Laravel-9.jpg" src="/assets/pengurus/periode/misi16499552520.png"><br></p>
',
                'status' => 0,
                'created_at' => '2022-04-14 09:16:35',
                'updated_at' => '2022-04-24 16:04:08',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Periode tes',
                'foto' => NULL,
                'dari' => '2001',
                'sampai' => '2001',
                'slug' => 'periode-tes',
                'slogan' => '1',
                'visi' => '<p><img style="width: 700px;" data-bs-filename="34166-toleransi-di-jabar-dianggap-rendah-mui-tidak-benar.jpeg" src="/assets/pengurus/periode/visi16499523010.png"><br></p>
',
                'misi' => '<p><img style="width: 700px;" data-bs-filename="34166-toleransi-di-jabar-dianggap-rendah-mui-tidak-benar.jpeg" src="/assets/pengurus/periode/misi16499523010.png"><p><img style="width: 765.2px;" data-bs-filename="How-to-Use-Summernote-Editor-for-Image-Upload-in-Laravel-9.jpg" src="/assets/pengurus/periode/misi16499523941.png"><br></p></p>
',
                'status' => 0,
                'created_at' => '2022-04-14 16:05:01',
                'updated_at' => '2022-04-24 16:04:08',
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'asdfsdaf',
                'foto' => 'iconasdfsdaf20220416174744.jpeg',
                'dari' => '2001',
                'sampai' => '2001',
                'slug' => 'asdfsdaf',
                'slogan' => '11',
                'visi' => '<p>1</p>
',
                'misi' => '<p>1</p>
',
                'status' => 0,
                'created_at' => '2022-04-16 17:38:09',
                'updated_at' => '2022-04-24 16:04:08',
            ),
        ));
        
        
    }
}