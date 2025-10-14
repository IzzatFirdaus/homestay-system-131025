<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\PreviewImportRequest;
use App\Http\Requests\ProcessImportRequest;
use App\Models\Import;
use App\Services\ImportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Web controller for import operations (Excel uploads).
 */
final class ImportController extends Controller
{
    public function __construct(
        private readonly ImportService $importService,
    ) {}

    /**
     * Display a listing of imports.
     */
    public function index(Request $request): View
    {
        $this->authorize('viewAny', Import::class);
        /** @var view-string $view */
        $view = 'imports.index';

        return view($view);
    }

    /**
     * Show the form for creating a new import.
     */
    public function create(): View
    {
        $this->authorize('create', Import::class);
        /** @var view-string $view */
        $view = 'imports.create';

        return view($view);
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

        return response()->json([
            'data' => $preview,
        ]);
    }

    /**
     * Store a newly created import and process it.
     */
    public function store(ProcessImportRequest $request): RedirectResponse
    {
        // Authorization handled in FormRequest
        // Process import and return result

        return redirect()
            ->route('imports.index')
            ->with('success', 'Import processing started');
    }

    /**
     * Display the specified import.
     */
    public function show(Import $import): View
    {
        $this->authorize('view', $import);

        /** @var view-string $view */
        $view = 'imports.show';

        return view($view, [
            'import' => $import,
        ]);
    }

    /**
     * Download the error report for failed import.
     */
    public function downloadErrors(Import $import): StreamedResponse
    {
        $this->authorize('view', $import);

        // Delegate to service when implemented; for now, return empty stream
        return response()->streamDownload(function (): void {
            echo '';
        }, "import-{$import->id}-errors.xlsx");
    }
}
