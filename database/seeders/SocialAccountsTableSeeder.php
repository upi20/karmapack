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
            1 => 
            array (
                'id' => '3',
                'user_id' => '113',
                'provider_id' => '103853047478079863516',
                'provider_name' => 'google',
                'provider_data' => '{"id":"103853047478079863516","nickname":null,"name":"Faisal Akbar","email":"faisal7794akbar@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbNyr3rnmlMmPAoCVJuX8w_WPEMlcX3Um8GOYoKqg=s96-c","user":{"sub":"103853047478079863516","name":"Faisal Akbar","given_name":"Faisal","family_name":"Akbar","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbNyr3rnmlMmPAoCVJuX8w_WPEMlcX3Um8GOYoKqg=s96-c","email":"faisal7794akbar@gmail.com","email_verified":true,"locale":"id","id":"103853047478079863516","verified_email":true,"link":null},"attributes":{"id":"103853047478079863516","nickname":null,"name":"Faisal Akbar","email":"faisal7794akbar@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbNyr3rnmlMmPAoCVJuX8w_WPEMlcX3Um8GOYoKqg=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbNyr3rnmlMmPAoCVJuX8w_WPEMlcX3Um8GOYoKqg=s96-c"},"token":"ya29.a0AVvZVsoq80MVn5HoHqDg4vEx_9tZBLTL19Rwg2Kv33tcngqy3sDytdJbkXZRflZoNsuYt6VusxPo3oRyVH4T8psfKzqJzOoQhbn6HXPVOoavYMPJ7BrZSaN4h-7B2BExZowqxzAPLofb3pzQBNsiBfLdB-DfaCgYKAXISARMSFQGbdwaIfjf1OEXvkIJFLA4tqnBneA0163","refreshToken":null,"expiresIn":3599,"approvedScopes":["openid","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile"]}',
                'created_at' => '2023-03-16 16:20:21',
                'updated_at' => '2023-03-16 16:20:21',
            ),
            2 => 
            array (
                'id' => '4',
                'user_id' => '114',
                'provider_id' => '104560013779289924413',
                'provider_name' => 'google',
                'provider_data' => '{"id":"104560013779289924413","nickname":null,"name":"Ukon Abdul gani","email":"ukonag04@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZ_9zYYUdmMus2BB1gdC6vMvjP0b6avblwKoKqFmQ=s96-c","user":{"sub":"104560013779289924413","name":"Ukon Abdul gani","given_name":"Ukon","family_name":"Abdul gani","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZ_9zYYUdmMus2BB1gdC6vMvjP0b6avblwKoKqFmQ=s96-c","email":"ukonag04@gmail.com","email_verified":true,"locale":"id","id":"104560013779289924413","verified_email":true,"link":null},"attributes":{"id":"104560013779289924413","nickname":null,"name":"Ukon Abdul gani","email":"ukonag04@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZ_9zYYUdmMus2BB1gdC6vMvjP0b6avblwKoKqFmQ=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZ_9zYYUdmMus2BB1gdC6vMvjP0b6avblwKoKqFmQ=s96-c"},"token":"ya29.a0AVvZVsrnnXIXlkctQOsxDmyDAk1o186PmgVtcfmPWGaEOFDkIo2--FRJC7Yw0tcoFVNGF2W6CieUy68GVBBoLQ8ep38FgHE0dUNbsjMOwoypot--AJ-Rq6GD4lYslkkaAm-Kn2u6Cr8tEFhkpRcDxo0xHNKlaCgYKAQ4SARISFQGbdwaIP063oA9A8FPUGK-hQ6FhCQ0163","refreshToken":null,"expiresIn":3599,"approvedScopes":["openid","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email"]}',
                'created_at' => '2023-03-16 16:31:38',
                'updated_at' => '2023-03-16 16:31:38',
            ),
            3 => 
            array (
                'id' => '5',
                'user_id' => '57',
                'provider_id' => '117285088275494490816',
                'provider_name' => 'google',
                'provider_data' => '{"id":"117285088275494490816","nickname":null,"name":"Nu\'man Basir","email":"numanbasir253@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxYMhi3eac8qyB96bS5dBqY1p756C862sQQPGH6-Ng=s96-c","user":{"sub":"117285088275494490816","name":"Nu\'man Basir","given_name":"Nu\'man","family_name":"Basir","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxYMhi3eac8qyB96bS5dBqY1p756C862sQQPGH6-Ng=s96-c","email":"numanbasir253@gmail.com","email_verified":true,"locale":"id","id":"117285088275494490816","verified_email":true,"link":null},"attributes":{"id":"117285088275494490816","nickname":null,"name":"Nu\'man Basir","email":"numanbasir253@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxYMhi3eac8qyB96bS5dBqY1p756C862sQQPGH6-Ng=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxYMhi3eac8qyB96bS5dBqY1p756C862sQQPGH6-Ng=s96-c"},"token":"ya29.a0AVvZVsrcT1A9EvaZ5CLHRaCAWtBrcZ0G-70pVqYt3_lEbZOAmdlEGCXG584IruO83gRBDhXzii7UNv7S7FRSDvkfYBGYononInNtH8PZ0Et06kW2Q4lBG5x7rk455yP1pXzuprZES1kLJScuWYNwaRx4tVLIaCgYKAagSARMSFQGbdwaIfiNNBaAom86RAVRjXxrBHQ0163","refreshToken":null,"expiresIn":3599,"approvedScopes":["https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email","openid"]}',
                'created_at' => '2023-03-18 16:46:48',
                'updated_at' => '2023-03-18 16:46:48',
            ),
            4 => 
            array (
                'id' => '6',
                'user_id' => '185',
                'provider_id' => '104487531083864399394',
                'provider_name' => 'google',
                'provider_data' => '{"id":"104487531083864399394","nickname":null,"name":"DN OFFICIAL","email":"diannopiandi150995@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbTfHZG-FIyfnh2jmyu2Jao3yqy_ETnEC2gnSeNxQ=s96-c","user":{"sub":"104487531083864399394","name":"DN OFFICIAL","given_name":"DN OFFICIAL","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbTfHZG-FIyfnh2jmyu2Jao3yqy_ETnEC2gnSeNxQ=s96-c","email":"diannopiandi150995@gmail.com","email_verified":true,"locale":"id","id":"104487531083864399394","verified_email":true,"link":null},"attributes":{"id":"104487531083864399394","nickname":null,"name":"DN OFFICIAL","email":"diannopiandi150995@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbTfHZG-FIyfnh2jmyu2Jao3yqy_ETnEC2gnSeNxQ=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbTfHZG-FIyfnh2jmyu2Jao3yqy_ETnEC2gnSeNxQ=s96-c"},"token":"ya29.a0AVvZVsooJ0Bo7PAWBylsfIMipcABvKArqOjDpn2tLzyNW3nqO8bolDiHzQiFN45t651XmZdIJ3-QhxiPL8HvAC3cCulxkb9sGetOCQaxX_1hbN9MMMgSHVuyfVBapSxPu7IG7rh6b9whPfaIWZSPbY8oInPMaCgYKAdQSARMSFQGbdwaIg5qVjnXdtopf0J14nKVMjQ0163","refreshToken":null,"expiresIn":3599,"approvedScopes":["https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email","openid","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile"]}',
                'created_at' => '2023-03-18 18:58:58',
                'updated_at' => '2023-03-18 18:58:58',
            ),
            5 => 
            array (
                'id' => '7',
                'user_id' => '26',
                'provider_id' => '112170003616161098358',
                'provider_name' => 'google',
                'provider_data' => '{"id":"112170003616161098358","nickname":null,"name":"Hilmi Fitriani","email":"hilmifuaidah0201@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbCVc48gO_MziUkgYMDqAvrScyikFH7uhsfrXyOtQ=s96-c","user":{"sub":"112170003616161098358","name":"Hilmi Fitriani","given_name":"Hilmi","family_name":"Fitriani","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbCVc48gO_MziUkgYMDqAvrScyikFH7uhsfrXyOtQ=s96-c","email":"hilmifuaidah0201@gmail.com","email_verified":true,"locale":"id","id":"112170003616161098358","verified_email":true,"link":null},"attributes":{"id":"112170003616161098358","nickname":null,"name":"Hilmi Fitriani","email":"hilmifuaidah0201@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbCVc48gO_MziUkgYMDqAvrScyikFH7uhsfrXyOtQ=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbCVc48gO_MziUkgYMDqAvrScyikFH7uhsfrXyOtQ=s96-c"},"token":"ya29.a0AVvZVsoQouuqj0h7AT8hcDFC5RU1lKeF3qr5R2NUJltGFXnPmdHoOxbYYH60Zxak_nY1dKzl6OnwaE9WAw7b7O2f8HSfbAeYAKfIp2noVSpcBPOgdSbdOs7_F2FQBkEdfw__EIr1QZ1Ov15OcRRJrD8k2wU4aCgYKAbkSARISFQGbdwaIfWdoeW58lwia4qzLKRzqfQ0163","refreshToken":null,"expiresIn":3599,"approvedScopes":["https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email","openid"]}',
                'created_at' => '2023-03-18 19:58:42',
                'updated_at' => '2023-03-18 19:58:42',
            ),
            6 => 
            array (
                'id' => '8',
                'user_id' => '79',
                'provider_id' => '112115886152273745145',
                'provider_name' => 'google',
                'provider_data' => '{"id":"112115886152273745145","nickname":null,"name":"Nur Hasan","email":"hnur60443@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZA7-bftL5PVdzV-gfMvub2_AxSITDSTNVWfoiE=s96-c","user":{"sub":"112115886152273745145","name":"Nur Hasan","given_name":"Nur","family_name":"Hasan","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZA7-bftL5PVdzV-gfMvub2_AxSITDSTNVWfoiE=s96-c","email":"hnur60443@gmail.com","email_verified":true,"locale":"id","id":"112115886152273745145","verified_email":true,"link":null},"attributes":{"id":"112115886152273745145","nickname":null,"name":"Nur Hasan","email":"hnur60443@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZA7-bftL5PVdzV-gfMvub2_AxSITDSTNVWfoiE=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZA7-bftL5PVdzV-gfMvub2_AxSITDSTNVWfoiE=s96-c"},"token":"ya29.a0AVvZVsrvIixoTfT18q7MF4hpRqLD-aXT6-idhTPH6Hzf9g1wa5p88hfuX2BK42S7Wev1eyOnzsekJPsJ_ShCBMksfFU6oFNI5TBlctRlzR9JXnhxIo1DPIet1GkZKp5cETCl7pVct6jFDv_NP2Jp0oRUBwe4aCgYKAZkSARASFQGbdwaIfaxPHyonBhf3zNmBqxyFwg0163","refreshToken":null,"expiresIn":3599,"approvedScopes":["openid","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email"]}',
                'created_at' => '2023-03-18 20:35:28',
                'updated_at' => '2023-03-18 20:35:28',
            ),
            7 => 
            array (
                'id' => '9',
                'user_id' => '110',
                'provider_id' => '106555358467315294946',
                'provider_name' => 'google',
                'provider_data' => '{"id":"106555358467315294946","nickname":null,"name":"Rismawanti Awaliah S","email":"rismawas1073@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxYMsS_ljYhP94iIpuOFGeFQGZO-tlisiSjRs_L0=s96-c","user":{"sub":"106555358467315294946","name":"Rismawanti Awaliah S","given_name":"Rismawanti","family_name":"Awaliah S","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxYMsS_ljYhP94iIpuOFGeFQGZO-tlisiSjRs_L0=s96-c","email":"rismawas1073@gmail.com","email_verified":true,"locale":"id","id":"106555358467315294946","verified_email":true,"link":null},"attributes":{"id":"106555358467315294946","nickname":null,"name":"Rismawanti Awaliah S","email":"rismawas1073@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxYMsS_ljYhP94iIpuOFGeFQGZO-tlisiSjRs_L0=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxYMsS_ljYhP94iIpuOFGeFQGZO-tlisiSjRs_L0=s96-c"},"token":"ya29.a0AVvZVsoIdVxqGBhT3CxiLF-OkflailGoCzGd47Qibnasoy2XJ_Caep07OEEIBJp4lj4FYD0BysbmrWdowTg8wVmw4LtCaJZXUqFB7AzCT0QoHbcX2oaMNC48CseZzx1-VOw8ZjD-_kRKkA_9Yr-kCdFzaKcuaCgYKAUQSAQ4SFQGbdwaItjFEtPbOGsU8JEMHurH45Q0163","refreshToken":null,"expiresIn":3599,"approvedScopes":["https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile","openid","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email"]}',
                'created_at' => '2023-03-18 20:45:10',
                'updated_at' => '2023-03-18 20:45:10',
            ),
            8 => 
            array (
                'id' => '10',
                'user_id' => '287',
                'provider_id' => '103508054826506929786',
                'provider_name' => 'google',
                'provider_data' => '{"id":"103508054826506929786","nickname":null,"name":"Dendi Syahril","email":"syahrildendi5@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxYHn8B2dGK-GsC5_HU-7Y1HYy9UxiQqizW2aFKaWA=s96-c","user":{"sub":"103508054826506929786","name":"Dendi Syahril","given_name":"Dendi","family_name":"Syahril","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxYHn8B2dGK-GsC5_HU-7Y1HYy9UxiQqizW2aFKaWA=s96-c","email":"syahrildendi5@gmail.com","email_verified":true,"locale":"id","id":"103508054826506929786","verified_email":true,"link":null},"attributes":{"id":"103508054826506929786","nickname":null,"name":"Dendi Syahril","email":"syahrildendi5@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxYHn8B2dGK-GsC5_HU-7Y1HYy9UxiQqizW2aFKaWA=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxYHn8B2dGK-GsC5_HU-7Y1HYy9UxiQqizW2aFKaWA=s96-c"},"token":"ya29.a0AVvZVsqcTEls2k3OZUbVdD2e3lBTcZ2jrDiotzN3mqI64XZwf2J2DzbnXo0K_wJzAAcDRdGtH-bX96LYWVNwLYUfP39aJUOTQtio8ICxa310fowtE1DufclP6O_NcqU3psiEIkvTMNib6r1Deit_uU9s_Vm0aCgYKAXwSARASFQGbdwaIrID-JZXQJeblLImhQWc69A0163","refreshToken":null,"expiresIn":3599,"approvedScopes":["https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile","openid","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email"]}',
                'created_at' => '2023-03-18 23:07:41',
                'updated_at' => '2023-03-18 23:07:41',
            ),
            9 => 
            array (
                'id' => '11',
                'user_id' => '93',
                'provider_id' => '100783118953728710810',
                'provider_name' => 'google',
                'provider_data' => '{"id":"100783118953728710810","nickname":null,"name":"Abdul Aziz","email":"azizalhazkil24@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbkSlx8bsZiEFBvI2oCVbWDAbRSAeLwUlIFq5S8_g=s96-c","user":{"sub":"100783118953728710810","name":"Abdul Aziz","given_name":"Abdul","family_name":"Aziz","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbkSlx8bsZiEFBvI2oCVbWDAbRSAeLwUlIFq5S8_g=s96-c","email":"azizalhazkil24@gmail.com","email_verified":true,"locale":"id","id":"100783118953728710810","verified_email":true,"link":null},"attributes":{"id":"100783118953728710810","nickname":null,"name":"Abdul Aziz","email":"azizalhazkil24@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbkSlx8bsZiEFBvI2oCVbWDAbRSAeLwUlIFq5S8_g=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxbkSlx8bsZiEFBvI2oCVbWDAbRSAeLwUlIFq5S8_g=s96-c"},"token":"ya29.a0AVvZVsq-VNB1vWdKxTN7Beie4cvGwUQ5jRxTpiiDpzrDbXgT3z4vsrCVxs1wCoBJ0ao0CJ-ANrLJ16Np5XZTKdY2Tg1tGIHOoVBqH2fra8UbxCXwsbw7RaCECyGhMClhRVd-WjB929ghn4KnPGH8XQnh0yxkaCgYKATMSARISFQGbdwaItu5wUDSlTc12wMQeDOp_bg0163","refreshToken":null,"expiresIn":3599,"approvedScopes":["openid","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email"]}',
                'created_at' => '2023-03-19 10:42:30',
                'updated_at' => '2023-03-19 10:42:30',
            ),
            10 => 
            array (
                'id' => '12',
                'user_id' => '291',
                'provider_id' => '111067379234997007384',
                'provider_name' => 'google',
                'provider_data' => '{"id":"111067379234997007384","nickname":null,"name":"Isep Lutpi Nur","email":"iseplutpi1008@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZ0K4YD_ZRNXOgTFzZ0oBQf7ggpKJ-pCE0Oay1oFw=s96-c","user":{"sub":"111067379234997007384","name":"Isep Lutpi Nur","given_name":"Isep","family_name":"Lutpi Nur","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZ0K4YD_ZRNXOgTFzZ0oBQf7ggpKJ-pCE0Oay1oFw=s96-c","email":"iseplutpi1008@gmail.com","email_verified":true,"locale":"id","id":"111067379234997007384","verified_email":true,"link":null},"attributes":{"id":"111067379234997007384","nickname":null,"name":"Isep Lutpi Nur","email":"iseplutpi1008@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZ0K4YD_ZRNXOgTFzZ0oBQf7ggpKJ-pCE0Oay1oFw=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZ0K4YD_ZRNXOgTFzZ0oBQf7ggpKJ-pCE0Oay1oFw=s96-c"},"token":"ya29.a0Ael9sCMiw1ZEJexagQzAg47j2jQNbHkb3gzle40SzbmzBYhxbiMl2n6cXBoHGfO7Xs0ad8fgY11ytD0iaGjc4ExTDfwP21OSmDjNumjnQMFVwem0EAbCHgWPOrGSga89p6L3KdwlYUV37crmCfGs3ZVJYYt1y_caCgYKAaESARISFQF4udJhl7OW5q1yJdCENmxokOCU0w0166","refreshToken":null,"expiresIn":3599,"approvedScopes":["openid","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile"]}',
                'created_at' => '2023-04-20 20:17:13',
                'updated_at' => '2023-04-20 20:17:13',
            ),
            11 => 
            array (
                'id' => '13',
                'user_id' => '290',
                'provider_id' => '116773779989527340914',
                'provider_name' => 'google',
                'provider_data' => '{"id":"116773779989527340914","nickname":null,"name":"Rifqi Munawar R.","email":"rifqimunawar48@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZtJNss5lcjIEgKTzRsVNJjW2mwn2kKQcVWWUlwhQ=s96-c","user":{"sub":"116773779989527340914","name":"Rifqi Munawar R.","given_name":"Rifqi","family_name":"Munawar R.","picture":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZtJNss5lcjIEgKTzRsVNJjW2mwn2kKQcVWWUlwhQ=s96-c","email":"rifqimunawar48@gmail.com","email_verified":true,"locale":"id","id":"116773779989527340914","verified_email":true,"link":null},"attributes":{"id":"116773779989527340914","nickname":null,"name":"Rifqi Munawar R.","email":"rifqimunawar48@gmail.com","avatar":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZtJNss5lcjIEgKTzRsVNJjW2mwn2kKQcVWWUlwhQ=s96-c","avatar_original":"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZtJNss5lcjIEgKTzRsVNJjW2mwn2kKQcVWWUlwhQ=s96-c"},"token":"ya29.a0AWY7Ckkd5FXjMYcIouNXJCuWxmTyUBoTXvbgWAfUse457iz23Q0Y1iYekE03C8g_2BWwpptfUZQarDcoVdBuKwN0v_XKyhYvEbmC1qkNEbVfVyyxsw88tM4behIJgdmshXzEzifHZH4wKfV6nuyT6fbNPNZpaCgYKAbUSARESFQG1tDrpthEGltmrtK-n0E8m6xF8bA0163","refreshToken":null,"expiresIn":3599,"approvedScopes":["openid","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile","https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email"]}',
                'created_at' => '2023-05-16 20:55:40',
                'updated_at' => '2023-05-16 20:55:40',
            ),
        ));
        
        
    }
}