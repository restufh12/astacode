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
Route::get('/login','Admin\LoginController@index');
Auth::routes(['register' => false]);

Route::get('/dashboard','Admin\DashboardController@index')->name('dashboard');
Route::get('/company-settings','Admin\SettingController@index')->name('company.setting');
Route::put('/company-settings/update/{id}','Admin\SettingController@update')->name('company.settings.update');
Route::get('/header-settings','Admin\SettingController@index_header')->name('header.setting');
Route::put('/header-settings/update/{id}','Admin\SettingController@update_header')->name('header.settings.update');

Route::get('/portfolios/{id}/gallery', 'Admin\PortfolioController@gallery')->name('portfolios.gallery');
Route::resource('services', 'Admin\ServiceController');
Route::resource('faqs', 'Admin\FaqController');
Route::resource('teams', 'Admin\TeamController');
Route::resource('clients', 'Admin\ClientController');
Route::resource('products', 'Admin\ProductController');
Route::resource('portfolios', 'Admin\PortfolioController');
Route::resource('portfolio-galleries', 'Admin\PortfolioGalleryController');
Route::resource('testimonials', 'Admin\TestimonialController');
Route::resource('articles', 'Admin\ArticleController');
Route::resource('skills', 'Admin\SkillController');
Route::resource('subscribers', 'Admin\SubscriberController');

// FRONTEND
Route::get('/portfolio-details/{id}','HomeController@portfolio_details')->name('portfolio.details');
Route::get('/article-details/{id}','HomeController@article_details')->name('article.details');
Route::get('/article','HomeController@article')->name('article.index');
Route::get('/', 'HomeController@index');
