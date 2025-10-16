@extends('layouts.app')

@section('title', __('common.welcome.system_name'))

@section('content')
    {{--
        Accessible "Skip to main content" link.
        - `visually-hidden-focusable` class makes it visible only on focus.
        - Essential for keyboard and screen reader users (WCAG 2.4.1).
    --}}
    <a href="#main-content" class="visually-hidden-focusable skip-link" tabindex="0">
        {{ __('layout.skip_to_content') }}
    </a>

    {{--
        The main navigation bar.
        - It's a Blade component for reusability.
        - It includes the language switcher and adapts for guest/authenticated users.
    --}}
    <x-navigation.navbar />

    {{--
        Main content landmark.
        - `id="main-content"` is the target for the skip link.
        - `tabindex="-1"` allows it to be programmatically focused.
    --}}
    <main id="main-content" tabindex="-1">

        {{--
            Hero Section
            - A prominent introduction to the system.
            - Uses custom CSS classes for styling.
            - `data-testid` is for automated testing.
        --}}
        <section class="welcome-hero text-center" data-testid="welcome-hero">
            <div class="container col-xxl-8 px-4 py-5">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                    <div class="col-10 col-sm-8 col-lg-6">
                        {{-- Placeholder for a system graphic or logo --}}
                        <i class="bi bi-house-heart-fill text-primary" style="font-size: 10rem;"></i>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold lh-1 mb-3" data-testid="welcome-heading">
                            {{ __('common.welcome.hero.headline') }}
                        </h1>
                        <p class="lead">
                            {{ __('common.welcome.hero.subheadline') }}
                        </p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <a href="{{ Auth::check() ? route('dashboard') : route('login') }}" class="btn btn-primary btn-lg px-4 me-md-2" data-testid="welcome-cta-primary">
                                <i class="bi bi-box-arrow-in-right me-2"></i>
                                {{ __('common.welcome.hero.cta_primary') }}
                            </a>
                            <a href="#features" class="btn btn-outline-secondary btn-lg px-4" data-testid="welcome-cta-secondary">
                                {{ __('common.welcome.hero.cta_secondary') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container px-4 py-5">
            {{--
                Livewire Dashboard Metrics Widget
                - This is a dynamic component that fetches and displays key metrics.
                - `aria-labelledby` provides an accessible name for the section.
                - The component itself should handle `aria-live` for updates.
            --}}
            <section class="my-5" aria-labelledby="metrics-heading" data-testid="welcome-metrics">
                <h2 id="metrics-heading" class="h3 fw-semibold mb-4 text-center visually-hidden">
                    {{ __('dashboard.metrics_region_label') }}
                </h2>
                <livewire:dashboard-metrics />
            </section>

            {{--
                Features Section
                - Uses a Bootstrap grid to display key system features.
                - Each feature is in a custom-styled card.
                - `data-testid` helps in targeting this section for tests.
            --}}
            <section id="features" class="my-5" aria-labelledby="features-heading" data-testid="welcome-features">
                <h2 id="features-heading" class="pb-2 border-bottom h3 fw-semibold mb-4">
                    {{ __('common.welcome.features.title') }}
                </h2>
                <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                    <div class="col d-flex align-items-start">
                        <div class="icon-square text-dark flex-shrink-0 me-3">
                            <i class="bi bi-clipboard-data feature-icon" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h2>{{ __('common.welcome.features.management.title') }}</h2>
                            <p>{{ __('common.welcome.features.management.description') }}</p>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="icon-square text-dark flex-shrink-0 me-3">
                            <i class="bi bi-graph-up-arrow feature-icon" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h2>{{ __('common.welcome.features.analytics.title') }}</h2>
                            <p>{{ __('common.welcome.features.analytics.description') }}</p>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="icon-square text-dark flex-shrink-0 me-3">
                            <i class="bi bi-file-earmark-check feature-icon" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h2>{{ __('common.welcome.features.reporting.title') }}</h2>
                            <p>{{ __('common.welcome.features.reporting.description') }}</p>
                        </div>
                    </div>
                </div>
            </section>

            {{--
                About Section
                - Provides a brief description of the system's purpose.
            --}}
            <section class="my-5" aria-labelledby="about-heading" data-testid="welcome-about">
                <div class="p-5 mb-4 bg-light rounded-3">
                    <div class="container-fluid py-5">
                        <h2 id="about-heading" class="display-5 fw-bold">{{ __('common.welcome.about.title') }}</h2>
                        <p class="col-md-8 fs-4">{{ __('common.welcome.about.description') }}</p>
                    </div>
                </div>
            </section>
        </div>
    </main>

    {{--
        Footer Component
        - Contains copyright info and important links.
        - Reused across the application.
    --}}
    <x-footer />
@endsection

