@extends('layouts.app')

@section('title', 'Livewire Components Demo')

@section('content')
<div class="container py-4">
    {{-- Page Header --}}
    <div class="mb-5">
        <h1 class="display-5 fw-bold mb-2">Livewire Components Demo</h1>
        <p class="lead text-muted">
            Real-time interactive components with polling, file upload, and state management
        </p>
    </div>

    <div class="row g-4">
        {{-- Import Data Form Section --}}
        <div class="col-12 col-lg-6">
            <div class="card border-left border-primary border-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-cloud-upload text-primary me-2"></i>
                        ImportDataForm Component
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-muted small mb-3">
                        File upload form with validation, progress tracking, and accessibility features.
                        Dispatches <code>data-imported</code> event on success.
                    </p>

                    {{-- Component Instance --}}
                    <livewire:import-data-form />

                    {{-- Features List --}}
                    <div class="alert alert-info mt-4" role="region" aria-label="Component features">
                        <strong>Features:</strong>
                        <ul class="mb-0 mt-2">
                            <li>WithFileUploads trait for file handling</li>
                            <li>#[Validate] attributes for input validation</li>
                            <li>Progress UI with aria-live regions</li>
                            <li>Success/error alerts with dismissible buttons</li>
                            <li>Dispatch 'data-imported' event on success</li>
                            <li>Full keyboard navigation support</li>
                            <li>Bilingual support (MS/EN)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Dashboard Metrics Section --}}
        <div class="col-12 col-lg-6">
            <div class="card border-left border-success border-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-graph-up text-success me-2"></i>
                        DashboardMetrics Component
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-muted small mb-3">
                        Real-time metrics display with polling (5 second interval) and event listening.
                        Auto-refreshes when data is imported.
                    </p>

                    {{-- Component Instance --}}
                    <livewire:dashboard-metrics />

                    {{-- Features List --}}
                    <div class="alert alert-info mt-4" role="region" aria-label="Component features">
                        <strong>Features:</strong>
                        <ul class="mb-0 mt-2">
                            <li>wire:poll.5000ms for auto-refresh</li>
                            <li>#[On('data-imported')] event listener</li>
                            <li>Cached metrics with cache invalidation</li>
                            <li>Metric cards with elevated styling</li>
                            <li>Progress bars with ARIA attributes</li>
                            <li>Star ratings with accessibility labels</li>
                            <li>Detailed metrics table</li>
                            <li>Responsive on all breakpoints</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Integration Example Section --}}
    <div class="card mt-5">
        <div class="card-header bg-light">
            <h5 class="card-title mb-0">
                <i class="bi bi-bezier text-warning me-2"></i>
                Integration Example
            </h5>
        </div>
        <div class="card-body">
            <p class="text-muted mb-3">
                When a file is uploaded via the <strong>ImportDataForm</strong>, the component dispatches a
                <code>data-imported</code> event. The <strong>DashboardMetrics</strong> component listens to this
                event and automatically refreshes its data, invalidating the cache and reloading metrics.
            </p>

            <div class="row g-2 mt-3">
                <div class="col-12 col-md-6">
                    <div class="bg-light p-3 rounded">
                        <h6 class="fw-bold mb-2">
                            <i class="bi bi-1-circle-fill text-primary"></i> User Uploads File
                        </h6>
                        <p class="small text-muted mb-0">User selects file and submits form</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="bg-light p-3 rounded">
                        <h6 class="fw-bold mb-2">
                            <i class="bi bi-2-circle-fill text-primary"></i> File Uploaded
                        </h6>
                        <p class="small text-muted mb-0">File stored and Import record created</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="bg-light p-3 rounded">
                        <h6 class="fw-bold mb-2">
                            <i class="bi bi-3-circle-fill text-primary"></i> Event Dispatched
                        </h6>
                        <p class="small text-muted mb-0">
                            <code>dispatch('data-imported')</code> event sent
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="bg-light p-3 rounded">
                        <h6 class="fw-bold mb-2">
                            <i class="bi bi-4-circle-fill text-primary"></i> Metrics Updated
                        </h6>
                        <p class="small text-muted mb-0">
                            <code>#[On('data-imported')]</code> refreshes metrics instantly
                        </p>
                    </div>
                </div>
            </div>

            {{-- Code Example --}}
            <div class="mt-4">
                <h6 class="fw-bold mb-2">Code Pattern:</h6>
                <pre class="bg-dark text-light p-3 rounded" style="font-size: 0.85rem;"><code>// ImportDataForm.php
public function submitForm(): void {
    // ... validation and upload logic
    $this->dispatch('data-imported', importId: $import->id);
}

// DashboardMetrics.php
#[On('data-imported')]
public function onDataImported(ReportService $reportService): void {
    Cache::forget($cacheKey);
    $this->loadMetrics($reportService);
}</code></pre>
            </div>
        </div>
    </div>

    {{-- Testing Checklist --}}
    <div class="card mt-5">
        <div class="card-header bg-light">
            <h5 class="card-title mb-0">
                <i class="bi bi-clipboard-check text-success me-2"></i>
                Testing Checklist
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h6 class="fw-bold mb-3">Visual & Interaction Tests</h6>
                    <ul class="list-unstyled small">
                        <li><input type="checkbox" /> Upload form renders correctly</li>
                        <li><input type="checkbox" /> Import type dropdown works</li>
                        <li><input type="checkbox" /> File input accepts .xlsx, .csv files</li>
                        <li><input type="checkbox" /> Upload button disabled while processing</li>
                        <li><input type="checkbox" /> Progress bar shows during upload</li>
                        <li><input type="checkbox" /> Success alert displays on success</li>
                        <li><input type="checkbox" /> Error alert displays on error</li>
                        <li><input type="checkbox" /> Metrics cards render with data</li>
                        <li><input type="checkbox" /> Progress bars animate correctly</li>
                        <li><input type="checkbox" /> Star ratings display correctly</li>
                    </ul>
                </div>
                <div class="col-12 col-md-6">
                    <h6 class="fw-bold mb-3">Accessibility & Keyboard Tests</h6>
                    <ul class="list-unstyled small">
                        <li><input type="checkbox" /> Tab navigation through form fields</li>
                        <li><input type="checkbox" /> Form labels associated with inputs</li>
                        <li><input type="checkbox" /> Required field indicators present</li>
                        <li><input type="checkbox" /> Error messages linked via aria-describedby</li>
                        <li><input type="checkbox" /> Upload button activates with Enter/Space</li>
                        <li><input type="checkbox" /> Live regions announce status changes</li>
                        <li><input type="checkbox" /> Progress bar has aria-valuenow attribute</li>
                        <li><input type="checkbox" /> Alert dismissible button keyboard accessible</li>
                        <li><input type="checkbox" /> Screen reader announces metrics</li>
                        <li><input type="checkbox" /> Responsive on mobile/tablet/desktop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Documentation Links --}}
    <div class="alert alert-primary mt-5" role="region" aria-label="Documentation links">
        <h6 class="alert-heading">
            <i class="bi bi-book me-2"></i>Documentation
        </h6>
        <p class="mb-0">
            See <strong>PHASE13_LIVEWIRE_COMPONENTS_IMPLEMENTATION.md</strong> for comprehensive documentation,
            usage patterns, and troubleshooting guides.
        </p>
    </div>
</div>
@endsection
