<?php

use Illuminate\Support\Facades\Route;

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
// 📂 routes/web.php
// 👆 Keep anything already present in the file, just add the following ...

Route::prefix('api/user')->middleware(['auth0.authorize.optional'])->group(function () {
    Route::post('/', '\App\Http\Controllers\UserController@store');
});

Route::prefix('api/token')->middleware(['auth0.authorize.optional'])->group(function () {
    Route::post('/', '\App\Http\Controllers\TokenController@create');
});


Route::prefix('api/people')->middleware(['auth0.authorize:read:people'])->group(function () {
    Route::get('/', [\App\Http\Controllers\PeopleController::class, 'getPeople']);
    Route::get('/{id}', [\App\Http\Controllers\PeopleController::class, 'getPerson']);
});

Route::prefix('api/planets')->middleware(['auth0.authorize:read:planets'])->group(function () {
    Route::get('/', [\App\Http\Controllers\PlanetsController::class, 'getPlanets']);
    Route::get('/{id}', [\App\Http\Controllers\PlanetsController::class, 'getPlanet']);
});

Route::prefix('api/vehicles')->middleware(['auth0.authorize:read:vehicles'])->group(function () {
    Route::get('/', [\App\Http\Controllers\VehiclesController::class, 'getVehicles']);
    Route::get('/{id}', [\App\Http\Controllers\VehiclesController::class, 'getVehicle']);
});
