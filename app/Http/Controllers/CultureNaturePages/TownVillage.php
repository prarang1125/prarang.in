<?php

namespace App\Http\Controllers\CultureNaturePages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TownVillage extends Controller
{
    //TO Display the Selection Of State + Villages + Towns
    public function index()
    {
        return view('culturenature.townvillages.index');
    }
}
