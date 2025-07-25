<?php

namespace App\Trait;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public function successResponse($success, $message, $code = 404, $data = []): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ], $code);
    }

    public function errorResponse($success ,$message, $code = 404, $data = []): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ], $code);
    }
}
