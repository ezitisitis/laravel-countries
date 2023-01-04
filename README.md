# Laravel Countries

Bundle for Laravel, which provides ISO 3166_2, 3166_3, currency, Capital, and more data for all countries

**Notice: this version is for Laravel 8 and above**

## Installation

Add `ezitisitis/laravel-countries` to your `composer.json` by running:
```bash
composer require ezitisitis/laravel-countries
```

Run installation command:
```bash
php artisan countries:install
```

**NB** Installation command supports `--force` flag/option to force publishing

Run migration command:
```bash
php artisan migrate
```

## Model and data

To change model table go to `config/countries.php` and change `table_name` value.

**NB** You will need to make sure that old table is removed.

Now you can seed database by executing:
```bash
php artisan db:seed --class=CountriesSeeder
```

Or by adding seeder to your DatabaseSeeder:
```php
$this->call(CountriesSeeder::class);
```

and executing:
```bash
php artisan db:seed
```