<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SaloonController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\VisaController;
use App\Models\Order;
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

Auth::routes();

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/about-us',[HomeController::class,'about'])->name('about-us');

Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
Route::post('/contact',[ContactController::class,'store'])->name('contact.store');
Route::get('/contact-done',[ContactController::class,'done'])->name('contact-done');

Route::post('/subscribe',[SubscribeController::class,'store'])->name('subscribe');
Route::get('/subscribe-done',[SubscribeController::class,'done'])->name('subscribe-done');

Route::get('/saloons',[SaloonController::class,'show_all'])->name('saloons');
Route::get('/saloons/{saloon}',[SaloonController::class,'show'])->name('single-saloon');

Route::group(['middleware'=>['auth','isProvider']],function(){
    Route::get('/p_dashboard',[SaloonController::class,'index'])->name('p_dashboard');
    Route::get('/my-saloons',[SaloonController::class,'my_saloons'])->name('my-saloons');
    Route::get('/my-saloons/create',[SaloonController::class,'create'])->name('create-saloon');
    Route::post('/my-saloons/create',[SaloonController::class,'store'])->name('save-saloon');
    Route::get('/edit-saloon/{saloon}',[SaloonController::class,'edit'])->name('edit-saloon');
    Route::put('/edit-saloon/{saloon}',[SaloonController::class,'update'])->name('update-saloon');
    Route::delete('delete-saloon/{saloon}',[SaloonController::class,'destroy'])->name('delete-saloon');
    Route::get('/new-orders',[OrderController::class,'index'])->name('new-orders');
    Route::get('/done-orders',[OrderController::class,'done_orders'])->name('done-orders');
});

Route::group(['middleware'=>['auth']],function(){
    Route::post('/review/{saloon}',[ReviewController::class,'store'])->name('review.store');
    Route::get('/invoice/{order}',[OrderController::class,'invoice'])->name('invoice');
});

Route::group(['middleware'=>['auth','isUser']],function(){
    Route::get('/booking/{saloon}',[OrderController::class,'create'])->name('create-order');
    Route::post('/booking/{saloon}',[OrderController::class,'store'])->name('store-order');
    Route::get('/visa/{order}',[VisaController::class,'index'])->name('show-visa');
    Route::post('/visa/{order}',[VisaController::class,'store'])->name('save-visa');
    Route::get('/done-booking',[OrderController::class,'done'])->name('order-done');
});
