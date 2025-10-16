<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Dashboard;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class KpiCards extends Component
{
    public function render(): View
    {
        return view('livewire.admin.dashboard.kpi-cards');
    }
}
