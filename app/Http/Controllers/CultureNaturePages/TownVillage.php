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
        if($town['is_dhq'] ){
            return $this->dhq($town);
        }else{
            return $this->cities($town);
        }

    }
     public function cities($town)
    {

        $town['name'] = $town['town']['Name'] ?? $town['gram_panchayat']['village_name_en'] ?? '-';
        return view('culturenature.townvillages.town', compact('town'));

    }

    public function dhq($dhq)
    {
        $dhq['name'] = $dhq['town']['Name'] ?? $dhq['gram_panchayat']['village_name_en'] ?? '-';
        return view('culturenature.townvillages.dhq', compact('dhq','village'));
    }





}
