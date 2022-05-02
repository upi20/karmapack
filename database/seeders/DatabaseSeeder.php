<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::create([
        //     'name' => 'Isep Lutpi Nur',
        //     'email' => 'iseplutpinur7@gmail.com',
        //     'password' => bcrypt('123456'),
        //     'role' => User::ROLE_ADMIN,
        //     'active' => '1'
        // ]);
        // \App\Models\User::factory(150)->create();

        // address seeders
        AddressProvinceSeeders::run();
        AddressRegenciesSeeder::run();
        AddressDistrictSeeders::run();
        AddressVillageSeeders::run();

        // ============================================================================================================
        // ============================================================================================================

        // backup artikel
        // php artisan iseed users,artikel,artikel_tag,artikel_kategori,artikel_tag_item,artikel_kategori_item --force

        // backup galeri
        // php artisan iseed users,galeri,galeri_tag_member --force

        // backup pengurus
        // php artisan iseed users,pengurus_periode,pengurus_periode_jabatan,pengurus_periode_jabatan_member,pengurus_periode_member --force

        // backup profile
        // php artisan iseed users,pengurus_profile_kontak,pengurus_profile_kontak_tipe,pengurus_profile_pendidikan,pengurus_profile_pendidikan_jenis,pengurus_profile_pengalaman_lain,pengurus_profile_pengalaman_organisasi --force

        // backup lainnya
        // php artisan iseed users,social_media,contacts,footer_instagrams,username_validations,galeri_tag_member --force

        // backup frontend
        // php artisan iseed users,pendaftarans,pend_sensus --force

        // ============================================================================================================
        // ============================================================================================================

        // master
        $this->call(UsersTableSeeder::class);

        // artikel
        $this->call(ArtikelTableSeeder::class);

        // artikel kategori
        $this->call(ArtikelKategoriTableSeeder::class);
        $this->call(ArtikelKategoriItemTableSeeder::class);

        // artikel tag
        $this->call(ArtikelTagTableSeeder::class);
        $this->call(ArtikelTagItemTableSeeder::class);

        // galeri
        $this->call(GaleriTableSeeder::class);

        // Pengurus
        $this->call(PengurusPeriodeTableSeeder::class);
        $this->call(PengurusPeriodeMemberTableSeeder::class);

        // pengurus jabatan
        $this->call(PengurusPeriodeJabatanTableSeeder::class);
        $this->call(PengurusPeriodeJabatanMemberTableSeeder::class);

        // profile kontak
        $this->call(PengurusProfileKontakTipeTableSeeder::class);
        $this->call(PengurusProfileKontakTableSeeder::class);

        // profile pendidikan
        $this->call(PengurusProfilePendidikanJenisTableSeeder::class);
        $this->call(PengurusProfilePendidikanTableSeeder::class);

        // profile pengalaman
        $this->call(PengurusProfilePengalamanLainTableSeeder::class);
        $this->call(PengurusProfilePengalamanOrganisasiTableSeeder::class);

        // profiel hobbies
        $this->call(HobbiesTableSeeder::class);

        // Lainnya
        $this->call(SocialMediaTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(FooterInstagramsTableSeeder::class);
        $this->call(UsernameValidationsTableSeeder::class);
        $this->call(GaleriTagMemberTableSeeder::class);
        $this->call(PendaftaransTableSeeder::class);
        $this->call(PendSensusTableSeeder::class);
    }
}
