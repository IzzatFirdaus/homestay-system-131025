<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\GenerateReportRequest;
use App\Models\LaporanTerjadual;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * API controller for report generation.
 */
final class ReportApiController extends ApiController
{
    /**
     * Display a listing of scheduled reports.
     */
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', LaporanTerjadual::class);

        // Implementation will be added
        return $this->successResponse([]);
    }

    /**
     * Generate a report (schedule or generate immediately).
     */
    public function generate(GenerateReportRequest $request): JsonResponse
    {
        // Authorization handled in FormRequest
        // Generate report using service

        return $this->successResponse(['message' => 'Report generation started'], [], 202);
    }

    /**
     * Display the specified report.
     */
    public function show(LaporanTerjadual $report): JsonResponse
    {
        $this->authorize('view', $report);

        return $this->successResponse($report);
    }

    /**
     * Download a generated report file.
     */
    public function download(LaporanTerjadual $report): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        $this->authorize('view', $report);

        // Implementation will use ReportService
        return response()->streamDownload(function (): void {
            // Stream report file
        }, $report->filename ?? 'report.pdf');
    }
}
