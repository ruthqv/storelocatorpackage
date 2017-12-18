<?php
namespace storelocator\storelocatorsystem;

use Illuminate\Database\Seeder;

class StoresSeeder extends Seeder
{

    public function run()
    {
        $this->call(table_storelocator::class);

    }
}
