<?php

namespace App\Http\Controllers;

use AWS\CRT\HTTP\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerApi extends Controller
{

    public function getChittiByDateRange(Request $request)
    {
        // return 2;
        // Validate the incoming request
        $validated = $request->validate([
            'city_code' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $city_code = $validated['city_code'];
        $start_date = $validated['start_date'];
        $end_date = $validated['end_date'];

        try {
            // Perform the query using Laravel's query builder
            $results = DB::table('chitti')
                ->join('chittiimagemapping as img', 'img.chittiId', '=', 'chitti.chittiId')
                ->join('chittitagmapping as tagm', 'tagm.chittiId', '=', 'chitti.chittiId')
                ->join('colorinfo', 'chitti.color_value', '=', 'colorinfo.id')
                ->join('vChittiGeography as vcg', 'vcg.chittiId', '=', 'chitti.chittiId')
                ->join('vGeography as vg', 'vg.geographycode', '=', 'vcg.Geography')
                ->join('facity', 'facity.chittiId', '=', 'chitti.chittiId')

                ->whereRaw('STR_TO_DATE(chitti.dateOfApprove, "%d-%m-%Y") BETWEEN ? AND ?', [$start_date, $end_date])

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
                )
                ->orderByRaw("STR_TO_DATE(dateOfApprove, '%d-%m-%Y') DESC")
                // ->limit(500)
                ->get();
            $data = $results->toArray();
            // Return the data in a successful JSON response
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ], 200);

        } catch (\Exception $e) {
            // Handle exceptions and return a server error response
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to fetch data, Server error.',
                'error' => $e->getMessage(), // Include error message for debugging (optional)
            ], 500);
        }

    }
    public function getChittiData(Request $request)
{
    $city_code = $request->input('city_code');

    if (is_null($city_code)) {
        return response()->json(['status' => 'error', 'message' => 'Required: city_code.'], 404);
    }

    try {
        $query = "
            (
                SELECT
                    chitti.chittiId,
                    chitti.Title,
                    chitti.dateOfApprove,
                    chitti.totalViewerCount,
                    img.imageUrl,
                    DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH), '%M %Y') AS MonthGroup,
                    vg.geography
                FROM chitti
                JOIN chittiimagemapping AS img ON img.chittiId = chitti.chittiId
                JOIN vChittiGeography AS vcg ON vcg.chittiId = chitti.chittiId
                JOIN vGeography AS vg ON vg.geographycode = vcg.Geography
                WHERE
                    vg.geographycode = ?
                    AND STR_TO_DATE(chitti.dateOfApprove, '%d-%m-%Y %h:%i %p')
                        BETWEEN DATE_SUB(LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)), INTERVAL 1 MONTH)
                        AND LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
                ORDER BY CONVERT(chitti.totalViewerCount, SIGNED) DESC
                LIMIT 3
            )
            UNION ALL
            (
                SELECT
                    chitti.chittiId,
                    chitti.Title,
                    chitti.dateOfApprove,
                    chitti.totalViewerCount,
                    img.imageUrl,
                    DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 MONTH), '%M %Y') AS MonthGroup,
                    vg.geography
                FROM chitti
                JOIN chittiimagemapping AS img ON img.chittiId = chitti.chittiId
                JOIN vChittiGeography AS vcg ON vcg.chittiId = chitti.chittiId
                JOIN vGeography AS vg ON vg.geographycode = vcg.Geography
                WHERE
                    vg.geographycode = ?
                    AND STR_TO_DATE(chitti.dateOfApprove, '%d-%m-%Y %h:%i %p')
                        BETWEEN DATE_SUB(LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 2 MONTH)), INTERVAL 1 MONTH)
                        AND LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 2 MONTH))
                ORDER BY CONVERT(chitti.totalViewerCount, SIGNED) DESC
                LIMIT 3
            )
            UNION ALL
            (
                SELECT
                    chitti.chittiId,
                    chitti.Title,
                    chitti.dateOfApprove,
                    chitti.totalViewerCount,
                    img.imageUrl,
                    DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 3 MONTH), '%M %Y') AS MonthGroup,
                    vg.geography
                FROM chitti
                JOIN chittiimagemapping AS img ON img.chittiId = chitti.chittiId
                JOIN vChittiGeography AS vcg ON vcg.chittiId = chitti.chittiId
                JOIN vGeography AS vg ON vg.geographycode = vcg.Geography
                WHERE
                    vg.geographycode = ?
                    AND STR_TO_DATE(chitti.dateOfApprove, '%d-%m-%Y %h:%i %p')
                        BETWEEN DATE_SUB(LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 3 MONTH)), INTERVAL 1 MONTH)
                        AND LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 3 MONTH))
                ORDER BY CONVERT(chitti.totalViewerCount, SIGNED) DESC
                LIMIT 3
            )
        ";

        // Execute raw query with bindings
        $data = DB::select($query, [$city_code, $city_code, $city_code]);

        // Group data by MonthGroup
        $groupedData = collect($data)->groupBy('MonthGroup');

        return response()->json(['status' => 'success', 'data' => $groupedData], 200);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Unable to fetch data, Server error.'], 500);
    }
}


}
