<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController as Country;
use App\Http\Controllers\HotelController as Hotel;
use App\Http\Controllers\OrderController as Order;
use App\Http\Controllers\FrontController as FRONT;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Countries
Route::prefix('countries')->name('countries_')->group(function (){
    Route::get('/all', [Country::class, 'index'])->name('index')->middleware('role:user');
    Route::get('create', [Country::class, 'create'])->name('create')->middleware('role:user');
    Route::post('/', [Country::class, 'store'])->name('store')->middleware('role:admin');
    Route::get('edit/{country}', [Country::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('update/{country}', [Country::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('/{country}', [Country::class, 'destroy'])->name('destroy')->middleware('role:admin');

});
//Hotells
Route::prefix('hotels')->name('hotels_')->group(function (){
    Route::get('/all', [Hotel::class, 'index'])->name('index')->middleware('role:user');
    Route::get('create', [Hotel::class, 'create'])->name('create')->middleware('role:user');
    Route::post('/', [Hotel::class, 'store'])->name('store')->middleware('role:admin');
    Route::get('edit/{hotel}', [Hotel::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('update/{hotel}', [Hotel::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('/{hotel}', [Hotel::class, 'destroy'])->name('destroy')->middleware('role:admin');
});
//Orders
Route::get('/orders', [Order::class, 'index'])->name('all_orders')->middleware('role:admin');
Route::get('/', [Front::class, 'index'] )->name('front_index');
