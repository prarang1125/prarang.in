<?php

use App\Http\Controllers\Main\Home;
use App\Http\Controllers\Main\postController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;



// Route::get('/',function (){
//     return Hash::make('#Pra@21#');
// });
Route::get('/', [Home::class, 'index'])->name('home');
Route::get('/market', [Home::class, 'market'])->name('market');
Route::get('/content', [Home::class, 'content'])->name('content');
Route::get('/semiotics', [Home::class, 'semiotics'])->name('semiotics');
Route::get('/analytics', [Home::class, 'analytics'])->name('analytics');
Route::get('/about-us', [Home::class, 'aboutUs'])->name('about-us');
Route::get('/partners', [Home::class, 'partners'])->name('partners');
Route::get('/privacy-policy', [Home::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/refund-cancellation', [Home::class, 'refundCancellation'])->name('refund-cancellation');
Route::get('/terms-conditions', [Home::class, 'termsConditions'])->name('terms-conditions');
// Route::get('/{slug}/post', [postController::class, 'index'])->name('posts.slug');
Route::get('{city}/post/', [postController::class, 'getChittiData'])->name('posts.city');


