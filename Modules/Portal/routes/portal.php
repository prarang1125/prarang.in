<?php

use Illuminate\Support\Facades\Route;
use Modules\Portal\Http\Controllers\PortalController;


Route::get('/{slug}', [PortalController::class, 'portal'])
    ->where('slug', '^(?!yp|yellow-pages|partner-api|prapi).*')
    ->name('portal');
