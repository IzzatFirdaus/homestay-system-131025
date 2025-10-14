<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImportResource;
use App\Models\Homestay;
use App\Models\Import;
use App\Services\ImportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Import API Controller
 *
 * Handles Excel/CSV import workflows including preview, validation, and processing.
 */
final class ImportController extends Controller
{
    public function __construct(
        private readonly ImportService $importService,
    ) {}

    /**
     * List all import records.
     */
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', Import::class);

        $query = Import::query()->with(['user'])->latest();

        if ($request->query('type') !== null) {
            $query->where('type', (string) $request->query('type'));
        }

        if ($request->query('status') !== null) {
            $query->where('status', (string) $request->query('status'));
        }

        $perPageParam = $request->query('per_page');
        $perPage = min($perPageParam !== null ? (int) $perPageParam : 20, 100);

        $paginated = $query->paginate($perPage);

        return response()->json([
            'data' => ImportResource::collection($paginated->items()),
            'meta' => [
                'total' => $paginated->total(),
                'per_page' => $paginated->perPage(),
                'current_page' => $paginated->currentPage(),
                'last_page' => $paginated->lastPage(),
            ],
        ]);
    }

    /**
     * Show a specific import record.
     */
    public function show(Import $import): ImportResource
    {
        $this->authorize('view', $import);

        $import->load(['user']);

        return new ImportResource($import);
    }

    /**
     * Preview import file without processing.
     */
    public function preview(Request $request): JsonResponse
    {
        $this->authorize('import', Homestay::class);

        $validated = $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:10240',
            'type' => 'required|in:homestays,performances',
        ]);

        $previewResult = $this->importService->previewImport(
            $validated['file'],
            $validated['type']
        );

        return response()->json([
            'data' => [
                'type' => $previewResult->type,
                'total_rows' => $previewResult->totalRows,
                'sample_rows' => $previewResult->sampleRows,
                'errors' => array_map(
                    static fn ($error) => [
                        'row' => $error->rowNumber,
                        'message' => $error->message,
                        'context' => $error->context,
                    ],
                    $previewResult->errors
                ),
            ],
        ]);
    }

    /**
     * Process import file (queue or immediate).
     */
    public function process(Request $request): JsonResponse
    {
        $this->authorize('import', Homestay::class);

        $validated = $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:10240',
            'type' => 'required|in:homestays,performances',
        ]);

        $user = auth()->user();
        if (! $user instanceof \App\Models\User) {
            return response()->json([
                'error' => [
                    'message' => 'Unauthenticated.',
                    'code' => 'UNAUTHENTICATED',
                ],
            ], Response::HTTP_UNAUTHORIZED);
        }

        // Store file
        $path = $validated['file']->store('imports', 'local');

        // Create import record
        $import = Import::create([
            'user_id' => $user->id,
            'type' => $validated['type'],
            'filename' => $path,
            'status' => 'pending',
            'rows_total' => 0,
            'rows_processed' => 0,
            'rows_success' => 0,
            'rows_failed' => 0,
        ]);

        // Trigger processing
        $result = $this->importService->processImport($import->id);

        return response()->json([
            'data' => [
                'import_id' => $result->importId,
                'processed' => $result->processed,
                'succeeded' => $result->succeeded,
                'failed' => $result->failed,
                'error_report_path' => $result->errorReportPath,
            ],
            'message' => 'Import processing started.',
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Download error report for failed import rows.
     */
    public function downloadErrors(Import $import): BinaryFileResponse|JsonResponse
    {
        $this->authorize('view', $import);

        $meta = $import->meta;
        if (! is_array($meta) || ! isset($meta['error_report_path'])) {
            return response()->json([
                'error' => [
                    'message' => 'No error report available for this import.',
                    'code' => 'ERROR_REPORT_NOT_FOUND',
                ],
            ], Response::HTTP_NOT_FOUND);
        }

        $path = $meta['error_report_path'];
        if (! is_string($path) || ! Storage::disk('local')->exists($path)) {
            return response()->json([
                'error' => [
                    'message' => 'Error report file not found.',
                    'code' => 'FILE_NOT_FOUND',
                ],
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->download(Storage::disk('local')->path($path));
    }
}
