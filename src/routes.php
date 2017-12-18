<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {

 
    Route::resource('stores', 'storelocator\storelocatorsystem\AdminStoresController');

    Route::any('generatedata', 'storelocator\storelocatorsystem\AdminStoresController@generatedata')->name('generatedata');

});




Route::group(['prefix' => 'stores', 'as' => 'stores'], function() {

    Route::any('/', 'storelocator\storelocatorsystem\FrontStoresController@index');



  });



    Route::get('/storesfiles/{filename}', function($filename){
    $path = resource_path() . '/assets/stores/' . $filename;

    if(!File::exists($path)) {
        return response()->json(['message' => 'Not found.'], 404);
    }

    $file = File::get($path);

    $response = Response::make($file, 200);

    return $response;
});
    Route::get('/storesfiles/templates/{filename}', function($filename){
    $path = resource_path() . '/assets/stores/templates/' . $filename;

    if(!File::exists($path)) {
        return response()->json(['message' => 'Not found.'], 404);
    }

    $file = File::get($path);

    $response = Response::make($file, 200);

    return $response;
});
    Route::get('/storesfiles/img/{filename}', function($filename){
    $path = resource_path() . '/assets/stores/img/' . $filename;

    if(!File::exists($path)) {
        return response()->json(['message' => 'Not found.'], 404);
    }

    $file = File::get($path);

    $response = Response::make($file, 200);

    return $response;
});