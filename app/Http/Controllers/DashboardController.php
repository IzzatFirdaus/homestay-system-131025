<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Dashboard controller for displaying main analytics and KPIs.
 */
final class DashboardController extends Controller
{
    /**
     * Display the main dashboard.
     */
    public function index(Request $request): View
    {
        // Authorization via middleware
        /** @var view-string $view */
        $view = 'dashboard.index';

        return view($view);
    }
}
