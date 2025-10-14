<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Cooperative;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Web controller for cooperative operations.
 */
final class CooperativeController extends Controller
{
    /**
     * Display a listing of cooperatives.
     */
    public function index(Request $request): View
    {
        $this->authorize('viewAny', Cooperative::class);
        /** @var view-string $view */
        $view = 'cooperatives.index';

        return view($view);
    }

    /**
     * Display the specified cooperative.
     */
    public function show(Cooperative $cooperative): View
    {
        $this->authorize('view', $cooperative);

        $cooperative->load(['homestays']);

        /** @var view-string $view */
        $view = 'cooperatives.show';

        return view($view, [
            'cooperative' => $cooperative,
        ]);
    }
}
