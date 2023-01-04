<?php

namespace EzitisItIs\Countries\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'countries:install {--force=false}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a migration following the Laravel-countries specifications.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Publishing all the publishable files (migrations, seeder and config)');
        $this->line('');
        $this->call('vendor:publish', ['--tag' => 'countries-migrations', '--force' => $this->option('force')]);
        $this->call('vendor:publish', ['--tag' => 'countries-seeders', '--force' => $this->option('force')]);
        $this->call('vendor:publish', ['--tag' => 'countries-config', '--force' => $this->option('force')]);
    }
}