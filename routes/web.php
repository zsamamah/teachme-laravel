<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserProfileController;
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
Route::group(['middleware'=>['auth']],function(){
    Route::get('/services/{service}/booking',[ServiceController::class,'booking'])->name('booking');
    Route::post('/done',[BookingController::class,'store'])->name('store');
});
Route::group(['middleware'=>['auth','isAdmin']],function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin-dashboard');
    Route::get('/services-dashboard',[AdminController::class,'showServices'])->name('services-admin');
    Route::get('/services-dashboard/{service}',[AdminController::class,'editService'])->name('editService');
});

Route::get('/userprofile', [UserProfileController::class,'index']);
