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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

$int = '^\d+$';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::pattern('route', $int);

Route::group(['prefix' => '/route', 'as' => 'routes.'], function () { 
    Route::get('/', [App\Http\Controllers\RouteController::class, 'index'])->name('index');
    Route::get('/{route}', [App\Http\Controllers\RouteController::class, 'show'])->name('show');
    Route::get('/create', [App\Http\Controllers\RouteController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\RouteController::class , 'store'])->name('store');
});

Route::pattern('location', $int);

Route::group(['prefix' => '/location', 'as' => 'locations.'], function () { 
    Route::get('/', [App\Http\Controllers\LocationController::class, 'index'])->name('index');
    Route::get('/{location}', [App\Http\Controllers\LocationController::class, 'show'])->name('show');
    Route::get('/{location}/edit', [App\Http\Controllers\LocationController::class, 'edit'])->name('edit');
    Route::get('/create', [App\Http\Controllers\LocationController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\LocationController::class , 'store'])->name('store');
});

Route::pattern('location_type', $int);

Route::group(['prefix' => '/location_type', 'as' => 'location_types.'], function () { 
    Route::get('/', [App\Http\Controllers\LocationTypeController::class, 'index'])->name('index');
    Route::get('/{location_type}', [App\Http\Controllers\Location_typeTypeController::class, 'show'])->name('show');
    Route::get('/{location_type}/edit', [App\Http\Controllers\LocationTypeController::class, 'edit'])->name('edit');
    Route::get('/create', [App\Http\Controllers\LocationTypeController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\LocationTypeController::class , 'store'])->name('store');
});




