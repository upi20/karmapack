<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CreateRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:repository {namespace} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create New User';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $namespace = $this->argument('namespace');
        $name = $this->argument('name');
        $namespace = str_replace('/', '\\', $namespace);
        $folders = app_path('Repository');
        if (file_exists(app_path('Repository'))) {
            $this->checkFolder($folders);
            foreach (explode("\\", $namespace) as $folder) {
                if ($folder != "") {
                    $folders .= "/$folder";
                    $this->checkFolder($folders);
                }
            }
        }

        $text = <<<SQL
<?php

namespace App\\Repository\\$namespace;

class $name
{
}

SQL;

        $files = new Filesystem;
        $files->put("$folders/$name.php", $text);
        $this->info('Success');
    }

    private function checkFolder($dir)
    {
        if (file_exists($dir)) {
            return true;
        } else {
            return mkdir($dir, 7777);
        }
    }
}
