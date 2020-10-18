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

// BACKEND
Route::get('/dashboard','admin\DashboardController@index');
Route::get('/login','admin\LoginController@index');
Auth::routes(['register' => false]);

// FRONTEND
Route::get('/', 'HomeController@index');
