<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Performance;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Web controller for performance (monthly metrics) operations.
 */
final class PerformanceController extends Controller
{
    /**
     * Display a listing of performance records.
     */
    public function index(Request $request): View
    {
        $this->authorize('viewAny', Performance::class);
        /** @var view-string $view */
        $view = 'performances.index';

        return view($view);
    }

    /**
     * Display the specified performance record.
     */
    public function show(Performance $performance): View
    {
        $this->authorize('view', $performance);
        /** @var view-string $view */
        $view = 'performances.show';

        return view($view, [
            'performance' => $performance,
        ]);
    }
}
