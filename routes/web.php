<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
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

Route::get('/search',[Controller::class, 'search'])->name('search');

Route::group(['middleware'=>['auth','isTeacher']],function(){
    Route::get('teacher-profile',[UserProfileController::class,'teacher_profile'])->name('teacher_profile');
    Route::get('edit-teacher',[UserProfileController::class, 'edit_teacher'])->name('edit_teacher');
    Route::post('edit-teacher/{details}',[UserProfileController::class, 'change_teacher_data'])->name('change_teacher_data');
    Route::put('approve/{order}',[OrderController::class,'approve'])->name('approve_order');
    Route::put('reject/{order}',[OrderController::class,'reject'])->name('reject_order');
});

Route::group(['middleware'=>['auth']],function(){
    Route::get("change-password",[UserProfileController::class,'change_password'])->name('change_password');
    Route::post("change-password/{user}",[UserProfileController::class,'validate_new_password'])->name('validate_new_password');
    Route::get('profile/{user}',[UserProfileController::class,'show_profile'])->name('show_profile');
});

Route::group(['middleware'=>['auth','isStudent']],function(){
    Route::get('/student-profile',[UserProfileController::class,'student_profile'])->name('student_profile');
    Route::get('edit-student',[UserProfileController::class, 'edit_student'])->name('edit_student');
    Route::post('edit-student/{details}',[UserProfileController::class, 'change_student_data'])->name('change_student_data');
    Route::get('book/{user}',[OrderController::class,'index'])->name('booking_page');
    Route::post('book/{user}',[OrderController::class,'store'])->name('booking_submit');
    Route::delete('books/{order}',[OrderController::class,'destroy'])->name('delete_order');
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