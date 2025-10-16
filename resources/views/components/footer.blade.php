{{--
    Footer Component

    Features:
    - Copyright information
    - Quick links
    - System version
    - Responsive layout
    - WCAG 2.1 AA compliant
--}}

<footer class="footer mt-auto py-4 bg-white border-top" role="contentinfo">
    <div class="container-fluid px-3 px-lg-4">
        <div class="row g-4">
            {{-- Copyright & Version --}}
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <p class="mb-1 text-muted">
                        <strong>{{ config('app.name') }}</strong>
                    </p>
                    <p class="mb-1 small text-muted">
                        {{ __('layout.footer.copyright', ['year' => date('Y')]) }}
                    </p>
                    <p class="mb-0 small text-muted">
                        <i class="bi bi-shield-check me-1" aria-hidden="true"></i>
                        {{ __('layout.footer.owner') }}
                    </p>
                    <p class="mb-0 small text-muted mt-2">
                        <i class="bi bi-code-slash me-1" aria-hidden="true"></i>
                        {{ __('layout.footer.version') }} {{ config('app.version', '1.0.0') }}
                    </p>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-12 col-md-6">
                <h6 class="text-uppercase fw-bold mb-3 small">{{ __('layout.footer.links') }}</h6>
                <nav aria-label="{{ __('layout.footer.links_aria') }}">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <a href="{{ route('dashboard') }}" class="text-decoration-none text-muted small">
                                <i class="bi bi-house-door me-2" aria-hidden="true"></i>{{ __('layout.navigation.dashboard') }}
                            </a>
                        </li>
                        @can('viewAny', App\Models\Homestay::class)
                            <li class="mb-2">
                                <a href="{{ route('homestays.index') }}" class="text-decoration-none text-muted small">
                                    <i class="bi bi-house-heart me-2" aria-hidden="true"></i>{{ __('layout.navigation.homestay') }}
                                </a>
                            </li>
                        @endcan
                        @if(Auth::check() && Auth::user()->hasPermissionTo('generate-reports'))
                            <li class="mb-2">
                                <a href="{{ route('web.reports.index') }}" class="text-decoration-none text-muted small">
                                    <i class="bi bi-file-earmark-text me-2" aria-hidden="true"></i>{{ __('layout.navigation.reports') }}
                                </a>
                            </li>
                        @endif
                        @if(Auth::check())
                        <li class="mb-2">
                            <a href="{{ route('profile') }}" class="text-decoration-none text-muted small">
                                <i class="bi bi-person me-2" aria-hidden="true"></i>{{ __('layout.user_menu.profile') }}
                            </a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="row mt-4">
            <div class="col-12">
                <hr class="my-2">
                <p class="text-center small text-muted mb-0">
                    {{ __('layout.footer.powered_by') }}
                    <span class="mx-1">•</span>
                    <a href="https://www.motac.gov.my" target="_blank" rel="noopener noreferrer" class="text-decoration-none text-primary">
                        {{ __('common.organizations.motac') }}
                    </a>
                    <span class="mx-1">•</span>
                    <a href="https://www.tourism.gov.my" target="_blank" rel="noopener noreferrer" class="text-decoration-none text-primary">
                        {{ __('common.organizations.tourism_malaysia') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>
