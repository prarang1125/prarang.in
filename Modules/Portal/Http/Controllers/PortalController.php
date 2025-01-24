<?php

namespace Modules\Portal\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use Modules\Portal\Models\Portal;

class PortalController extends Controller
{
    public function portal(Portal $portal)
    {
        $cityCode = $portal->city_code;
        $yellowPages = City::where('portal_id', $portal->id)->first();
        return view('portal::portal.home', compact('cityCode', 'portal','yellowPages'));
    }
}
