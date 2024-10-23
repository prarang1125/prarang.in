<?php

use Illuminate\Support\Facades\Route;
use Modules\Portal\Http\Controllers\Portal;

Route::group(['prefix' => 'portal'], function () {
   Route::get('/{cityName}',[Portal::class,'portal']);
});
