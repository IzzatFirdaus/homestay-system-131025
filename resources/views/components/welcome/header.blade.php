<header class="bg-white shadow-sm" role="banner">
    <!-- Skip to content link (WCAG 2.1 AA) -->
    <a
        href="#main-content"
        class="visually-hidden-focusable position-absolute top-0 start-0 m-3 btn btn-primary z-3"
    >
        {{ __('layout.skip_to_content') }}
    </a>

    <nav class="container-fluid px-4 px-lg-5" aria-label="{{ __('layout.navigation.menu_label') }}">
        <div class="d-flex align-items-center justify-content-between py-3">
            <!-- Logo -->
            <div class="d-flex align-items-center">
                <a href="/" wire:navigate class="d-flex align-items-center gap-3 text-decoration-none">
                    <x-application-logo class="text-primary" style="height: 40px; width: 40px;" />
                    <span class="fs-5 fw-semibold text-dark">
                        {{ config('app.name') }}
                    </span>
                </a>
            </div>

            <!-- Right side: Language switcher + Auth buttons -->
            <div class="d-flex align-items-center gap-3">
                <!-- Language Switcher -->
                <x-welcome.language-switcher class="d-none d-sm-flex" />

                <!-- Auth Navigation -->
                @if (Route::has('login'))
                    <div class="d-flex align-items-center gap-2">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                wire:navigate
                                class="btn btn-primary"
                            >
                                {{ __('common.auth.dashboard') }}
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                wire:navigate
                                class="btn btn-primary"
                            >
                                {{ __('common.auth.log_in') }}
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    wire:navigate
                                    class="btn btn-outline-primary"
                                >
                                    {{ __('common.auth.register') }}
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>

        <!-- Mobile Language Switcher -->
        <div class="pb-3 d-sm-none">
            <x-welcome.language-switcher />
        </div>
    </nav>
</header>
