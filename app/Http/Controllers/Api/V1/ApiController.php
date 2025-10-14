<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

/**
 * Base API controller with common API response methods.
 */
abstract class ApiController extends Controller
{
    /**
     * Return a successful API response.
     *
     * @param  array<string, mixed>  $meta
     */
    protected function successResponse(mixed $data, array $meta = [], int $status = 200): \Illuminate\Http\JsonResponse
    {
        $response = ['data' => $data];

        if ($meta !== []) {
            $response['meta'] = $meta;
        }

        return response()->json($response, $status);
    }

    /**
     * Return an error API response.
     *
     * @param  array<string, mixed>  $details
     */
    protected function errorResponse(
        string $message,
        string $code = 'ERROR',
        array $details = [],
        int $status = 400
    ): \Illuminate\Http\JsonResponse {
        $error = [
            'message' => $message,
            'code' => $code,
        ];

        if ($details !== []) {
            $error['details'] = $details;
        }

        return response()->json(['error' => $error], $status);
    }

    /**
     * Return a paginated API response.
     *
     * @param  \Illuminate\Contracts\Pagination\LengthAwarePaginator<int, mixed>  $paginator
     */
    protected function paginatedResponse(\Illuminate\Contracts\Pagination\LengthAwarePaginator $paginator): \Illuminate\Http\JsonResponse
    {
        /** @var array<int, mixed> $items */
        $items = $paginator->items();

        return $this->successResponse(
            $items,
            [
                'pagination' => [
                    'total' => $paginator->total(),
                    'per_page' => $paginator->perPage(),
                    'current_page' => $paginator->currentPage(),
                    'last_page' => $paginator->lastPage(),
                    'from' => $paginator->firstItem(),
                    'to' => $paginator->lastItem(),
                ],
            ]
        );
    }
}
