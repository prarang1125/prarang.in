<?php

namespace Modules\Portal\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Portal\Models\Portal;

class PortalController extends Controller
{
    public function portal(Portal $portal)
    {
        $cityCode = $portal->city_code;

        return view('portal::portal.home', compact('cityCode', 'portal'));
    }
}
