<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Portal;
use Illuminate\Http\Request;
use App\Services\API\V1\Content\PortalService;

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
}
