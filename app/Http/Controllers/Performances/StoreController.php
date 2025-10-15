<?php

declare(strict_types=1);

namespace App\Http\Controllers\Performances;

use App\Data\PerformanceData;
use App\Exceptions\BusinessRuleException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerformanceRequest;
use App\Services\PerformanceService;

/**
 * Single-action controller: persist new Performance record.
 */
class StoreController extends Controller
{
    public function __construct(private readonly PerformanceService $performanceService) {}

    /**
     * Store new performance record and redirect to index.
     */
    public function __invoke(StorePerformanceRequest $request)
    {
        try {
            $performanceData = PerformanceData::from($request->validated());
            $this->performanceService->recordPerformance($performanceData);

            return redirect()->route('performances.index')
                ->with('success', __('Rekod prestasi berjaya dicipta.'));
        } catch (BusinessRuleException $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['general' => $e->getMessage()]);
        }
    }
}
