<section
    class="position-relative bg-light py-5"
    aria-labelledby="hero-heading"
    style="background: linear-gradient(135deg, #e0e7ff 0%, #ffffff 50%, #dbeafe 100%); min-height: 500px;"
>
    <!-- Background decoration (decorative only) -->
    <div class="position-absolute top-0 start-0 w-100 h-100 overflow-hidden" aria-hidden="true">
        <div class="position-absolute opacity-25"
             style="top: -160px; right: -128px; height: 384px; width: 384px; border-radius: 50%; background-color: #e0e7ff; filter: blur(96px);"></div>
        <div class="position-absolute opacity-25"
             style="bottom: -160px; left: -128px; height: 384px; width: 384px; border-radius: 50%; background-color: #dbeafe; filter: blur(96px);"></div>
    </div>

    <div class="container position-relative py-5">
        <div class="text-center">
            <!-- Headline -->
            <h1
                id="hero-heading"
                class="display-3 fw-bold text-dark mb-4"
            >
                {{ __('common.welcome.hero.headline') }}
            </h1>

            <!-- Subheadline -->
            <p class="lead text-secondary mx-auto mb-5" style="max-width: 700px;">
                {{ __('common.welcome.hero.subheadline') }}
            </p>

            <!-- CTA Buttons -->
            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        wire:navigate
                        class="btn btn-primary btn-lg d-inline-flex align-items-center"
                    >
                        {{ __('common.welcome.hero.cta_primary') }}
                        <svg class="ms-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        wire:navigate
                        class="btn btn-primary btn-lg d-inline-flex align-items-center"
                    >
                        {{ __('common.welcome.hero.cta_primary') }}
                        <svg class="ms-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endauth

                <a
                    href="#features"
                    class="btn btn-outline-secondary btn-lg"
                    data-bs-toggle="scroll"
                >
                    {{ __('common.welcome.hero.cta_secondary') }}
                </a>
            </div>
        </div>
    </div>
</section>
