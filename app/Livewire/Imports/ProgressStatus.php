<?php

namespace App\Livewire\Imports;

use App\Models\Import;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProgressStatus extends Component
{
    public $import;

    public function mount()
    {
        $this->loadImportStatus();
    }

    public function loadImportStatus()
    {
        $this->import = Import::where('user_id', Auth::id())->latest()->first();
    }

    public function render()
    {
        return view('livewire.imports.progress-status');
    }
}
