<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use Livewire\Component;

class MetricsCard extends Component
{
    public string $title = '';

    public string $value = '';

    public ?string $unit = null;

    public ?string $trend = null;

    public ?string $icon = null;

    public string $status = 'neutral'; // neutral, good, warn, bad

    public function render()
    {
        return view('livewire.dashboard.metrics-card');
    }
}
