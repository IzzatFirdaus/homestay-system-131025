<?php

declare(strict_types=1);

namespace App\Http\Controllers\Performances;

use App\Data\PerformanceData;
use App\Exceptions\BusinessRuleException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePerformanceRequest;
use App\Models\Performance;
use App\Services\PerformanceService;

/**
 * Single-action controller: update existing Performance record.
 */
class UpdateController extends Controller
{
    public function __construct(private readonly PerformanceService $performanceService) {}

    /**
     * Update performance record and redirect to index.
     */
    public function __invoke(UpdatePerformanceRequest $request, Performance $performance)
    {
        try {
            $performanceData = PerformanceData::from($request->validated());
            $this->performanceService->updatePerformance($performance, $performanceData);

            return redirect()->route('performances.index')
                ->with('success', __('Rekod prestasi berjaya dikemaskini.'));
        } catch (BusinessRuleException $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['general' => $e->getMessage()]);
        }
    }
}
