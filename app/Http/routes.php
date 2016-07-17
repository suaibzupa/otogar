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

/**
 * Suat
 * 
 */

Route::post('/api/filter', 'HomeController@filter');
Route::post('/api/search', 'HomeController@search');

Route::get('/', 'HomeController@mainPage');

Route::get('/home', 'HomeController@mainPage');

Route::get('/cars/{id}', 'HomeController@productPage');

Route::get('/admin', 'AdminController@createOffer');

Route::post('/admin', 'AdminController@createOffer');

Route::get('/remove/{offer_id}', 'AdminController@removeOffer');

Route::auth();

