{{--
    Accessible Alert Component

    Props:
    - type: 'success', 'danger', 'warning', 'info', 'primary', 'secondary', 'light', 'dark' (default: 'info')
    - dismissible: boolean (default: false) - Show close button
    - title: optional alert title (string)
    - icon: optional Bootstrap Icon class (e.g., 'bi-check-circle-fill')
    - autoDismiss: integer (milliseconds) - Auto dismiss after delay (optional)

    Usage:
    <x-alert type="success" dismissible title="Success!" icon="bi-check-circle-fill">
        Operation completed successfully.
    </x-alert>
--}}

@props([
    'type' => 'info',
    'dismissible' => false,
    'title' => null,
    'icon' => null,
    'autoDismiss' => null,
])

@php
    $alertClasses = "alert alert-{$type}";
    if ($dismissible) {
        $alertClasses .= ' alert-dismissible fade show';
    }

    // Default icons for each type
    $defaultIcons = [
        'success' => 'bi-check-circle-fill',
        'danger' => 'bi-x-circle-fill',
        'warning' => 'bi-exclamation-triangle-fill',
        'info' => 'bi-info-circle-fill',
        'primary' => 'bi-info-circle-fill',
        'secondary' => 'bi-info-circle-fill',
        'light' => 'bi-info-circle',
        'dark' => 'bi-info-circle-fill',
    ];

    $displayIcon = $icon ?? ($defaultIcons[$type] ?? null);
@endphp

<div
    {{ $attributes->merge(['class' => $alertClasses]) }}
    role="alert"
    @if($autoDismiss)
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, {{ $autoDismiss }})"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    @endif
>
    <div class="d-flex align-items-start">
        {{-- Icon --}}
        @if($displayIcon)
            <div class="flex-shrink-0 me-3">
                <i class="bi {{ $displayIcon }}" aria-hidden="true"></i>
            </div>
        @endif

        {{-- Content --}}
        <div class="flex-grow-1">
            @if($title)
                <h4 class="alert-heading mb-2">{{ $title }}</h4>
            @endif
            {{ $slot }}
        </div>

        {{-- Dismissible Button --}}
        @if($dismissible)
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="{{ __('common.general.close') }}"
                @if($autoDismiss) @click="show = false" @endif
            ></button>
        @endif
    </div>
</div>
