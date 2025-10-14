<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Cluster;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Web controller for cluster operations.
 */
final class ClusterController extends Controller
{
    /**
     * Display a listing of clusters.
     */
    public function index(Request $request): View
    {
        $this->authorize('viewAny', Cluster::class);
        /** @var view-string $view */
        $view = 'clusters.index';

        return view($view);
    }

    /**
     * Display the specified cluster.
     */
    public function show(Cluster $cluster): View
    {
        $this->authorize('view', $cluster);

        $cluster->load(['homestays']);

        /** @var view-string $view */
        $view = 'clusters.show';

        return view($view, [
            'cluster' => $cluster,
        ]);
    }
}
