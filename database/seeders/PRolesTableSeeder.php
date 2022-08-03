<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('p_roles')->delete();
        
        \DB::table('p_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'member',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 04:07:30',
                'updated_at' => '2022-08-04 04:07:30',
            ),
        ));
        
        
    }
}