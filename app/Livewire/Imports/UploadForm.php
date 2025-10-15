<?php

namespace App\Livewire\Imports;

use App\Models\Import as ImportModel;
use App\Services\ImportService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadForm extends Component
{
    use WithFileUploads;

    public $file;

    public $importType;

    public function updatedFile()
    {
        $this->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls|max:51200', // 50MB
        ]);
    }

    public function upload(ImportService $importService)
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
            $import = ImportModel::create([
                'jenis_import' => $this->importType,
                'file_path' => $path,
                'original_filename' => $originalFilename,
                'user_id' => Auth::id(),
                'status' => 'pending',
                'total_rows' => 0,
                'processed_rows' => 0,
                'failed_rows' => 0,
            ]);

            // Redirect to preview page
            session()->flash('success', __('Fail berjaya dimuat naik. Sila semak pratonton sebelum memproses.'));

            return redirect()->route('imports.preview', ['import' => $import->id]);
        } catch (\Exception $e) {
            $this->addError('file', __('Ralat semasa memuat naik fail: '.$e->getMessage()));
        }
    }

    public function render()
    {
        return view('livewire.imports.upload-form');
    }
}
