<?php

use App\Http\Controllers\Main\Home;
use App\View\Components\Post\Navbar;
use App\Http\Controllers\Main\postController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\PostArchives;


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
Route::get('/terms-conditions', [Home::class, 'termsConditions'])->name('terms-conditions');
Route::get('{city}/posts', [postController::class, 'getChittiData'])->name('posts.city');
Route::get('/post-summary/{id}', [postController::class, 'post_summary']);
Route::get('/archive/{citySlug}/{postId}/{name}',[PostArchives::class,'archivePosts'])->name('post-archive');
Route::get('/archives',[PostArchives::class,'archive'])->name('archive');
Route::get('/archives/{catg}',[PostArchives::class,'archiveCatg'])->name('archive-catg');
Route::get('/decode', [postController::class, 'decodeText']);


