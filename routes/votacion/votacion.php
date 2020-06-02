<?php
Route::group(['middleware'=> 'auth'], function () {
    // views
    Route::group(['prefix' => 'votacion'], function () {
       Route::view('/{eleccion}/votar', 'votacion.create');
    });
	//API
    Route::group(['prefix' => 'api/votacion'], function () {
      Route::post('/create', 'VotoController@create');
      Route::get('/getvotacion', 'EleccionController@index');
    });
});