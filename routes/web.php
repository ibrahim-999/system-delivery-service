<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Courier::routes();

Pickup::routes();


Route::get('suggest/shipments', "Api\SuggestController@shipments");


Route::get('suggest/couriers', "Api\SuggestController@couriers");
