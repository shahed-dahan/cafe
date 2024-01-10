<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\ApiAuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
    Route::middleware('auth:api')->group(function () {
        Route::get('get-menu',[ApiController::class,'getMenu']);

        Route::post('set-menu',[ApiController::class,'store']);

        Route::get('get-meals',[ApiController::class,'getmeals']);
        Route::post('/logout', [ApiAuthController::class,'logout']);
        Route::post('createCustomer',[ApiController::class ,'createcustomer']);
        Route::post('storeCart',[ApiController::class ,'storeCart']);
        Route::post('storeOrder',[ApiController::class ,'storeOrder']); 

    });
});

Route::get('get-menu',[ApiController::class,'getMenu']);

Route::post('set-menu',[ApiController::class,'store']);

Route::get('get-meals',[ApiController::class,'getmeals']);
Route::post('/change-state',[OrderController::class,'changeState']);
Route::post('/login', [ApiAuthController::class,'login']);
Route::post('/register',[ApiAuthController::class,'register']);