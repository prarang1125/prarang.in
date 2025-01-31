<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPages extends Controller
{
    public function index(){
        return view('landing.index');
    }
}
