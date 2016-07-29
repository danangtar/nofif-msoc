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

Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index');
Route::get('/report', function () {return view('report');});
Route::get('/statistic', function () {return view('statistic');});
Route::get('/history', function () {return view('history');});
Route::get('/pic', 'HomeController@pic');

Route::post('/update_user', 'HomeController@update_user');

Route::get('/key', function() {
    return str_random(32);
});
Route::get('/tes', 'Controller@show');

Route::group(['prefix' => 'api/v1'], function()
{
    //AUTH

    Route::post('login', 'APIController@login');
    Route::group(['middleware' => 'jwt-auth'], function () {
        Route::post('send_token', 'APIController@send_token');
        Route::post('get_user', 'APIController@get_user');
        Route::post('update_user', 'APIController@update_user');

        Route::post('get_user_details', 'APIController@get_user_details');
    });



    Route::get('user','UserController@index');

    Route::get('user/{id}','UserController@getUser');

    Route::post('user','UserController@createUser');

    Route::put('user/{id}','UserController@updateUser');

    Route::delete('user/{id}','UserController@deleteUser');


    Route::get('region','RegionController@index');

    Route::get('region/{id}','RegionController@getRegion');

    Route::post('region','RegionController@createRegion');

    Route::put('region/{id}','RegionController@updateRegion');

    Route::delete('region/{id}','RegionController@deleteRegion');

});

    Route::post('register', 'APIController@register');

    Route::get('klik/{id}', 'ProcessController@alertRegion');
