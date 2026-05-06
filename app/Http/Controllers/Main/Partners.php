<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Partners extends Controller
{
    public function partners()
    {
        return view('main.partners.index');
    }

    public function indiaCity()
    {
        return view('main.partners.india-city');
    }
}
