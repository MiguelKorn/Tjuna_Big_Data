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

Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
Route::get('/team', ['as' => 'team', 'uses' => 'TeamController@index']);

Route::get('home', 'HomeController@index');

Route::get('/test', 'testController@show');

Auth::routes();

Route::get('/', 'HomeController@index');