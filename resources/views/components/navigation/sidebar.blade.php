{{--
    Sidebar Navigation Component

    Features:
    - Collapsible on desktop (toggleable)
    - Full-width on mobile (drawer style)
    - Role-based menu items
    - Active state highlighting
    - Keyboard accessible
    - WCAG 2.1 AA compliant
--}}

<nav
    class="sidebar bg-dark border-end d-none d-lg-flex flex-column"
    id="sidebar-wrapper"
    aria-label="{{ __('layout.navigation.sidebar') }}"
>
    {{-- Sidebar Header --}}
    <div class="sidebar-header bg-primary text-white py-3 px-4">
        <h5 class="mb-0 d-flex align-items-center">
            <i class="bi bi-house-heart-fill me-2" aria-hidden="true"></i>
            <span class="sidebar-title">{{ __('layout.navigation.menu_label') }}</span>
        </h5>
    </div>

    {{-- Navigation Menu --}}
    <div class="sidebar-menu flex-grow-1 overflow-auto" role="menu">
        <div class="list-group list-group-flush">
            {{-- Dashboard --}}
            @can('viewAny', App\Models\Homestay::class)
                <a
                    href="{{ route('dashboard') }}"
                    class="list-group-item list-group-item-action bg-dark text-white border-0 {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                    role="menuitem"
                    @if(request()->routeIs('dashboard')) aria-current="page" @endif
                >
                    <i class="bi bi-speedometer2 me-2" aria-hidden="true"></i>
                    <span class="sidebar-text">{{ __('layout.navigation.dashboard') }}</span>
                </a>
            @endcan

            {{-- Homestay Management --}}
            @can('viewAny', App\Models\Homestay::class)
                <a
                    href="{{ route('homestays.index') }}"
                    class="list-group-item list-group-item-action bg-dark text-white border-0 {{ request()->routeIs('homestays.*') ? 'active' : '' }}"
                    role="menuitem"
                    @if(request()->routeIs('homestays.*')) aria-current="page" @endif
                >
                    <i class="bi bi-house-door me-2" aria-hidden="true"></i>
                    <span class="sidebar-text">{{ __('layout.navigation.homestay') }}</span>
                </a>
            @endcan

            {{-- Performance Management --}}
            @can('viewAny', App\Models\Performance::class)
                <a
                    href="{{ route('performances.index') }}"
                    class="list-group-item list-group-item-action bg-dark text-white border-0 {{ request()->routeIs('performances.*') ? 'active' : '' }}"
                    role="menuitem"
                    @if(request()->routeIs('performances.*')) aria-current="page" @endif
                >
                    <i class="bi bi-graph-up me-2" aria-hidden="true"></i>
                    <span class="sidebar-text">{{ __('layout.navigation.performance') }}</span>
                </a>
            @endcan

            {{-- Data Import --}}
            @can('viewAny', App\Models\Import::class)
                <a
                    href="{{ route('web.imports.index') }}"
                    class="list-group-item list-group-item-action bg-dark text-white border-0 {{ request()->routeIs('web.imports.*') ? 'active' : '' }}"
                    role="menuitem"
                    @if(request()->routeIs('web.imports.*')) aria-current="page" @endif
                >
                    <i class="bi bi-upload me-2" aria-hidden="true"></i>
                    <span class="sidebar-text">{{ __('layout.navigation.imports') }}</span>
                </a>
            @endcan

            {{-- Reports --}}
            @if(Auth::check() && Auth::user()->hasPermissionTo('generate-reports'))
                <a
                    href="{{ route('web.reports.index') }}"
                    class="list-group-item list-group-item-action bg-dark text-white border-0 {{ request()->routeIs('web.reports.*') ? 'active' : '' }}"
                    role="menuitem"
                    @if(request()->routeIs('web.reports.*')) aria-current="page" @endif
                >
                    <i class="bi bi-file-earmark-text me-2" aria-hidden="true"></i>
                    <span class="sidebar-text">{{ __('layout.navigation.reports') }}</span>
                </a>
            @endif

            {{-- Administration Section (if user has admin permissions) --}}
            @can('manage-users')
                <div class="sidebar-divider my-2"></div>
                <div class="text-white-50 px-3 py-2 small text-uppercase fw-bold">
                    <span class="sidebar-text">{{ __('layout.navigation.administration') }}</span>
                </div>

                {{-- User Management (when route is implemented) --}}
                {{--
                <a
                    href="{{ route('users.index') }}"
                    class="list-group-item list-group-item-action bg-dark text-white border-0 {{ request()->routeIs('users.*') ? 'active' : '' }}"
                    role="menuitem"
                    @if(request()->routeIs('users.*')) aria-current="page" @endif
                >
                    <i class="bi bi-people me-2" aria-hidden="true"></i>
                    <span class="sidebar-text">{{ __('layout.navigation.users') }}</span>
                </a>
                --}}
            @endcan
        </div>
    </div>

    {{-- Sidebar Footer (Optional - Version Info) --}}
    <div class="sidebar-footer bg-dark text-white-50 py-2 px-3 border-top border-secondary">
        <small class="d-block text-center sidebar-text">
            <i class="bi bi-info-circle me-1" aria-hidden="true"></i>
            v{{ config('app.version', '1.0') }}
        </small>
    </div>
</nav>

{{-- Sidebar Styles --}}
@push('head')
<style>
/* Sidebar base styles */
.sidebar {
    width: 250px;
    min-height: 100vh;
    transition: width 0.3s ease, margin-left 0.3s ease;
}

/* Collapsed state */
#wrapper.toggled .sidebar {
    width: 64px;
}

#wrapper.toggled .sidebar .sidebar-title,
#wrapper.toggled .sidebar .sidebar-text {
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.2s ease, visibility 0.2s ease;
}

/* Expanded state */
#wrapper:not(.toggled) .sidebar .sidebar-title,
#wrapper:not(.toggled) .sidebar .sidebar-text {
    opacity: 1;
    visibility: visible;
    transition: opacity 0.3s ease 0.1s, visibility 0.3s ease 0.1s;
}

/* Active menu item */
.sidebar .list-group-item.active {
    background-color: var(--bs-primary) !important;
    border-left: 4px solid var(--bs-warning);
    font-weight: 600;
}

/* Hover effect */
.sidebar .list-group-item:hover:not(.active) {
    background-color: rgba(255, 255, 255, 0.1) !important;
}

/* Focus visible for keyboard navigation */
.sidebar .list-group-item:focus-visible {
    outline: 3px solid var(--bs-warning);
    outline-offset: -3px;
    z-index: 1;
}

/* Divider */
.sidebar-divider {
    border-top: 1px solid rgba(255, 255, 255, 0.15);
    height: 0;
    overflow: hidden;
}

/* Respect reduced motion preference */
@media (prefers-reduced-motion: reduce) {
    .sidebar,
    .sidebar .sidebar-title,
    .sidebar .sidebar-text {
        transition: none !important;
    }
}

/* Mobile: sidebar hidden by default */
@media (max-width: 991.98px) {
    .sidebar {
        display: none !important;
    }
}
</style>
@endpush
