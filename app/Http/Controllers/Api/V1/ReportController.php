<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Data\ReportType;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Models\LaporanTerjadual;
use App\Services\ReportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Report API Controller
 *
 * Manages scheduled reports and on-demand report generation.
 */
final class ReportController extends Controller
{
    public function __construct(
        private readonly ReportService $reportService,
    ) {}

    /**
     * List all scheduled reports.
     */
    public function index(Request $request): JsonResponse
    {
        $query = LaporanTerjadual::query()->with(['user'])->latest();

        $user = $request->user();
        if ($user instanceof \App\Models\User && ! $user->hasAnyRole(['Super Admin', 'Admin'])) {
            $query->where('user_id', $user->id);
        }

        $perPageParam = $request->query('per_page');
        $perPage = min($perPageParam !== null ? (int) $perPageParam : 20, 100);

        $paginated = $query->paginate($perPage);

        return response()->json([
            'data' => ReportResource::collection($paginated->items()),
            'meta' => [
                'total' => $paginated->total(),
                'per_page' => $paginated->perPage(),
                'current_page' => $paginated->currentPage(),
                'last_page' => $paginated->lastPage(),
            ],
        ]);
    }

    /**
     * Show a specific scheduled report.
     */
    public function show(LaporanTerjadual $report): ReportResource
    {
        return new ReportResource($report->load(['user']));
    }

    /**
     * Generate a report on-demand.
     */
    public function generate(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'type' => 'required|in:dashboard_summary,homestay_performance,negeri_performance',
            'format' => 'required|in:pdf,xlsx,csv',
            'filters' => 'nullable|array',
            'filters.negeri' => 'nullable|string',
            'filters.cooperative_id' => 'nullable|integer',
            'filters.start_date' => 'nullable|date',
            'filters.end_date' => 'nullable|date|after_or_equal:filters.start_date',
        ]);

        $user = $request->user();
        if (! $user instanceof \App\Models\User) {
            return response()->json([
                'error' => [
                    'message' => 'Unauthenticated.',
                    'code' => 'UNAUTHENTICATED',
                ],
            ], Response::HTTP_UNAUTHORIZED);
        }

        $reportType = ReportType::from($validated['type']);

        $reportFile = $this->reportService->generateReport(
            $reportType,
            $validated['filters'] ?? [],
            $validated['format'],
        );

        return response()->json([
            'data' => [
                'path' => $reportFile->path,
                'disk' => $reportFile->disk,
                'mime_type' => $reportFile->mimeType,
            ],
            'message' => 'Report generated successfully.',
        ], Response::HTTP_CREATED);
    }

    /**
     * Schedule a recurring report.
     */
    public function schedule(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'format' => 'required|in:pdf,xlsx,csv',
            'frekuensi' => 'required|in:daily,weekly,monthly',
            'filters' => 'nullable|array',
            'recipients' => 'nullable|array',
            'recipients.*' => 'email',
        ]);

        $user = $request->user();
        if (! $user instanceof \App\Models\User) {
            return response()->json([
                'error' => [
                    'message' => 'Unauthenticated.',
                    'code' => 'UNAUTHENTICATED',
                ],
            ], Response::HTTP_UNAUTHORIZED);
        }

        $report = LaporanTerjadual::create([
            'user_id' => $user->id,
            'nama' => $validated['nama'],
            'format' => $validated['format'],
            'frekuensi' => $validated['frekuensi'],
            'filters' => $validated['filters'] ?? [],
            'recipients' => $validated['recipients'] ?? [],
            'status' => 'aktif',
        ]);

        return response()->json([
            'data' => new ReportResource($report),
            'message' => 'Report scheduled successfully.',
        ], Response::HTTP_CREATED);
    }

    /**
     * Download a generated report.
     */
    public function download(LaporanTerjadual $report): JsonResponse
    {
        $this->authorize('view', $report);

        // This is a placeholder - actual implementation would store generated files
        // and retrieve them from storage
        return response()->json([
            'error' => [
                'message' => 'Report download not yet implemented.',
                'code' => 'NOT_IMPLEMENTED',
            ],
        ], Response::HTTP_NOT_IMPLEMENTED);
    }
}
