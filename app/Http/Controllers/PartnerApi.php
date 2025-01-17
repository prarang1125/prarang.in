<?php

namespace App\Http\Controllers;

use AWS\CRT\HTTP\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerApi extends Controller
{

    public function getChittiByDateRange(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'city_code' => 'required|string',
            'start_date' => 'required|date_format:d-m-Y',
            'end_date' => 'required|date_format:d-m-Y',
        ]);

        $city_code = $validated['city_code'];
        $start_date = $validated['start_date'];
        $end_date = $validated['end_date'];

        // Convert start_date and end_date to a format that matches the database field
        // $start_date = \Carbon\Carbon::createFromFormat('d-m-Y', $start_date)->format('Y-/m-d');
        // $end_date = \Carbon\Carbon::createFromFormat('d-m-Y', $end_date)->format('Y-m-d');

        try {
            // Perform the query using Laravel's query builder
            $results = DB::table('chitti')
                ->join('chittiimagemapping as img', 'img.chittiId', '=', 'chitti.chittiId')
                ->join('chittitagmapping as tagm', 'tagm.chittiId', '=', 'chitti.chittiId')
                ->join('colorinfo', 'chitti.color_value', '=', 'colorinfo.id')
                ->join('vChittiGeography as vcg', 'vcg.chittiId', '=', 'chitti.chittiId')
                ->join('vGeography as vg', 'vg.geographycode', '=', 'vcg.Geography')
                ->join('facity', 'facity.chittiId', '=', 'chitti.chittiId')
                // Use STR_TO_DATE to correctly handle the date format
                // ->whereBetween(DB::raw('STR_TO_DATE(chitti.dateOfApprove, "%d-%m-%Y")'), [$start_date, $end_date])
                ->where('vg.geographycode', $city_code)
                ->select(
                    'chitti.chittiId as post_id',
                    'img.imageUrl as main_image_url',
                    'tagm.tagId as tag_id',
                    'colorinfo.id as emotion_id',
                    'colorinfo.name as emotion',
                    'colorinfo.colorname as emotion_color',
                    'facity.value as for_about_city',
                    'chitti.totalViewerCount as reach',
                    'chitti.fb_link_click',
                    'chitti.dateOfApprove as post_date'
                )->limit(500)
                ->get();

            // Return the data in a successful JSON response
            return response()->json([
                'status' => 'success',
                'data' => $results
            ], 200);

        } catch (\Exception $e) {
            // Handle exceptions and return a server error response
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to fetch data, Server error.'
            ], 500);
        }
    }
}
