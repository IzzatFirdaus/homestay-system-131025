<?php

declare(strict_types=1);

namespace App\Livewire\Imports;

use App\Models\Import as ImportModel;
use App\Services\ImportService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadForm extends Component
{
    use WithFileUploads;

    public mixed $file = null;

    public ?string $importType = null;

    public function updatedFile(): void
    {
        $this->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls|max:51200', // 50MB
        ]);
    }

    public function upload(ImportService $importService): void
    {
        $this->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls|max:51200',
            'importType' => 'required|in:homestay,performance',
        ]);

        $this->authorize('create', ImportModel::class);

        try {
            // Store the uploaded file
            $path = $this->file->store('imports', 'local');
            $originalFilename = $this->file->getClientOriginalName();

            // Create the Import record
            /** @var array{jenis_import: string, file_path: string, original_filename: string, user_id: int|string|null, status: string, total_rows: int, processed_rows: int, failed_rows: int} $attributes */
            $attributes = [
                'jenis_import' => $this->importType,
                'file_path' => $path,
                'original_filename' => $originalFilename,
                'user_id' => Auth::id(),
                'status' => 'pending',
                'total_rows' => 0,
                'processed_rows' => 0,
                'failed_rows' => 0,
            ];

            $import = ImportModel::create($attributes);

            // Redirect to preview page
            session()->flash('success', __('Fail berjaya dimuat naik. Sila semak pratonton sebelum memproses.'));

            $this->redirect(route('imports.preview', ['import' => $import->id]));
        } catch (\Exception $e) {
            $this->addError('file', __('Ralat semasa memuat naik fail: ' . $e->getMessage()));
        }
    }

    /** @phpstan-ignore-next-line */
    public function render()
    {
        return view('livewire.imports.upload-form');
    }
}
