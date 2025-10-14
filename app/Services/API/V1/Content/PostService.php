<?php

namespace App\Services\API\V1\Content;

use App\Services\API\V1\BaseService;

class PostService extends BaseService
{
    public function getPosts($requestData, $portal)
    {

        return $this->apiResponse(true, 'Posts retrieved successfully', $portal, 200);
    }
}
