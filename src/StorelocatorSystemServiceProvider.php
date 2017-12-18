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
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/assets' => resource_path('assets/stores/'),
        ], 'assetsstores');

    }

    public function register()
    {

        $this->app->bind('store', 'storelocator/storelocatorsystem/Models/Store');
        $this->app->bind('country', 'storelocator/storelocatorsystem/Models/Country');
        $this->app->bind('region', 'storelocator/storelocatorsystem/Models/Region');
        $this->app->bind('zone', 'storelocator/storelocatorsystem/Models/Zone');
 
        $this->app->make('storelocator\storelocatorsystem\AdminStoresController');
        $this->app->make('storelocator\storelocatorsystem\AdminCountriesController');
        $this->app->make('storelocator\storelocatorsystem\AdminZonesController');
        $this->app->make('storelocator\storelocatorsystem\AdminRegionsController');
        $this->app->make('storelocator\storelocatorsystem\FrontStoresController');

    }
}
