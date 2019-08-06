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

Route::get('/', 'AuthController@home');
Route::resource('/blogs', 'BlogController');
Route::get('/login','AuthController@login');
Route::post('/login','AuthController@loginAction');
Route::get('/logout','AuthController@logout');
