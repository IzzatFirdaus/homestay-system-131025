<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Theme Color (PWA support & browser chrome) -->
        <meta name="theme-color" content="#0EA5E9">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">

        <!-- SEO & Description -->
        <meta name="description" content="{{ config('app.name') }} - Sistem Pengurusan & Analitik Homestay Malaysia">
        <meta name="author" content="MOTAC, Tourism Malaysia">

        <title>@yield('title', config('app.name', 'Homestay Malaysia'))</title>

        <!-- Preconnect to Font CDN for performance -->
        <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
        <link rel="dns-prefetch" href="https://fonts.bunny.net">

        <!-- Figtree Font (400, 500, 600 weights) with preload for critical font -->
        <link rel="preload" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" as="style">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

        <!-- Bootstrap Icons (local via Vite or CDN fallback) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="sha384-XGjxtQfXaH2tnPFa9x+ruJTVnBKrOpsY8wZ+g/m1/5U3pl6M1Ga0wXEKr+9P5qj4" crossorigin="anonymous">

        <!-- Vite Assets (SCSS + JS) -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

        <!-- Livewire Styles -->
        @livewireStyles

        <!-- Additional page-specific head content -->
        @stack('head')
    </head>
    <body class="d-flex flex-column min-vh-100">
        {{-- Skip to main content link for accessibility (WCAG 2.1 AA) --}}
        <a href="#main-content" class="visually-hidden-focusable">
            {{ __('layout.skip_to_content') }}
        </a>

        {{-- Page Wrapper with Sidebar & Content --}}
        <div class="d-flex flex-grow-1" id="wrapper">
            {{-- Sidebar Navigation (Collapsible on Desktop, Hidden on Mobile) --}}
            <x-navigation.sidebar />

            {{-- Main Content Wrapper --}}
            <div id="page-content-wrapper" class="w-100 d-flex flex-column">
                {{-- Top Navigation Bar --}}
                <x-navigation.navbar />

                {{-- Main Content Area --}}
                <main class="flex-grow-1 py-4" id="main-content" tabindex="-1">
                    <div class="container-fluid px-3 px-lg-4">
                        {{-- Breadcrumb Navigation --}}
                        @hasSection('breadcrumb_items')
                            <x-navigation.breadcrumb :items="View::yieldContent('breadcrumb_items')" />
                        @else
                            <x-navigation.breadcrumb />
                        @endif

                        {{-- Flash Messages (with ARIA live regions) --}}
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

                        {{-- Page Content --}}
                        @yield('content')
                        {{ $slot ?? '' }}
                    </div>
                </main>

                {{-- Footer --}}
                <x-footer />
            </div>
        </div>

        {{-- Toast Notifications --}}
        <x-toast />

        {{-- Livewire Scripts --}}
        @livewireScripts

        {{-- Sidebar Toggle Script --}}
        @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const sidebarToggle = document.getElementById('sidebar-toggle');
                const wrapper = document.getElementById('wrapper');
                const sidebar = document.getElementById('sidebar-wrapper');

                if (sidebarToggle && wrapper) {
                    sidebarToggle.addEventListener('click', function() {
                        wrapper.classList.toggle('toggled');

                        // Update aria-expanded for accessibility
                        const isExpanded = !wrapper.classList.contains('toggled');
                        this.setAttribute('aria-expanded', isExpanded.toString());

                        // Store preference in sessionStorage
                        sessionStorage.setItem('sidebar-state', wrapper.classList.contains('toggled') ? 'collapsed' : 'expanded');
                    });

                    // Restore sidebar state from sessionStorage
                    const savedState = sessionStorage.getItem('sidebar-state');
                    if (savedState === 'collapsed') {
                        wrapper.classList.add('toggled');
                        sidebarToggle.setAttribute('aria-expanded', 'false');
                    }
                }
            });
        </script>
        @endpush

        {{-- Additional page-specific scripts --}}
        @stack('scripts')
    </body>
</html>
