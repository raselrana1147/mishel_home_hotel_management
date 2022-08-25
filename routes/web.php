<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomBookingController;
use App\Http\Controllers\ReviewController;



require __DIR__.'/admin.php';

Route::get('/', [HomeController::class,'index'])->name('front_page');
Route::get('/room_detail/{slug}', [HomeController::class,'room_detail'])->name('room_detail');
Route::get('/type_wise_room/{id}', [HomeController::class,'type_wise_room'])->name('type_wise_room');
Route::get('/about_us', [HomeController::class,'about_us'])->name('about_us');
Route::get('/contact_us', [HomeController::class,'contact_us'])->name('contact_us');
Route::post('/submit_contact', [HomeController::class,'submit_contact'])->name('submit_contact');
Route::get('/privacy_policy', [HomeController::class,'privacy_policy'])->name('privacy_policy');
Route::get('/gallery', [HomeController::class,'gallery'])->name('gallery');
Route::get('/project', [HomeController::class,'project'])->name('project');
Route::get('/project_detail/{id}', [HomeController::class,'project_detail'])->name('project_detail');
// booking route
Route::get('/room_booking/{slug}', [RoomBookingController::class,'room_booking'])->name('room_booking');
Route::post('/room_booking', [RoomBookingController::class,'store_room_booking'])->name('store_room_booking');

// booking route
Route::post('/guest_review', [ReviewController::class,'guest_review'])->name('guest_review');
Route::get('/feedback', [ReviewController::class,'feedback'])->name('feedback');
Route::post('/feedback', [ReviewController::class,'store_feedback'])->name('guest_feedback');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
