<?php

use Illuminate\Support\Facades\Route;
use Modules\YellowPages\Http\Controllers\YellowPagesController;
use Modules\YellowPages\app\Http\Controllers\Main\HomeController;
use Modules\YellowPages\Http\Controllers\ListingController;
use Modules\YellowPages\Http\Controllers\VCardController;
use Modules\YellowPages\Http\Controllers\ReviewController                                           ;
use Modules\YellowPages\Http\Controllers\admin\AuthController;
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
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::group(['prefix' => 'yellow-pages'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('yp.home');
    Route::get('/signIn', [HomeController::class, 'signIn'])->name('signIn');
    Route::get('/listing_plan', [HomeController::class, 'listing_plan'])->name('yp.listing_plan');
    Route::get('/add_listing', [HomeController::class, 'add_listing'])->name('yp.add_listing');
    Route::get('/showSearchcategory', [HomeController::class, 'showSearchcategory']);

    ##------------------------- Drop Down data get ---------------------##
    Route::get('/listing', [ListingController::class, 'index'])->name('yp.listing');
    Route::get('/listing-details/{listingId}', [ListingController::class, 'listing'])->name('yp.listing');
    Route::get('/getLocationData', [ListingController::class, 'getLocationData'])->name('yp.getLocationData');
    Route::post('/store-listing', [ListingController::class, 'store'])->name('yp.listing.store');
    Route::get('/submit-listing', [ListingController::class, 'submit_listing'])->name('yp.listing.submit');;
    Route::get('/vcard', [VCardController::class, 'index'])->name('yp.vcard');
    Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');

    //Admin

    Route::get('login', [AuthController::class, 'index'])->name('admin.login');



});



