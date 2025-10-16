<?php

declare(strict_types=1);

namespace App\Livewire\Imports;

use App\Models\Import;
use App\Services\ImportService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class PreviewTable extends Component
{
    public Import $import;

    /**
     * @var array<int, string>
     */
    public array $headers = [];

    /**
     * @var array<int, array<string, mixed>>
     */
    public array $rows = [];

    /**
     * @var array<int, array{row: int, column: string, message: string}>
     */
    public array $validationErrors = [];

    protected ?ImportService $importService = null;

    public function boot(ImportService $importService): void
    {
        $this->importService = $importService;
    }

    public function mount(Import $import): void
    {
        $this->import = $import;
        $this->loadPreview();
    }

    public function loadPreview(): void
    {
        if (! $this->importService) {
            return;
        }
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

    public function processImport(): void
    {
        $this->authorize('process', $this->import);
        \App\Jobs\ProcessImportJob::dispatch($this->import->id);
        $this->redirect(route('imports.progress', $this->import));
    }

    public function render(): View
    {
        return view('livewire.imports.preview-table');
    }
}
