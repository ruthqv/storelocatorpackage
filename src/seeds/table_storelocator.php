<?php
namespace storelocator\storelocatorsystem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class table_storelocator extends Seeder
{

    public function run()
    {
       \DB::table('stores')->delete();
        
        \DB::table('stores')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'store1',
                'description' => 'the best store',
                'address' => '5 avenue',
                'city' => 'Fuenlabrada',
                'email' => 'store1@email.com',
                'phone' => '25-255-255-255',
                'longitude' => '-3.8080201',
                'latitude' => '40.2821993',
                'region_id' => 1,
                'country_id' => 1,
                'zone_id' => 1,
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'store2',
                'description' => 'the best store',
                'address' => '5 avenue',
                'city' => 'Madrid',
                'email' => 'store1@email.com',
                'phone' => '25-255-255-255',
                'longitude' => '-3.6554394',
                'latitude' => '40.4082353',
                'region_id' => 1,
                'country_id' => 1,
                'zone_id' => 1,
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'store3',
                'description' => 'the best store',
                'address' => '5 avenue',
                'city' => 'Rome',
                'email' => 'store1@email.com',
                'phone' => '25-255-255-255',
                'longitude' => '12.499715',
                'latitude' => '41.9010072',
                'region_id' => NULL,
                'country_id' => 2,
                'zone_id' => 1,
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => '2017-12-18 16:22:40',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'store4',
                'description' => 'the best store',
                'address' => '5 avenue',
                'city' => 'Texas',
                'email' => 'store1@email.com',
                'phone' => '25-255-255-255',
                'longitude' => '-94.9663202',
                'latitude' => '29.4338016',
                'region_id' => NULL,
                'country_id' => 5,
                'zone_id' => 2,
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => '2017-12-18 16:22:49',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 7,
                'name' => 'store7',
                'description' => 'the best store',
                'address' => '5 avenue',
                'city' => 'California',
                'email' => 'store1@email.com',
                'phone' => '25-255-255-255',
                'longitude' => '114.1533119',
                'latitude' => '22.2809125',
                'region_id' => NULL,
                'country_id' => 7,
                'zone_id' => 2,
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => '2017-12-18 16:24:21',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'store8',
                'description' => 'the best store',
                'address' => '5 avenue',
                'city' => 'Florida',
                'email' => 'store1@email.com',
                'phone' => '25-255-255-255',
                'longitude' => '-81.4387899',
                'latitude' => '28.4813018',
                'region_id' => NULL,
                'country_id' => 6,
                'zone_id' => 2,
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => '2017-12-18 16:24:15',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'store9',
                'description' => 'the best store',
                'address' => '5 avenue',
                'city' => 'Berlin',
                'email' => 'store1@email.com',
                'phone' => '25-255-255-255',
                'longitude' => '13.2846502',
                'latitude' => '52.5069704',
                'region_id' => NULL,
                'country_id' => 3,
                'zone_id' => 1,
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => '2017-12-18 16:25:05',
                'deleted_at' => NULL,
            ),
        ));
        

    }
}
