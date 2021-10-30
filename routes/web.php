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



Route::get('/', 'FrontpageController@home');
Route::post('/orders', 'OrderController@store');
Route::get('/orders', 'OrderController@index');
Route::get('/items/{id}', 'OrderController@items');
Route::get('/belajar', 'Belajarcontroller@home');
Route::get('/about', 'Aboutcontroller@tentang');
