<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Models\Performance;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * API controller for performance (monthly metrics) operations.
 */
final class PerformanceApiController extends ApiController
{
    /**
     * Display a listing of performance records.
     */
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', Performance::class);

        // Implementation will be added
        return $this->successResponse([]);
    }

    /**
     * Display the specified performance record.
     */
    public function show(Performance $performance): JsonResponse
    {
        $this->authorize('view', $performance);

        return $this->successResponse($performance);
    }
}
