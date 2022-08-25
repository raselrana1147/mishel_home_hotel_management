<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\FloorController;
use App\Http\Controllers\Admin\RoomKeeperController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ReviewFeedbackController;
use App\Http\Controllers\Admin\SocialController;

Route::prefix('admin')->group(function(){
	 
	Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
	Route::get('load_contact',[AdminController::class,'contact_datatable'])->name('admin.load_contact');
	Route::get('contact',[AdminController::class,'contact'])->name('admin.contact');

	// Profile Routes
	Route::get('password_form',[AdminProfileController::class,'password_form'])->name('admin.password_form');
	Route::post('change_password',[AdminProfileController::class,'change_password'])->name('admin.change_password');
	Route::get('profile_form',[AdminProfileController::class,'profile_form'])->name('admin.profile_form');
	Route::post('change_profile',[AdminProfileController::class,'change_profile'])->name('admin.change_profile');
	


	//booking Routes
	Route::group(['prefix'=>'booking'],function(){
		Route::get('booking_load',[BookingController::class,'datatable'])->name('booking.load');
		Route::get('/',[BookingController::class,'index'])->name('booking.index');
		Route::post('update_status',[BookingController::class,'update_status'])->name('booking.update_status');
	});


	//Review and feedback Routes
	Route::group(['prefix'=>'review-feedback'],function(){
		Route::get('feedback_load',[ReviewFeedbackController::class,'datatable_feedback'])->name('feedback.load');
		Route::get('review_load',[ReviewFeedbackController::class,'datatable_review'])->name('review.load');
		Route::get('/feedback',[ReviewFeedbackController::class,'feedback'])->name('feedback.list');
		Route::get('/review',[ReviewFeedbackController::class,'review'])->name('review.list');
		Route::post('update_review',[ReviewFeedbackController::class,'update_review'])->name('review.update_review');
		Route::post('update_feedback',[ReviewFeedbackController::class,'update_feedback'])->name('feedback.update_feedback');
		Route::post('delete_feedback',[ReviewFeedbackController::class,'delete_feedback'])->name('feedback.delete_feedback');
		Route::post('delete_review',[ReviewFeedbackController::class,'delete_review'])->name('review.delete_review');
	});

	//Slider Routes
	Route::group(['prefix'=>'slider'],function(){

		Route::get('slider_load',[SliderController::class,'datatable'])->name('slider.load');
		Route::get('/',[SliderController::class,'index'])->name('slider.index');
		Route::get('create',[SliderController::class,'create'])->name('slider.create');
		Route::post('store',[SliderController::class,'store'])->name('slider.store');
		Route::get('edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
		Route::post('update',[SliderController::class,'update'])->name('slider.update');
		Route::post('delete',[SliderController::class,'delete'])->name('slider.delete');

	});

	//Amenity Routes
	Route::group(['prefix'=>'amenity'],function(){

		Route::get('amenity_load',[AmenityController::class,'datatable'])->name('amenity.load');
		Route::get('/',[AmenityController::class,'index'])->name('amenity.index');
		Route::get('create',[AmenityController::class,'create'])->name('amenity.create');
		Route::post('store',[AmenityController::class,'store'])->name('amenity.store');
		Route::get('edit/{id}',[AmenityController::class,'edit'])->name('amenity.edit');
		Route::post('update',[AmenityController::class,'update'])->name('amenity.update');
		Route::post('delete',[AmenityController::class,'delete'])->name('amenity.delete');

	});

	//Room type Routes
	Route::group(['prefix'=>'room_type'],function(){

		Route::get('room_type_load',[RoomTypeController::class,'datatable'])->name('room_type.load');
		Route::get('/',[RoomTypeController::class,'index'])->name('room_type.index');
		Route::get('create',[RoomTypeController::class,'create'])->name('room_type.create');
		Route::post('store',[RoomTypeController::class,'store'])->name('room_type.store');
		Route::get('edit/{id}',[RoomTypeController::class,'edit'])->name('room_type.edit');
		Route::post('update',[RoomTypeController::class,'update'])->name('room_type.update');
		Route::post('delete',[RoomTypeController::class,'delete'])->name('room_type.delete');

	});
	
	//Floor Routes
	Route::group(['prefix'=>'floor'],function(){

		Route::get('floor_load',[FloorController::class,'datatable'])->name('floor.load');
		Route::get('/',[FloorController::class,'index'])->name('floor.index');
		Route::get('create',[FloorController::class,'create'])->name('floor.create');
		Route::post('store',[FloorController::class,'store'])->name('floor.store');
		Route::get('edit/{id}',[FloorController::class,'edit'])->name('floor.edit');
		Route::post('update',[FloorController::class,'update'])->name('floor.update');
		Route::post('delete',[FloorController::class,'delete'])->name('floor.delete');

	});

	//room keeper Routes
	Route::group(['prefix'=>'room_keeper'],function(){

		Route::get('room_keeper_load',[RoomKeeperController::class,'datatable'])->name('room_keeper.load');
		Route::get('/',[RoomKeeperController::class,'index'])->name('room_keeper.index');
		Route::get('create',[RoomKeeperController::class,'create'])->name('room_keeper.create');
		Route::post('store',[RoomKeeperController::class,'store'])->name('room_keeper.store');
		Route::get('edit/{id}',[RoomKeeperController::class,'edit'])->name('room_keeper.edit');
		Route::post('update',[RoomKeeperController::class,'update'])->name('room_keeper.update');
		Route::post('delete',[RoomKeeperController::class,'delete'])->name('room_keeper.delete');

	});

	//Room Routes
	Route::group(['prefix'=>'room'],function(){

		Route::get('room_load',[RoomController::class,'datatable'])->name('room.load');
		Route::get('/',[RoomController::class,'index'])->name('room.index');
		Route::get('create',[RoomController::class,'create'])->name('room.create');
		Route::post('store',[RoomController::class,'store'])->name('room.store');
		Route::get('edit/{id}',[RoomController::class,'edit'])->name('room.edit');
		Route::post('update',[RoomController::class,'update'])->name('room.update');
		Route::get('detail/{id}',[RoomController::class,'detail'])->name('room.detail');
		Route::post('delete',[RoomController::class,'delete'])->name('room.delete');

	});

	//Gallery Routes
	Route::group(['prefix'=>'gallery'],function(){

		Route::get('gallery_load',[GalleryController::class,'datatable'])->name('gallery.load');
		Route::get('/',[GalleryController::class,'index'])->name('gallery.index');
		Route::get('create',[GalleryController::class,'create'])->name('gallery.create');
		Route::post('store',[GalleryController::class,'store'])->name('gallery.store');
		Route::get('edit/{id}',[GalleryController::class,'edit'])->name('gallery.edit');
		Route::post('update',[GalleryController::class,'update'])->name('gallery.update');
		Route::post('delete',[GalleryController::class,'delete'])->name('gallery.delete');

	});

	//restaurant Routes
	Route::group(['prefix'=>'restaurant'],function(){

		Route::get('restaurant_load',[RestaurantController::class,'datatable'])->name('restaurant.load');
		Route::get('/',[RestaurantController::class,'index'])->name('restaurant.index');
		Route::get('create',[RestaurantController::class,'create'])->name('restaurant.create');
		Route::post('store',[RestaurantController::class,'store'])->name('restaurant.store');
		Route::get('edit/{id}',[RestaurantController::class,'edit'])->name('restaurant.edit');
		Route::post('update',[RestaurantController::class,'update'])->name('restaurant.update');
		Route::post('delete',[RestaurantController::class,'delete'])->name('restaurant.delete');

	});

	//Banner Routes
	Route::group(['prefix'=>'banner'],function(){

		Route::get('banner_load',[BannerController::class,'datatable'])->name('banner.load');
		Route::get('/',[BannerController::class,'index'])->name('banner.index');
		Route::get('create',[BannerController::class,'create'])->name('banner.create');
		Route::post('store',[BannerController::class,'store'])->name('banner.store');
		Route::get('edit/{id}',[BannerController::class,'edit'])->name('banner.edit');
		Route::post('update',[BannerController::class,'update'])->name('banner.update');
		Route::post('delete',[BannerController::class,'delete'])->name('banner.delete');
	});

	//Project Routes
	Route::group(['prefix'=>'project'],function(){

		Route::get('project_load',[ProjectController::class,'datatable'])->name('project.load');
		Route::get('/',[ProjectController::class,'index'])->name('project.index');
		Route::get('create',[ProjectController::class,'create'])->name('project.create');
		Route::post('store',[ProjectController::class,'store'])->name('project.store');
		Route::get('edit/{id}',[ProjectController::class,'edit'])->name('project.edit');
		Route::post('update',[ProjectController::class,'update'])->name('project.update');
		Route::post('delete',[ProjectController::class,'delete'])->name('project.delete');

	});


	// Social Routes
		Route::group(['prefix'=>'social'],function(){

		Route::get('load_social',[SocialController::class,'datatable'])->name('load_social');
		Route::get('social_list',[SocialController::class,'index'])->name('social_list');
		Route::get('social_create',[SocialController::class,'create'])->name('social_create');
		Route::post('social_store',[SocialController::class,'store'])->name('social_store');
		Route::get('social_edit/{id}',[SocialController::class,'edit'])->name('social_edit');
		Route::post('social_update',[SocialController::class,'update'])->name('social_update');
		Route::post('social_delete',[SocialController::class,'delete'])->name('social_delete');
	});

	// Admin authenticate route
	Route::get('login',[AuthenticatedSessionController::class,'create'])->name('admin_login');
	Route::post('login',[AuthenticatedSessionController::class,'store'])->name('login_submit');
	Route::post('logout',[AuthenticatedSessionController::class,'destroy'])->name('admin_logout');

});


