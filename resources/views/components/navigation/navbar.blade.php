{{--
    Top Navigation Bar Component

    Features:
    - Logo and brand name
    - Primary navigation links
    - User menu dropdown
    - Language switcher
    - Responsive hamburger menu toggle
    - Keyboard accessible
    - WCAG 2.1 AA compliant
--}}

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm sticky-top" aria-label="{{ __('layout.navigation.primary') }}">
    <div class="container-fluid px-3 px-lg-4">
        {{-- Logo & Brand --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}" aria-label="{{ __('layout.navigation.home') }}">
            <x-application-logo class="me-2" style="height: 36px; width: auto;" />
            <span class="fw-semibold d-none d-sm-inline">{{ config('app.name') }}</span>
        </a>

        {{-- Sidebar Toggle Button (visible on larger screens) --}}
        <button
            class="btn btn-outline-secondary d-none d-lg-inline-flex me-2 order-lg-0"
            id="sidebar-toggle"
            type="button"
            aria-label="{{ __('layout.topbar.toggle_sidebar') }}"
            aria-expanded="true"
            aria-controls="sidebar-wrapper"
        >
            <i class="bi bi-list" aria-hidden="true"></i>
        </button>

        {{-- Mobile Hamburger Toggle --}}
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="{{ __('layout.navigation.toggle') }}"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Collapsible Navigation Content --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            {{-- Primary Navigation (Mobile Only) --}}
            <ul class="navbar-nav d-lg-none">
                @can('viewAny', App\Models\Homestay::class)
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                           @if(request()->routeIs('dashboard')) aria-current="page" @endif>
                            <i class="bi bi-speedometer2 me-2"></i>{{ __('layout.navigation.dashboard') }}
                        </a>
                    </li>
                @endcan

                @can('viewAny', App\Models\Homestay::class)
                    <li class="nav-item">
                        <a href="{{ route('homestays.index') }}"
                           class="nav-link {{ request()->routeIs('homestays.*') ? 'active' : '' }}"
                           @if(request()->routeIs('homestays.*')) aria-current="page" @endif>
                            <i class="bi bi-house-door me-2"></i>{{ __('layout.navigation.homestay') }}
                        </a>
                    </li>
                @endcan

                @can('viewAny', App\Models\Performance::class)
                    <li class="nav-item">
                        <a href="{{ route('performances.index') }}"
                           class="nav-link {{ request()->routeIs('performances.*') ? 'active' : '' }}"
                           @if(request()->routeIs('performances.*')) aria-current="page" @endif>
                            <i class="bi bi-graph-up me-2"></i>{{ __('layout.navigation.performance') }}
                        </a>
                    </li>
                @endcan

                @can('viewAny', App\Models\Import::class)
                    <li class="nav-item">
                        <a href="{{ route('web.imports.index') }}"
                           class="nav-link {{ request()->routeIs('web.imports.*') ? 'active' : '' }}"
                           @if(request()->routeIs('web.imports.*')) aria-current="page" @endif>
                            <i class="bi bi-upload me-2"></i>{{ __('layout.navigation.imports') }}
                        </a>
                    </li>
                @endcan

                @if(Auth::check() && Auth::user()->hasPermissionTo('generate-reports'))
                    <li class="nav-item">
                        <a href="{{ route('web.reports.index') }}"
                           class="nav-link {{ request()->routeIs('web.reports.*') ? 'active' : '' }}"
                           @if(request()->routeIs('web.reports.*')) aria-current="page" @endif>
                            <i class="bi bi-file-earmark-text me-2"></i>{{ __('layout.navigation.reports') }}
                        </a>
                    </li>
                @endif

                <li><hr class="dropdown-divider"></li>
            </ul>

            {{-- Right Side Navigation --}}
            <ul class="navbar-nav ms-auto align-items-lg-center">
                {{-- Language Switcher --}}
                <li class="nav-item dropdown">
                    <button
                        class="btn btn-link nav-link dropdown-toggle text-decoration-none"
                        type="button"
                        id="languageDropdown"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        aria-label="{{ __('layout.navigation.language_menu') }}"
                    >
                        <i class="bi bi-translate me-1" aria-hidden="true"></i>
                        <span class="fw-medium">{{ strtoupper(app()->getLocale()) }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                        <li>
                            <a class="dropdown-item {{ app()->getLocale() === 'ms' ? 'active' : '' }}"
                               href="{{ route('language.switch', 'ms') }}"
                               @if(app()->getLocale() === 'ms') aria-current="true" @endif>
                                <i class="bi bi-check-circle me-2 {{ app()->getLocale() === 'ms' ? '' : 'invisible' }}" aria-hidden="true"></i>
                                Bahasa Melayu
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}"
                               href="{{ route('language.switch', 'en') }}"
                               @if(app()->getLocale() === 'en') aria-current="true" @endif>
                                <i class="bi bi-check-circle me-2 {{ app()->getLocale() === 'en' ? '' : 'invisible' }}" aria-hidden="true"></i>
                                English
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- User Menu Dropdown --}}
                @if(Auth::check())
                <li class="nav-item dropdown">
                    <button
                        class="btn btn-link nav-link dropdown-toggle text-decoration-none"
                        type="button"
                        id="userDropdown"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        aria-label="{{ __('layout.navigation.user_menu') }}"
                    >
                        <i class="bi bi-person-circle me-1" aria-hidden="true"></i>
                        <span class="fw-medium d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <span class="dropdown-item-text small text-muted">
                                <i class="bi bi-shield-check me-1" aria-hidden="true"></i>
                                {{ Auth::user()->getRoleNames()->first() }}
                            </span>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="bi bi-person me-2" aria-hidden="true"></i>{{ __('layout.user_menu.profile') }}
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2" aria-hidden="true"></i>{{ __('layout.user_menu.logout') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                {{-- Guest User Menu (shows login button) --}}
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-box-arrow-in-right me-1" aria-hidden="true"></i>{{ __('common.buttons.login') }}
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
