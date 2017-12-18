<?php
namespace storelocator\storelocatorsystem;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use storelocator\storelocatorsystem\Models\Store;

class StorelocatorSystemServiceProvider extends ServiceProvider
{
  
    public function boot(Dispatcher $events)
    {
        $this->loadViewsFrom(base_path() . '/resources/views/packages/storelocator', 'storelocator');

        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add([
                'icon'    => 'file',
                'text'    => 'Store Locator',
                'url'     => route('admin.stores.index') ,
               
            ]);

        });
        
        
    }


    public function register()
    {

        $this->app->bind('store', 'storelocator/storelocatorsystem/Models/Store');
        $this->app->make('storelocator\storelocatorsystem\AdminStoresController');
        $this->app->make('storelocator\storelocatorsystem\FrontStoresController');



    }
}
