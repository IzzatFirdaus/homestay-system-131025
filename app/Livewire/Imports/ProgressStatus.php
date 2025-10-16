<?php

declare(strict_types=1);

namespace App\Livewire\Imports;

use App\Models\Import;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProgressStatus extends Component
{
    public ?Import $import = null;

    public function mount(): void
    {
        $this->loadImportStatus();
    }

    public function loadImportStatus(): void
    {
        $this->import = Import::where('user_id', Auth::id())->latest()->first();
    }

    public function render(): View
    {
        return view('livewire.imports.progress-status');
    }
}
