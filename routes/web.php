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
Route::get('/dashboard','Admin\DashboardController@index')->name('dashboard');
Route::get('/login','Admin\LoginController@index');
Auth::routes(['register' => false]);
Route::get('/portfolios/{id}/gallery', 'Admin\PortfolioController@gallery')->name('portfolios.gallery');
Route::resource('services', 'Admin\ServiceController');
Route::resource('faqs', 'Admin\FaqController');
Route::resource('teams', 'Admin\TeamController');
Route::resource('clients', 'Admin\ClientController');
Route::resource('products', 'Admin\ProductController');
Route::resource('portfolios', 'Admin\PortfolioController');
Route::resource('portfolio-galleries', 'Admin\PortfolioGalleryController');
Route::resource('testimonials', 'Admin\TestimonialController');

// FRONTEND
Route::get('/portfolio-details/{id}','HomeController@portfolio_details')->name('portfolio.details');
Route::get('/', 'HomeController@index');
