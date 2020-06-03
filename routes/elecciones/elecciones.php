<?php
Route::group(['middleware'=> 'auth'], function () {
    // views
    Route::group(['prefix' => 'elecciones'], function () {
       Route::view('/create', 'elecciones.create');
    });
	//API
    Route::group(['prefix' => 'api/elecciones'], function () {
      Route::post('/create', 'EleccionController@create');
      Route::get('/getElecciones', 'EleccionController@index');
      Route::get('/{eleccion}', 'EleccionController@show');
      Route::get('/getEstadistica', 'EleccionController@getEstadistica');
    });
});