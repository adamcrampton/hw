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
    Route::get('/', 'Cars\CarController@index')->name('index');
});
