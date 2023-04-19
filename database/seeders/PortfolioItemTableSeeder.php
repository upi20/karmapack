<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PortfolioItemTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('portfolio_item')->delete();
        
        \DB::table('portfolio_item')->insert(array (
            0 => 
            array (
                'id' => 1,
                'portfolio_id' => 14,
                'urutan' => 1,
                'nama' => 'Email',
                'keterangan' => 'iseplutpinur7@gmail.com',
                'created_at' => '2023-04-18 05:16:35',
                'updated_at' => '2023-04-18 05:16:35',
            ),
        ));
        
        
    }
}