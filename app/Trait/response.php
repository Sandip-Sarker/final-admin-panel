<?php

namespace App\Trait;

use Illuminate\Http\JsonResponse;

trait response
{
    public function successResponse($message, $code = 404, $data = []): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ], $code);
    }

    public function errorResponse($message, $code = 404, $data = []): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ], $code);
    }
}
