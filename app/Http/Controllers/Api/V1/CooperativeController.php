<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CooperativeResource;
use App\Models\Cooperative;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Cooperative API Controller
 */
final class CooperativeController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', Cooperative::class);

        $perPageParam = $request->query('per_page');
        $perPage = min($perPageParam !== null ? (int) $perPageParam : 20, 100);

        $paginated = Cooperative::query()->paginate($perPage);

        return response()->json([
            'data' => CooperativeResource::collection($paginated->items()),
            'meta' => [
                'total' => $paginated->total(),
                'per_page' => $paginated->perPage(),
                'current_page' => $paginated->currentPage(),
                'last_page' => $paginated->lastPage(),
            ],
        ]);
    }

    public function show(Cooperative $cooperative): CooperativeResource
    {
        $this->authorize('view', $cooperative);

        return new CooperativeResource($cooperative);
    }

    public function store(Request $request): JsonResponse
    {
        $this->authorize('create', Cooperative::class);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:500',
            'telefon' => 'nullable|string|max:20',
            'emel' => 'nullable|email|max:255',
        ]);

        $cooperative = Cooperative::create($validated);

        return response()->json([
            'data' => new CooperativeResource($cooperative),
            'message' => 'Cooperative created successfully.',
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, Cooperative $cooperative): JsonResponse
    {
        $this->authorize('update', $cooperative);

        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'alamat' => 'nullable|string|max:500',
            'telefon' => 'nullable|string|max:20',
            'emel' => 'nullable|email|max:255',
        ]);

        $cooperative->update($validated);

        return response()->json([
            'data' => new CooperativeResource($cooperative),
            'message' => 'Cooperative updated successfully.',
        ]);
    }

    public function destroy(Cooperative $cooperative): JsonResponse
    {
        $this->authorize('delete', $cooperative);

        $cooperative->delete();

        return response()->json([
            'message' => 'Cooperative deleted successfully.',
        ], Response::HTTP_NO_CONTENT);
    }
}
