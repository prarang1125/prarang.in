<?php

use Illuminate\Support\Facades\Route;
use Modules\Portal\Http\Controllers\PortalController;


Route::get('/{portal:slug}', [PortalController::class, 'portal'])
    ->where('portal', '^(?!yp|yellow-pages|partner-api|prapi).*')
    ->name('portal');
