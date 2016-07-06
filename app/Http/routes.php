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

Route::post('/api/filter', 'HomeController@filter');

Route::post('/api/pull', 'HomeController@pull');

Route::get('/', 'HomeController@mainPage');

Route::get('/home', 'HomeController@mainPage');

Route::get('/cars/{id}', 'HomeController@productPage');

Route::auth();

