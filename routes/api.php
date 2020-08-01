<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API + AJAX Routes
|--------------------------------------------------------------------------
|
*/
Route::post('/users/cars/toggle-ownership', 'Cars\Ajax\UserCarsController@toggleOwnership');