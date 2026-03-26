<?php

namespace App\Http\Controllers\CultureNaturePages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TownVillage extends Controller
{
    //TO Display the Selection Of State + Villages + Towns
    public function villages($id, $slug)
    {
        $parts = explode('-', $id);
        if (count($parts) === 4) {
            list($state, $districts, $subDistrict, $village) = $parts;
        } else {
            list($state, $districts, $village) = $parts;
            $subDistrict = null;
        }

        $village = httpGet('v1/pages/vilage', [
            'state_id' => $state,
            'district_id' => $districts,
            'sub_district_id' => $subDistrict,
            'village_id' => $village
        ])['data'];



        return view('culturenature.townvillages.index', compact('village'));
    }
}
