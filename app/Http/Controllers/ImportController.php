<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UploadImportRequest;
use App\Jobs\ProcessImportJob;
use App\Models\Import;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ImportController extends Controller
{
    /**
     * Display the import upload form and recent imports.
     */
    public function index(): View
    {
        $this->authorize('viewAny', Import::class);

        $imports = Import::with('user')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(15);

        return view('pages.imports.index', compact('imports'));
    }

    /**
     * Handle file upload and queue import job.
     */
    public function upload(UploadImportRequest $request): RedirectResponse
    {
        $file = $request->file('file');
        $type = $request->input('type');

        // Store file in private storage
        $path = $file->store('imports', 'local');

        // Create import record
        $import = Import::create([
            'user_id' => Auth::id(),
            'type' => $type,
            'filename' => $file->getClientOriginalName(),
            'status' => 'queued',
            'rows_total' => 0,
            'rows_processed' => 0,
            'rows_success' => 0,
            'rows_failed' => 0,
            'meta' => [
                'file_path' => $path,
                'file_size' => $file->getSize(),
                'original_name' => $file->getClientOriginalName(),
            ],
        ]);

        // Dispatch job to queue
        ProcessImportJob::dispatch($import->id);

        return redirect()->route('imports.show', $import)
            ->with('success', __('Fail sedang diproses. Anda akan dimaklumkan apabila selesai.'));
    }

    /**
     * Display import status and results.
     */
    public function show(Import $import): View
    {
        $this->authorize('view', $import);

        $import->load('user');

        return view('pages.imports.show', compact('import'));
    }

    /**
     * Download error report for failed import.
     */
    public function downloadErrors(Import $import): \Symfony\Component\HttpFoundation\StreamedResponse|RedirectResponse
    {
        $this->authorize('view', $import);

        if ($import->status !== 'completed' || $import->rows_failed === 0) {
            return redirect()->back()
                ->with('error', __('Tiada laporan ralat tersedia untuk import ini.'));
        }

        $errorFilePath = $import->meta['error_file_path'] ?? null;

        if (! is_string($errorFilePath) || ! Storage::disk('local')->exists($errorFilePath)) {
            return redirect()->back()
                ->with('error', __('Fail laporan ralat tidak dijumpai.'));
        }

        /** @var \Symfony\Component\HttpFoundation\StreamedResponse */
        return Storage::disk('local')->download(
            $errorFilePath,
            'import-errors-' . $import->id . '.xlsx'
        );
    }
}
