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

//LOGIN
Route::get('/login/', 'FrontController@login');
Route::post('/login_process', 'FrontController@login_process');
Route::get('/logout', 'FrontController@logout');

//DASHBOARD
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

//REGIONS
Route::get('/regions', 'HomeController@regions');
Route::post('/create_regions', 'HomeController@create_regions');
Route::post('/update_regions', 'HomeController@update_regions');
Route::get('/delete_regions/{id}', 'HomeController@delete_regions');

//ANSWER
Route::get('/answers', 'HomeController@answers');
Route::post('/create_answers', 'HomeController@create_answers');
Route::post('/update_answers', 'HomeController@update_answers');
Route::get('/delete_answers/{id}', 'HomeController@delete_answers');

//REPORT
Route::get('/report', 'HomeController@reports');
Route::get('/delete_report/{id}', 'HomeController@delete_reports');
Route::post('/update_report', 'HomeController@update_reports');
Route::get('/confirm_report/{id}', 'HomeController@confirm_reports');

//HISTORY
Route::get('/history/{id}', 'HomeController@history');
Route::get('/history_apps/{id}', 'HomeController@history_apps');
Route::get('/history_home', 'HomeController@history_home');
Route::get('/history_home2', 'HomeController@history_home2');

//STATISTIC
Route::get('/pagecoba2', 'HomeController@statistic2');
Route::get('/statistic', 'HomeController@statistic');
Route::post('/search_statistic', 'HomeController@search_statistic');

//UPLOAD
Route::get('/upload', 'HomeController@upload');
Route::post('/importfile', 'HomeController@importfile');

//CRON
Route::get('/cron_minus', 'ProcessController@cron_minus');
Route::get('/cron_alert', 'ProcessController@cron_alert');


//API
Route::group(['prefix' => 'api/v1'], function()
{
    //AUTH

    Route::post('login', 'APIController@login');
    Route::group(['middleware' => 'jwt-auth'], function () {
        Route::post('send_token', 'APIController@send_token');
        Route::post('get_user', 'APIController@get_user');
        Route::post('update_user', 'APIController@update_user');
        Route::post('changepass_user', 'APIController@changepass_user');
        Route::post('send_report', 'APIController@send_report');
        Route::post('dashboardAPI', 'APIController@indexpic');
        Route::post('historyAPI', 'APIController@history_apps');

        Route::post('get_user_details', 'APIController@get_user_details');
    });

});

//DUMMY

Route::get('/import/{name}', 'HomeController@import');

Route::post('register', 'APIController@register');

Route::get('/key', function() {
    return str_random(32);
});


Route::get('/picdashboard', 'ProcessController@indexpic');

Route::get('/pickabdashboard', 'ProcessController@indexviewkab');

Route::get('/viewdashboard', 'ProcessController@indexview');

