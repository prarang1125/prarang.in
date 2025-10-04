<?php

use App\Http\Controllers\DisplayPostImage;
use App\Http\Controllers\LandingPages;
use App\Http\Controllers\Main\Home;
use App\Http\Controllers\Main\PostArchives;
use App\Http\Controllers\Main\postController;
use App\Http\Controllers\AI\AIController;
use App\Http\Controllers\AI\SharedResponseController;
use App\Http\Controllers\PartnerApi;
use App\Http\Controllers\MobileApi\ChittiList;
use App\Http\Controllers\ShortnerUrl;
use App\Livewire\Pages\ComparisonApi;
use App\Livewire\Pages\UpmanaAi;
use App\View\Components\Layout\Main\Base;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

Route::get('/partner-api/get-chitti-data', [PartnerApi::class, 'getChittiByDateRange']);
Route::get('/partner-api/get-top-3-posts/', [PartnerApi::class, 'getChittiData']);
Route::get('/prapi/{url}', [ChittiList::class, 'getChittiData'])->name('api.posts.city');

Route::get('/display/images/{filename}', [DisplayPostImage::class, 'serveImage'])->where('filename', '.*');

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

Route::get('/{city}/all-posts/{name?}/{forabour?}', [postController::class, 'getChittiData'])->name('posts.city');
Route::get('/{slug}/posts/{id}/{subTitle?}', [PostController::class, 'post_summary'])->name('post-summary');
// Route::get('{city}/posts/{name?}/{forabour?}', [postController::class, 'getChittiData'])->name('posts.city');
Route::get('/post-summary/{slug}/{id}/{subTitle?}', [PostController::class, 'post_summary'])->name('post-summary');
Route::get('/decode', [postController::class, 'decodeText']);

Route::prefix('archives')->group(function () {
    Route::get('/{cityCode?}', [PostArchives::class, 'archive'])->name('archive');
    Route::get('/{cityCode}/{catg}', [PostArchives::class, 'archiveCatg'])->name('archive-catg');
    Route::get('/{cityCode}/{catg}/{ids}/{name}', [PostArchives::class, 'archivePosts'])->name('post-archive');
});

Route::get('visitor-location', [Base::class, 'visitorLocation']);
Route::any('duration-update', [Base::class, 'durationUpdate']);
Route::get('yellow-pages/meerut/landing-page', [LandingPages::class, 'index']);


Route::any('/upmana/comparision-with-others', ComparisonApi::class)->name('ai.response');
Route::post('/generate/ai/Response/all', [AIController::class, 'generateAIResponse'])->name('ai.generate.response');;
// Route::any('/generate/ai/Response/single', [AIController::class, 'generateSingleAIResponse'])->name('ai.single.response');
Route::post('share-response', [SharedResponseController::class, 'store'])->name('share.store');
Route::get('/share/{uuid}', [SharedResponseController::class, 'show'])->name('share.show');

// UpmanaAi

Route::get('/ai/upmana/{lang?}', UpmanaAi::class)->name('upmana-ai');
Route::get('/00-{query?}', [ShortnerUrl::class, 'index'])->name('shortner-url');
