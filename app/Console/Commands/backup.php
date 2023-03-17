<?php

namespace App\Console\Commands;

use mikehaertl\shellcommand\Command as shellcommand;

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

            if (!file_exists("$folder_parent")) $this->command_exec("mkdir $folder_parent");
            if (!file_exists($folder_backup)) $this->command_exec("mkdir $folder_backup");
            $copy = $is_windows ? 'copy' : 'cp -R';
            $this->command_exec($win_parse("$copy $root/database/seeders/* $folder_backup"));



            echo 'Berhasil backup data sebelumnya' . PHP_EOL;
        }

        $tables =  [
            'user' => [
                'social_accounts',
                'logs',
            ],
            'artikel' => [
                'artikel',
                'artikel_tag',
                'artikel_kategori',
                'artikel_tag_item',
                'artikel_kategori_item'
            ],
            'galeri' => [
                'galeri',
            ],
            'profile' => [
                'kata_alumnis',
            ],
            'frontend' => [
                'social_media',
                'footer_instagrams',
                'username_validations',
                'instagram',
            ],
            'pendaftaran' => [
                'pendaftarans',
                'pend_sensus',
                'g_forms'
            ],
            'permissions' => [
                'p_model_has_permissions',
                'p_model_has_roles',
                'p_permissions',
                'p_roles',
                'p_role_has_permissions',
                'p_menu',
                'p_menu_frontends',
                'p_role_has_menu',
            ],
            'utility' => [
                'notif_admin_atas',
                'notif_depan_atas',
                'hari_besar_nasionals',
            ],
            'contact' => [
                'contact_list',
                'contact_messages',
            ],
            'other' => [
                'faq',
            ],
            'keanggotaan' => [
                'anggota_kontak_jenis',
                'anggota_pendidikan_jenis',
                'anggotas',
                'anggota_hobis',
                'anggota_kontaks',
                'anggota_pendidikans',
                'anggota_pengalaman_lains',
                'anggota_pengalaman_organisasis',
            ],
            'kepengurusan' => [
                'pengurus_periodes',
                'pengurus_jabatans',
                'pengurus_anggotas',
            ],
        ];

        if ($opt_users == 1 || $arg_type == 'users') $this->command_exec('php artisan iseed users --force');
        foreach ($tables as $k => $t) {
            $type = $arg_type == 'all' ? $tables[$k] : ($k == $arg_type ? $t : []);
            foreach ($type as $table) {
                $this->command_exec('php artisan iseed ' . $table . ' --force');
            }

            if (in_array($arg_type, $t)) {
                $this->command_exec('php artisan iseed ' . $arg_type . ' --force');
            }
        }
        return 1;
    }

    private function command_exec($command_str)
    {
        $command = new shellcommand($command_str);
        if ($command->execute()) {
            echo $command->getOutput() . PHP_EOL;
        } else {
            echo $command->getError() . PHP_EOL;
            $exitCode = $command->getExitCode();
        }
    }
}
