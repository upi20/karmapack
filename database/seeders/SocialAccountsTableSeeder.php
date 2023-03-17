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
                'id' => 2,
                'user_id' => 1,
                'provider_id' => '111291161449881637624',
                'provider_name' => 'google',
            'provider_data' => '{"id":"111291161449881637624","nickname":null,"name":"Isep Lutpi Nur (upi)","email":"iseplutpinur7@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZdwkAeMu6tgf95EzVDIiZPwijo5jBB3yzRDwe8=s96-c","user":{"sub":"111291161449881637624","name":"Isep Lutpi Nur (upi)","given_name":"Isep","family_name":"Lutpi Nur","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZdwkAeMu6tgf95EzVDIiZPwijo5jBB3yzRDwe8=s96-c","email":"iseplutpinur7@gmail.com","email_verified":true,"locale":"id","id":"111291161449881637624","verified_email":true,"link":null},"attributes":{"id":"111291161449881637624","nickname":null,"name":"Isep Lutpi Nur (upi)","email":"iseplutpinur7@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZdwkAeMu6tgf95EzVDIiZPwijo5jBB3yzRDwe8=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZdwkAeMu6tgf95EzVDIiZPwijo5jBB3yzRDwe8=s96-c"},"token":"ya29.a0AVvZVsqEs_Jb8m7mGikJZVIoAbCVHI9YwX1iPanxlRrz0kmeBYhidWNPTyyVQNEdO_3IvlfEUoUGeK97GkEUXI789nPix7sbnrQRfUf2AexzX5akjYKcRN3Q8wZtqSP3l1RtWwtDyLFVLKeK2Ayjkb8hi833zQaCgYKAegSARMSFQGbdwaIIDz7C0laJXfrF3AOr-LAEw0165","refreshToken":null,"expiresIn":3599,"approvedScopes":["openid","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile"]}',
                'created_at' => '2023-03-16 02:13:21',
                'updated_at' => '2023-03-16 02:13:21',
            ),
            1 => 
            array (
                'id' => 3,
                'user_id' => 113,
                'provider_id' => '103853047478079863516',
                'provider_name' => 'google',
                'provider_data' => '{"id":"103853047478079863516","nickname":null,"name":"Faisal Akbar","email":"faisal7794akbar@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbNyr3rnmlMmPAoCVJuX8w_WPEMlcX3Um8GOYoKqg=s96-c","user":{"sub":"103853047478079863516","name":"Faisal Akbar","given_name":"Faisal","family_name":"Akbar","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbNyr3rnmlMmPAoCVJuX8w_WPEMlcX3Um8GOYoKqg=s96-c","email":"faisal7794akbar@gmail.com","email_verified":true,"locale":"id","id":"103853047478079863516","verified_email":true,"link":null},"attributes":{"id":"103853047478079863516","nickname":null,"name":"Faisal Akbar","email":"faisal7794akbar@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbNyr3rnmlMmPAoCVJuX8w_WPEMlcX3Um8GOYoKqg=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbNyr3rnmlMmPAoCVJuX8w_WPEMlcX3Um8GOYoKqg=s96-c"},"token":"ya29.a0AVvZVsoq80MVn5HoHqDg4vEx_9tZBLTL19Rwg2Kv33tcngqy3sDytdJbkXZRflZoNsuYt6VusxPo3oRyVH4T8psfKzqJzOoQhbn6HXPVOoavYMPJ7BrZSaN4h-7B2BExZowqxzAPLofb3pzQBNsiBfLdB-DfaCgYKAXISARMSFQGbdwaIfjf1OEXvkIJFLA4tqnBneA0163","refreshToken":null,"expiresIn":3599,"approvedScopes":["openid","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile"]}',
                'created_at' => '2023-03-16 16:20:21',
                'updated_at' => '2023-03-16 16:20:21',
            ),
            2 => 
            array (
                'id' => 4,
                'user_id' => 114,
                'provider_id' => '104560013779289924413',
                'provider_name' => 'google',
                'provider_data' => '{"id":"104560013779289924413","nickname":null,"name":"Ukon Abdul gani","email":"ukonag04@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZ_9zYYUdmMus2BB1gdC6vMvjP0b6avblwKoKqFmQ=s96-c","user":{"sub":"104560013779289924413","name":"Ukon Abdul gani","given_name":"Ukon","family_name":"Abdul gani","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZ_9zYYUdmMus2BB1gdC6vMvjP0b6avblwKoKqFmQ=s96-c","email":"ukonag04@gmail.com","email_verified":true,"locale":"id","id":"104560013779289924413","verified_email":true,"link":null},"attributes":{"id":"104560013779289924413","nickname":null,"name":"Ukon Abdul gani","email":"ukonag04@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZ_9zYYUdmMus2BB1gdC6vMvjP0b6avblwKoKqFmQ=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZ_9zYYUdmMus2BB1gdC6vMvjP0b6avblwKoKqFmQ=s96-c"},"token":"ya29.a0AVvZVsrnnXIXlkctQOsxDmyDAk1o186PmgVtcfmPWGaEOFDkIo2--FRJC7Yw0tcoFVNGF2W6CieUy68GVBBoLQ8ep38FgHE0dUNbsjMOwoypot--AJ-Rq6GD4lYslkkaAm-Kn2u6Cr8tEFhkpRcDxo0xHNKlaCgYKAQ4SARISFQGbdwaIP063oA9A8FPUGK-hQ6FhCQ0163","refreshToken":null,"expiresIn":3599,"approvedScopes":["openid","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email"]}',
                'created_at' => '2023-03-16 16:31:38',
                'updated_at' => '2023-03-16 16:31:38',
            ),
        ));
        
        
    }
}