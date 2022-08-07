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
        $output = shell_exec('php artisan iseed p_model_has_permissions --force');
        echo $output;
        return 1;
    }
}
