<?php

use Illuminate\Support\Facades\Route;
use Modules\Portal\Http\Controllers\PortalController;

Route::group(['prefix' => 'portal'], function () {
    Route::get('/{portal:slug}',[PortalController::class,'portal'])->name('portal');
});

