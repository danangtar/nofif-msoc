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

Route::get('/', function () {return view('dashboard');});
Route::get('/dashboard', function () {return view('dashboard');});
Route::get('/report', function () {return view('report');});
Route::get('/statistic', function () {return view('statistic');});
Route::get('/history', function () {return view('history');});
Route::get('/pic', function () {return view('pic');});
