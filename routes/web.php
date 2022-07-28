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

