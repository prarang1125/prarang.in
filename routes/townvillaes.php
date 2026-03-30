<?php

use App\Http\Controllers\CultureNaturePages\TownVillage;
use Illuminate\Support\Facades\Route;

Route::get('/village/{id}/{slug}', [TownVillage::class, 'villages'])->name('village');
Route::get('/town/{id}/{slug}', [TownVillage::class, 'towns'])->name('town');

