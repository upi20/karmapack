<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PendSensusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pend_sensus')->delete();
        
        \DB::table('pend_sensus')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'Isep Lutpi Nur',
                'angkatan' => '2019',
                'email' => 'iseplutpinur7@gmail.com',
                'whatsapp' => '085798132505',
                'telepon' => '085798132505',
                'keterangan' => NULL,
                'status' => '1',
                'created_at' => '2022-05-06 20:24:03',
                'updated_at' => '2022-06-26 04:11:57',
            ),
            1 => 
            array (
                'id' => '2',
                'nama' => 'Tes Sensus 2',
                'angkatan' => '2020',
                'email' => 'tes@email.com',
                'whatsapp' => '085798132505',
                'telepon' => '085798132505',
                'keterangan' => 'Email Sudah digunakan',
                'status' => '3',
                'created_at' => '2022-05-06 20:46:27',
                'updated_at' => '2022-05-07 00:55:21',
            ),
            2 => 
            array (
                'id' => '3',
                'nama' => 'ISEP LUTPI NUR iseplutpinur',
                'angkatan' => '2020',
                'email' => 'iseplutpinur7@gmail.com',
                'whatsapp' => '08579813250',
                'telepon' => '085798132505',
                'keterangan' => NULL,
                'status' => '0',
                'created_at' => '2022-05-07 01:11:59',
                'updated_at' => '2022-05-07 01:11:59',
            ),
            3 => 
            array (
                'id' => '4',
                'nama' => 'Isep Lutpi Nur',
                'angkatan' => '2021',
                'email' => 'iseplutpi1008@gmail.com',
                'whatsapp' => '085798132505',
                'telepon' => '+6285798132505',
                'keterangan' => NULL,
                'status' => '0',
                'created_at' => '2022-05-07 01:12:25',
                'updated_at' => '2022-05-07 01:12:25',
            ),
            4 => 
            array (
                'id' => '5',
                'nama' => 'PENGUMPULAN DATA PENGURUS KARMAPACK PERIODE 2022-2023',
                'angkatan' => '2022',
                'email' => 'asadf@gmail.com',
                'whatsapp' => 'asdfasdf',
                'telepon' => 'asfsdafsadf',
                'keterangan' => NULL,
                'status' => '0',
                'created_at' => '2022-08-09 23:31:45',
                'updated_at' => '2022-08-09 23:31:45',
            ),
            5 => 
            array (
                'id' => '6',
                'nama' => 'Salafia al zahra fauzia',
                'angkatan' => '2019',
                'email' => 'salafiaalzahraf@gmail.com',
                'whatsapp' => '081461236251',
                'telepon' => '081461236251',
                'keterangan' => NULL,
                'status' => '0',
                'created_at' => '2022-08-30 17:38:11',
                'updated_at' => '2022-08-30 17:38:11',
            ),
            6 => 
            array (
                'id' => '7',
                'nama' => 'Imat Rohimat',
                'angkatan' => '2021',
                'email' => 'irohimat323@gmail.com',
                'whatsapp' => '085714952976',
                'telepon' => '085714952976',
                'keterangan' => NULL,
                'status' => '0',
                'created_at' => '2022-08-30 17:59:07',
                'updated_at' => '2022-08-30 17:59:07',
            ),
            7 => 
            array (
                'id' => '8',
                'nama' => 'Ragil JS Munster',
                'angkatan' => '2021',
                'email' => 'ragilsaputra211998@gmail.com',
                'whatsapp' => '085156810593',
                'telepon' => '085156810593',
                'keterangan' => NULL,
                'status' => '0',
                'created_at' => '2022-08-30 18:06:29',
                'updated_at' => '2022-08-30 18:06:29',
            ),
            8 => 
            array (
                'id' => '9',
                'nama' => 'Ilham m faisal',
                'angkatan' => '2019',
                'email' => 'Ilhamdebofaisal@gmail.com',
                'whatsapp' => '081573444591',
                'telepon' => '081573444591',
                'keterangan' => NULL,
                'status' => '0',
                'created_at' => '2022-08-30 19:24:39',
                'updated_at' => '2022-08-30 19:24:39',
            ),
            9 => 
            array (
                'id' => '10',
                'nama' => 'Encep Abdul Hakim',
                'angkatan' => '2020',
                'email' => 'encep_abdul_hakim@mail.com',
                'whatsapp' => '085524947588',
                'telepon' => '085524947588',
                'keterangan' => NULL,
                'status' => '0',
                'created_at' => '2022-08-31 17:33:56',
                'updated_at' => '2022-08-31 17:33:56',
            ),
            10 => 
            array (
                'id' => '11',
                'nama' => 'Isep Lutpi Nur',
                'angkatan' => '2019',
                'email' => 'iseplutpinur7@gmail.com',
                'whatsapp' => '5798132505',
                'telepon' => '5798132505',
                'keterangan' => NULL,
                'status' => '0',
                'created_at' => '2022-12-16 23:27:27',
                'updated_at' => '2023-03-08 14:21:09',
            ),
            11 => 
            array (
                'id' => '12',
                'nama' => 'Tes sensus',
                'angkatan' => '2000',
                'email' => 'DavinKoss@mail.com',
                'whatsapp' => '123',
                'telepon' => '085',
                'keterangan' => 'Sudah dijadikan pengguna dengan email: DavinKoss@mail.com dan password: 12345678',
                'status' => '2',
                'created_at' => '2023-03-18 05:21:08',
                'updated_at' => '2023-03-18 05:21:08',
            ),
            12 => 
            array (
                'id' => '13',
                'nama' => 'M Dendi Syahril Sidik',
                'angkatan' => '2019',
                'email' => 'syahrildendi5@gmail.com',
                'whatsapp' => '083816129107',
                'telepon' => '083816129107',
                'keterangan' => 'Sudah dijadikan pengguna dengan email: syahrildendi5@gmail.com dan password: 12345678',
                'status' => '2',
                'created_at' => '2023-03-18 23:07:24',
                'updated_at' => '2023-03-18 23:07:24',
            ),
            13 => 
            array (
                'id' => '14',
                'nama' => 'Isep lutpi nur testing',
                'angkatan' => '2022',
                'email' => 'iseplutpinur8@gmail.com',
                'whatsapp' => '85798132055',
                'telepon' => '+6285798132505',
                'keterangan' => 'Sudah dijadikan pengguna dengan email: iseplutpinur8@gmail.com dan password: 12345678',
                'status' => '2',
                'created_at' => '2023-03-24 05:44:10',
                'updated_at' => '2023-03-24 05:44:10',
            ),
            14 => 
            array (
                'id' => '15',
                'nama' => 'Silvia Anggraeni',
                'angkatan' => '2021',
                'email' => 'silviaanggraeni183@gmail.com',
                'whatsapp' => '082315805012',
                'telepon' => '+62 856-9337-2448',
                'keterangan' => 'Sudah dijadikan pengguna dengan email: silviaanggraeni183@gmail.com dan password: 12345678',
                'status' => '2',
                'created_at' => '2023-03-28 19:13:07',
                'updated_at' => '2023-03-28 19:13:07',
            ),
            15 => 
            array (
                'id' => '16',
                'nama' => 'Rifqi Munawar Ridwan',
                'angkatan' => '2022',
                'email' => 'rifqimunawar48@gmail.com',
                'whatsapp' => '08561145097',
                'telepon' => '08561145097',
                'keterangan' => 'Sudah dijadikan pengguna dengan email: rifqimunawar48@gmail.com dan password: 12345678',
                'status' => '2',
                'created_at' => '2023-04-03 16:19:42',
                'updated_at' => '2023-04-03 16:19:42',
            ),
            16 => 
            array (
                'id' => '17',
                'nama' => 'Isep Lutpi Nur',
                'angkatan' => '2022',
                'email' => 'iseplutpi1008@gmail.com',
                'whatsapp' => '5798132505',
                'telepon' => '5798132505',
                'keterangan' => 'Sudah dijadikan pengguna dengan email: iseplutpi1008@gmail.com dan password: 12345678',
                'status' => '2',
                'created_at' => '2023-04-20 20:16:14',
                'updated_at' => '2023-04-20 20:16:14',
            ),
            17 => 
            array (
                'id' => '18',
                'nama' => 'Fikih Firmansyah',
                'angkatan' => '2020',
                'email' => 'fikihfirmansyah43@gmail.com',
                'whatsapp' => '6282370382008',
                'telepon' => '082370382008',
                'keterangan' => 'Sudah dijadikan pengguna dengan email: fikihfirmansyah43@gmail.com dan password: 12345678',
                'status' => '2',
                'created_at' => '2023-04-20 20:27:23',
                'updated_at' => '2023-04-20 20:27:23',
            ),
            18 => 
            array (
                'id' => '19',
                'nama' => 'sarmin',
                'angkatan' => '2002',
                'email' => 'admin@admin.com',
                'whatsapp' => '082252427270',
                'telepon' => '085920524238',
                'keterangan' => 'Sudah dijadikan pengguna dengan email: admin@admin.com dan password: 12345678',
                'status' => '2',
                'created_at' => '2023-06-01 15:57:21',
                'updated_at' => '2023-06-01 15:57:21',
            ),
        ));
        
        
    }
}