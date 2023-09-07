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
                'id' => '0506nIHPQNLBir5wuUvzkFY3oPvUx3clnl7ilG6X',
                'user_id' => NULL,
                'ip_address' => '54.36.149.41',
            'user_agent' => 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieE02WFpGQUZGdW1MNkx5TjNvQkdzNllYbmNHMVBYTFkydEhsclJESyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njg6Imh0dHBzOi8vd3d3Lmthcm1hcGFjay5pZC9hbmdnb3RhP3NlYXJjaD1TTUslMjBOZWdlcmklMjAxJTIwVGFuZ2dldW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',
                'last_activity' => '1694002796',
            ),
            1 => 
            array (
                'id' => '363kIeoQQU7cIzYspjRSDW1516nkDRpYpi10GC27',
                'user_id' => NULL,
                'ip_address' => '54.36.148.241',
            'user_agent' => 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSVZXRFE0VHZNTDJjYTZYRzhsbUlLT2FsTFN4aVhjdUhIWTVQZUFmWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8va2FybWFwYWNrLmlkL2FiZHVsX2F6aXoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => '1694001578',
            ),
            2 => 
            array (
                'id' => '9cGwvG8oeGKpLLyX4BYSGpEgyeMnmUimtWSVNIgb',
                'user_id' => NULL,
                'ip_address' => '40.77.190.212',
            'user_agent' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/112.0.0.0 Safari/537.36',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWkN5SURWYWlId05Wblh5NVRCUkJya3pYa25ZTUJhajl1WjRsNmxFaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM0OiJodHRwczovL2thcm1hcGFjay5pZC9sb2FkZXIvanMvcGFnZXMvZnJvbnRlbmQvZnJvbnRlbmQ/aHB1PXRlbnRhbmclMkZrZXBlbmd1cnVzYW4lMkZwZXJpb2RlJms9VndRd29maGpvN0JaUFdWdE5TNzZZYTcxS0VJZTg3R0dKelM1T25sTSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => '1694004916',
            ),
            3 => 
            array (
                'id' => 'afWEn4wxtwErRmDI6hwW24qRaYvejCMd8rjXdenV',
                'user_id' => NULL,
                'ip_address' => '40.77.167.65',
            'user_agent' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaEZ1OHZ3VjNncXBaV3Q4cEdPbnZ1R0xGWUJ3MjdOZFFvdk9pdzUzMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8va2FybWFwYWNrLmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',
                'last_activity' => '1694004864',
            ),
            4 => 
            array (
                'id' => 'dkXCD8rKf9MBMdBIC5jCF4Q5uogz0arpS0KLmFaf',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoialljYnRFWVM4bDVWU3VSODA3cUFpZHFLS1RkYzlRVEVGSzZQczI2VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9rYXJtYXBhY2suaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => '1693998334',
            ),
            5 => 
            array (
                'id' => 'K1DXJme5RqMqHekNr4hkNjhgGIs3NeAjDehuSVEr',
                'user_id' => NULL,
                'ip_address' => '54.36.148.186',
            'user_agent' => 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieUc5ZERwenROZE9RVndxZ3BIOTZQRmZkU1NmNmdEYjlGQWdnRlJOTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly93d3cua2FybWFwYWNrLmlkL2FuZ2dvdGE/c2VhcmNoPVVuaXZlcnNpdGFzJTIwUGFzdW5kYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => '1693998237',
            ),
            6 => 
            array (
                'id' => 'km4sIGLdrb3gYvsVCLMzcSk6xsDItErW5mxOKhUA',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUk1zQ29HWWJlcXZsQlJmWFlLcVlWcDV1aU1TcFZXTXZDUlpNZXJsNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9rYXJtYXBhY2suaWQuc2F0dWNpbnRhLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => '1694000125',
            ),
            7 => 
            array (
                'id' => 'lcO63a8l1E8Pif5df9vG85BiBmDgmLchDisUuGH3',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWDBPZmdveXRLZ0l3MnRESWc4MDR6RThPaVFmb1F2VkRJZXJqVGZzNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9rYXJtYXBhY2suaWQuc2F0dWNpbnRhLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => '1693998331',
            ),
            8 => 
            array (
                'id' => 'MLt6WMqUuxMJHfqubFN0YAChdOWDshtppCMfhaqv',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSEhQb0I4UFhqZGJ6R0o3am5oQzlCOUo0d20zUEN2UFd4OXo1dGhVWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9rYXJtYXBhY2suaWQuc2F0dWNpbnRhLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => '1694003696',
            ),
            9 => 
            array (
                'id' => 'pHzGkibCk7ci4zDWga9Dj0OSG6uHnfnJiEt9eB4g',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkxjRXNWd0Z6NkFtSnFiSWpydE9TQWRCQmcwUWE4ZWpLMWtieGtpYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9rYXJtYXBhY2suaWQuc2F0dWNpbnRhLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => '1694001918',
            ),
            10 => 
            array (
                'id' => 'pOjcEQswanSLXxogP9zyLBmfufDZdMoGcaJEIrWF',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicm5VNGhTZlhvWUltNFJ1N0JGYXFaOHVHNldUeUNDOEVVZGREVXpEaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9rYXJtYXBhY2suaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => '1694003698',
            ),
            11 => 
            array (
                'id' => 'PsGRozovmvEb8erU3NRUaOx5u5sRppjmjekVhOQi',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDZPZ1JQOUJZNmNIZ0hWMzNBd2tBUmo1aklwSnBKSURDN2p0b09DOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9rYXJtYXBhY2suaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => '1694001919',
            ),
            12 => 
            array (
                'id' => 'RhJ4U6r6bgS0tn4Xi6JiTahMpGXCtuWbOMWovbGP',
                'user_id' => NULL,
                'ip_address' => '54.36.148.39',
            'user_agent' => 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnJvcmZZbWh2S0ZVd0pXaTc5bEs1RXFYRFFpaDdWU3BMUThaZ05TSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzQ6Imh0dHBzOi8va2FybWFwYWNrLmlkL3RlbnRhbmcva2VwZW5ndXJ1c2FuL2JpZGFuZy8yMDIyLTIwMjMtbWluYXQtZGFuLWJha2F0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',
                'last_activity' => '1694004651',
            ),
            13 => 
            array (
                'id' => 'SMkRAkziHJIKE643SBe2IgjFwRoym1SH4OHr5X7a',
                'user_id' => NULL,
                'ip_address' => '52.167.144.220',
            'user_agent' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVndRd29maGpvN0JaUFdWdE5TNzZZYTcxS0VJZTg3R0dKelM1T25sTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8va2FybWFwYWNrLmlkL3RlbnRhbmcva2VwZW5ndXJ1c2FuL3BlcmlvZGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => '1694003942',
            ),
            14 => 
            array (
                'id' => 'SrsvMsvTBheFDHEaabH5jVwnnxIbDmucZ021P442',
                'user_id' => '1',
                'ip_address' => '103.90.64.253',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 Edg/116.0.1938.69',
                'payload' => 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOU1XRG9Xd1RWaGZ3c2UxNEdEOVJ5Z0FaQzNkaXZud2JnNU1hMjk5diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTk6Imh0dHBzOi8va2FybWFwYWNrLmlkL2xvYWRlci9qcy9hcHA/aHB1PWFkbWluJTJGZGFzaGJvYXJkJms9OU1XRG9Xd1RWaGZ3c2UxNEdEOVJ5Z0FaQzNkaXZud2JnNU1hMjk5diI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToic3RhdGUiO3M6NDA6IkFMbEE1Q1hIWldDSDkySG03S1ZsYkhiTmlVZ2FIazdyMlB1OWVlTnEiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',
                'last_activity' => '1694004055',
            ),
            15 => 
            array (
                'id' => 'URIYUdIoVckeZCKG502vzMFxvpq0UxZegULt2Amb',
                'user_id' => NULL,
                'ip_address' => '185.229.118.32',
                'user_agent' => 'Go-http-client/1.1',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidjNTcFE2OFF0NUFuOWxaSTUzem96bEkyVlN4TDVKeUxjNE9ydkxEMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9rYXJtYXBhY2suaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => '1694000126',
            ),
            16 => 
            array (
                'id' => 'vvNvyxKtxg8tUxN3soeAIMZIizLyWuOEfldKWxqY',
                'user_id' => NULL,
                'ip_address' => '40.77.167.65',
            'user_agent' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYm9GOWhPNVU1TjRXUVBOZDhobndySmJRRWoyaVBBZkVEYkdWUm9LMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8va2FybWFwYWNrLmlkL2FuZ2dvdGE/c2VhcmNoPTIwMjMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => '1694005144',
            ),
        ));
        
        
    }
}