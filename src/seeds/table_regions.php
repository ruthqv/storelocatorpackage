<?php
namespace storelocator\storelocatorsystem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class table_regions extends Seeder
{
    public function run()
    {


       DB::table('regions')->insert([
            'name' => 'Madrid',
            'country_id' => 1,
        ]);  

       DB::table('regions')->insert([
            'name' => 'Cataluña',
            'country_id' => 1,
        ]);  

       DB::table('regions')->insert([
            'name' => 'Galicia',
            'country_id' => 1,
        ]); 
       DB::table('regions')->insert([
            'name' => 'Castilla la Mancha',
            'country_id' => 1,
        ]);  

       DB::table('regions')->insert([
            'name' => 'Andalucia',
            'country_id' => 1,
        ]);  
       DB::table('regions')->insert([
            'name' => 'Castilla Leon',
            'country_id' => 1,
        ]);  
       DB::table('regions')->insert([
            'name' => 'Extremadura',
            'country_id' => 1,
        ]);                 

       DB::table('regions')->insert([
            'name' => 'Asturias',
            'country_id' => 1,
        ]); 
       DB::table('regions')->insert([
            'name' => 'País Vasco',
            'country_id' => 1,
        ]); 

       DB::table('regions')->insert([
            'name' => 'Valencia',
            'country_id' => 1,
        ]); 

       DB::table('regions')->insert([
            'name' => 'Murcia',
            'country_id' => 1,
        ]); 
       DB::table('regions')->insert([
            'name' => 'Aragon',
            'country_id' => 1,
        ]); 

       DB::table('regions')->insert([
            'name' => 'Cantabria',
            'country_id' => 1,
        ]); 
       DB::table('regions')->insert([
            'name' => 'La Rioja',
            'country_id' => 1,
        ]); 

       DB::table('regions')->insert([
            'name' => 'Navarra',
            'country_id' => 1,
        ]); 


        DB::table('regions')->insert([
            'name' => 'Nevada',
            'country_id' => 8,
        ]);     
    }

}
