<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Models\Cluster;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * API controller for cluster operations.
 */
final class ClusterApiController extends ApiController
{
    /**
     * Display a listing of clusters.
     */
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', Cluster::class);

        // Implementation will be added
        return $this->successResponse([]);
    }

    /**
     * Display the specified cluster.
     */
    public function show(Cluster $cluster): JsonResponse
    {
        $this->authorize('view', $cluster);

        $cluster->load(['homestays']);

        return $this->successResponse($cluster);
    }
}
