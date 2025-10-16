{{--
    Accessible Button Component

    Props:
    - variant: 'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark', 'link' (default: 'primary')
    - size: 'sm', 'md', 'lg' (default: 'md')
    - outline: boolean (default: false) - Use outline variant
    - loading: boolean (default: false) - Show loading spinner
    - disabled: boolean (default: false) - Disable button
    - type: 'button', 'submit', 'reset' (default: 'button')
    - icon: optional Bootstrap Icon class (e.g., 'bi-plus-circle')
    - iconPosition: 'start', 'end' (default: 'start')

    Usage:
    <x-button variant="primary" icon="bi-plus-circle">{{ __('common.buttons.save') }}</x-button>
    <x-button variant="danger" outline :loading="$isLoading">Delete</x-button>
--}}

@props([
    'variant' => 'primary',
    'size' => 'md',
    'outline' => false,
    'loading' => false,
    'disabled' => false,
    'type' => 'button',
    'icon' => null,
    'iconPosition' => 'start',
])

@php
    $baseClasses = 'btn';

    // Variant classes
    $variantClass = $outline ? "btn-outline-{$variant}" : "btn-{$variant}";

    // Size classes
    $sizeClass = match($size) {
        'sm' => 'btn-sm',
        'lg' => 'btn-lg',
        default => '',
    };

    // State classes
    $stateClasses = '';
    if ($loading || $disabled) {
        $stateClasses = 'disabled';
    }

    // Combine all classes
    $classes = trim("{$baseClasses} {$variantClass} {$sizeClass} {$stateClasses}");
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => $classes]) }}
    @if($disabled || $loading) disabled @endif
    @if($loading) aria-busy="true" @endif
>
    {{-- Loading Spinner --}}
    @if($loading)
        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
        <span class="visually-hidden">{{ __('common.general.loading') }}</span>
    @endif

    {{-- Icon (Start Position) --}}
    @if($icon && $iconPosition === 'start' && !$loading)
        <i class="bi {{ $icon }} me-2" aria-hidden="true"></i>
    @endif

    {{-- Button Content --}}
    {{ $slot }}

    {{-- Icon (End Position) --}}
    @if($icon && $iconPosition === 'end' && !$loading)
        <i class="bi {{ $icon }} ms-2" aria-hidden="true"></i>
    @endif
</button>
