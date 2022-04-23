<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HobbiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hobbies')->delete();
        
        \DB::table('hobbies')->insert(array (
            0 => 
            array (
                'id' => 8,
                'name' => 'Sepedaan',
                'user_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 9,
                'name' => 'Musik',
                'user_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 10,
                'name' => 'Codding',
                'user_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}