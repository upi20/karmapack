<?php

namespace Database\Seeders;

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
        // address
        $this->call(AddressProvinceSeeders::class);
        $this->call(AddressRegenciesSeeder::class);
        $this->call(AddressDistrictSeeders::class);
        $this->call(AddressVillageSeeders::class);

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

        // contact
        $this->call(ContactListTableSeeder::class);
        $this->call(ContactMessagesTableSeeder::class);
        $this->call(FaqTableSeeder::class);

        // Lainnya
        $this->call(SocialMediaTableSeeder::class);
        $this->call(UsernameValidationsTableSeeder::class);
        $this->call(PendSensusTableSeeder::class);
        $this->call(KataAlumnisTableSeeder::class);
        $this->call(HariBesarNasionalsTableSeeder::class);
        $this->call(GFormsTableSeeder::class);
        $this->call(NotifAdminAtasTableSeeder::class);
        $this->call(NotifDepanAtasTableSeeder::class);
        $this->call(PMenuFrontendsTableSeeder::class);
        $this->call(InstagramTableSeeder::class);

        // Keanggotaan
        $this->call(AnggotaKontakJenisTableSeeder::class);
        $this->call(AnggotaPendidikanJenisTableSeeder::class);
        $this->call(AnggotasTableSeeder::class);
        $this->call(AnggotaHobisTableSeeder::class);
        $this->call(AnggotaKontaksTableSeeder::class);
        $this->call(AnggotaPendidikansTableSeeder::class);
        $this->call(AnggotaPengalamanLainsTableSeeder::class);
        $this->call(AnggotaPengalamanOrganisasisTableSeeder::class);

        // Kepengurusan
        $this->call(PengurusPeriodesTableSeeder::class);
        $this->call(PengurusJabatansTableSeeder::class);
        $this->call(PengurusAnggotasTableSeeder::class);
        $this->call(SocialAccountsTableSeeder::class);
        $this->call(LogsTableSeeder::class);

        // auth
        $this->call(SessionsTableSeeder::class);
        $this->call(LogsTableSeeder::class);
        $this->call(VisitorsTableSeeder::class);

        // home
        $this->call(HomeTestimonialsTableSeeder::class);
        $this->call(HomeProgramPembelajaranTableSeeder::class);
        $this->call(HomeKataKatasTableSeeder::class);
        $this->call(HomePengurusTableSeeder::class);
        $this->call(HomeSlidersTableSeeder::class);

        // other
        $this->call(BannersTableSeeder::class);
        $this->call(SpkAhpKriteriaTableSeeder::class);
        $this->call(SpkAhpKriteriaPerbandinganTableSeeder::class);
        $this->call(SpkAhpKriteriaJenisTableSeeder::class);
        $this->call(SpkAhpKriteriaJenisPerbandinganTableSeeder::class);
        $this->call(SpkAhpAlternatifTableSeeder::class);
        $this->call(SpkAhpAlternatifKriteriaTableSeeder::class);
        $this->call(WhatsappBrodcastTableSeeder::class);
    }
}
