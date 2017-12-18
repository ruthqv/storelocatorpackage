<?php
namespace storelocator\storelocatorsystem;
use Illuminate\Database\Seeder;

class table_zones extends Seeder
{
    public function run()
    {

            \DB::table('zones')->insert(array(
                   'name' => 'Europa',
                   'created_at' => date('Y-m-d H:m:s'),
                   'updated_at' => date('Y-m-d H:m:s')
            ));

           \DB::table('zones')->insert(array(
                   'name' => 'North America',
                   'created_at' => date('Y-m-d H:m:s'),
                   'updated_at' => date('Y-m-d H:m:s')
            ));

           \DB::table('zones')->insert(array(
                   'name' => 'South America',
                   'created_at' => date('Y-m-d H:m:s'),
                   'updated_at' => date('Y-m-d H:m:s')
            ));

             \DB::table('zones')->insert(array(
                   'name' => 'Oceania',
                   'created_at' => date('Y-m-d H:m:s'),
                   'updated_at' => date('Y-m-d H:m:s')
            ));    

           \DB::table('zones')->insert(array(
               'name' => 'Asia',
               'created_at' => date('Y-m-d H:m:s'),
               'updated_at' => date('Y-m-d H:m:s')
        ));                 
           \DB::table('zones')->insert(array(
               'name' => 'Afric',
               'created_at' => date('Y-m-d H:m:s'),
               'updated_at' => date('Y-m-d H:m:s')
        ));                 
                
    }
}
