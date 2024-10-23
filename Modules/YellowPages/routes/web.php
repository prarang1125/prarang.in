<?php

use Illuminate\Support\Facades\Route;
use Modules\YellowPages\Http\Controllers\YellowPagesController;
use Modules\YellowPages\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Auth\AuthController;

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

Route::group(['prefix'=>'yellow-pages'], function () {
    // Route::resource('yellowpages', YellowPagesController::class)->names('yellowpages');

Route::get('/home', [HomeController::class, 'index'])->name('home'); // Ensure this line is present
Route::get('/signIn', [HomeController::class, 'signIn'])->name('signIn');
Route::get('/category', [HomeController::class, 'category'])->name('category');
Route::get('/showSearchcategory', [HomeController::class, 'showSearchcategory']);

});
