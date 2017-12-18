<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['web'] ], function() {

 
    Route::resource('stores', 'storelocator\storelocatorsystem\AdminStoresController');

    Route::resource('countries', 'storelocator\storelocatorsystem\AdminCountriesController');

    Route::resource('zones', 'storelocator\storelocatorsystem\AdminZonesController');

    Route::resource('regions', 'storelocator\storelocatorsystem\AdminRegionsController');

    Route::any('generatedata', 'storelocator\storelocatorsystem\AdminStoresController@generatedata')->name('generatedata');

});




Route::group(['prefix' => 'stores', 'as' => 'stores'], function() {

    Route::any('/', 'storelocator\storelocatorsystem\FrontStoresController@index');



  });



    Route::get('/stores/css/{filename}', function($filename){
    $path = resource_path() . '/assets/stores/css/' . $filename;

    if(!File::exists($path)) {
        return response()->json(['message' => 'Not found.'], 404);
    }

    $file = File::get($path);

    $response = Response::make($file, 200);
    $response->header('Content-Type', 'text/css');

    return $response;
});

    Route::get('/stores/js/{filename}', function($filename){
    $path = resource_path() . '/assets/stores/js/' . $filename;

    if(!File::exists($path)) {
        return response()->json(['message' => 'Not found.'], 404);
    }

    $file = File::get($path);

    $response = Response::make($file, 200);
    $response->header('Content-Type', 'application/javascript');

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

    Route::get('/storesfiles/{filename}', function($filename){
    $path = resource_path() . '/assets/stores/' . $filename;

    if(!File::exists($path)) {
        return response()->json(['message' => 'Not found.'], 404);
    }

    $file = File::get($path);

    $response = Response::make($file, 200);
    $response->header('Content-Type', 'application/json');

    return $response;
});    