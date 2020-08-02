<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'Cars\CarsController@index')->name('index');
});

Route::group(['prefix' => 'cars', 'as' => 'cars.', 'middleware' => 'auth'], function () {
    Route::get('/create', 'Cars\CarsController@create')->name('create');
    Route::post('/store', 'Cars\CarsController@store')->name('store');
    Route::get('/show/{id}', 'Cars\CarsController@show')->name('show');
    Route::get('/edit/{id}', 'Cars\CarsController@edit')->name('edit');
    Route::put('/update/{id}', 'Cars\CarsController@update')->name('update');
});