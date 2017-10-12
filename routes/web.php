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
    if(auth()->guest())
        return view('welcome');
    else
        return redirect()->to('/home');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/settings', 'SettingsController@settings')->name('settings');
    Route::post('/settings/email', 'SettingsController@email');
    Route::post('/settings/phone', 'SettingsController@phone');
    Route::post('/settings/change-password', 'SettingsController@changePassword');

    Route::get('/subscribe', 'SubscribeController@index');
    Route::post('/subscribe/address', 'SubscribeController@addressAjax');
    Route::post('/subscribe/payment', 'SubscribeController@paymentAjax');
    Route::post('/subscribe/confirm', 'SubscribeController@confirmAjax');

    Route::middleware(['admin'])->group(function () {
        Route::get('admin/', 'AdminController@index');
        Route::post('admin/{id}/grant', 'AdminController@grant');

        Route::get('admin/users', 'AdminUsersController@index');
        Route::get('admin/users/{id}/edit', 'AdminUsersController@edit');
        Route::post('admin/users/{id}/update', 'AdminUsersController@update');
        Route::get('admin/users/{id}/delete', 'AdminUsersController@delete');
        Route::get('admin/users/new', 'AdminUsersController@create');
        Route::post('admin/users/new', 'AdminUsersController@store');

        Route::get('admin/plans', 'AdminPlansController@index');
        Route::get('admin/plans/{id}/edit', 'AdminPlansController@edit');
        Route::post('admin/plans/{id}/update', 'AdminPlansController@update');
        Route::get('admin/plans/{id}/delete', 'AdminPlansController@delete');
        Route::get('admin/plans/new', 'AdminPlansController@create');
        Route::post('admin/plans/new', 'AdminPlansController@store');

        Route::get('admin/payments', 'AdminPaymentsController@index');
        Route::get('admin/payments/{id}/edit', 'AdminPaymentsController@edit');
        Route::post('admin/payments/{id}/update', 'AdminPaymentsController@update');
        Route::get('admin/payments/{id}/delete', 'AdminPaymentsController@delete');
        Route::get('admin/payments/new', 'AdminPaymentsController@create');
        Route::post('admin/payments/new', 'AdminPaymentsController@store');


    });
});