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

Route::group(['prefix' => 'admin', 'as' => 'admin::', 'namespace' => 'Admin', 'middleware' => ['auth', 'permission']], function(){

    Route::get('/', 'WelcomeController@index');

    Route::get('/test', 'TestController@index');

    //管理员
    Route::group(['prefix' => 'u', 'as' => 'user'], function(){
        Route::get('/', 'UserController@index');
        Route::get('/add', 'UserController@add');
        Route::post('/add', 'UserController@store');
        Route::get('/edit/{id}', 'UserController@edit');

        Route::get('/perm/{uid}', 'UserController@perm');
        Route::post('/perm/{uid}', 'UserController@set_perm');
    });

    //文章
    Route::group(['prefix' => 'p', 'as' => 'post'], function(){
        Route::get('/view/{id}', 'PostController@view');
        Route::get('/edit/{id}', 'PostController@edit');
        Route::get('/add', 'PostController@add');
        Route::post('/add', 'PostController@store');
        Route::get('/{category?}', 'PostController@index');
    });

    //term
    Route::group(['prefix' => 't', 'as' => 'term'], function(){
        Route::get('/view/{id}', 'TermController@view');
        Route::get('/edit/{id}', 'TermController@edit');
        Route::get('/add/{type}', 'TermController@add');
        Route::post('/add', 'TermController@store');
        Route::get('/{type?}', 'TermController@index');
    });

    //role
    Route::group(['prefix' => 'r', 'as' => 'role'], function(){
        Route::get('/', 'RoleController@index');
        Route::get('/add', 'RoleController@add');
        Route::post('/add', 'RoleController@store');
        Route::get('/edit/{id}', 'RoleController@edit');
    });

    Route::get('/perm/{uid?}', 'PermController@index');
    Route::get('/perm/role/{rid}/{query_id?}', 'PermController@role');

    Route::any('/ueupload', 'UeUploadController@index');
});
