<?php

namespace App\Http\Controllers\CultureNaturePages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TownVillage extends Controller
{
    //TO Display the Selection Of State + Villages + Towns
    public function villages($id, $slug)
    {


        $parts = explode('-', url_decoder($id));
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

        $village['name'] = $village['village']['Name'] ?? $village['gram_panchayat']['village_name_en'] ?? '-';

        return view('culturenature.townvillages.index', compact('village'));
    }

    public function towns($id, $slug)
    {
        $parts = explode('-', url_decoder($id));
        if (count($parts) === 4) {
            list($state, $districts, $subDistrict, $town) = $parts;
        } else {
            list($state, $districts, $town) = $parts;
            $subDistrict = null;
        }


         $town = httpGet('v1/pages/town', [
            'state_id' => $state,
            'district_id' => $districts,
            'town_id' => $town
        ])['data'];

        $town['name'] = $town['town']['Name'] ?? $town['gram_panchayat']['village_name_en'] ?? '-';
        $town['village_type']='type_a';
        $village=$town;
        return view('culturenature.townvillages.town', compact('town','village'));
    }



}
