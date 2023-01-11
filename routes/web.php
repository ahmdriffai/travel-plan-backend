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
    $places = \App\Models\Place::all();
    return view('welcome', compact('places'));
});

Route::controller(\App\Http\Controllers\HomeController::class)
    ->group(function () {
        Route::get('/place/{id}', 'placeDetail')->name('place-detail');
    });


Route::controller(\App\Http\Controllers\LoginController::class)
    ->prefix('login')
    ->group(function () {
        Route::get('/', 'login')->name('form-login');
        Route::post('/', 'postLogin')->name('post-login');
        Route::get('/logout', 'logout')->name('logout');
    });

Route::controller(\App\Http\Controllers\LoginController::class)
    ->prefix('register')
    ->group(function () {
        Route::get('/', 'register')->name('form-register');
        Route::post('/', 'postRegister')->name('post-register');
    });

Route::prefix('admin')
    ->middleware(['auth', 'can:admin'])
    ->as('admin.')
    ->group(function() {
        Route::get('/', [\App\Http\Controllers\DashboardContoroller::class, 'index'])->name('dashboard');
        Route::controller(\App\Http\Controllers\CategoryController::class)
            ->prefix('categories')
            ->as('categories.')
            ->group(function() {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
            });
        Route::controller(\App\Http\Controllers\PlaceController::class)
            ->prefix('places')
            ->as('places.')
            ->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
            });
    });

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
