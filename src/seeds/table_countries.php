<?php
namespace storelocator\storelocatorsystem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class table_countries extends Seeder
{
 
        public function run()
    {
        DB::table('countries')->insert([
            'name' => 'España',
            'iso' => 'ES',

            'zone_id' => 1,
        ]);

       DB::table('countries')->insert([
            'name' => 'Italia',
            'iso' => 'IT',
           
            'zone_id' => 1,
        ]);  

       DB::table('countries')->insert([
            'name' => 'Alemania',
    
            'iso' => '',
            'zone_id' => 1,
        ]); 

       DB::table('countries')->insert([
            'name' => 'Francia',
             'iso' => '',

            'zone_id' => 1,
        ]); 
       

        DB::table('countries')->insert([
            'name' => 'Texas',
 
             'iso' => '',
           'zone_id' => 2,
        ]);  

         DB::table('countries')->insert([
            'name' => 'Florida',
            'iso' => '',

            'zone_id' => 2,
        ]); 

         DB::table('countries')->insert([
            'name' => 'California',
             'iso' => '',

            'zone_id' => 2,
        ]);  
        DB::table('countries')->insert([
            'name' => 'Tailandia',
            'iso' => '',
            'zone_id' => 3,
        ]);  

         DB::table('countries')->insert([
            'name' => 'China',
             'iso' => '',
           'zone_id' => 3,
        ]); 
         
         DB::table('countries')->insert([
            'name' => 'Camboya',
             'iso' => '',
            'zone_id' => 3,
        ]);

    }
}
