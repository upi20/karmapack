<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sessions')->delete();
        
        \DB::table('sessions')->insert(array (
            0 => 
            array (
                'id' => '0jU7a8Pc6TCFNphJhwM9DGVsogaz57eXAUeuL8xP',
                'user_id' => '16',
                'ip_address' => '114.122.79.68',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.48',
                'payload' => 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTXVSckU5RFRacG5XZk9EeFQ1NWFkVVY4bDZRWDRBazJYTGZKaFlEcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzAwOiJodHRwczovL2thcm1hcGFjay5pZC9sb2FkZXIvanMvcGFnZXMvYWRtaW4va2VwZW5ndXJ1c2FuL3BlcmlvZGUvbGlzdD9jYW5fYWN0aXZlPWZhbHNlJmNhbl9iaWRhbmc9ZmFsc2UmY2FuX2RlbGV0ZT1mYWxzZSZjYW5fc2V0X3JvbGU9ZmFsc2UmY2FuX3VwZGF0ZT1mYWxzZSZocHU9YWRtaW4lMkZrZXBlbmd1cnVzYW4lMkZwZXJpb2RlJmltYWdlX2ZvbGRlcj0lMkZhc3NldHMlMkZwZXJpb2RlJms9TXVSckU5RFRacG5XZk9EeFQ1NWFkVVY4bDZRWDRBazJYTGZKaFlEcCZwYWdlX3RpdGxlPVBlcmlvZGUlMjBLZXBlbmd1cnVzYW4iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNjt9',
                'last_activity' => '1681976790',
            ),
            1 => 
            array (
                'id' => '0PnFwJ0hl0s9on8eZ22I4KiaXEpoPUugC9fKB3yX',
                'user_id' => '1',
                'ip_address' => '114.122.71.76',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.48',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMkpTV3JYTkl5VnJCUU9IM1M0MUUydmhtS3V6SzkxV05mVXkwdUtqdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA1OiJodHRwczovL2thcm1hcGFjay5pZC9sb2FkZXIvanMvYXBwP2hwdT1hZG1pbiUyRnNldHRpbmclMkZhZG1pbiZrPU5USVYwNmdVQ0U3RGtUWExMT3NOc2ZrWW5ZWEFUemxRa1dzVHVMWXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => '1681974716',
            ),
            2 => 
            array (
                'id' => '7uKfA43LhDjXgxQ6U06ZXm8JTSjk3r6HVgRDGtMN',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVA2eGwzMHdIZHQzYVVybnAxMnpYcmpYS1NhdTNkeVhiRm9CRENCSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9rYXJtYXBhY2suaWQuc2F0dWNpbnRhLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => '1681976039',
            ),
            3 => 
            array (
                'id' => '81QTvYrlc09oR9kbjxsaZHJpuxO4O7S2Q4gjkARd',
                'user_id' => NULL,
                'ip_address' => '52.167.144.149',
            'user_agent' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHpZdkZudWpzQXFJWGExVmlzT2Q5VE1UYnB0MWNNOTNONG04UW93NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8va2FybWFwYWNrLmlkL2FobWFkZGlteWF0aXJpZHdhbjE2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',
                'last_activity' => '1681973507',
            ),
            4 => 
            array (
                'id' => 'bW84N2mmZGGV86KJfI3v29YJosdS2dbpZ5N5laLY',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUQ1MTdBSzdTWnNDZXF0Z3dJc2RTeDY1d0VZSWlZMlRuVjhOMTNlaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9rYXJtYXBhY2suaWQuc2F0dWNpbnRhLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => '1681972438',
            ),
            5 => 
            array (
                'id' => 'cHSPqp15zKK6KAhzLgznqVbU3fsw8gYl5A1IgvDz',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiam1CREJaQUZ4bjBpc1BqZ0JDTUh6TzdRRDZsNVZ4Slk3dFhNOVhubSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9rYXJtYXBhY2suaWQuc2F0dWNpbnRhLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => '1681974247',
            ),
            6 => 
            array (
                'id' => 'cjLoo0c44p2uuDe7LGXCGxUI4GT65crTHxrbWEVu',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXUyVGthejJoZlp2Mll5TG15TEtsUUZ5RkE4cmRkY3hsSlBhNzlpOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9rYXJtYXBhY2suaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => '1681974244',
            ),
            7 => 
            array (
                'id' => 'FcJoYVuTWN51KQaLikDmYi90AaQKtjN1IMDJ1Rbg',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHpuWTFkV3BvNUlvbXloQVFBTFlZR2t4OVAzMGFZMVpNMHhOcm8xMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9rYXJtYXBhY2suaWQuc2F0dWNpbnRhLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => '1681970636',
            ),
            8 => 
            array (
                'id' => 'jpQgNOWRtv16Yblk4Yg7pnn2rv2cop4YiCb0kKER',
                'user_id' => '1',
                'ip_address' => '114.122.71.76',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.48',
                'payload' => 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib2tBODA3ZlBlV1I0V3ZYdmtLb0JpV0I2S0FFMUg0amlpOUV2WHZXTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTE0OiJodHRwczovL2thcm1hcGFjay5pZC9sb2FkZXIvanMvcGFnZXMvYWRtaW4vYWRtaW4/aHB1PW1lbWJlciUyRmRhc2hib2FyZCZrPU5USVYwNmdVQ0U3RGtUWExMT3NOc2ZrWW5ZWEFUemxRa1dzVHVMWXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',
                'last_activity' => '1681974736',
            ),
            9 => 
            array (
                'id' => 'K9xDwklYY8o9ElVsb2tCLymYUaYkjzjstbnkvM5B',
                'user_id' => NULL,
                'ip_address' => '40.77.167.83',
            'user_agent' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSVZ4THpkNzcyb2xuckxwWEpzMHo2TWJ2WFVNZGFlOUxPNER3eGMwMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8va2FybWFwYWNrLmlkL2FndXMtZW5kYW5nMjAyMzAzMTcyMzQ1NDk3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',
                'last_activity' => '1681976687',
            ),
            10 => 
            array (
                'id' => 'l1toviTMHakysReRlLlO8RZKuCMlpUAxLeVqjxt2',
                'user_id' => NULL,
                'ip_address' => '114.122.22.82',
            'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZDBjZ3hTVVRiOGRtVTdNcTliZENJUkd2T3owaE1OQ3BiNVJLRkNkNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8va2FybWFwYWNrLmlkL2tvbnRhayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => '1681973691',
            ),
            11 => 
            array (
                'id' => 'n27C2EChkdoulq4gsDqpjvHjL4jhjGDxWi2IjNiV',
                'user_id' => '1',
                'ip_address' => '114.122.71.76',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.48',
                'payload' => 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib2tBODA3ZlBlV1I0V3ZYdmtLb0JpV0I2S0FFMUg0amlpOUV2WHZXTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTE0OiJodHRwczovL2thcm1hcGFjay5pZC9sb2FkZXIvanMvcGFnZXMvYWRtaW4vYWRtaW4/aHB1PW1lbWJlciUyRmRhc2hib2FyZCZrPU5USVYwNmdVQ0U3RGtUWExMT3NOc2ZrWW5ZWEFUemxRa1dzVHVMWXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',
                'last_activity' => '1681974736',
            ),
            12 => 
            array (
                'id' => 'ojiGYWGoOh58rRhwMCV7L1sliinoojvyUSzNiRgo',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamY5RWlWTDFxckpIY0FYeVN0YXBiWEZXeU1FOEZ4U0w1V0d4U3o2eiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9rYXJtYXBhY2suaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => '1681972435',
            ),
            13 => 
            array (
                'id' => 'QVIHc1qt0wCvgSwoHScgq6UHxrSmMeFFPP5xpBSc',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSlRLNE5QaGI0Zk1WSXBvdkM0ODZ2RHdXUjVzc05aY1hMSDVYRmhTdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9rYXJtYXBhY2suaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => '1681976037',
            ),
            14 => 
            array (
                'id' => 'uOaYAigBOgN0B6aRbnVOW5fK1RH1xUgFCpnuWHNv',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib3BFZFpLZ24ycUZsdVNjNGJYZDBDVnZ1YXlLZ0I0OW40TXY3TGFPcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9rYXJtYXBhY2suaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => '1681970632',
            ),
            15 => 
            array (
                'id' => 'yIECPwZ1jMrMDNZydedutdA2BB3YpptqSCZ6S1Mw',
                'user_id' => '1',
                'ip_address' => '114.122.71.76',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.48',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVVTemZ4SjZMY2M0c3RUQUNuR2p4TVVKSnlYMFlYRzIzMm0zaVc5VyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => '1681974736',
            ),
        ));
        
        
    }
}