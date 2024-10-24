<?php

namespace Modules\Portal\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function portal($cityName)
    {
                
        return view('portal::portal.home', ['cityName' => $cityName]);
    }
}

