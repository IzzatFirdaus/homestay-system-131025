<nav class="d-flex justify-content-end">
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="btn btn-outline-secondary me-2"
        >
            {{ __('common.auth.dashboard') }}
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="btn btn-outline-secondary me-2"
        >
            {{ __('common.auth.log_in') }}
        </a>

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="btn btn-primary"
            >
                {{ __('common.auth.register') }}
            </a>
        @endif
    @endauth
</nav>
