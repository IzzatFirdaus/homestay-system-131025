<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Data\HomestayData;
use App\Data\HomestayFilter;
use App\Http\Requests\StoreHomestayRequest;
use App\Http\Requests\UpdateHomestayRequest;
use App\Models\Homestay;
use App\Services\HomestayService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * API controller for homestay CRUD operations.
 */
final class HomestayApiController extends ApiController
{
    public function __construct(
        private readonly HomestayService $homestayService,
    ) {}

    /**
     * Display a listing of homestays.
     */
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', Homestay::class);

        $filter = HomestayFilter::fromRequest($request);
        $homestays = $this->homestayService->listHomestays($filter);

        return $this->successResponse($homestays);
    }

    /**
     * Store a newly created homestay.
     */
    public function store(StoreHomestayRequest $request): JsonResponse
    {
        // Authorization handled in FormRequest
        $data = HomestayData::fromArray($request->validated());
        $homestay = $this->homestayService->createHomestay($data);

        return $this->successResponse($homestay, [], 201);
    }

    /**
     * Display the specified homestay.
     */
    public function show(Homestay $homestay): JsonResponse
    {
        $this->authorize('view', $homestay);

        $homestay->load(['cooperative', 'cluster', 'performances']);

        return $this->successResponse($homestay);
    }

    /**
     * Update the specified homestay.
     */
    public function update(UpdateHomestayRequest $request, Homestay $homestay): JsonResponse
    {
        // Authorization handled in FormRequest
        $data = HomestayData::fromArray($request->validated());
        $updated = $this->homestayService->updateHomestay($homestay, $data);

        return $this->successResponse($updated);
    }

    /**
     * Remove the specified homestay.
     */
    public function destroy(Homestay $homestay): JsonResponse
    {
        $this->authorize('delete', $homestay);

        $this->homestayService->deleteHomestay($homestay);

        return response()->json(null, 204);
    }
}
