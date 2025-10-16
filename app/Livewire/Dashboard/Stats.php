<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use Illuminate\Contracts\View\View;

/**
 * Small alias component so views that mount 'dashboard.stats' resolve correctly.
 * It delegates to StatsOverview which contains the real logic.
 */
class Stats extends StatsOverview
{
    // Intentionally empty — inherits mount() and render() from StatsOverview
    public function render(): View
    {
        return view('livewire.dashboard.stats-overview');
    }
}
