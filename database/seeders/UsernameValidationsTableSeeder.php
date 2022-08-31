<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsernameValidationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('username_validations')->delete();
        
        \DB::table('username_validations')->insert(array (
            0 => 
            array (
                'id' => '1',
                'rule' => 'admin',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => '2',
                'rule' => 'member',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => '3',
                'rule' => 'profile',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => '4',
                'rule' => 'home',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}