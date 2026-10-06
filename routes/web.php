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

Route::get('/', 'NavController@home');
Route::get('/movie', 'NavController@movie');
Route::post('/movie/store', 'NavController@storeMovie');
Route::get('/movie/delete/{id}', 'NavController@deleteMovie');
Route::get('/kategori', 'NavController@kategori');
Route::get('/genre', 'NavController@genre');

    