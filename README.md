# Laravel Countries

[![Total Downloads](https://poser.pugx.org/ferdirn/laravel-id-countries/downloads.svg)](https://packagist.org/packages/ferdirn/laravel-id-countries)
[![Latest Stable Version](https://poser.pugx.org/ferdirn/laravel-id-countries/v/stable.svg)](https://packagist.org/packages/ferdirn/laravel-id-countries)
[![Latest Unstable Version](https://poser.pugx.org/ferdirn/laravel-id-countries/v/unstable.svg)](https://packagist.org/packages/ferdirn/laravel-id-countries)

Laravel ID Countries is a package for Laravel to supply all countries data to table countries including name, iso country code, capital, currency, and calling code.


## Installation

Add `ferdirn/laravel-id-countries` to `composer.json`.

    "ferdirn/laravel-id-countries": "dev-master"
or
    composer require ferdirn/laravel-id-countries:dev-master

Run `composer update` to pull down the latest version of laravel packages.

Edit `app/config/app.php` and add the `provider` and `filter`

    'providers' => array(
        'Ferdirn\Countries\CountriesServiceProvider',
    )

Now add the alias.

    'aliases' => array(
        'Countries' => 'Ferdirn\Countries\CountriesFacade',
    )


## Model

You can start by publishing the configuration. This is an optional step, it contains the table name and does not need to be altered. If the default name `countries` suits you, leave it. Otherwise run the following command

    $ php artisan config:publish ferdirn/laravel-id-countries

Next generate the migration file:

    $ php artisan countries:migration

It will generate the `<timestamp>_create_countries_table.php` migration and the `CountriesSeeder.php` seeder. To make sure the data is seeded insert the following code in the `seeds/DatabaseSeeder.php`

    //Seed the countries
    $this->call('CountriesSeeder');
    $this->command->info('Seeded the countries!');

You may now run it with the artisan migrate command:

    $ php artisan migrate --seed

After running this command the filled countries table will be available