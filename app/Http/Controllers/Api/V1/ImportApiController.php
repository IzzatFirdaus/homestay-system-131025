<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\PreviewImportRequest;
use App\Http\Requests\ProcessImportRequest;
use App\Models\Import;
use App\Services\ImportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * API controller for import operations.
 */
final class ImportApiController extends ApiController
{
    public function __construct(
        private readonly ImportService $importService,
    ) {}

    /**
     * Display a listing of imports.
     */
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', Import::class);

        // Implementation will be added
        return $this->successResponse([]);
    }

    /**
     * Preview the uploaded file without processing.
     */
    public function preview(PreviewImportRequest $request): JsonResponse
    {
        // Authorization handled in FormRequest
        $file = $request->file('file');
        $type = $request->validated('jenis_import');

        $preview = $this->importService->previewImport($file, $type);

        return $this->successResponse($preview);
    }

    /**
     * Process an import.
     */
    public function process(ProcessImportRequest $request): JsonResponse
    {
        // Authorization handled in FormRequest
        // Process import and return result ID

        return $this->successResponse(['message' => 'Import processing started'], [], 202);
    }

    /**
     * Display the specified import status.
     */
    public function show(Import $import): JsonResponse
    {
        $this->authorize('view', $import);

        return $this->successResponse($import);
    }

    /**
     * Get import progress/status.
     */
    public function status(Import $import): JsonResponse
    {
        $this->authorize('view', $import);

        return $this->successResponse([
            'id' => $import->id,
            'status' => $import->status,
            'progress' => $import->progress_percentage,
            'total_rows' => $import->rows_total,
            'processed_rows' => $import->rows_processed,
            'error_count' => $import->rows_failed,
        ]);
    }

    /**
     * Download the error report for failed import.
     */
    public function downloadErrors(Import $import): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        $this->authorize('view', $import);

        // Implementation will use ImportService
        return response()->streamDownload(function (): void {
            // Stream error report
        }, "import-{$import->id}-errors.xlsx");
    }
}
