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
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin::'], function(){
    Route::get('/', function (){
        return 'Welcome';
    });
    Route::group(['prefix' => 'u'], function(){
        Route::get('/', 'Admin\UserController@index');
    });

    Route::get('/post', 'Admin\PostController@index');
    Route::post('/post', 'Admin\PostController@store');

    Route::any('/ueupload', 'Admin\UeUploadController@index');
});

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