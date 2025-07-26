<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShortnerUrl extends Controller
{
    public function index(Request $request,$query)
    {
        $parts = explode('-', $query);
        $data = [];        
        foreach ($parts as $part) {
            $key = substr($part, 0, 1);
            $value = substr($part, 1);
            $data[$key] = $value;
        }
        
        dd($data);
    }
}
