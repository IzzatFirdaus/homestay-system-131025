@props(['size' => 'md', 'text' => null])

@php
    $sizeClasses = [
        'sm' => 'spinner-border-sm',
        'md' => '',
        'lg' => 'spinner-border spinner-border-lg'
    ];
    $spinnerClass = $sizeClasses[$size] ?? '';
@endphp

<div {{ $attributes->merge(['class' => 'd-flex align-items-center justify-content-center']) }}>
    <div class="spinner-border text-primary {{ $spinnerClass }}" role="status">
        <span class="visually-hidden">{{ __('Memuatkan...') }}</span>
    </div>
    @if($text)
        <span class="ms-2">{{ $text }}</span>
    @endif
</div>
