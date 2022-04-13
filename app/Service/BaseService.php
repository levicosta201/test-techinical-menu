<?php

namespace App\Service;

use Illuminate\Http\JsonResponse;

class BaseService
{
    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonResponse($data, int $statusCode): JsonResponse
    {
        return response()->json([
            'status' => $statusCode,
            'message' => null,
            'data' => $data
        ]);
    }
}
