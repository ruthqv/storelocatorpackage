# storelocator
Laravel StoreLocator package
Laravel, bootstrap, jquery,jQuery-Store-Locator-Plugin
Beta v1.0.0 Laravel storelocator 

Demo here http://storelocator.webandwebs.com/stores

Package built with https://github.com/bjorn2404/jQuery-Store-Locator-Plugin library. Allows you charge Countries, Zones, Regions, and Stores, and localize this last ones over Google Maps. 

Development package in a not stable way yet. Please, use only if you be sure to be able to make it compatible with your APP, or in a contributive way. It is only tested under specific App enviroment (Blade Layouts extensions, 'adminlittle' admin template etc).
Don´t hesitate to contact me for more info.

Installation steps over a clean Laravel installation (v 5.5):

$ laravel new nameofproject

$ php artisan make:auth

change .env database datas

$ composer require storelocator/storelocatorsystem:dev-master

$ composer update

$ php artisan vendor:publish

choose Provider: storelocator\storelocatorsystem\StorelocatorSystemServiceProvider

Before make this step, be sure to have your AppServiceProvider with  

use Illuminate\Support\Facades\Schema;
 and, inside boot function: 
 Schema::defaultStringLength(191);

$ php artisan migrate

$ php artisan db:seed --class=storelocator\\storelocatorsystem\\StoresSeeder

You can clone all project(Laravel with storelocatorpackage) here https://github.com/ruthqv/storelocator/

