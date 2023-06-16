<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HomeTestimonialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('home_testimonials')->delete();
        
        \DB::table('home_testimonials')->insert(array (
            0 => 
            array (
                'id' => '1',
                'urutan' => '1',
                'nama' => 'Taufiq',
                'sebagai' => 'Product Designer',
                'foto' => '20230418133444.jpg',
                'testimoni' => 'Saya sangat senang dengan hasil desain yang dibuat oleh tim cempor digital. Mereka mengerti apa yang saya inginkan dan mampu memberikan solusi yang sempurna untuk kebutuhan desain saya. Proses komunikasi dan kerjasama dengan timnya sangat lancar dan mereka selalu mengakomodasi setiap permintaan perubahan dari saya. Saya sangat merekomendasikan jasa desain ini kepada siapa saja yang mencari desain berkualitas tinggi dan layanan yang baik.',
                'tampilkan' => 'Ya',
                'created_at' => '2023-04-13 13:00:59',
                'updated_at' => '2023-04-18 13:34:44',
            ),
            1 => 
            array (
                'id' => '2',
                'urutan' => '2',
                'nama' => 'Fahri',
                'sebagai' => 'Product Designer',
                'foto' => '20230413130311.png',
                'testimoni' => 'Saya sangat puas dengan hasil foto dan video dari cempor digital. Mereka profesional dan membuat hasil yang bagus. Proses pemotretan dan pembuatan videonya lancar dan mudah dipahami. Saya sangat merekomendasikan jasa foto dan video mereka kepada siapa saja.',
                'tampilkan' => 'Ya',
                'created_at' => '2023-04-13 13:03:11',
                'updated_at' => '2023-04-13 13:03:11',
            ),
            2 => 
            array (
                'id' => '3',
                'urutan' => '3',
                'nama' => 'Lutpi N.',
                'sebagai' => 'Web Programmer',
                'foto' => '20230418133537.jpeg',
                'testimoni' => 'Saya sangat terkesan dengan layanan jasa pembuatan aplikasi website oleh cempor digital. Tim pembuat aplikasi mereka sangat professional dan memahami kebutuhan saya dengan baik. Proses pembuatan aplikasi berjalan lancar dan hasil akhir sesuai dengan harapan saya. Saya sangat merekomendasikan jasa pembuatan aplikasi website ini kepada siapa saja yang mencari solusi pembuatan aplikasi website berkualitas tinggi dan layanan yang baik.',
                'tampilkan' => 'Ya',
                'created_at' => '2023-04-13 13:03:42',
                'updated_at' => '2023-04-18 13:35:37',
            ),
            3 => 
            array (
                'id' => '4',
                'urutan' => '4',
                'nama' => 'Handip Yusuf Kurniawan',
                'sebagai' => 'Web Programmer',
                'foto' => '20230413130424.png',
                'testimoni' => 'Saya sangat terkesan dengan layanan jasa pembuatan aplikasi website oleh cempor digital. Tim pembuat aplikasi mereka sangat professional dan memahami kebutuhan saya dengan baik. Proses pembuatan aplikasi berjalan lancar dan hasil akhir sesuai dengan harapan saya. Saya sangat merekomendasikan jasa pembuatan aplikasi website ini kepada siapa saja yang mencari solusi pembuatan aplikasi website berkualitas tinggi dan layanan yang baik.',
                'tampilkan' => 'Ya',
                'created_at' => '2023-04-13 13:04:24',
                'updated_at' => '2023-04-13 13:04:24',
            ),
        ));
        
        
    }
}