<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Models\Cooperative;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * API controller for cooperative operations.
 */
final class CooperativeApiController extends ApiController
{
    /**
     * Display a listing of cooperatives.
     */
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', Cooperative::class);

        // Implementation will be added
        return $this->successResponse([]);
    }

    /**
     * Display the specified cooperative.
     */
    public function show(Cooperative $cooperative): JsonResponse
    {
        $this->authorize('view', $cooperative);

        $cooperative->load(['homestays']);

        return $this->successResponse($cooperative);
    }
}
