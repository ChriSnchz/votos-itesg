<?php
Route::group(['middleware'=> 'auth'], function () {
    // views
    Route::group(['prefix' => 'candidatos'], function () {
       Route::view('/create', 'candidatos.create');
    });
	//API
    Route::group(['prefix' => 'api/candidatos'], function () {
      Route::post('/create', 'CandidatoController@create');
      Route::get('/getCandidatos', 'CandidatoController@index');
    });
});