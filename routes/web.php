<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about-us',function(){return view('about');})->name('about-us');
Route::get('/contact-us',function(){return view('contact');})->name('contact-us');
Route::get('/services',[ServiceController::class,'index'])->name('services');
Route::get('/services/{service}',[ServiceController::class,'show'])->name('single-service');
Route::get('/services/{service}/booking',[ServiceController::class,'booking'])->name('booking');
Route::post('/done',[BookingController::class,'store'])->name('store');
// Route::post('/services/{service}/booking',[BookingController::class,'store'])->name('storeBooking');
