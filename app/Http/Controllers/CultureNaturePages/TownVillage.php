<?php

namespace App\Http\Controllers\CultureNaturePages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

        $otherVilTown = httpGet('v1/pages/get-village-town-dhq', [
            'district_id' => $village['district']['district_LGD_code'],
            'dhq_id' => $village['district']['dhq_code'],
            'request_for' => 'town-village'
        ])['data'];

        return view('culturenature.townvillages.index', compact('village', 'otherVilTown'));
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

        $towndata = httpGet('v1/pages/town', [
            'state_id' => $state,
            'district_id' => $districts,
            'town_id' => $town
        ])['data'];

        if ($towndata['is_dhq']) {
            return $this->dhq($towndata);
        } else {
            return $this->cities($towndata);
        }
        //   return $this->dhq($towndata);

    }
    public function cities($town)
    {

        $town['name'] = $town['town']['Name'] ?? $town['gram_panchayat']['village_name_en'] ?? '-';
        $otherVilTown = httpGet('v1/pages/get-village-town-dhq', [
            'district_id' => $town['dhq']['district_LGD_code'],
            'dhq_id' => $town['dhq']['DHQ_Code'],
            'request_for' => 'town-village'
        ])['data'];
        return view('culturenature.townvillages.town', compact('town', 'otherVilTown'));
    }

    public function dhq($dhq)
    {
        $dhq['name'] = $dhq['dhq']['city'];

        $otherVilTown = httpGet('v1/pages/get-village-town-dhq', [
            'district_id' => $dhq['dhq']['district_LGD_code'],
            'dhq_id' => $dhq['dhq']['DHQ_Code'],
            'request_for' => 'town-village'
        ])['data'];

        $intData = $this->fetchInternateData($dhq['dhq']['DHQ_Code']);
        return view('culturenature.townvillages.dhq', compact('dhq', 'otherVilTown', 'intData'));
    }

    public function fetchInternateData($city_id)
    {
        try {
            $cacheKey = "internateData_{$city_id}_newsx";
            // Check cache first (equivalent to localStorage in React)


            if (isset($cachedData)) {
                $internateData = $cachedData;
                return $internateData;
            }

            // Fetch from API

            $filteredData = httpGet('/internate-data/cities', ['city_id' => $city_id]);
            $source = $filteredData['source'];
            $aligned = [];
            $map = [
                'MSTR5' => 'city_population',
                'INT5'  => 'internet_users',
                'INT2'  => 'facebook_users',
                'INT10' => 'linkedin_users',
                'INT17' => 'twitter_users',
                'INT19' => 'instagram_users',
            ];
            $data = $filteredData['data'];
            foreach ($map as $code => $field) {
                $sourceItem = $filteredData['source'][$code][0] ?? null;
                $aligned[$field] = [
                    'field' => $field,
                    'value' => $data[$field] ?? null,
                    'source' => is_array($sourceItem) ? $sourceItem : ['source' => 'N/A'],
                ];
            }
            $filteredData = $aligned;
            // Cache for a while (e.g., 24 hours) as per React localStorage intent
            Cache::put($cacheKey, $filteredData, now()->addDay());

            return $filteredData;
        } catch (\Exception $e) {
            $internateError = $e->getMessage();
        }
    }
}
