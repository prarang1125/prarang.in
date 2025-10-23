<?php


namespace App\Services;

use App\Models\Portal;
use Illuminate\Support\Facades\DB;
use Modules\Portal\Models\BiletralPortal;

class PortalUnion{
    public function getPortalUnion($portal=[],$biletral=[])
    {
        try {
            $portalQuery = Portal::select('city_name_local as title', 'slug', 'city_code as geography_code', 'header_image', 'footer_image','header_scripts','viewership', DB::raw("'portal' as type"))
                ->when($portal != null, function ($query) use ($portal) {
                    $query->where($portal[0], $portal[1]);
                });

            $biletralQuery = BiletralPortal::select('title', 'slug', 'content_country_code as geography_code', 'header_image', 'footer_image','header_scripts','viewership', DB::raw("'bilateral' as type"))
                ->when($biletral != null, function ($query) use ($biletral) {
                    $query->where($biletral[0], $biletral[1]);
                });

            return $query = $portalQuery->union($biletralQuery)->firstOrFail();
        } catch (\Exception $e) {
                abort(500);
        }

    }
}
