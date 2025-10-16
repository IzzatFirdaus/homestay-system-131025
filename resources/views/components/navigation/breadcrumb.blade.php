{{--
    Breadcrumb Navigation Component

    Props:
    - items: array of ['label' => string, 'url' => string|null]

    Usage:
    <x-navigation.breadcrumb :items="[
        ['label' => 'Dashboard', 'url' => route('dashboard')],
        ['label' => 'Homestays', 'url' => route('homestays.index')],
        ['label' => 'Edit', 'url' => null]
    ]" />

    Features:
    - Auto-generates structured breadcrumb navigation
    - Last item is not clickable (current page)
    - Keyboard accessible
    - WCAG 2.1 AA compliant with aria-current
--}}

@props(['items' => []])

@if(count($items) > 0)
<nav aria-label="{{ __('layout.navigation.breadcrumb') }}" {{ $attributes->merge(['class' => 'mb-3']) }}>
    <ol class="breadcrumb mb-0 bg-light rounded px-3 py-2">
        {{-- Home/Dashboard as first item if not explicitly provided --}}
        @if(count($items) > 0 && ($items[0]['url'] ?? null) !== route('dashboard'))
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}" class="text-decoration-none">
                    <i class="bi bi-house-door-fill me-1" aria-hidden="true"></i>
                    <span class="d-none d-md-inline">{{ __('layout.navigation.dashboard') }}</span>
                    <span class="d-md-none" aria-label="{{ __('layout.navigation.dashboard') }}">
                        <span class="visually-hidden">{{ __('layout.navigation.dashboard') }}</span>
                    </span>
                </a>
            </li>
        @endif

        {{-- Breadcrumb items --}}
        @foreach($items as $index => $item)
            @if($loop->last)
                {{-- Current page (not clickable) --}}
                <li class="breadcrumb-item active" aria-current="page">
                    <span class="fw-medium">{{ $item['label'] }}</span>
                </li>
            @else
                {{-- Clickable breadcrumb item --}}
                <li class="breadcrumb-item">
                    <a href="{{ $item['url'] }}" class="text-decoration-none">
                        {{ $item['label'] }}
                    </a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
@endif

{{-- Fallback: if no items provided, show current page title from yield --}}
@if(count($items) === 0 && trim($__env->yieldContent('page_title')))
<nav aria-label="{{ __('layout.navigation.breadcrumb') }}" {{ $attributes->merge(['class' => 'mb-3']) }}>
    <ol class="breadcrumb mb-0 bg-light rounded px-3 py-2">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}" class="text-decoration-none">
                <i class="bi bi-house-door-fill me-1" aria-hidden="true"></i>
                {{ __('layout.navigation.dashboard') }}
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <span class="fw-medium">@yield('page_title')</span>
        </li>
    </ol>
</nav>
@endif
