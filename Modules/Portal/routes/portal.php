<?php

use Illuminate\Support\Facades\Route;
use Modules\Portal\Http\Controllers\PortalController;

Route::group(['prefix' => 'portal'], function () {
    Route::get('/{cityName}',[PortalController::class,'portal']);
});
