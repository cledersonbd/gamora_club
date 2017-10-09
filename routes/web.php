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


Route::get('/settings', 'SettingsController@settings')->name('settings');
Route::post('/settings/email','SettingsController@email');
Route::post('/settings/phone','SettingsController@phone');
Route::post('/settings/change-password','SettingsController@changePassword');

Route::get('/subscribe','SubscribeController@index');
Route::post('/subscribe/address','SubscribeController@addressAjax');
Route::post('/subscribe/payment','SubscribeController@paymentAjax');
Route::post('/subscribe/confirm','SubscribeController@confirmAjax');

Route::middleware(['admin'])->group(function () {
    Route::get('admin/','AdminController@index');
    Route::get('admin/users','AdminController@users');
    Route::get('admin/users/{id}/edit','AdminController@editUser');
    Route::post('admin/users/{id}/update','AdminController@updateUser');
    Route::get('admin/users/{id}/delete','AdminController@deleteUser');
    Route::get('admin/users/new','AdminController@newUser');
    Route::post('admin/users/new','AdminController@storeUser');
});