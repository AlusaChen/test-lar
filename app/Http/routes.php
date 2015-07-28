<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index', [
        'name' => 'Jack',
        'age' => 20
    ]);
});

/*
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('auth/login', 'Auth\AdminAuthController@getLogin');
    Route::post('auth/login', 'Auth\AdminAuthController@getLogin');
    Route::get('auth/logout', 'Auth\AdminAuthController@getLogout');

    Route::get('auth/register', 'Auth\AdminAuthController@getRegister');
    Route::post('auth/register', 'Auth\AdminAuthController@postRegister');
});
*/

/*
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['prefix'=>'u', 'middleware' => 'auth'], function(){
    Route::get('profile', function(){
        return 'profile';
    });

    Route::get('list', 'UserController@index');
});
*/