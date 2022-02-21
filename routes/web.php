<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserProfileController;
use App\Models\User;
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
Route::get('/contact-us',[ContactController::class,'index'])->name('contact-us');
Route::post('/contact-us',[ContactController::class,'store'])->name('store-msg');
Route::get('/services',[ServiceController::class,'index'])->name('services');
Route::get('/services/{service}',[ServiceController::class,'show'])->name('single-service');

Route::group(['middleware'=>['auth']],function(){
    Route::get('/profile', [UserProfileController::class,'index'])->name('profile');
    Route::get('/services/{service}/booking',[ServiceController::class,'booking'])->name('booking');
    Route::post('/done',[BookingController::class,'store'])->name('store');
});

Route::group(['middleware'=>['auth','isAdmin']],function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin-dashboard');
    Route::get('/services-dashboard',[AdminController::class,'showServices'])->name('services-admin');
    Route::get('/services-dashboard/create',function(){return view('admin.services.add');})->name('create-service');
    Route::post('/services-dashboard/create',[AdminController::class,'createService'])->name('create-service-post');
    Route::get('/services-dashboard/{service}',[AdminController::class,'editService'])->name('editService');
    Route::put('/services-dashboard/{service}',[AdminController::class,'storeService'])->name('store-service');
    Route::delete('/services-dashboard/{service}/delete',[AdminController::class,'deleteService'])->name('delete-service');
    Route::get('/contacts-dashboard',[ContactController::class,'show'])->name('contacts-dashboard');
    Route::delete('/contacts-dashboard/delete/{contact}',[ContactController::class,'destroy'])->name('contact-delete');
    Route::get('/users-dashboard',[UserProfileController::class,'showUsers'])->name('users-dashboard');
    Route::get('/users-dashboard/edit/{user}',[UserProfileController::class,'editUser'])->name('users-edit');
    Route::delete('/users-dashboard/delete/{user}',[UserProfileController::class,'deleteUser'])->name('delete-user');
});

