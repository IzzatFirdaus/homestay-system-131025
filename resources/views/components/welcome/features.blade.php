<section
    id="features"
    class="py-5 bg-white"
    aria-labelledby="features-heading"
>
    <div class="container py-5">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 id="features-heading" class="display-4 fw-bold text-dark">
                {{ __('common.welcome.features.title') }}
            </h2>
        </div>

        <!-- Features Grid -->
        <div class="row g-4">
            <!-- Feature 1: Data Management -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 border shadow-sm">
                    <div class="card-body p-4">
                        <div
                            class="d-inline-flex align-items-center justify-content-center rounded bg-primary mb-4"
                            style="width: 48px; height: 48px;"
                            aria-hidden="true"
                        >
                            <svg class="text-white" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                            </svg>
                        </div>
                        <h3 class="h5 fw-semibold text-dark mb-3">
                            {{ __('common.welcome.features.management.title') }}
                        </h3>
                        <p class="text-secondary mb-0">
                            {{ __('common.welcome.features.management.description') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 2: Performance Analytics -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 border shadow-sm">
                    <div class="card-body p-4">
                        <div
                            class="d-inline-flex align-items-center justify-content-center rounded bg-success mb-4"
                            style="width: 48px; height: 48px;"
                            aria-hidden="true"
                        >
                            <svg class="text-white" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                            </svg>
                        </div>
                        <h3 class="h5 fw-semibold text-dark mb-3">
                            {{ __('common.welcome.features.analytics.title') }}
                        </h3>
                        <p class="text-secondary mb-0">
                            {{ __('common.welcome.features.analytics.description') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 3: Automated Reporting -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 border shadow-sm">
                    <div class="card-body p-4">
                        <div
                            class="d-inline-flex align-items-center justify-content-center rounded bg-info mb-4"
                            style="width: 48px; height: 48px;"
                            aria-hidden="true"
                        >
                            <svg class="text-white" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                        </div>
                        <h3 class="h5 fw-semibold text-dark mb-3">
                            {{ __('common.welcome.features.reporting.title') }}
                        </h3>
                        <p class="text-secondary mb-0">
                            {{ __('common.welcome.features.reporting.description') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
