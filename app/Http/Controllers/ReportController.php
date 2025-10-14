<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\GenerateReportRequest;
use App\Models\LaporanTerjadual;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Web controller for report generation and scheduling.
 */
final class ReportController extends Controller
{
    /**
     * Display a listing of scheduled reports.
     */
    public function index(Request $request): View
    {
        $this->authorize('viewAny', LaporanTerjadual::class);
        /** @var view-string $view */
        $view = 'reports.index';

        return view($view);
    }

    /**
     * Show the form for creating a new report.
     */
    public function create(): View
    {
        $this->authorize('create', LaporanTerjadual::class);
        /** @var view-string $view */
        $view = 'reports.create';

        return view($view);
    }

    /**
     * Generate and download a report.
     */
    public function generate(GenerateReportRequest $request): StreamedResponse
    {
        // Authorization handled in FormRequest
        // Generate report using service

        return response()->streamDownload(function (): void {
            // Stream report content
        }, 'report.pdf');
    }

    /**
     * Store a scheduled report.
     */
    public function store(GenerateReportRequest $request): RedirectResponse
    {
        // Authorization handled in FormRequest

        return redirect()
            ->route('reports.index')
            ->with('success', 'Report scheduled successfully');
    }

    /**
     * Display the specified report.
     */
    public function show(LaporanTerjadual $report): View
    {
        $this->authorize('view', $report);
        /** @var view-string $view */
        $view = 'reports.show';

        return view($view, [
            'report' => $report,
        ]);
    }

    /**
     * Remove the specified scheduled report.
     */
    public function destroy(LaporanTerjadual $report): RedirectResponse
    {
        $this->authorize('delete', $report);

        $report->delete();

        return redirect()
            ->route('reports.index')
            ->with('success', __('report.deleted_successfully'));
    }

    /**
     * Download a generated report file.
     */
    public function download(LaporanTerjadual $report): StreamedResponse
    {
        $this->authorize('view', $report);

        // Implementation will use ReportService
        return response()->streamDownload(function (): void {
            // Stream report file
        }, $report->filename ?? 'report.pdf');
    }
}
