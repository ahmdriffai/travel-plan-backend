<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PlaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth
Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function()
    {
        Route::post('/register', 'register');
        Route::post('/login', 'login');
        Route::get('/logout', 'logout')->middleware('auth:sanctum');
        Route::get('/me', 'me')->middleware('auth:sanctum');
    });

// Place
Route::controller(PlaceController::class)
    ->prefix('places')
    ->group(function()
    {
        Route::get('/', 'index');
        Route::post('/', 'store');
    });

    // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
