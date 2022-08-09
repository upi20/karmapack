<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KataAlumnisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kata_alumnis')->delete();
        
        \DB::table('kata_alumnis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'sebagai' => 'Kominfo 2021-2023',
                'sequence' => NULL,
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt aspernatur blanditiis, laborum deserunt amet ipsa quisquam deleniti adipisci voluptas? Deleniti a nam eum corrupti quis odit fugit officia vel expedita.',
                'profesi' => 'Junior Programmer Di Shopee',
                'status' => 1,
                'created_at' => '2022-08-09 15:11:08',
                'updated_at' => '2022-08-09 17:11:01',
            ),
        ));
        
        
    }
}