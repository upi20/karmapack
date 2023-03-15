<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialAccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('social_accounts')->delete();
        
        \DB::table('social_accounts')->insert(array (
            0 => 
            array (
                'id' => '2',
                'user_id' => '1',
                'provider_id' => '111291161449881637624',
                'provider_name' => 'google',
            'provider_data' => '{"id":"111291161449881637624","nickname":null,"name":"Isep Lutpi Nur (upi)","email":"iseplutpinur7@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZdwkAeMu6tgf95EzVDIiZPwijo5jBB3yzRDwe8=s96-c","user":{"sub":"111291161449881637624","name":"Isep Lutpi Nur (upi)","given_name":"Isep","family_name":"Lutpi Nur","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZdwkAeMu6tgf95EzVDIiZPwijo5jBB3yzRDwe8=s96-c","email":"iseplutpinur7@gmail.com","email_verified":true,"locale":"id","id":"111291161449881637624","verified_email":true,"link":null},"attributes":{"id":"111291161449881637624","nickname":null,"name":"Isep Lutpi Nur (upi)","email":"iseplutpinur7@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZdwkAeMu6tgf95EzVDIiZPwijo5jBB3yzRDwe8=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZdwkAeMu6tgf95EzVDIiZPwijo5jBB3yzRDwe8=s96-c"},"token":"ya29.a0AVvZVsqEs_Jb8m7mGikJZVIoAbCVHI9YwX1iPanxlRrz0kmeBYhidWNPTyyVQNEdO_3IvlfEUoUGeK97GkEUXI789nPix7sbnrQRfUf2AexzX5akjYKcRN3Q8wZtqSP3l1RtWwtDyLFVLKeK2Ayjkb8hi833zQaCgYKAegSARMSFQGbdwaIIDz7C0laJXfrF3AOr-LAEw0165","refreshToken":null,"expiresIn":3599,"approvedScopes":["openid","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile"]}',
                'created_at' => '2023-03-16 02:13:21',
                'updated_at' => '2023-03-16 02:13:21',
            ),
        ));
        
        
    }
}