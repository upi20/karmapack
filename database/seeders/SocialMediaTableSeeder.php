<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialMediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('social_media')->delete();
        
        \DB::table('social_media')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'Facebook',
                'icon' => 'fab fa-facebook-f',
                'url' => 'https://www.facebook.com/karmapack.id',
                'order' => '1',
                'keterangan' => 'Facebook Utama',
                'status' => '1',
                'created_at' => '2022-04-18 06:56:15',
                'updated_at' => '2022-04-18 06:56:15',
            ),
            1 => 
            array (
                'id' => '2',
                'nama' => 'Youtube',
                'icon' => 'fab fa-youtube',
                'url' => 'https://www.youtube.com/channel/UCYLkZIjHmDkQH7j7qfVIHbg',
                'order' => '2',
                'keterangan' => 'Youtube Utama',
                'status' => '1',
                'created_at' => '2022-04-18 06:59:57',
                'updated_at' => '2022-04-18 06:59:57',
            ),
            2 => 
            array (
                'id' => '3',
                'nama' => 'Whatsapp',
                'icon' => 'fab fa-whatsapp',
                'url' => 'https://api.whatsapp.com/send?phone=+6285798132505&amp;text=Assalamualaikum wr wb.',
                'order' => '3',
                'keterangan' => 'Whatsapp Utama',
                'status' => '1',
                'created_at' => '2022-04-18 07:00:40',
                'updated_at' => '2022-04-18 07:00:40',
            ),
            3 => 
            array (
                'id' => '4',
                'nama' => 'Instagram',
                'icon' => 'fab fa-instagram',
                'url' => 'https://www.instagram.com/orda_karmapack',
                'order' => '4',
                'keterangan' => 'Instagram Utama',
                'status' => '1',
                'created_at' => '2022-04-18 07:02:06',
                'updated_at' => '2022-04-18 07:02:06',
            ),
        ));
        
        
    }
}