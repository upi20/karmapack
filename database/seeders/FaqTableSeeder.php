<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('faq')->delete();
        
        \DB::table('faq')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'Do you offer discounts for students?',
                'link' => NULL,
                'jawaban' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
                'type' => '1',
                'status' => '1',
                'created_at' => '2022-08-21 04:32:06',
                'updated_at' => '2022-08-21 04:38:31',
            ),
            1 => 
            array (
                'id' => '2',
                'nama' => 'Do you offer special pricing for big teams?',
                'link' => NULL,
                'jawaban' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
                'type' => '1',
                'status' => '1',
                'created_at' => '2022-08-21 04:38:42',
                'updated_at' => '2022-08-21 04:38:42',
            ),
            2 => 
            array (
                'id' => '3',
                'nama' => 'What is the course refund policy?',
                'link' => NULL,
                'jawaban' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
                'type' => '1',
                'status' => '1',
                'created_at' => '2022-08-21 04:39:30',
                'updated_at' => '2022-08-21 04:39:30',
            ),
            3 => 
            array (
                'id' => '4',
                'nama' => 'Do you offer discounts for non-profits?',
                'link' => NULL,
                'jawaban' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
                'type' => '1',
                'status' => '1',
                'created_at' => '2022-08-21 04:39:39',
                'updated_at' => '2022-08-21 04:39:39',
            ),
            4 => 
            array (
                'id' => '5',
                'nama' => 'Link',
                'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSdau6VwXEPJ_fiKm1SZAZf4tZ7UCZFGpejVbmfbHevdQcmA5Q/viewform',
                'jawaban' => NULL,
                'type' => '2',
                'status' => '1',
                'created_at' => '2022-08-21 07:17:56',
                'updated_at' => '2022-08-21 07:17:56',
            ),
        ));
        
        
    }
}