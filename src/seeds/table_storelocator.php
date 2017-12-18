<?php
namespace storelocator\storelocatorsystem;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class table_storelocator extends Seeder
{

    public function run()
    {
        DB::table('stores')->insert(array(
                   'name' => 'store1',
                   'description' => 'the best store',
                   'zone_id' => 1,
                   'country_id' => 1,
                   'city' => 'Fuenlabrada',
                   'region_id' => 1,
                   'longitude' =>'-3.8080201',
                   'latitude' => '40.2821993',
                   'address' => '5 avenue',
                   'email'  => 'store1@email.com' ,
                   'phone' => '25-255-255-255',
                   


            ));


        DB::table('stores')->insert(array(
                   'name' => 'store3',
                   'description' => 'the best store',
                   'country_id' =>1,
                   'region_id' => 1,
                   'zone_id' => 1,
                   'longitude' =>'-3.6554394',
                   'city' => 'Madrid',
                   'latitude' => '40.4082353',
                   'address' => '5 avenue',
                   'email'  => 'store1@email.com' ,
                   'phone' => '25-255-255-255',
                   


            ));







    }
}
