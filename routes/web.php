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