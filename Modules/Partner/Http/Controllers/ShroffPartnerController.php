<?php

namespace Modules\Partner\Http\Controllers;

use Illuminate\Routing\Controller;

class ShroffPartnerController extends Controller
{
  public function index()
  {
    $hDatas = httpGet('/v1/partner/get-sceh-data') ?? [];
    $hData = $hDatas['data'] ?? [];
    $townPop = $hDatas['town_pop'] ?? [];
    $cityPop = $hDatas['city_pop'] ?? [];
    $villagePop = $hDatas['village_pop'] ?? [];
    $sentence = $hDatas['sentence'] ?? "";
    return view('partner::shroff.index', compact('hData', 'townPop', 'cityPop', 'villagePop', 'sentence'));
  }
}
