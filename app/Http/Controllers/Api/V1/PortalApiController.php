<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Portal;
use Illuminate\Http\Request;
use App\Services\API\V1\Content\PortalService;
use Illuminate\Support\Facades\Cache;

class PortalApiController extends Controller
{
    public function getPortal(Request $request, PortalService $portalService)
    {
        try {
            $request->validate([
                'slug' => 'required|string|exists:portals,slug',
                'language' => 'nullable|string|in:en,es,fr,de,it,pt,ru,zh,hi,mr',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'errors' => $e->errors(),
                'message' => 'Validation Error',
                'data' => [],
            ], 422);
        }
        return $portalService->getPortal($request);
    }
    public function getPortals($lang)
    {
        $key = 'portal_' . $lang;
        $portal = Cache::remember($key, now()->addDays(60), function () use ($lang) {
            return Portal::query()
                ->where('local_lang', $lang)
                ->leftJoin('vChittiGeography as chitti', 'chitti.Geography', '=', 'portals.city_code')
                ->select('portals.id', 'portals.city_name_local as locale_name', 'portals.city_code', 'portals.city_name', 'portals.state', 'portals.zone', 'portals.list_order', 'portals.local_lang', 'portals.is_ext_url', 'portals.ext_urls', 'portals.slug')

                ->selectRaw('COUNT(chitti.chittiid) > 0 as is_live')
                ->groupBy('portals.id')
                ->orderBy('portals.list_order', 'asc')
                ->get()
                ->groupBy('zone')
                ->map(function ($zone) {
                    return $zone->groupBy('state');
                });
        });
        return response()->json([
            'status' => true,
            'errors' => [],
            'message' => 'Success',
            'data' => $portal,
        ]);
    }
}
