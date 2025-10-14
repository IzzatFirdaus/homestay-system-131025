<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Data\PerformanceData;
use App\Http\Controllers\Controller;
use App\Http\Resources\PerformanceResource;
use App\Models\Performance;
use App\Services\PerformanceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Performance API Controller
 *
 * Manages homestay performance data (visitors, revenue, occupancy rates).
 */
final class PerformanceController extends Controller
{
    public function __construct(
        private readonly PerformanceService $performanceService,
    ) {}

    /**
     * Display a listing of performance records.
     */
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', Performance::class);

        $query = Performance::query()->with(['homestay']);

        // Filter by homestay
        if ($request->query('homestay_id') !== null) {
            $query->where('homestay_id', (int) $request->query('homestay_id'));
        }

        // Filter by year
        if ($request->query('tahun') !== null) {
            $query->where('tahun', (int) $request->query('tahun'));
        }

        // Filter by month
        if ($request->query('bulan') !== null) {
            $query->where('bulan', (int) $request->query('bulan'));
        }

        $perPageParam = $request->query('per_page');
        $perPage = min($perPageParam !== null ? (int) $perPageParam : 20, 100);

        $paginated = $query->paginate($perPage);

        return response()->json([
            'data' => PerformanceResource::collection($paginated->items()),
            'meta' => [
                'total' => $paginated->total(),
                'per_page' => $paginated->perPage(),
                'current_page' => $paginated->currentPage(),
                'last_page' => $paginated->lastPage(),
            ],
        ]);
    }

    /**
     * Display the specified performance record.
     */
    public function show(Performance $performance): PerformanceResource
    {
        $this->authorize('view', $performance);

        $performance->load(['homestay']);

        return new PerformanceResource($performance);
    }

    /**
     * Store a newly created performance record.
     */
    public function store(Request $request): JsonResponse
    {
        $this->authorize('create', Performance::class);

        $validated = $request->validate([
            'homestay_id' => 'required|exists:homestays,id',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000|max:2100',
            'pelawat_domestik' => 'required|integer|min:0',
            'pelawat_asing' => 'required|integer|min:0',
            'pendapatan' => 'required|numeric|min:0',
            'sumber_lain' => 'required|numeric|min:0',
        ]);

        $data = new PerformanceData(
            homestayId: $validated['homestay_id'],
            bulan: $validated['bulan'],
            tahun: $validated['tahun'],
            pelawatDomestik: $validated['pelawat_domestik'],
            pelawatAsing: $validated['pelawat_asing'],
            pendapatan: (float) $validated['pendapatan'],
            sumberLain: (float) $validated['sumber_lain'],
        );

        $performance = $this->performanceService->recordPerformance($data);

        return response()->json([
            'data' => new PerformanceResource($performance),
            'message' => 'Performance record created successfully.',
        ], Response::HTTP_CREATED);
    }

    /**
     * Update the specified performance record.
     */
    public function update(Request $request, Performance $performance): JsonResponse
    {
        $this->authorize('update', $performance);

        $validated = $request->validate([
            'pelawat_domestik' => 'sometimes|required|integer|min:0',
            'pelawat_asing' => 'sometimes|required|integer|min:0',
            'pendapatan' => 'sometimes|required|numeric|min:0',
            'sumber_lain' => 'sometimes|required|numeric|min:0',
        ]);

        $data = new PerformanceData(
            homestayId: $performance->homestay_id,
            bulan: $performance->bulan,
            tahun: $performance->tahun,
            pelawatDomestik: $validated['pelawat_domestik'] ?? $performance->pelawat_domestik,
            pelawatAsing: $validated['pelawat_asing'] ?? $performance->pelawat_asing,
            pendapatan: isset($validated['pendapatan']) ? (float) $validated['pendapatan'] : $performance->pendapatan,
            sumberLain: isset($validated['sumber_lain']) ? (float) $validated['sumber_lain'] : $performance->sumber_lain,
        );

        $updated = $this->performanceService->updatePerformance($performance, $data);

        return response()->json([
            'data' => new PerformanceResource($updated),
            'message' => 'Performance record updated successfully.',
        ]);
    }

    /**
     * Remove the specified performance record.
     */
    public function destroy(Performance $performance): JsonResponse
    {
        $this->authorize('delete', $performance);

        $performance->delete();

        return response()->json([
            'message' => 'Performance record deleted successfully.',
        ], Response::HTTP_NO_CONTENT);
    }
}
