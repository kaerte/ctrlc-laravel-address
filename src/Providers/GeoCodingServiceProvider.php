<?php

declare(strict_types=1);

namespace Ctrlc\Address\Providers;

use Ctrlc\Address\Services\GeocodingServiceContract;
use Ctrlc\Address\Services\GoogleGeocoding;
use Illuminate\Support\ServiceProvider;

class GeoCodingServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__, 2).'/config/geocoding.php', 'geocoding');
        $this->app->bind(GeocodingServiceContract::class, GoogleGeocoding::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            dirname(__DIR__, 2).'/config/geocoding.php' => config_path('geocoding.php'),
        ], 'ctrlc.geocoding');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'ctrlc_geocoding');
    }
}
