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



    }

    public function register()
    {

        $this->app->bind('store', 'storelocator/storelocatorsystem/Models/Store');
        $this->app->make('storelocator\storelocatorsystem\AdminStoresController');
        $this->app->make('storelocator\storelocatorsystem\FrontStoresController');

    }
}
