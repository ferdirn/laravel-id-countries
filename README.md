# Laravel ID Countries

[![Total Downloads](https://poser.pugx.org/ferdirn/laravel-id-countries/downloads.svg)](https://packagist.org/packages/ferdirn/laravel-id-countries)
[![Latest Stable Version](https://poser.pugx.org/ferdirn/laravel-id-countries/v/stable.svg)](https://packagist.org/packages/ferdirn/laravel-id-countries)
[![Latest Unstable Version](https://poser.pugx.org/ferdirn/laravel-id-countries/v/unstable.svg)](https://packagist.org/packages/ferdirn/laravel-id-countries)

Laravel ID Countries is a package for Laravel to supply all countries data to table countries including country name, iso country code, capital, currency, and calling code.


## Installation

Add `ferdirn/laravel-id-countries` to `composer.json`.

    "ferdirn/laravel-id-countries": "dev-master"

or in console type command

    composer require ferdirn/laravel-id-countries:dev-master

Run `composer update` to pull down the latest version of laravel packages.

Edit `app/config/app.php` file and add to `providers`

    'providers' => array(
        'Ferdirn\Countries\CountriesServiceProvider',
    )

also add to 'aliases'

    'aliases' => array(
        'Countries' => 'Ferdirn\Countries\CountriesFacade',
    )


## Model

If you want to edit the configuration then publish the config. This is an optional step and unrecommended to do, it will show the table name and you do not need to alter it if you do not know what you are doing. The default table name is `countries`, if it suits you, leave it. But if you know what you are doing, you can run the following command

    $ php artisan config:publish ferdirn/laravel-id-countries


Then you need to generate the migration file. Run the following command:

    $ php artisan countries:migration

This process will generate `<timestamp>_create_countries_table.php` migration file and a `CountriesSeeder.php` seed file.

Insert the following code in the `seeds/DatabaseSeeder.php`

    //Seed the countries
    $this->call('CountriesSeeder');
    $this->command->info('Seeded the countries!');

Finally, you can run the artisan migrate command with seed option to include the seed data:

    $ php artisan migrate --seed

Now you have a table 'countries' with all country data inside the table. Congratulation!