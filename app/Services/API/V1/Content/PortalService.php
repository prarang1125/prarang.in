<?php

namespace App\Services\API\V1\Content;

use App\Models\Portal;
use App\Services\API\V1\BaseService;

class PortalService extends BaseService
{
    public function getPortal($request){
      $portalSlug = $request->slug;
      $portal = Portal::where('slug', $portalSlug)->first();
      $portal['image_base']="https://prarang.s3.amazonaws.com/";
      return $this->apiResponse(true, 'Portal retrieved successfully', compact('portal'), 200);
    }
}
