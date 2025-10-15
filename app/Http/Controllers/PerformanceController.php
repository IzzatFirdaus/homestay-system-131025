<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Homestay;
use App\Models\Performance;
use Illuminate\Contracts\View\View;

/**
 * Main Performance Controller: handles view rendering for CRUD operations.
 *
 * Store/Update/Destroy logic delegated to single-action controllers.
 */
class PerformanceController extends Controller
{
    /**
     * Display paginated performance records with filtering.
     */
    public function index(): View
    {
        return view('pages.performances.index');
    }

    /**
     * Show form to create new performance record.
     */
    public function create(): View
    {
        $this->authorize('create', Performance::class);

        return view('pages.performances.create', [
            'homestays' => Homestay::orderBy('nama')->pluck('nama', 'id'),
            'currentYear' => (int) date('Y'),
            'yearRange' => range(2000, (int) date('Y') + 1),
        ]);
    }

    /**
     * Show form to edit existing performance record.
     */
    public function edit(Performance $performance): View
    {
        $this->authorize('update', $performance);

        $performance->load('homestay');

        return view('pages.performances.edit', [
            'performance' => $performance,
            'homestays' => Homestay::orderBy('nama')->pluck('nama', 'id'),
            'yearRange' => range(2000, (int) date('Y') + 1),
        ]);
    }
}
