<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AnggotaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        User::insert([
            ['id' => '6', 'name' => 'Isep Lutpi Nur', 'date_of_birth' => '2000-08-10', 'angkatan' => '2012', 'email' => 'iseplutpinur7@gmail.com2', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '7', 'name' => 'Pengurus 2', 'date_of_birth' => '2001-02-01', 'angkatan' => '2019', 'email' => 'pengurus2@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '9', 'name' => 'Ilham Solehudin', 'date_of_birth' => '2000-08-13', 'angkatan' => '2019', 'email' => 'ilham@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '14', 'name' => 'Pengurus 2', 'date_of_birth' => '2000-08-14', 'angkatan' => '2011', 'email' => 'pengurus2@gmail.coma', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '16', 'name' => 'Hilal', 'date_of_birth' => '2000-04-25', 'angkatan' => '2018', 'email' => 'hilal@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '17', 'name' => 'Nita H', 'date_of_birth' => '2002-06-15', 'angkatan' => '2018', 'email' => 'nita_h@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '18', 'name' => 'Isep Lutpi Nur', 'date_of_birth' => '2000-08-10', 'angkatan' => '2018', 'email' => 'isep_lutpi_nur@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '19', 'name' => 'Abdul Muhlis', 'date_of_birth' => '2001-03-24', 'angkatan' => '2018', 'email' => 'abdul_muhlis@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '20', 'name' => 'Andi Taufik Permadi', 'date_of_birth' => '1999-06-13', 'angkatan' => '2018', 'email' => 'andi_taufik_permadi@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '21', 'name' => 'Sukirman Maulana', 'date_of_birth' => '2000-01-30', 'angkatan' => '2018', 'email' => 'sukirman_maulana@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '22', 'name' => 'Dewi', 'date_of_birth' => '2001-09-19', 'angkatan' => '2018', 'email' => 'dewi@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '23', 'name' => 'Wiwit Awaliyah', 'date_of_birth' => '2000-11-02', 'angkatan' => '2018', 'email' => 'wiwit_awaliyah@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '24', 'name' => 'Saepul rohman', 'date_of_birth' => '2000-05-10', 'angkatan' => '2018', 'email' => 'saepul_rohman@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '25', 'name' => 'Raden Bintang', 'date_of_birth' => '2002-07-25', 'angkatan' => '2018', 'email' => 'raden_bintang@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '26', 'name' => 'Hilmi Fitriani', 'date_of_birth' => '2000-12-29', 'angkatan' => '2018', 'email' => 'hilmi_fitriani@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '27', 'name' => 'Samsul Maarip', 'date_of_birth' => '2001-01-15', 'angkatan' => '2018', 'email' => 'samsul_maarip@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '28', 'name' => 'Muhamad Raihan Rahman', 'date_of_birth' => '2000-09-23', 'angkatan' => '2018', 'email' => 'muhamad_raihan_rahman@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '29', 'name' => 'Akbar Muhamad Ashoni', 'date_of_birth' => '2002-03-01', 'angkatan' => '2018', 'email' => 'akbar_muhamad_ashoni@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '30', 'name' => 'Wahid Nursidik', 'date_of_birth' => '2000-06-04', 'angkatan' => '2018', 'email' => 'wahid_nursidik@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '31', 'name' => 'M faisal l', 'date_of_birth' => '2001-06-13', 'angkatan' => '2018', 'email' => 'm_faisal_l@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '32', 'name' => 'Salafia al zahra fauzia', 'date_of_birth' => '2001-06-07', 'angkatan' => '2018', 'email' => 'salafia_al_zahra_fauzia@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '33', 'name' => 'Yusi Yusfita', 'date_of_birth' => '2001-04-15', 'angkatan' => '2018', 'email' => 'yusi_yusfita@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '34', 'name' => 'Cucu Maryam Nurpadilah', 'date_of_birth' => '2000-10-10', 'angkatan' => '2018', 'email' => 'cucu_maryam_nurpadilah@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '35', 'name' => 'Rifki Alfaizar', 'date_of_birth' => '2000-03-01', 'angkatan' => '2018', 'email' => 'rifki_alfaizar@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '36', 'name' => 'M. Ridwan Abdul Aziz', 'date_of_birth' => '2000-03-01', 'angkatan' => '2018', 'email' => 'm._ridwan_abdul_aziz@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '37', 'name' => 'Novianti', 'date_of_birth' => '2000-02-25', 'angkatan' => '2018', 'email' => 'novianti@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '38', 'name' => 'Ayu pratiwi isman', 'date_of_birth' => '2000-01-05', 'angkatan' => '2018', 'email' => 'ayu_pratiwi_isman@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '39', 'name' => 'Ai rahma alia', 'date_of_birth' => '2000-01-01', 'angkatan' => '2018', 'email' => 'ai_rahma_alia@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '40', 'name' => 'Andi auliansyah', 'date_of_birth' => '1998-09-27', 'angkatan' => '2018', 'email' => 'andi_auliansyah@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '41', 'name' => 'Khoridarul anisa', 'date_of_birth' => '2002-01-29', 'angkatan' => '2018', 'email' => 'khoridarul_anisa@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '42', 'name' => 'Alwan A F', 'date_of_birth' => '2001-04-18', 'angkatan' => '2018', 'email' => 'alwan_a_f@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '43', 'name' => 'Muhammad Cahyadi', 'date_of_birth' => '1999-08-16', 'angkatan' => '2018', 'email' => 'muhammad_cahyadi@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '44', 'name' => 'Ahmad Kamil', 'date_of_birth' => '1999-02-16', 'angkatan' => '2018', 'email' => 'ahmad_kamil@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '45', 'name' => 'Sri Ayuni Wahyudin', 'date_of_birth' => '2002-03-20', 'angkatan' => '2018', 'email' => 'sri_ayuni_wahyudin@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '46', 'name' => 'Encep Abdul Hakim', 'date_of_birth' => '2001-08-27', 'angkatan' => '2018', 'email' => 'encep_abdul_hakim@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '47', 'name' => 'Lindawati Rusliha', 'date_of_birth' => '1999-10-24', 'angkatan' => '2018', 'email' => 'lindawati_rusliha@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '48', 'name' => 'Moh Syahrul Ramdan', 'date_of_birth' => '1999-10-24', 'angkatan' => '2018', 'email' => 'moh_syahrul_ramdan@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '49', 'name' => 'Lina Herlina', 'date_of_birth' => '1999-12-14', 'angkatan' => '2018', 'email' => 'lina_herlina@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '50', 'name' => 'Agustiani Sri Rahayu', 'date_of_birth' => '2001-10-01', 'angkatan' => '2018', 'email' => 'agustiani_sri_rahayu@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '51', 'name' => 'Ruri C. Hetiawati', 'date_of_birth' => '2000-10-26', 'angkatan' => '2018', 'email' => 'ruri_c._hetiawati@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '52', 'name' => 'Rinrin Irmayani', 'date_of_birth' => '2000-10-30', 'angkatan' => '2018', 'email' => 'rinrin_irmayani@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '53', 'name' => 'Ai Dian Haerani', 'date_of_birth' => '2001-04-15', 'angkatan' => '2018', 'email' => 'ai_dian_haerani@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '54', 'name' => 'Aprilia utami Herdi', 'date_of_birth' => '2002-04-03', 'angkatan' => '2018', 'email' => 'aprilia_utami_herdi@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '55', 'name' => 'Siti Basiroh', 'date_of_birth' => '2000-07-08', 'angkatan' => '2018', 'email' => 'siti_basiroh@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '56', 'name' => 'Odoss', 'date_of_birth' => '2000-05-01', 'angkatan' => '2018', 'email' => 'odoss@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '57', 'name' => 'Aang', 'date_of_birth' => '1999-09-08', 'angkatan' => '2018', 'email' => 'aang@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
            ['id' => '58', 'name' => 'Maulana Yusuf', 'date_of_birth' => '2000-04-29', 'angkatan' => '2018', 'email' => 'maulana_yusuf@gmail.com', 'password' => '$2y$10$RXfPXJbC1.xQUnN6TwSObOheoyW0Vw0pwTCRVBfEMnb.I4NyTQRAW', 'active' => '1', 'role' => 'user'],
        ]);
    }
}
