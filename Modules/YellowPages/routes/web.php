<?php

use Illuminate\Support\Facades\Route;
use Modules\YellowPages\app\Http\Controllers\Main\HomeController;
use Modules\YellowPages\Http\Controllers\ListingController;
use Modules\YellowPages\Http\Controllers\VCardController;
use Modules\YellowPages\Http\Controllers\ReviewController                                           ;
use Modules\YellowPages\Http\Controllers\AuthModalController                                           ;
use Modules\YellowPages\Http\Controllers\admin\AuthController;
use Modules\YellowPages\Http\Controllers\admin\AdminController;
use Modules\YellowPages\Http\Controllers\admin\CitiesController;
use Modules\YellowPages\Http\Controllers\admin\CategoriesController;
use Modules\YellowPages\Http\Controllers\admin\BusinessController;
// use App\Http\Controllers\Auth\AuthController;

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


Route::group(['prefix' => 'yellow-pages'], function () {

    Route::post('/authLogin', [AuthModalController::class, 'login'])->name('yp.authLogin');
    Route::post('/register', [AuthModalController::class, 'register'])->name('yp.register');
    Route::post('/logout', [AuthModalController::class, 'logout'])->name('yp.logout');
    Route::get('/home', [HomeController::class, 'index'])->name('yp.home');
    Route::get('/signIn', [HomeController::class, 'signIn'])->name('signIn');
    Route::get('/listing_plan', [HomeController::class, 'listing_plan'])->name('yp.listing_plan');
    Route::get('/add_listing', [HomeController::class, 'add_listing'])->name('yp.add_listing');
    Route::get('/showSearchcategory', [HomeController::class, 'showSearchcategory']);

    ##------------------------- Drop Down data get ---------------------##

    Route::get('/listing', [ListingController::class, 'index'])->name('yp.listing');
    Route::get('/listing-details/{listingId}', [ListingController::class, 'listing'])->name('yp.listing-details');
    Route::get('/getLocationData', [ListingController::class, 'getLocationData'])->name('yp.getLocationData');
    Route::post('/store-listing', [ListingController::class, 'store'])->name('yp.listing.store');
    Route::get('/submit-listing', [ListingController::class, 'submit_listing'])->name('yp.listing.submit');;
    Route::get('/vcard', [VCardController::class, 'index'])->name('yp.vcard');
    Route::post('/reviews/store/{listing}', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/submit', [ReviewController::class, 'submit_review'])->name('review.submit');
    //Admin
    Route::get('login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('admin.authenticate');
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

     #this route is use for admin users
     Route::get('user-profile', [AdminController::class, 'userProfile'])->name('admin.user-profile');
     Route::get('user-listing', [AdminController::class, 'userListing'])->name('admin.user-listing');
     Route::get('user-register', [AdminController::class, 'userRegister'])->name('admin.user-register');
     Route::post('users-store', [AdminController::class, 'userStore'])->name('admin.users-store');
     Route::post('users-delete/{id}', [AdminController::class, 'userDelete'])->name('admin.users-delete');
     Route::get('user-edit/{id}', [AdminController::class, 'userEdit'])->name('admin.user-edit');
     Route::put('user-update/{id}', [AdminController::class, 'userUpdate'])->name('admin.user-update');

     #this route is use for admin cities
     Route::get('cities-listing', [CitiesController::class, 'citiesListing'])->name('admin.cities-listing');
     Route::get('cities-register', [CitiesController::class, 'citiesRegister'])->name('admin.cities-register');
     Route::post('cities-store', [CitiesController::class, 'citiesStore'])->name('admin.cities-store');
     Route::post('cities-delete/{id}', [CitiesController::class, 'citiesDelete'])->name('admin.cities-delete');
     Route::get('cities-edit/{id}', [CitiesController::class, 'citiesEdit'])->name('admin.cities-edit');
     Route::put('cities-update/{id}', [CitiesController::class, 'citiesUpdate'])->name('admin.cities-update');
    
     #this route is use for admin Categories
     Route::get('categories-listing', [CategoriesController::class, 'categoriesListing'])->name('admin.categories-listing');
     Route::get('categories-register', [CategoriesController::class, 'categoriesRegister'])->name('admin.categories-register');
     Route::post('categories-store', [CategoriesController::class, 'categoriesStore'])->name('admin.categories-store');
     Route::post('categories-delete/{id}', [CategoriesController::class, 'categoriesDelete'])->name('admin.categories-delete');
     Route::get('categories-edit/{id}', [CategoriesController::class, 'categoriesEdit'])->name('admin.categories-edit');
     Route::put('categories-update/{id}', [CategoriesController::class, 'categoriesUpdate'])->name('admin.categories-update');
  
      #this route is use for admin Categories
     Route::get('business-listing', [BusinessController::class, 'businessListing'])->name('admin.business-listing');
     Route::post('listing-delete/{id}', [BusinessController::class, 'listingDelete'])->name('admin.listing-delete');
     Route::get('listing-edit/{id}', [BusinessController::class, 'listingEdit'])->name('admin.listing-edit');
     Route::put('listing-update/{id}', [BusinessController::class, 'listingUpdate'])->name('admin.listing-update');
  
});



