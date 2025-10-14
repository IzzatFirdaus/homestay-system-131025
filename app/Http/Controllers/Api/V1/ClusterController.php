<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClusterResource;
use App\Models\Cluster;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Cluster API Controller
 */
final class ClusterController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', Cluster::class);

        $query = Cluster::query();

        if ($request->query('negeri') !== null) {
            $query->where('negeri', (string) $request->query('negeri'));
        }

        $perPageParam = $request->query('per_page');
        $perPage = min($perPageParam !== null ? (int) $perPageParam : 20, 100);

        $paginated = $query->paginate($perPage);

        return response()->json([
            'data' => ClusterResource::collection($paginated->items()),
            'meta' => [
                'total' => $paginated->total(),
                'per_page' => $paginated->perPage(),
                'current_page' => $paginated->currentPage(),
                'last_page' => $paginated->lastPage(),
            ],
        ]);
    }

    public function show(Cluster $cluster): ClusterResource
    {
        $this->authorize('view', $cluster);

        return new ClusterResource($cluster);
    }

    public function store(Request $request): JsonResponse
    {
        $this->authorize('create', Cluster::class);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'negeri' => 'required|string|max:100',
            'penerangan' => 'nullable|string',
        ]);

        $cluster = Cluster::create($validated);

        return response()->json([
            'data' => new ClusterResource($cluster),
            'message' => 'Cluster created successfully.',
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, Cluster $cluster): JsonResponse
    {
        $this->authorize('update', $cluster);

        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'negeri' => 'sometimes|required|string|max:100',
            'penerangan' => 'nullable|string',
        ]);

        $cluster->update($validated);

        return response()->json([
            'data' => new ClusterResource($cluster),
            'message' => 'Cluster updated successfully.',
        ]);
    }

    public function destroy(Cluster $cluster): JsonResponse
    {
        $this->authorize('delete', $cluster);

        $cluster->delete();

        return response()->json([
            'message' => 'Cluster deleted successfully.',
        ], Response::HTTP_NO_CONTENT);
    }
}
