<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use App\Services\ReportService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class StatsOverview extends Component
{
    public $stats;

    public function mount(ReportService $reportService)
    {
        $user = Auth::user();
        $cacheKey = 'dashboard.stats.' . ($user ? $user->id : 'guest');

        // Define filters based on user's scope.
        // This assumes a 'negeri' attribute on the user model for scoped users.
        $filters = [];
        if ($user && $user->hasRole('pemerhati') && ! empty($user->negeri)) {
            $filters['negeri'] = $user->negeri;
        }

        $this->stats = Cache::remember($cacheKey, now()->addMinutes(15), function () use ($reportService, $filters) {
            return $reportService->getDashboardStats($filters);
        });
    }

    public function render()
    {
        return view('livewire.dashboard.stats-overview');
    }
}
