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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tours', 'TourController@index')->name('tours.index');

Route::group(['prefix' => '/admin'], function() {
    Route::get('/home', 'AdminController@index')->name('admin.home');
    Route::get('/tours/{tour}/edit', 'TourController@edit')->name('tours.edit');
    Route::get('/tours/create', 'TourController@create')->name('tours.create');
    Route::get('/tours/{tour}', 'TourController@show')->name('tours.show');
    Route::post('/tours/{tour}', 'TourController@update')->name('tours.update');
    Route::delete('/tours/{tour}', 'TourController@destroy')->name('tours.destroy');
    Route::get('/tours', 'AdminController@index_tour')->name('admin.index_tour');
    Route::post('/tours', 'TourController@store')->name('tours.store');

    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::get('/users/{user}', 'UsersController@show')->name('users.show');
    Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
    Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
    Route::post('/users/{user}', 'UsersController@update')->name('users.update');

    Route::get('/orders/create', 'OrdersController@create')->name('orders.create');
    Route::post('/orders', 'OrdersController@store')->name('orders.store');
    Route::get('/orders', 'OrdersController@index')->name('orders.index');

    Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
    Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
    Route::post('/categories/{category}', 'CategoryController@update')->name('categories.update');
    Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.destroy');
    Route::get('/categories', 'CategoryController@index')->name('categories.index');
    Route::post('/categories', 'CategoryController@store')->name('categories.store');
});
