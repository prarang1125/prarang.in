<?php

use Illuminate\Support\Facades\Route;
use Modules\Portal\Http\Controllers\PortalController;


Route::get('/{portal:slug}', [PortalController::class, 'portal'])
    ->where('portal', '^(?!yellow-pages).*')
    ->where('portal', '^(?!partner-api).*')
    ->where('portal', '^(?!prapi).*')
    ->name('portal');



