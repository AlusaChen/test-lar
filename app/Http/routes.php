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

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin::', 'namespace' => 'Admin'], function(){

    Route::get('/', function (){
        return view('index');
    });

    Route::group(['prefix' => 'u'], function(){
        Route::get('/', 'UserController@index');
    });

    Route::group(['prefix' => 'p', 'as' => 'post'], function(){
        Route::get('/', 'PostController@index');
        Route::get('view/{id}', 'PostController@view');
        Route::get('edit/{id}', 'PostController@edit');
        Route::get('/add', 'PostController@add');
        Route::post('/add', 'PostController@store');
    });

    Route::any('/ueupload', 'UeUploadController@index');
});
