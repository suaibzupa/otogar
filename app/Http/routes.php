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


Route::post('/api/filterAdmin', 'AdminController@filterAdmin');

Route::post('/api/filter', 'HomeController@filter');

Route::post('/api/search', 'HomeController@search');

Route::post('/api/gSearch', 'HomeController@gSearch');

Route::post('/api/likes/{id}', 'HomeController@likes');

Route::post('/api/orderBy/{type}', 'HomeController@orderBy');


Route::get('/', 'HomeController@mainPage');

Route::get('/home', 'HomeController@mainPage');
//Route::get('/likes', 'HomeController@likes');

Route::get('/cars/{id}', 'HomeController@productPage');

Route::get('/admin', 'AdminController@createOffer');

Route::post('/admin', 'AdminController@createOffer');

Route::get('/remove/{offer_id}', 'AdminController@removeOffer');

Route::auth();

