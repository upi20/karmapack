<?php

namespace App\Console\Commands;

use App\Models\Artikel\Artikel;
use App\Models\Artikel\Kategori;
use App\Models\Artikel\KategoriArtikel;
use App\Models\Artikel\Tag;
use App\Models\Artikel\TagArtikel;
use App\Models\Banner;
use App\Models\Contact\FAQ;
use App\Models\Contact\ListContact;
use App\Models\Contact\Message;
use App\Models\Galeri;
use App\Models\Home\Testimonial;
use App\Models\KataAlumni;
use App\Models\Keanggotaan\Anggota;
use App\Models\Keanggotaan\Hobi;
use App\Models\Keanggotaan\Kontak;
use App\Models\Keanggotaan\KontakJenis;
use App\Models\Keanggotaan\Pendidikan;
use App\Models\Keanggotaan\PendidikanJenis;
use App\Models\Keanggotaan\PengalamanLain;
use App\Models\Keanggotaan\PengalamanOrganisasi;
use App\Models\Kepengurusan\Anggota as KepengurusanAnggota;
use App\Models\Kepengurusan\Jabatan;
use App\Models\Kepengurusan\Periode;
use App\Models\Menu\Admin as MenuAdmin;
use App\Models\Menu\Frontend as MenuFrontend;
use App\Models\Pendaftaran\GForm;
use App\Models\Pendaftaran\Sensus;
use App\Models\RoleHasMenu;
use App\Models\Setting\HomeSlider;
use App\Models\SocialAccount;
use App\Models\SocialMedia;
use App\Models\SPK\AHP\Kriteria\Kriteria as SPK_AHP_Kriteria;
use App\Models\SPK\AHP\Kriteria\Perbandingan as SPK_AHP_KriteriaPerbandingan;
use App\Models\SPK\AHP\Kriteria\Jenis\Jenis as SPK_AHP_KriteriaJenis;
use App\Models\SPK\AHP\Kriteria\Jenis\Perbandingan as SPK_AHP_KriteriaJenisPerbandingan;
use App\Models\SPK\AHP\Alternatif\Alternatif as SPK_AHP_Alternatif;
use App\Models\SPK\AHP\Alternatif\Kriteria as SPK_AHP_AlternatifKriteria;
use App\Models\Tracker;
use App\Models\Utility\HariBesarNasional;
use App\Models\Utility\NotifAdminAtas;
use App\Models\Utility\NotifDepanAtas;
use Illuminate\Console\Command;

class backup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:backup {type=all} {--current=1}  {--users=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup database using iseed';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tableNames = config('permission.table_names');
        $is_windows = strtolower(PHP_SHLIB_SUFFIX) === 'dll';

        $win_parse = function ($str) use ($is_windows) {
            return str_replace(['\\', '/'], ($is_windows ? '\\' : '/'), $str);
        };

        $root = dirname(__FILE__);
        $root = "$root/../../..";
        $arg_type = $this->argument('type');
        $opt_users = $this->option('users');
        // backup migrasi database sebelumnya
        if ($this->option('current') == 1) {
            // pindahkan folder dulu
            $folder_parent = $win_parse("$root/backup");
            $folder_backup = $win_parse("$folder_parent/" . date('Y-m-d'));

            if (!file_exists("$folder_parent")) echo shell_exec("mkdir $folder_parent");
            if (!file_exists($folder_backup)) echo shell_exec("mkdir $folder_backup");
            $copy = $is_windows ? 'copy' : 'cp -R';
            shell_exec($win_parse("$copy $root/database/seeders/* $folder_backup"));

            echo 'Berhasil backup data sebelumnya' . PHP_EOL;
        }

        $tables =  [
            'artikel' => [
                Artikel::tableName,
                Tag::tableName,
                Kategori::tableName,
                TagArtikel::tableName,
                KategoriArtikel::tableName,
                Banner::tableName,
            ],
            'galeri' => [
                Galeri::tableName,
            ],
            'frontend' => [
                SocialMedia::tableName,
                HomeSlider::tableName,
                Testimonial::tableName,
                FAQ::tableName,
                //     KataKata::tableName,
                //     ProgramPembelajaran::tableName,
                //     Pengurus::tableName,
            ],
            'pendaftaran' => [
                GForm::tableName,
                Sensus::tableName,
                // Pendaftaran::tableName,
            ],
            'permissions' => [
                $tableNames['roles'],
                $tableNames['permissions'],
                MenuAdmin::tableName,
                $tableNames['model_has_permissions'],
                $tableNames['model_has_roles'],
                $tableNames['role_has_permissions'],
                RoleHasMenu::tableName,
                MenuFrontend::tableName,
            ],
            'utility' => [
                NotifDepanAtas::tableName,
                NotifAdminAtas::tableName,
                HariBesarNasional::tableName,
            ],
            'contact' => [
                ListContact::tableName,
                Message::tableName,
            ],
            'user' => [
                Tracker::tableName,
                SocialAccount::tableName,
                'sessions',
                'logs',
            ],
            'keanggotaan' => [
                KontakJenis::tableName,
                PendidikanJenis::tableName,
                Anggota::tableName,
                Hobi::tableName,
                Kontak::tableName,
                Pendidikan::tableName,
                PengalamanLain::tableName,
                PengalamanOrganisasi::tableName,
                KataAlumni::tableName
            ],
            'kepengurusan' => [
                Periode::tableName,
                Jabatan::tableName,
                KepengurusanAnggota::tableName,
            ],
            'spk_ahp' => [
                SPK_AHP_Kriteria::tableName,
                SPK_AHP_KriteriaPerbandingan::tableName,
                SPK_AHP_KriteriaJenis::tableName,
                SPK_AHP_KriteriaJenisPerbandingan::tableName,
                SPK_AHP_Alternatif::tableName,
                SPK_AHP_AlternatifKriteria::tableName,
            ],
        ];
        if ($opt_users == 1 || $arg_type == 'users') echo shell_exec('php artisan iseed users --force');
        foreach ($tables as $k => $t) {
            $type = $arg_type == 'all' ? $tables[$k] : ($k == $arg_type ? $t : []);
            foreach ($type as $table) {
                echo shell_exec('php artisan iseed ' . $table . ' --force');
            }

            if (in_array($arg_type, $t)) {
                echo shell_exec('php artisan iseed ' . $arg_type . ' --force');
            }
        }
        return 1;
    }
}
