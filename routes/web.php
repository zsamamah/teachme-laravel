<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SaloonController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\UserProfileController;
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

Route::group(['middleware'=>['auth','isTeacher']],function(){
    Route::get('teacher-profile',[UserProfileController::class,'teacher_profile'])->name('teacher_profile');
});

Route::group(['middleware'=>['auth']],function(){
    // 
});

Route::group(['middleware'=>['auth','isStudent']],function(){
    Route::get('/student-profile',[UserProfileController::class,'student_profile'])->name('student_profile');
});

Route::group(['middleware'=>['auth','isAdmin']],function(){
    Route::get('/a_dashboard',[AdminController::class,'index'])->name('a_dashboard');
    Route::get('/users',[AdminController::class,'users'])->name('users');
    Route::delete('/delete-user/{user}',[AdminController::class,'delete_user'])->name('delete-user');
    Route::get('/contacts',[AdminController::class,'contacts'])->name('contacts');
    Route::delete('/delete-contact/{contact}',[AdminController::class,'delete_contact'])->name('delete-contact');
});

Route::fallback(function () {
    return view('404');
});