<?php

use Illuminate\Support\Facades\Route;
use Modules\Portal\Http\Controllers\PortalController;




Route::group(['prefix' => 'p'], function () {
    Route::get('/{id}', function ($id) {
        return $id;
    });
});
