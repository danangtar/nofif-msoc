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

//Login
Route::get('/login/', 'FrontController@login');
Route::post('/login_process', 'FrontController@login_process');
Route::get('/logout', 'FrontController@logout');


Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index');
Route::get('alert/{id}', 'HomeController@alertRegion');
Route::get('alert', 'HomeController@alertAll');


//PIC
Route::get('/pic', 'HomeController@pic');

Route::get('/delete_user/{id}', 'HomeController@delete_user');
Route::post('/update_user', 'HomeController@update_user');
Route::post('/create_user', 'HomeController@create_user');
Route::post('/update_region', 'HomeController@update_region');

//REPORT
Route::get('/report', 'HomeController@reports');
Route::get('/delete_report/{id}', 'HomeController@delete_reports');
Route::post('/update_report', 'HomeController@update_reports');
Route::get('/confirm_report/{id}', 'HomeController@confirm_reports');

//HISTORY
Route::get('/history/{id}', 'HomeController@history');
Route::get('/history_home', 'HomeController@history_home');

//STATISTIC
Route::get('/pagecoba2', 'HomeController@statistic2');
Route::get('/statistic', 'HomeController@statistic');
Route::post('/search_statistic', 'HomeController@search_statistic');


Route::get('/key', function() {
    return str_random(32);
});
Route::get('/tes', 'Controller@show');


Route::get('/picdashboard', 'ProcessController@indexpic');

Route::group(['prefix' => 'api/v1'], function()
{
    //AUTH

    Route::post('login', 'APIController@login');
    Route::group(['middleware' => 'jwt-auth'], function () {
        Route::post('send_token', 'APIController@send_token');
        Route::post('get_user', 'APIController@get_user');
        Route::post('update_user', 'APIController@update_user');
        Route::post('send_report', 'APIController@send_report');
        Route::post('dashboardAPI', 'APIController@indexpic');

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

//    Route::get('klik/{id}', 'ProcessController@alertRegion');
