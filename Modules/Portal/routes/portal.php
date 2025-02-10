<?php

use Illuminate\Support\Facades\Route;
use Modules\Portal\Http\Controllers\PortalController;


Route::get('/{portal:slug}', [PortalController::class, 'portal'])
    ->whereIn('portal', ['^(?!yp).*', '^(?!partner-api).*', '^(?!prapi).*'])
    ->name('portal');

