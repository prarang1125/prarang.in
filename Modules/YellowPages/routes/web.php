<?php

use Illuminate\Support\Facades\Route;
use Modules\YellowPages\Http\Controllers\ListingController;
use Modules\YellowPages\Http\Controllers\HomeController;
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
use Modules\YellowPages\Http\Controllers\VCard\PlanController;
use Modules\YellowPages\Http\Controllers\VCard\VcardQRController;
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

    ##------------------------- Auth ---------------------##
    Route::get('/login', [AuthModalController::class, 'index'])->name('yp.login');
    Route::post('/authLogin', [AuthModalController::class, 'login'])->name('yp.authLogin');
    Route::post('/new-account', [AuthModalController::class, 'newAccount'])->name('yp.newAccount');
    Route::post('/register', [AuthModalController::class, 'register'])->name('yp.register');
    Route::post('/logout', [AuthModalController::class, 'logout'])->name('yp.logout');
    ##------------------------- END ---------------------##

    ##------------------------- Home ---------------------##
    Route::get('/home', [HomeController::class, 'index'])->name('yp.home');
    Route::get('/listing_plan', [HomeController::class, 'listing_plan'])->name('yp.listing_plan');
    Route::get('/bazzar_plan', [HomeController::class, 'bazzar_plan'])->name('yp.bazzar_plan');
    Route::get('/add_listing', [HomeController::class, 'add_listing'])->name('yp.add_listing');
    Route::get('/showSearchcategory', [HomeController::class, 'showSearchcategory']);
    ##------------------------- END ---------------------##

    ##------------------------- Business Listing ---------------------##
    Route::get('category/{category_name}', [ListingController::class, 'showByCategory'])->name('category.show');
    Route::get('city/{city_name}', [ListingController::class, 'showByCity'])->name('city.show');
    Route::get('/listing-details/{listingId}', [ListingController::class, 'listing'])->name('yp.listing-details');

    Route::group(['middleware' => 'auth.custom'], function(){
      Route::get('/getLocationData', [ListingController::class, 'getLocationData'])->name('yp.getLocationData');
      Route::post('/store-listing', [ListingController::class, 'store'])->name('yp.listing.store');
      Route::get('/submit-listing', [ListingController::class, 'submit_listing'])->name('yp.listing.submit');
      Route::get('/Save-listing/{id}', [ListingController::class, 'save_listing'])->name('yp.listing.save');
    });
    ##------------------------- END ---------------------##

    ##------------------------- Review Listing ---------------------##
    Route::post('/reviews/store/{listing}', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/submit', [ReviewController::class, 'submit_review'])->name('review.submit');
    ##------------------------- END ---------------------##

    ##------------------------- Vcard  ---------------------##
    Route::get('/vcard', [VCardController::class, 'index'])->name('yp.vcard');
    Route::get('/vCard/dashboard', [VCardController::class, 'dashboard'])->name('vCard.dashboard');
    Route::get('/vCard/logout', [VCardController::class, 'logout'])->name('vCard.logout');
    Route::get('/vCard/createCard', [VCardController::class, 'createCard'])->name('vCard.createCard');
    ##------------------------- END ---------------------##

    Route::group(['middleware' => 'auth.custom'], function(){
    ##------------------------- Carete VCard ---------------------##
    Route::post('/vCard/CardStore', [CreateVCardController::class, 'store'])->name('vCard.store');
    Route::get('/vcard-edit/{id}', [CreateVCardController::class, 'vcardEdit'])->name('vCard.vcard-edit');
    Route::put('/vcard-update/{id}', [CreateVCardController::class, 'vcardUpdate'])->name('vCard.update');
    Route::get('/vcard/view/', [CreateVCardController::class, 'view'])->name('vCard.view');
    ##------------------------- END ---------------------##

    ##------------------------- VCard QR ---------------------##
    Route::get('/vcard/scan/{qrCode}', [VcardQRController::class, 'scanAndView'])->name('vCard.scanView');
    Route::get('/vcard/qr/', [VcardQRController::class, 'generateQrCode'])->name('vCard.generateQr');
    Route::get('vcard/qr-code/download', [VcardQRController::class, 'downloadQrCode'])->name('vCard.downloadQrCode');
    ##------------------------- END ---------------------##

    ##------------------------- Vcard Stripe Integrate ---------------------##
    Route::get('/vcard/ActivePlan', [PlanController::class, 'plan'])->name('vCard.plan');
    Route::get('/vcard/MembershipPlan', [PlanController::class, 'planDetails'])->name('vCard.planDetails');
    Route::get('/vcard/paymentHistory', [PlanController::class, 'paymentHistory'])->name('vCard.paymentHistory');
    Route::post('vCard/stripe-checkout', [PlanController::class, 'stripeCheckout'])->name('vcard.stripeCheckout');
    Route::get('vCard/payment-success', [PlanController::class, 'paymentSuccess'])->name('vcard.paymentSuccess');
    Route::get('vCard/payment-cancel', [PlanController::class, 'paymentCancel'])->name('vcard.paymentCancel');
    ##------------------------- END ---------------------##

    ##------------------------- Dashboard User data ---------------------##
    Route::get('/vCard/user-edit/{id}', [vCardAuthcontroller::class, 'userEdit'])->name('vCard.userEdit');
    Route::put('/vCard/user-update/{id}', [vCardAuthcontroller::class, 'userUpdate'])->name('vCard.userUpdate');
    ##------------------------- END ---------------------##

    ##------------------------- Dashboard Listing data ---------------------##
    Route::get('/vcard/business-listing', [BusinessListingController::class, 'businessListing'])->name('vCard.business-listing');
    Route::get('/vcard/save-listing', [BusinessListingController::class, 'saveBusiness'])->name('vCard.business-save');
    Route::post('/vcard/listing-delete/{id}', [BusinessListingController::class, 'listingDelete'])->name('vCard.listing-delete');
    Route::post('/vcard/Savelisting-delete/{id}', [BusinessListingController::class, 'SavelistingDelete'])->name('vCard.Savelisting-delete');
    Route::get('/vcard/listing-edit/{id}', [BusinessListingController::class, 'listingEdit'])->name('vCard.listing-edit');
    Route::put('/vcard/listing-update/{id}', [BusinessListingController::class, 'listingUpdate'])->name('vCard.listing-update');
    ##------------------------- END ---------------------##

    ##------------------------- Dashboard Review data ---------------------##
    Route::get('vcard/rating', [listingReviewController::class, 'Rating'])->name('vCard.Rating');
    ##------------------------- END ---------------------##

    ##------------------------- Dashboard Report ---------------------##
    Route::get('/vcard/report', [ReportController::class, 'index'])->name('vCard.report');
    Route::post('/vcard/Report-submit', [ReportController::class, 'store'])->name('vCard.report-submit');
    ##------------------------- END ---------------------##

  });

  // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<    End yellowPages user Side   >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>



  // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<    Start yellowPages Admin Side   >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


    ##------------------------- Admin Auth---------------------##
    Route::group(['middleware' => 'admin.guest'], function(){
    Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/admin/authenticate', [AuthController::class, 'authenticate'])->name('admin.authenticate');
    });
    ##------------------------- END ---------------------##


    ##------------------------- Admin Dashboard ---------------------##
    Route::group(['middleware' => 'admin.auth'], function(){
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

     #this route is use for admin users
     Route::get('admin/user-listing', [AdminController::class, 'userListing'])->name('admin.user-listing');
     Route::get('admin/user-register', [AdminController::class, 'userRegister'])->name('admin.user-register');
     Route::post('admin/users-store', [AdminController::class, 'userStore'])->name('admin.users-store');
     Route::post('admin/users-delete/{id}', [AdminController::class, 'userDelete'])->name('admin.users-delete');
     Route::get('admin/user-edit/{id}', [AdminController::class, 'userEdit'])->name('admin.user-edit');
     Route::put('admin/user-update/{id}', [AdminController::class, 'userUpdate'])->name('admin.user-update');

     #this route is use for admin cities
     Route::get('admin/cities-listing', [CitiesController::class, 'citiesListing'])->name('admin.cities-listing');
     Route::get('admin/cities-register', [CitiesController::class, 'citiesRegister'])->name('admin.cities-register');
     Route::post('admin/cities-store', [CitiesController::class, 'citiesStore'])->name('admin.cities-store');
     Route::post('admin/cities-delete/{id}', [CitiesController::class, 'citiesDelete'])->name('admin.cities-delete');
     Route::get('admin/cities-edit/{id}', [CitiesController::class, 'citiesEdit'])->name('admin.cities-edit');
     Route::put('admin/cities-update/{id}', [CitiesController::class, 'citiesUpdate'])->name('admin.cities-update');
    
     #this route is use for admin Categories
     Route::get('admin/categories-listing', [CategoriesController::class, 'categoriesListing'])->name('admin.categories-listing');
     Route::get('admin/categories-register', [CategoriesController::class, 'categoriesRegister'])->name('admin.categories-register');
     Route::post('admin/categories-store', [CategoriesController::class, 'categoriesStore'])->name('admin.categories-store');
     Route::post('admin/categories-delete/{id}', [CategoriesController::class, 'categoriesDelete'])->name('admin.categories-delete');
     Route::get('admin/categories-edit/{id}', [CategoriesController::class, 'categoriesEdit'])->name('admin.categories-edit');
     Route::put('admin/categories-update/{id}', [CategoriesController::class, 'categoriesUpdate'])->name('admin.categories-update');
  
      #this route is use for admin Categories
     Route::get('admin/business-listing', [BusinessController::class, 'businessListing'])->name('admin.business-listing');
     Route::post('admin/listing-delete/{id}', [BusinessController::class, 'listingDelete'])->name('admin.listing-delete');
     Route::get('admin/listing-edit/{id}', [BusinessController::class, 'listingEdit'])->name('admin.listing-edit');
     Route::put('admin/listing-update/{id}', [BusinessController::class, 'listingUpdate'])->name('admin.listing-update');
    });

     #this route is use for admin paymnet details
     Route::get('admin/paymentHistory', [PaymentController::class, 'paymentHistory'])->name('admin.paymentHistory');

     #this route is use for admin Rating details
     Route::get('admin/Rating', [RatingController::class, 'Rating'])->name('admin.Rating');


     #this route is use for admin Rating details
     Route::get('admin/Report', [RatingController::class, 'Report'])->name('admin.Report');

    ##------------------------------------------ END -----------------------------------##


  // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<    End yellowPages Admin Side   >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>




    Route::get('{category}/{city}', [ListingController::class, 'index'])->name('yp.listing');

      ##------------------------- Not require ---------------------##
    Route::get('/signIn', [HomeController::class, 'signIn'])->name('signIn');
    Route::get('/vCard/login', [vCardAuthcontroller::class, 'index'])->name('vCard.login');
    Route::post('/vCard/authenticate', [vCardAuthcontroller::class, 'authenticate'])->name('vCard.authenticate');
    ##------------------------- END ---------------------##

});
