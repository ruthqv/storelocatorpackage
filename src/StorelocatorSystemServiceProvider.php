<?php
namespace storelocator\storelocatorsystem;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use storelocator\storelocatorsystem\Models\Store;

class StorelocatorSystemServiceProvider extends ServiceProvider
{
  
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'storelocator');

        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        
    }


    public function register()
    {

        $this->app->bind('store', 'storelocator/storelocatorsystem/Models/Store');
        $this->app->make('storelocator\storelocatorsystem\AdminStoresController');
        $this->app->make('storelocator\storelocatorsystem\FrontStoresController');



    }
}
