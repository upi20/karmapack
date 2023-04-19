<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdukTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('produk')->delete();

        \DB::table('produk')->insert(array(
            0 =>
            array(
                'id' => 4,
                'kategori_id' => 6,
                'nama' => 'Arabika Colombia',
                'slug' => 'arabika-colombia',
                'sku' => NULL,
                'kilasan' => 'biji kopi yang ditanam di pegunungan Colombia dengan rasa yang khas, memiliki asam yang lembut, aroma yang kaya dan sedikit pahit diakhir.',
                'informasi_lain' => '<ul class="adi-info list-unstyled mb-0" style="border-width: 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-left-style: solid; border-top-color: rgb(226, 223, 221); border-right-color: rgb(226, 223, 221); border-left-color: rgb(226, 223, 221); border-image: initial; border-bottom-style: initial; border-bottom-color: initial; display: flex; flex-wrap: wrap; color: rgb(33, 37, 41); font-family: Jost, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Weight</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">1.4 oz</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Dimensions</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">62 &Atilde;&#151; 56 &Atilde;&#151; 12 in</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Size</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">XL, XXL, LG, SM, MD</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Fabric</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Cotton, Silk &amp; Synthetic</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Warranty</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">3 Months</li></ul>
',
                'tampilkan_harga' => 0,
                'harga' => 12000,
                'harga_diskon' => NULL,
                'status_stok' => 1,
                'rating' => NULL,
                'rating_nama' => 'Pembeli',
                'jml_dilihat' => 0,
                'tampilkan_di_halaman_utama' => 1,
                'is_insert' => 1,
                'created_by' => 1,
                'created_at' => '2023-03-20 12:32:06',
                'updated_at' => '2023-03-24 15:27:36',
            ),
            1 =>
            array(
                'id' => 5,
                'kategori_id' => 7,
                'nama' => 'Robusta Vietnam',
                'slug' => 'robusta-vietnam',
                'sku' => NULL,
                'kilasan' => 'biji kopi yang tumbuh di wilayah dataran tinggi Vietnam, dengan rasa yang kuat, pahit, dan aroma yang tajam',
                'informasi_lain' => '<ul class="adi-info list-unstyled mb-0" style="border-width: 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-left-style: solid; border-top-color: rgb(226, 223, 221); border-right-color: rgb(226, 223, 221); border-left-color: rgb(226, 223, 221); border-image: initial; border-bottom-style: initial; border-bottom-color: initial; display: flex; flex-wrap: wrap; color: rgb(33, 37, 41); font-family: Jost, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Weight</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">1.4 oz</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Dimensions</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">62 &Atilde;&#151; 56 &Atilde;&#151; 12 in</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Size</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">XL, XXL, LG, SM, MD</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Fabric</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Cotton, Silk &amp; Synthetic</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Warranty</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">3 Months</li></ul>
',
                'tampilkan_harga' => 0,
                'harga' => 13000,
                'harga_diskon' => NULL,
                'status_stok' => 1,
                'rating' => NULL,
                'rating_nama' => NULL,
                'jml_dilihat' => 0,
                'tampilkan_di_halaman_utama' => 1,
                'is_insert' => 1,
                'created_by' => 1,
                'created_at' => '2023-03-20 12:33:43',
                'updated_at' => '2023-03-24 15:27:25',
            ),
            2 =>
            array(
                'id' => 6,
                'kategori_id' => 7,
                'nama' => 'Ethiopia Yirgacheffe',
                'slug' => 'ethiopia-yirgacheffe',
                'sku' => NULL,
                'kilasan' => 'biji kopi dari daerah Yirgacheffe di Ethiopia dengan rasa yang ringan, asam yang tinggi dan aroma buah yang menyegarkan',
                'informasi_lain' => '<ul class="adi-info list-unstyled mb-0" style="border-width: 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-left-style: solid; border-top-color: rgb(226, 223, 221); border-right-color: rgb(226, 223, 221); border-left-color: rgb(226, 223, 221); border-image: initial; border-bottom-style: initial; border-bottom-color: initial; display: flex; flex-wrap: wrap; color: rgb(33, 37, 41); font-family: Jost, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Weight</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">1.4 oz</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Dimensions</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">62 &acirc;&#128;&#157; 56 &acirc;&#128;&#157; 12 in</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Size</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">XL, XXL, LG, SM, MD</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Fabric</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Cotton, Silk &amp; Synthetic</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">Warranty</li><li style="color: rgb(108, 108, 108); padding: 5px 15px; flex: 0 0 50%; max-width: 50%; border-bottom-color: rgb(226, 223, 221);">3 Months</li></ul>
',
                'tampilkan_harga' => 1,
                'harga' => 12000,
                'harga_diskon' => 10000,
                'status_stok' => 1,
                'rating' => 5,
                'rating_nama' => 'Pembeli',
                'jml_dilihat' => 0,
                'tampilkan_di_halaman_utama' => 0,
                'is_insert' => 1,
                'created_by' => 1,
                'created_at' => '2023-03-20 12:36:57',
                'updated_at' => '2023-03-25 00:16:52',
            ),
            3 =>
            array(
                'id' => 7,
                'kategori_id' => NULL,
                'nama' => NULL,
                'slug' => NULL,
                'sku' => NULL,
                'kilasan' => NULL,
                'informasi_lain' => NULL,
                'tampilkan_harga' => 0,
                'harga' => 0,
                'harga_diskon' => NULL,
                'status_stok' => 0,
                'rating' => 0,
                'rating_nama' => NULL,
                'jml_dilihat' => 0,
                'tampilkan_di_halaman_utama' => 0,
                'is_insert' => 0,
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
