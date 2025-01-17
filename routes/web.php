<?php

use App\Http\Controllers\Main\Home;
use App\Http\Controllers\Main\PostArchives;
use App\Http\Controllers\Main\postController;
use App\Http\Controllers\MobileApi\ChittiList;
use App\View\Components\Layout\Main\Base;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
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

});

// Route::get('{city}/posts/{name?}/{forabour?}', [postController::class, 'getChittiData'])->name('posts.city');
Route::get('/post-summary/{slug}/{id}/{subTitle?}', [PostController::class, 'post_summary'])->name('post-summary');
Route::get('/decode', [postController::class, 'decodeText']);

Route::prefix('archives')->group(function () {
    Route::get('/{cityCode?}', [PostArchives::class, 'archive'])->name('archive');
    Route::get('/{cityCode}/{catg}', [PostArchives::class, 'archiveCatg'])->name('archive-catg');
    Route::get('/{cityCode}/{catg}/{ids}/{name}', [PostArchives::class, 'archivePosts'])->name('post-archive');
});

Route::get('visitor-location', [Base::class,'visitorLocation']);

Route::get('{city}/posts/{name?}/{forAbour?}', [ChittiList::class, 'getChittiData'])->name('api.posts.city');

