<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        //     'active' => '1'
        // ]);
        // \App\Models\User::factory(150)->create();
        DB::beginTransaction();
        // address seeders
        AddressProvinceSeeders::run();
        AddressRegenciesSeeder::run();
        AddressDistrictSeeders::run();
        AddressVillageSeeders::run();

        // master
        $this->call(UsersTableSeeder::class);

        // user role
        $this->call(PRolesTableSeeder::class);
        $this->call(PPermissionsTableSeeder::class);
        $this->call(PModelHasPermissionsTableSeeder::class);
        $this->call(PModelHasRolesTableSeeder::class);
        $this->call(PRoleHasPermissionsTableSeeder::class);

        // role menu
        $this->call(PMenuTableSeeder::class);
        $this->call(PRoleHasMenuTableSeeder::class);

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

        // contact
        $this->call(ContactListTableSeeder::class);
        $this->call(ContactMessagesTableSeeder::class);
        $this->call(FaqTableSeeder::class);

        // Lainnya
        $this->call(SocialMediaTableSeeder::class);
        $this->call(FooterInstagramsTableSeeder::class);
        $this->call(UsernameValidationsTableSeeder::class);
        $this->call(GaleriTagMemberTableSeeder::class);
        $this->call(PendaftaransTableSeeder::class);
        $this->call(PendSensusTableSeeder::class);
        $this->call(KataAlumnisTableSeeder::class);
        $this->call(HariBesarNasionalsTableSeeder::class);
        $this->call(GFormsTableSeeder::class);
        $this->call(NotifAdminAtasTableSeeder::class);
        $this->call(NotifDepanAtasTableSeeder::class);
        $this->call(PMenuFrontendsTableSeeder::class);
        DB::commit();
        $this->call(InstagramTableSeeder::class);
    }
}
