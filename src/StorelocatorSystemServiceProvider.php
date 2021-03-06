<?php
namespace storelocator\storelocatorsystem;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class StorelocatorSystemServiceProvider extends ServiceProvider
{

    public function boot(Dispatcher $events)
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'storelocator');

        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->loadMigrationsFrom(__DIR__ . '/migrations');

        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/storelocator'),
        ], 'stores-views');

        $this->publishes([
            __DIR__ . '/migrations' => database_path('migrations'),
        ], 'stores-migrations');

        $this->publishes([
            __DIR__ . '/assets' => resource_path('assets/stores/'),
        ], 'stores-assets');

        $this->publishes([
            __DIR__ . '/img' => public_path('img/stores/'),
        ], 'stores-img');

        $this->publishes([
            __DIR__ . '/config/storelocator.php' => config_path('storelocator.php'),
        ], 'stores-config');

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add([
                'icon' => 'file',
                'text' => 'Stores',
                'url'  => route('admin.stores.index'),

            ]);
        });

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
