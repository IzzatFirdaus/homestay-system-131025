<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Import as ImportModel;
use App\Services\ImportService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImportDataForm extends Component
{
    use WithFileUploads;

    #[Validate('nullable|file|mimes:xlsx,csv,xls|max:51200')]
    public mixed $file = null;

    #[Validate('required|in:homestay,performance')]
    public string $importType = 'homestay';

    public bool $isUploading = false;

    public bool $showSuccess = false;

    public string $successMessage = '';

    public bool $showError = false;

    public string $errorMessage = '';

    public float $uploadProgress = 0;

    /**
     * Handle file upload and initiate import process.
     */
    public function submitForm(ImportService $importService): void
    {
        // Full validation
        $this->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls|max:51200',
            'importType' => 'required|in:homestay,performance',
        ]);

        $this->authorize('create', ImportModel::class);

        $this->isUploading = true;
        $this->showSuccess = false;
        $this->showError = false;

        try {
            // Store the uploaded file
            $this->file->store('imports', 'local');
            $originalFilename = $this->file->getClientOriginalName();

            // Create the Import record with pending status
            $import = ImportModel::create([
                'type' => $this->importType,
                'filename' => $originalFilename,
                'user_id' => Auth::id(),
                'status' => 'pending',
                'rows_total' => 0,
                'rows_processed' => 0,
                'rows_failed' => 0,
            ]);

            // Show success message (ensure filename is string for translation)
            $this->successMessage = __('import.messages.upload_success', [
                'filename' => (string) $originalFilename,
            ]);
            $this->showSuccess = true;

            // Clear the form
            $this->file = null;
            $this->importType = 'homestay';
            $this->uploadProgress = 0;

            // Dispatch event to refresh dashboard metrics
            $this->dispatch('data-imported', importId: $import->id, type: $this->importType);

            // Optional: Redirect to preview page after brief delay
            // For now, keep on current page and show success
        } catch (\Exception $e) {
            $this->errorMessage = __('import.messages.upload_error', [
                'error' => $e->getMessage(),
            ]);
            $this->showError = true;
        } finally {
            $this->isUploading = false;
        }
    }

    /**
     * Handle file validation on selection.
     */
    public function updatedFile(): void
    {
        $this->validateOnly('file');
        $this->showError = false;
        $this->showSuccess = false;
    }

    /**
     * Clear form and hide messages.
     */
    public function resetForm(): void
    {
        $this->file = null;
        $this->importType = 'homestay';
        $this->showSuccess = false;
        $this->showError = false;
        $this->uploadProgress = 0;
        $this->resetErrorBag();
    }

    /**
     * Dismiss success message.
     */
    public function dismissSuccess(): void
    {
        $this->showSuccess = false;
    }

    /**
     * Dismiss error message.
     */
    public function dismissError(): void
    {
        $this->showError = false;
    }

    public function render()
    {
        return view('livewire.import-data-form');
    }
}
