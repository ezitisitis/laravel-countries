<?php

namespace EzitisItIs\Countries;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class CountriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/countries.php', 'countries');
    }

    public function boot()
    {
        $this->configurePublishing();
        $this->configureCommands();
    }

    protected function configurePublishing()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../config/countries.php' => config_path('countries.php'),
        ], 'countries-config');

        $this->publishes([
            __DIR__.'/../database/migrations/2023_01_01_000000_create_countries_table.php' => database_path('migrations/2023_01_01_000000_create_countries_table.php'),
            __DIR__.'/../database/migrations/2023_01_01_000001_charify_countries_table.php' => database_path('migrations/2023_01_01_000001_charify_countries_table.php'),
        ], 'countries-migrations');

        $this->publishes([
            __DIR__.'/../database/seeders/CountriesSeeder.php' => database_path('seeders/CountriesSeeder.php')
        ], 'countries-seeders');
    }

    protected function configureCommands()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Console\InstallCommand::class,
        ]);
    }
}