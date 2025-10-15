<?php

declare(strict_types=1);

namespace App\Livewire\Imports;

use App\Models\Import;
use App\Services\ImportService;
use Livewire\Component;

class PreviewTable extends Component
{
    public Import $import;

    public array $headers = [];

    public array $rows = [];

    public array $validationErrors = [];

    protected $importService;

    public function boot(ImportService $importService)
    {
        $this->importService = $importService;
    }

    public function mount(Import $import)
    {
        $this->import = $import;
        $this->loadPreview();
    }

    public function loadPreview()
    {
        $previewData = $this->importService->getPreviewDataForImport($this->import);
        /** @var array<int, string> $headers */
        $headers = $previewData->getHeaders();
        $this->headers = $headers;
        /** @var array<int, array<string, mixed>> $rows */
        $rows = $previewData->sampleRows->toArray();
        $this->rows = $rows;
        /** @var array<int, array{row: int, column: string, message: string}> $errors */
        $errors = $this->importService->getValidationErrors($this->import);
        $this->validationErrors = $errors;
    }

    public function processImport()
    {
        $this->authorize('process', $this->import);

        // Dispatch job to process the import
        \App\Jobs\ProcessImportJob::dispatch($this->import, \Illuminate\Support\Facades\Auth::user());

        // Redirect to progress status page
        return redirect()->route('imports.progress', $this->import);
    }

    public function render()
    {
        return view('livewire.imports.preview-table');
    }
}
