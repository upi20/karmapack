<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArtikelTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('artikel')->delete();
        
        \DB::table('artikel')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Toleransi di Jabar Dianggap Rendah, MUI: Tidak Benar!',
                'slug' => 'toleransi-di-jabar-dianggap-rendah-mui-tidak-benar',
                'foto' => NULL,
                'foto_folder' => '',
            'detail' => '<p style="text-align: center; "><img style="width: 700px;" data-bs-filename="34166-toleransi-di-jabar-dianggap-rendah-mui-tidak-benar.jpeg" src="/assets/artikel/toleransi-1649852159/16498521590.png"><br><p>Bandung &acirc;&#128;&#147; Indeks kerukunan umat beragama di Jawa Barat (Jabar) sempat disorot lembaga survei karena dianggap rendah. Majelis Ulama Indonesia (MUI) menilai hasil penelitian kerukunan umat beragama di Jabar kerap berbeda.</p><p>Ketua MUI Jabar Rachmat Syafe&acirc;&#128;&#153;i mengatakan, pihaknya sempat berdiskusi dengan Kemenag tentang hasil survei kerukunan umat beragama. Pada tahun sebelumnya, hasil penelitian Kemenag menyebutkan indeks kerukunan di Jabar mencapai 72,7 persen. Namun, MUI menilai kondisi tersebut tidak sepenuhnya benar.</p><p>&acirc;&#128;&#156;Kita coba teliti lagi. Memang soal ukuran (instrumen) rendahnya toleransi tidak disepakati waktu itu. Survei itu tidak sepenuhnya benar,&acirc;&#128;&#157; kata Rachmat kepada detikJabar, Rabu (23/3/2022).</p><p>Bagi MUI, hasil survei tak harus menjadi patokan utama. Menurutnya, MUI bersama masyarakat harus terus meningkat dan mengimplementasikan nilai-nilai toleransi di Jabar.</p><p>MUI pun telah terjun langsung untuk tetap menjaga kerukunan umat beragama di Jabar. &acirc;&#128;&#156;Kita terus upayakan melalui komisi kerukunan umat beragama, dan komisi ukhuwah Islamiyah,&acirc;&#128;&#157; ungkapnya Rachmat.</p><p>Ia pun berharap kerukunan umat beragama di Jabar terus terjaga. Jangan sampai ada riak-riak yang dapat mengganggu kenyamanan di antara umat beragama.</p><p>Jabar tak masuk dalam 10 provinsi dengan indeks kerukunan umat bergama terbaik. Namun, berdasarkan penelitian Sistem Informasi Penelitian Pengembangan Pendidikan dan Pelatihan (Simlibangdiklat) Kemenag menyebutkan, pada tahun 2021 indeks kerukunan umat bergama di Jabar mencapai 72,7 persen. Meningkat dibandingkan tahun 2019, yakni 64,41 persen.</p><p>Sedangkan, Indonesia Political Opinion (IPO) menyebutkan toleransi antarumat beragama di Jabar rendah. Hanya menuliskan skor satu untuk kerukunan umat beragama di Jabar.</p><p>Survei IPO digelar pada 1-7 Maret 2022 menggunakan metode multistage random sampling. Dengan total wawancara dilakukan kepada 880 responden. Margin of error sebesar 2.90 persen. Dengan kurasi data mencapai 95 persen asumsi simple random sampling. (detik.com)</p></p>
',
            'excerpt' => 'Indeks kerukunan umat beragama di Jawa Barat (Jabar) sempat disorot lembaga survei karena dianggap rendah. Majelis Ulama Indonesia (MUI) menilai hasil penelitian kerukunan umat beragama di Jabar kerap berbeda.',
                'status' => 0,
                'created_at' => '2022-04-13 12:15:59',
                'updated_at' => '2022-04-13 12:15:59',
                'user_id' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Pengaturan',
                'slug' => 'pengaturan',
                'foto' => '/16498533970.png',
                'foto_folder' => '',
                'detail' => '<p><img style="width: 765.2px;" data-bs-filename="b1f322dbbed952c183357f0fdab19249.png" src="/assets/artikel/pengaturan1649853397/16498533970.png"><br></p>
',
                'excerpt' => 'tes',
                'status' => 1,
                'created_at' => '2022-04-13 12:36:37',
                'updated_at' => '2022-04-13 12:36:37',
                'user_id' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Pengaturan',
                'slug' => 'pengaturanq',
                'foto' => '/assets/artikel/pengaturan1649853443/16498534430.png',
                'foto_folder' => '',
                'detail' => '<p><img style="width: 765.2px;" data-bs-filename="b1f322dbbed952c183357f0fdab19249.png" src="/assets/artikel/pengaturan1649853443/16498534430.png"><br></p>
',
                'excerpt' => 'tes',
                'status' => 1,
                'created_at' => '2022-04-13 12:37:23',
                'updated_at' => '2022-04-13 12:37:23',
                'user_id' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Pengaturan',
                'slug' => 'pengaturanq11',
                'foto' => '/assets/artikel/pengaturan1649853483/16498534830.png',
                'foto_folder' => '',
                'detail' => '<p><img style="width: 765.2px;" data-bs-filename="b1f322dbbed952c183357f0fdab19249.png" src="/assets/artikel/pengaturan1649853483/16498534830.png"><br></p>
',
                'excerpt' => 'tes',
                'status' => 1,
                'created_at' => '2022-04-13 12:38:03',
                'updated_at' => '2022-04-13 12:38:03',
                'user_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'Pengaturan',
                'slug' => 'pengaturanq11aa',
                'foto' => '/assets/artikel/pengaturan1649853550/16498535500.png',
                'foto_folder' => 'pengaturan1649853550',
                'detail' => '<p><img style="width: 765.2px;" data-bs-filename="b1f322dbbed952c183357f0fdab19249.png" src="/assets/artikel/pengaturan1649853550/16498535500.png"><br></p>
',
                'excerpt' => 'tes',
                'status' => 1,
                'created_at' => '2022-04-13 12:39:10',
                'updated_at' => '2022-04-13 12:39:10',
                'user_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'nama' => 'Tes Video Artikel',
                'slug' => 'tes-video-artikel',
                'foto' => NULL,
                'foto_folder' => 'tes-video-1649854451',
                'detail' => '<p><br><div class="embed-container"><iframe src="https://www.youtube.com/embed/0jWD8zv3-8s?autoplay=1&amp;fs=1&amp;iv_load_policy=&amp;showinfo=1&amp;rel=0&amp;cc_load_policy=1&amp;start=0&amp;modestbranding&amp;end=0&amp;controls=1" frameborder="0" width="100%" height="500px" type="text/html" allowfullscreen="true"></iframe></div></p>
',
                'excerpt' => 'as',
                'status' => 0,
                'created_at' => '2022-04-13 12:54:11',
                'updated_at' => '2022-04-13 12:54:11',
                'user_id' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'nama' => 'SMVLL - Adek Berjilbab Ungu versi Reggae',
                'slug' => 'smvll-adek-berjilbab-ungu-versi-reggae',
                'foto' => NULL,
                'foto_folder' => 'smvll-adek1649856291',
                'detail' => '<p><br><div class="embed-container"><iframe src="https://www.youtube.com/embed/O5dV7n8WVSQ?autoplay=1&amp;fs=1&amp;iv_load_policy=&amp;showinfo=1&amp;rel=0&amp;cc_load_policy=1&amp;start=0&amp;modestbranding&amp;end=0&amp;controls=1" frameborder="0" width="100%" height="500px" type="text/html" allowfullscreen="true"></iframe></div><div class="embed-container"><br></div><p>&acirc;&#143;&cedil; ADEK BERJILBAB UNGU
</p><p>&eth;&#159;&#148;&#130; COVER SMVLL
</p><p>&eth;&#159;&#148;&#128; VERSI REGGAE
</p><p>&acirc;&#143;&copy; HUMBLE
</p><p>&eth;&#159;&#148;&#129; SUBCRIBE : MUSIC ILLUSIONS<br></p></p>
',
                'excerpt' => 'Musik Youtube',
                'status' => 0,
                'created_at' => '2022-04-13 13:24:51',
                'updated_at' => '2022-04-13 13:24:51',
                'user_id' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'nama' => 'Pengaturan',
                'slug' => 'pengaturans',
                'foto' => NULL,
                'foto_folder' => 'pengaturan1649856473',
                'detail' => '<p>sadfsadf</p>
',
                'excerpt' => 'dafdsf',
                'status' => 0,
                'created_at' => '2022-04-13 13:27:53',
                'updated_at' => '2022-04-13 13:27:53',
                'user_id' => 1,
            ),
        ));
        
        
    }
}