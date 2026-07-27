<?php

use Illuminate\Support\Facades\Route;
// use Modules\Partner\Http\Controllers\PartnerController;
use Modules\Partner\Http\Controllers\ShroffPartnerController;

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

// Route::group([], function () {
//     Route::resource('partner', PartnerController::class)->names('partner');
// });
Route::middleware(['web'])
    ->prefix('partner')
    ->name('partner.')
    ->group(function () {
        Route::get('/sceh', [ShroffPartnerController::class, 'index'])->name('index');
    });
