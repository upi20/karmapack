<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdukMarketPlaceJenisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('produk_market_place_jenis')->delete();
        
        \DB::table('produk_market_place_jenis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Shopee',
                'link' => 'https://shopee.co.id/wkgroastery',
                'link_produk' => NULL,
                'slug' => 'shopee',
                'foto_icon' => '20230316004237.png',
                'foto_cover' => '20230316004237.jpeg',
                'keterangan' => 'WKG ROASTERY kopi asli khas Indonesia di ambil dari petani-petani kopi Indonesia dengan kualitas terbaik. Di panggang menggunakan mesin terbaik dengan higienis, memberikan biji kopi terbaik untuk anda untuk dinikmati',
                'created_at' => '2023-03-16 00:42:37',
                'updated_at' => '2023-03-16 00:43:18',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Tokopedia',
                'link' => 'https://www.tokopedia.com/wkgroastery',
                'link_produk' => NULL,
                'slug' => 'tokopedia',
                'foto_icon' => '20230316004418.png',
                'foto_cover' => '20230316004418.jpeg',
                'keterangan' => 'WKG ROASTERY kopi asli khas Indonesia di ambil dari petani-petani kopi Indonesia dengan kualitas terbaik. Di panggang menggunakan mesin terbaik dengan higienis, memberikan biji kopi terbaik untuk anda untuk dinikmati',
                'created_at' => '2023-03-16 00:44:18',
                'updated_at' => '2023-03-16 00:44:18',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'PaDi UMKM',
                'link' => 'https://padiumkm.id/store/68374-wkg-roastery',
                'link_produk' => NULL,
                'slug' => 'padi-umkm',
                'foto_icon' => '20230316010216icon.jpeg',
                'foto_cover' => '20230316010156cover.jpeg',
                'keterangan' => 'WKG ROASTERY kopi asli khas Indonesia di ambil dari petani-petani kopi Indonesia dengan kualitas terbaik. Di panggang menggunakan mesin terbaik dengan higienis, memberikan biji kopi terbaik untuk anda untuk dinikmati',
                'created_at' => '2023-03-16 00:48:25',
                'updated_at' => '2023-03-16 01:02:16',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Tiktok',
                'link' => 'https://www.tiktok.com/@wkg_roastery?_t=8yi32jgwzdb&_r=1',
                'link_produk' => NULL,
                'slug' => 'tiktok',
                'foto_icon' => '20230316010415icon.png',
                'foto_cover' => '20230316010415cover.jpeg',
                'keterangan' => NULL,
                'created_at' => '2023-03-16 01:04:15',
                'updated_at' => '2023-03-16 01:04:15',
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'Paxel Market',
                'link' => 'https://paxelmarket.co/store/wkg-roastery/',
                'link_produk' => NULL,
                'slug' => 'paxel-market',
                'foto_icon' => '20230316010618icon.png',
                'foto_cover' => '20230316010618cover.jpeg',
                'keterangan' => NULL,
                'created_at' => '2023-03-16 01:06:18',
                'updated_at' => '2023-03-16 01:06:18',
            ),
            5 => 
            array (
                'id' => 6,
                'nama' => 'Whatsapp',
                'link' => NULL,
                'link_produk' => 'https://wa.me/+628997370999',
                'slug' => 'whatsapp',
                'foto_icon' => '20230316010723icon.png',
                'foto_cover' => '20230316010723cover.jpeg',
                'keterangan' => NULL,
                'created_at' => '2023-03-16 01:07:23',
                'updated_at' => '2023-03-16 01:07:23',
            ),
            6 => 
            array (
                'id' => 8,
                'nama' => 'ShopeeFood',
                'link' => NULL,
                'link_produk' => 'https://shopee.co.id/universal-link/now-food/shop/21051909?deep_and_deferred=1&shareChannel=whatsapp',
                'slug' => 'shopeefood',
                'foto_icon' => '20230316011229icon.png',
                'foto_cover' => '20230316011229cover.jpeg',
                'keterangan' => NULL,
                'created_at' => '2023-03-16 01:12:29',
                'updated_at' => '2023-03-16 01:13:25',
            ),
            7 => 
            array (
                'id' => 9,
                'nama' => 'GoFood',
                'link' => NULL,
                'link_produk' => 'https://gofood.link/a/GeboqCh',
                'slug' => 'gofood',
                'foto_icon' => '20230316011306icon.png',
                'foto_cover' => '20230316011306cover.jpeg',
                'keterangan' => NULL,
                'created_at' => '2023-03-16 01:13:06',
                'updated_at' => '2023-03-16 01:13:06',
            ),
            8 => 
            array (
                'id' => 10,
                'nama' => 'GrabFood',
                'link' => NULL,
                'link_produk' => 'https://grab.onelink.me/2695613898?pid=inappsharing&c=6-C32ZAFXZLK4HJN&is_retargeting=true&af_dp=grab%3A%2F%2Fopen%3FscreenType%3DGRABFOOD%26sourceID%3DA4pcqCZkS4%26merchantIDs%3D6-C32ZAFXZLK4HJN&af_force_deeplink=true&af_web_dp=https%3A%2F%2Fwww.grab.com',
                'slug' => 'grabfood',
                'foto_icon' => '20230316011347icon.png',
                'foto_cover' => '20230316011347cover.jpeg',
                'keterangan' => NULL,
                'created_at' => '2023-03-16 01:13:47',
                'updated_at' => '2023-03-16 01:13:47',
            ),
        ));
        
        
    }
}