<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Data\ReportType;
use App\Http\Requests\GenerateReportRequest;
use App\Jobs\GenerateReportJob;
use App\Services\ReportService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Web UI controller for report generation and management.
 */
class ReportController extends Controller
{
    public function __construct(private readonly ReportService $reportService) {}

    /**
     * Display the report generation form.
     */
    public function index(): View
    {
        // Authorization: Only users with 'generate-reports' permission
        if (! Auth::user()?->can('generate-reports')) {
            abort(403, __('Anda tidak mempunyai kebenaran untuk menjana laporan.'));
        }

        return view('pages.reports.index');
    }

    /**
     * Generate a report (synchronous for small reports, queued for large ones).
     *
     * For small/quick reports: generates immediately and returns download
     * For large reports: queues job and redirects to status page
     */
    public function generate(GenerateReportRequest $request): RedirectResponse|StreamedResponse
    {
        $validated = $request->validated();

        $type = ReportType::from($validated['type']);
        $filters = $this->buildFilters($validated);
        $format = $validated['format'] ?? 'xlsx';

        // For quick reports (dashboard summary), generate immediately
        if ($type === ReportType::DashboardSummary) {
            try {
                $reportFile = $this->reportService->generateReport($type, $filters, $format);

                return Storage::disk($reportFile->disk)->download(
                    $reportFile->path,
                    $reportFile->downloadName
                );
            } catch (\Exception $e) {
                return redirect()
                    ->route('web.reports.index')
                    ->with('error', __('Ralat menjana laporan: :message', ['message' => $e->getMessage()]));
            }
        }

        // For large reports, queue the job
        GenerateReportJob::dispatch($type, $filters, $format);

        return redirect()
            ->route('web.reports.index')
            ->with('success', __('Laporan sedang dijana. Muat turun akan tersedia dalam beberapa minit.'));
    }

    /**
     * Build filters array from validated request data.
     *
     * @param  array<string, mixed>  $validated
     * @return array<string, bool|float|int|string|null>
     */
    private function buildFilters(array $validated): array
    {
        /** @var array<string, bool|float|int|string|null> $filters */
        $filters = [];

        // Date range
        if (! empty($validated['start_date'])) {
            $filters['from'] = (string) $validated['start_date'];
        }
        if (! empty($validated['end_date'])) {
            $filters['to'] = (string) $validated['end_date'];
        }

        // Negeri filter (auto-apply for Pemerhati users)
        $user = Auth::user();
        if ($user && $user->hasRole('Pemerhati') && ! empty($user->negeri)) {
            $filters['negeri'] = (string) $user->negeri;
        } elseif (! empty($validated['negeri'])) {
            $filters['negeri'] = (string) $validated['negeri'];
        }

        // Homestay filter (for homestay performance reports)
        if (! empty($validated['homestay_id'])) {
            $filters['homestay_id'] = (int) $validated['homestay_id'];
        }

        return $filters;
    }
}
