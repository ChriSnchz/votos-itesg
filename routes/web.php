<?php

use App\Http\Middleware\ApiAuthMiddleware;

Route::post('/api/register', 'UserController@register');
Route::post('/api/login', 'UserController@login');
Route::put('/api/user/update', 'UserController@update');
Route::post('/api/user/upload', 'UserController@upload')->middleware(ApiAuthMiddleware::class);
Route::get('/api/user/avatar/{filename}', 'UserController@getImage');
Route::get('/api/user/detail/{email}', 'UserController@detail');

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('estadisticas', function () {
		return view('pages.estadisticas');
	})->name('table');

	Route::get('elecciones', function () {
		return view('elecciones.index');
	})->name('elecciones');

	Route::get('candidatos', function () {
		return view('candidatos.index');
	})->name('candidatos');

	Route::get('votacion', function () {
		return view('votacion.index');
	})->name('votacion');

});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

require __DIR__ . '/candidatos/candidatos.php';
require __DIR__ . '/elecciones/elecciones.php';
require __DIR__ . '/votacion/votacion.php';








