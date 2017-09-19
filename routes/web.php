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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/settings', 'UsersController@settings')->name('settings');

Route::post('/settings/email','UsersController@email');
Route::post('/settings/phone','UsersController@phone');
Route::post('/settings/change-password','UsersController@changePassword');