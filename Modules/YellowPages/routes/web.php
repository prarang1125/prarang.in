<?php

use Illuminate\Support\Facades\Route;
use Modules\YellowPages\app\Http\Controllers\Main\HomeController;
use Modules\YellowPages\Http\Controllers\ListingController;
use Modules\YellowPages\Http\Controllers\VCardController;
use Modules\YellowPages\Http\Controllers\ReviewController;
use Modules\YellowPages\Http\Controllers\AuthModalController;
use Modules\YellowPages\Http\Controllers\ReportController;
use Modules\YellowPages\Http\Controllers\admin\AuthController;
use Modules\YellowPages\Http\Controllers\admin\AdminController;
use Modules\YellowPages\Http\Controllers\admin\PaymentController;
use Modules\YellowPages\Http\Controllers\admin\CitiesController;
use Modules\YellowPages\Http\Controllers\admin\CategoriesController;
use Modules\YellowPages\Http\Controllers\admin\BusinessController;
use Modules\YellowPages\Http\Controllers\admin\RatingController;
use Modules\YellowPages\Http\Controllers\VCard\vCardAuthcontroller;
use Modules\YellowPages\Http\Controllers\VCard\CreateVCardController;
use Modules\YellowPages\Http\Controllers\VCard\BusinessListingController;
use Modules\YellowPages\Http\Controllers\VCard\listingReviewController;
use Illuminate\Support\Facades\App;

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
                       
Route::group(['prefix' => 'yellow-pages', 'middleware' => 'language'], function () {
  Route::get('/home', [HomeController::class, 'index'])->name('yp.home');

    Route::get('/login', [AuthModalController::class, 'index'])->name('yp.login');
    Route::post('/authLogin', [AuthModalController::class, 'login'])->name('yp.authLogin');
    Route::post('/register', [AuthModalController::class, 'register'])->name('yp.register');
    Route::post('/logout', [AuthModalController::class, 'logout'])->name('yp.logout');
   
    Route::get('/signIn', [HomeController::class, 'signIn'])->name('signIn');
    Route::get('/listing_plan', [HomeController::class, 'listing_plan'])->name('yp.listing_plan');
    Route::get('/bazzar_plan', [HomeController::class, 'bazzar_plan'])->name('yp.bazzar_plan');
    Route::get('/add_listing', [HomeController::class, 'add_listing'])->name('yp.add_listing');
    Route::get('/showSearchcategory', [HomeController::class, 'showSearchcategory']);

    ##------------------------- Drop Down data get ---------------------##
    // Route::get('/{category_name}', [ListingController::class, 'show'])->name('category.show');
    Route::get('/listing', [ListingController::class, 'index'])->name('yp.listing');
    Route::get('/listing-details/{listingId}', [ListingController::class, 'listing'])->name('yp.listing-details');
    Route::get('/getLocationData', [ListingController::class, 'getLocationData'])->name('yp.getLocationData');

    Route::group(['middleware' => 'auth.custom'], function(){
    Route::post('/store-listing', [ListingController::class, 'store'])->name('yp.listing.store');
    Route::get('/submit-listing', [ListingController::class, 'submit_listing'])->name('yp.listing.submit');
    Route::get('/Save-listing/{id}', [ListingController::class, 'save_listing'])->name('yp.listing.save');

  });

    Route::post('/reviews/store/{listing}', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/submit', [ReviewController::class, 'submit_review'])->name('review.submit');

        Route::get('/vCard/login', [vCardAuthcontroller::class, 'index'])->name('vCard.login');
        Route::post('/vCard/authenticate', [vCardAuthcontroller::class, 'authenticate'])->name('vCard.authenticate');
        Route::get('/vcard', [VCardController::class, 'index'])->name('yp.vcard');
        
Route::group(['middleware' => 'auth.custom'], function(){
Route::post('vCard/stripe-checkout', [CreateVCardController::class, 'stripeCheckout'])->name('vcard.stripeCheckout');
Route::get('vCard/payment-success', [CreateVCardController::class, 'paymentSuccess'])->name('vcard.paymentSuccess');
Route::get('vCard/payment-cancel', [CreateVCardController::class, 'paymentCancel'])->name('vcard.paymentCancel');
  
  //payment
  Route::get('stripePayment', [VCardController::class, 'stripePayment'])->name('yp.stripe');

  Route::get('/vCard/user-edit/{id}', [vCardAuthcontroller::class, 'userEdit'])->name('vCard.userEdit');
   Route::put('/vCard/user-update/{id}', [vCardAuthcontroller::class, 'userUpdate'])->name('vCard.userUpdate');

 Route::get('/vCard/dashboard', [VCardController::class, 'dashboard'])->name('vCard.dashboard');
 Route::get('/vCard/logout', [VCardController::class, 'logout'])->name('vCard.logout');
 Route::get('/vCard/createCard', [VCardController::class, 'createCard'])->name('vCard.createCard');
 Route::post('/vCard/CardStore', [CreateVCardController::class, 'store'])->name('vCard.store');
 Route::get('/vcard-edit/{id}', [CreateVCardController::class, 'vcardEdit'])->name('vCard.vcard-edit');
 Route::put('/vcard-update/{id}', [CreateVCardController::class, 'vcardUpdate'])->name('vCard.update');

 Route::get('/vcard/view/', [CreateVCardController::class, 'view'])->name('vCard.view');
 Route::get('/vcard/scan/{qrCode}', [CreateVCardController::class, 'scanAndView'])->name('vCard.scanView');
 Route::get('/vcard/qr/', [CreateVCardController::class, 'generateQrCode'])->name('vCard.generateQr');
 Route::get('vcard/qr-code/download', [CreateVCardController::class, 'downloadQrCode'])->name('vCard.downloadQrCode');

 Route::get('vcard/rating', [listingReviewController::class, 'Rating'])->name('vCard.Rating');

 Route::get('/vcard/ActivePlan', [CreateVCardController::class, 'plan'])->name('vCard.plan');
 Route::get('/vcard/MembershipPlan', [CreateVCardController::class, 'planDetails'])->name('vCard.planDetails');
 Route::get('/vcard/paymentHistory', [CreateVCardController::class, 'paymentHistory'])->name('vCard.paymentHistory');

Route::get('/vcard/business-listing', [BusinessListingController::class, 'businessListing'])->name('vCard.business-listing');
Route::get('/vcard/save-listing', [BusinessListingController::class, 'saveBusiness'])->name('vCard.business-save');
Route::post('/vcard/listing-delete/{id}', [BusinessListingController::class, 'listingDelete'])->name('vCard.listing-delete');
Route::post('/vcard/Savelisting-delete/{id}', [BusinessListingController::class, 'SavelistingDelete'])->name('vCard.Savelisting-delete');
Route::get('/vcard/listing-edit/{id}', [BusinessListingController::class, 'listingEdit'])->name('vCard.listing-edit');
Route::put('/vcard/listing-update/{id}', [BusinessListingController::class, 'listingUpdate'])->name('vCard.listing-update');

Route::get('/vcard/report', [ReportController::class, 'index'])->name('vCard.report');
Route::post('/vcard/Report-submit', [ReportController::class, 'store'])->name('vCard.report-submit');

});

     Route::group(['middleware' => 'admin.guest'], function(){
    Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('admin.authenticate');
    });
    Route::group(['middleware' => 'admin.auth'], function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');


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

     #this route is use for admin paymnet details
     Route::get('paymentHistory', [PaymentController::class, 'paymentHistory'])->name('admin.paymentHistory');

     #this route is use for admin Rating details
     Route::get('Rating', [RatingController::class, 'Rating'])->name('admin.Rating');


     #this route is use for admin Rating details
     Route::get('Report', [RatingController::class, 'Report'])->name('admin.Report');
   
});
