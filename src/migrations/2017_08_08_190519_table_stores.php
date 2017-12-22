<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableStores extends Migration
{
    public function up()
    {

  
// tabla propia del paquete

        Schema::create('stores', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name',100);
            $table->text('description');
            $table->text('address');
            $table->text('city');

            $table->text('email');
            $table->text('phone')->nullable();
            $table->string('longitude', 45); 
            $table->string('latitude', 45); 

            $table->integer('region_id')->unsigned()->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('no action')->onUpdate('no action');

            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('no action')->onUpdate('no action');
            $table->integer('zone_id')->unsigned();
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('no action')->onUpdate('no action');
            $table->boolean('active')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });






    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stores');
    }
}
