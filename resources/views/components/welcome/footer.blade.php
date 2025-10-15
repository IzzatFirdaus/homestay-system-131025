<footer class="bg-dark text-white py-5" role="contentinfo">
    <div class="container">
        <div class="row g-4">
            <!-- Brand Column -->
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <x-application-logo class="text-white" style="height: 32px; width: 32px;" />
                    <span class="fw-semibold">
                        {{ config('app.name') }}
                    </span>
                </div>
                <p class="text-secondary small">
                    {{ __('common.welcome.tagline') }}
                </p>
            </div>

            <!-- Links Column -->
            <div class="col-12 col-md-4">
                <nav aria-label="{{ __('layout.footer.links') }}">
                    <h3 class="h6 fw-semibold mb-3">{{ __('layout.footer.links') }}</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a
                                href="#"
                                class="text-secondary text-decoration-none"
                            >
                                {{ __('common.welcome.footer.links.privacy') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a
                                href="#"
                                class="text-secondary text-decoration-none"
                            >
                                {{ __('common.welcome.footer.links.accessibility') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a
                                href="#"
                                class="text-secondary text-decoration-none"
                            >
                                {{ __('common.welcome.footer.links.contact') }}
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Powered By Column -->
            <div class="col-12 col-md-4">
                <p class="text-secondary small">
                    {{ __('common.welcome.footer.powered_by') }}
                    <a
                        href="https://laravel.com"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-white text-decoration-none"
                    >
                        Laravel {{ Illuminate\Foundation\Application::VERSION }}
                    </a>
                </p>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-top border-secondary pt-4 mt-4">
            <p class="text-secondary small text-center mb-0">
                {{ __('common.welcome.footer.copyright', ['year' => date('Y')]) }}
            </p>
        </div>
    </div>
</footer>
