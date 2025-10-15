<x-guest-layout>
    <meta name="description" content="{{ __('common.welcome.tagline') }}">
    <title>{{ __('common.welcome.system_name') }} - {{ config('app.name') }}</title>

    <div class="d-flex flex-column min-vh-100">
        <!-- Header -->
        <x-welcome.header />

        <!-- Main Content -->
        <main id="main-content" class="flex-grow-1">
            <!-- Hero Section -->
            <x-welcome.hero />

            <!-- Features Section -->
            <x-welcome.features />

            <!-- About Section -->
            <x-welcome.about />
        </main>

        <!-- Footer -->
        <x-welcome.footer />
    </div>
</x-guest-layout>
