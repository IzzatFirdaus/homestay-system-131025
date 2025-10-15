<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <!-- Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body>
        <!-- Skip to main content link for accessibility -->
        <a href="#main-content" class="visually-hidden-focusable position-absolute top-0 start-0 p-2 bg-primary text-white" style="z-index: 10000;">
            {{ __('Langkau ke kandungan utama') }}
        </a>

        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <nav class="bg-dark border-end" id="sidebar-wrapper" style="min-width: 250px;" aria-label="{{ __('Menu Utama') }}">
                <div class="sidebar-heading text-white py-3 px-4 bg-primary">
                    <h5 class="mb-0">{{ config('app.name') }}</h5>
                </div>
                <div class="list-group list-group-flush" role="menu">
                    <!-- Dashboard -->
                    @can('viewAny', App\Models\Homestay::class)
                        <a href="{{ route('dashboard') }}"
                           class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="bi bi-speedometer2 me-2"></i>{{ __('Dashboard') }}
                        </a>
                    @endcan

                    <!-- Homestay Management -->
                    @can('viewAny', App\Models\Homestay::class)
                        <a href="{{ route('homestays.index') }}"
                           class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('homestays.*') ? 'active' : '' }}">
                            <i class="bi bi-house-door me-2"></i>{{ __('Homestay') }}
                        </a>
                    @endcan

                    <!-- Performance Management -->
                    @can('viewAny', App\Models\Performance::class)
                        <a href="{{ route('performances.index') }}"
                           class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('performances.*') ? 'active' : '' }}">
                            <i class="bi bi-graph-up me-2"></i>{{ __('Prestasi') }}
                        </a>
                    @endcan

                    @can('viewAny', App\Models\Import::class)
                        <a href="{{ route('web.imports.index') }}"
                           class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('web.imports.*') ? 'active' : '' }}">
                            <i class="bi bi-upload me-2"></i>{{ __('Import Data') }}
                        </a>
                    @endcan

                    @if(Auth::user()->hasPermissionTo('generate-reports'))
                        <a href="{{ route('web.reports.index') }}"
                           class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('web.reports.*') ? 'active' : '' }}">
                            <i class="bi bi-file-earmark-text me-2"></i>{{ __('Laporan') }}
                        </a>
                    @endif

                    {{-- TODO: Enable User Management when route is implemented --}}
                    {{-- @can('manage-users')
                        <div class="text-white-50 px-3 py-2 small text-uppercase fw-bold">
                            {{ __('Pentadbiran') }}
                        </div>
                        <a href="{{ route('users.index') }}"
                           class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('users.*') ? 'active' : '' }}">
                            <i class="bi bi-people me-2"></i>{{ __('Pengguna') }}
                        </a>
                    @endcan --}}
                </div>
            </nav>

            <!-- Page Content Wrapper -->
            <div id="page-content-wrapper" class="w-100">
                <!-- Top Navigation Bar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm" aria-label="{{ __('Navigasi Atas') }}">
                    <div class="container-fluid">
                        <button class="btn btn-outline-secondary" id="sidebar-toggle" type="button" aria-label="{{ __('Togol Menu Sisi') }}" aria-expanded="true" aria-controls="sidebar-wrapper">
                            <i class="bi bi-list" aria-hidden="true"></i>
                        </button>

                        <!-- Breadcrumbs -->
                        <nav aria-label="breadcrumb" class="ms-3">
                            <ol class="breadcrumb mb-0">
                                @yield('breadcrumbs')
                            </ol>
                        </nav>

                        <!-- Right Side (Language Switcher & User Dropdown) -->
                        <div class="ms-auto d-flex align-items-center">
                            <!-- Language Switcher -->
                            <div class="dropdown me-3">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-translate me-1"></i>
                                    {{ strtoupper(app()->getLocale()) }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                                    <li>
                                        <a class="dropdown-item {{ app()->getLocale() === 'ms' ? 'active' : '' }}"
                                           href="{{ route('language.switch', 'ms') }}">
                                            Bahasa Melayu
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}"
                                           href="{{ route('language.switch', 'en') }}">
                                            English
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- User Dropdown -->
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle me-1"></i>
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <i class="bi bi-person me-2"></i>{{ __('Profil') }}
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="bi bi-box-arrow-right me-2"></i>{{ __('Log Keluar') }}
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Main Content -->
                <main class="py-4" id="main-content" tabindex="-1">
                    <div class="container-fluid">
                        <!-- Flash Messages -->
                        @if (session()->has('success'))
                            <x-alert type="success" :dismissible="true" role="alert" aria-live="polite">
                                {{ session('success') }}
                            </x-alert>
                        @endif
                        @if (session()->has('error'))
                            <x-alert type="danger" :dismissible="true" role="alert" aria-live="assertive">
                                {{ session('error') }}
                            </x-alert>
                        @endif
                        @if (session()->has('warning'))
                            <x-alert type="warning" :dismissible="true" role="alert" aria-live="polite">
                                {{ session('warning') }}
                            </x-alert>
                        @endif
                        @if (session()->has('info'))
                            <x-alert type="info" :dismissible="true" role="alert" aria-live="polite">
                                {{ session('info') }}
                            </x-alert>
                        @endif

                        <!-- Page Content -->
                        @yield('content')
                        {{ $slot ?? '' }}
                    </div>
                </main>
            </div>
        </div>

        <!-- Toast Notifications -->
        <x-toast />

        @livewireScripts

        <!-- Sidebar Toggle Script -->
        <script>
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar-wrapper');

            sidebarToggle?.addEventListener('click', function() {
                const wrapper = document.getElementById('wrapper');
                wrapper.classList.toggle('toggled');

                // Update aria-expanded for accessibility
                const isExpanded = !wrapper.classList.contains('toggled');
                this.setAttribute('aria-expanded', isExpanded);
            });
        </script>

        @stack('scripts')
    </body>
</html>
