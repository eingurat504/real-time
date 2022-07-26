<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

// Auth::routes();
Auth::routes(['verify' => true]);

$int = '^\d+$';

Route::get('/reset-password', [App\Http\Controllers\Auth\PasswordController::class, 'showLinkRequestForm'])->name('reset.index');
Route::post('/password/email', [App\Http\Controllers\Auth\PasswordController::class , 'sendResetLinkEmail'])->name('password.email');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::pattern('route', $int);

Route::group(['prefix' => '/alert', 'as' => 'alerts.'], function () { 
    Route::get('/', [App\Http\Controllers\AlertController::class, 'index'])->name('index');
    Route::get('/{route}', [App\Http\Controllers\AlertController::class, 'show'])->name('show');
});

Route::group(['prefix' => '/google_map', 'as' => 'google_maps.'], function () { 
    Route::get('/', [App\Http\Controllers\GoogleMapController::class, 'index'])->name('dashboard.index');
    Route::get('/{route}', [App\Http\Controllers\GoogleMapController::class, 'show'])->name('show');
});


Route::pattern('camera', $int);

Route::group(['prefix' => '/camera', 'as' => 'cameras.'], function () { 
    Route::get('/', [App\Http\Controllers\DeviceController::class, 'getCameras'])->name('index');
    Route::get('/{camera}', [App\Http\Controllers\DeviceController::class, 'show'])->name('show');
});

Route::pattern('route', $int);

Route::group(['prefix' => '/route', 'as' => 'routes.'], function () { 
    Route::get('/', [App\Http\Controllers\RouteController::class, 'index'])->name('index');
    Route::get('/{route}', [App\Http\Controllers\RouteController::class, 'show'])->name('show');
    Route::get('/{route}/edit', [App\Http\Controllers\RouteController::class, 'edit'])->name('edit');
    Route::put('/{route}/update', [App\Http\Controllers\RouteController::class, 'update'])->name('update');
    Route::get('/{route}/configure', [App\Http\Controllers\RouteController::class, 'configureRoute'])->name('configure.show');
    Route::put('/{route}/upload', [App\Http\Controllers\RouteController::class, 'uploadRoute'])->name('upload');
    Route::get('/create', [App\Http\Controllers\RouteController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\RouteController::class , 'store'])->name('store');
});

Route::pattern('location', $int);

Route::group(['prefix' => '/location', 'as' => 'locations.'], function () { 
    Route::get('/', [App\Http\Controllers\LocationController::class, 'index'])->name('index');
    Route::get('/{location}', [App\Http\Controllers\LocationController::class, 'show'])->name('show');
    Route::get('/{location}/edit', [App\Http\Controllers\LocationController::class, 'edit'])->name('edit');
    Route::put('/{location}/update', [App\Http\Controllers\LocationController::class, 'update'])->name('update');
    Route::get('/create', [App\Http\Controllers\LocationController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\LocationController::class , 'store'])->name('store');
});

Route::pattern('location_type', $int);

Route::group(['prefix' => '/location_type', 'as' => 'location_types.'], function () { 
    Route::get('/', [App\Http\Controllers\LocationTypeController::class, 'index'])->name('index');
    Route::get('/{location_type}', [App\Http\Controllers\LocationTypeController::class, 'show'])->name('show');
    Route::get('/{location_type}/edit', [App\Http\Controllers\LocationTypeController::class, 'edit'])->name('edit');
    Route::put('/{location_type}/update', [App\Http\Controllers\LocationTypeController::class, 'update'])->name('update');
    Route::get('/create', [App\Http\Controllers\LocationTypeController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\LocationTypeController::class , 'store'])->name('store');
});

Route::pattern('zone', $int);

Route::group(['prefix' => '/zone', 'as' => 'zones.'], function () { 
    Route::get('/', [App\Http\Controllers\ZoneController::class, 'index'])->name('index');
    Route::get('/{zone}', [App\Http\Controllers\ZoneController::class, 'show'])->name('show');
    Route::get('/{zone}/edit', [App\Http\Controllers\ZoneController::class, 'edit'])->name('edit');
    Route::get('/create', [App\Http\Controllers\ZoneController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\ZoneController::class , 'store'])->name('store');
});

Route::pattern('incident', $int);

Route::group(['prefix' => '/incident', 'as' => 'incidents.'], function () { 
    Route::get('/', [App\Http\Controllers\IncidentController::class, 'index'])->name('index');
    Route::get('/report', [App\Http\Controllers\IncidentController::class, 'index'])->name('reports.index');
    Route::post('/report', [App\Http\Controllers\IncidentController::class, 'report'])->name('report');
    Route::get('/{incident}', [App\Http\Controllers\IncidentController::class, 'show'])->name('show');
    Route::get('/{incident}/edit', [App\Http\Controllers\IncidentController::class, 'edit'])->name('edit');
    Route::get('/create', [App\Http\Controllers\IncidentController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\IncidentController::class , 'store'])->name('store');
});

Route::pattern('device', $int);

Route::group(['prefix' => '/device', 'as' => 'devices.'], function () { 
    Route::get('/', [App\Http\Controllers\DeviceController::class, 'index'])->name('index');
    Route::get('/report', [App\Http\Controllers\DeviceController::class, 'report'])->name('reports.index');
    Route::get('/{device}', [App\Http\Controllers\DeviceController::class, 'show'])->name('show');
    Route::get('/{device}/edit', [App\Http\Controllers\DeviceController::class, 'edit'])->name('edit');
    Route::get('/create', [App\Http\Controllers\DeviceController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\DeviceController::class , 'store'])->name('store');
});

Route::pattern('user', $int);

Route::group(['prefix' => '/user', 'as' => 'users.'], function () { 
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('index');
    Route::get('/report', [App\Http\Controllers\UserController::class, 'report'])->name('reports.index');
    Route::get('/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('show');
    Route::get('/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
    Route::put('/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'userProfile'])->name('profile.index');
    Route::post('/profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('profile');
    Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\UserController::class , 'store'])->name('store');
});







