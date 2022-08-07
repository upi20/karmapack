<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class backup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // pindahkan folder dulu
        $folder_parent = 'backup';
        $folder_backup = date('Y-m-d');

        if (!file_exists("./$folder_parent")) echo shell_exec('mkdir ' . $folder_parent);
        if (!file_exists("./$folder_parent/$folder_backup")) echo shell_exec('cd ' . $folder_parent . ' && mkdir ' . $folder_backup);

        shell_exec('cp -R ./database/seeders/* ./' . $folder_parent . '/' . $folder_backup);
        echo 'Berhasil backup data sebelumnya' . PHP_EOL;
        $artisan_backup = "php artisan iseed users,artikel,artikel_tag,artikel_kategori,artikel_tag_item,artikel_kategori_item,galeri,galeri_tag_member,pengurus_periode,pengurus_periode_jabatan,pengurus_periode_jabatan_member,pengurus_periode_member,pengurus_profile_kontak,pengurus_profile_kontak_tipe,pengurus_profile_pendidikan,pengurus_profile_pendidikan_jenis,pengurus_profile_pengalaman_lain,pengurus_profile_pengalaman_organisasi,social_media,contacts,footer_instagrams,username_validations,galeri_tag_member,pendaftarans,pend_sensus,p_model_has_permissions,p_model_has_roles,p_permissions,p_roles,p_role_has_permissions,p_menu,p_role_has_menu  --force";
        $output = shell_exec('php ' . $artisan_backup);
        echo $output;
        return 1;
    }
}
