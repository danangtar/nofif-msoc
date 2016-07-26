<?php

use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});


$app->get('/key', function() {
    return str_random(32);
});
$app->get('/tes', 'Controller@show');

$app->get('foo', function () {
    return 'Hello World';
});

$app->group(['prefix' => 'api/v1','namespace' => 'App\Http\Controllers'], function($app)
{

    $app->get('login','HomeController@login');


    $app->get('user','UserController@index');

    $app->get('user/{id}','UserController@getUser');

    $app->post('user','UserController@createUser');

    $app->put('user/{id}','UserController@updateUser');

    $app->delete('user/{id}','UserController@deleteUser');


    $app->get('region','RegionController@index');

    $app->get('region/{id}','RegionController@getRegion');

    $app->post('region','RegionController@createRegion');

    $app->put('region/{id}','RegionController@updateRegion');

    $app->delete('region/{id}','RegionController@deleteRegion');

});