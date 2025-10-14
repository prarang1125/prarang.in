<?php

namespace App\Services\API\V1;

class BaseService
{

    public function apiResponse(bool $success, string $message, array $data = [], int $statusCode = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data'    => $data,
        ], $statusCode);
    }
}
