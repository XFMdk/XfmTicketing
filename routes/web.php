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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// Route::get("/{any}", "SpaController@index")->where("any", ".*");
Route::get('/', 'HomeController@index')->name('home');
Route::get('/shows', 'RadioShowController@index')->name('shows');
Route::post('/shows', 'RadioShowController@create')->name('createShow');

Route::get('/shows/{showId}/episodes', 'EpisodeController@index');
Route::post('/shows/{showId}/episodes', 'EpisodeController@create');
