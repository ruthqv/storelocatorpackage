<?php
namespace storelocator\storelocatorsystem;

use Illuminate\Support\ServiceProvider;

class StorelocatorSystemServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'storelocator');

        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->loadMigrationsFrom(__DIR__ . '/migrations');

        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/storelocator'),
        ]);

        $this->publishes([
            __DIR__ . '/migrations' => database_path('migrations'),
        ], 'migrationsstores');

        $this->publishes([
            __DIR__ . '/assets' => resource_path('assets/stores/'),
        ], 'assetsstores');

    $this->publishes([
        __DIR__.'/config/storelocator.php' => config_path('storelocator.php')
    ], 'config');

    }

    public function register()
    {

        $this->app->bind('store', 'storelocator/storelocatorsystem/Models/Store');
        $this->app->bind('country', 'geo\geosystem\Models\Country');
        $this->app->bind('region', 'geo\geosystem\Models\Region');
        $this->app->bind('zone', 'geo\geosystem\Models\Zone');
        $this->app->make('storelocator\storelocatorsystem\FrontStoresController');

    }
}
