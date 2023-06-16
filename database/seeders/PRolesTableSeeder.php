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
                'id' => '1',
                'name' => 'Administrator',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-06 14:36:10',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Anggota',
                'guard_name' => 'web',
                'created_at' => '2022-08-04 16:05:41',
                'updated_at' => '2022-08-06 00:47:30',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Pengurus',
                'guard_name' => 'web',
                'created_at' => '2022-08-06 01:24:50',
                'updated_at' => '2022-08-06 01:24:50',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'Ketua Umum',
                'guard_name' => 'web',
                'created_at' => '2022-08-06 01:25:18',
                'updated_at' => '2022-08-06 17:30:18',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'Sekertaris Umum',
                'guard_name' => 'web',
                'created_at' => '2022-08-06 01:25:41',
                'updated_at' => '2022-08-06 01:25:41',
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'Bendahara Umum',
                'guard_name' => 'web',
                'created_at' => '2022-08-06 01:25:58',
                'updated_at' => '2022-08-06 01:25:58',
            ),
            6 => 
            array (
                'id' => '7',
                'name' => 'Ketua Bidang',
                'guard_name' => 'web',
                'created_at' => '2022-08-06 01:26:14',
                'updated_at' => '2022-08-06 01:26:14',
            ),
            7 => 
            array (
                'id' => '8',
                'name' => 'Sekertaris Bidang',
                'guard_name' => 'web',
                'created_at' => '2022-08-06 01:26:29',
                'updated_at' => '2022-08-06 01:26:29',
            ),
            8 => 
            array (
                'id' => '9',
                'name' => 'Alumni',
                'guard_name' => 'web',
                'created_at' => '2022-08-06 01:26:51',
                'updated_at' => '2022-08-06 01:26:51',
            ),
            9 => 
            array (
                'id' => '10',
                'name' => 'Penulis Artikel',
                'guard_name' => 'web',
                'created_at' => '2022-08-06 14:15:34',
                'updated_at' => '2022-08-06 14:15:34',
            ),
        ));
        
        
    }
}