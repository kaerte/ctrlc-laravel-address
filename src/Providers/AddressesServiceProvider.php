<?php

declare(strict_types=1);

namespace Ctrlc\Address\Providers;

use Illuminate\Support\ServiceProvider;

class AddressesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__, 2).'/config/address.php', 'address');
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations/2020_01_01_000001_create_countries_table.php');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations/2020_01_01_000002_create_addresses_table.php');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations/2020_01_01_000003_create_geocodings_table.php');
    }
}
