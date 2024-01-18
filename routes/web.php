<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\BookingController;
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



Route::get('/index',function(){
    return view('master');
});

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('menu-create',[MenuController::class,'create']);
    Route::post('menu-store',[MenuController::class,'store']);
    Route::get('menu-index',[MenuController::class,'index']);
    Route::get('menu-edit/{id}',[MenuController::class,'edit']);
    Route::get('meal-index',[MealController::class,'index']);
    Route::get('meal-edit/{id}',[MealController::class,'edit']);
    Route::post('meal-update/{id}',[MealController::class,'update']);
    Route::post('menu-update/{id}',[MenuController::class,'update']);
    Route::delete('menu-destroy/{id}',[MenuController::class,'destroy']);
    Route::delete('meal-destroy/{id}',[MealController::class,'destroy']);
    Route::get('meal-create',[MealController::class,'create']);
    Route::post('meal-store',[MealController::class,'store']);
    Route::get('customer',[CustomersController::class,'index']);
    Route::post('user-admin/{id}',[CustomersController::class,'userAdmin']);

    
Route::get('/import', [MealController::class,"importview"]);


Route::post('/import', [MealController::class,"import"]);


Route::get('/export', [MealController::class,"export"]);
});

Route::resource('order',OrderController::class);


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('create-customers',[CustomersController::class,'create']);
    Route::post('create-customers',[CustomersController::class,'store']);
    Route::get('menu',[homecontroller::class,'getmenu'])->name('menu');
    Route::get('meal/{id}',[homecontroller::class,'getmeal']);
    Route::get('meal-detail/{id}',[homecontroller::class,'mealDetail']);
    Route::delete('cart-destroy/{id}',[cartcontroller::class,'destroy']);
    Route::post('add-cart',[cartcontroller::class,'store']);
    Route::get('cart',[cartcontroller::class,'show']);
    Route::post('create-order',[OrderController::class,'store']);
    Route::get('booking-create',[BookingController::class,'create']);
    Route::post('booking-store',[BookingController::class,'store']);
    Route::get('booking',[BookingController::class,'index']);
    Route::get('about',[homecontroller::class,'about']);
    Route::get('homee',[homecontroller::class,'homee']);
    Route::get('/delivery/{order}', 'OrderController@showDeliveryPage');
    
    Route::get('/', function () {
        return view('UserViews.master');
    });
    Route::get('/home', [App\Http\Controllers\homecontroller::class, 'index'])->name('home');

});