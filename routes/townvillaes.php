<?php

use App\Http\Controllers\CultureNaturePages\TownVillage;
use Illuminate\Support\Facades\Route;

Route::get('/town-villages', [TownVillage::class, 'index'])->name('town-villae');
